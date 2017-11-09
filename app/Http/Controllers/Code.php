<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Code extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1 声明MIME类型
        header('content-type:image/jpeg');
        //2 准备画布
        $img=imagecreatetruecolor(200,50);
        //设置背景颜色
        //选择颜色
        $bgcolor=imagecolorallocate($img,rand(126,255),rand(126,255),rand(126,255));
        //填充颜色
        imagefill($img,0,0,$bgcolor);
        //4 画画或者写字
        //画干扰点
        for($i=0;$i<500;$i++){
            $color=imagecolorallocate($img,rand(0,125),rand(0,125),rand(0,125));
            imagesetpixel($img,rand(0,200),rand(0,50),$color);
        }
        //写字
        $str='345678ertyadfghkxcvbnmERTYADFGHBNM';
        $l=strlen($str)-1;
        $code='';
        for($i=0;$i<4;$i++){
            $color=imagecolorallocatealpha($img,rand(0,125),rand(0,125),rand(0,125),rand(30,80));
            imagettftext($img,35,rand(-40,40),$i*40+rand(15,20),35,$color,'./font/simkai.ttf',$c=$str[rand(0,$l)]);
            $code.=$c;
        }

        session(['code'=>strtolower($code)]);
        imagejpeg($img);
        imagedestroy($img);
    }
}
