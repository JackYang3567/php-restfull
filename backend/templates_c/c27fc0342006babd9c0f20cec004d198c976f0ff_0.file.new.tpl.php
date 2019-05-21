<?php
/* Smarty version 3.1.33, created on 2019-05-21 10:29:00
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lotterytype\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce3626c4ddf65_36157732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c27fc0342006babd9c0f20cec004d198c976f0ff' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lotterytype\\new.tpl',
      1 => 1558344841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce3626c4ddf65_36157732 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
<form class="layui-form">

        
         <div class="layui-form-item"></div>
        <div class="layui-form-item">
            <label for="type_name" class="layui-form-label">
                <span class="x-red">*</span>彩票种类名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="type_name" name="type_name" required="" lay-verify="required"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的彩票种类名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="type_code" class="layui-form-label">
                <span class="x-red">*</span>彩票种类编码
            </label>
            <div class="layui-input-inline">
                <input type="text" id="type_code" name="type_code" required="" lay-verify="type_code"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的彩票种编码
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_remarks" class="layui-form-label">
                <span class="x-red">*</span>彩票种类备注
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
       function getMemberlist(reloadUrl,step=''){
     
            $.ajax({
                url:reloadUrl,
                type:"GET",
                dataType:"json",
                timeout:10000,
                data:'',
                success:function(res){    
                console.log(res);          
                    if(res.success){     

                       
                      
                    }
                    else{
                        alert(res.error_message)
                }
                }
            });
            
        }
    <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
