<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getSuccessResponse($status = 'success', $message = 'operation successful', $data = null, $data_key = 'data'){

        $res = [
            'status' => $status,
            'message' => $message,
            $data_key => $data
        ];
        if(!$data) unset($res[$data_key]);
        if(!$message) unset($res['message']);

        return response()->json($res,200);
    }

    public static function getErrorResponse($status = 'error', $message = 'There was a problem', $data=null, $data_key='data',$code=400){
        $res = [
            'status' => $status,
            'message' => $message,
            $data_key => $data
        ];
        if(!$data) unset($res[$data_key]);

        return response()->json($res,$code);
    }
}
