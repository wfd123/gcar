<?php

namespace app\index\controller;

use think\Db;
use logs\newLog;
use think\Session;
use think\Cookie;

class User  extends Common {

    /*
     * 展示登录
     */
    public function car_login(){

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

        $this->assign('brand',$brand);
        return $this->fetch();

    }

    /*
     * 退出
     */
    public function car_logout(){

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

        Session::clear();
        Cookie::delete('phone');
        Cookie::delete('user_id');

        // $this->return_msg('200','退出成功');

        $this->redirect("$domain");
    }

    /*
     * 店铺装修
     */
    public function person_manage(){
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

        $user_id = Session::get('user_id');

        //获取店铺的数据
        $shop_info=Db::table("user_shop")->where("user_id",$user_id)->find();

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        $this->assign('shop_info',$shop_info);
        return $this->fetch();

    }


    /**
     * 店铺装修
     */
    public function change_shopinfo(){

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
        /*接收参数*/
        $data =  $this->params;

        $user_id = Session::get('user_id');

        if (empty($user_id)){

            $this->return_msg('400','请登录');
        }

        //获取店铺的数据
        $shop_info=Db::table("user_shop")->where("user_id",$user_id)->find();
        // dump($shop_info);die;
        if ($shop_info){


            $info['shop_name']=$shop_name=$data['shop_name'];
            $info['shop_address']=$shop_address=$data['shop_address'];
            $info['shop_phone']=$shop_phone=$data['shop_phone'];

            $data['open_time'] = $data['startTiem'] ."-".$data['endTiem'];
            $info['open_time']=$open_time=$data['open_time'];
            $info['shop_desc']=$shop_desc=$data['shop_desc'];
//        $info['latitude']=$latitude=$data['lat'];
//        $info['longitude']=$longitude=$data['lng'];
            if( !$shop_name || !$shop_address || !$shop_phone || !$open_time || !$shop_desc){

                $this->return_msg('204','参数不能为空');
            }

            if (empty($data['door_photo'])){
                $info['mimg'] = $shop_info['mimg'];
            }else{
                $info['mimg'] = $this->upload_file($data['door_photo'],'door_photo');
            }


//        $info['mimg']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$door_photo);
//        if($info['mimg']==$door_photo){
//            $info['mimg']=str_replace("http://39.106.67.47/butler_car/Uploads/relecar/","",$door_photo);
//        }


            //修改真实的姓名
            //$res1=M("user")->save(array("user_id"=>$shop_info['user_id'],"username"=>$name));
            //修改店铺的信息

            //  dump($info);die;
            $res=Db::table("user_shop")->where('shop_id',$shop_info['shop_id'])->update([
                "shop_name" =>$info['shop_name'],
                "shop_address" =>$info['shop_address'],
                "shop_phone" =>$info['shop_phone'],
                "open_time" =>$info['open_time'],
                "shop_desc" =>$info['shop_desc'],
//                "mimg" =>$info['mimg'],
                "startTiem" =>$data['startTiem'],
                "endTiem" =>$data['endTiem'],
            ]);

        }else{

            // $data['shop_id'] = 50;

            //$info['shop_id']=$shop_id=$data['shop_id'];
            // $name=$data['name'];
//            $door_photo=$data['door_photo'];
            $info['shop_name']=$shop_name=$data['shop_name'];
            $info['shop_address']=$shop_address=$data['shop_address'];
            $info['shop_phone']=$shop_phone=$data['shop_phone'];

            $data['open_time'] = $data['startTiem'] ."-".$data['endTiem'];
            $info['open_time']=$open_time=$data['open_time'];
            $info['shop_desc']=$shop_desc=$data['shop_desc'];
//        $info['latitude']=$latitude=$data['lat'];
//        $info['longitude']=$longitude=$data['lng'];
            if( !$shop_name || !$shop_address || !$shop_phone || !$open_time || !$shop_desc){

                $this->return_msg('204','参数不能为空');
            }

//            $info['mimg'] = $this->upload_file($data['door_photo'],'door_photo');
//        $info['mimg']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$door_photo);
//        if($info['mimg']==$door_photo){
//            $info['mimg']=str_replace("http://39.106.67.47/butler_car/Uploads/relecar/","",$door_photo);
//        }


            //修改真实的姓名
            //$res1=M("user")->save(array("user_id"=>$shop_info['user_id'],"username"=>$name));
            //修改店铺的信息

            //  dump($info);die;
            $res=Db::table("user_shop")->insert([
                "user_id" =>$user_id,
                "qid" =>0,
                "mimg" => $this->upload1('mimg'),
                "yimg" =>'default',
                "shop_address" =>$info['shop_address'],
                "shop_phone" =>$info['shop_phone'],
                "latitude" =>'0',
                "longitude" =>'0',
                "frname" => 'default',
                "frphone" => 'default',
                "status" => 1,
                "open_time" =>$info['open_time'],
                "shop_desc" =>$info['shop_desc'],
                "is_tj" => 0,
                "is_yx" => 0,
                //"mimg" =>$info['mimg'],
                "startTiem" =>$data['startTiem'],
                "endTiem" =>$data['endTiem']
            ]);
        }

        $this->return_msg('200','成功');
    }

