<?php
/* Smarty version 3.1.33, created on 2019-05-23 12:42:57
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lotterytype\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce624d1c8b0a9_31442522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c27fc0342006babd9c0f20cec004d198c976f0ff' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lotterytype\\new.tpl',
      1 => 1558571683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce624d1c8b0a9_31442522 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
<form class="layui-form" id="add_form">
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
            <label for="remarks" class="layui-form-label">
               彩票种类备注
            </label>
            <div class="layui-input-inline">
                <textarea type="text" rows="8" cols="16" id="remarks" name="remarks" required="" lay-verify="remarks"
                autocomplete="off" class="layui-textarea"> </textarea>
            </div>
            
        </div>
        
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit  type="button">
                保存
            </button>
        </div>
    </form>

    <?php echo '<script'; ?>
>
         $(function  () {
                layui.use('form', function(){
                  var form = layui.form,
                      layer = layui.layer;
                  form.on('submit(add)', function(data){
                       submitAdd();
                  });
                });
            })
    
        function submitAdd(){
          
            if(check()){
                let reloadUrl ='/lotterytype/index.php/LotteryType/Add';
                let data = $("#add_form").serialize();
              
                $.ajax({
                    url:reloadUrl,
                    type:"POST",
                    data:data,
                    dataType:'JSON',
                    success:function(res){  
                        console.log('===',res.success)
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
            if($("#type_name").val().length==0){
                ret = false; 
            }
            if($("#type_code").val().length==0){
                ret = false; 
            }
           return ret;
        }
    <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
