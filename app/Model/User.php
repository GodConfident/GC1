<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model
{
	use SoftDeletes;

    protected $table='user';
    public $dateFormat = 'U';

    public function userinfo()
    {
    	return $this->hasOne('\App\Model\UserInfo','uid');
    }
    public function usernick(){
    	return $this->belongsTo('\App\Model\UserInfo','uid','id');
    }

}
