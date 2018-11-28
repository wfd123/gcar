<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +--------------------------------------------------------------------
//];
use think\Route;
//// api.tp.com  ===> www.tp.com/index.php/api
//// 第一个api  代表域名前api  第二个api 代表 index.php/后面的api
//Route::domain('api','api');
//
//// api.tp.com  ===> www.tp.com/index.php/api/user/index/id/2
//Route::rule('user/:id','user/index');
//Route::rule('/^zz\/sn_c1$/','index/index/sell');//二手车筛选
//Route::domain('xin','index/newcar');

Route::domain('xin',[
    // 动态注册域名的路由规则
    ':city$' => ['index/newcar/index',['method'=>'GET'], ['city'=>'[a-z]+$']],
    ':city/index$' => ['index/newcar/index',['method'=>'GET'], ['city'=>'[a-z]+$']],
    ':city/:brand$'=> ['index/newcar/search_newcar', ['method'=>'GET'], ['city'=>'[a-z]+$','brand'=>'[a-z]+$']],
    ':city/:brand/sn_<k_p?><v_p?><k_s?><v_s?><k_o?><v_o?><k_g?><v_g?><k_d?><v_d?><k_b?><v_b?><k_c?><v_c?><k_f?><v_f?><k_n?><v_n?>' => [
        'index/newcar/search_newcar', ['method'=>'GET'], ['k_p'=>'p','v_p'=>'\d{1,2}-\d{1,2}','k_s'=>'s','v_s'=>'\d+','k_o'=>'o','v_o'=>'\d+','k_g'=>'g','v_g'=>'\d+','k_d'=>'d','v_d'=>'\d+','k_b'=>'b','v_b'=>'\d+','k_c'=>'c','v_c'=>'\d+','k_f'=>'f','v_f'=>'\d+','k_n'=>'n','v_n'=>'\d+']
    ],
    ':city/detail/:id' => ['index/newcar/newcardetails',['method'=>'GET'], ['city'=>'[a-z]+$', 'id' => '\d+']],
]);

Route::rule('/', 'index/index/index');
Route::rule(':city$','index/index/index');
//Route::rule(':city/detail/:brand_id/:sys_id','index/Newcar/newcardetails');
//Route::rule(':city/newcar','index/newcar/index');
Route::rule(':city/twocar','index/twocar/index');
Route::rule(':city/sell','index/index/sell');
Route::rule(':city/change','index/change/index');
Route::rule(':city/news','index/news/index');
Route::rule(':city/newsdetails/:id','index/news/newsdetails');
Route::rule(':city/appdownload','index/index/appdownload');
Route::rule(':city/join_us','index/index/join_us');
Route::rule(':city/link_us','index/index/link_us');
Route::rule(':city/service','index/index/service');
Route::rule(':city/website','index/index/website');
Route::rule(':city/shop','index/shop/index');
Route::rule(':city/shop_list','index/shop/shop_list');
Route::rule(':city/shop_info','index/shop/shop_info');
Route::rule(':city/login','index/user/car_login');
Route::rule(':city/logout','index/user/car_logout');
Route::rule(':city/register','index/user/register');
Route::rule(':city/per_his','index/user/person_history');
Route::rule(':city/per_man','index/user/person_manage');
Route::rule(':city/per_ord','index/user/person_order');
Route::rule(':city/per_rele','index/user/person_release');
Route::rule(':city/per_pub','index/user/person_public');
Route::rule(':city/per_buse','index/user/person_busenter');
Route::rule(':city/per_oppo','index/user/person_opportunity');
Route::rule(':city/per_info','index/user/person_info');
Route::rule(':city/per_coll','index/user/person_collect');
Route::rule(':city/per_feed','index/user/person_feedback');
Route::rule(':city/lots_cars','index/index/lots_cars');//二手车筛选
Route::rule(':city/search_newcar','index/index/search_newcar');//新车筛选


Route::rule(':city/details/:cheid','index/index/details');//二手车详情
Route::rule(':city/detai/:cheid','index/zerocar/zerocardetails');//零首付详情
Route::rule('zhang/:id','index/index/zhang');
Route::rule('db','index/index/index');
Route::rule('test/:id','api/gongneng/test');//一旦设置参数必须填写

Route::rule('jun','api/gongneng/zhang');
Route::rule(':city/newcar','index/Newcar/index');


Route::rule(':city/:brand$','index/index/lots_cars');//二手车筛选
Route::get(':city/:brand/sn_<k_p?><v_p?><k_s?><v_s?><k_o?><v_o?><k_g?><v_g?><k_d?><v_d?><k_b?><v_b?><k_c?><v_c?><k_f?><v_f?><k_n?><v_n?><k_l?><v_l?><k_m?><v_m?><k_a?><v_a?>','index/index/lots_cars',[],
    ['k_p'=>'p','v_p'=>'\d{1,2}-\d{1,2}','k_s'=>'s','v_s'=>'\d+','k_o'=>'o','v_o'=>'\d+','k_g'=>'g','v_g'=>'\d+','k_d'=>'d','v_d'=>'\d+','k_b'=>'b','v_b'=>'\d+','k_c'=>'c','v_c'=>'\d+','k_f'=>'f','v_f'=>'\d+','k_n'=>'n','v_n'=>'\d+','k_l'=>'l','v_l'=>'\d+','k_m'=>'m','v_m'=>'\d+','k_a'=>'a','v_a'=>'\d+']);
//Route::rule(':city/:brand$','index/index/lots_cars');//二手车筛选

//'/^zz\/insale\/id\/(\d+)\/in\/(\d+)$/' => "Index/index?id=:1&in=:2",//在售车源
//Route::rule('time/:year/[:month]','api/gongneng/test');

//Route::rule('asd$','api/gongneng/asd');

//Route::rule('type','api/gongneng/type','get'); //只能是get 请求

//Route::get('type','api/gongneng/type'); //只能是get 请求

//Route::rule('type','api/gongneng/type','post');只能是post 请求

//Route::post('type','api/gongneng/type');

//Route::rule('type','api/gongneng/type','get|post'); //支持post和get

//支持所有路由

//Route::rule('type','api/gongneng/type','*');

//Route::any('type','api/gongneng/type');

//动态批量注册

//Route::rule(["test"=>"api/gongneng/test",
//             "type"=>"api/gongneng/type"
//    ],'','get');
//
//Route::get(["test"=>"api/gongneng/test",
//            "type/:id"=>"api/gongneng/type"
//     ]);
//使用配置文件批量注册
//return [
//    "test"=>"api/gongneng/test",
//   "type/:id"=>"api/gongneng/type"
//];

//变量规则
//设置路由参数id 必须是数字 必须是1-3位
//Route::rule("type/:id","api/gongneng/type",'get',[],['id'=>'\d{1,3}']);

//路由参数
//Route::rule("type/:id","api/gongneng/type",'get',['method'=>'get','ext'=>'html'],['id'=>'\d{1,3}']);

//设置快捷路由
//声明
//类  public function geta(){
//        echo 'a';
//   }
//
//    public function getb()
//    {
//        echo 'b';
//   }
//用此方法 方法名前 是要加get
//Route::Controller('gongneng','api/gongneng');//访问http://www.hr.com:8083/hr/public/gongneng/a