<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\Apache24\htdocs\g_car\public/../app/index\view\user\person_collect.html";i:1541072271;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
		<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	
	<style>

	</style>
	<body>
	<div class="header">
		<div class="site_nav">
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

		<div class="full_wid">			
			<div class="wrap ">	
				<div class="person_center">
					<div class="person_left">
						<div class="person_info">
							<div class="user_avatar"><img src="/static/img/yhtx.png" alt="" /></div>
							<p class="uphone"><?php echo \think\Session::get('phone'); ?></p>
							<p>向阳二手车一号店</p>							
						</div>
						<div class="tab_choose">
							<ul>
								<li class=""><a href="person_manage.html"><b class="icon_xb1"> </b>管理店铺<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_release.html"><b class="icon_xb2"></b>发布车辆信息<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_public.html"><b class="icon_xb3"></b>发布过的<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_busenter.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_opportunity.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class="active"><a href="person_collect.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_history.html"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_feedback.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_order.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">我的收藏</span>
							<ul class="fright sel_status">
								<!--<li class="active" data-status='1'><b></b><span>全部</span></li>-->
								<li class="active" data-status='1'><b></b><span>新车</span></li>
								<li data-status='0'><b></b><span>二手车</span></li>
								<li data-status='0'><b></b><span>0首付</span></li>
							</ul>
						</h1>
						<h2 class="step"></h2>
						 <ul class="list browse_car">

							 <!--新车-->

							 <?php if(is_array($newcar) || $newcar instanceof \think\Collection || $newcar instanceof \think\Paginator): $i = 0; $__LIST__ = $newcar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="items4">
								<a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								<a href="javascript:;" class="car_desc">
									<h3><?php echo $val['name']; ?></h3>
									<p><span class="fisrt_pay">首付<b><?php echo $val['shoufu']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									<div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/collect_del'); ?>?id=<?php echo $val['id']; ?>"> <span class="del_user">删除</span></a></div>
								</a>
							</li>
							 <?php endforeach; endif; else: echo "" ;endif; ?>

							 <!--二手车-->
							 <?php if(is_array($twocar) || $twocar instanceof \think\Collection || $twocar instanceof \think\Paginator): $i = 0; $__LIST__ = $twocar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							 <li class="items4">
								 <a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								 <a href="javascript:;" class="car_desc">
									 <h3><?php echo $val['name']; ?></h3>
									 <p><span class="fisrt_pay">首付<b><?php echo $val['shoufu']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									 <div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/collect_del'); ?>?id=<?php echo $val['id']; ?>"><span class="del_user">删除</span></a></div>
								 </a>
							 </li>
							 <?php endforeach; endif; else: echo "" ;endif; ?>

							 <!--零首付-->

							 <?php if(is_array($zerocar) || $zerocar instanceof \think\Collection || $zerocar instanceof \think\Paginator): $i = 0; $__LIST__ = $zerocar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							 <li class="items4">
								 <a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								 <a href="javascript:;" class="car_desc">
									 <h3><?php echo $val['name']; ?></h3>
									 <p><span class="fisrt_pay">首付<b><?php echo $val['shoufu']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									 <div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/collect_del'); ?>?id=<?php echo $val['id']; ?>"><span class="del_user">删除</span></a></div>
								 </a>
							 </li>
							 <?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</div>
				</div>
				
			</div>
		</div>	
		<div class="footer"></div>
		
		<div class="mask1"></div>
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script>		
		$(function(){			

//			手机号隐藏中间4位
			$(".uphone").text($(".uphone").text().substring(0, 3) + "****" + $(".uphone").text().substring(7, 11));
			//加载公用头部和底部

			$(".sel_status li").each(function(){
				var that=$(this);
				$(that).click(function(){
				var status=$(this).attr("data-status");
					if(status==1){
						$(this).attr("data-status",0);
						$(this).removeClass("active")
					}else{
						$(this).attr("data-status",1);
						$(this).addClass("active").siblings().removeClass("active")
					}
				
				})
			})
			
			//加载公用头部和底部
		    $(".header").load("templates/header.html");
//		    $(".footer").load("templates/footer.html");

			
	})
</script>
</html>
