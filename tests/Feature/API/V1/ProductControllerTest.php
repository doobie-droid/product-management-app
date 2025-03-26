<?php

namespace Tests\Feature;

use App\Enums\StatusEnum;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_can_create_products(): void
    {
        $payload = [
            "name" => $this->faker()->word(),
            "category" => $this->faker()->word(),
            "status" => StatusEnum::ACTIVE()->value
        ];

        $this->postJson(route("v1.products.store"), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    'category',
                    "status",
                    "updated_at",
                    "created_at"
                ]
            ]);

        $this->assertDatabaseHas(app(Product::class)->getTable(), $payload);
    }

    /** @test */
    public function it_can_fetch_all_products(): void
    {
        Product::factory(10)->create();

        $this->getJson(route("v1.products.index"))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'category',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next'
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links' => [
                        '*' => [
                            'url',
                            'label',
                            'active'
                        ]
                    ]
                ]

            ]);
    }

    /** @test */
    public function it_can_fetch_single_product(): void
    {
        $product = Product::factory()->create();

        $this->getJson(route("v1.products.show", $product))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(["data" => [
                "id" => $product->id,
                "name" => $product->name,
                "category" => $product->category,
                "status" => $product->status->label,
            ]]);
    }

    /** @test */
    public function it_returns_error_when_product_does_not_exist(): void
    {
        $this->getJson(route("v1.products.show", rand(0, 100)))
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonStructure(["message"]);
    }
}
