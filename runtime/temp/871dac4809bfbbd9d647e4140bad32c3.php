<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"E:\Apache24\htdocs\g_car\public/../app/index\view\newcar\index.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	 <link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<style>	
	</style>
<body>	
<div class="header">
	<div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！
			欢迎用户<?php if(empty(\think\Cookie::get('phone')) || ((\think\Cookie::get('phone') instanceof \think\Collection || \think\Cookie::get('phone') instanceof \think\Paginator ) && \think\Cookie::get('phone')->isEmpty())): ?>
			<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/login" class="coloryel">【登录】</a>,免费<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/register" class="coloryel">【注册】</a>
			<?php else: ?>
			<?php echo \think\Cookie::get('phone'); endif; ?></div>
		<div class="fright">
			<ul class="site_nav_menu">
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/"><img src="/static/img/shouye.png" alt="" />首页</a></li>
				<li class="sec_li"><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/twocar"><img src="/static/img/maic.png" alt="" />我要买车</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/sell"><img src="/static/img/maic.png" alt="" />我要卖车</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/appdownload"><img src="/static/img/xiazai.png" alt="" />APP下载</a></li>
				<li><a href=""><img src="/static/img/wangahn.png" alt="" />网站导航</a></li>
				<?php if(!(empty(\think\Cookie::get('phone')) || ((\think\Cookie::get('phone') instanceof \think\Collection || \think\Cookie::get('phone') instanceof \think\Paginator ) && \think\Cookie::get('phone')->isEmpty()))): ?><li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_his"><img src="/static/img/wangahn.png" alt="" />会员中心</a></li><?php endif; if(!(empty(\think\Cookie::get('phone')) || ((\think\Cookie::get('phone') instanceof \think\Collection || \think\Cookie::get('phone') instanceof \think\Paginator ) && \think\Cookie::get('phone')->isEmpty()))): ?><li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/logout"><img src="/static/img/wangahn.png" alt="" />安全退出</a></li><?php endif; ?>
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
					<?php if(is_array($city) || $city instanceof \think\Collection || $city instanceof \think\Paginator): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<a href="/<?php echo $val['pin']; ?>"> <li><?php echo $val['name']; ?></li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>

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
			<li><a href="<?php echo $domain; ?>">首页</a></li>
			<li ><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newcar" class="sec_li">新车</a></li>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/twocar">二手车</a></li>
		    <!--<li><a href="zeroCar.html">零首付</a></li>-->
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/sell">卖车</a></li>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/change">置换</a></li>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/news">新闻资讯</a></li>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/appdownload">APP下载</a></li>
			<?php if(empty(\think\Cookie::get('phone')) || ((\think\Cookie::get('phone') instanceof \think\Collection || \think\Cookie::get('phone') instanceof \think\Paginator ) && \think\Cookie::get('phone')->isEmpty())): ?><li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/login">登录/注册</a></li><?php endif; ?>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/join_us">关于我们</a></li>
			<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/shop">优选商家</a></li>
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
					<li></li>
				</ol>
			</div>
		</div>
		<div class="header_tel">
			<img src="/static/img/phone1.png" alt="" height="17"/>
			0371-53375515
		</div>
		<div class="nav">
			<ul>
				<li><a href="<?php echo $domain; ?>">首页</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/twocar">二手车</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newcar">新车</a></li>
				<!--<li><a href="zeroCar.html">零首付</a></li>-->
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/sell">卖车</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/change">置换</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/news">新闻资讯</a></li>
				<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/appdownload">APP下载</a></li>
				<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?><li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/login">登录/注册</a></li><?php endif; ?>
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
<div class="banner1"><img src="/static/img/xinche.png" alt="" /></div>
<div class="newcar gj_clear">
    <div class="category">
   		<div class="classify p_r">
   			 <div class="brand_new fleft oh">
   			 	<h2>品牌</h2>
   			 	<ul>
					<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>

   			 		<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/search_newcar?brand=<?php echo $val['id']; ?>"><img src="<?php echo $val['img_url']; ?>" alt="" /><p><?php echo $val['name']; ?></p></a></li>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
   			 	</ul>
   			 </div>
   			 <div class="price_new fleft oh">
   			 	<h2>价格</h2>
   			 	<ul>
   			 		<li><a href="">分期购</a></li>
   			 		<li><a href="" class="coloryel">一成购新车</a></li>
					<?php if(is_array($price) || $price instanceof \think\Collection || $price instanceof \think\Paginator): $i = 0; $__LIST__ = $price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
   			 		<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/search_newcar?price=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>

   			 	</ul>

   			 </div>
   			 <div class="type_new fleft oh">
   			 	<h2>车型</h2>
   			 	<ul>
					<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
   			 		<li><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/search_newcar?subface=<?php echo $val['id']; ?>"><img src="/static/img/<?php echo $val['img']; ?>" alt=""  width="100" height="100"/><p><?php echo $val['name']; ?></p></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
   			 	</ul>
   			 </div>			 
   			<a href="" class="coloryel more_lok">MORE>></a>
   		</div>	
   </div>
	<div class="wrap">
	    <div class="news_tit">
	        <h2>爆款新车</h2>	
	        <p class="small_tit">Explosive car</p>
	    </div>
	   <div class="gj_clear">
		    <div class="img_fac">
			 <div class="more_slt">
			 	<div class="gj_clear">
			 		<a href="">5-8万</a>
			 		<a href="">5-8万</a>
				 	<a href="">20-30万</a>
				 	<a href="">5-8万</a>
			 	</div>
			 	
			<p><a href="">查看更多>></a></p>		 	
			 	
			 </div>
		   </div>
		    <div class="first_public">
		    	<ul class="md50">
					<?php if(is_array($new_car) || $new_car instanceof \think\Collection || $new_car instanceof \think\Paginator): $i = 0; $__LIST__ = $new_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
		    		<li>
						<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $val['id']; ?>">

						<h3><?php echo $val['name']; ?></h3>
							<div class="fleft car_img"><img src="<?php echo $val['img_url']; ?>" alt="" /></div>
							<div class="fright car_public">
								<h4>首付<?php echo $val['pay10_s2']; ?>万</h4>
								<span>新车发售</span>
							</div>
							
						</a>
		    		</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
		    	</ul>
		    </div>
	    </div>
	     <div class="news_tit">
	        <h2>热门推荐</h2>	
	        <p class="small_tit">Popular recommendation</p>
	    </div>
	    <div class="gj_clear">
	    	<ul class="list ptp15 new_list">
				<?php if(is_array($new_car) || $new_car instanceof \think\Collection || $new_car instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_car) ? array_slice($new_car,2,7, true) : $new_car->slice(2,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
				<li class="items5">
					<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $val['id']; ?>" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $val['id']; ?>" class="car_desc">
						<h3><?php echo $val['name']; ?></h3>
						<p><span class="pay_first">首付<b><?php echo $val['pay10_s2']; ?></b>万</span> <span class="padlt20">月供<?php echo $val['pay10_y2']; ?>元</span> </p>
				
					</a>
					<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $val['id']; ?>" > <img src="<?php echo $val['img_url']; ?>" alt="" class="hot" /></a>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="more_l">查看更多</div>
	    </div>
		<h2 class="newc_t">
			轻松四步  新车开回家
		</h2>
		<ul class="step oh">
			<li><img src="/static/img/yuyue.png" alt="" /><p>在线预约</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/xieyi.png" alt="" /><p>签订协议</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/zhifu.png" alt="" /><p>支付费用</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/kaiche.png" alt="" /><p>坐等新车</p></li>
		
		</div>
	<div class="adv_img">
		<h2>想开什么车 ？管家车易站应有尽有.</h2>
		<div class="buy_ipt">
			<input type="text" placeholder="请输入手机号"/>
			<div class="btn_buy">我要买车</div>
		</div>
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
</script>
</div>

</body>


<script>
  
   window.onload=function()
   {
   	//  $(".header").load("templates/header.html");
     // $(".footer").load("templates/footer.html");
  var sec=$('.wrap').html();
  console.log(sec);
     
   	
   }
   $(function () {
       $($(".wrap li")[1]).addClass("active").siblings().removeClass("active");
   })
</script>
</html>
