<?php

namespace Tests\Feature\Filament\Resources;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function template_test(): void
    {
        //TODO: update template test to test filament components upon migration to pestphp
        $this->assertTrue(true);
    }
}
