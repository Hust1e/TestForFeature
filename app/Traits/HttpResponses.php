<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses {
    protected function success($data, $message=null, $code=200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'data' => $data,
            'message' => $message,
        ], $code);
    }
    protected function fail($code, $message=null): jsonResponse
    {
        return response()->json([
            'status' => 'Fail',
            'message' => $message,
        ], $code);
    }
}
