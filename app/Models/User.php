<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $primaryKey = 'id';

    protected $table = 't_user';

    public $timestamps = false;

    protected $fillable = [
        'nickName',// 姓名
        'gender',// 性别
        'birthday',// 生日
        'zodiac',// 星座
        'email',
        'tel',
        'university',// 所在学校
        'major',// 所学专业
        'characters',// 性格特点
        'books',// 我喜欢的书籍
        'movies',// 我喜欢的电影
        'tastes',// 兴趣爱好
        'motto',// 座右铭
        'goal',// 人生目标
        'avaterUrl',// 自画像可访问的链接
        'openid',// 微信用户openid
    ];

    public function getUser($openid)
    {
        if(empty($openid)){
           return [];
        }
        return DB::table($this->table)->where('openid','=',$openid)->get();
    }
}
