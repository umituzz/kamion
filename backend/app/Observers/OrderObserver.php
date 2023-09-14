<?php

namespace App\Observers;

use App\Contracts\UserRepositoryInterface;
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

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $users = $this->userRepository->getAdmins();

        Notification::send(
            $users,
            new NewOrderNotification([
                'data' => [
                    'order' => $order,
                ]
            ])
        );
    }
}