    /*
     * 发布车辆信息
     */
    public function person_release(){

        //处理城市问题
        if (request()->isPost()) {
            $data = input('post.');
            $data['subface_img'] = $this->upload2($data['subface_img']);
            $data['car_desc'] = strip_tags($data['car_desc']);
            $insert = Db::table('rele_car')->insert($data);
            if($insert) {
                return $this->success('发布成功');
            } else {
                return $this->error('发布失败');
            }
        }
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

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        //  dump($subface);die;

        $age=$this->get_car_allage();//车龄

        $licheng=$this->car_mileage();//里程

        $output=$this->output('');//排量

        $gearbox=$this->gearbox('');//变速箱

        $blowdown=$this->blowdown('');//排放标准

        $fuel=$this->fuel('');//燃料

        $car_body=$this->car_body('');//车身

        $car_drive=$this->car_drive('');//燃气

        $color =$this->color('');//颜色
        $brand = $this->brand();//品牌

        $ABC = $this->app_brand_ios();//A b c  按车型排序

        $session = Session::get('user_id');
        $shop_name = Db::name('company_apply_list')->where(['user_id' => $session])->find();
        $this->assign('shop_name',$shop_name);

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
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
    /**
     * [pulish_add 发布]
     * @return [type] [description]
     */
//    public function pulish_adds()
//    {
//        dump(input('post.'));die;
//    }

    public function pulish_adds(){

        $data = $this->params;


        // dump($data);die;

        $user_id = Session::get('user_id');
        $user_id = 45;
        $add['user_id'] = $user_id;
        $data['brand_id'] = 19;
        $add['brand_id'] = $brand_id = $data['brand_id'];
        $data['sys_id'] = 850;
        $add['sys_id'] = $sys_id = $data['sys_id'];
        $data['cartype_id'] = 50;
        $add['cartype_id'] = $cartype_id = $data['cartype_id'];

        $brand=Db::table("car_brand")->field("name")->where("id",$brand_id)->find();
        $sys=Db::table("car_brand")->field("name")->where("id",$sys_id)->find();
        $cartype=Db::table("car_brand")->field("name")->where("id",$cartype_id)->find();
        //获取配置信息
        $param=Db::table("param")->where("brand='".$brand['name']."' and sys='".$sys['name']."' and cartype='".$cartype['name']."'")->find();

        $add['price'] = $price = $data['price'];
        if (!empty($data['news_price'])){
            $add['news_price'] = $news_price = $data['news_price'];
        }else{
            $add['news_price'] = $news_price =0;
        }
        // $add['news_price'] = $news_price = $data['news_price'] ? $data['news_price'] : 0;
        $add['car_mileage'] = $car_mileage = $data['car_mileage'];
        // $add['year_inspect'] = $year_inspect = $_POST['year_inspect'];
        //$add['safe'] = $safe = $_POST['safe'];

        $add['car_body'] = $car_body = $data['car_body'];
        //$add['car_age'] = $car_age = $_POST['car_age'];
        $add['car_drive'] = $car_drive = $data['car_drive'];
        $add['fuel'] = $fuel = $data['fuel'];
        $add['output'] = $output = $data['output'];
        $add['gearbox'] = $gearbox = $data['gearbox'];
        $add['subface'] = $subface = $data['subface'];
        $add['color'] = $color = $data['color'];
        $add['car_cardtime'] = $car_cardtime = $data['car_cardtime'];

        // $car_cardtime = "2018年-10月-01日";

        $add['car_age'] = $car_age=$this->get_car_agess($car_cardtime);

        $add['blowdown'] = $blowdown = $data['blowdown'];
        $add['contact'] = $contact = $data['contact'];
        $add['phone'] = $phone = $data['phone'];
        $subface_img = $data['subface_img'];
        $data['car_desc'] = "无重大事故";
        $add['car_desc'] = $car_desc = $data['car_desc'];
        // $this->ajaxReturn($add);
        if(!$brand_id || !$sys_id || !$cartype_id || !$price || !$car_mileage || !$car_age
            || !$gearbox || !$subface || !$color || !$car_cardtime
            || !$contact || !$phone || !$subface_img ){

            $this->return_msg('204','参数错误，请检查');

        }


        $add['year_inspect'] = $year_inspect = $this->get_year_inspect($car_cardtime);
        if(!$year_inspect){

            $this->return_msg('204','参数错误，请检查');
        }
        $add['safe'] = $safe = $this->safe($car_cardtime);
        if(!$safe){

            $this->return_msg('204','参数错误，请检查');
        }

        //获取图片

        //处理多张图片

        $head_img_path = $this->upload($subface_img,'door_photosA');

        //  dump($head_img_path);

        $add['subface_img'] = implode(",", $head_img_path);

        // dump($add['subface_img']);die;

//        $domain = $this->request->domain();
//
//        $add['subface_img'] = $domain.$head_img_path;

        //   $add['subface_img'] = $this->upload_file($subface_img,'door_photosA');

//        dump($add);die;
//        $add['img_512'] = $this->upload_file($subface_img,'door_photosB');
//
//        $add['img_300'] = $this->upload_file($subface_img,'door_photoss');

        //    $add['subface_img'] = $this->get_uplodes_imgs($subface_img);
//        $add['img_512'] = $this->get_uplodes_imgs_512($subface_img);
//        $add['img_300'] = $this->get_uplodes_imgs_300($subface_img);
        // dump($add);die;
        //   分期
//        if($car_age<6 and $price>=3){
//            $add['pay20_s2']=number_format($val['price']*0.2,2);
//            $add['pay20_y2']=number_format($val['price']*0.8/36*10000,2);
//        }


        //获取城市
        $add['city_id'] = $city_id=Db::table("user_shop")->where("user_id",$user_id)->value("city_id");

        //dump($add['city_id']);
        $b = $this->get_brand_firm_sysname($cartype_id,5);
        $add['name_li'] = $b['brand'].$b['sysname'].$b['carname'];
        $add['status'] = 2;
        $add['up_under'] = 1;
        $add['create_time'] = $add['update_time'] = date("Y-m-d H:i:s",time());

        //dump($add);

        $res = Db::table('rele_car')->insertGetId([

            "user_id" => $user_id,
            "brand_id" => $brand_id,
            "sys_id" => $sys_id,
            "cartype_id" => $cartype_id,
            "price" =>  $add['price'],
            "news_price" => $add['news_price'],
            "car_mileage" => $add['car_mileage'],
            "car_body" => $add['car_body'],
            "car_drive" =>  $add['car_drive'],
            "fuel" =>  $add['fuel'],
            "output" =>  $add['output'],
            "gearbox" =>  $add['gearbox'],
            "subface" => $add['subface'],
            "color" => $add['color'],
            "car_cardtime" => $add['car_cardtime'],
            "car_age" => $add['car_age'],
            "blowdown" =>  $add['blowdown'],
            "contact"=>  $add['contact'],
            "phone" => $add['phone'],
            "car_desc" =>  $data['car_desc'],
            "year_inspect" =>  $add['year_inspect'],
            "safe" => $add['safe'],
            "subface_img" => $add['subface_img'],
            "city_id"=> $add['city_id'],
            "name_li" =>$add['name_li'],
            "status"=> $add['status'],
            "up_under" => $add['up_under'],
            "update_time"=> $add['create_time'],
            "create_time" => $add['update_time'],

        ]);

        // dump($res);die;
        if($res){
            //dump($param);die;
            if($param){

                Db::table("rele_car")->insert(['pu_id'=>$res,'years'=>$param['years']]);


                //添加
                Db::table("rele_param")->insert([

                    "pu_id"=>$res,
                    "param_id"=>$param['id'],
                    "create_time"=>time(),
                    "type"=>2
                ]);
            }

            $this->return_msg('200','添加成功,可继续发布');
            //$this->success('添加成功,可继续发布','user/person_release');
        }else{

            //$this->error('失败');

            // $this->return_msg('400','失败');
        }

    }
    /*
     * 展示登录
     */
    public function person_public(){


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
        $data = $this->params;
        //获取user_id
        $user_id = Session::get('user_id');

        $user_id = 22;
        $shop_info=Db::table("user_shop")->field("shop_id,qid,mimg")->where("user_id",$user_id)->find();

        if($shop_info['qid']!=2){

            $this->return_msg('200','用户参数错误');
        }
        //分页
        if (empty($data['page'])){

            $page = 1;
        }else{

            $page = $data['page'];
        }
        if (empty($data['page_size'])){

            $page_size = 10;
        }else{

            $page_size = $data['page_size'];
        }

        $min_num=($page-1)*$page_size;

        $status = 0;
        $up_under = 0;

        $all_car =$this->my_shop_fabu($user_id,$min_num,$page_size,$status,$up_under);//审核通过

        $status = 1;
        $fabu_car =$this->my_shop_fabu($user_id,$min_num,$page_size,$status);//审核通过

        $status = 2;
        $dai_audit =$this->my_shop_fabu($user_id,$min_num,$page_size,$status);//待审核

        $status = 3;
        $no_audit =$this->my_shop_fabu($user_id,$min_num,$page_size,$status);//审核未通过

        // dump($no_audit);die;
        $up_under = 2;
        $status = 4;
        $del_audit =$this->my_shop_fabu($user_id,$min_num,$page_size,$status,$up_under);//删除
        // dump($del_audit);die;

        $all_car = $all_car?$all_car:array();
        $fabu_car = $fabu_car?$fabu_car:array();
        $dai_audit = $dai_audit?$dai_audit:array();
        $no_audit = $no_audit?$no_audit:array();
        $del_audit = $del_audit?$del_audit:array();

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);


        $this->assign('all_car',$all_car);
        $this->assign('fabu_car',$fabu_car);
        $this->assign('dai_audit',$dai_audit);
        $this->assign('no_audit',$no_audit);
        $this->assign('del_audit',$del_audit);

        return $this->fetch();

    }
    /*
     * 商家入驻
     */
    public function person_busenter(){

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

        //$brand = $this->brand();//品牌
        $ABC = $this->app_brand_ios();//A b c  按车型排序
        $brand = $this->brand();//品牌
        $session = Session::get('user_id');
        $edit = Db::name('company_apply_list')->where(['user_id' => $session])->find();
        $this->assign('edit',$edit);
        $this->assign('ABC',$ABC);
        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 商家入驻
     * http://39.106.67.47/new_api/User/newapi/business_entry
     */
    public function business_entry1(){
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

        /*接收参数*/
        $data =  $this->params;

        /* 检查验证码*/

        // $this->check_code($data['user_phone'],$data['code']);

        //dump($data);die;

        $door_photo=$this->upload_file($data['door_photo'],'door_photo');

        $shop_licence=$this->upload_file($data['shop_licence'],'shop_licence');

        $data['door_photo'] = $door_photo;

        $data['shop_licence'] = $shop_licence;


        //$city=$lng=$data['city'];
        //城市
        //$data['city_id']=$this->city_id();
        $data['city_id']=1;
        $data['user_id'] = Session::get('user_id');

        //dump($data['user_id']);die;

        $info = Db::table('company_apply_list')->insert([
            'user_id' =>$data['user_id'],
            'name' =>$data['name'],
            'phone' =>$data['phone'],
            'shop_name' =>$data['shop_name'],
            'business_range' =>$data['business_range'],
            'type' =>$data['type'],
            'address' =>$data['address'],
//            'lat' =>$data['lat'],
//            'lng' =>$data['lng'],
            'door_photo' =>$data['door_photo'],
            'shop_licence' =>$data['shop_licence'],
            'city_id' =>$data['city_id'],
            'create_time' =>date('Y-m-d H:i:s',time()),

        ]);

        if ($info ){

            $this->return_msg('200','添加成功 待审核');

            // $this->success('添加成功 待审核','user/person_busenter',1);

        }else{
            $this->return_msg('400','失败');
            //$this->error('失败');
        }


//        $city=$lng=$data['city'];
//        //城市
//        $info['city_id']=$this->get_city($city);
        // 此处需要注意 框架途径不一致
//        $info['door_photo']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$door_photo);
//        $info['shop_licence']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$shop_licence);
//        $info['create_time']=time();

    }

    public function business_entry()
    {
        $session = Session::get('user_id');
        if(request()->isPost()) {
            $data = input('post.');
            if($_FILES['door_photo']['tmp_name']) {
                $data['door_photo'] = $this->upload1('door_photo');
            }
            if($_FILES['shop_licence']['tmp_name']) {
                $data['shop_licence'] = $this->upload1('shop_licence');
            }
            $user_shop = Db::table('company_apply_list')->where(['user_id' => $session])->find();
            if($user_shop) {
                Db::table('company_apply_list')->where(['user_id' => $session])->update($data);
                echo '成功';
                /*if($update) {
                    return $this->success('入驻成功');
                } else {
                    return $this->error('入驻失败');
                }*/
            } else {
                $data['user_id'] = $session;
                Db::table('company_apply_list')->insert($data);
                echo '成功';
                /*if($insert) {
                    return $this->success('入驻成功');
                } else {
                    return $this->error('入驻失败');
                }*/
            }
        }
        $edit = Db::name('company_apply_list')->where(['user_id' => $session])->find();
        $this->assign('edit',$edit);
    }

    /*
     * 展示商机
     */
    public function person_opportunity(){
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

        //获取店铺的userID
        $user_id = Session::get('user_id');

        $user_id = 19;

        $data =  $this->params;

        if(empty($data['page'])){
            $page=1;

        }else{
            $page= $data['page'];
        }

        //  $page=$_POST['page']?$_POST['page']:1;


        //查找预约信息
        $num1=($page-1)*10;
        $infos=Db::table("bespeak_car")->field("bespeak_id as id,pu_id,phone,create_time,status,user_id,car_name,type")->where("shop_id=".$user_id." and phone !=''")->order('status asc,create_time desc')->select();
        $infos2=Db::table("phone_list")->field("id,pu_id,create_time,status,user_id,userid,type")->where("user_id=".$user_id." and userid !=0")->select();


        foreach($infos2 as $k=>$v){
            //获取用户的phone
            $userinfo=Db::table("user")->field("user_id,phone")->where("user_id=".$v['userid'])->find();
            $infos2[$k]['phone']=$userinfo['phone'];
            $infos2[$k]['car_name']="";
            unset($infos2[$k]['userid']);
        }
        $infos=$infos?$infos:array();
        $infos2=$infos2?$infos2:array();

        $list=array_merge($infos,$infos2);

        $infos=array_slice($list,$num1,10);

        if($infos){
            //获取车辆信息
            foreach ($infos as $k => $val) {

                $data=Db::table("rele_car")->field('name_li,img_512')->where("pu_id",$val['pu_id'])->find();

                $infos[$k]['name']=$data['name_li']?$data['name_li']:$val['car_name'];

                $url = $this->get_carimgs($data['img_512']);

                //dump($url['0']);die;
                if (!empty($url['0'])){

                    $infos[$k]['img_url']=$url['0'];
                }

                unset($infos[$k]['pu_id']);
                unset($infos[$k]['user_id']);
                if($infos[$k]['car_name']==""){
                    $infos[$k]['car_name']="";
                }
                if($infos[$k]['name']==""){
                    $infos[$k]['name']="";
                }
            }

            $infos = $infos?$infos:array();

        }else{

            $this->return_msg('205','暂时没有数据');

        }

        //dump($infos);die;

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);

        $this->assign('infos',$infos);
        return $this->fetch();

    }

