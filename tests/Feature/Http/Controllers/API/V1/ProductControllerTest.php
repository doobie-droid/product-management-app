<?php

use App\Enums\StatusEnum;
use App\Models\Product;
use Illuminate\Http\Response;

it('can create products', function () {
    $payload = [
        "name" => $this->faker->word(),
        "category" => $this->faker->word(),
        "status" => StatusEnum::ACTIVE()->value,
    ];

    $this->postJson(route("v1.products.store"), $payload)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            "data" => [
                "id",
                "name",
                "category",
                "status",
                "updated_at",
                "created_at",
            ]
        ]);

    $this->assertDatabaseHas(app(Product::class)->getTable(), $payload);
});

it('returns error for invalid status', function () {
    $payload = [
        "name" => $this->faker->word(),
        "category" => $this->faker->word(),
        "status" => 200,
    ];

    $this->postJson(route("v1.products.store"), $payload)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    $this->assertDatabaseMissing(app(Product::class)->getTable(), $payload);
});

it('can fetch all products', function () {
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
                'next',
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active',
                    ]
                ]
            ]
        ]);
});

it('can fetch a single product', function () {
    $product = Product::factory()->create();

    $this->getJson(route("v1.products.show", $product))
        ->assertStatus(Response::HTTP_OK)
        ->assertJson([
            "data" => [
                "id" => $product->id,
                "name" => $product->name,
                "category" => $product->category,
                "status" => $product->status->label,
            ]
        ]);
});

it('returns error when product does not exist', function () {
    $this->getJson(route("v1.products.show", rand(0, 100)))
        ->assertStatus(Response::HTTP_NOT_FOUND)
        ->assertJsonStructure(["message"]);
});
