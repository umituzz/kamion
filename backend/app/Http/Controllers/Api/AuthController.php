<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ShipperRepositoryInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ShipperResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    private ShipperRepositoryInterface $shipperRepository;

    public function __construct(ShipperRepositoryInterface $shipperRepository)
    {
        $this->shipperRepository = $shipperRepository;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $shipper = $this->shipperRepository->create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $resource = new ShipperResource($shipper);

        return response()->json([
            'status' => Response::HTTP_OK,
            'user' => $resource,
//            'token' => $shipper->createToken('userToken')->plainTextToken
            'token' => $shipper->createToken('userToken')->plainTextToken
        ]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $attempt = Auth::guard('shipper')->attempt($request->only('email', 'password'));

        if (!$attempt) {
            return response()->json([
                'errors' => __('The provided credentials are incorrect!'),
            ]);
        }

        $user = Auth::guard('shipper')->user();
        $token = JWTAuth::fromUser($user);

        $data = $this->shipperRepository->findBy('email', $request->input('email'));

        $user = new ShipperResource($data);

        return response()->json([
            'status' => Response::HTTP_OK,
            'user' => $user,
            'token' => $token
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => __('Logout successful')
        ]);
    }
}
