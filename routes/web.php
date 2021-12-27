<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('404');
});

//获取csrf token令牌
Route::get('/token',function (){
    return csrf_token();
});

//创建用户api
Route::any('/createUser',[\App\Http\Controllers\Web\UserController::class,'CreateUser']);

//用户登陆
Route::post('/login',[\App\Http\Controllers\Web\UserController::class,'Login']);

//修改密码
Route::post('/updatePwd',[\App\Http\Controllers\Web\UserController::class,'ChangePwd']);

//新增直播地址
Route::post('/addLive',[\App\Http\Controllers\Web\LiveUrlController::class,'AddLiveUrl']);

//更新直播地址信息
Route::post('/updateLiveInfo',[\App\Http\Controllers\Web\LiveUrlController::class,'UpdateLiveInfo']);

//获取所有直播地址(支持条件检索查询和分页)
Route::any('/getUrlInfo',[\App\Http\Controllers\Web\LiveUrlController::class,'GetLiveUrlByParams']);

//下载动态配置文件
Route::get('/downloadConfigFile',[\App\Http\Controllers\Web\LiveUrlController::class,'DownLoadConfFile']);

//按照id删除频道信息
Route::post('/delLiveInfoById',[\App\Http\Controllers\Web\LiveUrlController::class,'DelLiveInfo']);

//仅查询指定字段的数据
Route::any('/menuInfo',[\App\Http\Controllers\Web\LiveUrlController::class,'LiveInfoByQurty']);
