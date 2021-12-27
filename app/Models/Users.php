<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{

    //数据库表名
    public $table='users';

    //手动指定数据库表主键,不使用自动维护主键
    public $primaryKey ='id';

    //使用laravel自动进行时间维护
    public $timestamps =true;

    //自定义时间格式(默认为时间戳)
    protected $dateFormat = 'U';

}
