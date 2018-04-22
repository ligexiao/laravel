<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user_fillable = [
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
    ];

    /**
     * 获取所有的test
     * @example GET http://localhost:8000/api/users
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ret = User::all();
        return $this->success($ret->toArray(),['total'=>$ret->count()]);
    }

    /**
     * 获取指定id的error codes
     * @example GET http://localhost:8000/api/users/1
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        $ret =  User::findOrFail($id);
        return $this->success($ret->toArray());
    }

    /**
     * 创建一条记录
     * @example POST http://localhost:8000/api/users?Ftype=xx&Fname=xxx
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->only($this->user_fillable);

        $ret = User::create($input);
        if(empty($ret)){
            return $this->fail($ret);
        }else{
            return $this->success();
        }
    }

    /**
     * 删除指定记录
     * @example DELETE http://localhost:8000/api/users/1
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    /**
     * 更新一条记录
     * @example PUT http://localhost:8000/api/users/1?Ftype=xxx&Fname=xxx
     *
     * @param int $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $errCode = User::findOrFail($id);

        $input = $request->only($this->user_fillable);

        $ret = $errCode->update($input);
        if($ret<0){
            return $this->fail($ret);
        }else{
            return $this->success();
        }
    }
}
