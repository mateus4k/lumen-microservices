<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($data, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['error' => $data, 'code' => $code], $code);
    }
}
