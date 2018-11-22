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

//    /*
//     * 新车
//     */
//    public function newcar(){
//
//        $city_pin = input('city');
//
//        $city_info = $this->set_session_url($city_pin);
//
//        if (empty($city_info)){
//
//            $city_id = 1;
//
//            $cityurl = 'zhengzhou';
//        }else{
//
//            $cityurl = $city_info['pin'];
//
//            $city_id = $city_info['id'];
//        }
//
//        Session::set('cityurl',$cityurl);
//
//        $domain = $this->request->domain();
//
//        $city = Db::table('city')->where('status',1)->select();
//
//        $this->assign('city',$city);
//        $this->assign('domain',$domain);
//        return $this->fetch();
//    }

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

    public function search_newcar(){


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

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $output=$this->output('');//排量

        $gearbox=$this->gearbox('');//变速箱

        $blowdown=$this->blowdown('');//排放标准

        $fuel=$this->fuel('');//燃料

        $car_body=$this->car_body('');//车身

        $car_drive=$this->car_drive('');//燃气

        $color =$this->color('');//颜色

        $ABC = $this->app_brand_ios();//A b c  按车型排序

        //接受参数
        $data = $this->params;
        $where="1=1  and city_id =".$city_id;

        if (!empty($data['brand']) && $data['brand'] != "s" ) {
            $b_id = Db::table("car_brand")->field("id, name")->where('pin', 'eq', $data['brand'])->select();
            if (!empty($b_id)){
                $where.=" and brand_id = ".$b_id[0]["id"];
                $brand_name = $b_id[0]["name"];
            }
        }
        //模糊查找 如 大众 奥迪 朗逸
        if(!empty($data['key'])){
            $where.=" and name like '%".$data['key']."%'  ";
        }

        //级别suv
        if (!empty($data['subface'])){
            $where.=" and subface=".$data['subface'];
        }

        if(!empty($data['name'])){
            $where.=" order by id desc";
        }
        //
        if (!empty($data['brand_id'])){
            $where.=" and brand_id=".$data['brand_id'];
        }

        //汉字品牌  大众 奥迪
        if (!empty($data['brand_name'])){

            $where['name'] = $data['brand_name'];

            $where['level'] = 3;

            $bdata = Db::table('car_brand')->where($where)->select();

            $sys_id=$bdata['id'];
            $where.=" and sys_id=$sys_id ";

        }
        //
        if (!empty($data['chek'])){
            $where.=" and cartype_id=".$data['chek'];
            //echo $where;
        }
        //具体价格
        if(!empty($data['tprice'])){
            $where.=" and price=".$data['tprice'] ;
        }
        if(!empty($data['sys_id'])){
            $where.="and sys_id= ".$data['sys_id'];
        }

        //品牌 拼音
        if(!empty($data['pinpai'])){

            $where['level'] = 1;

            $where['pin'] = $data['pinpai'];

            $ppdata = Db::table('car_brand')->where($where)->select();
            foreach ($ppdata as $k => $v) {
                $bid = $ppdata['id'];
            }

            $where.=" and brand_id=$bid  ";
        }
        //车龄
        if(!empty($data['cheling'])){
            switch($data['cheling']){
                case 1;
                    $where.=" and car_age between 0 and 1";
                    break;
                case 2;
                    $where.="  and car_age between 0 and 2";
                    break;
                case 3;
                    $where.="  and car_age between 0 and 3";
                    break;
                case 4;
                    $where.="  and car_age between 3 and 5";
                    break;
                case 5;
                    $where.="  and car_age between 5 and 8";
                    break;
                case 6;
                    $where.="  and car_age > 8";
                    break;
            }
        }
        //里程
        if(!empty($data['licheng'])){
            switch($data['licheng']){

                case 2;
                    $where.=" and  car_mileage <=2";
                    break;
                case 3;
                    $where.=" and  car_mileage <=3";
                    break;
                case 4;
                    $where.=" and car_mileage between 3 and 5";
                    break;
                case 5;
                    $where.=" and car_mileage between 5 and 8";

            }

        }
        //颜色
        if (!empty($data['ys'])){
            $where.="and color=".$data['ys'];
        }

        //排量

        if (!empty($data['pailiang'])){
            $where.=" and output=".$data['pailiang'];
        }
        //变速箱
        if (!empty($data['bsx'])){
            $where.=" and gearbox= ".$data['bsx'];
        }
//            //排放标准 OBD 京V 欧V 国V  暂时废弃  表里没有改字段
//            if (!empty($data['pfbz'])){
//                $where.=" and blowdown= ".$data['pfbz'];
//            }

        //驱动 前驱 后驱 暂时废弃  表里没有改字段

//            if (!empty($data['qd'])){
//                $where.=" and car_drive=".$data['qd'];
//            }
//            //两厢 三箱 皮卡 旅行车
//            if (!empty($data['cs'])){
//                $where.=" and car_body=".$data['cs'];
//            }
        //汽油 柴油 油漆混合
        if (!empty($data['ny'])){
            $where.=" and fuel= ".$data['ny'];
        }
        // 进气方式
        if (!empty($data['jinqi'])){
            $where.=" and inlet_air= ".$data['jinqi'];
        }
        //百分之三十月供
        if (!empty($data['sy'])){
            switch($data['sy']){
                case 1;
                    $where.=" and pay30_s2 between 0 and 1";
                    break;
                case 2;
                    $where.=" and pay30_s2 between 1 and 2 ";
                    break;
                case 3;
                    $where.=" and pay30_s2 between 2 and 3";
                    break;
                case 4;
                    $where.=" and pay30_s2 between 3 and 4 ";
                    break;
                case 5;
                    $where.=" and pay30_s2 between 4 and 5";
                    break;
                case 6;
                    $where.=" and pay30_s2 >5 ";
                    break;
            }
        }

        //百分之三十月供
        if (!empty($data['yg'])){
            switch($data['yg']){
                case 1;
                    $where.=" and pay30_y2 between 0 and 0.1";
                    break;
                case 2;
                    $where.=" and pay30_y2 between 0.1 and 0.2 ";
                    break;
                case 3;
                    $where.=" and pay30_y2 between 0.2 and 0.3";
                    break;
                case 4;
                    $where.=" and pay30_y2 between 0.3 and 0.4 ";
                    break;
                case 5;
                    $where.=" and pay30_y2 between 0.4 and 0.5";
                    break;
                case 6;
                    $where.=" and pay30_y2 >0.5 ";
                    break;


            }
        }

        //价格级别
        if (!empty($data['price'])){
            switch($data['price']){
                case 2;
                    $where.=" and price <3";
                    break;
                case 3;
                    $where.=" and price between 3 and 5 ";
                    break;
                case 4;
                    $where.=" and price between 5 and 8 ";
                    break;
                case 5;
                    $where.=" and price between 8 and 12 ";
                    break;
                case 6;
                    $where.=" and price between 18 and 25";
                    break;
                case 7;
                    $where.=" and price between 25 and 40";
                    break;
                case 8;
                    $where.=" and price>40";
                    break;

            }
        }
        //月供级别
        if (!empty($data['yueg'])){
            switch($data['yueg']){
                case 1;
                    $where.=" and price <5";
                    break;
                case 2;
                    $where.=" and price between 5 and 8 ";
                    break;
                case 3;
                    $where.=" and price between 8 and 12";
                    break;
                case 4;
                    $where.=" and price between 12 and 18 ";
                    break;
                case 5;
                    $where.=" and price between 18 and 25";
                    break;
                case 6;
                    $where.=" and price between 25 and 40";
                    break;
                case 7;
                    $where.=" and price>40";
                    break;

            }
        }
        // 排序规则  筛选 月供由高到低 由低到高  价格 高低
        if (!empty($data['px'])){
            switch($data['px']){
                case 1;
                    $where.=" order by id  desc ";
                    break;
                case 2;
                    $where.=" order by price  asc ";
                    break;
                case 3;
                    $where.=" order by price  desc ";
                    break;
                case 4;
                    $where.=" order by pay30_y2  asc "; //月供由低到高
                    break;
                case 5;
                    $where.=" order by pay30_y2  desc ";//月供 由高到低
                    break;
                case 6;
                    $where.=" order by pay30_s2   asc ";//首付 由低到高
                    break;
                case 7;
                    $where.=" order by pay30_s2  desc ";//首付由高到低
                    break;

            }

        }
//        $wheres = [];
//        if(input('brand')) {
//            $wheres['brand_id'] = input('brand');
//        } else {
//            $wheres = '';
//        }

        $wher = [];
        $min = input('minprice');
        $max = input('maxprice');
        if($min && $max) {
            $wher['price'] =  $min  . '>' . 'and'  . '<'  . $max;
        } else {
            $wher = '';
        }
        $ss = Db::table('new_car')->where($wher)->where($where)->limit(20)->select();
        foreach ($ss as $key => $val) {
            $ss[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $ss[$key]['name']=$this->get_carname($val['cartype_id']);
            $ss[$key]['pay10_s2']=$val['pay10_s2'];
            $ss[$key]['pay10_y2']=$val['pay10_y2'];
            unset($ss[$key]['img_300']);
        }
        $this->assign('brand_name',empty($brand_name)?"": $brand_name);
        $this->assign('city',$city);
        $this->assign('domain',$domain);
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('ABC',$ABC);
        $this->assign('output',$output);
        $this->assign('gearbox',$gearbox);
        $this->assign('fuel',$fuel);
        $this->assign('blowdown',$blowdown);
        $this->assign('car_drive',$car_drive);
        $this->assign('car_body',$car_body);
        $this->assign('color',$color);
        $this->assign('ss',$ss);

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