$(function(){ 
    $.fn.extend({
        "jcb": function () { }
    }); 

    /*  鎻愮ず妗�
     *  @param msg 娑堟伅  result 'error' 澶辫触鏍囧織   url 璺宠浆鍦板潃 callback 鍥炶皟鍑芥暟 
    */
    $.fn.jcb.alert = function(msg,result,url,callback,calldata){   
        if(msg !=null && msg != ''){
            var salert = layer.alert(msg, {icon: ((result == 'error') ? 2 : 1), title:'绯荤粺鎻愮ず', skin: 'layui-layer-molv',closeBtn: 0},function(){				
                layer.close(salert);  
                if(typeof callback == 'function'){ callback(calldata);} 
                if(url != '' && url != undefined){location.href=url;}            
            });
        }else{
            if(typeof callback == 'function'){ callback(calldata);} 
            if(url != '' && url != undefined){location.href=url;}         
        }   
    };

    /*  寮圭獥骞惰嚜鍔ㄥ叧闂�
     *  @param msg 娑堟伅  result 'error' 澶辫触鏍囧織   url 璺宠浆鍦板潃 callback 鍥炶皟鍑芥暟 
    */
    $.fn.jcb.alertauto = function(msg,result,url,callback){  //瀹氭椂鑷姩鍏抽棴
            layer.msg(msg, {icon: ((result == 'error') ? 2 : 1), title:'绯荤粺鎻愮ず', skin: 'layui-layer-molv',time: 2000},function(){
                if(typeof callback == 'function'){ callback.call();}   
                if(url != '' && url != undefined){location.href=url;}  
            });            
    };
    /*  POST璇锋眰鏁版嵁
     *  @param url 璇锋眰鍦板潃  data 璇锋眰鏁版嵁  link :false|true 鏄惁闇€瑕佽烦杞� callback 鍥炶皟鍑芥暟 
    */
    $.fn.jcb.post = function(url,data,link,callback){
            var cthis= this;
            var loading;
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                beforeSend:function(xhr){
                    loading = layer.load(0, {shade: [0.3,'#000']});
                },
                statusCode: {
                    404: function () {},
                    500: function () { }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {                 
                    layer.close(loading);                   
                    cthis.alertauto('鏁版嵁璇锋眰閿欒','error');
                },
                success: function (res) {
                    layer.close(loading);
                    if(res.code == '1'){					 
                        if(link == true){	 
                            cthis.alert(res.msg,'ok',res.url,(typeof callback == 'function')? callback:null,res);
                        }else{							 
                            cthis.alert(res.msg,'ok','',(typeof callback == 'function')? callback:null,res);
                        }  

                    }else if(res.code == '0'){ 
					    if(link == true){	 
                            cthis.alert(res.msg,'error',res.url,(typeof callback == 'function')? callback:null,res);
                        }else{							 
                            cthis.alert(res.msg,'error','',(typeof callback == 'function')? callback(res):null,res);
                        }                                              
                    }else{
                        cthis.alert('鏁版嵁璇锋眰閿欒!','error');
                    }                    
                },
                complete:function(){
                    layer.close(loading);
                }
        });  
    };
	/*  璇㈤棶绐楀彛
     *  @param isajax 鏄惁鎻愪氦POST   url 璇锋眰鍦板潃|璺宠浆鍦板潃  data 璇锋眰鏁版嵁  link :false|true 鏄惁闇€瑕佽烦杞� callback 鍥炶皟鍑芥暟 
    */
	$.fn.jcb.confirm=function(isajax,tit,url,callback,data,link){
		var cthis= this;
		var alertlayer = layer.confirm(tit,{title:'绯荤粺鎻愮ず',icon:3,skin: 'layui-layer-molv'},function (index){
			if(isajax){
				layer.close(alertlayer); 
				cthis.post(url,data,link,callback);
			}else{
				if(typeof callback == 'function'){ callback();} 
				if(url != null && url != undefined){location.href=url;}  
			}
		});		 
	} 
});