<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Iwanli\Wxxcx\Wxxcx;

class WeappLoginController extends Controller
{

    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    public function user()
    {
        $wx = $this->getWxUserInfo();

        $model = new User();
        $ret = $model->getUser($wx['openId']);
        $wx['more'] = $ret->toArray();
        return $this->success($wx);
    }
    /**
     * 小程序登录获取用户信息
     * @author 晚黎
     * @date   2017-05-27T14:37:08+0800
     * @return [type]                   [description]
     *
     * 用户信息返回格式:
        {
            "openId": "xxxx",
            "nickName": "晚黎",
            "gender": 1,
            "language": "zh_CN",
            "city": "",
            "province": "Shanghai",
            "country": "CN",
            "avatarUrl": "http://wx.qlogo.cn/mmopen/xxxx",
            "watermark": {
            "timestamp": 1495867603,
            "appid": "your appid"
        }
    }
     */
    public function getWxUserInfo()
    {
        return [
            "openId" => "123456",
            "nickName" => "**波",
            "gender" => 1,
            "language" => "zh_CN",
            "city" => "",
            "province" => "Shanghai",
            "country" => "CN",
            "avatarUrl" => "http://wx.qlogo.cn/mmopen/xxxx",
            "watermark" => [
                "timestamp" => 1495867603,
                "appid" => "your appid"
            ],
        ];
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');
        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        return $this->wxxcx->getUserInfo($encryptedData, $iv);
    }
}