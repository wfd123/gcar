<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29 0029
 * Time: 下午 4:18
 */

namespace app\index\controller;

use think\Session;
use think\Config;
use think\Db;
class Code extends Common
{

  public function get_code(){

      $username = $this->params['user_phone'];

      $exist = $this->params['is_exist'];

      $username_type =  $this->check_username($username);

     switch ($username_type){

         case 'phone':

             $this->get_code_by_phone($username,'phone',$exist);
             break;

     }

  }

  /*
   * 通过手机/邮箱获取验证码
   */
    public function get_code_by_phone($phone,$type,$exist){

        if ($type == 'phone'){

            $type_name = '手机';
        }else{
            $type_name = '邮箱';
        }


        /* 检测手机号是否存在*/
        //$this->check_exist($phone,$type,$exist);


        /* 检查验证码评率 30秒一次  ? 代表session 是否存在*/
       if("?".Session::get('last_send_time')){

            if (time() -Session::get('last_send_time') <1){

                $this->return_msg(400,$type_name.'验证码，每30秒只能一次');
            }
        }
        /* 生成验证码*/

        $code = $this->make_code(6);



        /* 使用session 存储验证码 方便比对  md5加密*/
        $md5_code = $code;

        Session::set('code',$md5_code);

        /* 使用session 存储验证码的发送时间*/
        Session::set('last_send_time',time());

        /* 发送验证码*/
        if ($type == 'phone'){

            $this->send_code_to_phone($phone,$code);

        }else{

            $this->send_code_to_email($phone,$code);
        }


  }

   /*
    * 生成验证码
    */
    public function make_code($num){

        $max = pow(10,$num) -1;

        $min = pow(10,$num-1);

        return rand($min,$max);

   }

    /**
     * [send_sms 发送短信]
     * @param  [type] $telephone [description]
     * @param  [type] $code      [description]
     * @return [type]            [description]
     * 1注册 2忘记密码/修改密码 3置换/换车
     */
    public function send_code_to_phone($num,$code,$type = 1){
        header("Content-type: text/html; charset=utf-8");
        date_default_timezone_set('PRC'); //设置默认时区为北京时间
        $uid = '410225';//账号
        $ts = date('YmdHis');
        // 短信接口密码 $passwd
        $passwd = strtoupper(MD5('823670'.$ts));//密码加密
        //$num ='136087976876';
        $message = "您的手机验证码是：{$code}，请勿向任何单位或个人透漏。【管家车易站】";
        $msg = base64_encode(mb_convert_encoding($message, "gb2312", "utf-8"));
        $gateway = "http://api.shumi365.com:8090/sms/send.do?userid={$uid}&pwd={$passwd}&timespan={$ts}&mobile={$num}&content={$msg}";
       // echo $gateway;die;
       // ini_set('max_execution_time', 300);
        $result = file_get_contents($gateway);
//        $ch = curl_init();
//        $timeout = 10; // set to zero for no timeout
//        curl_setopt ($ch, CURLOPT_URL,$gateway);
//        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//        $url = curl_exec($ch);


        //$result = $this->https_request($gateway);
        // var_dump($msg);
        // var_dump($passwd);
        // var_dump(base64_decode($msg));
        // var_dump($result);exit;
        $time = date("Y-m-d H:i:s");

        if(  $result > 0 ){

            $reg = array(
                'is_phone'=>$num,
                'code'=>$code,
                'type'=>$type,
                'create_time'=>$time,
            );
            //$ls->data($reg)->add();
            Db::table('register_emporary')->insert($reg);

            return true;
        }else{
            return false;
        }
    }

    public function send_code_to_email($phone,$code)
    {
        echo 'email';
    }

}