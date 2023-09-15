<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    private Order $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);

        $this->order = $order;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getApiCollection()
    {
        $data = $this->order->where('shipper_id', 1)->get();
//        $data = auth()->user()->orders;
        $this->loadRelationships($data);

        return OrderResource::collection($data);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function listAll()
    {
        $data = $this->order->with('loadType', 'currency', 'departureCity', 'arrivalCity', 'status')->get();

        return OrderResource::collection($data);
    }

    /**
     * @param $order
     * @return void
     */
    public function loadRelationships($order)
    {
        $order->load('loadType', 'currency', 'departureCity', 'arrivalCity', 'status');
    }

    public function search($key)
    {
        $orders = Order::search($key)
            ->query(function ($builder) {
                $builder->join('load_types', 'orders.load_type_id', 'load_types.id')
                    ->select(['orders.id', 'orders.commodity', 'load_types.name as load_type'])
                    ->orderBy('orders.id', 'DESC');
            })
            ->get();

        $this->loadRelationships($orders);

        return $orders;
    }
}
