<?php
/* Smarty version 3.1.33, created on 2019-05-21 15:18:10
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\admin\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce3a6325d69f5_93706960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4ea1df72e524e30c9854c925f53929bcedb6dc7' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\admin\\edit.tpl',
      1 => 1558423073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce3a6325d69f5_93706960 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
<form method="post"  class="layui-form" id="pass_form">
    <div class="layui-form-item"> </div>
   
    <input type="hidden"  name="Id" value="<?php echo $_smarty_tpl->tpl_vars['context']->value->Id;?>
">
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>旧密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>新密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_password" name="password" required="" lay-verify="password"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>确认密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="repassword"  required="" lay-verify="repass"
                autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit  type="button">
                提交
            </button>
        </div>
    </form>
    <?php echo '<script'; ?>
>
        $(function  () {
                layui.use('form', function(){
                  var form = layui.form;
                  form.on('submit(edit)', function(data){
                       submitPass();
                  });
                });
            })
    
        function submitPass(){
            if(check()){
                let reloadUrl ='/backend/index.php/Admin/UpdatePass';
                let data = $("#pass_form").serialize();
                $.ajax({
                    url:reloadUrl,
                    type:"POST",
                    data:data,
                    dataType:'JSON',
                    success:function(res){  
                        console.log('===',res.success)
                       if(res.success){
                        top.location.reload();
                        // window.location.href = "/backend/signin.php";
                       }
                            
                    }
                });
            }
        }

        function check(){
            let ret = true;
            if($("#L_pass").val().trim().length==0){
                ret = false; 
            }
            if($("#L_password").val().trim().length==0){
                ret = false; 
            }
            if($("#L_repass").val().trim().length==0){
                ret = false; 
            }
            if( $("#L_password").val().trim() !== $("#L_repass").val().trim() ){   
                ret = false;             
                //popMsg('新密码和确认密码不一致');  
             }
           return ret;
        }
         
        function popMsg(msg){
            let opt = new Object; 
            opt.icon = 1;
            opt.time = 100;
            layer.msg(msg,opt,function(){}); 
        }
    <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
