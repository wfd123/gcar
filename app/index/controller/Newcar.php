<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 上午 11:42
 */

namespace app\index\controller;

use think\Db;
use think\Session;

class Newcar extends Common
{

    /*
     * 空方法
     */
    public function _empty()
    {
        $this->redirect('index/index');
    }
    /*
     * 首页展示
     */
    public function index(){

        //处理城市问题

        $city_pin = input('city');
       // dump($city_pin);die;

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

       // $city_id = $this->city_id();

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $new_car = $this->new_car($city_id); //新车

       // dump($new_car);die;

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('new_car',$new_car);

        return $this->fetch();
    }

    /*
     * 新车详情
     */
    public function newcardetails(){

        //处理城市问题

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

        $data=$this->params;

       // dump($data);die;

        $cheid = $data['id'];


        //获取车辆的信息
        $newcar_info=Db::table("new_car")->field("id,img_ids,img_512,price,can_price,sale_num,brand_id,sys_id,cartype_id,pay10_s2,pay10_y2,pay10_n2,pay20_s2,pay20_y2,pay20_n2,pay30_s2,pay30_y2,pay30_n2,city_id")->where("id",$cheid)->find();
        if(!$newcar_info){
            echo '信息错误';
        }

        $brand_id = $newcar_info['brand_id'];
        $sys_id = $newcar_info['sys_id'];
        $cartype_id = $newcar_info['cartype_id'];

        $firm_id=$this->get_firm($sys_id);

        //dump($newcar_info);die;
        //图片

        $newcar_info['img_ids']=$this->get_carimgs($newcar_info['img_ids'],2);
        $newcar_info['img_512']=$this->get_carimgs($newcar_info['img_512'],2);
        //名称
        $sys=Db::table("car_brand")->where("id=$sys_id")->value("name");
        $cartype=Db::table("car_brand")->where("id=$cartype_id")->value("name");
        $newcar_info['name']=$sys." ".$cartype;
        //城市
        $newcar_info['city']=$city=Db::table("city")->where("id=".$newcar_info['city_id'])->value("name");
        //经销商
        //获取所有的店铺


        $field = 'shop_id,shop_name,shop_phone,shop_address,latitude as lat,longitude as log';


        $where['is_fenghao'] = 2;

        $where['qid'] = 1;

        $join = [['user b','a.user_id=b.user_id']];

        $shop = Db::table('user_shop')->alias('a')->join($join)->field($field)->where($where)->whereOr('business_range','like','%$firm_id%')->select();


//        $shop=M("user_shop")->table("user_shop as a")->join("user as b on a.user_id=b.user_id")->field("shop_id,shop_name,shop_phone,shop_address,latitude as lat,longitude as log")->where("b.is_fenghao=2 and a.qid=1 and a.business_range like '%".$firm_id."%'")->select();
//
//        //echo M("user_shop")->getlastsql();

        //获取车价格
        foreach ($shop as $k => $v) {

            $shop[$k]['shop_price']=$shop_price=Db::table("new_car")->where("brand_id=$brand_id and sys_id=$sys_id and cartype_id=$cartype_id and shop_id=".$v['shop_id'])->value("price");
        }

        //获取降价的店铺
        //$shop_discount=Db::table("user_shop")->table("user_shop as a")->join("user as b on a.user_id=b.user_id")->field("shop_id,shop_name,shop_phone,shop_address,latitude as lat,longitude as log")->where("b.is_fenghao=2 and a.qid=1 and a.business_range like '%".$firm_id."%'")->select();

        $fieldss = 'shop_id,shop_name,shop_phone,shop_address,latitude as lat,longitude as log';

        $shop_discount = Db::table('user_shop')->alias('a')->join($join)->field($fieldss)->where($where)->whereOr('business_range','like','%$firm_id%')->select();

        //获取车价格
        foreach ($shop_discount as $k => $v) {
            $shop_price=Db::table("new_car")->where("brand_id=$brand_id and sys_id=$sys_id and cartype_id=$cartype_id and shop_id=".$v['shop_id']." and is_discount=1")->value("price");
            $shop_can_price=Db::table("new_car")->where("brand_id=$brand_id and sys_id=$sys_id and cartype_id=$cartype_id and shop_id=".$v['shop_id']." and is_discount=1")->value("can_price");
            if($shop_price && $shop_can_price){
                $shop_discount[$k]['shop_price_cha']=$shop_price-$shop_can_price;
                $shop_discount[$k]['shop_price']=$shop_price;
                $shop_discount[$k]['shop_can_price']=$shop_can_price;
            }else{
                unset($shop_discount[$k]);
            }
        }

        $shop_discount=array_values($shop_discount);

        $carparam = $this->get_carparam($cheid,1);//详细配置

        $wherexi['sys_id'] = $sys_id;

        //$wherexi['id'] = array('not in',$cheid);

        $wherexi['city_id'] = $newcar_info['city_id'];


        $sys_cars = Db::table('new_car')->where($wherexi)->order('id desc')->select();

        if($sys_cars){
            foreach ($sys_cars as $key => $val) {
                $sys_cars[$key]['price'] = $val['price'] == 0.00 ? "未知" : $val['price'].'万';
                // 通过cartype_id查车系名和车型名称
                $sys_cars[$key]['name'] = $this->get_carname($val['cartype_id']);
                $sys_cars[$key]['img_url'] = $this->get_carimg(explode(',',$val['img_300'])[0],2);
                //unset($sys_cars[$key]['img_300']);
                //unset($sys_cars[$key]['cartype_id']);

            }
        }


        $shop_discount = $shop_discount?$shop_discount:array();
        $newcar_info = $newcar_info?$newcar_info:array();

       // dump($newcar_info);die;
        //获取新车浏览记录
        $userid = Session::get('user_id');
        if ($userid){

            $wherehis['userid'] = $userid;
            $wherehis['cheid'] = $cheid;
            $wherehis['type'] = 1;

            //dump($data['name']);die;

            $res = Db::table('car_liulan_history')->where($wherehis)->find();

            //   dump($data);die;

            if (empty($res)){

                Db::table('car_liulan_history')->insert(['userid'=>$userid,'brand_id'=>$brand_id,'type'=>1,'cheid'=>$cheid,'sys_id'=>$sys_id,'cartype_id'=>$cartype_id,'name'=>$newcar_info['name'],'price'=>$newcar_info['price'],'img'=>$newcar_info['img_ids']['0'],'shoufu'=>$newcar_info['pay10_s2'],'yuegong'=>$newcar_info['pay10_y2']]);
            }


        }
        $shop = $shop?$shop:array();
//        dump($shop_discount);
//
//        dump($shop);die;
        $brand = $this->brand();//品牌

       // dump($newcar_info);die;

        $this->assign('brand',$brand);
        $this->assign('shop_discount',$shop_discount);
        $this->assign('newcar_info',$newcar_info);
        $this->assign('shop',$shop);
        $this->assign('carparam',$carparam);
        $this->assign('sys_cars',$sys_cars);
        $this->assign('telephone','0371-53375515');

        return $this->fetch();

    }
}