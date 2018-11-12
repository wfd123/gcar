<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"E:\Apache24\htdocs\g_car\public/../app/index\view\shop\index.html";i:1540780831;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
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
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/gjsilde.min.js" type="text/javascript" charset="utf-8"></script>
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
				<li class="active"><a href="<?php echo url('shop/index'); ?>">店铺首页</a></li>
				<li><a href="<?php echo url('shop/shop_list'); ?>">在售车源</a></li>
				<li><a href="<?php echo url('shop/shop_info'); ?>">公司信息</a></li>
			</ul>
		</div>
		
	</div>
	<div class="bgfa">
		<div class="wrap">
			<div class="oh">
				<div class="brandLeft">
					
					<ul>
						<li class="">
							<h3>品牌<b>全部</b></h3>
							<div class="classify">
								<a href="" class="active" >不限</a>
								<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
								<a href="<?php echo url('index/lots_cars'); ?>?brand_id=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['name']; ?></a>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</li>
						<li class="">
							<h3>价格<b>全部</b></h3>
						<div class="classify">
							<a href="" class="active" >不限</a>
							<?php if(is_array($price) || $price instanceof \think\Collection || $price instanceof \think\Paginator): $i = 0; $__LIST__ = $price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<a href="<?php echo url('index/lots_cars'); ?>?price_range=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['name']; ?></a>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						</li>
						<li class="">				
							<h3>级别<b>全部</b></h3>
							<div class="classify">
							<a href="" class="active" >不限</a>
								<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo url('index/lots_cars'); ?>?car_age=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['name']; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</li>
						<li>
							<h3>车龄 <b>全部</b></h3>
							<div class="classify">
								<a href="" class="active" >不限</a>
								<?php if(is_array($age) || $age instanceof \think\Collection || $age instanceof \think\Paginator): $i = 0; $__LIST__ = $age;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo url('index/lots_cars'); ?>?age=<?php echo $val['id']; ?>&page=1&sort=1"><?php echo $val['cheling']; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</li>
					</ul>
					
					
					
				</div>
				<div class="shopImg">
					<img src="/static/img/baner112.png" alt="">
				</div>
			</div>
			<div class="shop_recom"><h2>最新车源</h2><b></b></div>	
			<div class="gj_clear">
		    	<ul class="list ptp15 new_list">
					<?php if(is_array($new_car) || $new_car instanceof \think\Collection || $new_car instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_car) ? array_slice($new_car,1,10, true) : $new_car->slice(1,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>

					<li class="items5">

						<a href="<?php echo url('newcar/newcardetails'); ?>?brand_id=<?php echo $val['brand_id']; ?>&sys_id=<?php echo $val['sys_id']; ?>&cartype_id=<?php echo $val['cartype_id']; ?>&id=<?php echo $val['id']; ?>&name=<?php echo $val['name']; ?>&img_url=<?php echo $val['img_url']; ?>&shoufu=<?php echo $val['pay10_s2']; ?>&ygong=<?php echo $val['pay10_y2']; ?>&price=<?php echo $val['price']; ?>" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
						<a href="<?php echo url('newcar/newcardetails'); ?>?brand_id=<?php echo $val['brand_id']; ?>&sys_id=<?php echo $val['sys_id']; ?>&cartype_id=<?php echo $val['cartype_id']; ?>&id=<?php echo $val['id']; ?>&name=<?php echo $val['name']; ?>&img_url=<?php echo $val['img_url']; ?>&shoufu=<?php echo $val['pay10_s2']; ?>&ygong=<?php echo $val['pay10_y2']; ?>&price=<?php echo $val['price']; ?>" class="car_desc">
							<h3><?php echo $val['name']; ?></h3>
							<p><span class="pay_first">首付<b><?php echo $val['pay10_s2']; ?></b>万</span> <span class="padlt20">月供<?php echo $val['pay10_y2']; ?>元</span> </p>
					
						</a>
						<img src="/static/img/newgoods.png" alt="" class="hot" />
					</li>

					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<a href="" class="more_l">查看更多车型</a>
		   </div>				
		</div>	
	</div>
<!--店铺评论-->
	<div class="shop_comment">
		<div class="wrap martp20">
			<h2 class="ft18 gj_clear"><b></b>用户评分</h2>
			<div class="gj_clear score_info">
				<div class="fleft synthesize ">
					<p>综合评分</p>
					<b>5.0</b>
				</div>
				<div class="fleft score_div p_r">
					<div class="score_value value1"><b>车源真实： </b><span class=""><em data_value="2"></em></span></div><!--分数-->	
					<div class="score_value value2"><b>服务态度：</b><span class=""><em data_value="3"></em></span></div><!--分数-->	
					<div class="score_value value3"><b>商家专业： </b><span class=""><em data_value="4"></em></span></div><!--分数-->	
				</div>
				<div class="fleft commment_list">
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
					<span>服务热情&nbsp;999</span>
				</div>
			</div>
			<div class="all_recom">
				<h2 class="ft18 gj_clear"><b></b>全部点评</h2>
				<ul class="">
					<li>
					<div class="gj_clear">
						<div class="avatar"><img src="/static/img/userss.png" alt="" /></div>
						<div class="user_recom fleft">
							<p class="user_name ft16">支付的接口为部分</p>
							<div class="user_markscore"><em data_value='5'></em></div>
							<p>店里的车很好 只要车没有任何事故  可随时提车  分期能落山东的牌照吗？</p>
						</div>
					</div>
					<span class="fright">2018-04-15</span>
					</li>
					
				</ul>
				<div class="link_other">
					<a href="" class="">发表点评</a><a href="">查看全部点评</a>
				</div>
				
			</div>
		</div>
		
	</div>
	<div class="full_wid">
		<div class="wrap">
			<div class="breadnav">您的位置：<a href="#">郑州二手交易市场</a>>><a href="#">郑州二手车 >></a><a href=""> 发表店铺评论 </a></div>
			<div class="add_com">
				<div class="fright store_score">
					<h2>向阳二手车金水区店</h2>
					<div class="score_res oh">
						<b class="f_score">5.0</b>
						<div class="score_value fleft"><span class=""><em data_value="2"></em></span></div><!--分数-->
					</div>
					<p>店铺环境：5分</p>
					<p>服务态度：5分</p>
					<p>商家专业：5分</p>

				</div>
				<h1>店铺评分</h1>
				<h2>向阳二手车金水区店</h2>
				<div class="score_cont gj_clear">
					<!--打分-->
					<div class="comment_score"><span>总体服务:</span>
						<div class="mark_score star_img">
							<div class="empty_star">
								<span class="star" data-value='20' score_vlaue='1'></span>
								<span class="star" data-value='40' score_vlaue='2'></span>
								<span class="star" data-value='60' score_vlaue='3'></span>
								<span class="star" data-value='80' score_vlaue='4'></span>
								<span class="star" data-value='100' score_vlaue='5'></span>
							</div>
							<div class="full_star"></div>
							<input class="totalTag tagScore" type="hidden" value="1"></input>
						</div>

					</div>
					<div class="comment_score"><span>车源真实:</span>
						<div class="mark_score smile_img">
							<div class="empty_star">
								<span class="star" data-value='20' score_vlaue='1'></span>
								<span class="star" data-value='40' score_vlaue='2'></span>
								<span class="star" data-value='60' score_vlaue='3'></span>
								<span class="star" data-value='80' score_vlaue='4'></span>
								<span class="star" data-value='100' score_vlaue='5'></span>
							</div>
							<div class="full_star"></div>
							<input class="carTag tagScore" type="hidden"></input>
						</div>
					</div>
					<div class="comment_score"><span>服务态度:</span>
						<div class="mark_score smile_img">
							<div class="empty_star">
								<span class="star" data-value='20' score_vlaue='1'></span>
								<span class="star" data-value='40' score_vlaue='2'></span>
								<span class="star" data-value='60' score_vlaue='3'></span>
								<span class="star" data-value='80' score_vlaue='4'></span>
								<span class="star" data-value='100' score_vlaue='5'></span>
							</div>
							<div class="full_star"></div>
							<input class="serviceTag tagScore" type="hidden"></input>
						</div>
					</div>
					<div class="comment_score"><span>商家专业:</span>
						<div class="mark_score smile_img">
							<div class="empty_star">
								<span class="star" data-value='20' score_vlaue='1'></span>
								<span class="star" data-value='40' score_vlaue='2'></span>
								<span class="star" data-value='60' score_vlaue='3'></span>
								<span class="star" data-value='80' score_vlaue='4'></span>
								<span class="star" data-value='100' score_vlaue='5'></span>
							</div>
							<div class="full_star"></div>
							<input class="dealerTag tagScore" type="hidden"></input>
						</div>
					</div>
					<!--多选-->
					<div class="tag_list">
						<span class="active" tag_check='1' tag_value="1"> 服务热情</span>
						<span tag_check='0'  tag_value="2">店面干净</span>
						<span tag_check='0'  tag_value="3">价格给力</span>
						<span tag_check='0'  tag_value="4">服务耐心</span>
					</div>
				</div>

				<h2>评价</h2>
				<div class="textareabox p_r">
	        	<textarea class="form_textarea" data-length="500" id="information"  data-toggle="textarea"
						  placeholder="服务是否专业、价格是否合理，写下您的意见吧~"></textarea>
					<span class="limit_num">
	        			至少10字
	        		</span>
				</div>
				<h2>购车阶段</h2>
				<ul class="buy_step oh">
					<li><input type="checkbox" class="checked"/><b></b><span>未联系</span></li>
					<li><input type="checkbox" /><b></b><span>未购车</span></li>
					<li><input type="checkbox" /><b></b><span>未到店</span></li>
				</ul>
				<div class="add_btn">发表评论</div>
				<p>
					欢迎您为商家进行点评和打分，与万千买家分享您的购车体验！<br />
					您的点评和打分将成为其他买家的参考依据，并影响该商家评价。<br />
					请您根据真实的购车体验，客观地发布本人的评价。如您发布的点评并非本人的真实体验，则将被视为违规。
				</p>
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
 