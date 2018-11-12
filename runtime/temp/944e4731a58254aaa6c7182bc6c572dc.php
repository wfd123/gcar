<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"E:\Apache24\htdocs\g_car\public/../app/index\view\shop\shop_info.html";i:1540780831;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/iconfont.css">
	<link rel="stylesheet" href="/static/css/swiper.min.css" />
	<style>
	
	</style>
	<body style="background:#f8f8f8">
	<div class="header"><div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！
			欢迎用户<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?>
			<a href="<?php echo url('user/car_login'); ?>" class="coloryel">【登录】</a>,免费<a href="<?php echo url('user/car_login'); ?>" class="coloryel">【注册】</a>
			<?php else: ?>
			<?php echo \think\Session::get('phone'); endif; ?></div>
		<div class="fright">
			<ul class="site_nav_menu">
				<li><a href="<?php echo url('index/index'); ?>"><img src="/static/img/shouye.png" alt="" />首页</a></li>
				<li class="sec_li"><a href="<?php echo url('twocar/index'); ?>"><img src="/static/img/maic.png" alt="" />我要买车</a></li>
				<li><a href="<?php echo url('index/sell'); ?>"><img src="/static/img/maic.png" alt="" />我要卖车</a></li>
				<li><a href="<?php echo url('index/appdownload'); ?>"><img src="/static/img/xiazai.png" alt="" />APP下载</a></li>
				<li><a href=""><img src="/static/img/wangahn.png" alt="" />网站导航</a></li>
				<?php if(!(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty()))): ?><li><a href="<?php echo url('user/person_history'); ?>"><img src="/static/img/wangahn.png" alt="" />会员中心</a></li><?php endif; if(!(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty()))): ?><li><a href="<?php echo url('user/car_logout'); ?>"><img src="/static/img/wangahn.png" alt="" />安全退出</a></li><?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<div class="fn_show gj_clear header_show">
	<div class="wrap gj_clear marginbt">
		<div class="logo">
	 		  <h1> <a href="/index/index/index.html">二手车交易市场</a></h1>
		</div>
		<div class="city_current">
			<div class="address"><span>郑州</span><b class="icon1"></b></div>
			<div class="white-line"></div>
			<div class="city"  style="display: none;" >
				<ol>
				</ol>
			</div>
		</div>
		<div class="search gj_clear">
	        <div class="search_tab">
	            <a href="javascript:;" class="s_old active" id="">二手车</a>
	            <a href="javascript:;" class="s_new">新车</a>
	            <a href="javascript:;" class="s_zero">零首付</a>
	        </div>
	        <div class="ipt_cont">
	        	  <div class="search_ipts">
		        	 <input type="text"  name="txtNewcar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn">搜索</a>
		        </div>
		       	<div class="fn_hide search_ipts">
		        	 <input type="text"  name="txtNewcar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn">搜索</a>
		        </div>
		      	<div class="fn_hide search_ipts">
		      	  	 <input type="text"  name="txtzerocar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn" >搜索</a>
		        </div>
	       
	        </div>
	       <!-- 搜索历史记录 -->
	        <div id="history_list" class="search_list" style="display:none;"></div>
	    </div>
	</div>
	<div class="nav gj_clear">
		<ul class="wrap">
			<li><a href="<?php echo url('index/index'); ?>">首页</a></li>
			<li ><a href="<?php echo url('newcar/index'); ?>" class="sec_li">新车</a></li>
			<li><a href="<?php echo url('twocar/index'); ?>">二手车</a></li>
		    <!--<li><a href="zeroCar.html">零首付</a></li>-->
			<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
			<li><a href="<?php echo url('change/index'); ?>">置换</a></li>
			<li><a href="<?php echo url('news/index'); ?>">新闻资讯</a></li>
			<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
			<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?><li><a href="<?php echo url('user/car_login'); ?>">登录/注册</a></li><?php endif; ?>
			<li><a href="<?php echo url('index/join_us'); ?>">关于我们</a></li>
			<li><a href="<?php echo url('shop/index'); ?>">优选商家</a></li>
		</ul>
	</div>
