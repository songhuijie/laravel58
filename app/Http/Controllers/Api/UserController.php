<?php

namespace App\Http\Controllers\Api;

use App\Http\Models\Enum\UserEnum;
use App\Http\Models\Users;
use App\Http\Requests\Api\UserRequest;


use App\Http\Resources\Api\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //返回用户列表
    public function index(){
        //3个用户为一页
        $users = Users::paginate(3);
        return UserResource::collection($users);
    }

    //用户注册
    public function store(UserRequest $request){


        Users::create($request->all());
//        $result = Users::create($request->all());
        return $this->setStatusCode(201)->success('用户注册成功');

    }

    //返回单一用户信息
    public function show(Users $user){
        return $this->success(new UserResource($user));
    }

    //用户登录
    public function login(Request $request){

        $user = Users::where(['name'=>$request->name])->first();
        if(empty($user)){
            return $this->failed('登陆信息错误');
        }
        if($user->status==UserEnum::INVALID||$user->status==UserEnum::FREEZE){
            // 不允许用户登录逻辑
            return $this->failed('暂时不能登录');
        }
        $res=Auth::guard('web')->attempt(['name'=>$request->name,'password'=>$request->password]);


        if($res){
            return $this->success('用户登录成功...');
//            return $this->setStatusCode(201)->success('用户登录成功...');
//            return response()->json(['code'=>200,'msg'=>'用户登录成功...']);
        }
        return $this->failed('用户登录失败',401);
//        return response()->json(['code'=>100,'msg'=>'用户登录失败...']);
    }
}
