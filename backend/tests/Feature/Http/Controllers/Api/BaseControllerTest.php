<?php

namespace Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class BaseControllerTest
 * @package Tests\Feature\Http\Controllers\Api
 * @coversDefaultClass \App\Http\Controllers\Api\BaseController
 */
class BaseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ok()
    {
        $data = ['key' => 'value'];
        $message = 'Success message';
        $status = 200;

        $baseController = new BaseController();
        $response = $baseController->ok($data, $message, $status);

        $this->assertEquals([
            'statusCode' => 200,
            'message' => 'Success message',
            'data' => ['key' => 'value'],
        ], $response->getOriginalContent());
    }

    public function test_error()
    {
        $message = 'Error message';
        $errors = ['field' => 'Error description'];
        $code = 404;

        $baseController = new BaseController();
        $response = $baseController->error($message, $errors, $code);

        $this->assertEquals([
            'statusCode' => 404,
            'message' => 'Error message',
            'data' => ['field' => 'Error description'],
        ], $response->getOriginalContent());
    }
}
