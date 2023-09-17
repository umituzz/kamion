<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class NotificationsControllerTest
 * @package Tests\Feature\Http\Controllers\User
 * @coversDefaultClass \App\Http\Controllers\User\NotificationsController
 */
class NotificationsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_notifications(): void
    {
        Notification::factory(1)->create();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('notifications.index'));

        $response->assertStatus(200);

        $response->assertViewIs('notification.index');
    }

    public function test_show_notification()
    {
        $user = User::factory()->create();
        $notification = Notification::factory()->create(['notifiable_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->get(route('notifications.show', $notification->id));

        $response->assertStatus(200);

        $response->assertViewIs('notification.show');

        $this->assertNotNull($notification->fresh()->read_at);
    }

    public function test_destroy_method_deletes_notification()
    {
        $user = User::factory()->create();
        $notification = Notification::factory()->create(['notifiable_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->get(route('notifications.destroy', $notification->id));

        $response->assertRedirect();

    }
}
