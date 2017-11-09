<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class newsmodel extends Model
{
         	//设置模型的表名
   	public $table = 'news';
   	//设置白名单
   	protected $fillable = ['nstatus'];
    //从属关系
    public function country()
    {
        return $this->belongsTo('App\Http\Model\newsmodel','tid');
    }
}
