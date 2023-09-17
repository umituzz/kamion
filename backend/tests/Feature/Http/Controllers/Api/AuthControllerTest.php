<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_register()
    {
        $password = bcrypt(123456789);
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertJsonStructure([
            'statusCode',
            'user',
            'token',
        ]);
    }

    public function test_register_with_invalid_email()
    {
        $password = bcrypt('password123');
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => 'invalid_email',
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                ],
            ]);
    }

    public function test_register_with_duplicate_email()
    {
        $existingUser = Shipper::factory()->create();

        $password = bcrypt('password123');
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $existingUser->email,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                ],
            ]);
    }

    public function test_register_with_mismatched_passwords()
    {
        $password = bcrypt('password123');
        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => 'different_password',
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'password',
                ],
            ]);
    }


}
