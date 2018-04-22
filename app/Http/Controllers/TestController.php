<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * 获取所有的test
     * @example GET http://localhost:8000/api/tests
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ret = Test::all();
        return $this->success($ret->toArray(),['total'=>$ret->count()]);
    }

    /**
     * 获取所有的test
     * @example GET http://localhost:8000/api/tests/pageall?page=1&size10
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function pageall(Request $request)
    {
        $size = $request->get('size');
        $model = new Test();
        $ret = $model->page($size);
        return $this->success($ret->items(),['total'=>$ret->total()]);
    }


    /**
     * 获取指定id的error codes
     * @example GET http://localhost:8000/api/tests/1
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        $ret =  Test::findOrFail($id);
        return $this->success($ret->toArray());
    }

    /**
     * 创建一条记录
     * @example POST http://localhost:8000/api/tests?Ftype=xx&Fname=xxx
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = $request->only(['Ftype', 'Fname']);

        $ret = Test::create($input);
        if(empty($ret)){
            return $this->fail($ret);
        }else{
            return $this->success();
        }
    }

    /**
     * 删除指定记录
     * @example DELETE http://localhost:8000/api/tests/1
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        return Test::destroy($id);
    }

    /**
     * 更新一条记录
     * @example PUT http://localhost:8000/api/tests/1?Ftype=xxx&Fname=xxx
     *
     * @param int $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $errCode = Test::findOrFail($id);

        $input = $request->only(['Ftype','Fname']);

        $ret = $errCode->update($input);
        if($ret<0){
            return $this->fail($ret);
        }else{
            return $this->success();
        }
    }
}
