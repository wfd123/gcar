<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"E:\Apache24\htdocs\g_car\public/../app/index\view\index\lots_cars.html";i:1541765145;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>		
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
			<div class="breadnav">您的位置：<a href="#">郑州二手交易市场</a>>><a href="#">二手车 >></a></div>
			<div class="wrap">
				<div class="list_left">
					<div class="list_screen_cont">
						<div class="list_brand  slide_up list_item gj_clear">
							<div class="list_title">品牌</div>
							<div class="screening-margin gj_clear">							
								<div class="list_car_brand list_detail_sel"><?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?brand_id=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div>
								<span class="more">更多品牌<i><img src="/static/img/down1.png" alt="" width="12"/></i></span>
							</div>
						</div>
						<div class="slide_down sel_box_more all_brandshow">
							<span class="more">收起<i><img src="/static/img/down1.png" alt="" width="12"/></i></span>
							<div class="brand-more">
								   <?php if(is_array($ABC) || $ABC instanceof \think\Collection || $ABC instanceof \think\Paginator): $i = 0; $__LIST__ = $ABC;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
			                       <dl class='zimu'>
							<dt><?php echo $vol['initial']; ?></dt>
									   <?php if(is_array($vol['list']) || $vol['list'] instanceof \think\Collection || $vol['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vol['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<dd class='firstname'>

								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?brand_id=<?php echo $vo['id']; ?>&page=1&sort=1" title=''><?php echo $vo['name']; ?></a>

															</dd>
									   <?php endforeach; endif; else: echo "" ;endif; ?>
							</dl>
                                   <?php endforeach; endif; else: echo "" ;endif; ?>
			
			                </div>
						</div>
						<!--<div class="list_series slide_up list_item gj_clear">-->
							<!--<div class="list_title">车系</div>-->
							<!--<div class="screening-margin">							-->
								<!--<div class=" list_detail_sel"><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a></div>-->
							    <!--<span class="more">更多<i><img src="/static/img/down1.png" alt="" width="12"/></i></span>-->
							<!--</div>-->
						<!--</div>-->
						<div class="slide_down all_series sel_box_more">
							<span class="more">收起<i><img src="/static/img/down1.png" alt="" width="12"/></i></span>
							<div class="series_box">
								<dl>
									<dt>微型车</dt>
									<dd><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a></dd>
								</dl>
								<dl>
									<dt>小型车</dt>
									<dd><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a></dd>
								</dl>
								<dl>
									<dt>紧凑型</dt>
									<dd><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a>
										<a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a>
										<a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a><a href="">大众up!</a>
									</dd>
								</dl>

							</div>
						</div>
						<div class="list_price list_item gj_clear">
							<div class="list_title">价格</div>
							<div class="screening-margin gj_clear">							
								<div class="list_detail_sel">
									<?php if(is_array($price) || $price instanceof \think\Collection || $price instanceof \think\Paginator): $i = 0; $__LIST__ = $price;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?price_range=<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="price_handle">
									<div class="box"><input type="text" />万</div><em>-</em><div class="box"><input type="text" />万</div><a href="javascript:;" class="sure">确定</a>
								</div>
							</div>
							
						</div>
						<div class="list_jibie list_item gj_clear">
							<div class="list_title">级别</div>
							<div class="screening-margin gj_clear">							
								<div class="list_detail_sel">
									<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?subface=<?php echo $vo['id']; ?>" class="active"><?php echo $vo['name']; ?></a>
								    <?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<!--<span class="more">多选<i>+</i></span>-->
							</div>
						</div>
						<div class="list_other list_item gj_clear">
							<div class="list_title">其他</div>
							<div class="screening-margin gj_clear">							
								<div class=" list_detail_sel">
									 <ul class="select-box searchCond" style="background: none">
							          <li>
							            <div data-toggle="select" name="r" class="select-menu"  id="select2">
							              <div class="menu-selected">车龄</div>
							              <dl class="menu menu4" style="display: none;" id="aselect2">
							                <dd> <a rel="nofollow" href="#" data-for="hidden_r" data-valueid="0" class="preventdefault" title="不限二手车">不限</a> </dd>
											  <?php if(is_array($age) || $age instanceof \think\Collection || $age instanceof \think\Paginator): $i = 0; $__LIST__ = $age;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?age=<?php echo $val['id']; ?>" data-for='hidden_r' data-valueid='' class='preventdefault' title=''><?php echo $val['cheling']; ?></a> </dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							              </dl>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" name="k" class="select-menu" id="select3">
							              <div class="menu-selected">里程</div>
							              <dl class="menu menu5" style="display: none;" id="aselect3">
							                <dd> <a rel="nofollow" href="#" data-for="hidden_k" data-valueid="0" class="preventdefault" title="不限二手车">不限</a> </dd>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_k" data-valueid="0-1" class="preventdefault" title="1万公里以内二手车">1万公里以内</a> </dd>-->
											  <?php if(is_array($licheng) || $licheng instanceof \think\Collection || $licheng instanceof \think\Paginator): $i = 0; $__LIST__ = $licheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?car_mileage=<?php echo $val['id']; ?>" data-for='hidden_k' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a></dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
										  </dl>
							            </div>
							          </li>
							
							          <li>
							            <div data-toggle="select" class="select-menu" id="select4">
							              <div class="menu-selected" >排量</div>
							              <div class="menu menu6" style="display: none;" id="aselect4">
							                <dd> <a rel="nofollow" href="#" data-for="hidden_j" data-valueid="0" class="preventdefault" title="不限二手车">不限</a> </dd>
											  <?php if(is_array($output) || $output instanceof \think\Collection || $output instanceof \think\Paginator): $i = 0; $__LIST__ = $output;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?output=<?php echo $val['id']; ?>" data-for='hidden_j' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a> </dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
											  <!--<dd> <a rel="nofollow" href="#" data-for="hidden_j" data-valueid="0-1" class="preventdefault" title="1.0L以下二手车">1.0L以下</a> </dd>-->
							              </div>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" class="select-menu" id="select7">
							              <div class="menu-selected">变速箱</div>
							              <div class="menu menu8" style="display: none;" id="aselect7">
							                <dd> <a rel="nofollow" href="javascript:;" data-for="hidden_g" data-valueid="0" class="preventdefault" title="不限档二手车">不限</a> </dd>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_g" data-valueid="1" class="preventdefault" title="自动档二手车">自动</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_g" data-valueid="2" class="preventdefault" title="手动档二手车">手动</a> </dd>-->
											  <?php if(is_array($gearbox) || $gearbox instanceof \think\Collection || $gearbox instanceof \think\Paginator): $i = 0; $__LIST__ = $gearbox;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?gearbox=<?php echo $val['id']; ?>" data-for='hidden_g' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a> </dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
										  </div>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" name="r" class="select-menu" id="select5">
							              <div class="menu-selected">排放标准</div>
							              <dl class="menu menu4" style="display: none;" id="aselect5">
							                <dd> <a rel="nofollow" href="#" data-for="hidden_h" data-valueid="0" class="preventdefault" title="不限二手车">不限</a> </dd>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_h" data-valueid="3-" class="preventdefault" title="国三以上二手车">国三以上</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_h" data-valueid="4-" class="preventdefault" title="国四以上二手车">国四以上</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_h" data-valueid="5" class="preventdefault" title="国五二手车">国五</a> </dd>-->
											  <?php if(is_array($blowdown) || $blowdown instanceof \think\Collection || $blowdown instanceof \think\Paginator): $i = 0; $__LIST__ = $blowdown;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?blowdown=<?php echo $val['id']; ?>" data-for='hidden_h' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a> </dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							              </dl>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" class="select-menu" id="select8">
							              <div class="menu-selected">驱动</div>
							              <div class="menu menu9" style="display: none;" id="aselect8">
											  <?php if(is_array($car_drive) || $car_drive instanceof \think\Collection || $car_drive instanceof \think\Paginator): $i = 0; $__LIST__ = $car_drive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?car_drive=<?php echo $val['id']; ?>" data-for='hidden_q' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a> </dd>
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_q" data-valueid="0" class="preventdefault" title="不限二手车">前驱</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_q" data-valueid="2" class="preventdefault" title="2座二手车">前驱</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_q" data-valueid="4" class="preventdefault" title="4座二手车">前驱</a> </dd>-->
							              </div>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" class="select-menu" id="select12">
							              <div class="menu-selected">车身</div>
							              <div class="menu menu12" style="display: none;" id="aselect12">
											  <?php if(is_array($car_body) || $car_body instanceof \think\Collection || $car_body instanceof \think\Paginator): $i = 0; $__LIST__ = $car_body;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?car_body=<?php echo $val['id']; ?>" data-for='hidden_x' data-valueid='' class='preventdefault' title='不限二手车'><?php echo $val['name']; ?></a>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_x" data-valueid="0" class="preventdefault" title="不限二手车">前驱</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_x" data-valueid="2" class="preventdefault" title="2座二手车">前驱</a> </dd>-->
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_x" data-valueid="4" class="preventdefault" title="4座二手车">前驱</a> </dd>-->
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							              </div>
							            </div>
							          </li>
							
							          <li>
							            <div data-toggle="select" class="select-menu" id="select6">
							              <div class="menu-selected">颜色</div>
							              <div class="menu menu7 radius menuCar07" style="display: none;" id="aselect6">
							                <dd> <a rel="nofollow" href="" data-for="hidden_c" data-valueid="0" class="preventdefault c0" title="不限二手车">不限</a> </dd>
											  <?php if(is_array($color) || $color instanceof \think\Collection || $color instanceof \think\Paginator): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?color=<?php echo $val['id']; ?>" data-for='hidden_c' data-valueid='' class='preventdefault c15' title=''><?php echo $val['name']; ?></a> </dd>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_c" data-valueid="1" class="preventdefault c1" title="黑色二手车">黑色</a> </dd>-->
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							              </div>
							            </div>
							          </li>
							          <li>
							            <div data-toggle="select" class="select-menu" id="select10">
							              <div class="menu-selected menu-selected12">燃料</div>
							              <div class="menu menu12" style="display: none;" id="aselect10">

							                <dd> <a rel="nofollow" href="" data-for="hidden_d" data-valueid="0" class="preventdefault" title="不限二手车">不限</a> </dd>
											  <?php if(is_array($fuel) || $fuel instanceof \think\Collection || $fuel instanceof \think\Paginator): $i = 0; $__LIST__ = $fuel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
											  <dd> <a rel='nofollow' href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/lots_cars?fuel=<?php echo $val['id']; ?>" data-for='hidden_w' data-valueid='' class='preventdefault' title=''><?php echo $val['name']; ?></a> </dd>
							                <!--<dd> <a rel="nofollow" href="#" data-for="hidden_d" data-valueid="1" class="preventdefault" title="汽油二手车">汽油</a> </dd>-->
											  <?php endforeach; endif; else: echo "" ;endif; ?>
							          
							              </div>
							            </div>
							          </li>
							        </ul>
								</div>
							</div>
						</div>
					</div>
					<div class="list_subNav">
						<ul>
							<li class="active"><a href="" class="">郑州二手车</a></li>
							<!--<li><a href="">分期购车</a></li>-->
							<!--<li><a href="">商家车</a></li>-->
							<!--<li><a href="">个人车</a></li>-->
							<!--<li><a href="">商家认证</a></li>-->
						</ul>
					</div>
					<div class="list_sort">
						<ul class="sort_sel">
							<li class="current"><a href="">综合排序</a></li>
							<!--<li><a href="">最新发布</a></li>-->
							<!--<li><a href="">价格最低</a></li>-->
							<!--<li><a href="">车龄最短</a></li>-->
							<!--<li><a href="">里程最短</a></li>-->
						</ul>
						<!--<ul class="check_item flex_center">-->
							<!--<li class="checked"><img src="/static/img/img_checked.png" alt="" width=""/>准新车</li>-->
							<!--<li><img src="/static/img/img_uncheck.png" alt="" />七日内上新</li>-->
							<!--<li><img src="/static/img/img_uncheck.png" alt="" />质保</li>-->
							<!---->
						<!--</ul>-->
						<!--<span class="more">更多<i><img src="/static/img/down1.png" alt="" /></i></span>-->
					</div>
					<div class="marbt30 carList_info">
						 <ul class="list">

                           <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($res) ? array_slice($res,1,8, true) : $res->slice(1,8, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>

							<li class="items5">

								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
								<a href="<?php echo $domain; ?>/<?php echo \think\Session::get('cityurl'); ?>/details/<?php echo $val['pu_id']; ?>" class="car_desc">
									<h3><?php echo $val['pu_id']; ?><?php echo $val['name_li']; ?></h3>
									<p><span class="car_price"><b><?php echo $val['price']; ?></b>万</span><span class="car_sui">新车含税<?php echo $val['news_price']; ?>万</span></p>
									<p><span><?php echo $val['car_cardtime']; ?>上牌</span> <span class="padlt20"><?php echo $val['car_mileage']; ?>万公里</span> </p>
									<div class="che_ordered">立即预约</div></a>

							</li>

                           <?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					
				</div>
				<div class="list_right">
					<div class="list_service">
						<h2 class="er_service">二手车服务</h2>
						<ul class="">
							<li>
								<img src="/static/img/car111.png" alt="" />
								<p>车辆评估</p>
							</li>
							<li>
								<img src="/static/img/car222.png" alt="" />
								<p>高价卖车</p>
							</li>
							<li>
								<img src="/static/img/car333.png" alt="" />
								<p>免费置换</p>
							</li>
							<li>
								<img src="/static/img/car444.png" alt="" />
								<p>帮买好车</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="footer">-->
			<!--
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
</script>-->
		<!--</div>-->
	</body>
	<script>		
		$(function(){
            $($(".wrap li")[2]).addClass("active").siblings().removeClass("active");
		    // $(".header").load("templates/header.html");
		    // $(".footer").load("templates/footer.html");
		    $('.check_item img').click(function(){
                    if($(this).attr('src') == '/static/img/img_checked.png'){
                        $(this).attr('src','/static/img/img_uncheck.png')
                    }else{
                        $(this).attr('src','/static/img/img_checked.png')
                    }

                })
		     // 展开收起更多筛选
         $(".list_screen_cont").on("click", ".slide_up .more", function() {
             $(".slide_up").each(function() {
                 if ($(this).css('display') == 'none' ) {
                     $(this).slideDown(300);
                 }
             });
             $(".slide_down").each(function() {
                 if ($(this).css('display') == 'block') {
                     $(this).slideUp(300);
                 }
             });
             $(this).parents(".slide_up").slideUp(300);
             $(this).parents(".slide_up").next(".slide_down").slideDown(300);
         });
         $(".list_screen_cont").on("click", ".slide_down .more", function() {
             $(this).parents(".slide_down").slideUp(300)
             $(this).parents(".slide_down").prevAll(".slide_up").slideDown(300);
         });
         // 展开收起车系多选筛选
         $("#hotseriesmore").on("click", function() {
             $(".js-screening-down").each(function() {
                 if ($(this).css('display') == 'block') {
                     $(this).slideUp(300);
                 }
             });
             $(this).parents(".js-screening-up").slideUp(300) 
             $(".js-screening-multi").slideDown(300);
         });


		    $(".slide_down").mouseout(function(ev){
       		 var box=document.getElementById($(this).attr("id"));
	             var ev=ev||window.event;
	                if(!isMouseLeaveOrEnter(ev,box)){
	                  return false;
	                }
	           $(this).slideUp(300)
	           $(this).prevAll(".slide_up").slideDown(300);
	        });
	        //防止鼠标移出移入子元素触发mouseout事件
	        function isMouseLeaveOrEnter(e, handler) {    
	          var reltg=e.relatedTarget?e.relatedTarget:e.type=='mouseout'?e.toElement:e.fromElement;    
	          while (reltg && reltg != handler){
	             reltg = reltg.parentNode; 
	          }       
	          return (reltg != handler);    
	        } 
//	        其他筛选条件
 		 $(".select-menu").hover(function () {
            $("#a"+$(this).attr("id")).show();
        }, function () {
            $("#a" + $(this).attr("id")).hide();
        });
       // var url='http://www.gj2car.com/';
        $.ajax({
            type:'POST',
            url: url+'Newpc/Index/filter',
            dataType : "json",
            success:function(data){
//                console.log(data.body)
//                排放标准
                $.each(data.body.hb,function(i){
                    $("#aselect5").append("<dd> <a rel='nofollow' href='#' data-for='hidden_h' data-valueid='' class='preventdefault' title=''>"+data.body.hb[i].name+"</a> </dd>")
                })
                //车龄
                $.each(data.body.ha,function(i){
                    $("#aselect2").append("<dd> <a rel='nofollow' href='#' data-for='hidden_r' data-valueid='' class='preventdefault' title=''>"+data.body.ha[i].name+"</a> </dd>")
                })
                //里程
                $.each(data.body.hm,function(i){
                    $("#aselect3").append("<dd> <a rel='nofollow' href='#' data-for='hidden_k' data-valueid='' class='preventdefault' title=''>"+data.body.hm[i].name+" </a></dd>")
                })
//                hbo车身
                $.each(data.body.hbo,function(i){
                    $("#aselect12").append("<dd> <a rel='nofollow' href='#' data-for='hidden_x' data-valueid='' class='preventdefault' title='不限二手车'>"+data.body.hbo[i].name+"</a> </dd>")
                })
//                颜色 hc
                $.each(data.body.hc,function(i){
                    $("#aselect6").append(" <dd> <a rel='nofollow' href='#' data-for='hidden_c' data-valueid='' class='preventdefault c15' title=''>"+data.body.hc[i].name+"</a> </dd>")
                })
                //价格
                $.each(data.body.p,function(i){
                    $(".price").append("<li><a href='#'>"+data.body.p[i].name+"</a></li>")
                })
                //级别
                $.each(data.body.s,function(i){
                    $(".jibie").append(" <li><a href='#'>"+data.body.s[i].name+"</a></li>");
                })
                //排量
                $.each(data.body.ho,function(i){
                    $("#aselect4").append(" <dd> <a rel='nofollow' href='#' data-for='hidden_j' data-valueid='' class='preventdefault' title=''>"+data.body.ho[i].name+"</a> </dd>")
                })
                //驱动
                $.each(data.body.hd,function(i){
                    $("#aselect8").append(" <dd> <a rel='nofollow' href='#' data-for='hidden_q' data-valueid='' class='preventdefault' title=''>"+data.body.hd[i].name+"</a> </dd>")
                })
                //燃料
                $.each(data.body.hf,function(i){
                    $("#aselect10").append(" <dd> <a rel='nofollow' href='#' data-for='hidden_w' data-valueid='' class='preventdefault' title=''>"+data.body.hf[i].name+"</a> </dd>")
                })
//                变速箱
                $.each(data.body.hg,function(i){
                    $("#aselect7").append(" <dd> <a rel='nofollow' href='#' data-for='hidden_g' data-valueid='' class='preventdefault' title=''>"+data.body.hg[i].name+"</a> </dd>")
                })
            },

            error:function(){
                console.log("没有获取到数据");
            }
        });
	        



		})
</script>
</html>
