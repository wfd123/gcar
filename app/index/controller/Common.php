<?php
namespace app\index\controller;

use think\Image;
use think\Request;
use think\Controller;
use think\Validate;
use think\Db;
use think\Session;
use think\Config;
use service\ToolsService;
use lib\Pages;
use think\Loader;

class Common extends Controller{

    protected $request;//用来处理参数
    protected $validater;//用来验证数据/参数
    protected $params; // 过滤后符合要求的参数
    protected $goods;
    protected $bundle;
    protected $dates;

    //解释一下 User 代表一个控制器  login 代表方法 获取验证规则用$rules['User']['login']
    protected $rules = array(

        'Index' => array(
            //搜索
            'search_newcar'=>array(
//                'pp' =>'',
//                'key'  =>'',
//                'name'  =>'',
//                'pingpai'  =>'',
//                'cx'  =>'',
//                'chek'  =>'',
//                'jibie'  =>'',
//                'yg'  =>'',
//                'chs'  =>'',
//                'pailiang'  =>'',
//                'bsx'  =>'',
//                'jinqi'  =>'',
//                'ny'  =>'',
//                'px'  =>'',
//                'key_search'  =>'',
            ),
            'lots_cars'=>array(

            ),
            'version' => array(),
            'filter_list'=>array(

            ),
            'index'=>array(
                'id' =>'',
            ),
            'history_serach'=>array(
                'id' =>'require|number',
            ),
            'hot_serach'=>array(
                'type' =>'require|number',
            ),
            'my_appointment'=>array(
                'user_id' =>'number',
                'type' =>'number',
                'page' =>'number',
                'page_size' =>'number',
            ),
            'l_car_homepage'=>array(
                'user_id' =>'number',
            ),
            'xinche'=>array(
                'user_id' =>'number',
            ),
            'sell'=>array(
                'user_id' =>'number',
            ),
            'sell_ok'=>array(
                'user_id' =>'number',
            ),
            'newcar'=>array(
                'user_id' =>'number',
            ),
            'carlist'=>array(
                'user_id' =>'number',
            ),
            'change'=>array(
                'user_id' =>'number',
            ),
            'news'=>array(
                'user_id' =>'number',
            ),
            'appdownload'=>array(
                'user_id' =>'number',
            ),
            'logincar'=>array(
                'user_id' =>'number',
            ),
            'join_us'=>array(
                'user_id' =>'number',
            ),
            'link_us'=>array(
                'user_id' =>'number',
            ),
            'service'=>array(
                'user_id' =>'number',
            ),
            'website'=>array(
                'user_id' =>'number',
            ),
            'details'=>array(
                'user_id' =>'number',
            ),
            'asd'=>array(
                'user_id' =>'number',
            ),
            'sale'=>array(
                'user_id' =>'number',
            ),
            'car_screen'=>array(
                'user_id' =>'number',
            ),
            'city_name'=>array(
                'user_id' =>'number',
            ),
        ),
        'Newcar' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'search_newcar'=>array(
            ),
            'newcardetails'=>array(
                'brand_id' =>'number',
                'sys_id' =>'number',
                'cartype_id' =>'number',
                //'id' =>'number',
            ),
        ),
        'Twocar' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'car_compare'=>array(
                'user_id' =>'number',
            ),
        ),
        'Zerocar' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'zerocardetails'=>array(
                'cheid' =>'number',
            ),
        ),
        'Change' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'displace'=>array(
                'user_id' =>'number',
            ),
        ),
        'News' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'newsdetails'=>array(
                'user_id' =>'number',
                'id' =>'number',
            ),
        ),
        'Shop' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'shop_list'=>array(
                'user_id' =>'number',
            ),
            'shop_info'=>array(
                'user_id' =>'number',
            ),
            'add_comment'=>array(
                'user_id' =>'number',
            ),
            'remark'=>array(
                'user_id' =>'number',
                'shop_id' =>'require|number',
                'all_score' =>'require|number',
                'car_score' =>'require|number',
                'serve_score' =>'require|number',
                'seller_score' =>'require|number',
                'content' =>'require|number',
                'have_ls' =>'require|number',
                'have_shop' =>'require|number',
                'have_buy' =>'require|number',
                'lable' =>'require|number',
            ),
        ),

        'User' => array(
            'car_login'=>array(
                'user_id' =>'number',
            ),
            'car_logout'=>array(
                'user_id' =>'number',
            ),
            'person_manage'=>array(
                'user_id' =>'number',
            ),
            'change_shopinfo'=>array(
                'user_id' =>'number',
            ),
            'my_shop'=>array(
                'user_id' =>'number',
            ),
            'person_release'=>array(
                'user_id' =>'number',
            ),
            'person_public'=>array(
                'user_id' =>'number',
            ),
            'person_busenter'=>array(
                'user_id' =>'number',
            ),
            'pulish_adds'=>array(
                'user_id' =>'number',
            ),
            'person_opportunity'=>array(
                'user_id' =>'number',
            ),
            'person_info'=>array(
                'user_id' =>'number',
            ),
            'person_collect'=>array(
                'user_id' =>'number',
            ),
            'collect_car'=>array(
                'user_id' =>'number',
            ),
            'collect_del'=>array(
                'user_id' =>'number',
            ),
            'person_history'=>array(
                'user_id' =>'number',
            ),
            'person_his_del'=>array(
                'user_id' =>'number',
            ),
            'person_feedback'=>array(
                'user_id' =>'number',
            ),
            'person_order'=>array(
                'user_id' =>'number',
            ),
            'register'=>array(
                'user_phone'  =>'number',
            ),
            'register_ok'=>array(
                'user_phone'  =>'number',
                'user_pwd'  =>'require',
                'code'  =>'require|length:6',
            ),
            'login' => array(
                'user_phone' =>'number',//两种方式 有正则就用数组形式，没有就用下面也行
                'user_pwd'  =>'number',
            ),
            'login_sms' => array(
                'user_phone' =>'number',//短信登录
                'code'  =>'number',
            ),

            'upload_head_img' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_icon'  =>'require|image|fileSize:5000000|fileExt:jpg,png,bmg.jpeg',
            ),

            'change_pwd' => array(
                'user_phone' =>'',//两种方式 有正则就用数组形式，没有就用下面也行
            ),
            'forgetpwd' => array(
                'user_phone' =>'',//两种方式 有正则就用数组形式，没有就用下面也行
            ),

            'find_pwd' => array(
                'user_phone' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'code'  =>'require|length:6',
                'user_pwd'  =>'require',
            ),
            'bind_phone' => array(
                'code'  =>'length:6',
                'phone'  =>'number'
            ),
            'bind_email' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'code'  =>'require|length:6',
                'email'  =>'require|email',
            ),

            'set_nickname' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_nickname'  =>'require|chsDash', //只能是汉字、字母、数字和下划线_及破折号
            ),
            'get_user_info' => array(
                // 'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_phone'  =>['require','number'], //手机号

            ),
            'set_userinfo' => array(
                // 'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_phone'  =>'', //手机号


            ),
            'gift_action' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'content'  =>['require'],
                'name'  =>['require'],
                'telephone'  =>['require'],

            ),
            'business_entry' => array(
                'user_id' =>'number',//两种方式 有正则就用数组形式，没有就用下面也行
//                'phone'  =>'number',
//                'name'  =>'',
//                'shop_name'  =>'',
//                'business_range'  =>'',
//                'type'  =>'',
//                'address'  =>'',
//                'address' =>'',
//                'lat' =>'',
//                'lng' =>'',
//                'door_photo' =>'',
//                'shop_licence' =>'',
//                'city' =>'',
                //'create_time' =>['require'],

            ),
            'my_appointment' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'type'  =>['require'],
                'page'  =>['require'],
                'page_size'  =>['require'],
            ),
            'rele_car_detail' => array(
                'cheid' =>['require'],

            ),
            'sale_car' => array(
                'phone' =>'number',

            ),
            'asd' => array(
                'cheid' =>'',

            ),

        ),

        'Article' => array(
            'add_article'=>array(
                'article_uid' =>['require'],
                'article_title'  =>'require|chsDash'
            ),
            'article_list'=>array(
                'id' =>'require|number',
                'num'  =>'number',
                'page'  =>'number',
            ),
        ),

        'Code' => array(
            'get_code'=>array(
                'user_phone' =>['require'],
                'is_exist'  =>'require|number|length:1',

            ),
        ),
        'Api' => array(
            'sale_car'=>array(
                'user_phone' =>['require'],

            ),
        )

    );
    /**
     * 基础接口
     * @param Request|null $request
     */
