<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\LiveUrl;
use Illuminate\Support\Facades\Storage;


class LiveUrlController extends Controller{

    //新增播放链接
    public function AddLiveUrl(){
        if(request()->has(['name','url','remarks'])){ //验证请求中是否包含必传参数
            if (request()->filled('name') && request()->filled('url') && request()->filled('remarks')){ //验证两个参数是否为空
                $live = new LiveUrl();
                $live->name=request('name'); //电视台名称
                $live->url=request('url'); //播放地址
                $live->icon=request('icon');//台标
                $live->remarks=request('remarks'); //备注
                if($live->save()){
                    return json_encode(array("meta"=>config('responsecode.add_live_success')),JSON_UNESCAPED_UNICODE);
                }else{
                    return json_encode(array("meta"=>config('responsecode.add_live_error')),JSON_UNESCAPED_UNICODE);
                }
            }else{ //为空时返回错误信息
                return json_encode(array("meta"=>config('responsecode.params_error')),JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(array("meta"=>config('responsecode.params_error')),JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * 获取所有直播地址(支持条件检索查询)
     * pageNum 当前页码(必选参数)
     * pageSize 每页显示多少条(必选参数)
     * query 查询条件
     */
    public function GetLiveUrlByParams(){
        //查询数据总条数
        $total=LiveUrl::all()->count();
        $pageNum=request()->get('pageNum'); //当前页
        $pageSize=request()->get('pageSize'); //每页条数
        if(request()->has(['pageNum','pageSize'])){ //判断是否包含必需参数
            if (request()->filled('startTime') && request()->filled('query') && request()->filled('endTime')){ //三个条件参数都存在时
                $query = request()->get('query');
                $startTime = (int)request()->get('startTime');
                $endTime = (int)request()->get('endTime');
                $total =LiveUrl::where('name','like',"%${query}%")
                    ->where('created_at','>=',$startTime)
                    ->where('created_at','<=',$endTime)
                    ->get()
                    ->count();
                $rep = LiveUrl::where('name','like',"%${query}%")
                    ->where('created_at','>=',$startTime)
                    ->where('created_at','<=',$endTime)
                    ->offset(($pageNum-1)*$pageSize)
                    ->limit($pageSize)
                    ->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
            }elseif (request()->filled('endTime') && request()->filled('query') && !request()->filled('startTime')){//包含结束时间和查询条件，但不包含开始时间
                $query = request()->get('query');
                $endTime = (int)request()->get('endTime');
                $total =LiveUrl::where('name','like',"%${query}%")->where('created_at','<=',$endTime)->get()->count();
                $rep = LiveUrl::where('name','like',"%${query}%")->where('created_at','<=',$endTime)->offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
            }elseif (request()->filled('endTime') && !request()->filled('query') && !request()->filled('startTime')){ //包含结束时间,但不包含开始时间和查询条件
                $endTime = (int)request()->get('endTime');
                $total=LiveUrl::where('created_at','<=',$endTime)->get()->count();
                $rep=LiveUrl::where('created_at','<=',$endTime)->offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
            }elseif (request()->filled('startTime') && request()->filled('query') && !request()->filled('endTime')){//包含开始时间和查询条件，但不包含结束时间
                $query = request()->get('query');
                $startTime = (int)request()->get('startTime');
                $total =LiveUrl::where('name','like',"%${query}%")->where('created_at','>=',$startTime)->get()->count();
                $rep = LiveUrl::where('name','like',"%${query}%")->where('created_at','>=',$startTime)->offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
            }elseif (request()->filled('startTime') && !request()->filled('query') && !request()->filled('endTime')){ //包含开始时间,但不包含结束时间和查询条件
                $startTime = (int)request()->get('startTime');
                $total=LiveUrl::where('created_at','>=',$startTime)->get()->count();
                $rep=LiveUrl::where('created_at','>=',$startTime)->offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
            }elseif(request()->filled('query')&& !request()->filled('startTime') && !request()->get('endTime')){ //仅按照搜索条件查询
                $query=request()->get('query'); //查询条件
                //模糊查询结果总数
                $total=LiveUrl::where('name','like',"%{$query}%")->get()->count();
                $rep=LiveUrl::where('name','like','%'.$query.'%')->offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(
                    array(
                        "meta"=>config('responsecode.live_url_info'),
                        "data"=>$rep,"total"=>$total,
                        "pageNum"=>$pageNum,
                        "pageSize"=>$pageSize),
                    JSON_UNESCAPED_UNICODE);
                return request()->get('pageNum');
            }else{ //无查询条件和时间范围查询时默认进行分页查询所有数据
                //分页查询
                $rep = LiveUrl::offset(($pageNum-1)*$pageSize)->limit($pageSize)->get();
                return json_encode(array("meta"=>config('responsecode.live_url_info'),
                    "total"=>$total,
                    "pageNum"=>$pageNum,
                    "pageSize"=>$pageSize,
                    "data"=>$rep),
                    JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(array("meate"=>config('responsecode.params_error'),
                "pageNum"=>$pageNum,
                "pageSize"=>$pageSize,
            ),JSON_UNESCAPED_UNICODE);
        }
    }

    //下载所有直播地址，动态生成配置文件
    public function DownLoadConfFile(){

        $data =LiveUrl::all();
        /**
         * 文件相关操作
         */
        //获取模本文件内容
        $mod=Storage::disk('public')->get('model.txt');
        $newmod=""; //动态配置文件内容
        foreach ($data as $dt){ //遍历对象,动态添加文件内容
            /**
             * str该字段是针对源地址是直接的rtmp的资源
             * str1是针对非rtmp源，需要按需时使用ffmpeg推送到本地rtmp服务器
             */
            /*$str="\r\n\t\tapplication $dt->remarks { #$dt->name
                    \t\t\tlive on; #开启实时直播
                    \t\t\tpull $dt->url; #从远端服务器拉取直播流
                    \t\t\tgop_cache on;
                    \t    }";*/
            $str1="\r\n\t\tapplication $dt->remarks { #$dt->name
                    \t\t\tlive on; #开启实时直播
                    \t\t\texec_pull /usr/local/ffmpeg/bin/ffmpeg  -re  -i $dt->url -vcodec copy  -acodec copy -bsf:a aac_adtstoasc  -f flv rtmp://127.0.0.1:1935/$dt->remarks/live; #从远端服务器拉取直播流推送到本地
                    \t\t\texec_kill_signal term; #无人观看时将拉起的ffmpeg进程结束
                    \t    }";
            $newmod.= $str1;

        }
        //获取模本文件中添加内容脚标位置
        $index = strrpos($mod,";")+1;
        //将动态内容添加到此处
        $newmod= substr_replace($mod,$newmod,$index,0);
        $exists=Storage::disk('public')->exists('/download/live.conf');
        if(!$exists){ //文件不存在时开始创建
            Storage::disk('public')->put('/download/live.conf',$newmod);
        }else{
            logger("文件已存在，开始删除旧文件!");
            Storage::disk('public')->delete('/download/live.conf');
            //存储新内容的文件
            Storage::disk('public')->put('/download/live.conf',$newmod);
        }
        //下载文件
        return Storage::download('/public/download/live.conf','live.conf');
    }

    //更新频道信息
    function UpdateLiveInfo(){
        if(!request()->has(['id','name','url','remarks'])){ //参数验证未通过
            return json_encode(array("meta"=>config('responsecode.params_error')),JSON_UNESCAPED_UNICODE);
        }else{
            $live=new LiveUrl();
            $arr =[
              "name"=>request('name'), //频道名称
              "url"=>request('url'), //直播地址
                "icon"=>request("icon"), //频道台标
              "remarks"=>request('remarks') //备注
            ];
            if($live->where('id',request('id'))->update($arr)){ //更新成功
                return json_encode(array("meta"=>config('responsecode.change_liveinfo_success')),JSON_UNESCAPED_UNICODE);
            }else{ //更新失败
                return json_encode(array("meta"=>config('responsecode.change_liveinfo_error')),JSON_UNESCAPED_UNICODE);
            }
        }
    }


    //按id删除频道
    function DelLiveInfo(){
        if(!request()->has(['id'])){ //请求参数不合法
            return json_encode(array("meta"=>config('responsecode.params_error')),JSON_UNESCAPED_UNICODE);
        }else{
            $live = new LiveUrl();
            if($live->where('id',request('id'))->delete()){
                return json_encode(array("meta"=>config('responsecode.del_liveinfo_success')),JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(array("meta"=>config('responsecode.del_liveinfo_error')),JSON_UNESCAPED_UNICODE);
            }
        }
    }

    //查询有限的数据
    function LiveInfoByQurty(){
        $live = new LiveUrl();
        $rep=$live->select('id','name','remarks','icon')->get();
        return json_encode(array("code"=>200,"msg"=>"success","data"=>$rep),JSON_UNESCAPED_UNICODE);
    }

}
