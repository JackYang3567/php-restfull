<?php
/* Smarty version 3.1.33, created on 2019-05-21 13:11:12
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\admin\show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce38870cca163_95997843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5f944a679a6c520f71802fd04e6bd4660536132' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\admin\\show.tpl',
      1 => 1558415464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce38870cca163_95997843 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>


<div class="layui-form-item"> </div>

<div class="layui-form-item">
    <label for="username" class="layui-form-label">
      登录名
    </label>
    <div class="layui-input-inline">
        <input type="text" id="username" name="username" disabled="" lay-verify="required"
        autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['context']->value->name;?>
" class="layui-input">
    </div>
    
</div>
<div class="layui-form-item">
    <label for="phone" class="layui-form-label">
      手机
    </label>
    <div class="layui-input-inline">
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['context']->value->phone;?>
" id="phone" name="phone" disabled="" lay-verify="phone"
        autocomplete="off" class="layui-input">
    </div>
   
</div>
<div class="layui-form-item">
    <label for="L_email" class="layui-form-label">
        邮箱
    </label>
    <div class="layui-input-inline">
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['context']->value->email;?>
" id="L_email" name="email" disabled="" lay-verify="email"
        autocomplete="off" class="layui-input">
    </div>
   
</div>

<div class="layui-form-item">
    <label for="L_pass" class="layui-form-label">
       QQ号码
    </label>
    <div class="layui-input-inline">
        <input type="text" id="L_pass" name="pass" disabled='' value="<?php echo $_smarty_tpl->tpl_vars['context']->value->qq_number;?>
" lay-verify="pass"
        autocomplete="off" class="layui-input">
    </div>
   
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
