<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 9:03
 */

namespace app\index\controller;

use think\Db;
use think\Session;

class Shop extends Common
{

    public function _empty(){

        $this->redirect('index/index');

    }

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

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $age = $this->get_car_allage();//车龄

        $new_car = $this->new_car($city_id); //新车

        //dump($new_car);die;

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('age',$age);
        $this->assign('new_car',$new_car);

        return $this->fetch();
    }

    /*
     * 在售车源
     */

    public function shop_list(){


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

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $age = $this->get_car_allage();//车龄

        $er_car = $this->er_car($city_id); //二手车
        //dump($er_car);die;
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('age',$age);
        $this->assign('er_car',$er_car);

        return $this->fetch();
    }

    /*
     * 公司信息
     */

    public function shop_info(){

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

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('brand',$brand);

        return $this->fetch();
    }

    /*
     * 公司评论
     */
    public function add_comment(){


        $lables = Db::table('remark_lable')->select();



        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        $this->assign('lables',$lables);
        return $this->fetch();

    }

    /**
     * 点评
     */
    public function remark(){

        /*接收参数*/
        $data =  $this->params;
        if(!$data){

            $this->return_msg('203','参数不能为空');
        }

        $user_id = Session::get('user_id');

        $shop_id=$data['shop_id'];//shop id

        $all_score=$data['all_score'];//综合评分

        $car_score=$data['car_score'];//车源真实


        $serve_score=$data['serve_score'];//服务态度
        $seller_score=$data['seller_score'];//商家专业
        $content=$data["content"];//评论内容
        $have_ls=$data["have_ls"];//联系1.否，2.是
        $have_shop=$data["have_shop"];//到点1.否，2.是
        $have_buy=$data["have_buy"];//购车1.否，2.是
        $lable=$data['lable'];

        // print_r($all_score);die;
        if(!$shop_id || !$user_id || !$all_score || !$car_score || !$serve_score || !$seller_score || !$content || !$have_ls || !$have_shop || !$have_buy || !$lable){

            $this->return_msg('204','参数不能为空');
        }
        $create_time=date('Y-m-d H:i:s',time());
        //添加记录表
      //  $res1=M("remark")->add($info);

        $res1 = Db::table('remark')->insert([

                                   'shop_id'=>$shop_id,
                                   'user_id'=>$user_id,
                                   'all_score'=>$all_score,
                                   'car_score'=>$car_score,
                                   'serve_score'=>$serve_score,
                                   'seller_score'=>$seller_score,
                                   'content'=>$content,
                                   'have_ls'=>$have_ls,
                                   'have_shop'=>$have_shop,
                                   'have_buy'=>$have_buy,
                                   'create_time'=>$create_time,
                            ]);

        //处理标签 循环添加
       $lable=explode(",", $lable);
        foreach ($lable as $k => $v) {
            $arr=array(
                "user_id"=>$user_id,
                "shop_id"=>$shop_id,
                "lable_id"=>$v,
                "create_time"=>$create_time
            );
            $res2 = Db::table("remark_lable_choose")->insert($arr);
        }

        if($res1 && $res2){

            $this->return_msg('200','点评成功');

        }else{

            $this->return_msg('200','点评失败');
        }

    }

}