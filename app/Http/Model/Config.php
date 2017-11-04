<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //设置模型的表名
    public $table = 'webinfo';
    //关闭自动维护字段 created_at updated_at
    public $timestamps = false;
    //不可被批量赋值的属性 名单
    protected $guarded = [];
}
