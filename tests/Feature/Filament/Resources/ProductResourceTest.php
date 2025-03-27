<?php

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\ManageProducts;
use App\Models\Product;
use App\Models\User;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->user = User::factory()->create(['is_admin' => true]);
    $this->actingAs($this->user);
});

it('can render page for managing products', function () {
    livewire(ManageProducts::class)->assertSuccessful();
});

it('shows the edit and delete columns for admin users', function () {
    $product = Product::factory()->create();

    livewire(ManageProducts::class)
        ->assertTableColumnVisible('name')
        ->assertTableColumnVisible('category')
        ->assertTableColumnVisible('status');

    livewire(ManageProducts::class)
        ->assertTableActionVisible('edit', $product)
        ->assertTableActionVisible('delete', $product);
});

it('does not shows the edit and delete columns for admin users', function () {
    $this->actingAs(User::factory()->create());
    $product = Product::factory()->create();

    livewire(ManageProducts::class)
        ->assertTableColumnVisible('name')
        ->assertTableColumnVisible('category')
        ->assertTableColumnVisible('status');

    livewire(ManageProducts::class)
        ->assertTableActionHidden('edit', $product)
        ->assertTableActionHidden('delete', $product);
});
