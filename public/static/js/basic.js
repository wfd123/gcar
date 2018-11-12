var numReg = /^[1-9]\d*$/,//正整数正则表达式
    telReg = /^1[3|4|5|7|8][0-9]{9}$/, //手机号正则表达式
    qqReg = /^[1-9][0-9]{4,14}$/,//qq验证
    priceReg=/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/,
    emailReg= /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;//邮箱验证
/***************select字体颜色修改******************************/

var base = function(){
    var _page = 1,_pageSize = 3;
    return{
        asd:function(){
            window.sessionStorage.setItem("username", username);
            var username= window.sessionStorage.getItem("username")
           var  data = { user_id: 5};

            //var load = layer.load();
            $.ajax({
                url: server.fily,
                data: data,
                type: "post",
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    $(".name").html(result.body[0].name);
                    $("#aa").append('<h3 class="name">'+result.body[0].name+'</h3>');
                    //console.log(result.body)
                    window.sessionStorage.setItem("username", result.body[0].name);
                    var username= window.sessionStorage.getItem("username")
                    for(var i=0;i<result.body.length;i++){
                        console.log(result.body[i].name)

                    }
                    if(result.body[0].name){

                    }else if(!result.body[0].name){
                        $(".a").hide();
                        $(".b").show()
                    }
                },
                error: function (e) {

                }
            });
        },

    }
};
//ajax函数封装
function ajaxEve(type,url,data,sfun,efun){
    $.ajax({
        url:url,
        type:type,
        contentType:"application/x-www-form-urlencoded",
        data:data,
        async:false,
        dataType:'json',
        success:function(result) {
            sfun(result);
            //debugger;
           /* if(result.status==0){
                sfun(result);
            }else if(result.status==1){
                layer.msg('请先登录');
                //setTimeout("top.location.href=host+'admin/index/indexs.html'",800);
                return;
            }*/
        },
        error:function(result){
            //console.log("AJAX ERROR",result);
        }
    })
}
//图片上传本地预览功能
function setImagePreview(objc) {
    var docObj=document.getElementById(objc.file);
    var imgObjPreview=document.getElementById(objc.pic);
    if(docObj.files &&docObj.files[0]){
        imgObjPreview.style.display = 'block';
        imgObjPreview.style.width = '100px';
        imgObjPreview.style.height = "100px";
        imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        return true;
    } else {
        return false;
    }
}
/*使用示例：
    * $('input[type=file]').on('change',function(){
    * if($(this).val()==''){
     $(this).parent().find('img').attr('src','');
     $(this).parent().find('img').css('display','none');
     }else{
     $(this).parent().find('img').css('display','block');
     }
     var opts = {
     file :$(this).attr("id"),
     pic : $(this).parents('.form-group').find('img').attr('id')
     };
     setImagePreview(opts);
     })
* */
/*分页*/
function pageTab(currentPage,totalPages,dataFun){
    var options = {
        bootstrapMajorVersion : 3, // bootstrap.css文件版本
        currentPage : currentPage, // 当前页数
        totalPages : totalPages, // 总页数
        itemTexts : function (type, page, current) {
            switch (type) {
                case "first":
                    return "首页";
                case "prev":
                    return "上一页";
                case "next":
                    return "下一页";
                case "last":
                    return "末页";
                case "page":
                    return page;
            }
        },
        // 点击事件，用于通过ajax来刷新整个list列表
        onPageClicked : function (event, originalEvent, type, page) {
            // 按分页从后台获取第 + page + 页的具体数据
            dataFun(page);
        }
    };
    $('#page').bootstrapPaginator(options);
}
/*url地址参数获取*/
function getParam(name) {
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r!=null) return unescape(r[2]); return null; //返回参数值
 }
//获取当前时间
function nowDate() {
    var myDate = new Date();
    var myYear = myDate.getFullYear();
    var month = myDate.getMonth() + 1;
    var day = myDate.getDate();
    if ((myDate.getMonth() + 1) < 10) {
        month = '0' + (myDate.getMonth() + 1);
    }
    if ((myDate.getDate() + 1) < 10) {
        day = '0' + (myDate.getDate() + 1);
    }
    var nowTime = myYear + '-' + month + '-' + day;
    return nowTime;
}
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
}
//value replace(/\s/g,'')
//function valp(dom){
  //  return dom.val().replace(/\s/g,'')||dom.html().replace(/\s/g,'');
//}
function area(province,city,country){
    //执行jquery的load方法，将Area.xml文件中的所有信息加载至本页面。加载完成后，触发相应的方法
    $("#province").load("js/Area.xml", function (msg) {
        areaMessge = $(msg);
        //首先获取所有的省,将获得的信息添加至省级的下拉列表中。
        areaMessge.find("province").each(function (index, element) {
            $("#province").append($("<option></option>").wrapInner($(this).attr("name")));
        });
        //修改省份默认值
        var options = $("#province").find("option");
        for (var i = 0; i < options.length; i++) {
            if ($(options[i]).text() == province) {
                $(options[i]).attr("selected", "selected");
            }
        }
        //触发当前省级下拉列表的change方法
        $("#province").trigger("change");
    });
    //给当前的省级下拉列表绑定change方法，当选择其他省级时，会触发方法。当前方法会根据选择的省份确定下一级的市级的下拉列表中的元素
    $("#province").change(function () {
        $("#city").empty();
        var province = $(this).val();
        areaMessge.find("province[name='" + province + "'] city").each(function (index, element) {
            $("#city").append($("<option></option>").append($(this).attr("name")));
        });
        $("#city").trigger("change");
        //修改市默认值
        var options = $("#city").find("option");
        for (var i = 0; i < options.length; i++) {
            if ($(options[i]).text() == city) {
                $(options[i]).attr("selected", "selected");
            }
        }
    });
    $("#city").change(function () {
        $("#country").empty();
        var province = $("#province").val();
        var city = $(this).val();
        areaMessge.find("province[name='" + province + "'] city[name='" + city + "'] country").each(function (index, element) {
            $("#country").append($("<option></option>").append($(this).attr("name")));
        });
        //修改县默认值
        var options = $("#country").find("option");
        for (var i = 0; i < options.length; i++) {
            if ($(options[i]).text() == country) {
                $(options[i]).attr("selected", "selected");
            }
        }
    });
}