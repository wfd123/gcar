<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 5:13
 */

namespace app\index\controller;

use think\Db;
use think\Session;
class Change  extends Common
{

    public function _empty(){

        $this->redirect('index/index');
    }
    /*
     * 置换首页
     */
    public function index(){

        $city_pin = input('city');

        $city_info = $this->set_session_url($city_pin);

        if (empty($city_info)){

            $city_id = 1;

            $cityurl = 'zhengzhou';
        }else{

            $cityurl = $city_info['pin'];

            $city_id = $city_info['id'];
        }

        Session::set('cityurl',$cityurl);

        $domain = $this->request->domain();

        $city = Db::table('city')->where('status',1)->select();

        $this->assign('city',$city);
        $this->assign('domain',$domain);

        $er_car = $this->er_car($city_id);

        $brand = $this->brand();//品牌

        //dump( $er_car);die;

        $this->assign('er_car',$er_car);
        $this->assign('brand',$brand);

        return $this->fetch();


    }

    /*
     * [Displace 置换]
     */
    public function displace(){

        if ($this->request->isPost()){

            $data = $this->params;

            //dump($data);die;

            //$old_brand = $data['old_brand'];//旧车品牌
            $old_brand = 19;
            // $old_sys = $data['old_sys'];//旧车车系
            $old_sys = 854;
            $name = $data['name'];//名称
            $phone = $data['phone'];//手机号码
            $code = $data['code'];
            $cartype_id = $data['cartype_id'];//想置换的车型id

            if(!$old_sys || !$old_brand || !$name || !$phone || !$code){

                $this->return_msg('204','请填写完整信息');
            }

            $this->check_username($phone);

            $this->check_code($data['phone'],$data['code']);

//        $add['old_brand'] = $old_brand;
//        $add['old_sys'] = $old_sys;
//        $add['name'] = $name;
//        $add['phone'] = $phone;
//       // $add['cartype_id'] = $cartype_id;
//        $add['status'] = 1;
//        $add['create_time'] = 11;

            $res = Db::table('displace_car')->insert([

                'old_brand' =>$old_brand,
                'old_sys' =>$old_sys,
                'name' =>$name,
                'phone' =>$phone,
                'cartype_id' =>$data['cartype_id'],
                'status' =>1,
                'create_time' =>date("Y-m-d H:i:s",time()),
            ]);

            if($res){

                $this->return_msg('200','提交成功');
            }else{

                $this->return_msg('200','提交失败，请重新上传');
            }
        };


    }
}