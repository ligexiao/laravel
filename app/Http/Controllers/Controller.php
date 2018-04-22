<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = [], $suffix=[])
    {
        $ret = [
            'status'  => true,
            'code'    => 200,
            'message' => config('errorcode.code')[200],
        ];
        if(!empty($data)){
            $ret['data'] = $data;
        }
        if(!empty($suffix)){
            $ret += $suffix;
        }
        return response()->json($ret);
    }

    public function fail($code, $data = [])
    {
        $err = config('errorcode.code');
        if(!isset($err[(int) $code])){
            $code = 500;
        }
        $ret = [
            'status'  => false,
            'code'    => $code,
            'message' => $err[(int) $code],
        ];
        if(!empty($data)){
            $ret['data'] = $data;
        }
        return response()->json($ret);
    }
}
