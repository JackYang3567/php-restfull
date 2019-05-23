<?php
/* Smarty version 3.1.33, created on 2019-05-23 10:52:24
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lottery\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce60ae849c7f4_83101695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90ca0f1810cd926ef8f18b5b01251df2c37b51a2' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lottery\\new.tpl',
      1 => 1558579917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce60ae849c7f4_83101695 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
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
  
   <?php echo '<script'; ?>
>
       

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
         <?php echo '</script'; ?>
>
 <?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
