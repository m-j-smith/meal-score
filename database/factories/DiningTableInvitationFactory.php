<?php

namespace Database\Factories;

use App\Models\DiningTable;
use App\Models\DiningTableInvitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<DiningTableInvitation>
 */
class DiningTableInvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dining_table_id' => DiningTable::factory(),
            'invited_by_user_id' => User::factory(),
            'email' => $this->faker->safeEmail(),
            'token' => Str::random(64),
            'accepted_at' => null,
        ];
    }
}
