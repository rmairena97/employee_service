<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

abstract class Controller
{
    //

    /**
     * Make standard response with some data
     *
     * @param object|array $data Data to be send as JSON
     * @param int $code optional HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseWithData($data, $code = 200) : JsonResponse {
        return Response::json([
            'status' => true,
            'data' => $data
        ], $code);
    }
    /**
     * Make standard successful response ['success' => true, 'message' => $message]
     *
     * @param string $message Success message
     * @param int $code HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseSuccess($message = 'Action completed!', $code = 200) : JsonResponse {
        return Response::json([
            'status' => true,
            'message' => $message,
        ], $code);
    }
    /**
     * Make standard response with error ['success' => false, 'message' => $message]
     *
     * @param string $message Error message
     * @param int $code HTTP response code, default to 500
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseError($message = 'Server error!', $code = 500) : JsonResponse {
        return Response::json([
            'status' => false,
            'message' => $message,
        ], $code);
    }

}
