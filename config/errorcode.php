<?php

return [

    /*
    |--------------------------------------------------------------------------
    | customized http code
    |--------------------------------------------------------------------------
    |
    | The first number is error type, the second and third number is
    | product type, and it is a specific error code from fourth to
    | sixth.But the success is different.
    |
    | 在该变量中可以对错误进行分类，如4--为用户端错误，5--位服务器端错误，2--为请求成功
    |
    */

    'code' => [
        200 => '成功',
        500 => '失败',
    ],

];