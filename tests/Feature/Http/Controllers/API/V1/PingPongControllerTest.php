<?php

use Illuminate\Http\Response;

it('returns pong', function () {
    $this->get(route('v1.ping'))
        ->assertStatus(Response::HTTP_OK)
        ->assertSeeText('Pong');
});
