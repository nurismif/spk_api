<?php

namespace App\Services;

use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiResponser
{
     protected function successResponse($data, $message = null, $code = 200)
     {
          throw new HttpResponseException(response()->json([
               'message' => $message,
               'data' => $data
          ], $code));
     }

     protected function errorResponse($message = null, $code = 400)
     {
          throw new HttpResponseException(response()->json([
               'message' => $message,
          ], $code));
     }
}
