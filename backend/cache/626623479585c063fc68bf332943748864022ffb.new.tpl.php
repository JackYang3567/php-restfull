<?php
/* Smarty version 3.1.33, created on 2019-05-20 17:16:47
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\members\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce2707fac2510_14162286',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '12355dfa2a3a705e56f35dd9057e6fcccbe38035' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\members\\new.tpl',
      1 => 1558343797,
      2 => 'file',
    ),
    'bb5432901cd78217ae80477be6fdda468253f971' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\header.tpl',
      1 => 1558331771,
      2 => 'file',
    ),
    '587f9afb1f771f025ea977f6075bb8af385b96bc' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\footer.tpl',
      1 => 1558311118,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ce2707fac2510_14162286 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<HTML  class="x-admin-sm">
<HEAD>
	<meta charset="UTF-8">
	<TITLE>GK数据API - <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</TITLE>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/backend/public/css/font.css">
    <link rel="stylesheet" href="/backend/public/css/xadmin.css">
    <link rel="stylesheet" href="/backend/public/css/paging.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/backend/public/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/backend/public/js/xadmin.js"></script>
    <script type="text/javascript" src="/backend/public/js/cookie.js"></script>
    <script src="/backend/public/js/paging.js"></script>
</HEAD>
<BODY><form class="layui-form">
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>登录名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="name" required="" lay-verify="required"
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
                <input type="text" id="phone" name="phone" required="" lay-verify="phone"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
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
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>QQ号码
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_qq_number" name="qq_number" required="" lay-verify="qq_number"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
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


 
</BODY>
</HTML>
<?php }
}
