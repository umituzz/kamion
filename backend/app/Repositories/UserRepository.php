<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        parent::__construct($user);

        $this->user = $user;
    }

    public function getAdmins()
    {
        return $this->user->role('Admin')->get();
    }

    public function getAuthenticatedUser()
    {
        return auth()->user();
    }
}
