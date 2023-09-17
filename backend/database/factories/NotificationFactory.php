<?php

namespace Database\Factories;

use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => '72859427-8e42-47e9-a20d-16709bbb49aa',
            'type' => NewOrderNotification::class,
            'notifiable_type' => User::class,
            'notifiable_id' => 1,
            'data' => json_encode(['message' => $this->faker->sentence]),
            'read_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
