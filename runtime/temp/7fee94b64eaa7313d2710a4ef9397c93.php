<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\Apache24\htdocs\g_car\public/../app/index\view\user\register.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\header.html";i:1541661603;s:58:"E:\Apache24\htdocs\g_car\app\index\view\public\footer.html";i:1540784647;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<style>

	</style>
	<script>
        var itime = 59; //定义一个变量，倒计时初始化，从59秒开始
        function getTime() {
            if (itime >= 0) {
                if (itime == 0) {
                    //倒计时变成0时，
                    //要清除计时器
                    clearTimeout(act);
                    //设置按钮为初始状态
                    $("#getCodeBtn").val('免费获取手机验证码').attr('disabled', false);
                    itime = 59;
                } else {
                    //延迟一秒中执行该函数。
                    var act = setTimeout('getTime()', 1000);
                    //把倒计时的秒显示到按钮中
                    $("#getCodeBtn").val('还剩' + itime + '秒');
                    itime = itime - 1;
                }
            }
        }
        $(function() {
            //定义一个函数,用于完成倒计时效果
            $("#getCodeBtn").click(function() {
                //获取输入的手机号码
                var telphone = $("#telphone").val();

                if(telphone) {
                    //ajax请求文件，调用短信发送的接口
                    $.ajax({
                        type: 'get',
                        url: '<?php echo url("code/get_code"); ?>',
                        data:{

                            user_phone:telphone,
                            is_exist:0

                        },
                        success: function(msg) {
                            //判断调用短信发送接口是否成功，
                            if (msg == 1) {
                                //调用接口已经成功
                                alert('发送失败');
                                $("#getCodeBtn").attr('disabled', true); //要禁用该按钮
                                //调用一个函数，完成倒计时效果。
                                getTime();
                            } else{
                                alert('短信验证码已经发送成功');
                                $("#getCodeBtn").attr('disabled', true);
                                getTime();
                            }
                        }
                    });
                } else{
                    alert('请输入手机号');
                }

            });
        });
	</script>
	<body>	
		<div class="full_wid">
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
			<div class="login_bg">
				<div class="login_tab">

					<form class="login_phone"  action="<?php echo url('user/register_ok'); ?>" method="post">
					<div class="login_sure">
						<ul class="login_type">
							<li class="active">快速注册</li>
							<b>|</b>
							<li>已注册可直接<a href="<?php echo url('user/car_login'); ?>" class="coloryel ft16">登录</a></li>
						</ul>
						<div class="login_phone">
							<div class="border"><img src="/static/img/phone.png" alt="" height="35"/><input type="text" id="telphone" name="user_phone" placeholder="请输入个人或商家手机号"/></div>
							<div class="border login_ver"><img src="/static/img/yzm.png" alt="" height="35"/><input type="text" name="code" placeholder="请输入验证码" /><span class="getcode"><input type="button" value="免费获取手机验证码" id="getCodeBtn" style="width: 120px;height: 40px;font-size:12px; padding-left:1px;color:#333; " /></span></div>
							<div class="border"><img src="/static/img/mm.png" alt="" height="35" /><input type="password" name="user_pwd" placeholder="请输入密码" id="inputId"/><img src="/static/img/buxians.png" width="27" height="19" class="showPwd"/></div>
							<p class="ptp15 agree"><input type="checkbox" name="" id="" value="" />我已经阅读并同意<a href="">《管家车易站条款》</a></p>
						
							<!--<p class="regist_btn free_regist">免费注册</p>-->
							<input class="regist_btn free_regist" type="submit" value="免费注册" />
						</div>
						
					</div>

				</form>
					
					<div class="login_other">
						<img src="/static/img/ewm.png" alt="" class="app_down" width="225"/>
						<p class="textCenter">扫描下载</p>
						<div><img src="/static/img/qq.png" alt="" />QQ登录</div>
						<div><img src="/static/img/wx.png" alt="" />微信登录</div>
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
		<!--<div class="fixedRight">-->
			<!--<ul class="right_sider">-->
				<!--<li><div class="gj_side_contnet iocn_s1"><p>pk</p></div>-->
					<!--<div class="gj_sidecon_desc "></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s2"><p>收藏</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s3"><p>浏览</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s4"><p>个人</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s5"><p>公众号</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s6"><p>APP下载</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!--<li><div class="gj_side_contnet iocn_s7"><p>客服</p></div>-->
				<!--<div class="gj_sidecon_desc"></div></li>-->
				<!--<li><div class="gj_side_contnet iocn_s8"><p>反馈</p></div>-->
				<!--<div class="gj_sidecon_desc"></div></li>-->
				<!--<li><div class="gj_side_contnet iocn_s9"><p>顶部</p></div>-->
					<!--<div class="gj_sidecon_desc"></div>-->
				<!--</li>-->
				<!---->
			<!--</ul>-->
		<!--</div>-->
	</body>
	<!--<script>		-->
		<!--$(function(){	-->
			<!--var input=document.getElementById("inputId");-->
			<!--$(".showPwd").click(function(){-->
				 <!--if($(".showPwd").attr("src")=='/static/img/buxians.png'){ -->
				 	<!--$(".showPwd").attr("src",'/static/img/xians.png');	 	-->
			       	<!--input.type='text';-->
			     <!--}else{-->
			     	<!--$(".showPwd").attr("src",'/static/img/buxians.png');-->
			      <!--input.type='password';-->
			     <!--}-->
			<!--})-->
		     <!---->
			  <!--//-->
		      <!--// $(".header").load("templates/header.html");-->
		      <!--// $(".footer").load("templates/footer.html")-->
		<!--})-->
<!--</script>-->
<!--<script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script>-->

</html>
