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

    public function user()
    {
        $user = $this->shipperRepository->getAuthUser();

        return response()->json([
            'statusCode' => Response::HTTP_OK,
            'data' => $user,
        ]);
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

        $token = JWTAuth::fromUser($shipper);
        $resource = new ShipperResource($shipper);

        return response()->json([
            'statusCode' => Response::HTTP_CREATED,
            'user' => $resource,
            'token' => $token,
        ]);
    }


    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $auth = Auth::guard('api');
        $attempt = $auth->attempt($request->only('email', 'password'));

        if (!$attempt) {
            return response()->json([
                'errors' => __('The provided credentials are incorrect!'),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = $auth->user();
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