    //店铺预约列表
    public function bespeak_car(){
        //获取店铺的userID
        $user_id=$_POST['user_id'];
        $page=$_POST['page']?$_POST['page']:1;
        //验证
        $is_exit=M("user")->where("user_id=".$user_id)->find();
        if(!$is_exit){
            $data = array (
                'code'   => 204,
                'result' => '参数错误，请检查'
            );
            $this->ajaxReturn($data);
        }
        //查找预约信息
        $num1=($page-1)*10;
        $infos=M("bespeak_car")->field("bespeak_id as id,pu_id,phone,create_time,status,user_id,car_name,type")->where("shop_id=".$user_id." and phone !=''")->order('status asc,create_time desc')->select();
        $infos2=M("phone_list")->field("id,pu_id,create_time,status,user_id,userid,type")->where("user_id=".$user_id." and userid !=0")->select();
        //echo M("phone_list")->getlastsql();die;
        foreach($infos2 as $k=>$v){
            //获取用户的phone
            $userinfo=M("user")->field("user_id,phone")->where("user_id=".$v['userid'])->find();
            $infos2[$k]['phone']=$userinfo['phone'];
            $infos2[$k]['car_name']="";
            unset($infos2[$k]['userid']);
        }
        $infos=$infos?$infos:array();
        $infos2=$infos2?$infos2:array();
        $list=array_merge($infos,$infos2);
        $infos=array_slice($list,$num1,10);
        if($infos){
            //获取车辆信息
            foreach ($infos as $k => $val) {
                $data=M("rele_car")->field('name_li')->where("pu_id=".$val['pu_id'])->find();
                $infos[$k]['name']=$data['name_li']?$data['name_li']:$val['car_name'];
                unset($infos[$k]['pu_id']);
                unset($infos[$k]['user_id']);
                if($infos[$k]['car_name']==""){
                    $infos[$k]['car_name']="";
                }
                if($infos[$k]['name']==""){
                    $infos[$k]['name']="";
                }
            }
            // echo M("bespeak_car")->getlastsql();
            $data = array (
                'code'   => 200,
                'body' => $infos?$infos:array()
            );
        }else{
            $data = array (
                'code'   => 205,
                'result' => '暂时没有数据'
            );
        }
        $this->ajaxReturn($data);
    }
    /*
     * 展示个人信息
     */
    public function person_info(){

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



        $phone = Session::get('phone');

        if ($phone){

            $brand = $this->brand();//品牌

            $res = Db::table('user')->where('phone',$phone)->find();

            $this->assign('brand',$brand);

            $this->assign('res',$res);
            return $this->fetch();

        }else{

            $this->return_msg('400','跳转');

            //$this->redirect('car_login');
        }


    }
    /*
     * 展示收藏
     */
    public function person_collect(){

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

        $phone = Session::get('phone');

        if(empty($phone)){

            $this->return_msg('200','请登录');

            // $this->success('请登录','user/car_login',1);
        }
        $userid = Session::get('user_id');

        //dump($userid);die;

        $newcar = $this->car_collect_list(1,$userid);
        $twocar = $this->car_collect_list(2,$userid);
        $zerocar = $this->car_collect_list(3,$userid);

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        $this->assign('newcar',$newcar);
        $this->assign('twocar',$twocar);
        $this->assign('zerocar',$zerocar);
        return $this->fetch();

    }
    /*
     * 收藏执行
     */
    public function collect_car(){

        $data =  $this->params;

        $userid = Session::get('user_id');

        $phone = Session::get('phone');

        // dump($data);die;

        if(empty($phone)){

            $this->return_msg('400','未登录');
        }

        $where['type'] = $data['type'];

        $where['userid'] = $userid;

        $where['cheid'] = $data['cheid'];

        $info = Db::table('car_collect')->where($where)->find();


        if ($info){

            // $this->return_msg(400,'已收藏');
            $this->error('已收藏');
        }

        if (empty($data['type'])){

            $data['type'] = 0;
        }
        if (empty($data['cheid'])){
            $data['cheid'] = 0;
        }

        if (empty($data['brand_id'])){
            $data['brand_id'] = 0;
        }
        if (empty($data['sys_id'])){
            $data['sys_id'] = 0;
        }
        if (empty($data['cartype_id'])){
            $data['cartype_id'] = 0;
        }
        if (empty($data['img'])){
            $data['img'] = 0;
        }
        if (empty($data['name'])){
            $data['name'] = 0;
        }
        if (empty($data['price'])){
            $data['price'] = 0;
        }
        if (empty($data['paitime'])){
            $data['paitime'] = 0;
        }
        if (empty($data['licheng'])){
            $data['licheng'] = 0;
        }
        if (empty($data['shoufu'])){
            $data['shoufu'] = 0;
        }
        if (empty($data['yuegong'])){
            $data['yuegong'] = 0;

        }

        $res = Db::table('car_collect')->insert([
            'userid'=>$userid,
            'type'=>$data['type'],
            'cheid'=>$data['cheid'],
            'brand_id'=>$data['brand_id'],
            'sys_id'=>$data['sys_id'],
            'cartype_id'=>$data['cartype_id'],
            'img'=>$data['img_url'],
            'name'=>$data['name'],
            'price'=>$data['price'],
            'paitime'=>$data['paitime'],
            'licheng'=>$data['licheng'],
            'shoufu'=>$data['shoufu'],
            'yuegong'=>$data['ygong'],
        ]);

        if ($res){
            $this->return_msg('200','收藏成功');
            // $this->error('收藏成功');
        }



        //$this->return_msg(200,'收藏成功');

    }

