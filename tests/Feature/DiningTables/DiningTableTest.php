<?php

use App\Models\DiningTable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// -----------------------------------------------------------------
// Creating a dining table
// -----------------------------------------------------------------

it('allows an authenticated user to create a dining table', function () {
    $user = User::factory()->create();
    $name = 'My Household';

    $response = $this->actingAs($user)->post(route('dining-tables.store'), ['name' => $name]);

    $response->assertRedirect();
    $this->assertDatabaseHas(DiningTable::class, ['name' => $name]);
});
