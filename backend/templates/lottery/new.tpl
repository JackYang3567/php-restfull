{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form" id="add_form">

        
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
                <label for="type_id" class="layui-form-label">
                    <span class="x-red">*</span>彩票种类名
                </label>
                <div class="layui-input-inline">
                    <select type="select" id="type_id" required="" lay-verify="required"
                    autocomplete="off" class="layui-select" >
                    
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>彩票种类id
                </div>
            </div>
       <input type="hidden" name="type_id" id="type_id_val"  />
       <div class="layui-form-item">
           <label for="name" class="layui-form-label">
               <span class="x-red">*</span>彩票名
           </label>
           <div class="layui-input-inline">
               <input type="text" id="name" name="name" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red">*</span>唯一的彩票名
           </div>
       </div>
       <div class="layui-form-item">
           <label for="code" class="layui-form-label">
               <span class="x-red">*</span>彩票编码
           </label>
           <div class="layui-input-inline">
               <input type="text" id="code" name="code" required="" lay-verify="code"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red">*</span>唯一的彩票编码
           </div>
       </div>
       <div class="layui-form-item">
           <label for="remarks" class="layui-form-label">
              彩票备注
           </label>
           <div class="layui-input-inline">
               <textarea type="text" rows="8" cols="16" id="remarks" name="remarks" required="" lay-verify="remarks"
               autocomplete="off" class="layui-textarea"> </textarea>
           </div>
           <div class="layui-form-mid layui-word-aux">
              
           </div>
       </div>
       
       <div class="layui-form-item">
           <label  class="layui-form-label">
           </label>
           <button  class="layui-btn" lay-filter="add" lay-submit type="button">
            保存
           </button>
       </div>
   </form>
  
   <script>
       

         $(function(){
            getLotteryTypeIds();
         })

        function changeSelect(obj){
                 $("dd").each(function(){
                     $(this).attr("class","");
                 })
                $(".layui-select-title > input").attr("value",$(obj).text());
                $(obj).attr('class','layui-this');
                $("#type_id_val").val($(obj).attr('lay-value'));
        }

         $(function  () {
                layui.use('form', function(){
                  var form = layui.form,
                      layer = layui.layer;
                  form.on('submit(add)', function(data){
                       submitAdd();
                  });
                });
            })

            function getLotteryTypeIds(){
             let Url = '/lotterytype/index.php/LotteryType';
             $.ajax({
                 url:Url,
                 type:"GET",
                 data:'',
                 success:function(res){    
                     if(res.success){ 
                        generatorSelectList(res.data.count,res.data.rows);
                     }
                     else{
                         alert(res.error_message);
                     }
                  }
             });             
         }
        

         function generatorSelectList(count,data){
           let option = '';
           let ddStr = '';
           for(let k=0;k<data.length;k++){
                   option +='<option value="'+data[k].Id+'">'+ data[k].type_name+'</option>';
                   ddStr +='<dd onclick="changeSelect(this)" lay-value="'+data[k].Id+'" class="" >'+ data[k].type_name+'</dd>';
           };
          
             $(".layui-select-title > input").attr("value",data[0].type_name);
             $(".layui-select-title > input").attr("readonly"," ");
             $("#type_id").html(option);
             $("dl").html(ddStr);
             $("dl").removeAttr("style");
            
         }
            
        function submitAdd(){
           
            if(check()){
                let reloadUrl ='/lottery/index.php/Lottery/Add';
                let data = $("#add_form").serialize();
                
                $.ajax({
                    url:reloadUrl,
                    type:"POST",
                    data:data,
                    success:function(res){  
                        console.log('===',res)
                       if(res.success){
                           let opt = new Object; 
                           opt.icon = 1;
                            layer.alert("操作成功",opt,function () {
                                //关闭当前frame
                                x_admin_close();
                                // 可以对父窗口进行刷新 
                                x_admin_father_reload();
                            });
                       }
                            
                    }
                });
            }
        }

        function check(){
           
            let ret = true;
            if($("#type_id").val().length==0){
                ret = false; 
            }
            if($("#name").val().length==0){
                ret = false; 
            }
            if($("#code").val().length==0){
                ret = false; 
            }
            if( $("#remarks").val().length==0 ){   
                ret = false;   
             }
           return ret;
        }
         </script>
 {include file="../layouts/footer.tpl"}