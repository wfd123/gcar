<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/21 0021
 * Time: 上午 9:18
 */
namespace lib;

use think\Controller;
use think\Db;
class  Pages extends Controller{

    /*
     * 分页函数
     */
    public function news($pageNum = 1, $pageSize = 3,$table,$where=[])
    {
        $num1 = ($pageNum-1) * $pageSize;

        $list = Db::name($table)->where($where)->limit($num1,$pageSize)->order('addtime','desc')->select();

        return $list;

    }

    /*
     * 显示总页数
     */
    public function allnews($table,$where=[])
    {

       $list = Db::name($table)->where($where)->count();

       return $list;

    }
    /*
     *积分模板数
     */
    public function bp_mould_page($pageNum = 1, $pageSize = 3,$table,$where=[])
    {
        $num1 = ($pageNum-1) * $pageSize;

        $res = Db::name($table)->where($where)->limit($num1,$pageSize)->order('addtime','desc')->select();

        return $res;

    }

    /*
     * 积分模板总数
     */
    public function bp_mould_all($table,$where=[]){

        $count = Db::name($table)->where($where)->count();

        return $count;

    }

    /*
     * 积分筛选分页函数
     */

    public function page_list($pageNum = 1, $pageSize = 3,$table,$where=[])
    {
//
//        $where['pid'] = $user_id;
//        $join = [['api_user u','u.user_id = a.article_uid']];
//
//        $res = Db::name($table)->alias('a')->join($join)->where($where)->find();

        $num1 = ($pageNum-1) * $pageSize;

        $res = Db::name($table)->where($where)->limit($num1,$pageSize)->order('addtime','desc')->select();

        return $res;
    }

    /*
     * 积分筛选显示总页
     */

    public function page_all($table,$where=[],$start,$end)
    {
        $cont = Db::name($table)->where($where)->where('addtime','between',[$start,$end])->order('addtime','desc')->count();

        return $cont;
    }

}