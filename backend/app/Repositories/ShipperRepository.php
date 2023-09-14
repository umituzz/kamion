<?php

namespace App\Repositories;

use App\Contracts\ShipperRepositoryInterface;
use App\Models\Shipper;

/**
 * Class ShipperRepository
 * @package App\Models
 */
class ShipperRepository extends BaseRepository implements ShipperRepositoryInterface
{
    private Shipper $shipper;

    public function __construct(Shipper $shipper)
    {
        parent::__construct($shipper);

        $this->shipper = $shipper;
    }
}
