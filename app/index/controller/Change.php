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
    public function liandong()
    {
        if(request()->isAjax()) {
            $id = input('id');
            $car = Db::table('rele_car')->where(['brand_id' => $id])->field('subface_img,name_li')->limit(3)->select();
            $res = Db::table('car_brand')->where("upid","in","$id")->field('name')->select();
            foreach ($res as $k => $v){
                $res[$k]['names'] = Db::table('car_brand')->where(['id' => $id])->field('name as names')->find();
                $res[$k]['car'] = $car;
            }
            return json($res);
        }
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

        $er_car = $this->er_car($city_id);
        #关键字
        $desc = Db::table('webkey')->where(['remark' => '置换'])->find();
        $this->assign('desc',$desc);
        $brand = Db::table('car_brand')->where("id in (1,2,3,7,9,10,11,12,13,14,15,19,20,22,54,46)")->select();//品牌

        $this->assign('er_car',$er_car);
        $this->assign('brand',$brand);


        $a = Db::table('car_brand')->where(['initial' => 'A'])->select();
        $this->assign('a',$a);
        $b = Db::table('car_brand')->where(['initial' => 'B'])->select();
        $this->assign('b',$b);
        $c = Db::table('car_brand')->where(['initial' => 'C'])->select();
        $this->assign('c',$c);
        $d = Db::table('car_brand')->where(['initial' => 'D'])->select();
        $this->assign('d',$d);
        $e = Db::table('car_brand')->where(['initial' => 'E'])->select();
        $this->assign('e',$e);
        $f = Db::table('car_brand')->where(['initial' => 'F'])->select();
        $this->assign('f',$f);
        $g = Db::table('car_brand')->where(['initial' => 'G'])->select();
        $this->assign('g',$g);
        $h = Db::table('car_brand')->where(['initial' => 'H'])->select();
        $this->assign('h',$h);
        $i = Db::table('car_brand')->where(['initial' => 'I'])->select();
        $this->assign('i',$i);
        $j = Db::table('car_brand')->where(['initial' => 'J'])->select();
        $this->assign('j',$j);
        $k = Db::table('car_brand')->where(['initial' => 'K'])->select();
        $this->assign('k',$k);
        $l = Db::table('car_brand')->where(['initial' => 'L'])->select();
        $this->assign('l',$l);
        $m = Db::table('car_brand')->where(['initial' => 'M'])->select();
        $this->assign('m',$m);
        $n = Db::table('car_brand')->where(['initial' => 'N'])->select();
        $this->assign('n',$n);
        $o = Db::table('car_brand')->where(['initial' => 'O'])->select();
        $this->assign('o',$o);
        $p = Db::table('car_brand')->where(['initial' => 'P'])->select();
        $this->assign('p',$p);
        $q = Db::table('car_brand')->where(['initial' => 'Q'])->select();
        $this->assign('q',$q);
        $r = Db::table('car_brand')->where(['initial' => 'R'])->select();
        $this->assign('r',$r);
        $s = Db::table('car_brand')->where(['initial' => 'S'])->select();
        $this->assign('s',$s);
        $t = Db::table('car_brand')->where(['initial' => 'T'])->select();
        $this->assign('t',$t);
        $u = Db::table('car_brand')->where(['initial' => 'U'])->select();
        $this->assign('u',$u);
        $v = Db::table('car_brand')->where(['initial' => 'V'])->select();
        $this->assign('v',$v);
        $w = Db::table('car_brand')->where(['initial' => 'W'])->select();
        $this->assign('w',$w);
        $x = Db::table('car_brand')->where(['initial' => 'X'])->select();
        $this->assign('x',$x);
        $y = Db::table('car_brand')->where(['initial' => 'Y'])->select();
        $this->assign('y',$y);
        $z = Db::table('car_brand')->where(['initial' => 'Z'])->select();
        $this->assign('z',$z);

        return $this->fetch();


    }

    /*
     * [Displace 置换]
     */
    public function displace1(){
        if ($this->request->isPost()){

            $data = $this->params;

            dump($data);die;

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
        }
    }

    public function displace()
    {
        if(request()->isAjax()) {
            $res = Db::table('displace_car')->insert([
                'old_brand' =>input('brand'),
                'old_cartype_id' =>input('old_cartype_id'),
                'name' =>input('username'),
                'phone' =>input('phone'),
                'status' =>1,
                'create_time' =>date("Y-m-d H:i:s",time()),
            ]);
            if($res) {
                echo 200;
            } else {
                echo -200;
            }
        }
    }
}