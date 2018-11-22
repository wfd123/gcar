<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 1:42
 */

namespace app\index\controller;

use Think\Db;
use think\Session;

class Twocar extends Common
{

    /*
     * 首页展示
     */
    public function index(){
        /*die;*/
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

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $age=$this->get_car_allage();//车龄

        $licheng=$this->car_mileage();//里程

        $output=$this->output('');//排量

        $gearbox=$this->gearbox('');//变速箱

        $blowdown=$this->blowdown('');//排放标准

        $fuel=$this->fuel('');//燃料

        $car_body=$this->car_body('');//车身

        $car_drive=$this->car_drive('');//燃气

        $color =$this->color('');//颜色


        //关于二手车
        $er_car = $this->er_car($city_id);//


        // $min_time = $this->lots_two_cars(7);//二手车 时间最新（默认）

        $min_price = $this->lots_two_cars(1);//二手 价格最低

        //dump($min_price);die;

        $min_age = $this->lots_two_cars(3);//二手 车龄最短

        $min_licheng = $this->lots_two_cars(6);//二手 里程最短

        $ABC = $this->app_brand_ios();//A b c  按车型排序
        $this->assign('min_price',$min_price);
        $this->assign('min_age',$min_age);
        $this->assign('min_licheng',$min_licheng);
        //dump($er_car);die;
        $where = [];

        $cat = Db::table('rele_car')->where($where)->where("status=1 and up_under=1 and city_id=$city_id")->order('pu_id asc')->paginate(12);
        $items = $cat->items();
        foreach ($cat as $k => $v){
            $items[$k]['news_price'] = Db::table('new_car')->where(['id' => $v['news_price']])->find();
        }
        $this->assign('items',$items);
        $this->assign('cat',$cat);

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('er_car',$er_car);
        $this->assign('ABC',$ABC);
        $this->assign('age',$age);
        $this->assign('licheng',$licheng);
        $this->assign('output',$output);
        $this->assign('gearbox',$gearbox);
        $this->assign('fuel',$fuel);
        $this->assign('blowdown',$blowdown);
        $this->assign('car_drive',$car_drive);
        $this->assign('car_body',$car_body);
        $this->assign('color',$color);

        return $this->fetch();
    }

    /*
     * 车型对比
     */
    public function car_compare(){

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
        $this->assign('brand',$brand);
        return $this->fetch();
    }

}