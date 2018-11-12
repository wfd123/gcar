$(function(){
    // $(".nav li").on("click","a",function(){
    //     console.log("bjhb")
    // })
    $(".nav ul li a").each(function(){
        var len=String(window.localtion).lastIndexOf("?");
        var url1=String(window.localtion).substring(0,len);
        if($($(this))[0].href==url1){
            $('.nav ul li').css('background',"#fa8e3f");
            $(this).parent().css('background',"orange");
        }


    })
    var url='http://www.gj2car.com/';
    // 品牌tab显示与消失
    $("#carhover").hover(function () {
        $("#allcar").show();
    });
    $("#allcar").hover(function () {}, function () {
        $(this).hide();
    });
    // 城市定位显示与消失-----新改4/13
    $(".city_current").hover(function () {
        $(".city").show();
        $(".city,.address").css({"border": "1px solid #ddd"});
    },function(){
    	 $(".city").hide();
        $(".city,.address").css("border","none")
    });
    // 新闻中心子菜单栏显示与消失-----新改4/13
    $(".nav li").hover(function () {
       $(this).find(".subnav").show();
    },function(){
        $(this).find(".subnav").hide();
    	
    });
//  $(".subnav").hover(function () {}, function () {
//      $(this).css("display","none");
//  });

//          自动获取城市定位
    $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(_result) {
        if (remote_ip_info.ret == '1') {
            $(".address").html(remote_ip_info.city);
        } else {
            console.log('没有找到匹配的IP地址信息！');
        }
    });

    //        获取首页品牌接口数据
    $.ajax({
        type:'GET',
        url: url+'Newpc/index/get_brand',
        dataType : "json",
        success:function(data){
            // console.log(data.body);
            $.each(data.body,function(i){
                $(".brand-more").append("<dl class='zimu'><dt>"+data.body[i].initial+"</dt>" +
                    "<dd class='firstname'></dd></dl>");
                $.each(data.body[i].list,function(n){
                   
                    $(".firstname").eq(i).append('<a href="'+data.body[i].list[n].id+'" title="二手'+data.body[i].list[n].name+'">'+data.body[i].list[n].name+'</a>');
                })

            })
        },
        error:function(){
            console.log("no message");
        }
    });
    //        获取首页地区接口数据
    $.ajax({
        type:'POST',
        url: url+'Newpc/Index/city',
        dataType : "json",
        success:function(data){
           // console.log(data.body)
            $(".city ol").append("<li class='around'><a href='' class='pre'>周边</a></li>");
            $(".city ol").append("<li class='hot'><a href='' class='pre'>热门</a></li>");
            $.each(data.body.around,function(i){
                // console.log(i)
                $(".around").append("<a href="+data.body.around[i].pin+">"+data.body.around[i].name+"</a>");
            })
            $.each(data.body.hot,function(j){
                $(".hot").append("<a href="+data.body.hot[j].pin+">"+data.body.hot[j].name+"</a>");
            })
            $.each(data.body.all,function(i){
                $(".city ol").append("<li><a href='' class='letter'>"+data.body.all[i].initial+"</a></li>");
                $.each(data.body.all[i].list,function(j){
                    $(".letter").eq(i).after("<a href="+data.body.all[i].list[j].pin+">"+data.body.all[i].list[j].name+"</a>");
                })
            })
        },
        error:function(){
            console.log("没有获取到数据");
        }
    });
    //        获取首页banner接口数据
    $.ajax({
        type:'POST',
        url: url+'Newpc/Index/banner',
        dataType : "json",
        success: function(data){
            // console.log(data.body)
            // var $bd=$("<div class='bd'><ul></ul></div>");
            // $(".nav").after($bd);
            $(data.body).each(function(i,o){
                $(o.brand).each(function(index,obj){$(".brand_div").append("<span class='pinp'><a href="+o.brand[index].id+" title='二手"+o.brand[index].name+"'><img src="+o.brand[index].img_url+" alt='二手"+o.brand[index].name+"'></a><a href="+o.brand[index].id+" title='二手"+o.brand[index].name+"'>"+o.brand[index].name+"</a><span>");})
                $(o.price_range).each(function(index,obj){$(".price_div").append("<a href=''>"+o.price_range[index].name+"</a>");})
                $(o.subface).each(function(index,obj){$(".modal_div").append("<span class='modal_s'><a href='' title='二手"+obj.name+"'><img src="+obj.img_url+" alt='二手"+obj.name+"'></a><a href='' title='二手"+obj.name+"'>"+obj.name+"</a></span>");})
                $(o.banner).each(function(index,obj){
                    $(".swiper-wrapper").append(" <div class='swiper-slide'><a href=''> <img src="+obj.img_url+" alt=''/> </a></div>");
                    var swiper = new Swiper('.swiper-container', {
                        spaceBetween: 40,
                        centeredSlides: true,
                        autoplay: {
                            delay: 15500,
                            disableOnInteraction: false,

                        },
                        loop: true,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                })
            })
        },
        error:function(){
            console.log("没有获取到数据");
        }
    });
    //       获取首页车型接口数据
     $.ajax({
         type:'POST',
         url: url+'Newpc/Index/incar',
         dataType : "json",
         success:function(data){
             // console.log(data.body);
             $.each(data.body,function(i){
                 $(".floor").append("<div class='che_a'>" +
                     "<div class="+data.body[i].class+"><h2><a href='http://www.gj2car.com/zz/shop/s"+(i+1)+"' title="+data.body[i].name+">"+data.body[i].name+"</a></h2></div>" +
                     " <div class='che_left_a fl'><a href='http://www.gj2car.com/zz/shop/s"+(i+1)+"' title="+data.body[i].name+"><img class='fl' src="+data.body[i].img+" alt="+data.body[i].name+"/></a></div>" +
                     " <div class='che_right fl'><ul></ul></div>" +
                     "</div> ");
                 $.each(data.body[i].list,function(j){
                     $(".che_right ul").eq(i).append("<li><a href=detail.html?id="+data.body[i].list[j].pu_id+"><span>" +
                         "<img class='lazy-load' data-original="+data.body[i].list[j].img_url+" alt="+data.body[i].list[j].name+"></span>" +
                         "<h3>"+data.body[i].list[j].name+"</h3><p2>"+data.body[i].list[j].price+"</p2><p3>新车含税 "+data.body[i].list[j].news_price+"" +
                         "</p3><p4>"+data.body[i].list[j].car_cardtime+"上牌</p4> <p5>"+data.body[i].list[j].car_mileage+"万公里</p5> </a></li>");

                 })

             })

         },

         error:function(){
             console.log("没有获取到数据");
         } ,
         complete:function(){
             $("img").lazyload({
                 placeholder:"../images/loading.gif",
                 effect : "fadeIn", //渐现，show(直接显示),fadeIn(淡入),slideDown(下拉)
                 failure_limit:2 //加载2张可见区域外的图片,lazyload默认在找到第一张不在可见区域里的图片时则不再继续加载,但当HTML容器混乱的时候可能出现可见区域内图片并没加载出来的情况
             });
         }

     });

    // 新闻详情页面
    var id=getUrlParamValue('id');
    $.ajax({
        type:'POST',
        url: url+'/Newpc/News/detail/id/'+id,
        dataType : "json",
        success:function(data){
            $(".title_news").html(  "<h2 class='fz24 txt33'>"+
                data.body.title+"</h2> <p class='fz14 txt67 mat20'>时间："+
                data.body.time+"&nbsp; 来源：管家车易站</p>" +
                "<div class='deatils mat20 fz14'>"+data.body.content+"</div>" )
        },
        error:function(){
            console.log("没有获取到数据");
        }
    });
    var browser={
        versions:function(){
            var u = navigator.userAgent, app = navigator.appVersion;
            return {//移动终端浏览器版本信息
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1, //是否web应该程序，没有头部与底部
                weixin: u.indexOf('MicroMessenger') > -1, //是否微信
                qq: u.match(/\sQQ/i) == " qq" //是否QQ
            };
        }(),
        language:(navigator.browserLanguage || navigator.language).toLowerCase()
    }
    if(browser.versions.mobile || browser.versions.ios || browser.versions.android ||
        browser.versions.iPhone || browser.versions.iPad){
        window.location.href = "http://m.gj2car.com";
    };
    // 抽取出公共底部
    $.ajax({
        type:"get",
        url:"template/footer.html",
        dataType:"html",
        success:function(data){
            $(".footer").append(data)
        }
    })
    // $(".")



})
// 将js对象转成url jquery实现
var parseParam=function(paramObj, key){
    var paramStr="";
    if(paramObj instanceof String||paramObj instanceof Number||paramObj instanceof Boolean){
        paramStr+="&"+key+"="+encodeURIComponent(paramObj);
    }else{
        $.each(paramObj,function(i){
            var k=key==null?i:key+(paramObj instanceof Array?"["+i+"]":"."+i);
            paramStr+='&'+parseParam(this, k);
        });
    }
    return paramStr.substr(1);
};
//获取url参数封装成对象
var urlEncode = function (paramObj, key, encode) {
    if(paramObj==null) return '';
    var paramStr = '';
    var t = typeof (paramObj);
    if (t == 'string' || t == 'number' || t == 'boolean') {
        paramStr += '&' + key + '=' + ((encode==null||encode) ? encodeURIComponent(paramObj) : paramObj);
    } else {
        for (var i in paramObj) {
            var k = key == null ? i : key + (paramObj instanceof Array ? '[' + i + ']' : '.' + i);
            paramStr += urlEncode(paramObj[i], k, encode);
        }
    }
    return paramStr;
};
//根据参数名称获取url参数
function getUrlParamValue(name) {

    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");

    var r = window.location.search.substr(1).match(reg);

    if (r != null) return decodeURIComponent(r[2]);

    return null;
}
// 获取url参数封装成对象
function GetRequest() {
    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        strs = str.split("&");
        for(var i = 0; i < strs.length; i ++) {
            theRequest[strs[i].split("=")[0]]=decodeURIComponent((strs[i].split("=")[1]));
        }
    }
    return theRequest;
}
