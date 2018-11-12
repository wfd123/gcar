<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11 0011
 * Time: 下午 6:32
 */

namespace app\index\controller;


use think\Controller;

class Error extends Controller
{

    public function index()
    {
        $this->redirect('index/index');
    }

    public function _empty()
    {
        $this->redirect('index/index');
    }
}