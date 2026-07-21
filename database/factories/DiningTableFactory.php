<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DiningTableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->lastName().' Household',
        ];
    }
}
