<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class newstypemodel extends Model
{
     	//设置模型的表名
   	public $table = 'category';
   	// 设置主键
   	public $primaryKey = 'type_id';
   	//关闭自动维护字段
   	public $timestamps = false;
}
