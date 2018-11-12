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
//获取url参数封装成对象
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
//阻止冒泡函数
function stopBubble(e){
    if(e && e.stopPropagation){
        e.stopPropagation();  //w3c
    }else{
        window.event.cancelBubble=true; //IE
    }
}
//	tab切换
	function set(name, cursel, n) {
        for (i = 1; i <= n; i++) {
            var menu = document.getElementById(name + i);
            var con = document.getElementById("con" + name + i);
//                  menu.className = i == cursel ? "hover" : "";
            con.style.display = i == cursel ? "block" : "none";
        }
    };

// 封装tab
	function tab(a,b,c){
	    $(a).on("click",c,function(){
	        $(this).addClass('active').siblings().removeClass('active');
	        $(b).eq($(this).index()).show().siblings().hide();
	    })
	}
$(function(){
    // 城市定位显示与消失-----新改4/13
    $(".city_current").hover(function () {
        $(".city").show();
        $(".city,.address").css({"border": "1px solid #ddd"});
    },
        function(){
        $(".city").hide();
        $(".city,.address").css("border","none")
    }
    );


})
var lengthLimit = 10;//点评内容字数最少限制
function ChangeInfo(obj) {
    var len = $(obj).val().length;
    if (len >= 500) {
        $(obj).val($(obj).val().substring(0, 500));       
    }
    if (len < lengthLimit) {
        $(".limit_num").html("您还差<em>" + (lengthLimit - len) + "</em>字");
    }
    else {
        if (len > 10) {
            $(".limit_num").html("<em>" + len + "</em>/500");
        }
    }
   } 





