<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\Apache24\htdocs\g_car\public/../app/index\view\user\person_release.html";i:1542001591;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/iconfont.css" />
	<link rel="stylesheet" href="/static/js/theme/default/laydate.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jquery.form.js"></script>
	<script src="/static/js/jquery.validate.min.js"></script>
	<script src="/static/layer/layer.js"></script>
	
	<style>
		.mblack
		{
			float: left;
			vertical-align: top;
			white-space: nowrap;
		}
		.validate-result{
			height: 40px; text-align: center;color: red;font-size: 18px;margin-top: 15px;
		}
		.error {
			background:url("/static/img/false.png") no-repeat 0px 4px;
			font-weight: bold;
			padding-left:20px;
			color: #EA5200;
		}
		.checked {
			background:url("/static/img/true.png") no-repeat center center;
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
	
		<div class="borbt"><div class="header"></div></div>
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
						<h1 class="borbt"><span class="release">发布车辆信息</span></h1>
						<h2 class="step"><!--上传资料--></h2>
						<form id="release_form" action="<?php echo url('user/pulish_adds'); ?>" enctype="multipart/form-data" method="post">
						<div class="upLoad_form">
							<ul class="sel_box_info">
								<li class="gj_clear">
									<div class="demo_inputype selected_ipt ">
									<div class="input_inline">
										<p class="form_litit"><b>*</b>品牌：</p>
										<input type="hidden" id="car_brand_id" name="car_brand_id"/>
										<input type="hidden" id="car_sys_id" name="car_brand_id"/>
										<input type="hidden" id="car_type_id" name="car_brand_id"/>
										<input type="text" name="sltCar_name" class="upload_info hid" readonly id="sltCar_name" placeholder="请选择品牌"/>
										<div class="position_r">
											<div class="gjcar_box">
		                                       <div class="gjcar_select_car">
		                                       	   <!--选择结果展示-->
		                                       		<div class="bread_subnav gj_clear">
			                                            <a href="javascript:;" style="cursor: default;" id="brandName"></a>
			                                            <a href="javascript:;" style="cursor: default;" id="seriesName"></a>
			                                            <a href="javascript:;" style="cursor: default;" id="carName"></a>
			                                        </div>
			                                        <!--选择标题-->
			                                        <div class="choose_car_t oh">
			                                            <a href="javascript:;" onclick="set('bd0',1,3)" id="bd01" class="active" >请选择品牌</a>
			                                            <a href="javascript:;" onclick="set('bd0',2,3)" id="bd02">请选择车系</a>
			                                            <a href="javascript:;" onclick="set('bd0',3,3)" id="bd03">请选择年代款</a>
			                                        </div>
			                                        <!--选择品牌-->
			                                        <div class="choose_cartab">
			                                            <div class=" choose_cartab1 oh" id="conbd01">
			                                                <div class="choosecar_letter">
			                                                    <a href="javascript:;" class="active"><span>A</span><span>B</span></a>
			                                                    <a href="javascript:;"><span>C</span><span>D</span></a>
			                                                    <a href="javascript:;"><span>E</span><span>F</span></a>
			                                                    <a href="javascript:;"><span>G</span><span>H</span></a>
			                                                    <a href="javascript:;"><span>I</span><span>J</span></a>
			                                                    <a href="javascript:;"><span>K</span><span>L</span></a>
			                                                    <a href="javascript:;"><span>M</span><span>N</span></a>
			                                                    <a href="javascript:;"><span>O</span><span>P</span></a> 
			                                                    <a href="javascript:;"><span>Q</span><span>R</span></a>
			                                                    <a href="javascript:;"><span>S</span><span>T</span></a>
			                                                    <a href="javascript:;"><span>U</span><span>V</span></a>
			                                                    <a href="javascript:;"><span>W</span><span>X</span></a>
			                                                    <a href="javascript:;"><span>Y</span><span>Z</span></a>
			                                                </div>
			                                                <div id="brand_content" class="brand_content ">
			                                                	<ul class="letter_box">
																	<?php if(is_array($ABC) || $ABC instanceof \think\Collection || $ABC instanceof \think\Paginator): $i = 0; $__LIST__ = $ABC;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
			                                                		<li id="brand_letter_<?php echo $vol['initial']; ?>" class="oh">
			                                                			<span class="brand_letter"><?php echo $vol['initial']; ?></span>
			                                                			<p>
																			<?php if(is_array($vol['list']) || $vol['list'] instanceof \think\Collection || $vol['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vol['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			                                                				<a onclick="btn_car_brand('<?php echo $vo['id']; ?>')" href="javascript:;"><?php echo $vo['name']; ?></a>
																			<?php endforeach; endif; else: echo "" ;endif; ?>

			                                                			</p>
			                                                		</li>
			                                                	   <?php endforeach; endif; else: echo "" ;endif; ?>
			                                                	</ul>
			                                                </div>
			                                            </div>
			                                            <!--选择车系-->
			                                            <div class=" choose_cartab2 gj_clear" style="display: none;" id="conbd02">
			                                                <div class="chooseSeries">
			                                                	<a href="javascript:;">奥迪A3  </a><a href="javascript:;">奥迪A3  </a><a href="javascript:;">奥迪A3  </a>
			                                                	<a href="javascript:;">奥迪A3  </a><a href="javascript:;">奥迪A3  </a>
			                                                	<a href="javascript:;">奥迪</a><a href="javascript:;">奥迪</a><a href="javascript:;">奥迪</a>
                                                				<a href="javascript:;">奥迪</a><a href="javascript:;">奥迪</a><a href="javascript:;">奥迪</a>

			                                                </div>
			                                            </div>
			                                            <!--选择车款-->
			                                            <div class=" choose_cartab3 gj_clear" style="display: none;" id="conbd03">
			                                                <div class="choose_caryear gj_clear">
			                                                    <div class="year_content gj_clear">
			                                                    	<!--<p class="year_tit">2018款</p>-->
			                                                    	<div class="year_car oh">
				                                                    	<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>
				                                                    	<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>
				                                                    	<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>
				                                                    	<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>
				                                                    	<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>
			                                                    	</div>
			                                                    	<!--<p class="year_tit">2018款</p>-->
			                                                    	<!--<div class="year_car">-->
				                                                    	<!--<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>-->
				                                                    	<!--<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>-->
				                                                    	<!--<a href="javascript:;">2018款 30周年年型 30 TFSI 进取型</a>-->
			                                                    	<!--</div>-->
			                                                    </div>
			                                                </div>
			                                            </div>
			                                        </div>
		                                       </div>
	                                    	</div>
										</div>													 
									</div>
									<div class="mblack"> </div>
									</div>
										<div class="demo_inputype">
											<div class="input_inline"><p class="form_litit"><b>*</b>价格：</p><input type="text" name="price" class="" placeholder="请输入价格"/>万</div>
											<div class="mblack"> </div>
										</div>
								</li>
								<li class="gj_clear">
									<div class="demo_inputype">
										<div class="input_inline"><p class="form_litit"><b>*</b>里程：</p><input type="text" name="car_mileage" class=""  placeholder=""/>万公里</div>
										<div class="mblack"> </div>
									</div>


									<div class="demo_inputype">
										<div class="input_inline"><p class="form_litit"><b>*</b>上牌时间：</p>
											<!--<input type="text" name="car_cardtime" id="year" class="upload_info"/></div>-->
											<input type="text" name="car_cardtime"  placeholder="例如 2018年1月" class=""/></div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>车身：</p><input type="text" name="carbody" class="upload_info" readonly placeholder="请选择车身"/>
										<div class="position_r">
											<div class="gjcar_box">
												<input id="car_body" type="hidden" name="car_body" />
												<ul class="list_slt">
													<!--<select name="car_body" >-->
													<?php if(is_array($car_body) || $car_body instanceof \think\Collection || $car_body instanceof \think\Paginator): $i = 0; $__LIST__ = $car_body;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<!--<li><option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option></li>-->
													<?php endforeach; endif; else: echo "" ;endif; ?>
													<!--</select>-->

												</ul>
											</div>
										</div>
									</div>
									<div class="mblack"> </div>
									</div>
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>燃料：</p><input type="text" name="fuel1" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<input id="fuel" type="hidden" name="fuel" />
												<ul class=" list_slt">
													<?php if(is_array($fuel) || $fuel instanceof \think\Collection || $fuel instanceof \think\Paginator): $i = 0; $__LIST__ = $fuel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>驱动：</p><input type="text" name="cardrive" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<input id="car_drive" type="hidden" name="car_drive" />
												<ul class="list_slt">
													<!--<select name="car_drive" >-->
													<?php if(is_array($car_drive) || $car_drive instanceof \think\Collection || $car_drive instanceof \think\Paginator): $i = 0; $__LIST__ = $car_drive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<!--<li><option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option></li>-->
													<?php endforeach; endif; else: echo "" ;endif; ?>
													<!--</select>-->
												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>排量：</p><input type="text" name="output1" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<input id="output" type="hidden" name="output" />
												<ul class="list_slt">
													<?php if(is_array($output) || $output instanceof \think\Collection || $output instanceof \think\Paginator): $i = 0; $__LIST__ = $output;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>变速箱：</p><input name="gearbox1" type="text" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<ul class="list_slt">
													<input id="gearbox" type="hidden" name="gearbox" />
													<?php if(is_array($gearbox) || $gearbox instanceof \think\Collection || $gearbox instanceof \think\Paginator): $i = 0; $__LIST__ = $gearbox;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>级别：</p><input type="text" name="subface1" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<input id="subface" type="hidden" name="subface" />
												<ul class="list_slt">
													<?php if(is_array($subface) || $subface instanceof \think\Collection || $subface instanceof \think\Paginator): $i = 0; $__LIST__ = $subface;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="selected_ipt demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>排放标准：</p><input type="text" name="blowdown1" class="upload_info" readonly />
										<div class="position_r">
											<div class="gjcar_box">
												<input id="blowdown" type="hidden" name="blowdown" />
												<ul class="list_slt">
													<?php if(is_array($blowdown) || $blowdown instanceof \think\Collection || $blowdown instanceof \think\Paginator): $i = 0; $__LIST__ = $blowdown;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<li id="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></li>
													<?php endforeach; endif; else: echo "" ;endif; ?>

												</ul>
											</div>
										</div>
									</div>
										<div class="mblack"> </div>
									</div>
									<div class="demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>电话：</p><input type="text" name="phone" class="" placeholder="请输入电话" /></div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="demo_inputype">
									<div class="input_inline"><p class="form_litit"><b>*</b>联系人：</p><input type="text" name="contact" class="" placeholder="请输入手机号" /></div>
										<div class="mblack"> </div>
									</div>
								</li>
								<li class="gj_clear">
									<div class="oh"><p class="form_litit"><b>*</b>车身颜色：</p></div>
									<div class="car_color">
										<input id="color"  name="color" style="height: 1px;width: 1px;" />
										<?php if(is_array($color) || $color instanceof \think\Collection || $color instanceof \think\Paginator): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
										<p class="slt_color">
											<a  href="javascript:;">
												<img src="<?php echo $val['img_url']; ?>" class="eq"/>
	                                            <!--<span style="background: #000000;" class="eq"></span>-->
	                                            <span id="<?php echo $val['id']; ?>" class="text"><?php echo $val['name']; ?></span>
												<!--<option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>-->
	                                        </a>
										</p>
										<?php endforeach; endif; else: echo "" ;endif; ?>

										<p class="slt_color">
											<a  href="javascript:;">
	                                            <span  class="eq">
	                                            	<span class="mini_color" style="background: #E4007F;"></span>
	                                                <span class="mini_color" style="background: #A6937C;"></span>
	                                                <span class="mini_color" style="background: #FACD89;"></span>
	                                                <span class="mini_color" style="background: #FFF600;"></span>
	                                            </span>
	                                            <span class="text">其他</span>
	                                        </a>
										</p>
									</div>
									<div style="margin-left: 20px;"  class="mblack"> </div>
								</li>
								<li class="gj_clear">
									<div class="gj_clear"><p class="form_litit"><b>*</b>车辆照片：</p><span class="up_tip">最多可以上传10张图片，马上上传</span></div>
									<div class="img-box full">
										<section class="img-section">										
											<div class="z_photo upimg-div oh" >
											  <!--<section class="up-section fl">-->
											<!--<span class="up-span"></span>-->
											<!--<img src="/static/img/buyerCenter/a7.png" class="close-upimg">-->
											<!--<img src="/static/img/buyerCenter/3c.png" class="type-upimg" alt="添加标签">-->
											<!--&lt;!&ndash;<img src="/static/img/test2.jpg" class="up-img">&ndash;&gt;-->
											<!--<p class="img-namep"></p>-->
											<!--&lt;!&ndash;<input id="taglocation" name="taglocation" value="" type="hidden">&ndash;&gt;-->
											<!--&lt;!&ndash;<input id="tags" name="tags" value="" type="hidden">&ndash;&gt;-->
											<!--</section>-->
												<section class="z_file fl">
													<img src="/static/img/upimg.png" class="add-img">
													<input type="file" name="subface_img[]"  class="file"  />
												</section>
											</div>
										</section>
									</div>
									<aside class="mask works-mask">
										<div class="mask-content">
										<p class="del-p ">您确定要删除上传的图片吗？</p>
										<p class="check-p"><span class="del-com wsdel-ok">确定</span><span class="wsdel-no">取消</span></p>
										</div>
									</aside>
								</li>
								<li>
									<div class="gj_clear">
										<p class="form_litit"><b>*</b>车辆描述：</p>
										<div class="fleft model_txt">
											<span>标准模板1</span>
											<span>标准模板2</span>
											<span>标准模板3</span>
											<span>标准模板4</span>
											<span>标准模板5</span>
											<span>标准模板6</span>
										</div>										
									</div>
									<div class="txt_made">
										<textarea name="textCon" rows="" cols="" id="textCon" placeholder="填写您的需求 比如需要什么样的车 什么价位的车什么样的车型..."></textarea>
										<p class=" count_num">限制字数为0-1000字</p>
									</div>
									<div class="mblack"> </div>
								</li>
							</ul>
							<p class="sub_btn submit"><input type="submit" value="提交"></p>
						</div>
						</form>
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
		<div class="pop_modelt">			
			<div class="model_cont">
				<h3>标准模板<span class="del_m"><img src="/static/img/del1.png" alt="" /></span></h3>
				<p class="descript_car">外观：漆面保养良好，车身结构无修复，无重大事故。 内饰：干净整洁。安全指示灯正常，气囊等被动安全项正常，车辆内电子器件使用良好， 车内静态动态设备完善。 驾驶：车辆点火、起步、提速、过弯、减速、制动均无问题，加速迅猛，动力输出平稳舒 适,无怠速抖动。 整体：整体车况一般。
					车体骨架结构无变形扭曲、无火烧泡水痕迹。车身有喷漆痕迹，整体漆面良好，排除大事故车辆。视野宽阔，练手最佳选择，空间宽敞明亮通风性好，适 合家庭代步车。使用模板</p>
				<span class="use_model">使用模板</span>
			</div>
		</div>
		<div class="mask1"></div>
	</body>

	<script src="/static/js/laydate.js"></script>
	<script src="/static/js/getBrand.js">	</script>
	<script src="/static/js/imgUp.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<script>
        function btn_car_brand(id){
            $("#car_brand_id").val(id);
            $.ajax({
                type: "POST",
                async: false,
                url: "http://39.106.67.47/new_api/user/newcar/getcar_brand_sys",
                data:{brand_id:id},
                success: function (data)
                {
                    var obj = JSON.parse(data);
                    var brand_sys = obj.body;
                    //先将元素对应清空

                    $('.chooseSeries').empty();
					var str = "";
                    for(var i = 0; i<brand_sys.length;i++){
                        var sys  = brand_sys[i];
                        str += '<a onclick=btn_car_sys(' + sys.sys_id + ") " + 'href="javascript:;">' + sys.sys + '</a>'
                    }
                    //将html动态拼接到对应的div上面
                    $('.chooseSeries').html(str);
                }
            });
        }

        function btn_car_sys(id){
            $("#car_sys_id").val(id);
            $.ajax({
                type: "GET",
                async: false,
                url: "http://39.106.67.47//new_api/User/Index/get_cartype?id=" + id,
                success: function (data)
                {
                    var obj = JSON.parse(data);
                    var car_type = obj.body[0].list;
                    //先将元素对应清空

                    $('.year_car').empty();

                    var str = "";
                    for(var i = 0; i<car_type.length;i++){
                        var type  = car_type[i];
                        str += '<a id=' + type.id  + ' href="javascript:;">' + type.name + '</a>'
                    }
                    //将html动态拼接到对应的div上面
                    $('.year_car').html(str);
                }
            });
		}

		$(function(){

			// $(".brand_letter a").wxlsChooseCarSeries;
			lay('#version').html('-v'+ laydate.v);
		    laydate.render({
		      elem: '#year' //指定元素
		    });
//			手机号隐藏中间4位
			$(".uphone").text($(".uphone").text().substring(0, 3) + "****" + $(".uphone").text().substring(7, 11));
			//加载公用头部和底部
//		    $(".header").load("templates/header.html");
//		    $(".footer").load("templates/footer.html");
//			选择品牌字母
			$(".choose_car_t a").click(function(){
				$(this).addClass("active").siblings().removeClass("active");				 
			})
			$(".upload_info").click(function(){
				
				if($(this).next(".position_r").is(":hidden")){					
					$(this).parents(".selected_ipt").addClass('active');
					
				}else{
					$(this).parents(".selected_ipt").removeClass('active');
					
				}
				
			})
//			选择品牌
			$(".choosecar_letter a").click(function(){
				$(this).addClass('active').siblings().removeClass('active');
                var letter = $(this).children().first().text();

                var top_o = $("#brand_letter_A").offset().top;
                var top_n = $("#"+"brand_letter_"+letter).offset().top;
                $("#brand_content").scrollTop(top_n - top_o);
			})
			//选择好颜色
			$(".slt_color").click(function(){
				$(this).addClass('active').siblings().removeClass('active');
				$(this).prevAll("#color").val($(this).find("span").attr("id"));
                $("#release_form").validate().element($(this).prevAll("#color"));
            })
			
			$("#sltCar_name").click(function(){
				$(".choose_cartab1").show();
				$("#bd01").addClass("active").siblings().removeClass("active")
				$(".letter_box p a").click(function(){
					var sel_brand=$(this).text()
					$("#brandName").text(sel_brand);
					$(".choose_cartab1").hide();
					$(".choose_cartab2").show();
					$("#bd02").addClass("active").siblings().removeClass("active");
					$(".choosecar_letter a:first").addClass("active").siblings().removeClass("active");
					$(".chooseSeries a").click(function(){
				   		var sel_series=$(this).text();
						$("#seriesName").text('>'+sel_series);
						$(".choose_cartab2").hide();
						$(".choose_cartab3").show();
						$("#bd03").addClass("active").siblings().removeClass("active");
						$(".year_car  a").click(function(){
					   		var carname=$(this).text();
							$("#carName").text('>'+carname);
							$(".choose_cartab3").hide();
							$(this).parents(".selected_ipt").removeClass('active');
							$("#sltCar_name").val(sel_brand+sel_series+carname);
							$("#car_type_id").val($(this).attr("id"));
                            $("#release_form").validate().element($("#sltCar_name"))
                            $(".bread_subnav").empty()
						})
					})
				})
			})
			
			$(".list_slt li").click(function(){
				var txt=$(this).text();
                $(this).parents(".selected_ipt").find(".upload_info").val(txt);
				$(this).parents(".selected_ipt").removeClass('active');
                $(this).parent().prev().val($(this).attr("id"));
                $("#release_form").validate().element($(this).parents(".selected_ipt").find(".upload_info"));
			})
//			车辆描述使用模板
			$(".model_txt span").click(function(){
				$(".pop_modelt").css("display","block");
				$(".mask1").css("display","block");
				$("html,body").css("overflow","hidden")
			})
			$(".mask,.del_m").click(function(){
				$(".pop_modelt").css("display","none");
				$(".mask1").css("display","none");
				$("html,body").css("overflow","auto");
			})
			$(".use_model").click(function(){
				var $txt=$(this).prev(".descript_car").text();
				$(".txt_made textarea").val($txt);
				$(".pop_modelt").css("display","none");
				$(".mask1").css("display","none");
				$("html,body").css("overflow","auto");
				
			})
			//		    输入内容不超过限制字数
			$("#textCon").on("input propertychange",function(){
				var that=$(this);
				$val=that.val();
				count="";
				if($val.length>1000){
					that.val($val.substring(0,1000));					
				}
				count=1000-that.val().length;
				$(".count_num").text('请注意，还可以输入'+count+'字');
				if(count<=0){
					$(".count_num").html('<span style="color: #F21B1B;">最多输入1000字</span>');
				}
			})

            $("#release_form").validate({
                rules: {
                    sltCar_name:"required",
                    price:"required",
                    car_mileage:"required",
                    car_cardtime:"required",
                    carbody:"required",
                    cardrive:"required",
                    fuel1:"required",
                    output1:"required",
                    gearbox1:"required",
                    subface1:"required",
                    blowdown1:"required",
					phone:"required",
                    contact:"required",
                    color:"required",
                    textCon:"required"


                },
                messages: {
                    sltCar_name:"请选择车型",
                    price: "价格不能为空",
                    car_mileage:"里程不能为空",
                    car_cardtime:"上牌时间不能为空",
                    carbody:"请选择车身",
                    fuel1:"请选择燃料",
                    cardrive:"请选择驱动",
                    output1:"请选择排量",
                    gearbox1:"请选择变速箱",
                    subface1:"请选择级别",
                    blowdown1:"请选择排放标准",
                    phone:"手机号码不能为空",
                    contact:"联系人不能为空",
                    color:"请选择车身颜色",
                    textCon:"请填写车辆状况"
                },
                success:function(label){
                    label.html("&nbsp;").addClass("checked");
                },
                // the errorPlacement has to take the table layout into account
                errorPlacement: function(error, element) {

                    if (element.is(":radio"))
                        error.appendTo(element.parent().next());
                    else if (element.is(":checkbox"))
                        error.appendTo(element.next());
                    else {
                        error.appendTo(element.parent().next());
                    }
                },
                // specifying a submitHandler prevents the default submit, good for the demo
                submitHandler: function() {
                    $("#release_form").ajaxSubmit({
                        clearForm:true,
                        success: function (data) {
                            var ret = JSON.parse(data);
                            if (ret.code == 200) {
                                layer.msg('店铺信息修改成功!', {icon: 1, time: 2000});

                            } else {
                                $("#result").text(ret.msg);
                            }
                        }
                    });
                    return false;
                },
                highlight: function(element, errorClass) {
                    $(element).parent().next().find("." + errorClass).removeClass("checked");
                }
            });
			
	})
</script>
</html>