</div>
<div class="fn_hide gj_clear header_hide borbt">
	<div class="wrap" >
		<div class="logo" >
		   <h1 style=""> 
		   <a href="/index/index/index.html"></a>
		   </h1>
		</div>
		<div class="city_current">
			<div class="address"><span>郑州</span><b class="icon1"></b></div>
			<div class="white-line"></div>
			<div class="city"  style="display: none;" >
				<ol>
				</ol>
			</div>
		</div>
		<div class="header_tel">
			<img src="/static/img/phone1.png" alt="" height="17"/>
			0371-53375515
		</div>
		<div class="nav">
			<ul>
				<li><a href="<?php echo url('index/index'); ?>">首页</a></li>
				<li><a href="<?php echo url('twocar/index'); ?>">二手车</a></li>
				<li><a href="<?php echo url('newcar/index'); ?>">新车</a></li>
				<!--<li><a href="zeroCar.html">零首付</a></li>-->
				<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
				<li><a href="<?php echo url('change/index'); ?>">置换</a></li>
				<li><a href="<?php echo url('news/index'); ?>">新闻资讯</a></li>
				<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
				<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?><li><a href="<?php echo url('user/car_login'); ?>">登录/注册</a></li><?php endif; ?>
			</ul>
		</div>
	</div>
	</div>
<script>
	
	function tab(a,b,c){
	    $(a).on("click",c,function(){
	        $(this).addClass('active').siblings().removeClass('active');
	        $(b).eq($(this).index()).show().siblings().hide();
	    })
	}
//	$('.wrap li').click(function(){
//		
//		$(this).addClass('active').siblings().removeClass('active')
//	})
tab(".search_tab",".ipt_cont .search_ipts","a");
$(window).on('scroll',function(){
	var bH=$("body").outerHeight();
	var wH=$(window).innerHeight();
	
	var wsH=$(window).scrollTop();  
	var sH=$(".header .fn_show").height();
//	console.log(bH+'页面高度---页面可用高度'+wH+'-----滚动高度'+wsH+'-----页面头部高度'+sH)
//	console.log(bH-wH)
	if(wsH+50>sH){
		$(".header .header_hide").css('display','block');
		$(".header .header_show").css('display','none');
		$(".header").addClass('fixedTop')
	}else{
		$(".header .header_hide").css('display','none');
		$(".header .header_show").css('display','block');
		$(".header").removeClass('fixedTop')
	}
	
})

