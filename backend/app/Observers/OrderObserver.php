<?php

namespace App\Observers;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\OrderResource;
use App\Models\Order;
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
//        $users = $this->userRepository->getAdmins();
//        $order = new OrderResource($order);
//
//        Notification::send(
//            $users,
//            new NewOrderNotification([
//                'order' => $order,
//            ])
//        );
    }
}
