<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15 0015
 * Time: 下午 4:45
 */

namespace app\admin\controller;

use think\Db;
use think\Controller;

class Index extends Controller
{

    public function pcnews()
    {
        $type = input('param.new_type');

        $where['new_type'] ='';

        if (!empty($type) || $type === "0" ) {

            $where['new_type'] = $type;

        }else{
            $where['new_type'] = array('neq',8);
        }


        $where['is_del'] = 0;

        $list = Db::table('car_pc_news')->where($where)->order('sort desc,addtime desc')->paginate(5,false,
            [
                'type'=>'BootstrapDetailed'
            ]
        );

        dump($list);die;

        $this->assign('list', $list);

        return $this->fetch();
    }
}