<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Validator;
//用户行为控制器
class UserController extends Controller{


    //创建用户
    public function CreateUser(){
        //从前端请求中获取对应参数数据
        $ruls=[
            "username"=>"required",
            "password"=>"required"
        ];
        //进行数据库操作前验证传入的参数是否符合规则
        $validator=Validator::make(request()->all(),$ruls);
        if($validator->fails()){ //规则验证失败时
            //返回错误信息给前端
            return json_encode(config('responsecode.params_error'),JSON_UNESCAPED_UNICODE);
        }else{ //验证通过，创建用户
            //将密码进行Base64加密
            $password=request('password');
            $username=request('username');
            $password=base64_encode($password);
            //实例化Users
            $user= new Users();
            $user->username=$username;
            $user->password=$password;
            //更新到数据库
            if($user->save()){ //判断是否更新成功
                return json_encode(config('responsecode.created_user_success'),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(config('responsecode.created_user_error'),JSON_UNESCAPED_UNICODE);
            }
        }
    }

    //登录
    public function Login(){
        //检测传递参数是否完整
        $ruls=[
            "username"=>"required",
            "password"=>"required"
        ];
        $validator=Validator::make(request()->all(),$ruls);
        if($validator->fails()){//验证参数不通过
            //返回给前端错误信息
            return json_encode(config('responsecode.params_error'),JSON_UNESCAPED_UNICODE);
        }else{ //验证用户信息
            $user=Users::where('username',request('username'))->first();
            if($user){ //用户存在就开始验证用户密码
                if(request('password') == base64_decode($user->password)){
                    return json_encode(config('responsecode.login_success'),JSON_UNESCAPED_UNICODE);
                }else{
                    return json_encode(config('responsecode.login_err_pwd'),JSON_UNESCAPED_UNICODE);
                }
            }else{
                return json_encode(config('responsecode.login_err_not_user'),JSON_UNESCAPED_UNICODE);
            }
        }
    }


    //修改密码
    public function ChangePwd(){
        $ruls=[
            "username"=>"required",
            "password"=>"required"
        ];
        $val=Validator::make(request()->all(),$ruls);
        if($val->fails()){
            return json_encode(config('responsecode.params_error'),JSON_UNESCAPED_UNICODE);
        }else{
            $user = new Users();
            if($user->where('username',request('username'))->update(['password'=>base64_encode(request('password'))])){
                return json_encode(config('responsecode.change_user_pwd_success'),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(config('responsecode.change_user_pwd_error'),JSON_UNESCAPED_UNICODE);
            }
        }

    }

}