<?php

namespace App\Http\Controllers\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        return view('user.profile', [
            'user' => $this->userRepository->getAuthenticatedUser()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $this->userRepository->update(auth()->id(), [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back();
    }
}
