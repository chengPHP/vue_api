<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //获取用户列表数据
    public function getData(Request $request)
    {
        if($request->search){
            $arr = [
                ['name', 'like', '%'.$request->search.'%']
            ];
            $list = User::where($arr)->get();
        }else{
            $list = User::get();
        }
        return response()->json($list);
    }

    /*public function getData()
    {
        $list = User::get();
        return response()->json($list);
    }*/

    public function add(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->record = $request->record;
        $user->university = $request->university;
        $user->occupation = $request->occupation;
        $user->descr = $request->descr;

        if($user->save()){
            $message = [
                'code' => 1,
                'message' => '用户信息添加成功'
            ];
        }else{
            $message = [
                'code' => 0,
                'message' => '用户信息添加失败，请稍后重试'
            ];
        }
        return response()->json($message);
    }

    public  function detail(Request $request){
        $info = User::find($request->id);
        return response()->json($info);
    }

    //修改用户信息
    public function edit(Request $request){
        $arr = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'record' => $request->record,
            'university' => $request->university,
            'occupation' => $request->occupation,
            'descr' => $request->descr
        ];

        $info = User::where("id",$request->id)->update($arr);

        if($info){
            $message = [
                'code' => 1,
                'message' => '用户信息修改成功'
            ];
        }else{
            $message = [
                'code' => 0,
                'message' => '用户信息修改失败，请稍后重试'
            ];
        }
        return response()->json($message);
    }

    //删除
    public function delete(Request $request){
        $info = User::where("id",$request->id)->delete();
        if($info){
            $message = [
                'code' => 1,
                'message' => '用户信息删除成功'
            ];
        }else{
            $message = [
                'code' => 0,
                'message' => '用户信息删除失败，请稍后重试'
            ];
        }
        return response()->json($message);
    }
}
