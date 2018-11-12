<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15 0015
 * Time: 下午 4:29
 */

namespace app\admin\controller;

use think\Controller;

class News  extends Controller
{

    //所有回显
    public function newsupdate(){

        $id  = input('id');

        if (!$id) {
            return "商品id不能为空";
        }

//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//        }

        $list =  Db::table('car_pc_news')->where('id',$id)->find();

        $data = array("data" => array());

        if ($list) {

            $data['data'] = $list;

        }
        echo json_encode($data);


    }

    //所有删除banner

    public function newsDel(){

        // 判断是否登录
//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//
//        }

        $id  = input('id');

        $data = Db::table('car_pc_news')->where('id', $id)->update(['is_del' => 1]);

        if($data){

            return json(['status'=>0, 'msg'=>'删除成功']);

        } else{

            return json(['status'=>1, 'msg'=>'删除失败']);

        }

    }

    //新闻 首页
    public function newslist(){


        $where['is_del'] = 0;
        // $where['banner_type'] = 0;//归属首页
        // 判断是否登录

//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//
//        }

        $list =  Db::table('car_pc_news')->where($where)->order('id','desc')->select();

        dump($list);die;

        $data = array("data" => array());

        if ($list) {

            $data['data'] = $list;

        }
        echo json_encode($data);

    }

    /*
     * 新增新闻
     * 归属，1、公司新闻2行业新闻，3-媒体报道，4-特色活动,5-新车资讯，
     */

    public function newsAdd(){


        $titles   = input('param.title');
        $new_content   = input('param.new_content');
        $new_type = input('param.new_type');
        $is_show   = input('param.is_show');
        $sort    = input('param.sort');
        $is_bendi    = input('param.is_bendi');
        $outline   = input('param.outline');

        $new_edit = Request::instance()->post('new_edit','',null);

        // 判断是否登录

//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//        }

        $lesson  = "";

        if ($titles <>'') {


            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('lesson');

            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    $info->getExtension() ."<br>";
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    $info->getSaveName() ."<br>";
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    $info->getFilename() ."<br>";
                    $lesson = $info->getSaveName();

                    // echo $lesson;
                    // exit();

                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }

            $data = Db::table('car_pc_news')->insert(['titles' => $titles ,'outline' => $outline ,'new_content'=>$new_content,'is_show'=>$is_show,'sort'=>$sort,'new_photo'=>$lesson,'is_del'=>0,'new_type'=>$new_type,'is_bendi'=>$is_bendi,'new_edit'=>$new_edit,'addtime'=>time()]);

            if($data){

                return $this->redirect('index/pcnews');

            } else{

                return $this->error('添加失败^_^','index/pcnews',1);

            }


        }

        return $this->fetch();


    }



    // 新闻 修改
    public function newsUpdateok(){


        $id      = input('id');
        $title   = input('param.title');
        $new_content   = input('param.new_content');
        $new_type = input('param.new_type');
        $is_show   = input('param.is_show');
        $sort    = input('param.sort');
        $is_bendi    = input('param.is_bendi');
        $outline   = input('param.outline');
        $new_edit = Request::instance()->post('new_edit','',null);

        if (!$id) {
            return "商品id不能为空";
        }
        // 判断是否登录

//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//
//        }

        $lesson  = "";

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('lesson');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                $info->getExtension() ."<br>";
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $info->getSaveName() ."<br>";
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                $info->getFilename() ."<br>";
                $lesson = $info->getSaveName();

                // echo $lesson;
                // exit();

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        //判断是否更换图片

        if (empty($lesson)) {

            $where['id'] = $id;
            $lesson =  Db::table('car_pc_news')->where($where)->field('new_photo')->find();

            $lesson = $lesson['new_photo'];

        }

        $data = Db::table('car_pc_news')->where('id', $id)->update([
            'id'      =>  $id,
            'titles'   =>  $title,
            'new_content' =>  $new_content,
            'is_show'   =>  $is_show,
            'sort'    =>  $sort,
            'is_bendi'=>$is_bendi,
            'new_photo'=>$lesson,
            'new_edit' =>$new_edit,
            'outline' =>$outline,
            'addtime' =>time()
        ]);

        if($data){

            return $this->redirect('index/pcnews');

        } else{

            return $this->error('添加失败^_^','index/pcnews',1);

        }


    }

    // 查看详情接口

    public function getContent(){

        $id  = input('id');
        if (!$id) {
            return "商品id不能为空";
        }

//        $username = Cookie::get('username');
//
//        if (empty($username)) {
//
//            return json(['status'=>3, 'msg'=>'请登录！！']);
//
//        }

        $list =  Db::table('car_pc_news')->where('id',$id)->find();

        $data = array("data" => array());

        if ($list) {

            $data['data'] = $list;

        }

        echo json_encode($data);

    }

}