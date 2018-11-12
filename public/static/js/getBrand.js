(function( $ ){
    $.fn.wxlsChooseCarSeries =function(options){
        //默认设置
        var settings={
            //激发对象
            this$:null,
            //本页面对象
            thisPage:null,
            //图片缓存版本号
            imgV:'?v=001',
            //点击选择车型的当前id值
            thisCarId:'',
            //点击选择品牌的当前名字
            thisBrandName:'',
            //点击车系的当前名字
            thisSeriesName:'',
            //当前选择车型名字
            thisTypeName:'',
            init:function(clickElement){
                settings.this$=clickElement;
                //拓展替换本插件的事件
                $.extend(true,settings,options);
                 //获取外部样式
                settings.getOutFile();
                //创建弹框对象
                settings.createOrGetHtml();
            },
            //获取外部样式
            getOutFile:function(){
            	//引入所需的css
            	require([''],function(){
            		
            	});
            },
            ajaxFunction:function(keyId,savecallback){
            	$("#seriesMask",settings.thisPage).show();
            	$.ajax({
            		 type: "post",
            		 url: window.$context.$config.domain+"api/app/queryCarType.do",
            		 data:{
            		 	 keyId:keyId
            		 },
            		 dataType: "json",
            		 success:function(response){
            		 	if ($.isFunction(savecallback)) {
		                    savecallback.call(this, response);
		                    $("#seriesMask",settings.thisPage).hide();
		                }
            		 }
            	});
            },
            /* 缓存品牌信息*/
		    getBrandsList:function (callback) {
		        if (window.localStorage) {
		            var cacheBrands = window.localStorage.getItem("wxlscarselect-brands");
		            var cacheTime = window.localStorage["wxlscarselect-brands-timestamp"];
		            //缓存2小时
		            if (cacheBrands && cacheTime >= (new Date()).getTime() - 2 * 60 * 60 * 1000) {
		                callback(JSON.parse(cacheBrands));
		                return;
		            }
		        }
		        //自动加载品牌数据
		        settings.ajaxFunction(0, function (data) {
		            if (typeof data !== "undefined" && data.result==1) {
		                if (typeof  callback === "function") {
		                    if (window.localStorage) {
		                        window.localStorage["wxlscarselect-brands"] = JSON.stringify(data.listRow);
		                        window.localStorage["wxlscarselect-brands-timestamp"] = (new Date()).getTime();
		                    }
		                    callback(data.listRow);
		                }
		            }
		        });
		    },
            //创建弹框对象
            createOrGetHtml:function(createType){
	                    if($('body .dockElem>div[menuid]:visible>div:first #carSelect').length<=0){
		                    settings.thisPopo = $("<div id='carSelect' class='carselect-pop'>"
					            + "  <div class='carselect-close' ></div>"
					            + "      <div class='tab-nav'>"
					            + "          <div class='pop-content'>"
					            + "              <div class='tab-content active'>"
					            + "                  <ul class='carsel-progress clearfix'>"
					            + "                      <li id='cx1' class='head_div2'><span id='cxspan1' class='active'>1</span>选择品牌</li>"
					            + "                      <li id='cx2' class='head_div3'><span id='cxspan2'>2</span>选择车系</li>"
					            + "                      <li id='cx3' class='head_div5'><span id='cxspan3'>3</span>选择车型</li>"
					            + "                  </ul>"
					            + "                  <div id='car-brand-selector'>"
					            + settings.getAtoZhtml()
					            + "                     <div id='brands_content'>"
					            + "                         <ul class='clearfix carsel-list'>"
					            + "                         </ul>"
					            + "                     </div>"
					            + "                  </div>"
					            + "                  <div id='content_detail' style='display: none; '>"
					            + "                      <div id='selection' class='clearfix carsel-current'>"
					            + "                          <div id='div4' class='selected-title'>已选车型</div>"
					            + "                          </div>"
					            + "                      <div id='result'>"
					            + "                          <ul class='carsel-list clearfix'>"
					            + "                          </ul>"
					            + "                      </div>"
					            + "                  </div>"
					            + "                  <div id='selectedResult' style='display: none'>"
					            + "                      <div class='succeed' id='selectedResult-succeed'><span class='icon'></span>车型选择成功！</div>"
					            + "                          <div id='CarOver'>"
					            + "                          </div>"
					            + "                  </div>"
					            + "           </div>"
					            + "      </div>"
					            + "          <div style='clear:both;'></div>"
					            + "      </div>"
					            + "      <div id='seriesMask'><div class='loading-indicator'></div></div>"
					            + "</div>");
		                    $('body .dockElem>div[menuid]:visible>div:first').append(settings.thisPopo);
		                }else{
		                    settings.thisPopo=$('body .dockElem>div[menuid]:visible>div:first #carSelect');
		                }
                //调用layui弹层
                layer.open({
				  type: 1,
				  title:"车系选择",
				  content: settings.thisPopo, //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
				  area: ['800px','500px'],
				  success: function(layero,index){
				  		settings.thisPage = layero;
				  		layero.attr("data-index",index);
				  		$(".layui-layer-title",settings.thisPage).addClass("carSeriesTitle");
					    settings.getBrandsList(function (brands) {
					        var html = settings.getBrandsContentHtml(brands);
					        $("#car-brand-selector .carsel-list",settings.thisPage).empty();
					        $("#car-brand-selector .carsel-list",settings.thisPage).append(html);
					        //隐藏没有品牌的首字母
					        var aToz = settings.getLetterFromAToZ();
					        $(aToz).each(function (i, item) {
					          if (!settings.inArray(brands, {"Initial": item}, ["Initial"])) {
					            $(".CarZiMu2:contains(" + item + ")",settings.thisPage).hide();
					          }
					        });
							//默认选中A
			                $(".CarZiMu2",settings.thisPage).removeClass('zimuActive');
					        $(".CarZiMu2:first",settings.thisPage).addClass('zimuActive');
					        $(".CarBrand2:not([data-brand^='A'])",settings.thisPage).hide();
					        $(".CarBrand2[data-brand^='A']",settings.thisPage).show();
					      });
		                //事件绑定
		                settings.uiEventBind();
					 },
					 cancel: function(index,layero){ 
					 	$(settings.this$,settings.thisPage).val('');
					 	$(settings.this$,settings.thisPage).val(settings.thisBrandName+' '+settings.thisSeriesName+' '+settings.thisTypeName)
						$(settings.this$,settings.thisPage).attr("data-carid",settings.thisCarId);
						layer.close(index);
					}   
                });
            },
            inArray: function (list, o, propertys) {
                for (var i = 0; i < list.length; i++) {
                    var k = 0;
                    for (var j = 0; j < propertys.length; j++) {
                        if (list[i][propertys[j]] == o[propertys[j]]) {
                            k++;
                        }
                    }
                    if (k === j) {
                        return true;
                    }
                }
                return false;
            },
             /*生成从A到Z的数组*/
	        getLetterFromAToZ:function () {
	            var aToz = [];
	            for (var i = "A".charCodeAt(); i <= "Z".charCodeAt(); i++) {
	                aToz.push(String.fromCharCode(i));
	            }
	            return aToz;
	        },
	        /*生成A-Z索引的html*/
		    getAtoZhtml:function () {
		        var htmlaToz = [];
		        htmlaToz.push("<ul class='carnav-letter clearfix' id='div2'>");
		        //加入A-Z索引
		        var atoz = settings.getLetterFromAToZ();
		        $(atoz).each(function () {
		            htmlaToz.push(" <li class='CarZiMu2'>" + $(this)[0] + "</li>");
		        });
		        htmlaToz.push("</ul>");
		        return htmlaToz.join("");
		    },
		    //获得品牌数据
		    getBrandsContentHtml:function (brands) {
    			var html = [];
		        for (var i = 0; i < brands.length; i++) {
		            html.push("<li class='CarBrand2' data-brand='" + brands[i].Initial + "' data-brandId='" + brands[i].ID + "'>" +
		                "<img class='img' src='"+ brands[i].logo + settings.imgV + "'><span>" + brands[i].name + "</span> </li>")
		        }
		        return html.join("");
		    },
		    //往已选车型里面添加数据
	        appendSelection:function ($ele, value, index, id) {
	            $ele.append("<div class='CarHistoryTitlediv'><div class='CarHistoryTitle'>"
	                + value + "</div><div class='CarHistoryTitleDel wxls-iconfont icon-guanbi' data-id=" + id + " data-index=" + index + "></div> </div>");
	        },
		    //点击品牌选择车系
		    bindBrandClick:function(){
		        $("#brands_content",settings.thisPage).unbind("click");
		        //设置点击品牌显示车系
		        $("#brands_content",settings.thisPage).one("click", "li.CarBrand2", function () {
		            var brandName = $(this).text();
		            var brandId = $(this).attr("data-brandid");
		            settings.getSeriesByBrandId(brandId,settings.uiInitSeriesByBrandId);
		            //往已选车型里面添加车系数据
		            settings.appendSelection($("#selection",settings.thisPage), brandName, 1, brandId);
		            //设置选择的品牌ID及名称
		            settings.thisCarId = brandId;
		            settings.thisBrandName = brandName;
		        });
		    },
		    //根据品牌选择车系
		    getSeriesByBrandId:function(brandId,uiUpdateCallback){
	            $("#result .carsel-list",settings.thisPage).empty();
                if (typeof  uiUpdateCallback === "function") {
                    uiUpdateCallback(brandId);
                }
		    },
		    //更新品牌及车系
		    uiInitSeriesByBrandId:function(brandId){
		    	$("#car-brand-selector",settings.thisPage).hide();
		    	//品牌请求子品牌数据
		    	settings.ajaxFunction(brandId, function (data) {
		            if (typeof data !== "undefined" && data.result==1) {
			            for (var detailIndex = 0; detailIndex < data.listRow.length; detailIndex++) {
				       	 	$("#result .carsel-list",settings.thisPage).append("<li class='CarBrandTitle' data-childbrandid="+data.listRow[detailIndex].ID+">" + data.listRow[detailIndex].name + "</li>");
			           		var childBrandId = data.listRow[detailIndex].ID;
			           		//子品牌请求车系数据
			           		settings.ajaxFunction(childBrandId,function(seriesData){
			           			if (typeof seriesData !== "undefined" && seriesData.result==1) {
			           				for(var i=0;i<seriesData.listRow.length;i++){
			           					//循环子品牌往后面添加车系
			           					$.each($(".CarBrandTitle",settings.thisPage),function(j,n){
			           						if(seriesData.listRow[i].parentid==$(n).data("childbrandid")){
				           						$(n).after("<li class='CarVecl1 series' data-seriesid=" + seriesData.listRow[i].ID + " data-parentBrandId=" + $(n).data("childbrandid")+ ">" + seriesData.listRow[i].fullname + "</li>");
				           					}
			           					});
			           					
			           				}
			           			}
			           		});
			            }
		            }
		        });
		
		        $("#content_detail",settings.thisPage).show();
		        $("span#cxspan2",settings.thisPage).addClass("active");
		        $("li#cx2",settings.thisPage).removeClass().addClass("head_div4");
		        $("li#cx3",settings.thisPage).removeClass().addClass("head_div3");
		    },
		    //点击车系选择车型
		    bindSeriesClick:function(){
		        $("#content_detail",settings.thisPage).unbind("click");
		        //设置车系按钮点击动作
		        $("#content_detail",settings.thisPage).one("click", ".CarVecl1.series", function () {
		            var seriesId = $(this).attr("data-seriesid");
		            var seriesName = $(this).text();
		            settings.getTypeBySeriesId(seriesId, settings.uiInitTypeBySeriesId);
		            settings.appendSelection($("#selection",settings.thisPage), seriesName, 2, seriesId);
		            //设置选择的车系及名称
		            settings.thisCarId = seriesId;
		            settings.thisSeriesName = seriesName;
		        });
		    },
		    //根据车系选择车型
		    getTypeBySeriesId:function(seriesId,uiUpdateCallback){
		    	 $("#result .carsel-list",settings.thisPage).empty();
                if (typeof  uiUpdateCallback === "function") {
                    uiUpdateCallback(seriesId);
                }
		    },
		    //更新车型
		    uiInitTypeBySeriesId:function(seriesId){
		    	$("#result .carsel-list",settings.thisPage).empty();
		    	//车系请求车型数据
		    	settings.ajaxFunction(seriesId,function(typeData){
		    		for (var i = 0; i < typeData.listRow.length; i++) {
			            $("#result .carsel-list",settings.thisPage).append("<li class='CarVecl1 carType' data-typeid=" + typeData.listRow[i].ID + " >" + typeData.listRow[i].name + "</li>");
		    		}
		    		if(typeData.listRow.length==0){
		            	$("#result .carsel-list",settings.thisPage).append("<div class='noType'>暂无车型数据！</div>");
		            }
		    	});
		       
		        $("span#cxspan3",settings.thisPage).addClass("active");
		        $("li#cx3",settings.thisPage).removeClass().addClass("head_div4");
		    },
		    //点击车型关闭弹框
		    bindTypeClick:function(){
		    	//设置车型按钮点击动作
		        $("#content_detail",settings.thisPage).one("click", ".CarVecl1.carType", function () {
		            var typeId = $(this).attr("data-typeid");
		            var typeName = $(this).text();
		           	//设置选择的车型及名称
	           	 	settings.thisCarId=typeId;
	           	 	settings.thisTypeName=typeName;
	                if($("#selection .CarHistoryTitlediv",settings.thisPage).length!=0){
	                	for(var i=0;i<$("#selection .CarHistoryTitlediv",settings.thisPage).length;i++){
	                		settings.thisBrandName=$($("#selection .CarHistoryTitlediv",settings.thisPage)[0]).find(".CarHistoryTitle").text();
	                		settings.thisSeriesName=$($("#selection .CarHistoryTitlediv",settings.thisPage)[1]).find(".CarHistoryTitle").text();
	                	}
	                }
		           	$(settings.this$,settings.thisPage).val(settings.thisBrandName+' '+settings.thisSeriesName+' '+settings.thisTypeName);
		        	$(".layui-layer-close ",settings.thisPage).trigger("click");
		        });
		    },
		    //事件的绑定
		    uiEventBind:function(){
		    	 //字母hover事件
		    	$("#car-brand-selector>ul>li",settings.thisPage).hover(function () {
		            $("#car-brand-selector>ul>li",settings.thisPage).removeClass("zimuActive");
		            $(this).addClass("zimuActive");
		            
		            $("#brands_content",settings.thisPage).find(".CarBrand2").hide();
	                $("#brands_content",settings.thisPage).find(".CarBrand2[data-brand^='" + $(this).text() + "']").show();
		        });
		        //点击品牌选择车系
		        settings.bindBrandClick();
		        //点击车系选择车型
		        settings.bindSeriesClick();
		        //点击车型关闭弹框
		        settings.bindTypeClick();
		        
		        var $selection = $("#selection",settings.thisPage);
		        //删除的按钮的点击事件
		        $selection.off("click");
            	$selection.on("click", ".CarHistoryTitleDel",onDeleteButtonTouchOrClick);
            	function onDeleteButtonTouchOrClick(){
            		var index = $(this).attr("data-index");
            		 if (index == 1) {
            		 	$(this).parent().remove();
            		 	$("[data-index=2]",settings.thisPage).parent().remove();
		                $("#car-brand-selector",settings.thisPage).show();
		                $("#content_detail",settings.thisPage).hide();
		                $("li#cx2",settings.thisPage).removeClass().addClass("head_div3");
		                $("li#cx3",settings.thisPage).removeClass().addClass("head_div5");
		                $("span#cxspan2",settings.thisPage).removeClass();
		                $("span#cxspan3",settings.thisPage).removeClass();
						
						settings.thisCarId='';
						settings.thisBrandName='';
						settings.thisSeriesName='';
						settings.thisTypeName='';
						
		                settings.index1Selected();
		                
		            }else if (index == 2) {
		            	$(this).parent().remove();
		                settings.getSeriesByBrandId($("[data-index=1]",settings.thisPage).attr("data-id"),settings.uiInitSeriesByBrandId);
		                $("li#cx3",settings.thisPage).removeClass().addClass("head_div3");
		                $("span#cxspan2",settings.thisPage).removeClass().addClass("active");
		                $("span#cxspan3",settings.thisPage).removeClass();
		                
		                settings.thisCarId=$("[data-index=1]",settings.thisPage).attr("data-id");
		                settings.thisBrandName=$("[data-index=1]",settings.thisPage).parent().find(".CarHistoryTitle").text();
		                settings.thisSeriesName='';
						settings.thisTypeName='';
						
		                settings.index2Selected();
		            }
            	}
		    },
		    index1Selected:function () {
		       //设置点击品牌显示车系
		       settings.bindBrandClick();
		
		       //设置车系按钮点击动作
		       settings.bindSeriesClick();
		       
		        //点击车型关闭弹框
		        settings.bindTypeClick();
		    },
		    index2Selected:function () {
	            $("#content_detail",settings.thisPage).unbind("click");
	            //设置车系按钮点击动作
	            this.bindSeriesClick();
	            
	            //点击车型关闭弹框
		        settings.bindTypeClick();
	        },
		};
		
        this.unbind();
		this.bind("click",function(){
			//固定写法，阻止one事件冒泡
			event.stopPropagation();
			settings.init(this);
		});
		return this;
    };
})(jQuery);