    /*
     * 收藏删除
     */
    public function collect_del(){

        $phone = Session::get('phone');

        if(empty($phone)){

            $this->success('请登录','user/car_login',1);
        }

        $data = $this->params;

        $res = Db::table('car_collect')->where('id',$data['id'])->setField('is_del',1);

        if ($res){

            //$this->error('删除成功');

            $this->return_msg(200,'删除成功');

        }else{

            //$this->error('删除失败');

            $this->return_msg(400,'失败');
        }

    }
    /*
     * 浏览记录
     */
    public function person_history(){

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

        $session_userid = Session::get('user_id');

        $phone = Cookie::get('phone');

        if(empty($phone)){

            $this->return_msg('400','请登录');

            //$this->success('请登录','user/car_login',1);
        }

        $newcar = $this->car_history(1,$session_userid);

        $oldcar = $this->car_history(2,$session_userid);

        $zerocar = $this->car_history(3,$session_userid);

        $brand = $this->brand();//品牌

        $this->assign('newcar',$newcar);
        $this->assign('oldcar',$oldcar);
        $this->assign('zerocar',$zerocar);

        $this->assign('brand',$brand);

        return $this->fetch();

    }

    /*
     * 浏览记录删除
     */
    public function person_his_del(){

        $id = input('id');

        $phone = Session::get('phone');

        if(empty($phone)){

            $this->return_msg('400','请登录');
        }

        $res = Db::table('car_liulan_history')->where('id',$id)->setField('is_del',1);

        if ($res){

            $this->return_msg('200','删除成功');

            // $this->success('删除成功','user/person_history',1);

        }else{
            $this->return_msg('400','删除失败');
            //$this->error('删除失败');
        }

    }
    /*
     * 意见反馈
     */
    public function person_feedback(){

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

        /*接收参数*/
        if($this->request->isPost()){

            $data =  $this->params;

            $res = Db::table('advises')->insert(['name'=>$data['name'],'telephone'=>$data['phone'],'content'=>$data['con'],'create_date'=>time()]);

            if ($res){

                //$this->success('意见反馈已收到','user/person_feedback');

                $this->return_msg(200,'意见反馈已收到 谢谢');

            }else{

                // $this->error('失败');

                $this->return_msg(400,'失败');
            }


        }
        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 展示我的预约
     * my_appointment
     * 我的预约
     * http://39.106.67.47/new_api/User/newapi/my_appointment
     * user_id
     * type 代表类型 如新车//type类型1.新车，2.二手车，3.0首付
     * page
     * page_size
     */

    public function person_order(){
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

        /*接收参数*/
        $user_id   = input('param.user_id');
        $type = input('param.type');
        $page   = input('param.page');
        $page_size    = input('param.page_size');

        $user_id   = 5;
        $type = 2;
        $page   = 1;
        $page_size    = 10;
        $type=$type?$type:1;
        $min_num=($page-1)*$page_size;
        //type类型1.新车，2.二手车，3.0首付
        $list=array();
        if($type==1){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=1")->select();
            if(!$appointmen){
                $appointmen=array();
            }
            $newcar_info=Db::table("new_car_consult3")->field("id,car_id as cheid,create_time")->where("user_id=$user_id and car_id!= ''")->select();
            if(!$newcar_info){
                $newcar_info=array();
            }
            $appointmen=array_merge($appointmen,$newcar_info);

            foreach ($appointmen as $key => $val) {
                //新车
                $car_info=Db::table("new_car")->field("id,name,cartype_id,price,can_price,pay30_s2,img_300")->where("id=".$val['cheid'])->select();
                foreach ($car_info as $k => $v) {
                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],2);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['id']=$v['id'];
                    $res['price']=$v['price'];
                    $res['can_price']=$v['can_price'];
                    $res['pay30_s2']=$v['pay30_s2'];
                    $list[]=$res;
                }
                $list=array_slice($list,$min_num,$page_size);

            }

        }elseif($type==2){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=2")->select();
            if(!$appointmen){
                $appointmen=array();
            }
            //获取二手车预约信息
            $relecar_info=Db::table("bespeak_car")->field("bespeak_id as id,pu_id as cheid,create_time")->where("user_id=$user_id and pu_id != ''")->select();
            if(!$relecar_info){
                $relecar_info=array();
            }
            $appointmen=array_merge($appointmen,$relecar_info);

            foreach ($appointmen as $key => $val) {
                //二手车
                $where['pu_id'] = $val['cheid'];

                $field = 'a.pu_id,a.name_li,a.cartype_id,a.price,a.car_cardtime,a.car_mileage,a.img_300,b.shop_name';

                $join = [['user_shop b','b.user_id = a.user_id']];

                $car_info = Db::table('rele_car')->alias('a')->join($join)->field($field)->where($where)->select();

                foreach ($car_info as $k => $v) {

                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],1);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['car_mileage']=$v['car_mileage'];
                    $res['pu_id']=$v['pu_id'];
                    $res['price']=$v['price'];
                    $res['car_cardtime']=$v['car_cardtime'];
                    $res['shop_name']=$v['shop_name'];
                    $list[]=$res;
                }
            }
            $list=array_slice($list,$min_num,$page_size);
            //print_r($list);die;
        }elseif($type==3){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=3")->select();
            if(!$appointmen){
                $appointmen=array();
            }
            $lcar_info=Db::table("l_car_consult")->field("id,car_id as cheid,create_time")->where("user_id=$user_id and car_id!= ''")->select();
            if(!$lcar_info){
                $lcar_info=array();
            }
            $appointmen=array_merge($appointmen,$lcar_info);
            foreach ($appointmen as $key => $val) {
                //0首付
                $car_info=Db::table("l_car")->field("id,name,cartype_id,price,can_price,img_300")->where("id=".$val['cheid'])->select();
                foreach ($car_info as $k => $v) {
                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],2);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['id']=$v['id'];
                    $res['price']=$v['price'];
                    $res['can_price']=$v['can_price'];
                    $list[]=$res;
                }
            }


            $list=array_slice($list,$min_num,$page_size);

        }

        // dump($list);die;
        $brand = $this->brand();//品牌

        $this->assign('list',$list);
        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 密码登录
     */

    public function login(){

        /* 接收参数*/
        $data = $this->params;

        /* 检测用户名*/

        $this->check_username($data['user_phone']);

        $user_name_type = 'phone';

        switch ($user_name_type){
            case 'phone':


                $this->check_exist($data['user_phone'],'phone',1);

                $where['phone'] = $data['user_phone'];

                $db_res = Db::table('user')->field('user_id,token,salt,phone,password,nickname,header_pic,sex,birthday,qq_token,weixin_token')->where($where)->find();

                break;

        }

        $pwd = md5($data['user_pwd'].$db_res['salt']);

        if ($db_res['password'] !== $pwd){

            $this->return_msg(400,'用户名或者密码不正确');

        }else{



//            $log = new newLog('booklog');
//
//            $log ->reclog(" 登录时间: ".date('Y-m-d H:i:s',time()));
//
//            $log ->reclog("登录者 : ".$db_res['phone']);

            if (!empty($data['zidong'])){

                Cookie::set('user_id',$db_res['user_id'],604800);
                Cookie::set('phone',$db_res['phone'],604800);

            }else{

                Cookie::set('user_id',$db_res['user_id']);
                Cookie::set('phone',$db_res['phone']);

            }


            Session::set('user_id',$db_res['user_id']);

            Session::set('phone',$db_res['phone']);

            unset($db_res['login_password']); //密码永不返回

            $this->return_msg('200','登录成功');
            //$this->redirect('index/user/person_manage');
        }

    }

    /*
     * 验证码登录
     */
    public function login_sms(){


        $data = $this->params;

        /* 检查验证码*/

        $this->check_code($data['user_phone'],$data['code']);

        $where['phone'] = $data['user_phone'];

        $db_res = Db::table('user')->field('user_id,token,salt,phone,password,nickname,header_pic,sex,birthday,qq_token,weixin_token')->where($where)->find();

        $log = new newLog('booklog');

        $log ->reclog(" 验证码登录时间: ".date('Y-m-d H:i:s',time()));

        $log ->reclog("登录者 : ".$db_res['phone']);

        $salt = $this->randStr();
        $sos = 888888;

        //modify by wangsibo  手机验证码登录 不存在当前用户，自动注册成为会员
        if (empty($db_res)){
            $user_id = Db::table('user')->insert(['token'=>md5($sos.$salt),
                'salt'=>$salt,
                'phone'=>$data['user_phone'],
                'password'=>md5($sos.$salt),
                'create_time'=>date('Y-m-d H:i:s',time()),
                'sos'=>$sos,
                'login_type'=>1], false, true);
        } else {
            $user_id = $db_res["user_id"];
        }

        if (!empty($data['zidong'])){
            Cookie::set('user_id',$db_res['user_id'],604800);
            Cookie::set('phone',$db_res['phone'],604800);
        }else{
            Cookie::set('user_id',$db_res['user_id']);
            Cookie::set('phone',$db_res['phone']);
        }

        if (empty($user_id)){
            $this->return_msg(400,'登录失败');
        }else{
            Session::set('user_id',$user_id);
            Session::set('phone',$data['user_phone']);
            unset($db_res['login_password']); //密码永不返回
            $this->return_msg(200,'登录成功');
        }
    }
    /*
     * @time
     * @user_name
     * @user_phone
     * @user_pwd
     * code
     * @token/9ba62c26993ad3aa1ec94ba0616fd0cf
     * 大致规则如下
     * salt 值 二十六字符加数字
     * sos 默认是888888
     * password md5($password.$salt)
     * token md5(888888.$salt)
     * create_time=date('Y-m-d H:i:s',time())
     * login_type=1;1手机号，2 微信 ，3 qq
     */

    public function register(){

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

    public function register_ok(){

        if ($this->request->isPost()){


            $data = $this->params;

            /* 检查验证码*/


            $this->check_code($data['user_phone'],$data['code']);

            /* 检测用户名*/

            $user_name_type = $this->check_username($data['user_phone']);

            switch ($user_name_type){

                case 'phone':
                    $this->check_exist($data['user_phone'],'phone',0);

                    $data['user_phone'] = $data['user_phone'];

                    break;
                case 'email':

                    $this->check_exist($data['user_phone'],'email',0);

                    $data['user_email'] = $data['user_phone'];
                    break;
            }

            /* 将用户信息写入数据库*/

            $data['create_time'] = date('Y-m-d H:i:s',time());

            $salt = $this->randStr();

            $password = md5($data['user_pwd'].$salt);

            $sos = 888888;

            $token = md5($sos.$salt);

            //$data['reg_device'] = $this->request->ip();

            $res = Db::table('user')->insert(['token'=>$token,'salt'=>$salt,'phone'=>$data['user_phone'],'password'=>$password,'create_time'=>$data['create_time'],'sos'=>$sos,'login_type'=>1]);

            if (!$res){



                $this->return_msg(400,'用户注册失败');

            }else{

                //$this->success('注册成功请登录','user/car_login');

                $this->return_msg(200,'用户注册成功');
            }

        }

    }

    /*
     * 上传用户头像
     */

    public function upload_head_img(){

        /*接受参数*/
        $data = $this->params;
        /*上传文件，获得路径*/

        $head_img_path = $this->upload_file($data['user_icon'],'head_img');


        /*存入数据库*/
        $res = Db::name('user')->where('user_id',$data['user_id'])->setField('header_pic',$head_img_path);

        if ($res){

            $this->return_msg(200,'上传头像成功'.$head_img_path);

        }else{

            $this->return_msg(400,'上传头像失败');
        }
    }



    /*
     * 修改密码
     */

    public function change_pwd(){

        /*接受参数*/

        $data = $this->params;

        $data['user_phone'] = Session::get('phone');
        /*检查用户名并取出密码*/

        $user_name_type = $this->check_username($data['user_phone']);

        switch ($user_name_type){

            case 'phone':
                $this->check_exist($data['user_phone'],'phone',1);

                $where['phone'] = $data['user_phone'];

                break;
        }

        $this->check_code($data['user_phone'],$data['code']);

        /*判断原始密码是否正确*/

        $db_ini_pwd = Db::name('user')->where($where)->find();

        if($db_ini_pwd['password'] !== md5($data['user_ini_pwd'].$db_ini_pwd['salt'])){

            $this->return_msg(400,'原始密码错误');
        }
        /*把新的密码存入数据库*/

        $res = Db::name('user')->where($where)->setField('password',md5($data['user_pwd'].$db_ini_pwd['salt']));

        /*注意 密码相同 返回0 强制转换为false 失败也是false*/
        if ($res !== false){

            $this->return_msg(200,'修改成功');

        }else{

            $this->return_msg(400,'修改失败');
        }


    }

    /*
     * 找回密码
     */

    public function forgetpwd(){

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

    /*
     * 找回密码
     */

    public function find_pwd()
    {
        /*接受参数*/
        $data = $this->params;
        /*检测验证码*/
        $this->check_code($data['user_phone'],$data['code']);

        /*检测用户名*/

        $user_name_type = $this->check_username($data['user_phone']);

        switch ($user_name_type){
            case 'phone':
                $this->check_exist($data['user_phone'],'phone',1);

                $where['phone'] = $data['user_phone'];
                break;

            case 'email':
                $this->check_exist($data['user_name'],'email',1);

                $where['email'] = $data['user_name'];
                break;
        }
        /*修改数据库*/

        $user_info = Db::name('user') ->where('phone',$data['user_phone'])->find();

        $password = md5($data['user_pwd'].$user_info['salt']);

        $res = Db::name('user')->where($where)->setField('password',$password);


        if ($res !== false){

            $log = new newLog('booklog');

            $log ->reclog(" 登录时间: ".date('Y-m-d H:i:s',time()));

            $log ->reclog("登录者 : ".$user_info['phone']);

            Session::set('user_id',$user_info['user_id']);

            Session::set('phone',$user_info['phone']);

            unset($user_info['login_password']); //密码永不返回

            // $this->redirect('user/person_manage');

            //$this->success('密码已找回，登录中','user/person_manage');

            $this->return_msg(200,'找回成功');

        }else{

            $this->return_msg(400,'找回失败');
        }

    }

    //绑定手机号
    public function bind_phone(){

        /*接受参数*/
        $data = $this->params;
        /*检查验证码*/
        $this->check_code($data['phone'],$data['code']);

        /*修改数据库*/

        $user_id = Session::get('user_id');

        $res = Db::name('user')->where('user_id',$user_id)->setField('phone',$data['phone']);

        if ($res !== false){


            Session::set('phone',$data['phone']);
            //$this->success('绑定成功','person_info');

            $this->return_msg(200,'绑定成功');

        }else{
            //$this->error('绑定失败');

            $this->return_msg(400,'绑定失败');
        }
    }

    //绑定邮箱
    public function bind_email(){

        /*接受参数*/
        $data = $this->params;
        /*检查验证码*/
        $this->check_code($data['email'],$data['code']);

        /*修改数据库*/

        $res = Db::name('user')->where('user_id',$data['user_id'])->setField('phone',$data['email']);

        if ($res !== false){

            $this->return_msg(200,'绑定成功');

        }else{

            $this->return_msg(400,'绑定失败');
        }
    }

    /*
     * 绑定用户名
     */
    public function bind_username(){

        /*接收参数*/

        $data = $this->params;

        /*检测验证码*/
        $this->check_code($data['user_name'],$data['code']);
        /*判断用户名*/

        $user_name_type = $this->check_username($data['user_name']);

        switch ($user_name_type){

            case 'phone':
                $type_text = '手机号';

                $update_data['user_phone'] = $data['user_name'];

                break;

            case 'phone':
                $type_text = '邮箱';

                $update_data['user_email'] = $data['user_name'];

                break;
        }

        $res = Db::name('user')->where('user_id',$data['user_id'])->update($update_data);


        if ($res !== false){

            $this->return_msg(200,'绑定成功');

        }else{

            $this->return_msg(400,'绑定失败');
        }

    }

    /*
     * 绑定用户昵称
     * @param
     *
     */

    public function set_nickname(){

        /*接收参数*/

        $data =  $this->params;
        /*检测昵称不能重复*/
        $res = Db::name('user')->where('nickname',$data['user_nickname'])->find();

        if ($res){

            $this->return_msg(400,'用户昵称已存在');

        }

        /*写入数据库*/

        $res = Db::name('user')->where('user_id',$data['user_id'])->setField('nickname',$data['user_nickname']);


        if ($res){

            $this->return_msg(200,'成功');

        }else{

            $this->return_msg(400,'失败');
        }

    }

    /*
     * 获取用户信息
     */

    public function get_user_info(){

        /*接收参数*/

        $data =  $this->params;

        $this->check_exist($data['user_phone'],'phone',1); //检测用户是否存在

        $res = Db::name('user')->field('user_id,phone,')->where('phone',$data['user_phone'])->find();

        if ($res === false){

            $this->return_msg(400,'查询失败');
        }elseif (empty($res)){

            $this->return_msg(200,'暂无数据');

        }else{


            $return_data['user_info'] = $res;

            $this->return_msg(200,'查询成功',$return_data);
        }
    }

    /*
     * 设置 头像 昵称 所在地 性别 出生年月
     * 一次性设置
     * 上面为单一设置
     */
    public function set_userinfo()
    {

        // if ($this->request->isPost()){

        /*接收参数*/

        $data =  $this->params;

        //dump($data);die;

        $phone = Session::get('phone');

        $this->check_exist($phone,'phone',1); //检测用户是否存在

        if (empty($phone)){

            $this->return_msg('400','未登录');
        }

        if ($data['nickname']){

            $nickname = Db::table('user')->where('phone',$phone)->setField(['nickname'=>$data['nickname']]);
        }
        if ($data['address']){

            $address = Db::table('user')->where('phone',$phone)->setField(['address'=>$data['address']]);

        }
        if ($data['sex']){

            $sex = Db::table('user')->where('phone',$phone)->setField(['sex'=>$data['sex']]);
        }
        if ($data['birthday']){

            $birthday = Db::table('user')->where('phone',$phone)->setField(['birthday'=>$data['birthday']]);

        }

        if (!empty($data['header_pic'])){

            $head_img_path = $this->upload_file($data['header_pic'],'head_img');

            //处理多张图片

//                $head_img_path = $this->upload($data['header_pic'],'head_img');
//
//                $head_img_path = implode(",", $head_img_path);
//                dump($head_img_path);die;
            $domain = $this->request->domain();
//
            $head_img_path = $domain.$head_img_path;


            $header_pic = Db::table('user')->where('phone',$phone)->setField(['header_pic'=>$head_img_path]);

        }

        $this->return_msg('200','修改成功');

        //$this->success('修改成功','person_info')

    }

    public function set_userinfo1()
    {
        $session = Session::get('phone');
        if(request()->isPost()) {
            $data =  $this->params;
            if($_FILES['header_pic']['tmp_name']) {
                $data['header_pic'] = $this->upload1('header_pic');
            }
            Db::name('user')->where(['phone' => $session])->update($data);
            echo '成功';
            /*if(json($update)) {
                return $this->success('修改成功','user/index');
            } else {
                return $this->error('修改失败');
            }*/
        }
        $edit = Db::table('user')->where(['phone' => $session])->find();
        $this->assign('edit',$edit);
    }

    /*
     * 二手车详情页
     * cheid   rele_car表中pu_id
     */

    public function rele_car_detail(){

        /*接收参数*/
        $data =  $this->params;

        $cheid=$data['cheid'];

        //获取车辆信息
        $carinfo=Db::table("rele_car")->field("pu_id,user_id,brand_id,sys_id,cartype_id,price,car_mileage,car_age,output,gearbox,car_cardtime,blowdown,subface_img,img_512,car_desc,pay20_s2,pay20_y2,pay20_n2,city_id")->where("pu_id=$cheid")->find();
        //echo M("rele_car")->getlastsql();

        $carinfo['brand_name']=Db::table("car_brand")->where("id=".$carinfo['brand_id']." and level=1")->value('name');


        $carinfo['sys_name']=Db::table("car_brand")->where("id=".$carinfo['sys_id']." and level=3")->value('name');
        $carinfo['img_url']=$this->get_carimgs($carinfo['subface_img'],1);
        $carinfo['img_512']=$this->get_carimgs($carinfo['img_512'],1);
        $carinfo['gearbox']=$this->get_gearbox($carinfo['gearbox']);
        $carinfo['output']=$this->get_output($carinfo['output']);
        $carinfo['car_age']=$this->get_car_age($carinfo['car_age']);
        //$carinfo['color']=get_color($carinfo['color']);
        $carinfo['blowdown']=$this->get_blowdown($carinfo['blowdown']);
        $pay20_s2=$carinfo['pay20_s2']?$carinfo['pay20_s2']:"--";
        $pay20_y2=$carinfo['pay20_y2']?$carinfo['pay20_y2']:"--";
        $carinfo['pay20_n2']=$carinfo['pay20_n2']?$carinfo['pay20_n2']:"36";
        if($carinfo['pay20_s2']!=0){
            $carinfo['pay20_s2']=$carinfo['pay20_s2'];
        }else{
            $carinfo['pay20_s2']="--";
        }
        if($carinfo['pay20_y2']!=0){
            $carinfo['pay20_y2']=$carinfo['pay20_y2'];
        }else{
            $carinfo['pay20_y2']="--";
        }
        $carinfo['car_mileage']=$carinfo['car_mileage'];
        //dump($carinfo['car_mileage']);die;
        //获取新车价格参数
        //$new_price=Db::table("param")->field('id,info_1')->where("cartype_id=$cheid")->find();
        $new_price['info_1'] = "";//新增代码
        $carinfo['new_price']=$new_price['info_1']?$new_price['info_1']:"";
        //获取品牌，厂商，名字
        $carinfo['car_name']=$this->get_carname($carinfo['cartype_id']);
        //获取店铺的详情
        $shopinfo=Db::table("user_shop")->field("shop_id,shop_name,mimg,shop_address,shop_phone,qid,latitude as lat,longitude as lng")->where("user_id=".$carinfo['user_id'])->find();
        //获取店铺de平均评分
        $remark_info=Db::table("remark")->field("id,all_score")->where("shop_id=".$shopinfo['shop_id'])->select();
        $all_score="";
        foreach ($remark_info as $k => $v) {
            $all_score+=$v['all_score'];
        }
        $user_num=count($remark_info);
        $num=@number_format($all_score/$user_num,1);
        $shopinfo['all_score']=$num?$num:0;
        $shopinfo['user_num']=$user_num?$user_num:0;
        $shopinfo['img_url']=$this->get_carimg($shopinfo['mimg']);
        //点评
        $remark=Db::table("remark")->field("id,user_id,content,create_time,all_score")->where("shop_id=".$shopinfo['shop_id'])->order("create_time desc")->find();
        if(!$remark){
            $remark['id']="";
            $remark['content']="";
            $remark['all_score']="0";
            $remark['create_time']="0";//新增
        }

        $remark['create_time']=substr($remark['create_time'], 0, 10)?substr($remark['create_time'], 0, 10):"";
        //获取用户的信息
        $userinfo=Db::table("user")->field("user_id,nickname,header_pic,phone")->where("user_id=".$remark['user_id'])->find();
        if($userinfo['header_pic']){
            $header_pic=get_carimg($userinfo['header_pic']);
        }else{
            $header_pic="";
        }
        $remark['header_pic']=$header_pic?$header_pic:"";
        $remark['nickname']=$userinfo['nickname']?$userinfo['nickname']:($userinfo['phone']?$userinfo['phone']:"");
        $remark['user_id']=$userinfo['user_id']?$userinfo['user_id']:"";
        unset($carinfo['subface_img']);
        unset($carinfo['user_id']);
        $result=array(
            "carinfo"=>$carinfo,
            "shopinfo"=>$shopinfo?$shopinfo:array(),
            "remark"=>$remark,
            'platform_phone'=>"0371-53375515"
        );
        $data=array(
            "code"=>200,
            "result"=>"获取成功",
            "body"=>$result
        );

        dump( $data);
//        $this->ajaxReturn($data);

    }
    /*
     * 卖车接口
     * http://39.106.67.47/new_api/User/Salecar/Sale
     */

    public function sale_car(){

        $data = $this->params;

        //  姓名
        if (!empty($data['name'])){
            $name = $data['name'];
        }else{
            $name = 0;
        }


        $phone = $data['phone']; //手机号码
        // $code = $_POST['code']; //验证码
        // $img_id = $_POST['img_id']; //图片文件

        $res = 	Db::table('sale_car')->insert(['name'=>$name,'phone'=>$phone,'status'=>1,'create_time'=>time()]);

        if($res){

            $this->return_msg('200','成功');

        }else{

            $this->return_msg('400','失败');

        }

    }

    public function asd1()
    {

        $data = $this->params;
        $brand_id = $data['brand_id'];
        $sys_id = $data['sys_id'];
        $city = $data['city'];

        $city_id=$this->get_city($city);


        //二手车信息
        $rele_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,city_id,img_300")->where("brand_id=$brand_id and sys_id=$sys_id and city_id=$city_id")->order("create_time desc")->limit(10)->select();

        //  dump( Db::table('rele_car')->getLastSql());


        foreach ($rele_car as $k => $v) {
            $rele_car[$k]['name']=$this->get_carname($v['cartype_id']);
            $rele_car[$k]['car_cardtime']=substr($v['car_cardtime'], 0 , 7);
            $rele_car[$k]['car_mileage']=$v['car_mileage']."万公里";
            $rele_car[$k]['city'] = Db::table("city")->where("id=".$v['city_id'])->value("name");
            $rele_car[$k]['img_url']=$this->get_carimg($v['img_300'],1);
            unset($rele_car[$k]['cartype_id']);
            unset($rele_car[$k]['city_id']);
            unset($rele_car[$k]['img_300']);
        }

        dump($rele_car);

        echo json_encode($rele_car);die;
    }
    /*
     * 经销商
     */
    public function asd2()
    {
        $data = $this->params;
        $brand_id = $data['brand_id'];
        $sys_id = $data['sys_id'];
        $city = $data['city'];


        $city_id=$this->get_city($city);

        $firm_id=$this->get_firm($sys_id);
        //经销商
        $newcar_shop=Db::table("user_shop")->field("shop_id,shop_name,shop_address,shop_phone,latitude as lat,longitude as log")->where("qid=1 and city_id=$city_id and business_range like '%".$firm_id."%'")->select();

        dump( Db::table('user_shop')->getLastSql());

        echo json_encode($newcar_shop);
        dump($newcar_shop);die;

    }

    /*
     * 2018 2018
     */

    public function asd(){

        $data = $this->params;

        $brand_id = $data['brand_id'];
        $sys_id = $data['sys_id'];

        //print_r($data);die;
        //获取车系的图片
        $sys_info=Db::table("car_brand")->field("id,name,img_id")->where("id=$sys_id")->find();


        if($sys_info['img_id']){
            $sys_info['img_url']=$img_url=$this->get_carimg($sys_info['img_id'],3);
        }else{
            $sys_info['img_url']=$img_url="";
        }
        unset($sys_info['img_id']);

        //获取配置信息
        $sys_info['car_body']=$car_body=Db::table("param")->where("sys='".$sys_info['name']."'")->value("car_body");

        $sys_info['min_output']=$min_output=Db::table("param")->where("sys='".$sys_info['name']."'")->min("pliang1");

        $sys_info['max_output']=$max_output=Db::table("param")->where("sys='".$sys_info['name']."'")->max("pliang1");

        $price=Db::table("param")->field("id,price")->where("sys='".$sys_info['name']."'")->select();

        $a=0;
        foreach ($price as $k => $v) {
            $num=str_replace("万","",$v['price']);
            if($num>$a){
                $sys_info['max_price']=$max_price=$num."万";
            }else{
                $sys_info['min_price']=$min_price=$num."万";
            }
            $a=$num;
        }

        // dump(Db::table('rele_car')->getLastSql());
        echo json_encode($sys_info);
        dump($sys_info);die;


    }

    //品牌下二手车
    public function getcar_rele(){

        $brand_id = 19;
        $sys_id = 848;
        $city_id=$this->city_id();


        //二手车信息
        $rele_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,city_id,img_300")->where("brand_id=$brand_id and sys_id=$sys_id and city_id=$city_id")->order("create_time desc")->limit(10)->select();
        foreach ($rele_car as $k => $v) {
            $rele_car[$k]['name']=$this->get_carname($v['cartype_id']);
            $rele_car[$k]['car_cardtime']=substr($v['car_cardtime'], 0 , 7);
            $rele_car[$k]['car_mileage']=$v['car_mileage']."万公里";
            $rele_car[$k]['city']=Db::table("city")->where("id=".$v['city_id'])->value("name");
            $rele_car[$k]['img_url']=$this->get_carimg($v['img_300'],1);
            unset($rele_car[$k]['cartype_id']);
            unset($rele_car[$k]['city_id']);

            unset($rele_car[$k]['img_300']);
        }


        dump($rele_car);die;
        if($rele_car){
            $result=array(
                "code"=>200,
                "result" => "获取成功",
                "body" => $rele_car
            );
        }else{
            $result=array(
                "code"=>201,
                "result" => "暂时没有车源"
            );
        }
    }

    function get_area($ip = ''){
        if($ip == ''){
            $ip = GetIp();
        }
        $url = "http://ip.taobao.com/service/getIpInfo.php?ip={$ip}";
        $ret = $this->https_request($url);
        $arr = json_decode($ret,true);
        return $arr;
    }


    public function https_request($url,$data = null){
        $curl = curl_init();

        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);

        if(!empty($data)){//如果有数据传入数据
            curl_setopt($curl,CURLOPT_POST,1);//CURLOPT_POST 模拟post请求
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);//传入数据
        }

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }

    //车系下经销商
    public function getcar_dealer(){

        $brand_id = 19;
        $sys_id = 848;
        // $city = 郑州;

        $city_id=$this->city_id();
        $firm_id=$this->get_firm($sys_id);

        //经销商
        $newcar_shop=Db::table("user_shop")->field("shop_id,shop_name,shop_address,shop_phone,latitude as lat,longitude as log")->where("qid=1 and city_id=$city_id and business_range like '%".$firm_id."%'")->select();

        dump($newcar_shop);
    }

    /**
     *  新车车系
     */
    public function getcar_sys(){

        $brand_id = 19;
        $sys_id = 842;

        //print_r($data);die;
        //获取车系的图片
        $sys_info=Db::table("car_brand")->field("id,name,img_id")->where("id=$sys_id")->find();

        if($sys_info['img_id']){
            $sys_info['img_url']=$img_url=$this->get_carimg($sys_info['img_id'],3);
        }else{
            $sys_info['img_url']=$img_url="";
        }
        unset($sys_info['img_id']);
        //获取配置信息
        $sys_info['car_body']=$car_body=Db::table("param")->where("sys='".$sys_info['name']."'")->value("car_body");
        $sys_info['min_output']=$min_output=Db::table("param")->where("sys='".$sys_info['name']."'")->min("pliang1");

        $sys_info['max_output']=$max_output=Db::table("param")->where("sys='".$sys_info['name']."'")->max("pliang1");
        $price=Db::table("param")->field("id,price")->where("sys='".$sys_info['name']."'")->select();
        $a=0;
        foreach ($price as $k => $v) {
            $num=str_replace("万","",$v['price']);
            if($num>$a){
                $sys_info['max_price']=$max_price=$num."万";
            }else{
                $sys_info['min_price']=$min_price=$num."万";
            }
            $a=$num;
        }
        // print_r($sys_info);die;
        //获取车型
        //所有的年代

        //dump($sys_info);die;
        $years=array();
        $years_2018=$this->getcar_years($brand_id,$sys_id,"2018款");
        $years_2017=$this->getcar_years($brand_id,$sys_id,"2017款");
        if($years_2018){
            $years[0]["year"]="2018款";
            $years[0]["car_info"]=$years_2018?$years_2018:array();
        }
        if($years_2017){
            if($years[0]){
                $years[1]["year"]="2017款";
                $years[1]["car_info"]=$years_2017?$years_2017:array();
            }else{
                $years[0]["year"]="2017款";
                $years[0]["car_info"]=$years_2017?$years_2017:array();
            }
        }

        dump($sys_info);
        dump($years);die;
    }

    /**
     *  我的店铺
     */
    public function my_shop(){

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

        //获取user_id
        $user_id = Session::get('user_id');

        $user_id = 40;
        $shop_info=Db::table("user_shop")->field("shop_id,qid,mimg")->where('user_id',$user_id)->find();

        // dump($shop_info);die;
//        if($shop_info['qid']!=2){
//            $result = array (
//                'code'   => 204,
//                'result' => '用户参数错误',
//                'body' =>$user_id
//            );
//            echo json_encode($result);exit();
//        }
        $list['door_photo']=$this->get_carimg($shop_info['mimg']);
        $list['shop_id']=$shop_info['shop_id'];
        //获取商家推荐车辆
        $recommend_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300,create_time")->where("user_id = $user_id and up_under=1 and is_show = 1 and status = 1")->select();

        foreach ($recommend_car as $key => $val) {
            $recommend_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $recommend_car[$key]['img_url']=$this->get_carimg($val['img_300'],1);
            $recommend_car[$key]['car_mileage']=$val['car_mileage'];
            $recommend_car[$key]['create_time']=substr($val['create_time'], 0, 10);
            unset($recommend_car[$key]['cartype_id']);
            unset($recommend_car[$key]['img_300']);
            $list['recommend_car']=$recommend_car;
        }
        //获取发布的车辆
        $fabu_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300,create_time")->where("user_id = $user_id and up_under=1 and is_show != 1 and status = 1")->order("pu_id desc")->limit(10)->select();
        foreach ($fabu_car as $key => $val) {
            $fabu_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $fabu_car[$key]['img_url']=$this->get_carimg($val['img_300'],1);
            $fabu_car[$key]['car_mileage']=$val['car_mileage'];
            $fabu_car[$key]['create_time']=substr($val['create_time'], 0, 10);
            unset($fabu_car[$key]['cartype_id']);
            unset($fabu_car[$key]['img_300']);
            $list['fabu_car']=$fabu_car;
        }

        $list = $list?$list:array();

        dump($list);

    }


    public function upload1($imgName){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($imgName);

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }



}