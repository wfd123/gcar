<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 6:25
 */

namespace app\index\controller;

use think\Db;
use think\Session;
class News extends Common
{

    public function _empty(){

        $this->redirect('index/index');
    }
    /*
     * 新闻首页
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

        $new_car = $this->new_car($city_id); //新车
        $brand = $this->brand();//品牌

        //dump( $er_car);die;
        $new1 = $this->new_list(1);//公司新闻
        $new2 = $this->new_list(2);//行业新闻
        $new3 = $this->new_list(3);//媒体报道
        $new4 = $this->new_list(4);//特色活动
        $new5 = $this->new_list(5);//新车资讯
        #关键字
        $desc = Db::table('webkey')->where(['remark' => '新闻资讯首页'])->find();
        $this->assign('desc',$desc);
        //dump($new1);die;
        $this->assign('er_car',$er_car);
        $this->assign('new_car',$new_car);
        $this->assign('brand',$brand);
        $this->assign('new1',$new1);
        $this->assign('new2',$new2);
        $this->assign('new3',$new3);
        $this->assign('new4',$new4);
        $this->assign('new5',$new5);

        return $this->fetch();

    }

    /*
     * 新闻详情
     */
    public function newsdetails(){

        //接受参数
        $id = input('param.id');
       // $news_column = input('param.column');//处理分类 暂时废弃

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

        $new_car = $this->new_car($city_id); //新车

        $brand = $this->brand();//品牌

        $where['status'] = 1;
        //$where['news_column'] = $news_column;//处理分类暂时废弃

        // 查询数据 - 上一页
        $where['id']  = ['>',$id];
        $up = Db::table('news')
            ->where($where )
            ->field('id,title')
            ->order('id', '')
            ->limit(1)
            ->find();
        //dump($up);

        // 查询数据 - 下一页
        $where['id']  = ['<',$id];
        $next = Db::table('news')
            ->where($where )
            ->field('id,title')
            ->order('id', 'desc')
            ->limit(1)
            ->find();


        $where['id'] = $id;

        $list =  Db::name('news')->where($where)->order('id','desc')->find();


//        $data = array("data" => array());
//
//        $data['data'] = $list;
//        $data['up'] = $up;
//        $data['next'] = $next;

        if (empty($next)){

            $next['title'] = $list['title'];
            $next['id'] = $list['id'];
        }

        if (empty($up)){

            $up['title'] = $list['title'];
            $up['id'] = $list['id'];
        }

        $this->assign('er_car',$er_car);
        $this->assign('new_car',$new_car);
        $this->assign('brand',$brand);
        $this->assign('list',$list);
        $this->assign('up',$up);
        $this->assign('next',$next);

        return $this->fetch();
    }
}