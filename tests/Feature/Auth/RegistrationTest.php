<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});

test('new users can register', function () {
    $email = 'test@example.com';

    $response = $this->post(route('register'), [
        'name' => 'Test User',
        'email' => $email,
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', ['email' => $email]);
    $response->assertRedirect(route('verification.notice'));
});
