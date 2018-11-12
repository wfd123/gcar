<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\Apache24\htdocs\g_car\public/../app/index\view\index\details.html";i:1540981479;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/swiper.min.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jqueryPhoto.js"></script>	
	<script src="/static/js/gjsilde.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>

	<style>
		
	</style>
	<body>
		<div class="border">				
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
		</div>
		<div class="breadnav">你的位置:<a href="">首页</a>>><a href="">二手车</a></div>
		<div class="full_wid">
			
			<div class="wrap">
				<div class="oh">
					<div class="detail_pic">
						<span id="prev" class="btn prev"></span>
						<span id="next" class="btn next"></span>
						<span id="prevTop" class="btn prev"></span>
						<span id="nextTop" class="btn next"></span>
						<div id="picBox" class="picBox">
							<ul class="cf">

								<?php if(is_array($carinfo['img_url']) || $carinfo['img_url'] instanceof \think\Collection || $carinfo['img_url'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
								<li> <a href="javascript:;"><img src="<?php echo $vol; ?>" alt=""></a></li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div id="listBox" class="listBox">
							<ul class="cf">
								<?php if(is_array($carinfo['img_url']) || $carinfo['img_url'] instanceof \think\Collection || $carinfo['img_url'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
								<li class="on"><i class="arr2"></i><img src="<?php echo $vol; ?>" alt=""></li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>	
		        	<div class="detail_desc">
		        		<div class="detail_info">
		        			<h1><?php echo $carinfo['car_name']; ?></h1>
		        			<div class="desc_price"><span class="price">￥<?php echo $carinfo['price']; ?>万</span><span class="price_save">比新车省24.33元 </span><span class="price_note">含过户费</span></div>
		        			<div class="signal">管家车易站，专业的二手车买卖平台</div>
		        		</div>
		        		<img src="/static/img/dianpu.png" alt="" class="sure_shop"/>
		        		<div class="stages"><span>分期购<b>20%</b></span><span>首付<b><?php echo $carinfo['pay20_s2']; ?>万</b></span><span>月供 <b><?php echo $carinfo['pay20_s2']; ?>元</b></span><span>期数 <b><?php echo $carinfo['pay20_n2']; ?>期</b></span><a href="" class="stages_go">分期购车＞</a></div>
		        		<ul class="detail_assort flex_around">
		        			<li>
		        				<p><?php echo $carinfo['car_cardtime']; ?></p>
		        				<span>上牌时间</span>
		        			</li>
		        			<li>
		        				<p><?php echo $carinfo['car_mileage']; ?>万公里 </p>
		        				<span>表显里程</span>
		        			</li>
		        			<li>
		        				<p><?php echo $carinfo['blowdown']; ?></p>
		        				<span>排放标准</span>
		        			</li>
		        			<li>
		        				<p><?php echo $carinfo['output']; ?> </p>
		        				<span>排量</span>
		        			</li>
		        			<li>
		        				<p><?php echo $carinfo['gearbox']; ?></p>
		        				<span>变速箱</span>
		        			</li>
		        		</ul>
		        		<div class="car_results">
		        			<p class="lowerPrice">询问底价</p>
		        			<ul class="btn_box">
			        			<a href="<?php echo url('user/collect_car'); ?>?brand_id=<?php echo $carinfo['brand_id']; ?>&sys_id=<?php echo $carinfo['sys_id']; ?>&type=2&cartype_id=<?php echo $carinfo['cartype_id']; ?>&cheid=<?php echo $carinfo['pu_id']; ?>&name=<?php echo $carinfo['car_name']; ?>&img_url=<?php echo $carinfo['img_512']['0']; ?>&shoufu=<?php echo $carinfo['pay20_s2']; ?>&ygong=<?php echo $carinfo['pay20_y2']; ?>&price=<?php echo $carinfo['price']; ?>"><li><img src="/static/img/collect.png" alt="" /><p>收藏</p></li></a>
								<li><img src="/static/img/PK.png" alt="" /><p>加入PK</p></li>
			        			<li><img src="/static/img/share.png" alt="" /><p>分享</p></li>
			        		</ul>
	        		</div>
	        	</div>
				</div>
	        	<div class="flex_center marbt30"><h2 class="tit_erjie">基本配置</h2></div>
	        	<ul class="detail_information">
	        		<li>
	        			<h3>基本配置</h3>
	        			<div>
	        				<p><?php echo $carparam['info']['0']['name']; ?></p><span><?php echo $carparam['info']['0']['content']; ?></span>
	        				<p><?php echo $carparam['info']['3']['name']; ?></p><span><?php echo $carparam['info']['3']['content']; ?></span>
	        				<p><?php echo $carparam['info']['4']['name']; ?></p><span><?php echo $carparam['info']['4']['content']; ?></span>

	        			</div>
	        		</li>
	        		<li><h3>外观参数</h3>
	        			<div>
							<p><?php echo $carparam['car_body']['0']['name']; ?></p><span><?php echo $carparam['car_body']['0']['content']; ?></span>
							<p><?php echo $carparam['car_body']['1']['name']; ?></p><span><?php echo $carparam['car_body']['1']['content']; ?></span>
							<p><?php echo $carparam['car_body']['2']['name']; ?></p><span><?php echo $carparam['car_body']['2']['content']; ?></span>

	        			</div>
	        		</li>
	        		<li><h3>发动机参数</h3>
	        			<div>
							<p><?php echo $carparam['base']['0']['name']; ?></p><span><?php echo $carparam['base']['0']['content']; ?></span>
							<p><?php echo $carparam['base']['1']['name']; ?></p><span><?php echo $carparam['base']['1']['content']; ?></span>
							<p><?php echo $carparam['base']['2']['name']; ?></p><span><?php echo $carparam['base']['2']['content']; ?></span>
	        			</div>
	        		</li>
	        	</ul>
	        	<p class="more_config">查看更多配置</p>
	        	<div class="flex_center marbt30"><h2 class="tit_erjie">车主自述</h2></div>
	        	<p class="user_say"><?php echo $carinfo['car_desc']; ?></p>
				<div class="flex_center marbt30"><h2 class="tit_erjie">车源图片<b>(以实地看车为准)</b></h2></div>
				<div class="piclist">
					<ul>
						<?php if(is_array($carinfo['img_512']) || $carinfo['img_512'] instanceof \think\Collection || $carinfo['img_512'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_512'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>

						<li><img src="<?php echo $vol; ?>" alt="" height="390"/></li>

						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="flex_center marbt30"><h2 class="tit_erjie">店铺信息</h2></div>
				<ul class="detail_shop_info">
					<li><div class="fleft flex_center "><img src="/static/img/shop_img.png" alt=""  height="83"/></div>
						<div class="fleft ">
							<h3><?php echo $shopinfo['shop_name']; ?></h3>
							<p><img src="/static/img/dianh.png" alt="" height="20">电话：<?php echo $shopinfo['shop_phone']; ?></p>
							<p><img src="/static/img/dingw.png" alt="" height="20" />地址：<?php echo $shopinfo['shop_address']; ?></p>
						</div>
					</li>
					<li >
						<div class="fleft marlt32">
							<p class="score"><b><?php echo $shopinfo['all_score']; ?>分</b></p>
							<p>店铺环境：5.0分</p>
							<p>服务态度：5.0分</p>
							<p>车源真实：5.0分</p>
						</div>
						<div class="fleft">
							<p><a href="" class="btn_piblic">发表评论</a></p>
						</div>	
					</li>
					<li>
						<div class="fleft marlt48">
							<p><img src="/static/img/rez.png" alt="" height="30"/>管家车易站认证店铺</p>
							<p><img src="/static/img/che.png" alt="" height="30" />在售车源：1808台</p>
						
						</div>
						<div class="fleft">
							<p><a href="" class="btn_piblic">进店逛逛</a></p>
						</div>
					</li>
				</ul>
				<div class="tit_er">
			        <div class="line_tit"></div>			        
			        <h2 class="color tit_con">同系推荐</h2>	       
			    </div>
				<div class="car_list">
					<ul class="list">
						<a href="">
						<?php if(is_array($sys_cars) || $sys_cars instanceof \think\Collection || $sys_cars instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($sys_cars) ? array_slice($sys_cars,1,null, true) : $sys_cars->slice(1,null, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<li class="items5">
							<a href="<?php echo url('index/details'); ?>?cheid=<?php echo $val['pu_id']; ?>&price=<?php echo $val['price']; ?>&mileage=<?php echo $val['car_mileage']; ?>&name=<?php echo $val['name']; ?>&img=<?php echo $val['img_url']; ?>&time=<?php echo $val['car_cardtime']; ?>" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
							<a href="<?php echo url('index/details'); ?>?cheid=<?php echo $val['pu_id']; ?>&price=<?php echo $val['price']; ?>&mileage=<?php echo $val['car_mileage']; ?>&name=<?php echo $val['name']; ?>&img=<?php echo $val['img_url']; ?>&time=<?php echo $val['car_cardtime']; ?>" class="car_desc">
								<h3><?php echo $val['name']; ?></h3>
								<p><span class="car_price"><b><?php echo $val['price']; ?></b>万</span><span class="car_sui">新车含税<?php echo $val['news_price']; ?>万</span></p>
								<p><span><?php echo $val['car_cardtime']; ?>上牌</span> <span class="padlt20"><?php echo $val['car_mileage']; ?>万公里</span> </p>
								<div class="che_ordered">立即预约</div>
							</a>
						</li>
					    <?php endforeach; endif; else: echo "" ;endif; ?>
						</a>
					</ul>
				</div>
			</div>
		
    </div>
  <!--公共底部样式-->
    <!--<div class="footer"></div>-->
  <!--底部123固定悬浮-->
    <div class="wrap_bt">
    	<div class="wrap oh flex_center">
    		<div class="car_descInfo">
    			<h4 class="hid"><?php echo $carinfo['car_name']; ?> </h4>
    			<p><?php echo $carinfo['car_cardtime']; ?> <b>|</b><?php echo $carinfo['car_mileage']; ?>万公里<b>|</b><?php echo $carinfo['blowdown']; ?> <b>|</b>郑州</p>
    		</div>
    		<div class="car_descPri">
    			<b>￥<?php echo $carinfo['price']; ?>万 </b>比新车省：万
    		</div>
    		<div class="car_descOrder flex_center">
    			<input type="text" placeholder="请输入手机号"/>
    			<p class="lowerPrice">询问底价</span>
    		</div>
    	</div>	     
    </div>
  <!--点击轮播显示大图以及预订-->    
  <div class="photoList">
  		<div class="pc_slide">
			<div class="view">
				<div class="swiper-container">
					<a class="arrow-left" href="#"></a>
					<a class="arrow-right" href="#"></a>
					<div class="swiper-wrapper">
						<?php if(is_array($carinfo['img_url']) || $carinfo['img_url'] instanceof \think\Collection || $carinfo['img_url'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<div class="swiper-slide">

							<a target="_blank"><img src="<?php echo $vol; ?>" alt=""></a>

						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
			<div class="preview">
				<a class="arrow-left" href="#"></a>
				<a class="arrow-right" href="#"></a>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php if(is_array($carinfo['img_url']) || $carinfo['img_url'] instanceof \think\Collection || $carinfo['img_url'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<div class="swiper-slide active-nav">
							<div class="silde_img"><img src="<?php echo $vol; ?>" alt=""></div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
		</div>
  		<div class="silde_info">
  			<h2><?php echo $carinfo['car_name']; ?></h2>
  			<p class="info_car"><?php echo $carinfo['car_cardtime']; ?> | <?php echo $carinfo['car_mileage']; ?>万公里 | <?php echo $carinfo['blowdown']; ?> | 郑州</p>
  			<div class="tag flex_center"><span>准新车</span><span>店铺认证</span></div>
  			<div class="info_price"><b>￥<?php echo $carinfo['price']; ?>万&nbsp;</b>比新车省：75.29万</div>
  			<div class="car_form">
  				<div class="ipt ipt_phone"><input type="text" placeholder="请输入手机号"/><span class="getcode">获取验证码</span></div>
  				<div class="ipt"><input type="text" placeholder="请输入短信验证码"/></div>
  				<div><p class="lowerPrice">询问底价</p></div>
  				
  			</div>
  			<div class="link_btn">
				<a href="javascript:;">联系商家</a>
				<a href="">分期购车</a>
			</div>
			<ul class="btn_box oh">
    			<li><img src="/static/img/collect.png" alt="" /><p>收藏</p></li>
    			<li><img src="/static/img/PK.png" alt="" /><p>加入</p></li>
    			<li><img src="/static/img/share.png" alt="" /><p>分享</p></li>
    		</ul>
    		<div class="del"><img src="/static/img/del1.png" alt="" height="16"/></div>
  		</div>
  </div>
  
  <!--更多车辆信息配置-->
  	<div class="carConfig">
  		<h2>汽车配置<div class="del"><img src="/static/img/del1.png" alt="" height="16"/></div></h2>
  		<h3><?php echo $carinfo['car_name']; ?></h3>
  		<div class="configBox">
  			<ul class="config_tit1">
  				<li class="con1 active"><b></b><span>基本配置</span></li>
  				<li class="con2"><b></b><span>操控配置</span></li>
  				<li class="con3"><b></b><span>外部配置</span></li>
  				<li class="con4"><b></b><span>变速箱/底盘/车轮配置</span></li>
  				<li class="con5"><b></b><span>高科技配置</span></li>
  				<li class="con6"><b></b><span>灯光配置</span></li>
  				<li class="con7"><b></b><span>发动机配置</span></li>
  				<li class="con8"><b></b><span>多媒体配置</span></li>
  				<li class="con9"><b></b><span>安全配资</span></li>
  				<li class="con10"><b></b><span>车身配置</span></li>
  			</ul>
  			<div class="configCont">
  				<div class="config_f con1">
  					<div class="config_tit2"><b></b><span>基本配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['info']) || $carparam['info'] instanceof \think\Collection || $carparam['info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
  						<li>
  							<p><?php echo $vol['name']; ?></p>
  							<span><?php echo $vol['content']; ?></span>
  						</li>
  						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con2">
  					<div class="config_tit2"><b></b><span>操控配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['nbbase']) || $carparam['nbbase'] instanceof \think\Collection || $carparam['nbbase'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['nbbase'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
  						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
  						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con3">
  					<div class="config_tit2"><b></b><span>外部配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['wbfdpzhi']) || $carparam['wbfdpzhi'] instanceof \think\Collection || $carparam['wbfdpzhi'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['wbfdpzhi'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
  						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
  						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con4">
  					<div class="config_tit2"><b></b><span>变速箱/底盘/车轮配置</span></div>
  					<ul class="">

						<?php if(is_array($carparam['gearbox']) || $carparam['gearbox'] instanceof \think\Collection || $carparam['gearbox'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['gearbox'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>

  					</ul>
  				</div>
  				<div class="config_f con5">
  					<div class="config_tit2"><b></b><span>高科技配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['fzcz']) || $carparam['fzcz'] instanceof \think\Collection || $carparam['fzcz'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['fzcz'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con6">
  					<div class="config_tit2"><b></b><span>灯光配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['lightbase']) || $carparam['lightbase'] instanceof \think\Collection || $carparam['lightbase'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['lightbase'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con7">
  					<div class="config_tit2"><b></b><span>发动机配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['base']) || $carparam['base'] instanceof \think\Collection || $carparam['base'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['base'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>

  					</ul>
  				</div>
  				<div class="config_f con8">
  					<div class="config_tit2"><b></b><span>多媒体配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['dmtbase']) || $carparam['dmtbase'] instanceof \think\Collection || $carparam['dmtbase'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['dmtbase'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
  				</div>
  				<div class="config_f con9">
  					<div class="config_tit2"><b></b><span>安全配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['safe_base']) || $carparam['safe_base'] instanceof \think\Collection || $carparam['safe_base'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['safe_base'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
  					</ul>
  				</div>
  				<div class="config_f con10">
  					<div class="config_tit2"><b></b><span>车身配置</span></div>
  					<ul class="">
						<?php if(is_array($carparam['clzhid']) || $carparam['clzhid'] instanceof \think\Collection || $carparam['clzhid'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carparam['clzhid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li>
							<p><?php echo $vol['name']; ?></p>
							<span><?php echo $vol['content']; ?></span>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
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
 <!--蒙版--> 	
  	<div class="mask"></div>
	</body>
	<script>		
		$(function(){
//			加载公共头部和底部
		    $(".header").load("templates/header.html");
//		    $(".footer").load("templates/footer.html");
//			点击更多配置查看详细配置
		    $(".more_config").click(function(){
		    	$(".mask").show();
		    	$(".carConfig").show();
		    	$("html,body").css("overflow-y","hidden");
//		    	楼层效果
		    	$(".configCont").scroll(function() {
	                var cTop=$(".configCont").offset().top;                
	               $(".configCont .config_f").each(function(){
	               		var fTop= $(this).offset().top;              	
	               		var fTops = $(this).height() + fTop;
	               		if(fTop<=cTop&&fTops>=cTop){
	               			var n=$(this).index()+1;
	               			$(".config_tit1 .con"+n).addClass("active").siblings().removeClass("active");
	               			
	               		}
	               })
            	})
	            $(".config_tit1 li").click(function(){
	            	var className = this.className;
					$(this).addClass("active").siblings().removeClass("active");
					var top = 0;
					$.each($('.configCont .' + className).prevAll(), function(i, n) {
						top += $(n).height();
						console.log(n)
					});
					$(".configCont").stop().animate({
						scrollTop: top
					}, 200);
	            })
		    })
		    $(".carConfig .del,.mask").click(function(){
		    	$(".mask").hide();
		    	$(".carConfig").hide();
		    	$("html,body").css("overflow-y","auto");
		    })
//		          点击图片查看大图信息以及预定
		    $("#picBox,.piclist").click(function(){
		    	$(".photoList").show();
		    	$(".mask").show();
		        $("html,body").css("overflow-y","hidden");
		    })
		    $(".photoList .del,.mask").click(function(){
		    	$(".photoList").hide();
		    	$(".mask").hide();
		    	$("html,body").css("overflow-y","auto");
		    })
            
		})
		</script>
		<script>
		$(function(){
	//			相册轮播大图对应小图 swiper
			var viewSwiper = new Swiper('.view .swiper-container', {
				onSlideChangeStart: function() {
					updateNavPosition();
				}
			})
			$('.view .arrow-left,.preview .arrow-left').on('click', function(e) {
				e.preventDefault();
				if(viewSwiper.activeIndex == 0) {
					viewSwiper.swipeTo(viewSwiper.slides.length - 1, 1000);
					return;
				}
				viewSwiper.swipePrev();
			})
			$('.view .arrow-right,.preview .arrow-right').on('click', function(e) {
				e.preventDefault();
				if(viewSwiper.activeIndex == viewSwiper.slides.length - 1) {
					viewSwiper.swipeTo(0, 1000);
					return
				}
				viewSwiper.swipeNext();
			})
			var previewSwiper = new Swiper('.preview .swiper-container', {
				visibilityFullFit: true,
				slidesPerView: 'auto',
				onlyExternal: true,
				onSlideClick: function() {
					viewSwiper.swipeTo(previewSwiper.clickedSlideIndex);
				}
			})
			function updateNavPosition() {
				$('.preview .active-nav').removeClass('active-nav');
				var activeNav = $('.preview .swiper-slide').eq(viewSwiper.activeIndex).addClass('active-nav');
				if(!activeNav.hasClass('swiper-slide-visible')) {
					if(activeNav.index() > previewSwiper.activeIndex) {
						var thumbsPerNav = Math.floor(previewSwiper.width / activeNav.width()) - 1;
						previewSwiper.swipeTo(activeNav.index() - thumbsPerNav);
					} else {
						previewSwiper.swipeTo(activeNav.index());
					}
				}
			}
		})
		</script>
</html>