//    public function __construct(Request $request = null) {
//        // CORS 跨域 Options 检测响应
//        ToolsService::corsOptionsHandler();
//    }

    protected function _initialize(Request $request = null){

        parent::_initialize();

//        ToolsService::corsOptionsHandler();

        $this->request = Request::instance();

        // $this->set_session($this->request->except(['city']));

        //  $this->check_time($this->request->only(['atime']));//验证是否超时

        //  $this->check_token($this->request->param());//检查token值

        // $this->params = $this->check_params($this->request->except(['atime','token']));

        $this->params = $this->check_params($this->request->param(true));

    }


    /*
     * 判断sessin是否为空
     * 设置默认值
     */

    public function set_session_url($city_pin){



        $city_all = Db::table('city')->field('id,initial,initial_num,name,pin')->where('pin', $city_pin)->find();

        if ($city_all){

            //$cityurl = $city_all['pin'];

            // $city_id = $city_all['id'];

            return $city_all;

        }

//        Session::set('cityurl',$cityurl);
//
//        $session_name = Session::has('cityurl');
//
//       // dump( $session_name);
//
//        if (empty($session_name)){
//            $cityurl = 'zhengzhou';
//
//            Session::set('cityurl',$cityurl);
//
//        }

    }

    /*
     * 检查时间是否超时
     * intval() 字符串0 数字加字符串 如123asd 是123 空数组0 非空字符串1
     * 技巧 先使用在定义
     */
    public function check_time($arr){


        if (!isset($arr['atime']) || intval($arr['atime']) <=1){

            $this->return_msg(400,'时间戳不存在');
        }

        if (time()-intval($arr['atime']) >6000){

            $this->return_msg(400,'连接超时！');
        }
    }

    /*
     * 返回code值
     */

    public function return_msg($code,$msg ='',$data=[]){

        $return_data['code'] = $code;

        $return_data['msg'] = $msg;

        $return_data['data'] = $data;

        echo json_encode($return_data);die;


    }   /*
     * 返回code值
     */

    public function return_msg_page($code,$msg ='',$endPage=[],$pageSize=[],$allNum=[],$data=[]){

        $return_data['code'] = $code;

        $return_data['msg'] = $msg;

        $return_data['endPage'] = $endPage;

        $return_data['pageSize'] = $pageSize;

        $return_data['allNum'] = $allNum;

        $return_data['data'] = $data;

        echo json_encode($return_data);die;


    }

    /*
     * 检查token
     */

    public function check_token($arr){

        /* api 传过来的token */
        if(!isset($arr['token']) || empty($arr['token'])){

            $this->return_msg(400,'token不能为空！');
        }

        $app_token = $arr['token'];

        /* 服务器生成的token */

        unset($arr['token']);

        $service_token = '';

        foreach ($arr as $key => $value){

            $service_token .=$value;
        }

        // dump($service_token);

        $service_token = md5($service_token); //服务端token

//        dump($app_token);
//       dump($service_token);die;

        /* 对比token 返回结果 */

        if($app_token !== $service_token){

            $this->return_msg(400,'token 验证不对');
        }

    }

    /*
     * 检测有效参数
     * 验证参数
     * 参数过滤
     */

    public function check_params($arr){

        /* 获取验证规则*/

        $rule = $this->rules[$this->request->controller()][$this->request->action()];



        /* 验证参数并返回错误*/

        $this->validater = new Validate($rule);

        if (!$this->validater->check($arr)){

            $this->return_msg(400,$this->validater->getError());
        }

        return $arr;

    }

    /*
     *检查是邮箱还是手机号
     */
    public function check_username($username){

        $is_email = Validate::is($username,'email')?1:0;

        $is_phone = preg_match('/^[1][3,4,5,7,8][0-9]{9}$/',$username)?4:2;

        $flag = $is_email + $is_phone;

        switch ($flag){

            case 2:
                $this->return_msg(400,'邮箱和手机号不正确');
                break;
            case 3:
                return 'email';
                break;
            case 4:
                return 'phone';
                break;
        }



    }

    /*
     * 检测用户是否存在
     */
    public function check_exist($username,$type,$exist){

        $type_num = $type == "phone"?2:4;

        $flag = $type_num + $exist;

        $res_phone = Db::name('user') ->where('phone',$username)->find();


        switch ($flag){

            case 2:
                if ($res_phone){

                    $this->return_msg(400,'此手机号已被占用');
                }

                break;
            case 3:
                if (!$res_phone){

                    $this->return_msg(400,'此手机号不存在');
                }

                break;
        }

    }

    /*
    * 检测验证码
    */
    public function check_code($user_name,$code){

        /*检测是否超时*/

        $last_time = Session::get('last_send_time');


        if (time()-$last_time >6000){

            $this->return_msg(400,'验证超时，请在一分钟内验证！');
        }


        /*检测验证码是否正确*/

        $md5_code = intval($code);

        if (Session::get('code') !== $md5_code){

            $this->return_msg(400,'验证码不正确1');
        }

        /*不管正确与否，每个验证码只能验证一次*/

        Session::set('code',null);

    }

    /*
    * 上传图像处理
     * user_id
     * user_icon file 用户头像200*200
    */
    public function upload_file($file,$type = ''){

        $info = $file -> move(ROOT_PATH.'public'.DS.'uploads');

        if ($info){

            $path = '/uploads/'.$info->getSaveName();

            /*裁剪图片*/
            if (!empty($type)){

                //$this->image_edit($path,$type);
            }

            return str_replace('\\','/',$path);
        }else{

            $this->return_msg(400,$file->getError());
        }


    }

    /*
     * 多张图片上传
     */

    public function upload($files){
        // 获取表单上传文件
        //$files = $filename->file('image');

        foreach($files  as $key =>$file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息

                $name = '/uploads/'.$info->getSaveName();

                $name = str_replace('\\','/',$name);

                $path[$key] = $name;

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }


        }

        return str_replace('\\','/',$path);
    }

    public function upload2(){
        // 获取表单上传文件
        $files = request()->file('subface_img');
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    /*
     * 图文压缩
     */
    public function image_edit($path,$type){

        $image = Image::open(ROOT_PATH.'public'.$path);

        switch ($type){

            case 'head_img':

                $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
            case 'bp_img':

                $image->thumb(100,100,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
            case 'door_photo':

                $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
            case 'shop_licence':

                $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
            case 'car_img':

                $image->thumb(400,400,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;


        }


    }

    /*
     * 积分分页
     * 分页逻辑
     */
    public function page_list(){

        $new = new Pages();
        $pageSize = 10;//显示数量
        $where['is_del'] = 0;

        $allNum = $new->allnews($where);

        $pageNum = input('pageNum');
        if (empty($pageNum)){
            $pageNum = 1;
        }
        $endPage = ceil($allNum/$pageSize); //总页数
        $list = $new->docs($pageNum,$pageSize,$where);

    }

    /*
     * 导出数据
     */
    public function execla(){


        $list = Db::table('yuyue_list')->select();

        $path = dirname(__FILE__); //找到当前脚本所在路径
        Loader::import('PHPExcel.Classes.PHPExcel');//手动引入PHPExcel.php
        Loader::import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');//引入IOFactory.php 文件里面的PHPExcel_IOFactory这个类
        $PHPExcel = new \PHPExcel();//实例化

        $PHPSheet = $PHPExcel->getActiveSheet();
        $PHPSheet->setTitle("数据"); //给当前活动sheet设置名称
        $PHPSheet->setCellValue("A1","ID")->setCellValue("B1","名字")->setCellValue("C1","电话");//表格数$PHPSheet->setCellValue("A2","张三")->setCellValue("B2","2121");//表格数据


        for($i=0;$i<count($list);$i++){

            $PHPSheet->setCellValue('A'.($i+2),$list[$i]['id']);//ID

            $PHPSheet->setCellValue('B'.($i+2),$list[$i]['username']);

            // $PHPSheet->setCellValue('C'.($i+2),$list[$i]['keshi']);

            $PHPSheet->setCellValue('C'.($i+2),$list[$i]['phone']);
        }


        $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,"Excel2007");//创建生成的格式
        header('Content-Disposition: attachment;filename="表单数据.xlsx"');//下载下来的表格名
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件

    }

    //获取城市的ID
    public function get_city($city){
        $arr=explode("市",trim($city));
        $city=$arr[0];
        //获取city_id 123
        $city_id=Db::table('city')->field("id")->where("name like '%".$city."%'")->find();
        //  dump( Db::table('city')->getLastSql());die;

        if(!$city_id){
            $city_id['id']=1;
        }

        return $city_id['id'];
    }

    //通过车型id查找车系名称，车型名称
    public function get_carname($cartype_id){

        $res = Db::table('car_brand')->field("name,upid")->where("id",$cartype_id)->find();

        // dump($res['upid']);die;
        $res2 = Db::table('car_brand')->field("name")->where("id",$res['upid'])->find();

        return $res2['name'].' '.$res['name'];
    }

    //获取二手车图片
    public function get_carimg($img,$type=1){
        if($type==1){
            $url='http://39.106.67.47/butler_car/Uploads/relecar/';
        }elseif($type==2){
            $url='http://39.106.67.47/butler_car/Uploads/newcar/';
        }elseif($type==3){
            $url="http://39.106.67.47/butler_car/Uploads/carlogo/";
        }elseif($type==4){
            $url="http://39.106.67.47/butler_car/assets/computer/images/";
        }

        $data=explode(",",$img);
        if(count($data)>1){
            $img=$url.$data[0];
        }else{
            $img=$url.$img;
        }
        return $img;
    }
    /**
     * 筛选年代车辆
     */
    public function getcar_years($brand_id,$sys_id,$years){

        //获取品牌  车系
        $brand=Db::table("car_brand")->where("id=$brand_id")->value("name");

        $sys=Db::table("car_brand")->where("id=$sys_id")->value("name");



        //获取配置信息
        $param_info=Db::table("param")->field("id,cartype,price,motor,jqxings")->where("brand='".$brand."' and sys='".$sys."' and years like '%".$years."%'")->select();

        // dump( Db::table('param')->getLastSql());die;


        foreach ($param_info as $k => $v) {
            $arr=explode(" ", $v['motor']);
            $param_info[$k]['motor']=$motor=$arr[0]." ".$v['jqxings']." ".$arr[1];
            $param_info[$k]['brand_id']=$brand_id;
            $param_info[$k]['sys_id']=$sys_id;


            //是否存在在售车辆

            $field = 'a.id,a.brand_id,a.sys_id,a.cartype_id';

            $join = [['rele_param  b','pu_id=a.id']];

            $new_car = Db::table('new_car')->alias('a')->join($join)->field($field)->where("param_id=".$v['id']." and type=1")->find();

//           dump($new_car);
//            dump( Db::table('param')->getLastSql());
            //$new_car=Db::table("new_car")->table("new_car as a")->join("rele_param as b on b.pu_id=a.id")->field("a.id,a.brand_id,a.sys_id,a.cartype_id")->where("b.param_id=".$v['id']." and b.type=1")->find();
            if($new_car){
                $param_info[$k]['is_exist']=1;
                $param_info[$k]['brand_id']=$new_car['brand_id'];
                $param_info[$k]['sys_id']=$new_car['sys_id'];
                $param_info[$k]['cartype_id']=$new_car['cartype_id'];
            }else{
                $param_info[$k]['is_exist']=0;
                $param_info[$k]['brand_id']="";
                $param_info[$k]['sys_id']="";
                $param_info[$k]['cartype_id']="";
            }
            unset($param_info[$k]['jqxings']);
        }


        return $param_info;
    }

    //获取二手车图片
    public function get_carimgs($img,$type=1){
        if($type==1){
            $url='http://39.106.67.47/butler_car/Uploads/relecar/';
        }elseif($type==2){
            $url='http://39.106.67.47/butler_car/Uploads/newcar/';
        }
        $data=explode(",",$img);
        $img=array();
        foreach ($data as $key => $val) {
            $img[]=$url.$val;
        }
        return $img;
    }
    //根据图片id获取图片路径
    public function getimgpath($imgid,$thumb=0){

        if($imgid){
            $path = Db::table('img')->where(array('id'=>$imgid))->value('path');
            if($thumb){
                if(strripos($path,'x')){
                    //显示成原图
                    if(strripos($path,'.')){
                        //取后缀名
                        $houzhui = substr($path,strripos($path,'.'));

                        $newname = substr($path, 0,strpos($path,'x'));

                        $path = $newname.$houzhui;
                    }
                }
            }
            if(strpos($path, 'http')===0){

            }else{
                $path = 'http://101.200.62.25/new_api/'.ltrim($path,'.');
                // $path = 'http://www.gj2car.com/'.ltrim($path,'.');
            }
        }else{
            return false;
        }
        return $path;
    }

    //获取变速箱
    public function get_gearbox($id){
        $gearbox=Db::table('bsq')->where("id=$id")->find();
        if($gearbox){
            return $gearbox['bsq'];
        }else{
            return "参数错误";
        }
    }

    // 变速箱
    function gearbox($id, $data = []){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => '手动',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'g',1 ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '自动',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'g',2 ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '手自一体',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'g',3 ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '4',
                'name' => '无级变速',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'g',4 ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '5',
                'name' => '双离合',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'g',5 ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );
        $param = empty($data)? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,'','' ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => 'sn_'.$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => '']);
        }
        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }

    //获取排量
    public function get_output($id){

        $output=Db::table('pailiang')->where("id=$id")->find();
        if($output){
            return $output['pailiang'];
        }else{
            return "参数错误";
        }
    }
    // 排量
    function output($id, $data=[]){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => '1.0升以下',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'o','1' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '1.1-1.5升',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'o','2' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '1.6-2.0升',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'o','3' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '4',
                'name' => '2.1-3.0升',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'o','4' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '5',
                'name' => '3.1升以上',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'o','5' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );

        $param = empty($data)? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,'','' ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => "sn_".$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => ""]);
        }

        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }
    //获取车龄
    public function get_car_age($id){

        $car_age=Db::table('cheling')->where("id",$id)->find();
        if($car_age){
            return $car_age['cheling'];
        }else{
            return "参数错误";
        }
    }
    //计算车龄
    public function get_car_agess($data2){
        $aa1=explode('年', $data2);
        $year1=$aa1[0];
        $aaa1=explode('月', $aa1['1']);
        $month1=$aaa1[0];
        $aaaa1=explode('日', $aaa1['1']);
        $day1=$aaaa1[0];
        $zero1=$year1."-".$month1."-".$day1;


        //return $zero1;
        //差
        $data=(time()-strtotime($data2))/60/60/24/365;
        if($data<=1){
            $res=1;
        }elseif($data<=2){
            $res=2;
        }elseif($data<=3){
            $res=3;
        }elseif(3<$data && $data<=5){
            $res=4;
        }elseif(5<$data && $data<=8){
            $res=5;
        }else{
            $res=6;
        }
        // dump($res);die;
        return $res;
    }
    // 里程
    function car_mileage($id,$data=[]){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => '1万公里内',
                'param' => empty($data) ? "" : "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],'m','1',$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '3万公里内',
                'param' => empty($data) ? "" : "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],'m','2',$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '5万公里内',
                'param' => empty($data) ? "" : "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],'m','3',$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '4',
                'name' => '10万公里内',
                'param' => empty($data) ? "" : "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],'m','4',$data['k_a'],$data['v_a'])
            ),
        );
        $param = empty($data) ? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],'','',$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => "sn_".$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => ""]);
        }
        return $arr;
    }

    //获取所有车龄
    public function get_car_allage(){

        $car_age=Db::table('cheling')->select();

        return $car_age;

    }
    //获取进气方式
    public  function get_inlet_air($id){
        $inlet_air=Db::table('jinqi')->where("id=$id")->find();
        if($inlet_air){
            return $inlet_air['jinqi'];
        }else{
            return "参数错误";
        }
    }
    //获取燃料
    public function get_fuel($id){
        $fuel=Db::table('nengyuan')->where("id=$id")->find();
        if($fuel){
            return $fuel['nengyuan'];
        }else{
            return "参数错误";
        }
    }
    // 燃料
    public function fuel($id, $data = []){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => '汽油',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','1' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '柴油',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','2' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '油气混合',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','3' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '4',
                'name' => '油电混合',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','4' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '5',
                'name' => '电力',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','5' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '6',
                'name' => 'LPG',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','6' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '7',
                'name' => 'CNG',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'f','7' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );

        $param = empty($data)? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,'','' ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => 'sn_'.$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => '']);
        }

        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }

    // 排放标准
    public function blowdown($id,$data=[]){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => 'OBD',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','1',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '京Ⅴ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','2',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '欧Ⅴ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','3',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '4',
                'name' => '欧Ⅳ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','4',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '5',
                'name' => '欧Ⅲ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','5',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '6',
                'name' => '国Ⅴ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','6',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '7',
                'name' => '国Ⅳ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','7',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '8',
                'name' => '国Ⅲ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','8',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '9',
                'name' => '国Ⅱ',
                'param' => empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'l','9',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );
        $param = empty($data) ? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],'','',$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => 'sn_'.$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => '']);
        }
        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }

    //获取排放标准
    public function get_blowdown($id){
        $blowdown=Db::table('p_bzhun')->where("id=$id")->find();
        if($blowdown){
            return $blowdown['biaozhun'];
        }else{
            return "参数错误";
        }
    }
    // 颜色
    public function color($id, $data = []){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $res = Db::table('car_color1')->select();
        foreach ($res as $key => $val) {
            $res[$key]['img_url'] = "http://39.106.67.47/butler_car/".ltrim($val['img_url'],'.');
            $res[$key]['param'] = empty($data)? "" : 'sn_'.sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,'c',$val['id'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
            if (!empty($id) && $id == $val['id']){
                $name = $val['name'];
            }
        }

        $param = empty($data)? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,'','' ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($res, ['face_id' => '0', 'name' => '不限', 'param' => 'sn_'.$param]);
        } else {
            array_unshift($res, ['face_id' => '0', 'name' => '不限', 'param' => '']);
        }
        if (!empty($id)){
            return empty($name) ? "" : $name;
        } else {
            return $res;
        }
    }
    // 驱动
    public function car_drive($id,$data=[]){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id' => '1',
                'name' => '前驱',
                'param' => empty($data)? "" : "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,'d','1',$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '2',
                'name' => '后驱',
                'param' => empty($data)? "" :"sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,'d','2',$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id' => '3',
                'name' => '四驱',
                'param' => empty($data)? "" :"sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,'d','3',$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );
        $param = empty($data)? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,'','',$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => "sn_".$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => ""]);
        }

        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }
    // 车身
    public function car_body($id,$data){
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $arr = array(
            array(
                'id'=> '1',
                'name'=> '两厢',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','1' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '2',
                'name'=> '三厢',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','2' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '3',
                'name'=> '旅行车',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','3' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '4',
                'name'=> '皮卡',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','4' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '5',
                'name'=> 'MPV',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','5' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '6',
                'name'=> '混型车',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','6' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '7',
                'name'=> '跑车',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','7' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '8',
                'name'=> '厢式车',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','8' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '9',
                'name'=> 'SUV',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','9' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
            array(
                'id'=> '10',
                'name' => '其他',
                'param' => "sn_".sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'b','10' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a'])
            ),
        );

        $param = empty($data) ? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'],'','' ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        if (!empty($param)){
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => "sn_".$param]);
        } else {
            array_unshift($arr, ['id' => '0', 'name' => '不限', 'param' => ""]);
        }
        if($id){
            $name = '';
            foreach ($arr as $key => $val) {
                if($val['id'] == $id){
                    $name = $val['name'];
                }
            }
            // var_dump($name);
            return $name;
        }else{
            return $arr;
        }
    }

    public function getCity($ip = '')
    {
        if($ip == ''){
            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
            $ip=json_decode(file_get_contents($url),true);
            $data = $ip;
        }else{
            $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
            $ip=json_decode(file_get_contents($url));
            if((string)$ip->code=='1'){
                return false;
            }
            $data = (array)$ip->data;
        }

        return $data;
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


//    public function https_request($url,$data = null){
//        $curl = curl_init();
//
//        curl_setopt($curl,CURLOPT_URL,$url);
//        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
//        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
//
//        if(!empty($data)){//如果有数据传入数据
//            curl_setopt($curl,CURLOPT_POST,1);//CURLOPT_POST 模拟post请求
//            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);//传入数据
//        }
//
//        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
//        $output = curl_exec($curl);
//        curl_close($curl);
//
//        return $output;
//    }

    public function app_brand_ios(){

        $list_brand = $this->list_brand(65);
        $cap = $this->Capital_ASCII(0);

        $arr = array();
        foreach ($cap as $key => $val) {
            $brand = $this->list_brand($val['num']);
            if($brand){
                // var_dump($val);
                $li = array(
                    'initial' => $val['letter'],
                    'list' => $brand ? $brand : array(),
                );
                array_push($arr,$li);
            }


        }
        return $arr;

    }

    public function list_brand($initial){
        $res = Db::table('car_brand')->field('id,img_id,initial,name,pin')
            ->where(array('initial_num'=>$initial,'status'=>1,'level'=>1))
            ->order('sort desc')
            ->select();
        if($res){
            foreach ($res as $key => $val) {
                $res[$key]['img_url'] = $val['img_id'] ? $this->get_carimg($val['img_id'],3) : "";
                unset($res[$key]['img_id']);
            }
        }
        return $res;
    }

    /**
     * [Capital_ASCII 大写字母与ASCII码]
     * @return [type] [description]
     */
    public function Capital_ASCII($id){
        $arr = array(
            array( 'letter'=> 'A', 'num' => 65 ),
            array( 'letter'=> 'B', 'num' => 66 ),
            array( 'letter'=> 'C', 'num' => 67 ),
            array( 'letter'=> 'D', 'num' => 68 ),
            array( 'letter'=> 'E', 'num' => 69 ),
            array( 'letter'=> 'F', 'num' => 70 ),
            array( 'letter'=> 'G', 'num' => 71 ),
            array( 'letter'=> 'H', 'num' => 72 ),
            array( 'letter'=> 'I', 'num' => 73 ),
            array( 'letter'=> 'J', 'num' => 74 ),
            array( 'letter'=> 'K', 'num' => 75 ),
            array( 'letter'=> 'L', 'num' => 76 ),
            array( 'letter'=> 'M', 'num' => 77 ),
            array( 'letter'=> 'N', 'num' => 78 ),
            array( 'letter'=> 'O', 'num' => 79 ),
            array( 'letter'=> 'P', 'num' => 80 ),
            array( 'letter'=> 'Q', 'num' => 81 ),
            array( 'letter'=> 'R', 'num' => 82 ),
            array( 'letter'=> 'S', 'num' => 83 ),
            array( 'letter'=> 'T', 'num' => 84 ),
            array( 'letter'=> 'U', 'num' => 85 ),
            array( 'letter'=> 'V', 'num' => 86 ),
            array( 'letter'=> 'W', 'num' => 87 ),
            array( 'letter'=> 'X', 'num' => 88 ),
            array( 'letter'=> 'Y', 'num' => 89 ),
            array( 'letter'=> 'Z', 'num' => 90 ),
        );
        if($id){
            // 通过数字 转换首字母
            $dd = '';
            foreach ($arr as $k => $v) {
                if($v['num'] == $id){
                    $dd = $v['letter'];
                }
            }
            return $dd;
        }else{
            return $arr;
        }
    }

    /*
     * 获取city_id
     */

//    public function city_id(){
//
//        $ip = $this->request->ip();
//
//        $city = $this->get_area('61.163.128.204');//暂时写死
//
//        $city_id = $this->get_city($city['data']['city']);
//
//        return $city_id;
//    }
    /*
     * 获取二手车推荐
     */
    public function er_car($city_id){

        $er_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300")->where("status=1 and up_under=1 and city_id=$city_id")->order("create_time desc")->limit(10)->select();
        foreach ($er_car as $k => $val) {
            $er_car[$k]['name']=$this->get_carname($val['cartype_id']);
            $er_car[$k]['img_url']=$this->get_carimg($val['img_300'],1);
            $er_car[$k]['car_mileage']=$val['car_mileage'];
            //unset($er_car[$k]['cartype_id']);
            unset($er_car[$k]['img_300']);
            //获取 新车的价格
//            $new_car_prince=M("param")->field("id,info_1")->where("cartype_id=".$val['pu_id'])->find();
//            $car_new[$k]['new_car_price']=$new_car_prince['info_1']; //表内并有字段 报错
            $new_car_prince=Db::table("param")->field("id,price")->where("id=".$val['pu_id'])->find();//id换成 info_1 换成price
            $er_car[$k]['new_car_price']=$new_car_prince['price'];
        }

        return $er_car;
    }

    /*
     * 获取二手车详情 写入浏览记录
     */
    public function er_car_his($city_id,$id){

        $where['status'] = 1;
        $where['up_under'] = 1;
        $where['city_id'] = $city_id;
        $where['id'] = $id;


        $er_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300")->where($where)->find();
        foreach ($er_car as $k => $val) {
            $er_car[$k]['name']=$this->get_carname($val['cartype_id']);
            $er_car[$k]['img_url']=$this->get_carimg($val['img_300'],1);
            $er_car[$k]['car_mileage']=$val['car_mileage'];
            //unset($er_car[$k]['cartype_id']);
            unset($er_car[$k]['img_300']);
            //获取 新车的价格
//            $new_car_prince=M("param")->field("id,info_1")->where("cartype_id=".$val['pu_id'])->find();
//            $car_new[$k]['new_car_price']=$new_car_prince['info_1']; //表内并有字段 报错
            $new_car_prince=Db::table("param")->field("id,price")->where("id=".$val['pu_id'])->find();//id换成 info_1 换成price
            $er_car[$k]['new_car_price']=$new_car_prince['price'];
        }

        return $er_car;
    }

    /*
     * 获取新车
     */
    public function new_car($city_id){

        $new_car=Db::table("new_car")->field("id,brand_id,sys_id,cartype_id,price,img_300,pay10_s2,pay10_y2,pay10_n2")->where("is_tj=1 and status=1 and city_id=".$city_id)->order("create_time desc")->limit(4)->select();
        foreach ($new_car as $key => $val) {
            $new_car[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $new_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $new_car[$key]['pay10_s2']=$val['pay10_s2'];
            $new_car[$key]['pay10_y2']=$val['pay10_y2'];
            unset($new_car[$key]['img_300']);
        }

        return $new_car;

    }
    /*
    * 获取新车详情 写入数据库
    */
    public function new_car_his($city_id,$id){

        $where['is_tj'] = 1;
        $where['status'] = 1;
        $where['city_id'] = $city_id;
        $where['id'] = $id;

        $new_car=Db::table("new_car")->field("id,brand_id,sys_id,cartype_id,price,img_300,pay10_s2,pay10_y2,pay10_n2")->where($where)->find();
        foreach ($new_car as $key => $val) {
            $new_car[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $new_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $new_car[$key]['pay10_s2']=$val['pay10_s2'];
            $new_car[$key]['pay10_y2']=$val['pay10_y2'];
            unset($new_car[$key]['img_300']);
        }

        return $new_car;

    }

    /*
     * 获取零首付 推荐
     */
    public function car_zero($city_id){

        $car_zero=Db::table("l_car")->field("id,cartype_id,price,img_300,pay0_s2,pay0_y2,pay0_n2")->where("is_tj=1 and status=1 and city_id=$city_id")->order("create_time desc")->limit(5)->select();
        foreach ($car_zero as $key => $val) {
            $car_zero[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $car_zero[$key]['name']=$this->get_carname($val['cartype_id']);
            $car_zero[$key]['pay10_s2']=$car_zero[$key]['pay0_s2'];
            $car_zero[$key]['pay10_y2']=$car_zero[$key]['pay0_y2'];
            $car_zero[$key]['pay10_n2']=$car_zero[$key]['pay0_n2'];
            unset($car_zero[$key]['img_300']);
            unset($car_zero[$key]['cartype_id']);
            unset($car_zero[$key]['pay0_s2']);
            unset($car_zero[$key]['pay0_y2']);
            unset($car_zero[$key]['pay0_n2']);
        }

        return $car_zero;
    }
    /*
     * 获取品牌
     */
    public function brand($brand_param = ''){

        $brand=Db::table("car_brand")->field("id,img_id,name,pin")->where("id in (1,9,10,19,20,22)")->select();
        foreach ($brand as $key => $val) {
            $brand[$key]['img_url']=$this->get_carimg($val['img_id'],3);
            if (!empty($brand_param)){
                $brand[$key]['param'] = "sn_".$brand_param;
            } else {
                $brand[$key]['param'] = "";
            }

            unset($brand[$key]["img_id"]);
        }
        return $brand;
    }

    /*
     * 价格
     */
    public function price($data = ''){

        $price=Db::table("price_range")->field("price_id as id,name")->order("level asc")->limit(6)->select();
        $brand_param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";

        foreach ($price as $key => $val) {
            switch ($price[$key]['id']) {
                case 2:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","0-3" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 3:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","3-5" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 4:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","5-8" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 5:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","8-10" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 6:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","10-15" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 7:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","15-20" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 8:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","20-30" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 9:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","30-50" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 10:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","50-100" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                case 11:
                    $param = empty($data) ? "" : sprintf($brand_param_format, "p","100-" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
                default :
                    $param = empty($data) ? "" : sprintf($brand_param_format, "","" ,$data['k_s'],$data['v_s'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
                    break;
            }
            if (!empty($param)){
                $price[$key]['param'] = "sn_".$param;
            } else {
                $price[$key]['param'] = "";
            }
        }

        return $price;
    }

    public function get_price($val){

        switch ($val) {
            case '0-3':
                $price = "3万内";
                break;
            case '3-5':
                $price = "3-5万";
                break;
            case 4:
                $price = "5-8万";
                break;
            case 5:
                return "5-8万";
                break;
            case 6:
                $price = "10-15万";
                break;
            case 7:
                $price = "15-20万";
                break;
            case 8:
                $price = "8-10万";
                break;
            case 9:
                $price = "30-50万";
                break;
            case 10:
                $price = "10-15万";
                break;
            case 11:
                $price = "15-20万";
                break;
            case 12:
                $price = "15-20万";
                break;
            case 13:
                $price = "15-20万";
                break;
            default :
                $price = "";
        }
        return $price;
    }

    /*
     * 级别
     */
    public function subface($data = [])
    {
        $param_format = "%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s";
        $subface = Db::table("subface")->field("face_id as id,name,img")->order("level asc")->limit(5)->select();
        foreach ($subface as $key => $value) {
            $param = empty($data) ? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,"s",$value['id'] ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
            if (!empty($param)){
                $subface[$key]['param'] = "sn_".$param;
            } else {
                $subface[$key]['param'] = "";
            }
        }

        $param = empty($data) ? "" : sprintf($param_format, $data['k_p'],$data['v_p'] ,"","" ,$data['k_o'],$data['v_o'] ,$data['k_g'],$data['v_g'] ,$data['k_d'],$data['v_d'] ,$data['k_b'],$data['v_b'] ,$data['k_c'],$data['v_c'] ,$data['k_f'],$data['v_f'] ,$data['k_n'],$data['v_n'],$data['k_l'],$data['v_l'],$data['k_m'],$data['v_m'],$data['k_a'],$data['v_a']);
        array_unshift($subface, ['id' => 0, 'name' => '不限', 'param' => empty($param) ? "" : "sn_".$param]);

        return $subface;
    }

    /*
     * salt 盐值
     */
    public function randStr($len=6,$format='ALL') {
        switch($format) {
            case 'ALL':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; break;
            case 'CHAR':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; break;
            case 'NUMBER':
                $chars='0123456789'; break;
            default :
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
        }
        //mt_srand((double)microtime()*1000000*getmypid());
        $password="";
        while(strlen($password)<$len)
            $password.=substr($chars,(mt_rand()%strlen($chars)),1);
        return $password;
    }

    /*
       *http://39.106.67.47/new_api/User/shop/get_carparam
       * 获取具体参数配置
       * 车id
       * type 1 新车 2 二手 3 零首付
       *
       */
    public function get_carparam($cheid,$type){


        //验证车辆是否存在
        if($type==1){
            $carinfo=Db::table("new_car")->where("id=$cheid")->find();
        }elseif($type==2){
            $carinfo=Db::table("rele_car")->where("pu_id=$cheid")->find();
        }elseif ($type==3) {
            $carinfo=Db::table("l_car")->where("id=$cheid")->find();
        }
        if(!$carinfo){
            $data = array (
                'code'   => 204,
                'result' => '车辆信息错误'
            );
            return 'c参数有误';

        }
        //查找配置参数
        $param=$this->paramss($cheid,$type);

        return $param;

    }


    //获取二手车的首付以及月供
    public function get_rele_car_fenqi($pu_id){
        //查询数据
        $infos=Db::table("rele_car")->field("pu_id,car_cardtime,price")->where("pu_id=".$pu_id)->find();
        $time=$this->change_time($infos['car_cardtime']);
        $data1=time()-$time;
        $data2=365*24*60*60*10;
        //dump($data1);die;
        if($data1 < $data2 && $infos['price']>3 ){
            //计算首付，月供
            $arr['pay_20s']=$pay_20s=round($infos['price']*0.2,1);
            $arr['pay_20y']=$pay_20y=ceil($infos['price']*0.8/36*10000);
            $arr['pay_20n']=36;
        }

        if (empty($arr)){

            return $arr =array();
        }
        return $arr;
    }

    //时间转换为时间戳
    public function change_time($date){
        $aa1=explode('年', $date);
        $year1=$aa1[0];
        $aaa1=explode('月', $aa1['1']);
        $month1=$aaa1[0];
        $aaaa1=explode('日', $aaa1['1']);
        $day1=$aaaa1[0];
        $time=$year1."-".$month1."-".$day1;
        $res=strtotime($time);
        return $res;
    }

    /**
     * [param 详情参数]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function paramss($cheid,$type=2)
    {
        $join = [['rele_param b','b.param_id=a.id']];

        //查找配置参数
        $res=Db::table("param")->alias('a')->join($join)->where("b.pu_id=$cheid and b.type=$type")->field("a.*")->find();
        if($res){
            // 基本信息
            // 基本信息
            $info = array(
                array( 'name' => '车型名称', 'content' => $res['car_name'], 'is_dot' => 2, ),
                array( 'name' => '厂商指导价(元)', 'content' => $res['price'], 'is_dot' => 2,  ),
                array( 'name' => '厂商', 'content' => $res['firm'], 'is_dot' => 2, ),
                array( 'name' => '级别', 'content' => $res['subface'], 'is_dot' => 2, ),
                array( 'name' => '能源类型', 'content' => $res['fuel'], 'is_dot' => 2, ),
                array( 'name' => '上市时间', 'content' => $res['shangshi'], 'is_dot' => 2, ),
                array( 'name' => '工信部纯电续驶里程(km)', 'content' => $res['oil_wear1'], 'is_dot' => 2, ),
                array( 'name' => '最大功率(kW)', 'content' => $res['max_kw'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩(N·m)', 'content' => $res['max_nm'], 'is_dot' => 2, ),
                array( 'name' => '发动机', 'content' => $res['motor'], 'is_dot' => 2, ),
                array( 'name' => '变速箱', 'content' => $res['gearbox'], 'is_dot' => 2, ),
                array( 'name' => '长*宽*高(mm)', 'content' => $res['size'], 'is_dot' => 2, ),
                array( 'name' => '车身结构', 'content' => $res['bodywork'], 'is_dot' => 2, ),
                array( 'name' => '最高车速(km/h)', 'content' => $res['max_speed'], 'is_dot' => 2, ),
                array( 'name' => '官方0-100km/h加速(s)', 'content' => $res['speed1'], 'is_dot' => 2, ),
                array( 'name' => '实测0-100km/h加速(s)', 'content' => $res['speed2'], 'is_dot' => 2, ),
                array( 'name' => '实测100-0km/h制动(m)', 'content' => $res['speed3'], 'is_dot' => 2, ),
                array( 'name' => '实测油耗(L/100km)	', 'content' => $res['oil_wear2'], 'is_dot' => 2, ),
                array( 'name' => '整车质保', 'content' => $res['zhibao'], 'is_dot' => 2, ),
            );
            $car_body = array(
                array( 'name' => '长度(mm)', 'content' => $res['length1'], 'is_dot' => 2, ),
                array( 'name' => '宽度(mm)', 'content' => $res['width1'], 'is_dot' => 2,  ),
                array( 'name' => '高度(mm)', 'content' => $res['height1'], 'is_dot' => 2, ),
                array( 'name' => '轴距(mm)', 'content' => $res['cszj'], 'is_dot' => 2, ),
                array( 'name' => '前轮距(mm)', 'content' => $res['csqlj'], 'is_dot' => 2, ),
                array( 'name' => '后轮距(mm)', 'content' => $res['cshlj'], 'is_dot' => 2, ),
                array( 'name' => '最小离地间隙(mm)', 'content' => $res['zxldjju'], 'is_dot' => 2, ),
                array( 'name' => '车身结构', 'content' => $res['csjgou'], 'is_dot' => 2, ),
                array( 'name' => '车门数(个)', 'content' => $res['cmshu'], 'is_dot' => 2, ),
                array( 'name' => '座位数(个)', 'content' => $res['zwshu'], 'is_dot' => 2, ),
                array( 'name' => '油箱容积(L)', 'content' => $res['yxiangrj'], 'is_dot' => 2, ),
                array( 'name' => '行李厢容积(L)', 'content' => $res['xlxiangrj'], 'is_dot' => 2, ),
                array( 'name' => '整备质量(kg)', 'content' => $res['zbzl'], 'is_dot' => 2, ),
            );
            $base = array(
                array( 'name' => '发动机型号', 'content' => $res['fdjxh'], 'is_dot' => 2, ),
                array( 'name' => '排量(mL)', 'content' => $res['pliang'], 'is_dot' => 2,  ),
                array( 'name' => '排量(L)', 'content' => $res['pliang1'], 'is_dot' => 2, ),
                array( 'name' => '进气形式', 'content' => $res['jqxings'], 'is_dot' => 2, ),
                array( 'name' => '气缸排列形式', 'content' => $res['qgplxings'], 'is_dot' => 2, ),
                array( 'name' => '气缸数(个)', 'content' => $res['qgshu'], 'is_dot' => 2, ),
                array( 'name' => '每缸气门数(个)', 'content' => $res['qmshu'], 'is_dot' => 2, ),
                array( 'name' => '压缩比	', 'content' => $res['ysuob'], 'is_dot' => 2, ),
                array( 'name' => '配气机构', 'content' => $res['pqjgou'], 'is_dot' => 2, ),
                array( 'name' => '缸径(mm)', 'content' => $res['gjing'], 'is_dot' => 2, ),
                array( 'name' => '行程(mm)', 'content' => $res['xcheng'], 'is_dot' => 2, ),
                array( 'name' => '最大马力(Ps)', 'content' => $res['zdml'], 'is_dot' => 2, ),
                array( 'name' => '最大功率(kW)	', 'content' => $res['zdgl'], 'is_dot' => 2, ),
                array( 'name' => '最大功率转速(rpm)', 'content' => $res['rpm'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩(N·m)', 'content' => $res['maxnj'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩转速(rpm)	', 'content' => $res['maxnjzs'], 'is_dot' => 2, ),
                array( 'name' => '发动机特有技术	', 'content' => $res['tyjshu'], 'is_dot' => 2, ),
                array( 'name' => '燃料形式', 'content' => $res['rljshu'], 'is_dot' => 2, ),
                array( 'name' => '燃油标号', 'content' => $res['rybiaoh'], 'is_dot' => 2, ),
                array( 'name' => '供油方式	', 'content' => $res['gyfshi'], 'is_dot' => 2, ),
                array( 'name' => '缸盖材料	', 'content' => $res['ggcliao'], 'is_dot' => 2, ),
                array( 'name' => '缸体材料', 'content' => $res['gtcliao'], 'is_dot' => 2, ),
                array( 'name' => '环保标准', 'content' => $res['hbbiaoz'], 'is_dot' => 2, ),
            );
            $gearbox = array(
                array( 'name' => '挡位个数', 'content' => $res['dweigs'], 'is_dot' => 2, ),
                array( 'name' => '变速箱类型', 'content' => $res['bsxleix'], 'is_dot' => 2,  ),
                array( 'name' => '简称', 'content' => $res['jiancheng'], 'is_dot' => 2, ),
            );
            $dpfxiang = array(
                array( 'name' => '驱动方式', 'content' => $res['qdfshi'], 'is_dot' => 2, ),
                array( 'name' => '前悬架类型', 'content' => $res['qxuanjlx'], 'is_dot' => 2,  ),
                array( 'name' => '后悬架类型', 'content' => $res['hxuanglx'], 'is_dot' => 2, ),
                array( 'name' => '助力类型', 'content' => $res['zhullx'], 'is_dot' => 2, ),
                array( 'name' => '车体结构', 'content' => $res['ctijg'], 'is_dot' => 2, ),
            );
            $clzhid = array(
                array( 'name' => '前制动器类型', 'content' => $res['qzdqilx'], 'is_dot' => 2, ),
                array( 'name' => '后制动器类型', 'content' => $res['hzdqilx'], 'is_dot' => 2,  ),
                array( 'name' => '驻车制动类型', 'content' => $res['zhuczdlx'], 'is_dot' => 2, ),
                array( 'name' => '前轮胎规格	', 'content' => $res['qluntgg'], 'is_dot' => 2, ),
                array( 'name' => '后轮胎规格', 'content' => $res['hluntgg'], 'is_dot' => 2, ),
                array( 'name' => '备胎规格', 'content' => $res['beitgg'], 'is_dot' => 2, )
            );
            $safe_base = array(
                array( 'name' => '主/副驾驶座安全气囊', 'content' => $res['zfqnang'], 'is_dot' => 2, ),
                array( 'name' => '前/后排侧气囊', 'content' => $res['qhcqnang'], 'is_dot' => 2,  ),
                array( 'name' => '前/后排头部气囊(气帘)', 'content' => $res['qhptqnang'], 'is_dot' => 1, ),
                array( 'name' => '膝部气囊', 'content' => $res['xbqnang'], 'is_dot' => 2, ),
                array( 'name' => '胎压监测装置', 'content' => $res['tyjczzhi'], 'is_dot' => 1, ),
                array( 'name' => '零胎压继续行驶', 'content' => $res['ltyjxxshi'], 'is_dot' => 1, ),
                array( 'name' => '安全带未系提示', 'content' => $res['aqdwjtshi'], 'is_dot' => 1, ),
                array( 'name' => 'ISOFIX儿童座椅接口	', 'content' => $res['etzyjiek'], 'is_dot' => 2, ),
                array( 'name' => 'ABS防抱死	', 'content' => $res['abs'], 'is_dot' => 1, ),
                array( 'name' => '制动力分配(EBD/CBC等)	', 'content' => $res['zdlfpei'], 'is_dot' => 1, ),
                array( 'name' => '刹车辅助(EBA/BAS/BA等)', 'content' => $res['scfzhu'], 'is_dot' => 1, ),
                array( 'name' => '牵引力控制(ASR/TCS/TRC等)	', 'content' => $res['qylkzhi'], 'is_dot' => 2, ),
                array( 'name' => '车身稳定控制(ESC/ESP/DSC等)', 'content' => $res['cswdkzhi'], 'is_dot' => 1, ),
                array( 'name' => '并线辅助', 'content' => $res['bxfzhu'], 'is_dot' => 1, ),
                array( 'name' => '车道偏离预警系统', 'content' => $res['cdplyjxtong'], 'is_dot' => 1, ),
                array( 'name' => '主动刹车/主动安全系统	', 'content' => $res['zdsche'], 'is_dot' => 1, ),
                array( 'name' => '夜视系统', 'content' => $res['ysxtong'], 'is_dot' => 2, )
            );
            $fzcz = array(
                array( 'name' => '前/后驻车雷达', 'content' => $res['qhzclda'], 'is_dot' => 2, ),
                array( 'name' => '倒车视频影像', 'content' => $res['dcspyxiang'], 'is_dot' => 2,  ),
                array( 'name' => '全景摄像头', 'content' => $res['qjsxtou'], 'is_dot' => 1, ),
                array( 'name' => '定速巡航', 'content' => $res['dsxhang'], 'is_dot' => 1, ),
                array( 'name' => '自适应巡航', 'content' => $res['zsyxhang'], 'is_dot' => 2, ),
                array( 'name' => '自动泊车入位', 'content' => $res['zdbche'], 'is_dot' => 1, ),
                array( 'name' => '发动机启停技术', 'content' => $res['fdjqting'], 'is_dot' => 2, ),
                array( 'name' => '上坡辅助', 'content' => $res['spfzhu'], 'is_dot' => 1, ),
                array( 'name' => '自动驻车', 'content' => $res['zdzche'], 'is_dot' => 2, ),
                array( 'name' => '陡坡缓降', 'content' => $res['dphjiang'], 'is_dot' => 2, ),
                array( 'name' => '可变悬架', 'content' => $res['kbxgua'], 'is_dot' => 1, ),
                array( 'name' => '空气悬架', 'content' => $res['kqxgua'], 'is_dot' => 1, ),
                array( 'name' => '电磁感应悬架', 'content' => $res['dcgyxgua'], 'is_dot' => 1, ),
                array( 'name' => '可变转向比', 'content' => $res['kbzxbi'], 'is_dot' => 1, ),
                array( 'name' => '前桥限滑差速器/差速锁', 'content' => $res['qqxscssuo'], 'is_dot' => 1, ),
                array( 'name' => '中央差速器锁止功能', 'content' => $res['zycsqszhi'], 'is_dot' => 1, ),
                array( 'name' => '后桥限滑差速器/差速锁', 'content' => $res['hqcssuo'], 'is_dot' => 1, ),
                array( 'name' => '整体主动转向系统', 'content' => $res['ztzdzxiang'], 'is_dot' => 1, ),
            );
            $wbfdpzhi = array(
                array( 'name' => '电动天窗', 'content' => $res['ddtchuang'], 'is_dot' => 1, ),
                array( 'name' => '全景天窗', 'content' => $res['qjtchuang'], 'is_dot' => 2,  ),
                array( 'name' => '运动外观套件', 'content' => $res['ydwgtjian'], 'is_dot' => 1, ),
                array( 'name' => '铝合金轮圈', 'content' => $res['lhjlquan'], 'is_dot' => 2, ),
                array( 'name' => '电动吸合门', 'content' => $res['ddxhmen'], 'is_dot' => 2, ),
                array( 'name' => '侧滑门', 'content' => $res['chmen'], 'is_dot' => 1, ),
                array( 'name' => '电动后备厢', 'content' => $res['ddhbxiang'], 'is_dot' => 2, ),
                array( 'name' => '发动机电子防盗', 'content' => $res['fdjdzfdao'], 'is_dot' => 2, ),
                array( 'name' => '车内中控锁', 'content' => $res['cnzksuo'], 'is_dot' => 1, ),
                array( 'name' => '遥控钥匙', 'content' => $res['ykyshi'], 'is_dot' => 2, ),
                array( 'name' => '无钥匙启动系统', 'content' => $res['wysqd'], 'is_dot' => 2, ),
                array( 'name' => '无钥匙进入系统', 'content' => $res['wysjru'], 'is_dot' => 2, ),
            );
            $nbbase = array(
                array( 'name' => '皮质方向盘', 'content' => $res['pzfxpan'], 'is_dot' => 1, ),
                array( 'name' => '方向盘调节', 'content' => $res['fxptjie'], 'is_dot' => 1,  ),
                array( 'name' => '方向盘电动调节', 'content' => $res['fxpddtjie'], 'is_dot' => 1, ),
                array( 'name' => '多功能方向盘', 'content' => $res['dgnfxpan'], 'is_dot' => 1, ),
                array( 'name' => '方向盘换挡', 'content' => $res['fxphdang'], 'is_dot' => 1, ),
                array( 'name' => '方向盘加热', 'content' => $res['fxpjre'], 'is_dot' => 1, ),
                array( 'name' => '行车电脑显示屏', 'content' => $res['xcdnao'], 'is_dot' => 1, ),
                array( 'name' => 'HUD抬头数字显示', 'content' => $res['hud'], 'is_dot' => 1, ),
            );
            $zybase = array(
                array( 'name' => '座椅材质', 'content' => $res['zyczhi'], 'is_dot' => 1, ),
                array( 'name' => '运动风格座椅', 'content' => $res['ydfgzyi'], 'is_dot' => 1,  ),
                array( 'name' => '座椅高低调节', 'content' => $res['zygdtjie'], 'is_dot' => 1, ),
                array( 'name' => '腰部支撑调节', 'content' => $res['ybzctjie'], 'is_dot' => 1, ),
                array( 'name' => '肩部支撑调节', 'content' => $res['jbzctjie'], 'is_dot' => 1, ),
                array( 'name' => '主/副驾驶座电动调节', 'content' => $res['zfjszdtj'], 'is_dot' => 1, ),
                array( 'name' => '第二排靠背角度调节', 'content' => $res['depkbtjie'], 'is_dot' => 1, ),
                array( 'name' => '第二排座椅移动', 'content' => $res['depzyydong'], 'is_dot' => 1, ),
                array( 'name' => '后排座椅电动调节', 'content' => $res['hpzyddtjie'], 'is_dot' => 1, ),
                array( 'name' => '电动座椅记忆', 'content' => $res['ddzyjyi'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅加热', 'content' => $res['qhpzyjre'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅通风', 'content' => $res['qhpzytfeng'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅按摩', 'content' => $res['qhpzyamo'], 'is_dot' => 1, ),
                array( 'name' => '后排座椅放倒方式', 'content' => $res['hpzyfdfshi'], 'is_dot' => 1, ),
                array( 'name' => '前/后中央扶手', 'content' => $res['qhzyfshou'], 'is_dot' => 1, ),
                array( 'name' => '后排杯架', 'content' => $res['hpbjia'], 'is_dot' => 1,)
            );
            $dmtbase = array(
                array( 'name' => 'GPS导航系统', 'content' => $res['gps'], 'is_dot' => 2, ),
                array( 'name' => '定位互动服务', 'content' => $res['dwhdfwu'], 'is_dot' => 2,  ),
                array( 'name' => '中控台彩色大屏', 'content' => $res['zktcsdping'], 'is_dot' => 2, ),
                array( 'name' => '中控液晶屏分屏显示', 'content' => $res['zyyjfpxshi'], 'is_dot' => 2, ),
                array( 'name' => '蓝牙/车载电话', 'content' => $res['lyczdhua'], 'is_dot' => 2, ),
                array( 'name' => '车载电视', 'content' => $res['czdshi'], 'is_dot' => 2, ),
                array( 'name' => '后排液晶屏', 'content' => $res['hpyjping'], 'is_dot' => 2, ),
                array( 'name' => 'CD/DVD', 'content' => $res['cddvd'], 'is_dot' => 2, ),
                array( 'name' => '扬声器品牌', 'content' => $res['ysqppai'], 'is_dot' => 2, ),
                array( 'name' => '扬声器数量', 'content' => $res['ysqsliang'], 'is_dot' => 2, ),
            );
            $lightbase = array(
                array( 'name' => '近光灯', 'content' => $res['jgdeng'], 'is_dot' => 2, ),
                array( 'name' => 'LED日间行车灯', 'content' => $res['rjxcdeng'], 'is_dot' => 2,  ),
                array( 'name' => '自动头灯', 'content' => $res['zdtdeng'], 'is_dot' => 2, ),
                array( 'name' => '转向辅助灯', 'content' => $res['zxfzdeng'], 'is_dot' => 2, ),
                array( 'name' => '转向头灯', 'content' => $res['zxtdeng'], 'is_dot' => 2, ),
                array( 'name' => '前雾灯', 'content' => $res['qwdeng'], 'is_dot' => 2, ),
                array( 'name' => '大灯高度可调', 'content' => $res['ddgdktiao'], 'is_dot' => 2, ),
                array( 'name' => '大灯清洗装置', 'content' => $res['ddqxzzhi'], 'is_dot' => 2, ),
                array( 'name' => '车内氛围灯', 'content' => $res['cnfwdeng'], 'is_dot' => 2, )
            );
            $blhsjing = array(
                array( 'name' => '前/后电动车窗', 'content' => $res['qhddcchuang'], 'is_dot' => 2, ),
                array( 'name' => '车窗防夹手功能', 'content' => $res['ccyjsjiang'], 'is_dot' => 2,  ),
                array( 'name' => '防紫外线/隔热玻璃', 'content' => $res['fzwxian'], 'is_dot' => 2, ),
                array( 'name' => '后视镜电动调节', 'content' => $res['hsjddtjie'], 'is_dot' => 2, ),
                array( 'name' => '后视镜加热', 'content' => $res['hsjjre'], 'is_dot' => 2, ),
                array( 'name' => '内/外后视镜自动防眩目', 'content' => $res['hsjfxmu'], 'is_dot' => 2, ),
                array( 'name' => '后视镜电动折叠', 'content' => $res['hsjddzd'], 'is_dot' => 2, ),
                array( 'name' => '后视镜记忆', 'content' => $res['hsjjyi'], 'is_dot' => 2, ),
                array( 'name' => '后风挡遮阳帘', 'content' => $res['hfdzyang'], 'is_dot' => 2, ),
                array( 'name' => '后排侧遮阳帘', 'content' => $res['hczylian'], 'is_dot' => 2, ),
                array( 'name' => '后排侧隐私玻璃', 'content' => $res['hpysbli'], 'is_dot' => 2, ),
                array( 'name' => '遮阳板化妆镜', 'content' => $res['zybhzjing'], 'is_dot' => 2, ),
                array( 'name' => '后雨刷', 'content' => $res['hyshua'], 'is_dot' => 2, ),
                array( 'name' => '感应雨刷', 'content' => $res['gyyshua'], 'is_dot' => 2, ),
            );
            $ktbxiang = array(
                array( 'name' => '空调控制方式', 'content' => $res['ktkzfshi'], 'is_dot' => 2, ),
                array( 'name' => '后排独立空调', 'content' => $res['hpdlktiao'], 'is_dot' => 2,  ),
                array( 'name' => '后座出风口', 'content' => $res['hzcfkou'], 'is_dot' => 2, ),
                array( 'name' => '温度分区控制', 'content' => $res['wdfqkxzhi'], 'is_dot' => 2, ),
                array( 'name' => '车内空气调节/花粉过滤', 'content' => $res['cnkqtjie'], 'is_dot' => 2, ),
                array( 'name' => '车载冰箱', 'content' => $res['czbxiang'], 'is_dot' => 2, )
            );
            $rr = array(
                'info' => $info,
                'car_body' => $car_body,
                'base' => $base,
                'gearbox' => $gearbox,
                'dpfxiang' => $dpfxiang,
                'clzhid' => $clzhid,
                'safe_base' => $safe_base,
                'fzcz' => $fzcz,
                'wbfdpzhi' => $wbfdpzhi,
                'nbbase' => $nbbase,
                'zybase' => $zybase,
                'dmtbase' => $dmtbase,
                'lightbase' => $lightbase,
                'blhsjing' => $blhsjing,
                'ktbxiang' => $ktbxiang,
            );

        }else{

            $rr = '';

            return $rr;

        }
        return $rr;
    }

    //去重
    //$arr->传入数组   $key->判断的key值
    public function array_unset_tt($arr,$key){
        //建立一个目标数组
        $res = array();
        foreach ($arr as $value) {
            //查看有没有重复项

            if(isset($res[$value[$key]])){
                //有：销毁

                unset($value[$key]);

            }else{

                $res[$value[$key]] = $value;
            }
        }
        return $res;
    }

    //获取厂商
    public function get_firm($sys_id){
        $firm=Db::table("car_brand")->where("id=$sys_id")->value("upid");

        return $firm;
    }

    /**
     * 新版公共分页sql
     * 20171020
     */
    public function CreateSql($TableName="",$Coll="",$WhereStr="",$WhereStr2="",$PageIndex="",$PageSize="",$OrderKey="",$OrderType="",$join="",$joinId="",$group="",$str=""){
        $min 	= ($PageIndex - 1) * $PageSize;
        $max 	= $PageSize;
        $sql = "SELECT
		{$Coll}
			FROM
				{$TableName}
			{$join}
			WHERE
			{$joinId} IN (SELECT
			{$joinId}
		FROM
			(SELECT
			{$joinId}
		FROM
			{$TableName}
		{$join}
		WHERE
			( 1=1  {$WhereStr}
			) {$group} 	ORDER BY
				{$OrderKey} {$OrderType}  LIMIT {$min},{$max}) as t) {$str}  ORDER BY {$OrderKey}  {$OrderType}
		";
        return $sql;
    }

    /*
     * 新闻类列表
     */
    public function new_list($type){

        $where['news_column'] = $type;

        $where['status'] = 1;

        $list =  Db::table('news')->field('id,title,time,miaoshu,news_column')->where($where)->select();

        return $list;


    }

    /*
     * 获取车浏览记录
     * 1 新车 2 二手车 3 零首付
     */
    public function car_history($type,$session_userid){

        $where['type'] = $type;

        $where['is_del'] = 0;

        $where['userid'] =$session_userid;

        $res = Db::table('car_liulan_history')->where($where)->limit(8)->select();

        return $res;
    }
    /*
     * 获取收藏
     * 1 新车 2 二手车 3 零首付
     */
    public function car_collect_list($type,$userid){

        $where['type'] = $type;

        $where['is_del'] = 0;

        $where['userid'] = $userid;

        $res = Db::table('car_collect')->where($where)->limit(8)->select();

        return $res;
    }

    /*
     * 二手车筛选
     * [lots_car 筛选列表页面]
     * @return [type] [description]
     *
     */

    public function lots_two_cars($sort = 0){


        //接受参数
        $data = $this->params;


        $data['sort'] = $sort;

        if (!empty($data['user_id'])){

            $user_id = $data['user_id'];
        }

        if (!empty($data['page'])){

            $page = $data['page'];
        }
        if (empty($data['num'])){
            $PageSize = 10;
        }else{
            $PageSize = $data['num'];
        }
        if (empty($data['page'])){

            $PageIndex = 1;

        }else{
            $PageIndex = $data['page'];
        }

        if (!empty($data['brand_id'])){

            $brand_id = $data['brand_id'];//品牌id
        }
        if (!empty($data['sys_id'])){

            $sys_id = $data['sys_id'];//车系id
        }
        if (!empty($data['cartype_id'])){

            $cartype_id = $data['cartype_id'];//车型id
        }
        if (!empty($data['price_range'])){

            $price_range = $data['price_range'];//价格区间id
        }

        if (!empty($data['car_mileage'])){

            $car_mileage = $data['car_mileage'];//里程区间id
        }

        if (!empty($data['car_age'])){

            $car_age = $data['car_age'];//车龄id
        }

        if (!empty($data['subface'])){

            $subface = $data['subface'];//级别id
        }

        if (!empty($data['output'])){

            $output = $data['output'];//排量id
        }
        if (!empty($data['gearbox'])){

            $gearbox = $data['gearbox'];//变速箱id
        }

        if (!empty($data['blowdown'])){

            $blowdown = $data['blowdown'];//排放标准id
        }

        if (!empty($data['car_drive'])){

            $car_drive = $data['car_drive'];//驱动id
        }

        if (!empty($data['car_body'])){

            $car_body = $data['car_body'];//车身id
        }
        if (!empty($data['color'])){

            $color = $data['color'];//颜色id
        }
        if (!empty($data['fuel'])){

            $fuel = $data['fuel'];//燃料id
        }
        if (!empty($data['sort'])){

            $sort = $data['sort'];//排序  1价格最低 2价格最高 3车龄最短 4车龄最长 5里程最多 6里程最少
        }
        if (!empty($data['search'])){

            $search = $data['search'];
        }

        //获取城市id

        //$city_id = $this->city_id();
        $city_id = 1;

        $WhereStr = "  and rele_car.status = 1 and rele_car.up_under = 1 and user.is_fenghao = 2 and rele_car.city_id=".$city_id;
        if(!empty($data['user_id'])){
            $WhereStr .= "  and rele_car.user_id = $user_id ";
        }
        if(!empty($data['brand_id'])){
            $WhereStr .= "  and rele_car.brand_id = $brand_id ";
        }

        // dump($brand_id);die;
        if(!empty($data['sys_id'])){
            $WhereStr .= "  and rele_car.sys_id = $sys_id ";
        }
        if(!empty($data['cartype_id'])){
            $WhereStr .= "  and rele_car.cartype_id = $cartype_id ";
        }
        if(!empty($data['fuel'])){
            $WhereStr .= "  and rele_car.fuel = $fuel ";
        }
        if(!empty($data['color'])){
            $WhereStr .= "  and rele_car.color = $color ";
        }
        if(!empty($data['car_body'])){
            $WhereStr .= "  and rele_car.car_body = $car_body ";
        }
        if(!empty($data['car_drive'])){
            $WhereStr .= "  and rele_car.car_drive = $car_drive ";
        }
        if(!empty($data['blowdown'])){
            $WhereStr .= "  and rele_car.blowdown = $blowdown ";
        }
        if(!empty($data['gearbox'])){
            $WhereStr .= "  and rele_car.gearbox = $gearbox ";
        }
        if(!empty($data['output'])){
            $WhereStr .= "  and rele_car.output = $output ";
        }
        if(!empty($data['subface'])){
            $WhereStr .= "  and rele_car.subface = $subface ";
        }
        if(!empty($data['car_age'])){
            $WhereStr .= "  and rele_car.car_age = $car_age ";
        }
        if(!empty($data['search'])){
            $WhereStr .= " and rele_car.name_li like '%".$search."%'";
        }
        if(!empty($data['price_range'])){
            switch ($data['price_range']) {
                case '2':
                    //3万内
                    $WhereStr .= " and rele_car.price <= 3 ";
                    break;
                case '3':
                    //3-5万
                    $WhereStr .= " and rele_car.price between 3 and 5 ";
                    break;
                case '4':
                    //5-8万
                    $WhereStr .= " and rele_car.price between 5 and 8 ";
                    break;
                case '5':
                    //8-10万
                    $WhereStr .= " and rele_car.price between 8 and 10 ";
                    break;
                case '6':
                    //10-15万
                    $WhereStr .= " and rele_car.price between 10 and  15";
                    break;
                case '7':
                    //15-20万
                    $WhereStr .= " and rele_car.price between 15 and 20 ";
                    break;
                case '8':
                    //20-30万
                    $WhereStr .= " and rele_car.price between 20 and 30 ";
                    break;
                case '9':
                    //30-50万
                    $WhereStr .= " and rele_car.price between 30 and 50 ";
                    break;
                case '10':
                    //5-8万
                    $WhereStr .= " and rele_car.price between 50 and 100 ";
                    break;
                case '11':
                    //5-8万
                    $WhereStr .= " and rele_car.price > 100 ";
                    break;
                default:
                    # code...
                    break;
            }
        }
        if(!empty($data['car_mileage'])){
            switch ($car_mileage) {
                case '1':
                    //1万公里内
                    $WhereStr .= " and rele_car.car_mileage <= 1 ";
                    break;
                case '2':
                    //3万公里内
                    $WhereStr .= " and rele_car.car_mileage between 1 and 3 ";
                    break;
                case '3':
                    //5万公里内
                    $WhereStr .= " and rele_car.car_mileage between 3 and 5 ";
                    break;
                case '4':
                    //10万公里内
                    $WhereStr .= " and rele_car.car_mileage between 5 and 10 ";
                    break;
                default:
                    # code...
                    break;
            }
        }

        if (!empty($data['sort'])) {

            if ($data['sort'] == 1) {
                // 排序方式
                $OrderKey = "rele_car.price";
                $OrderType = "asc";
            } elseif ($data['sort'] == 2) {
                // 排序方式
                $OrderKey = "rele_car.price";
                $OrderType = "desc";
            } elseif ($data['sort'] == 3) {
                // 排序方式
                $OrderKey = "rele_car.car_age";
                $OrderType = "desc";
            } elseif ($data['sort'] == 4) {
                // 排序方式
                $OrderKey = "rele_car.car_age";
                $OrderType = "asc";
            } elseif ($data['sort'] == 5) {
                // 排序方式
                $OrderKey = "rele_car.car_mileage";
                $OrderType = "desc";
            } elseif ($data['sort'] == 6) {
                // 排序方式
                $OrderKey = "rele_car.car_mileage";
                $OrderType = "asc";
            } else {
                // 排序方式
                $OrderKey = "rele_car.create_time";
                $OrderType = "desc";
            }
        }
        // 分类

        if (!empty($data['type'])){

            $type=$data['type'];
            if($type){
                $WhereStr .= " and user_shop.is_yx = $type ";
                $join = "join user on user.user_id = rele_car.user_id join user_shop on user.user_id=user_shop.user_id";
            }

        }else{
            $join = "join user on user.user_id = rele_car.user_id";
        }

        $joinid = "pu_id";
        $Coll="rele_car.pu_id,rele_car.user_id,rele_car.cartype_id,rele_car.price,rele_car.name_li,rele_car.news_price,rele_car.car_mileage,rele_car.car_cardtime,rele_car.img_300";
        $sql = $this->CreateSql($TableName="rele_car",$Coll,$WhereStr,$WhereStr,$PageIndex,$PageSize,$OrderKey,$OrderType,$join,$joinid);
        //print_r($sql);
//        $Model = M("rele_car");

        $res = Db::query($sql);

        if($res){
            foreach ($res as $key => $val) {
                $res[$key]['news_price'] = $val['news_price']== 0.00 ? "未知" : $val['news_price'].'万';
                // 通过cartype_id查车系名和车型名称
                //$res[$key]['name'] = $this->get_carname($val['cartype_id']);查询名称不对 coll 内增加rele.car_name_li
                $res[$key]['img_url'] = $this->get_carimg(explode(',',$val['img_300'])[0],1);
                unset($res[$key]['img_300']);
                unset($res[$key]['cartype_id']);
                //获取汽车的首付
                //dump($val['pu_id']);die;
                $pay=$this->get_rele_car_fenqi($val['pu_id']);
                if (!empty($pay)){

                    $res[$key]['pay_20s']=$pay['pay_20s']?$pay['pay_20s']:'';
                    $res[$key]['pay_20y']=$pay['pay_20y']?$pay['pay_20y']:'';
                    $res[$key]['pay_20n']=$pay['pay_20n']?$pay['pay_20n']:'';
                }

                //fenye
                //暂时注销
                //$count = Db::table('rele_car')->join($join)->where('1=1 '.$WhereStr)->count();
                //$res[$key]['page_num']=ceil($count/10);
                $res[$key]['page']=$PageIndex;
            }
        }



        $res = $res ? $res : array();

        return $res;

    }

    public function search_news_carlist($chx,$px){

        //接受参数
        $data = $this->params;

        $data['chs'] = $chx;//五万以下

        $data['px'] = $px;//低月供

        //echo 1;

        $where="1=1  ";
        //模糊查找 如 大众 奥迪 朗逸
        if(!empty($data['key'])){
            $where.=" and name like '%".$data['key']."%'  ";
        }

        // dump($where);die;
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

            $bid = $ppdata['id'];

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
        //排放标准 OBD 京V 欧V 国V
        if (!empty($data['pfbz'])){
            $where.=" and blowdown= ".$data['pfbz'];
        }

        //驱动 前驱 后驱

        if (!empty($data['qd'])){
            $where.=" and car_drive=".$data['qd'];
        }
        //两厢 三箱 皮卡 旅行车
        if (!empty($data['cs'])){
            $where.=" and car_body=".$data['cs'];
        }
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
        if (!empty($data['chs'])){
            switch($data['chs']){
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

        }else{

            $where.=" order by id desc ";//首付由高到低
        }


        $ss =  Db::query("select * from new_car where  $where limit 5");

        foreach ($ss as $key => $val) {
            $ss[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $ss[$key]['name']=$this->get_carname($val['cartype_id']);
            $ss[$key]['pay10_s2']=$val['pay10_s2'];
            $ss[$key]['pay10_y2']=$val['pay10_y2'];
            unset($ss[$key]['img_300']);
        }


        return $ss;

    }

    /*
     * 获取发布车辆
     */

    public function my_shop_fabu($user_id,$min_num,$page_size,$status,$up_under=1){


        // user_id = $user_id and up_under=1 and is_show!=1 and status = 1

        $where['user_id'] = $user_id;
        if (!empty($up_under)){

            $where['up_under'] = $up_under;
        }
        if (!empty($status)){

            $where['status'] = $status;
        }

        $where['is_show'] = 2;


        //dump($where);die;

        //获取发布的车辆
        $fabu_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300,create_time")->where($where)->order("pu_id desc")->limit($min_num,$page_size)->select();


        foreach ($fabu_car as $key => $val) {
            $fabu_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $fabu_car[$key]['img_url']=$this->get_carimg($val['img_300'],1);
            $fabu_car[$key]['car_mileage']=$val['car_mileage'];
            $fabu_car[$key]['create_time']=substr($val['create_time'], 0, 10);
            unset($fabu_car[$key]['cartype_id']);
            unset($fabu_car[$key]['img_300']);
        }
        //  dump($fabu_car);die;

        return $fabu_car;
    }

    //年检
    public function get_year_inspect($car_cardtime){
        //上牌照时间
        $aa1=explode('年', $car_cardtime);
        $year1=$aa1[0];
        $aaa1=explode('月', $aa1['1']);
        $month1=$aaa1[0];
        $aaaa1=explode('日', $aaa1['1']);
        $day1=$aaaa1[0];
        // $zero1=$year1[0]."-".$month1[0]."-".$day1[0];
        // $res=mktime(0,0,0,$month[0],$day[0],$year[0]);
        // $zero2=date("y-m-d");
        //当前时间

        $year2=date("Y");
        $month2=date("m");
        $day2=date("d");
        //年份对比
        $data=$year2-$year1;
        if($data>15){
            //每年审两次,6个月一次
            if($month1<$month2){
                $month3=$month1+6;
                if($month3>12){
                    $year=$year1+1;
                    $month=$month3-12;
                    $year_inspect=$year."年".$month."月".$day1."日";
                }else{
                    $year_inspect=$year2."年".$month3."月".$day1."日";
                }
            }elseif ($month1>$month2) {
                $year_inspect=$year2."年".$month1."月".$day1."日";
            }elseif($month1==$month2){
                if($day1<$day2){
                    $month3=$month1+6;
                    if($month3>12){
                        $year=$year1+1;
                        $month=$month3-12;
                        $year_inspect=$year."年".$month."月".$day1."日";
                    }else{
                        $year_inspect=$year2."年".$month3."月".$day1."日";
                    }
                }elseif($day1>$day2){
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }elseif($day1==$day2){
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }
            }
        }elseif($data>6 && $data<=15){
            //一年一审
            //判断月份
            if($month1<$month2){
                $year=$year2+1;
                $year_inspect=$year."年".$month1."月".$day1."日";
            }elseif($month1>$month2){
                $year_inspect=$year2."年".$month1."月".$day1."日";
            }elseif($month1==$month2){
                if($day1<$day2){
                    $year=$year2+1;
                    $year_inspect=$year."年".$month1."月".$day1."日";
                }else{
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }
            }
        }elseif($data<=6){
            //两年一审
            if($data==0){
                $year=$year2+2;
                $year_inspect=$year."年".$month1."月".$day1."日";
            }elseif($data==1){
                $year=$year2+1;
                $year_inspect=$year."年".$month1."月".$day1."日";
            }elseif($data==2){
                if($month1<$month2){
                    $year=$year2+2;
                    $year_inspect=$year."年".$month1."月".$day1."日";
                }elseif($month1>$month2){
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }elseif($month1==$month2){
                    if($day1<$day2){
                        $year=$year2+2;
                        $year_inspect=$year."年".$month1."月".$day1."日";
                    }elseif($day1>=$day2){
                        $year_inspect=$year2."年".$month1."月".$day1."日";
                    }
                }
            }elseif($data==3){
                $year=$year2+1;
                $year_inspect=$year."年".$month1."月".$day1."日";
            }elseif($data==4){
                if($month1<$month2){
                    $year=$year2+2;
                    $year_inspect=$year."年".$month1."月".$day1."日";
                }elseif($month1>$month2){
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }elseif($month1==$month2){
                    if($day1<$day2){
                        $year=$year2+2;
                        $year_inspect=$year."年".$month1."月".$day1."日";
                    }elseif($day1>=$day2){
                        $year_inspect=$year2."年".$month1."月".$day1."日";
                    }
                }
            }elseif($data==5){
                $year=$year2+1;
                $year_inspect=$year."年".$month1."月".$day1."日";
            }elseif($data==6){
                if($month1<$month2){
                    $year=$year2+1;
                    $year_inspect=$year."年".$month1."月".$day1."日";
                }elseif($month1>$month2){
                    $year_inspect=$year2."年".$month1."月".$day1."日";
                }elseif($month1==$month2){
                    if($day1<$day2){
                        $year=$year2+1;
                        $year_inspect=$year."年".$month1."月".$day1."日";
                    }elseif($day1>=$day2){
                        $year_inspect=$year2."年".$month1."月".$day1."日";
                    }
                }
            }
        }


        return $year_inspect;
    }

    //保险
    public function safe($car_cardtime){
        //上牌照时间
        $aa1=explode('年', $car_cardtime);
        $year1=$aa1[0];
        $aaa1=explode('月', $aa1['1']);
        $month1=$aaa1[0];
        $aaaa1=explode('日', $aaa1['1']);
        $day1=$aaaa1[0];
        // $zero1=$year1[0]."-".$month1[0]."-".$day1[0];
        // $res=mktime(0,0,0,$month[0],$day[0],$year[0]);
        // $zero2=date("y-m-d");
        //当前时间
        $year2=date("Y");
        $month2=date("m");
        $day2=date("d");
        if($month1>$month2){
            $safe=$year2."年".$month1."月".$day1."日";
        }elseif($month1==$month2){
            if($day1>$day2){
                $safe=$year2."年".$month1."月".$day1."日";
            }elseif($day1<$day2){
                $year=$year2+1;
                $safe=$year."年".$month1."月".$day1."日";
            }elseif($day1==$day2){
                $safe=$year2."年".$month1."月".$day1."日";
            }
        }elseif($month1<$month2){
            $year=$year2+1;
            $safe=$year."年".$month1."月".$day1."日";
        }
        return $safe;
    }
    //获取图片路径
    public function get_uplodes_imgs($imgs){
        $data=explode(",",$imgs);
        foreach($data as $k => $v){
            if(strpos($v,'www.gj2car.com') !==false){
                $list[]=str_replace("http://www.gj2car.com/Uploads/relecar","",$v);
            }else{
                $list[]=str_replace("http://39.106.67.47/butler_car/Uploads/relecar/","",$v);
            }
        }
        $arr=implode(",",$list);
        return $arr;
    }
    //获取图片路径
    public function get_uplodes_imgs_512($imgs){
        $data=explode(",",$imgs);
        foreach($data as $k => $v){
            $url=array();
            $name=substr($v,0,-4);
            //$end=substr($v,-4);
            $url=$name."xb".".jpg";
            if(strpos($url,'www.gj2car.com') !==false){
                $list[]=str_replace("http://www.gj2car.com/Uploads/relecar","",$url);
            }else{
                $list[]=str_replace("http://39.106.67.47/butler_car/Uploads/relecar/","",$url);
            }
            //$list[]=str_replace("http://www.gj2car.com/Uploads/relecar","",$url);
        }
        $arr=implode(",",$list);
        return $arr;
    }
    //获取图片路径
    public function get_uplodes_imgs_300($imgs){
        $data=explode(",",$imgs);
        foreach($data as $k => $v){
            $url=array();
            $name=substr($v,0,-4);
            //$end=substr($v,-4);
            $url=$name."xd".".jpg";
            if(strpos($url,'www.gj2car.com') !==false){
                $list[]=str_replace("http://www.gj2car.com/Uploads/relecar","",$url);
            }else{
                $list[]=str_replace("http://39.106.67.47/butler_car/Uploads/relecar/","",$url);
            }
            //$list[]=str_replace("http://www.gj2car.com/Uploads/relecar","",$url);
        }
        $arr=implode(",",$list);
        return $arr;
    }

    /**
     * [get_brand_firm_sysname 查找品牌，车系厂商，车系名称]
     * @param  [type] $id    [父级upid]
     * @param  [type] $level [当前级别]
     * @return [type]        [description]
     */
    public function get_brand_firm_sysname($id,$level){
        if($level == 2){
            $br = Db::table('car_brand')->field('name,id,pin')->where("id = $id")->find();
            // 查找品牌
            $brand = $br['name'];
            $pin = $br['pin'];
        }elseif($level == 3){
            // 查找品牌，车系厂商
            $fi = Db::table('car_brand')->field('name,id,upid')->where("id = $id")->find();
            $firm = $fi['name'];
            $br = Db::table('car_brand')->field('name,id,upid,pin')->where("id = ".$fi['upid'])->find();
            $brand = $br['name'];
            $pin = $br['pin'];
        }elseif($level == 4){
            // 查找品牌，车系厂商，车系名称
            $sys = Db::table('car_brand')->field('name,id,upid')->where("id = $id")->find();
            $sysname = $sys['name'];
            $fi = Db::table('car_brand')->field('name,id,upid')->where("id = ".$sys['upid'])->find();
            $firm = $fi['name'];
            $br = Db::table('car_brand')->field('name,id,upid,pin')->where("id = ".$fi['upid'])->find();
            $brand = $br['name'];
            $pin = $br['pin'];
        }elseif($level == 5){
            // 查找品牌，车系厂商，车系名称,车型名称
            $ct = Db::table('car_brand')->field('name,id,upid')->where("id = $id")->find();
            // $y_n = explode(' ',$ct['name']);
            // foreach ($y_n as $k => $v) {
            // 	$ct_name .= $v;
            // }
            // $carname = $ct_name;
            $carname = $ct['name'];
            $sys = Db::table('car_brand')->field('name,id,upid')->where("id",$ct['upid'])->find();
            $sysname = $sys['name'];
            $fi = Db::table('car_brand')->field('name,id,upid')->where("id",$sys['upid'])->find();
            $firm = $fi['name'];
            $br = Db::table('car_brand')->field('name,id,upid,pin')->where("id",$fi['upid'])->find();
            $brand = $br['name'];
            $pin = $br['pin'];
        }

        $data = array(
            'brand' => $brand ? $brand : '',
            'firm' => $firm ? $firm : '',
            'sysname' => $sysname ? $sysname : '',
            'carname' => $carname ? $carname : '',
            'pin' => $pin ? $pin : '',
        );
        // var_dump($data);exit;
        return $data;
    }



}
