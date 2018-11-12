<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"E:\Apache24\htdocs\g_car\public/../app/index\view\index\index.html";i:1541765145;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/swiper.min.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/gjsilde.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<style>
		.tool_tip .iocn_s8-inner {
			width: 480px;
			height: 366px;
		}
		
		.tool_tip .iocn_s8-inner textarea {
			width: 383px;
			height: 125px;
			resize: none;
			margin-left: 49px;
			margin-bottom: 32px;
		}
		
		.tool_tip .iocn_s8-inner p {
			text-align: center;
			height: 14px;
			font-size: 14px;
			font-family: MicrosoftYaHei;
			font-weight: 400;
			color: rgba(104, 104, 104, 1);
		}
		
		.tool_tip .iocn_s8-inner p:nth-child(2) {
			text-align: left;
			margin-top: 13px;
			margin-bottom: 13px;
			padding-left: 40px;
		}
		
		.tool_tip .iocn_s8-inner ul {
			padding-left: 49px;
			margin-bottom: 30px;
		}
		
		.tool_tip .iocn_s8-inner ul li {
			color: rgba(104, 104, 104, 1);
			margin-left: 24px;
			width: 76px;
			height: 26px;
			line-height: 26px;
			border: solid 1px #cbcbcb;
			text-align: center;
		}
		
		.tool_tip .iocn_s8-inner button {
			width: 140px;
			height: 42px;
			background: #ff8a0f;
			color: white;
			/*	margin: 0 auto;*/
			margin-left: 169px;
			margin-bottom: 36px;
		}
		
		#eight {
			padding: 10px;
			position: absolute;
			top: -120px;
			right: 75px;
		}
		
		.p_r {
			position: relative;
		}
		
		.p_r .limit_num {
			position: absolute;
			bottom: 40px;
			right: 45px;
			color: #666;
		}
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

		<div class="header"></div>
		<div class="full_wid">
			<!--首页导航-->
			<div class="home_banner">
				<a class="arrow-left arrow" href="#"></a>
				<a class="arrow-right arrow" href="#"></a>
				<div class="swiper-container">
					<div class="swiper-wrapper">
                        <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<div class="swiper-slide">
							<a href=""><img src="<?php echo $val['img_url']; ?>"></a>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<div class="pagination"></div>
			</div>
			<div class="wrap home_sel">
				<div class="home_left">
					<ul class="home_sel_tit">
						<li id="btn_new" class="active" onclick="btn_new()"> 二手车</li>
						<li id="btn_old" onclick="btn_old()">新车</li>
					</ul>
					<div id="new_panel" class="home_sel_con">
						<ul class="sel_newcar_brand oh ">
							<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?brand_id=<?php echo $val['id']; ?>"><img src="<?php echo $val['img_url']; ?>" alt="">
								<!--<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars/<?php echo $val['id']; ?>"><img src="<?php echo $val['img_url']; ?>" alt="">-->
									<p><?php echo $val['name']; ?></p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<ul class="sel_newcar_type oh mtp40">
							<li class="active">
								<a href=""> 分期购</a>
							</li>
							<?php if(is_array($price) || $price instanceof \think\Collection || $price instanceof \think\Paginator): $i = 0; $__LIST__ = $price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="active">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?price_range=<?php echo $val['id']; ?>"><?php echo $val['name']; ?> </a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<ul class="sel_newcar_type oh mtp40">
							<li class="active">
								<a href=""> 车型</a>
							</li>
							<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="active">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?car_age=<?php echo $val['id']; ?>"> <?php echo $val['name']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<li class="active fright">
								<a href="" class="moretype"><img src="/static/img/quanbu.png" alt="" width="23">更多车型</a>
							</li>
						</ul>
					</div>
					<div id="old_panel" class="home_sel_con" style="display: none;">
						<ul class="sel_newcar_brand oh ">
							<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?brand_id=<?php echo $val['id']; ?>"><img src="<?php echo $val['img_url']; ?>" alt="">
									<p><?php echo $val['name']; ?></p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<ul class="sel_newcar_type oh mtp40">
							<li class="active">
								<a href=""> 分期购</a>
							</li>
							<?php if(is_array($price) || $price instanceof \think\Collection || $price instanceof \think\Paginator): $i = 0; $__LIST__ = $price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="active">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?price_range=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['name']; ?> </a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<ul class="sel_newcar_type oh mtp40">
							<li class="active">
								<a href=""> 车型</a>
							</li>
							<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="active">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?car_age=<?php echo $val['id']; ?>&page=1&sort=1"> <?php echo $val['name']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<li class="active fright">
								<a href="" class="moretype"><img src="/static/img/quanbu.png" alt="" width="23">更多车型</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="home_right">
					<h2>我要卖车></h2>
					<div class="sell_ping">
						<p>免费上门评估 最快一天卖出</p>
						<input type="text" placeholder="请输入手机号" />
						<div class="btn_sell_ping"><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/sell"> <span class="sell_car">我要卖车</span><span class="free_ping">免费评估</span></a></div>
					</div>
				</div>

			</div>
			<div class="wrap">
				<!--推荐新车-->
				<div class="home_recom_car">
					<div class="recom_new_tit oh marbt23">
						<h2>推荐新车</h2>
						<ul class="fleft">
							<li id="new_car_0" class="new_car_n active">分期购</li>
							<li id="new_car_1" class="new_car_n">一成购新</li>
							<li id="new_car_2" class="new_car_n">低月供</li>
							<li id="new_car_3" class="new_car_n">5万以下</li>
						</ul>
					</div>
					<div id="new_car_panel_0" class="recom_new_con">
						<ul class="recom_tit_img ">
							<li class="car_left">
								<a href=""><img src="/static/img/xinchel.png" alt="" titlt='' /></a>
							</li>
							<?php if(is_array($new_car) || $new_car instanceof \think\Collection || $new_car instanceof \think\Paginator): $i = 0; $__LIST__ = $new_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
							<li>
								<!--//<a href="<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $vl['id']; ?>" class="flex_around" target="_blank">-->
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $vl['id']; ?>" class="flex_around" target="_blank">
									<span class="car_img"><img class='lazy-load'  alt="" titlt='' src='<?php echo $vl['img_url']; ?>'/>
								</span>
									<h3 class="text_overflow"><?php echo $vl['name']; ?></h3>
									<p class="valign ptp15">
										<span class="pay_first plt10">价格<?php echo $vl['price']; ?></span>
										<span class="pay_first plt10">首付<b class=""><?php echo $vl['pay10_s2']; ?></b>万</span>
										<span class="pay_month">月供<?php echo $vl['pay10_y2']; ?>元</span>
										<span class="pay_month"><?php echo $vl['pay10_n2']; ?>期</span>
									</p>
								</a>
							</li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div id="new_car_panel_1" class="recom_new_con" style="display: none;">
						<ul class="recom_tit_img ">
							<li class="car_left">
								<a href=""><img src="/static/img/xinchel.png" alt="" titlt='' /></a>
							</li>
							<?php if(is_array($new_one_car) || $new_one_car instanceof \think\Collection || $new_one_car instanceof \think\Paginator): $i = 0; $__LIST__ = $new_one_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $vl['id']; ?>" class="flex_around" target="_blank">
									<span class="car_img"><img class='lazy-load'  alt="" titlt='' src='<?php echo $vl['img_url']; ?>'/>
								</span>
									<h3 class="text_overflow"><?php echo $vl['name']; ?></h3>
									<p class="valign ptp15">
										<span class="pay_first plt10">价格<?php echo $vl['price']; ?></span>
										<span class="pay_first plt10">首付<b class=""><?php echo $vl['pay10_s2']; ?></b>万</span>
										<span class="pay_month">月供<?php echo $vl['pay10_y2']; ?>元</span>
										<span class="pay_month"><?php echo $vl['pay10_n2']; ?>期</span>
									</p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div id="new_car_panel_2" class="recom_new_con" style="display: none;">
						<ul class="recom_tit_img ">
							<li class="car_left">
								<a href=""><img src="/static/img/xinchel.png" alt="" titlt='' /></a>
							</li>
							<?php if(is_array($new_dyg) || $new_dyg instanceof \think\Collection || $new_dyg instanceof \think\Paginator): $i = 0; $__LIST__ = $new_dyg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $vl['id']; ?>" class="flex_around" target="_blank">
									<span class="car_img"><img class='lazy-load'  alt="" title='' src='<?php echo $vl['img_url']; ?>'/>
								</span>
									<h3 class="text_overflow"><?php echo $vl['name']; ?></h3>
									<p class="valign ptp15">
										<span class="pay_first plt10">价格<?php echo $vl['price']; ?></span>
										<span class="pay_first plt10">首付<b class=""><?php echo $vl['pay10_s2']; ?></b>万</span>
										<span class="pay_month">月供<?php echo $vl['pay10_y2']; ?>元</span>
										<span class="pay_month"><?php echo $vl['pay10_n2']; ?>期</span>
									</p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div id="new_car_panel_3" class="recom_new_con" style="display: none;">
						<ul class="recom_tit_img ">
							<li class="car_left">
								<a href=""><img src="/static/img/xinchel.png" alt="" titlt='' /></a>
							</li>
							<?php if(is_array($new_five_car) || $new_five_car instanceof \think\Collection || $new_five_car instanceof \think\Paginator): $i = 0; $__LIST__ = $new_five_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detail/<?php echo $vl['id']; ?>" class="flex_around" target="_blank">
									<span class="car_img"><img class='lazy-load'  alt="" titlt='' src='<?php echo $vl['img_url']; ?>'/>
								</span>
									<h3 class="text_overflow"><?php echo $vl['name']; ?></h3>
									<p class="valign ptp15">
										<span class="pay_first plt10">价格<?php echo $vl['price']; ?></span>
										<span class="pay_first plt10">首付<b class=""><?php echo $vl['pay10_s2']; ?></b>万</span>
										<span class="pay_month">月供<?php echo $vl['pay10_y2']; ?>元</span>
										<span class="pay_month"><?php echo $vl['pay10_n2']; ?>期</span>
									</p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<!--推荐二手车-->
				<div class="home_recom_car">
					<div class="recom_new_tit oh marbt23">
						<h2>推荐二手车</h2>
						<ul class="fleft">
							<li id="old_car_0" class="old_car_n active">最近发布</li>
							<li id="old_car_1" class="old_car_n">价格最低</li>
							<li id="old_car_2" class="old_car_n">车龄最短</li>
							<li id="old_car_3" class="old_car_n">里程最短</li>
						</ul>
					</div>
					<div id="old_car_panel_0" class="recom_new_con">
						<ul class="recom_tit_img">
							<li class="car_left">
								<a href=""><img src="/static/img/group1.png" alt="" titlt='' /></a>
							</li>
							<?php if(is_array($er_car) || $er_car instanceof \think\Collection || $er_car instanceof \think\Paginator): $i = 0; $__LIST__ = $er_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="flex_around">
									<span class="car_img"><img class='lazy-load' alt="" titlt='' src='<?php echo $val['img_url']; ?>'/>
								</span>
									<h3 class="text_overflow"><?php echo $val['name']; ?></h3>
									<p class="mile"><?php echo $val['car_cardtime']; ?> | <?php echo $val['car_mileage']; ?>万公里</p>
									<p class="valign">
										<span class="pay_first plt10"><b class=""><?php echo $val['price']; ?></b></span>
										<span class="sure"><img src="/static/img/pinpairz.png" alt=""/></span>
									</p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<div id="old_car_panel_1" class="recom_new_con" style="display: none;">
					<ul class="recom_tit_img">
						<li class="car_left">
							<a href=""><img src="/static/img/group1.png" alt="" titlt='' /></a>
						</li>
						<?php if(is_array($min_price) || $min_price instanceof \think\Collection || $min_price instanceof \think\Paginator): $i = 0; $__LIST__ = $min_price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="flex_around">
									<span class="car_img"><img class='lazy-load' alt="" titlt='' src='<?php echo $val['img_url']; ?>'/>
								</span>
								<h3 class="text_overflow"><?php echo $val['name_li']; ?></h3>
								<p class="mile"><?php echo $val['car_cardtime']; ?> | <?php echo $val['car_mileage']; ?>万公里</p>
								<p class="valign">
									<span class="pay_first plt10"><b class=""><?php echo $val['price']; ?></b></span>
									<span class="sure"><img src="/static/img/pinpairz.png" alt=""/></span>
								</p>
							</a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			<div id="old_car_panel_2" class="recom_new_con" style="display: none;">
				<ul class="recom_tit_img">
					<li class="car_left">
						<a href=""><img src="/static/img/group1.png" alt="" titlt='' /></a>
					</li>
					<?php if(is_array($min_age) || $min_age instanceof \think\Collection || $min_age instanceof \think\Paginator): $i = 0; $__LIST__ = $min_age;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
					<li>
						<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="flex_around">
									<span class="car_img"><img class='lazy-load' alt="" titlt='' src='<?php echo $val['img_url']; ?>'/>
								</span>
							<h3 class="text_overflow"><?php echo $val['name_li']; ?></h3>
							<p class="mile"><?php echo $val['car_cardtime']; ?> | <?php echo $val['car_mileage']; ?>万公里</p>
							<p class="valign">
								<span class="pay_first plt10"><b class=""><?php echo $val['price']; ?></b></span>
								<span class="sure"><img src="/static/img/pinpairz.png" alt=""/></span>
							</p>
						</a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
	<div id="old_car_panel_3" class="recom_new_con" style="display: none;">
		<ul class="recom_tit_img">
			<li class="car_left">
				<a href=""><img src="/static/img/group1.png" alt="" titlt='' /></a>
			</li>
			<?php if(is_array($min_licheng) || $min_licheng instanceof \think\Collection || $min_licheng instanceof \think\Paginator): $i = 0; $__LIST__ = $min_licheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
			<li>
				<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="flex_around">
												<span class="car_img"><img class='lazy-load' alt="" titlt='' src='<?php echo $val['img_url']; ?>'/>
											</span>
					<h3 class="text_overflow"><?php echo $val['name_li']; ?></h3>
					<p class="mile"><?php echo $val['car_cardtime']; ?> | <?php echo $val['car_mileage']; ?>万公里</p>
					<p class="valign">
						<span class="pay_first plt10"><b class=""><?php echo $val['price']; ?></b></span>
						<span class="sure"><img src="/static/img/pinpairz.png" alt=""/></span>
					</p>
				</a>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

				<!--推荐零首付新车-->
				<div class="home_recom_car">
					<div class="recom_new_tit oh marbt23">
						<h2>推荐零首付新车</h2>

					</div>
					<div class="recom_new_con">
						<ul class="recom_tit_img ">
							<li class="car_left">
								<a href=""><img src="/static/img/lingshouful.png" src="/static/img/lingshouful.png" alt="" title='' /></a>
							</li>
							<?php if(is_array($car_zero) || $car_zero instanceof \think\Collection || $car_zero instanceof \think\Paginator): $i = 0; $__LIST__ = $car_zero;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/detai/<?php echo $val['id']; ?>" class="flex_around" target="_blank">
									<span class="car_img"><img src="<?php echo $val['img_url']; ?>" alt=""/>
								</span>
									<h3 class="text_overflow"><?php echo $val['name']; ?></h3>
									<p class="valign ptp15">
										<span class="pay_first plt10">首付<b class=""><?php echo $val['pay10_s2']; ?></b>万</span>
										<span class="pay_month">月供<?php echo $val['pay10_y2']; ?>元</span>
										<span class="pay_month">月供<?php echo $val['pay10_n2']; ?>元</span>
									</p>
								</a>
							</li>
						     <?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</div>
				</div>
				<!--新闻资讯-->
				<div class="home_news">
					<div class="oh home_new_nav">
						<ul>
							<li class="active" onclick="set('bd0',1,5)" id="bd01">公司新闻</li>
							<li onclick="set('bd0',2,5)" id="bd02"> 行业新闻</li>
							<li onclick="set('bd0',3,5)" id="bd03">媒体报道</li>
							<li onclick="set('bd0',4,5)" id="bd04">特色活动</li>
							<li onclick="set('bd0',5,5)" id="bd05">新车资讯</li>
						</ul>
						<a href="" class="look_more">查看更多></a>
					</div>
					<div class="home_news_cont" id="conbd01">

						<div class="left_big new_imgs">
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new1['0']['id']; ?>"> <img src="/static/img/ttop.png" alt="" height="280" width="340px" />
							<p class="hid"><?php echo $new1['0']['title']; ?></p></a>
						</div>
						<div class="center_small">
							<div class="small_top_img new_imgs">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new1['1']['id']; ?>">
								<img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new1['1']['title']; ?></p>
							</div>
							<div class="small_bt_img new_imgs marbtp10">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new1['2']['id']; ?>">
								<img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new1['2']['title']; ?></p></a>
							</div>
						</div>
						<ul class="news_txt_desc">
							<?php if(is_array($new1) || $new1 instanceof \think\Collection || $new1 instanceof \think\Paginator): $i = 0; $__LIST__ = $new1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
							<li><span class="fright"><?php echo $vol['time']; ?></span><img src="/static/img/zhixina.png" alt="" height="12" />
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $vol['id']; ?>"><?php echo $vol['title']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</div>
					<div class="home_news_cont" id="conbd02" style="display: none;">
						<div class="left_big new_imgs">
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new2['0']['id']; ?>">
							<img src="/static/img/ttop.png" alt="" height="280" width="340px" />
								<p class="hid"><?php echo $new2['0']['title']; ?></p></a>
						</div>
						<div class="center_small">
							<div class="small_top_img new_imgs">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new2['1']['id']; ?>">
								<img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new2['1']['title']; ?></p></a>
							</div>
							<div class="small_bt_img new_imgs marbtp10">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new2['2']['id']; ?>">
								<img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new2['2']['title']; ?></p></a>
							</div>
						</div>
						<ul class="news_txt_desc">

							<?php if(is_array($new2) || $new2 instanceof \think\Collection || $new2 instanceof \think\Paginator): $i = 0; $__LIST__ = $new2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
							<li><span class="fright"><?php echo $vol['time']; ?></span><img src="/static/img/zhixina.png" alt="" height="12" />
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $vol['id']; ?>"><?php echo $vol['title']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>


						</ul>
					</div>
					<div class="home_news_cont" id="conbd03" style="display: none;">
						<div class="left_big new_imgs">
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new3['0']['id']; ?>"><img src="/static/img/ttop.png" alt="" height="280" width="340px" />
							<p class="hid"><?php echo $new3['0']['title']; ?></p></a>
						</div>
						<div class="center_small">
							<div class="small_top_img new_imgs">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new3['1']['id']; ?>"><img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new3['1']['title']; ?></p></a>
							</div>
							<div class="small_bt_img new_imgs marbtp10">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new3['2']['id']; ?>">	<img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new3['2']['title']; ?></p></a>
							</div>
						</div>
						<ul class="news_txt_desc">

							<?php if(is_array($new3) || $new3 instanceof \think\Collection || $new3 instanceof \think\Paginator): $i = 0; $__LIST__ = $new3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
							<li><span class="fright"><?php echo $vol['time']; ?></span><img src="/static/img/zhixina.png" alt="" height="12" />
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $vol['id']; ?>"><?php echo $vol['title']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</div>
					<div class="home_news_cont" id="conbd04" style="display: none;">
						<div class="left_big new_imgs">
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new4['0']['id']; ?>"><img src="/static/img/ttop.png" alt="" height="280" width="340px" />
								<p class="hid"><?php echo $new4['0']['title']; ?></p></a>
						</div>
						<div class="center_small">
							<div class="small_top_img new_imgs">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new4['1']['id']; ?>"><img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new4['1']['title']; ?></p></a>
							</div>
							<div class="small_bt_img new_imgs marbtp10">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new4['2']['id']; ?>"></a> <img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new4['2']['title']; ?></p></a>
							</div>
						</div>
						<ul class="news_txt_desc">

							<?php if(is_array($new4) || $new4 instanceof \think\Collection || $new4 instanceof \think\Paginator): $i = 0; $__LIST__ = $new4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
							<li><span class="fright"><?php echo $vol['time']; ?></span><img src="/static/img/zhixina.png" alt="" height="12" />
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $vol['id']; ?>"><?php echo $vol['title']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</div>
					<div class="home_news_cont" id="conbd05" style="display: none;">
						<div class="left_big new_imgs">
							<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new5['0']['id']; ?>"> <img src="/static/img/ttop.png" alt="" height="280" width="340px" />
							<p class="hid"><?php echo $new5['0']['title']; ?></p></a>
						</div>
						<div class="center_small">
							<div class="small_top_img new_imgs">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new5['1']['id']; ?>" > <img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new5['1']['title']; ?></p></a>
							</div>
							<div class="small_bt_img new_imgs marbtp10">
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $new5['2']['id']; ?>"> <img src="/static/img/ccbt.png" alt="" height="135" />
								<p class="hid"><?php echo $new5['2']['title']; ?></p></a>
							</div>
						</div>
						<ul class="news_txt_desc">

							<?php if(is_array($new5) || $new5 instanceof \think\Collection || $new5 instanceof \think\Paginator): $i = 0; $__LIST__ = $new5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
							<li><span class="fright"><?php echo $vol['time']; ?></span><img src="/static/img/zhixina.png" alt="" height="12" />
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/newsdetails/<?php echo $vol['id']; ?>"><?php echo $vol['title']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>


						</ul>
					</div>

				</div>

			</div>
			<div class="home_make_car">
				<div class="wrap">
					<img src="/static/img/rez.png" alt="" />
					<div class="form_make">
						<div class="ipt"><input type="text" placeholder="请输入手机号" /></div>
						<!--<div class="ipt"><input type="text" placeholder="请输入验证码"/></div>-->
						<p class="made_sub">开启私人订制</p>
					</div>
				</div>
			</div>
			<!--<div class="home_advbg flex_center">
				<div class="wrap">
					<img src="/static/img/biaoyu.png" alt="" />
					<a href="" class="buycar">我要买车</a><a href="" class="sellcar">我要卖车</a>					
				</div>
			</div>		-->
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
		<div class="fixedRight">
			<ul class="right_sider">
				<!--1-->
				<li>
					<div class="gj_side_contnet iocn_s1">
						<p></p>
					</div>

					<div class="gj_sidecon_desc pk_bar tool_tip" style="display: none;">
						<h2>车型对比</h2>
						<ul class="list">
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>

						</ul>
					</div>
				</li>
				<!--2，-->
				<li>
					<div class="gj_side_contnet iocn_s2">
						<p></p>
					</div>

					<div class="gj_sidecon_desc tool_tip" style="display: none;">
						<h2>浏览历史</h2>
						<ul class="list">
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>

						</ul>
					</div>
				</li>
				<!--3-->
				<li>
					<div class="gj_side_contnet iocn_s3">
						<p></p>
					</div>

				</li>
				<!--4-->
				<li>
					<div class="gj_side_contnet iocn_s4">
						<p></p>
					</div>
					<div class="gj_sidecon_desc car_item tool_tip" style="display: none;">
						<h2>我的收藏</h2>
						<ul class="list">
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>
							<li class="items5">
								<a href="" class="car_img flex_center"><img src="" alt="" /></a>
								<a href="" class="car_desc">
									<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
									<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>
									<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>

						</ul>
					</div>
					<!--<div class="gj_sidecon_desc tool_tip" style="display: none;"></div>-->
				</li>
				<!--5-->
				<li>
					<div class="gj_side_contnet iocn_s5">
						<p></p>
					</div>
					<div class="gj_sidecon_desc tool_tip" style="display: none;"><img src="/static/img/gzh.png" alt="" /></div>
				</li>
				<!--6-->
				<li>
					<div class="gj_side_contnet iocn_s6">
						<p></p>
					</div>
					<div class="gj_sidecon_desc tool_tip" style="display: none;"><img src="/static/img/appdn.png" alt="" /></div>
				</li>
				<!--7-->
				<li>
					<div class="gj_side_contnet iocn_s7">
						<p></p>
					</div>
					<div class=" tool_tip" style="display: none;">
						<img src="/static/img/dianhua.png" alt="" />
					</div>
				</li>
				<!--8-->
				<li>
					<div class="gj_side_contnet iocn_s8">
						<p></p>
					</div>
					<div class="gj_sidecon_desc tool_tip" id="eight" style="display: none;">
						<div style="" class="iocn_s8-inner">
							<p style="">反馈</p>
							<p>请您选择反馈分类</p>
							<ul style="" class="oh">
								<li>功能建议</li>
								<li>故障反馈</li>
								<li>车源相关</li>
								<li>其他</li>
							</ul>
							<div class="p_r">
								<textarea name="" rows="10" cols="10" maxlength="200" placeholder="请输入您提出的意见..." onkeyup="" id="informationtextare"></textarea>
								<span class="limit_num" style="">
	        			        至少10字
	        		        </span>
							</div>

							<button>提交</button>

						</div>
					</div>
				</li>
				<!--9-->
				<li>
					<div class="gj_side_contnet iocn_s9">
						<p></p>
					</div>
					<div class="gj_sidecon_desc "></div>
				</li>

			</ul>
		</div>
		<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	</body>
	<script type="text/javascript">
		function btn_new() {
            if ($('#btn_new').hasClass('active')){
                return;
            } else {
                $('#btn_new').addClass('active');
                $('#btn_old').removeClass();
                $('#new_panel').css("display", 'block')
                $('#old_panel').css("display", 'none')
			}

        }
        function btn_old() {
            if ($('#btn_old').hasClass('active')){
                return;
            } else {
                $('#btn_old').addClass('active');
                $('#btn_new').removeClass();
                $('#new_panel').css("display", 'none')
                $('#old_panel').css("display", 'block')
            }
        }
	</script>
	<script>
		$(function() {
            $($(".wrap li")[0]).addClass("active").siblings().removeClass("active");
			//			新闻导航切换
			$(".home_new_nav li").click(function() {
				$(this).addClass("active").siblings().removeClass("active")
			})

			$("#informationtextare").keyup(function() {
				ChangeInfo(this);
			});

			//			左侧侧边栏
			//车型对比  大于等于两个横排放
			var len1 = $(".car_item .items5").length;
			var len2 = $(".pk_bar .items5").length;
			if(len1 < 0) {} else if(len1 >= 1) {
				$(".pk_bar").css("width", '500px')
			}
			if(len2 < 0) {} else if(len2 >= 1) {
				$(".car_item").css("width", '500px')
			}
			// 获取首页banner接口数据
			var url = 'http://www.gj2car.com/';

			$.ajax({
				type: 'POST',
				url: url + 'Newpc/Index/banner',
				dataType: "json",
				success: function(data) {
					$(data.body).each(function(i, o) {
						$(o.banner).each(function(index, obj) {
							$(".home_bannerAAA .swiper-wrapperAAA").append(" <div class='swiper-slide'><a href=''> <img  src=" + obj.img_url + " alt=''  class='swiper-lazy'/> </a></div>");
							var mySwiper = new Swiper('.swiper-container', {
								//						    pagination: '.pagination',
								loop: true,
								grabCursor: true,
								paginationClickable: true
							})
							$('.arrow-left').on('click', function(e) {
								e.preventDefault()
								mySwiper.swipePrev()
							})
							$('.arrow-right').on('click', function(e) {
								e.preventDefault()
								mySwiper.swipeNext()
							})
						})
					})
				},
				error: function() {
					console.log("没有获取到数据");
				}
				//		
			});

			//			图片懒加载

			$(".full_wid img").lazyload({
				//               placeholder:"/static/img/loading.gif",
				effect: "fadeIn", //渐现，show(直接显示),fadeIn(淡入),slideDown(下拉)
				failure_limit: 2 //加载2张可见区域外的图片,lazyload默认在找到第一张不在可见区域里的图片时则不再继续加载,但当HTML容器混乱的时候可能出现可见区域内图片并没加载出来的情况
			});

			//           首页预载功能
			//
			//			$(".fakeLoader").fakeLoader({
			//				timeToHide:1000, //加载效果的持续时间
			//				zIndex:"999",//
			//				spinner:"spinner7",//可选值 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7' 对应有7种效果
			//				bgColor:"", //加载时的背景颜色
			//				imagePath:"/static/img/loading.gif" //自定义的加载图片，见demo8.html
			//			});
			//			车型介绍里面车品牌名称两行省略

			$('.right_sider li').hover(function() {
				$(this).find('.tool_tip').css({
					'display': 'block'
				});
				$(this).siblings().find('.tool_tip').css({
					'display': 'none'
				});

			})

			$('.recom_tit_img li h3').each(function() {
				//设置显示获取字符串的字数  这个根绝要求 看需要大概显示几行
				var maxwidth = 35;
				if($(this).text().length > maxwidth) {
					//截取字符串
					$(this).text($(this).text().substring(0, maxwidth));
					//多余的用省略号显示
					$(this).html($(this).html() + '...');
				}
			});

			//			新闻内容省略
			var content_arr = []; //定义一个空数组
			$('.news_desc .tit_desc').each(function() { //遍历box内容
				var content = $.trim($(this).text()); //去掉前后文空格
				content_arr.push(content); //内容放进数组
			})
			for(var i = 0; i < content_arr.length; i++) { //遍历循环数组
				if(content_arr[i].length >= 40) { //如果数组长度（也就是文本长度）大于等于50（数字可自己定义）
					content = content_arr[i].substr(0, 40) + '...'; //添加省略号并放进box文字内容后面
					$('.news_desc .tit_desc').eq(i).text(content);
				} else {
					content = content_arr[i];
					$('.news_desc .tit_desc').eq(i).text(content);
				}
			}
			$(".news_nav li").click(function() {
				var i = $(this).index();
				$(this).addClass('active').siblings('li').removeClass('active');
				$(".news_desc").eq(i).show().siblings('.news_desc').hide()
			})
			// $(".header").load("templates/header.html");
			// $(".footer").load("templates/footer.html");

            var arr_old = new Array();
			$(".old_car_n").each(function (idx, e) {
                arr_old.push(e);
				e.onclick = function () {
                    if ($("#old_car_" + idx).hasClass("active")){
                        return;
                    } else {
                        for (var i = 0; i < arr_old.length; i++){
                            $("#old_car_" + i).removeClass("active");
                            $("#old_car_panel_" + i).css("display", 'none');
                        }
                        $("#old_car_" + idx).addClass("active");
                        $("#old_car_panel_" + idx).css("display", 'block')

                    }
                }
            });
            var arr_new = new Array();
            $(".new_car_n").each(function (idx, e) {
                arr_new.push(e);
                e.onclick = function () {
                    if ($("#new_car_" + idx).hasClass("active")){
                        return;
                    } else {
                        for (var i = 0; i < arr_new.length; i++){
                            $("#new_car_" + i).removeClass("active");
                            $("#new_car_panel_" + i).css("display", 'none');
                        }
                        $("#new_car_" + idx).addClass("active");
                        $("#new_car_panel_" + idx).css("display", 'block')

                    }
                }
            })

		})
	</script>

</html>