<?php

namespace App\Repositories;

use App\Contracts\ShipperRepositoryInterface;
use App\Http\Resources\ShipperResource;
use App\Models\Shipper;
use Illuminate\Support\Facades\Auth;

/**
 * Class ShipperRepository
 * @package App\Repositories
 */
class ShipperRepository extends BaseRepository implements ShipperRepositoryInterface
{
    private Shipper $shipper;

    public function __construct(Shipper $shipper)
    {
        parent::__construct($shipper);

        $this->shipper = $shipper;
    }

    public function getAuthUser()
    {
        $shipper = Auth::guard('api')->user();

        return new ShipperResource($shipper);
    }
}
