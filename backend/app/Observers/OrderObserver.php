<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

/**
 * Class OrderObserver
 * @package App\Observers
 */
class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
//        $user = $this->userRepository->find($refrigerator->user_id);
        $user = User::find(1);

        Notification::send(
            $user,
            new NewOrderNotification([
                'data' => [
                    'order' => $order,
                    'user' => $user
                ]
            ])
        );
    }
}
