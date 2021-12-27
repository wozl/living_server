<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//live_url实体类
class LiveUrl extends Model
{

    //表名
    public $table = 'live_url';

    //指定id
    public $primaryKey = 'id';

    //自动维护时间
    public $timestamps = true;

    //自定义时间格式(这里默认时间戳)
    protected $dateFormat = 'U';

    /*//手动指定插入字段，不指定时使用created方法插入数据会失败
    protected $fillable=['name','url','icon'];*/

    //将指定属性转换为常见的数据类型(存入数据库前转换/从数据库总查询后转换后返回给客户端)
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}