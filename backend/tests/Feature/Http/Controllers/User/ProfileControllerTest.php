<?php

namespace Tests\Feature\Http\Controllers\User;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ProfileControllerTest
 * @package Tests\Feature\Http\Controllers\User
 * @coversDefaultClass \App\Http\Controllers\User\ProfileController
 */
class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->put(route('users.profile.update'), [
                'first_name' => 'Test First Name',
                'last_name' => 'Test Last Name',
                'email' => 'test@example.com',
            ]);

        $user->refresh();

        $this->assertSame('Test First Name', $user->first_name);
        $this->assertSame('Test Last Name', $user->last_name);
        $this->assertSame('test@example.com', $user->email);
    }
}
