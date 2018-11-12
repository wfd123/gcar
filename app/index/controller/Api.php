<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15 0015
 * Time: 下午 7:02
 */

namespace app\index\controller;
use think\Db;

//此类用于新增接口
class Api extends Common
{
    /*
     * 卖车
     * app 卖车接口
     * http://39.106.67.47/new_api/User/Salecar/Sale
     * 图片暂时无法接受
     */
    public function sale_car(){

        /*接收参数*/
        $data =  $this->params;

        $phone = $this->check_username($data['user_phone']);

        if ($phone !== 'phone'){

           $this->return_msg('201','手机号不正确');
        }

        $data['create_time'] = date("Y:m:d H:i:s",time());



        $res = Db::table('sale_car')->insert(['phone'=>$data['user_phone'],'create_time'=>$data['create_time']]);


        $this->success('index/sell');

    }
}