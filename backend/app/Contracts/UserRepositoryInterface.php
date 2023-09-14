<?php

namespace App\Contracts;

/**
 * Interface UserRepositoryInterface
 * @package App\Contracts
 */
interface UserRepositoryInterface
{
    public function getAdmins();

    public function getAuthenticatedUser();
}
