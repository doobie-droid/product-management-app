<?php

namespace Tests\Feature\Http\Controllers\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class PingPongControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_pong(): void
    {
        $this->get(route('v1.ping'))
            ->assertStatus(Response::HTTP_OK)
            ->assertSeeText("Pong");
    }
}
