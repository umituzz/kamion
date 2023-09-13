<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class BaseController
 * @package App\Http\Controllers\Api
 */
class BaseController extends Controller
{
    /**
     * Return success status
     *
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function ok($result, $message): JsonResponse
    {
        $response = [
            'status' => Response::HTTP_OK,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response);
    }

    /**
     * Return error status
     *
     * @param $message
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    public function error($message, array $errors = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if (!empty($errors)) $response['data'] = $errors;

        return response()->json($response, $code);
    }
}
