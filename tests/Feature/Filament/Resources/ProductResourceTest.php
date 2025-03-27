<?php

use App\Filament\Resources\ProductResource\Pages\ManageProducts;
use App\Models\User;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->user = User::factory()->create(['is_admin' => true]);
    $this->actingAs($this->user);
});

it('can render page for managing products', function () {
    livewire(ManageProducts::class)->assertSuccessful();
});
