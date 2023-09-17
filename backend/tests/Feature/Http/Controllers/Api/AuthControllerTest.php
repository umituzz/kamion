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

    public function test_login()
    {
        $user = Shipper::factory()->create([
            'password' => bcrypt(123456789)
        ]);

        $userData = [
            'email' => $user->email,
            'password' => '123456789',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'user',
                'token',
            ]);
    }

    public function test_login_with_invalid_password()
    {
        $userData = [
            'email' => 'user@example.com',
            'password' => 'wrong_password',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
        ->assertJson([
            'errors' => __('The provided credentials are incorrect!'),
        ]);
    }

    public function test_login_with_invalid_email()
    {
        $userData = [
            'email' => 'invalid_email@example.com',
            'password' => 'password123',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => __('The provided credentials are incorrect!'),
            ]);
    }

    public function test_login_with_nonexistent_user()
    {
        $userData = [
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => __('The provided credentials are incorrect!'),
            ]);
    }

    public function test_logout()
    {
        $user = Shipper::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/api/logout');

        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_logout_without_authenticated_user()
    {
        $response = $this->post('/api/logout');

        $this->assertEquals(302, $response->getStatusCode());
    }
}
