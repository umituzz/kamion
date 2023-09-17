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
        $data = auth()->user()->orders;
        $this->loadRelationships($data);

        return OrderResource::collection($data);
    }

    public function listQuery()
    {
        return $this->order
            ->search('')
            ->query(function ($builder) {
                return $this->queryBuilder($builder);
            })
            ->get();

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
        return $this->order
            ->search($key)
            ->query(function ($builder) {
                return $this->queryBuilder($builder);
            })
            ->get();
    }

    private function queryBuilder($builder)
    {
        $builder->join('shippers', 'orders.shipper_id', 'shippers.id');
        $builder->join('load_types', 'orders.load_type_id', 'load_types.id');
        $builder->join('currencies', 'orders.currency_id', 'currencies.id');
        $builder->join('cities as departure_cities', 'orders.departure_city_id', 'departure_cities.id');
        $builder->join('cities as arrival_cities', 'orders.arrival_city_id', 'arrival_cities.id');
        $builder->join('order_statuses', 'orders.order_status_id', 'order_statuses.id');

        $builder->select([
            'orders.id',
            'orders.commodity',
            'load_types.name as load_type',
            'shippers.first_name as shipper_first_name',
            'shippers.last_name as shipper_last_name',
            'currencies.name as currency',
            'departure_cities.name as departure_city',
            'arrival_cities.name as arrival_city',
            'order_statuses.name as status',
            'orders.created_at'
        ]);

        $builder->orderBy('orders.id', 'DESC');

        return $builder;
    }
}
