<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $result
        ];

        return response()->json($response);
    }

    public function sendError($error, $messages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (isset($messages)) {
            $response['data'] = $messages;
        }

        return response()->json($response, $code);
    }
}
