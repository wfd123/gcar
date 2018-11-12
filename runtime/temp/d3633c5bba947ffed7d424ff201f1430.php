<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\Apache24\htdocs\g_car\public/../app/index\view\user\person_busenter.html";i:1541656107;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1540869242;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/webuploader.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
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
								<li class="active"><a href="person_busenter.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_opportunity.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_collect.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_history.html"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_feedback.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_order.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">商家入驻</span></h1>
						<h2 class="step"></h2>
						<form  action="<?php echo url('user/business_entry'); ?>" method='post' enctype='multipart/form-data'>
						<div class="business_enter">
							<div>
								<h3>选择类型 <span>请选择您的入驻类型</span></h3>
								<div class="sel_type gj_clear">
									<!--<input type="text" readonly placeholder="新车商户" class="businesType"/>-->
									<select name="type" class="sel_type gj_clear businesType">
										<option value="1">新车商户</option>
										<option value="2">二手车商户</option>
										<option value="3">零首付商户</option>
										<option value="4">新能源商户</option>
									</select>
									<!--<div class="position_r">-->
										<!--<select name="type" class="sel_type gj_clear">-->
											<!--<option value="1">新车商户</option>-->
											<!--<option value="2">二手车商户</option>-->
											<!--<option value="3">零首付商户</option>-->
											<!--<option value="4">新能源商户</option>-->
										<!--</select>-->

									<!--</div>-->
								</div>								
							</div>
							<div>
								<h3>上传资料  </h3>
								<div class="bform_ipt">
									<div class="sel_type"><span>法人姓名</span><input type="text" name = "name" placeholder="请输入公司法人姓名" /></div>
									<div class="sel_type"><span>法人手机号</span><input type="text" name="phone" placeholder="请输入公司法人手机号"/></div>
									<div class="sel_type"><span>验证码</span><input type="text" placeholder="请输入验证码" class="verfity"/><span class="getcode">获取验证码</span></div>
									<div class="sel_type"><span>店铺名称</span><input type="text" name="shop_name" placeholder="请输入公司店铺名称"/></div>
									<div class="sel_type"><span>经营范围</span><input type="text" name="business_range" placeholder="请输入公司经营范围" class="slt_type" readonly/></div>
									<div class="sel_type"><span>公司地址</span><input type="text" name="address" placeholder="请输入公司经营地址"/></div>
								
								</div>
							</div>
							<div class="img_l gj_clear">
								<div class="fleft">
									<h3>上传营业执照  </h3>
									<div class="imgCont">

										<div id="up_progress_a" class="up-progress" style="display: none;">100%</div>
										<div id="prev_img_a" style="display: none;"><img style="width:274px;height:195px;" src="/static/img/967.jpg"></img></div>
										<div id="uploadForm">
											<div id="file_inp"></div>
								            <div class="upLoad_pic">
									            <img class="img_up"  src="/static/img/addlo.png" >
									        </div>
										</div>
									</div>
								</div>
								<div class="fleft">
									<h3>店铺logo  </h3>
									<div class="imgCont">

										<div id="up_progress_b" class="up-progress" style="display: none;">100%</div>
										<div id="prev_img_b" style="display: none;"><img style="width:274px;height:195px;" src="/static/img/967.jpg"></img></div>
										<div id="uploadForm1">
											<div id="file_inp1"></div>
											<div class="upLoad_pic">
												<img class="img_up"  src="/static/img/addlo.png" >
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="submit sub_btn"><input type="submit" value="提交" /></div>
						</div>
						</form>
					</div>

				</div>
				
			</div>
		</div>	
		<div class="footer"></div>
		
		<div class="mask1"></div>

	</body>

	<script src="/static/js/webuploader.min.js"></script>
	<script>
		$(function(){
			$(".businesType").click(function(){
				$(this).parents('.sel_type').addClass('active');				
			})
			$(".selList li").click(function(){
					var result=$(this).text();
					$(".businesType").val(result);
					$(this).parents('.sel_type').removeClass('active');
				})
   			// $(".header").load("templates/header.html");

            var
                // 优化retina, 在retina下这个值是2
                ratio = window.devicePixelRatio || 1,

                // 缩略图大小
                thumbnailWidth = 100 * ratio,
                thumbnailHeight = 100 * ratio,

                // Web Uploader实例
                uploader,
				uploader1;

            // 初始化Web Uploader
            uploader = WebUploader.create({
                formData: {
                    img_type: 'door_photo'
                },
                // 自动上传。
                auto: true,

                // swf文件路径
                swf: '/static/js/Uploader.swf',

                // 文件接收服务端。
                server: 'upload_image',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#file_inp',

                // 只允许选择文件，可选。
                accept: {
                    title: 'Images',
                    extensions: 'jpg,jpeg,bmp,png',
                    mimeTypes: 'image/jpg,image/jpeg,image/png'
                }
            });

            // 当有文件添加进来的时候
            uploader.on('fileQueued', function( file ) {
                $("#up_progress_a").css("display", 'block');
                $("#prev_img_a").css("display", 'none');
                $("#uploadForm").css("display", 'none');

                $img = $("#prev_img_a").find('img');

                // 创建缩略图
                uploader.makeThumb( file, function( error, src ) {
                    if ( error ) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $img.attr( 'src', src );
                }, thumbnailWidth, thumbnailHeight );

            });

            // 文件上传过程中创建进度条实时显示。
            uploader.on( 'uploadProgress', function( file, percentage ) {
                $("#up_progress_a").text(percentage * 100 + '%');
                if (percentage * 100 == 100){

                }
            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on( 'uploadSuccess', function( file ) {
                $img = $("#prev_img_a").find('img');
                // 创建缩略图
                uploader.makeThumb( file, function( error, src ) {
                    if ( error ) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $("#up_progress_a").css("display", 'none');
                    $("#prev_img_a").css("display", 'block');
                    $("#uploadForm").css("display", 'none');
                    $img.attr( 'src', src );
                }, thumbnailWidth, thumbnailHeight );
            });

            // 文件上传失败，现实上传出错。
            uploader.on( 'uploadError', function( file ) {
                $("#up_progress_a").text("上传失败");
            });


            uploader1 = WebUploader.create({

                // 自动上传。
                auto: true,

                // swf文件路径
                swf: '/static/js/Uploader.swf',

                // 文件接收服务端。
                server: 'upload_image',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#file_inp1',

                // 只允许选择文件，可选。
                accept: {
                    title: 'Images',
                    extensions: 'jpg,jpeg,bmp,png',
                    mimeTypes: 'image/jpg,image/jpeg,image/png'
                }
            });

            // 当有文件添加进来的时候
            uploader1.on('fileQueued', function( file ) {
                $("#up_progress_b").css("display", 'block');
                $("#prev_img_b").css("display", 'none');
                $("#uploadForm1").css("display", 'none');

                $img = $("#prev_img_b").find('img');

                // 创建缩略图
                uploader.makeThumb( file, function( error, src ) {
                    if ( error ) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $img.attr( 'src', src );
                }, thumbnailWidth, thumbnailHeight );

            });

            // 文件上传过程中创建进度条实时显示。
            uploader1.on( 'uploadProgress', function( file, percentage ) {
                $("#up_progress_b").text(percentage * 100 + '%');
            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader1.on( 'uploadSuccess', function( file ) {
                $img = $("#prev_img_a").find('img');
                // 创建缩略图
                uploader.makeThumb( file, function( error, src ) {
                    if ( error ) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $("#up_progress_b").css("display", 'none');
                    $("#prev_img_b").css("display", 'block');
                    $("#uploadForm1").css("display", 'none');
                    $img.attr( 'src', src );
                }, thumbnailWidth, thumbnailHeight );
            });

            // 文件上传失败，现实上传出错。
            uploader1.on( 'uploadError', function( file ) {
                $("#up_progress_b").text("上传失败");
            });
	})
</script>
</html>
