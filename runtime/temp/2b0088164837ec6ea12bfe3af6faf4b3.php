<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\Apache24\htdocs\g_car\public/../app/index\view\user\person_history.html";i:1542001591;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
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
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_man"><b class="icon_xb1"> </b>管理店铺<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_rele"><b class="icon_xb2"></b>发布车辆信息<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_pub.html"><b class="icon_xb3"></b>发布过的<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_buse.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_oppo.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_coll.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class="active"><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_his"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_feed.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/per_ord.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">浏览记录</span>
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
                           <?php if(!(empty($newcar) || (($newcar instanceof \think\Collection || $newcar instanceof \think\Paginator ) && $newcar->isEmpty()))): if(is_array($newcar) || $newcar instanceof \think\Collection || $newcar instanceof \think\Paginator): $i = 0; $__LIST__ = $newcar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="items4">
								<a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								<a href="" class="car_desc">
									<h3><?php echo $val['name']; ?></h3>
									<p><span class="fisrt_pay">首付<b><?php echo $val['shoufu']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									<div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/person_his_del'); ?>?id=<?php echo $val['id']; ?>"><span class="del_user">删除</span></a></div>
								</a>
							</li>
							 <?php endforeach; endif; else: echo "" ;endif; endif; ?>

						   <!--二手车-->

							 <?php if(!(empty($oldcar) || (($oldcar instanceof \think\Collection || $oldcar instanceof \think\Paginator ) && $oldcar->isEmpty()))): if(is_array($oldcar) || $oldcar instanceof \think\Collection || $oldcar instanceof \think\Paginator): $i = 0; $__LIST__ = $oldcar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							 <li class="items4">
								 <a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								 <a href="" class="car_desc">
									 <h3><?php echo $val['name']; ?></h3>
									 <p><span class="fisrt_pay">里程<b><?php echo $val['licheng']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									 <div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/person_his_del'); ?>?id=<?php echo $val['id']; ?>"><span class="del_user">删除</span></a></div>
								 </a>
							 </li>
							 <?php endforeach; endif; else: echo "" ;endif; endif; ?>

							 <!--零首付-->

							 <?php if(!(empty($zerocar) || (($zerocar instanceof \think\Collection || $zerocar instanceof \think\Paginator ) && $zerocar->isEmpty()))): if(is_array($zerocar) || $zerocar instanceof \think\Collection || $zerocar instanceof \think\Paginator): $i = 0; $__LIST__ = $zerocar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							 <li class="items4">
								 <a href="" class="car_img flex_center"><img src="<?php echo $val['img']; ?>" alt="" /></a>
								 <a href="" class="car_desc">
									 <h3><?php echo $val['name']; ?></h3>
									 <p><span class="fisrt_pay">首付<b><?php echo $val['shoufu']; ?></b>万</span><span class="padlt12">指导价<?php echo $val['price']; ?>万</span></p>
									 <div class="operate_user"><span class="see_user">查看</span><a href="<?php echo url('user/person_his_del'); ?>?id=<?php echo $val['id']; ?>"><span class="del_user">删除</span></a></div>
								 </a>
							 </li>
							 <?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</ul>
					</div>
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