</script>
</div>
	<div class="breadnav">您的位置：<a href="#">郑州二手交易市场</a>>><a href="#">向阳二手车 >></a><a href=""> 店铺首页</a></div>
	<div class="storeH">
		<div class="wrap">
			<h1 class="textCenter"><span>郑州管家二手车<b>优选商家</b></span></h1>
			<p class="fright phone">
				  <i class="icon iconfont icon-msnui-telephone"></i>  15638886114
			</p>
			<div class="gj_clear"></div>
			<ul class="shop_nav gj_clear">
				<li><a href="<?php echo url('shop/index'); ?>">店铺首页</a></li>
				<li><a href="<?php echo url('shop/shop_list'); ?>">在售车源</a></li>
				<li ><a href="<?php echo url('shop/shop_info'); ?>">公司信息</a></li>
			</ul>
		</div>
		
	</div>
	<div class="wrap">
		<div class="store_info">
			<h1><span>郑州管家二手车</span></h1>
			<p class="store_on">营业时间： 9：00-18：00 <i>|</i>联系电话： 15638886114 <i>|</i>在售车辆： <b>1735辆</b></p>
			<h2>服务内容</h2>
			<div class="store_service">				
				<p><img src="/static/img/sda.png" alt="" />车辆置换</p><p><img src="/static/img/sda.png" alt="" />价格评估</p><p><img src="/static/img/sda.png" alt="" />代办过户</p>
				<p><img src="/static/img/sda.png" alt="" />代办验车</p><p><img src="/static/img/sda.png" alt="" />代办上牌</p><p><img src="/static/img/sda.png" alt="" />代办转籍</p>
				<p><img src="/static/img/sda.png" alt="" />代办保险</p><p><img src="/static/img/sda.png" alt="" />补办手续</p><p><img src="/static/img/sda.png" alt="" />代办转籍</p>
				<p><img src="/static/img/sda.png" alt="" />分期贷款</p>
			</div>
		</div>
		<h2 class="tit_line"><b></b>公司简介</h2>
		<div class="store_intro">
			河南管家二手名车是中原一家以二手车收售、评估、售后服务、客户服务、为一体的二手车综合服务公司，并为购车客户提供过户，检测、上牌、保险、私人专属定制等一站式服务。向阳二手名车现营业，中高端车型全面涵盖，其主营品牌有：奔驰、宝马、奥迪、保时捷、、大众、丰田等，5万-300万各种品牌名车。向阳二手名车广场所有在售车辆需经过134项精益化检测由国家注册评估师鉴定，质量保证领先于二手车行业；我们秉承“客户至上、服务至上”的企业经营理念，保证所销售的车辆非泡水车、火烧车、事故车等，并都是法律上合法车辆，给每位来向阳二手车购车的客户提供一个“放心买，安心用”的购车环境。
		</div>
		<h2 class="tit_line"><b></b>公司位置</h2>
		<div class="store_map">
		<div class="map" style="display: block">
            <a style="height: 0px; line-height: 0px; width: 0px; overflow: hidden;" name="map"></a>
            <div style="border: 0pt none; overflow: hidden; position: relative; top: 0pt; left: 0pt; width: 1200px; height: 580px; z-index: 0; background-color: rgb(235, 234, 232); cursor: default; margin: 0 auto" id="allmap">
            </div>
        </div>


		</div>
	</div>
	
	<div class="adv_img">
		<h2>想开什么车 ？管家车易站应有尽有.</h2>
		<div class="buy_ipt">
			<input type="text" placeholder="请输入手机号"/>
			<div class="btn_buy">我要买车</div>
		</div>
	</div>		
	<div class="footer">
	<div class="wrap">
		<div class="company_info gj_clear">
			<div class="footer_logo"><img src="/static/img/1024.png" alt="" width="80"/><p>管家车易站</p></div>
			<div class="basic_info">
				<div>
					<a href="<?php echo url('index/join_us'); ?>">关于我们</a>
					<a href="<?php echo url('index/link_us'); ?>">联系我们</a>
					<a href="<?php echo url('index/service'); ?>">服务保障</a>
					<a href="<?php echo url('index/website'); ?>">网站地图</a>
				</div>
				<p>
					版权所有：河南管家车销售有限公司 <br /> 
				 工信备案：豫ICP备17046554号 <br /> 
				  CopyRight © 2015-2018 ww
				</p>
			</div>
			<div class="QRcode"><img src="/static/img/ewmdown.png" alt="" width="86"/><p>下载APP</p></div>
			<div class="QRcode"><img src="/static/img/ewm_guanzhu.png" alt="" width="86"/><p>关注公众号</p></div>
			<div class="contact_way">
				<p>免费咨询、建议、投诉 <br />
				卖车热线（投诉建议）：<b>0371-53375515</b> <br />
				 每天9：00-21：00(法定节假日除外)
				</p>		
			</div>
		</div>	
		<div class="optimize_link">
			<p class="link_tit">热门品牌：</p>
			<span class="more_dwon"></span>
			<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
			<a href="<?php echo url('index/lots_cars'); ?>?brand_id=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['name']; ?></a>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
		<div class="optimize_link">
			<p class="link_tit ">热门车系123：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>
			<a href="">大众</a>

		</div>
		<div class="optimize_link gj_clear">
			<p class="link_tit">友情链接123：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>



		</div>
	</div>
<script>
	$(".more_dwon").click(function(){
		$(this).parents(".optimize_link").addClass("link_active")
	})
</script></div>
	
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/gjsilde.min.js" type="text/javascript" charset="utf-8"></script>
	<script type='text/javascript' src='//api.map.baidu.com/api?v=2.0&ak=bfUXDs4Q9hypXBR1yN0A4fGPbxMrhriF'></script>
	<script type='text/javascript'>
		var map = new BMap.Map('allmap');
	    var point = new BMap.Point(113.689018,34.824333);
		map.centerAndZoom(point, 15);
		map.enableScrollWheelZoom(true);//可拖拽
		var marker = new BMap.Marker(point);//标记
		map.addOverlay(marker);        
		marker.setLabel(new BMap.Label('向阳二手车', { offset: new BMap.Size(-20, -20) }));
		var mapType = new BMap.MapTypeControl()
		map.addControl(mapType);
		var overViewOpen = new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT});
		map.addControl(overViewOpen);
		map.addControl(new BMap.NavigationControl());

	</script>

	<script>
	   // $(".header").load("templates/header.html");
	   // $(".footer").load("templates/footer.html");
	   //	显示分
	   function showStar(elem){
	   	var score=$(elem).find("em").attr("data_value");
		var f_score=score*20;
		$(elem).find("em").css('width',f_score+'%');
	   }
	   showStar(".value1");showStar(".value2");showStar(".value3");
	   showStar(".user_markscore");

	</script>
	
</html>
 