<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\Apache24\htdocs\g_car\public/../app/index\view\zerocar\zerocardetails.html";i:1540780831;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
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
	.list_shop{overflow: hidden;margin-top: 10px;color: #666;height: 236px;}
	.list_shop li{width: 490px;height:236px;float: left;margin-left:80px;border: 1px solid  #ddd;padding:15px;margin-bottom: 30px;}
	.list_shop .shop_name{font-size: 16px;overflow: hidden;margin-bottom:15px;}
	.list_shop .signal_4s{background: #F28F1B;color: #fff;font-size: 14px;padding: 2px 4px;}
	.list_shop b{font-weight: normal;}
	.list_shop .sale_price b{font-size: 18px;}
    .list_shop li p img{ margin-left: -10px;vertical-align: middle;}
    .btn_consult span{padding: 0px 20px;background: #F39220;color: #fff;text-align: center;margin-right: 20px;display: inline-block;margin-top: 10px;cursor: pointer;font-size: 16px;}
    .btn_consult span img{vertical-align: middle;margin-right: 5px;}
    .moreShop{text-align: center;font-size: 16px;display: none;margin-top: 20px;}
    .moreShop img{width: 30px;vertical-align: middle;}
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
		<div class="breadnav">你的位置:<a href="">新车</a>>><a href=""><?php echo $carinfo['car_name']; ?></a>＞ </div>
		<div class="full_wid">		
			<div class="wrap">
				<div class="oh new_details">
					<div class="detail_pic">
						<span id="prev" class="btn prev"></span>
						<span id="next" class="btn next"></span>
						<span id="prevTop" class="btn prev"></span>
						<span id="nextTop" class="btn next"></span>
						<div id="picBox" class="picBox">
							<ul class="cf">
								<?php if(is_array($carinfo['img_512']) || $carinfo['img_512'] instanceof \think\Collection || $carinfo['img_512'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_512'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
								<li> <a href="javascript:;"><img src="<?php echo $vol; ?>" alt=""></a></li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div id="listBox" class="listBox">
							<ul class="cf">
								<?php if(is_array($carinfo['img_512']) || $carinfo['img_512'] instanceof \think\Collection || $carinfo['img_512'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_512'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
								<li class="on"><i class="arr2"></i><img src="<?php echo $vol; ?>" alt=""></li>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>	
		        	<div class="detail_desc new_details">
		        		<div class="detail_info">
		        			<h1><?php echo $carinfo['car_name']; ?></h1>
		        			<div class=""><span class=" color6">厂商指导价：<?php echo $carinfo['price']; ?>万 </span></div>
		        			<div class="call_shop">0首付秒爆款 详情咨询商家：<b class=""><?php echo $carinfo['platform_phone']; ?></b></div>
		        		</div>
		        			<h2 class="project">分期方案</h2>
			               	<!--<div class="percent">首付比例</div> <div class="first"><span class="new_active">10%首付</span><span>20%首付</span><span>30%首付</span></div>-->
				           	<div class="first_result">
				           		<div class="first_s">
				           			<ul class="">
					           			<li><div><p>首
					           				付</p><h2><?php echo $carinfo['pay0_s2']; ?>万</h2></div></li>
					           			<li><div><p>月供</p><h2><?php echo $carinfo['pay0_y2']; ?>元</h2></div></li>
					           			<li><div><p>期数</p><h2><?php echo $carinfo['pay0_n2']; ?>期</h2></div></li>
					           		</ul>
					           	
					           	</div>
					           	<!--<div class="first_s">-->
					           		<!--<ul class="">-->
					           			<!--<li><div><p>首付2</p><h2>5.5万</h2></div></li>-->
					           			<!--<li><div><p>月供2</p><h2>5555元</h2></div></li>-->
					           			<!--<li><div><p>期数2</p><h2>12期</h2></div></li>-->
					           		<!--</ul>-->
					           	<!---->
					           	<!--</div>-->
					           	<!--<div class="first_s">-->
					           		<!--<ul class="">-->
					           			<!--<li><div><p>首付3</p><h2>5.5万</h2></div></li>-->
					           			<!--<li><div><p>月供3</p><h2>5555元</h2></div></li>-->
					           			<!--<li><div><p>期数3</p><h2>12期</h2></div></li>-->
					           		<!--</ul>-->
					           		<!---->
					           	<!--</div>-->
				           	</div>
				           	<div class="test">根据信用评估测一测你能<a href="">贷多少钱>></a></div>
		        		<div class="car_results">
		        			<div class="new_consult">
		        				<input type="text" placeholder="请输入手机号"/>
		        				<p class="sub_phone">询问低价</p>
		        			</div>
		        			<ul class="btn_box">
			        			<li><img src="/static/img/collect.png" alt="" /><p>收藏</p></li>
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
							<p><?php echo $carparam['info']['2']['name']; ?></p><span><?php echo $carparam['info']['2']['content']; ?></span>
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
	        	<div class="flex_center marbt30"><h2 class="tit_erjie">车辆优势</h2></div>
	        	<ul class="cardec_img">
		    		<li>
					 	<div class="img_c"><img src="/static/img/cars1.png" alt="" /></div>
				        <div class="text_d">
				        	<div class="mar60">
				        		<h3>匠心品质 充满科技魅力的豪华B级车首选</h3>
				        		<p>引领潮流的设计美学、优化升级的高效动力、越级的豪华品质，以及全面领先的智能科技，为市场带来了一款充满科技魅力的豪华B级车</p>
				        	</div>
				        </div>
				    </li>
			       <li>
			        	<div class="text_d">
				        	<div class="mar60">
				        		<h3>匠心品质 充满科技魅力的豪华B级车首选</h3>
				        		<p>引领潮流的设计美学、优化升级的高效动力、越级的豪华品质，以及全面领先的智能科技，为市场带来了一款充满科技魅力的豪华B级车</p>
				        	</div>
			        	</div>
			        	<div class="img_c"><img src="/static/img/cars2.png" alt="" /></div>
			       </li>
			        <li>
			        	<div class="img_c"><img src="/static/img/cars2.png" alt="" /></div>
			       		<div class="text_d">
				        	<div class="mar60">
				        		<h3>匠心品质 充满科技魅力的豪华B级车首选</h3>
				        		<p>引领潮流的设计美学、优化升级的高效动力、越级的豪华品质，以及全面领先的智能科技，为市场带来了一款充满科技魅力的豪华B级车</p>
				        	</div>
			        	</div>
			        </li>
			       <li>       
				       <div class="text_d">
				        	<div class="mar60">
				        		<h3>匠心品质 充满科技魅力的豪华B级车首选</h3>
				        		<p>引领潮流的设计美学、优化升级的高效动力、越级的豪华品质，以及全面领先的智能科技，为市场带来了一款充满科技魅力的豪华B级车</p>
				        	</div>
			        	</div>
				        <div class="img_c"><img src="/static/img/cars3.png" alt="" /></div>
			       </li>
			       
		    	</ul>
				<!--<div class="tit_er">-->
			        <!--<div class="line_tit"></div>			        -->
			        <!--<h2 class="color tit_con">授权经销商</h2>	       -->
			    <!--</div>-->
			    <!--<div class="shop_4s">-->
			    	<!--<ul class="list_shop">-->
			    		<!--<li>-->
			    			<!--<div class="shop_name"><p class="fleft"><span class="signal_4s">4S店</span> 郑州上汽大众恒信众和</p><span class="fright">售郑州</span></div>-->
			    			<!--<div class="oh"><span class="fleft">厂商指导价：<b class="colorff0">8.49万</b>起</span><span class="fright sale_price">促销价：<b class="colorff0">7.49万</b>起</span></div>-->
			    			<!--<p><img src="/static/img/dianhua1.png" alt="" />400-888-8888</p>-->
					    	<!--<p><img src="/static/img/dingwei.png" alt="" />郑州市金水区花园路与国基路交叉口    <a href="" class="coloryel">[到这里]</a></p>-->
					    	<!--<p class="color9">附加条件说明：店内上牌；店内上保险；需加装饰；店内置换；店内贷款；持本地牌照</p>-->
					    	<!--<div class="btn_consult"><span><img src="/static/img/jisuan.png" alt="" />计算器</span><span><img src="/static/img/money.png" alt="" />问低价</span></div>-->
			    		<!--</li>-->
			    		<!--<li>-->
			    			<!--<div class="shop_name"><p class="fleft"><span class="signal_4s">4S店</span> 郑州上汽大众恒信众和</p><span class="fright">售郑州</span></div>-->
			    			<!--<div class="oh"><span class="fleft">厂商指导价：<b class="colorff0">8.49万</b>起</span><span class="fright sale_price">促销价：<b class="colorff0">7.49万</b>起</span></div>-->
			    			<!--<p><img src="/static/img/dianhua1.png" alt="" />400-888-8888</p>-->
					    	<!--<p><img src="/static/img/dingwei.png" alt="" />郑州市金水区花园路与国基路交叉口    <a href="" class="coloryel">[到这里]</a></p>-->
					    	<!--<p class="color9">附加条件说明：店内上牌；店内上保险；需加装饰；店内置换；店内贷款；持本地牌照</p>-->
					    	<!--<div class="btn_consult"><span><img src="/static/img/jisuan.png" alt="" />计算器</span><span><img src="/static/img/money.png" alt="" />问低价</span></div>-->
			    		<!--</li>-->
			    		<!--<li>-->
			    			<!--<div class="shop_name"><p class="fleft"><span class="signal_4s">4S店</span> 郑州上汽大众恒信众和</p><span class="fright">售郑州</span></div>-->
			    			<!--<div class="oh"><span class="fleft">厂商指导价：<b class="colorff0">8.49万</b>起</span><span class="fright sale_price">促销价：<b class="colorff0">7.49万</b>起</span></div>-->
			    			<!--<p><img src="/static/img/dianhua1.png" alt="" />400-888-8888</p>-->
					    	<!--<p><img src="/static/img/dingwei.png" alt="" />郑州市金水区花园路与国基路交叉口    <a href="" class="coloryel">[到这里]</a></p>-->
					    	<!--<p class="color9">附加条件说明：店内上牌；店内上保险；需加装饰；店内置换；店内贷款；持本地牌照</p>-->
					    	<!--<div class="btn_consult"><span><img src="/static/img/jisuan.png" alt="" />计算器</span><span><img src="/static/img/money.png" alt="" />问低价</span></div>-->
			    		<!--</li>-->
			    	<!--</ul>-->
			    	<!--<div class="moreShop">更多店铺<img src="/static/img/xialaz.png" alt="" /></div>-->
			    	<!---->
			    <!--</div>-->
				
				
				<div class="tit_er">
			        <div class="line_tit"></div>			        
			        <h2 class="color tit_con">同系推荐</h2>	       
			    </div>
				<div class="car_list">
					<ul class="list">
						<?php if(is_array($carinfo['carlist']) || $carinfo['carlist'] instanceof \think\Collection || $carinfo['carlist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['carlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<li class="items5">
							<a href="<?php echo url('zerocar/zerocardetails'); ?>?cheid=<?php echo $vol['id']; ?>" class="car_img flex_center"><img src="<?php echo $vol['img_url']; ?>" alt="" /></a>
							<a href="<?php echo url('zerocar/zerocardetails'); ?>?cheid=<?php echo $vol['id']; ?>" class="car_desc">
								<h3><?php echo $vol['name']; ?></h3>
								<p><span class="car_price"><b><?php echo $vol['can_price']; ?></b>万</span><span class="car_sui">新车含税<?php echo $vol['price']; ?>万</span></p>
								<span>月供<?php echo $vol['pay10_s2']; ?>元</span><span>月供<?php echo $vol['pay10_y2']; ?>元</span>
								<div class="che_ordered">立即预约</div>
							</a>
						</li>
					    <?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!--<div class="tit_er">-->
			        <!--<div class="line_tit"></div>			        -->
			        <!--<h2 class="color tit_con">同价位推荐</h2>	       -->
			    <!--</div>-->
				<!--<div class="car_list">-->
					<!--<ul class="list">-->
						<!--<li class="items5">-->
							<!--<a href="" class="car_img flex_center"><img src="" alt="" /></a>-->
							<!--<a href="" class="car_desc">-->
								<!--<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>-->
								<!--<p><span class="car_price"><b>2066</b>万</span><span class="car_sui">新车含税13.86万</span></p>-->
								<!--<p><span>2015年8月10日上牌</span> <span class="padlt20">4万公里</span> </p>-->
								<!--<div class="che_ordered">立即预约</div>-->
							<!--</a>-->
						<!--</li>-->
					<!---->
					<!--</ul>-->
				<!--</div>-->
			<!--</div>-->
		<!---->
    <!--</div>-->
  <!--公共底部样式-->
    <!--<div class="footer"></div>-->
  <!--底部123固定悬浮-->
    <div class="wrap_bt">
    	<div class="wrap oh flex_center">
    		<div class="car_descInfo">
    			<h4 class="hid"><?php echo $carinfo['car_name']; ?></h4>
    			<!--<p>2017-11 <b>|</b>5万公里<b>|</b>国5(国5) <b>|</b>郑州</p>-->
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
						<?php if(is_array($carinfo['img_512']) || $carinfo['img_512'] instanceof \think\Collection || $carinfo['img_512'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_512'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
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
						<?php if(is_array($carinfo['img_512']) || $carinfo['img_512'] instanceof \think\Collection || $carinfo['img_512'] instanceof \think\Paginator): $i = 0; $__LIST__ = $carinfo['img_512'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
						<div class="swiper-slide">
							<div class="silde_img"><img src="<?php echo $vol; ?>" alt=""></div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
		</div>
  		<div class="silde_info">
  			<h2>奥迪A4L 2016款 35 TFSI 典藏版S line豪华型</h2>
  			<p class="info_car">2016年-11月 | 1.6万公里 | 国4(国5) | 郑州</p>
  			<div class="tag flex_center"><span>准新车</span><span>店铺认证</span></div>
  			<div class="info_price"><b>￥33.80万&nbsp;</b>比新车省：75.29万</div>
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
    			<li><img src="/static/img/PK.png" alt="" /><p>加入PK</p></li>
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
		    //$(".header").load("templates/header.html");
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
//          查看不同分期方案
			$(".first span").each(function(i){
				$(".first span").eq(i).click(function(){
					$(this).addClass('new_active').siblings().removeClass('new_active')
				$(".first_result .first_s").eq(i).show().siblings().hide();
				})	
			})
//			查看更多4s店铺
			var len=$(".list_shop li").length;
			console.log(len)
			if(len>=2){
				$(".moreShop").show();
				$(".moreShop").click(function(){
					$(".list_shop").css("height","auto");
					$(".moreShop").hide();
				})
				
			}
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
