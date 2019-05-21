<?php
/* Smarty version 3.1.33, created on 2019-05-20 19:23:44
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lottery\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce28e404f9967_16145241',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '90ca0f1810cd926ef8f18b5b01251df2c37b51a2' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lottery\\new.tpl',
      1 => 1558351416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce28e404f9967_16145241 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '645553255ce28e404ce263_65576387';
?>

<!doctype html>
<HTML  class="x-admin-sm">
<HEAD>
	<meta charset="UTF-8">
	<TITLE><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php echo '/*%%SmartyNocache:645553255ce28e404ce263_65576387%%*/<?php echo $_smarty_tpl->tpl_vars[\'Name\']->value;?>
/*/%%SmartyNocache:645553255ce28e404ce263_65576387%%*/';?>
</TITLE>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/backend/public/css/font.css">
    <link rel="stylesheet" href="/backend/public/css/xadmin.css">
    <link rel="stylesheet" href="/backend/public/css/paging.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/backend/public/lib/layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/backend/public/js/xadmin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/backend/public/js/cookie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/backend/public/js/paging.js"><?php echo '</script'; ?>
>
</HEAD>
<BODY>
<form class="layui-form">

        
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
                <label for="type_id" class="layui-form-label">
                    <span class="x-red">*</span>彩票种类名
                </label>
                <div class="layui-input-inline">
                    <select type="select" id="type_id" name="type_id" required="" lay-verify="required"
                    autocomplete="off" class="layui-select">
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>彩票种类id
                </div>
            </div>
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
           <label for="L_remarks" class="layui-form-label">
               <span class="x-red">*</span>彩票备注
           </label>
           <div class="layui-input-inline">
               <textarea type="text" rows="8" cols="16" id="L_remarks" name="remarks" required="" lay-verify="remarks"
               autocomplete="off" class="layui-textarea"> </textarea>
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red">*</span>
           </div>
       </div>
       
       <div class="layui-form-item">
           <label for="L_repass" class="layui-form-label">
           </label>
           <button  class="layui-btn" lay-filter="add" lay-submit="">
               增加
           </button>
       </div>
   </form>

   <?php echo '<script'; ?>
>
        function getLotteryTypeIds(){
             let Url = '/lotterytype/index.php/LotteryType';
             $.ajax({
                 url:Url,
                 type:"GET",
                 dataType:"json",
                 timeout:10000,
                 data:'',
                 success:function(res){    
                     if(res.success){ 
                        generatorSelectList(res.data.count,res.data.rows)
                      
                     }
                     else{
                         alert(res.error_message)
                     }
                 }
             });             
         }

         function generatorSelectList(count,data){
            
           let option =' <option value="">请选择彩种类型</option>';
           
            data.forEach(function (value) {
                   option +='<option value="'+value.Id+'">'+ value.type_name+'</option>';
             });
          
           layer.confirm('确认要停用吗？',function(option){
                 option =' <option value="">请选择彩种类型</option>';
                 $("#type_id").html(option);
                 let opt = new Object;
                 opt.icon=5;
                 opt.time=1000
                 layer.msg('选择彩种类型',opt);
          });
           // $("#type_id").html(option);
         }

         $(function(){
            getLotteryTypeIds();
         })
         <?php echo '</script'; ?>
>
</body>
</html><?php }
}
