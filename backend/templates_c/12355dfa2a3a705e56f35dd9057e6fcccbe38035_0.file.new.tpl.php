<?php
/* Smarty version 3.1.33, created on 2019-05-23 12:42:37
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\members\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce624bd6be4f6_48518631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12355dfa2a3a705e56f35dd9057e6fcccbe38035' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\members\\new.tpl',
      1 => 1558586523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce624bd6be4f6_48518631 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
<form class="layui-form"  id="add_form">
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>登录名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="name" name="name" required="" lay-verify="name"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>手机
            </label>
            <div class="layui-input-inline">
                <input type="text" id="phone" onkeyup="value=value.replace(/[^\d]/g,'')" name="phone" required="" lay-verify="phone"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>11位数字
            </div>
        </div>
        <div class="layui-form-item">
            <label for="email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="text" id="email" name="email" required="" lay-verify="email"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="x-red">*</span>性别</label>
            <div class="layui-input-block">
              <input type="radio" name="gender" value="0" lay-skin="primary" title="女" checked="">
              <input type="radio" name="gender" value="1" lay-skin="primary" title="男">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="qq_number" class="layui-form-label">
                <span class="x-red">*</span>QQ号码
            </label>
            <div class="layui-input-inline">
                <input type="text" id="qq_number" onkeyup="value=value.replace(/[^\d]/g,'')" name="qq_number" required="" lay-verify="qq_number"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个数字
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
                let reloadUrl ='/member/index.php/Member/Add';
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
            if($("#name").val().length==0){
                ret = false; 
            }
            if($("#phone").val().length==0){
                ret = false; 
            }
            if($("#qq_number").val().length==0){
                ret = false; 
            }
            if( $("#email").val().length==0 ){   
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
