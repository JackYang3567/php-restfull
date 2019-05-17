<?php
/* Smarty version 3.1.33, created on 2019-05-17 18:20:48
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cde8b00ab0870_43726143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da8876ef3cd662ceb575d5bae01a5fbabf410a2d' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\main.tpl',
      1 => 1558088423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main_top.tpl' => 1,
    'file:main_left.tpl' => 1,
  ),
),false)) {
function content_5cde8b00ab0870_43726143 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '19041886915cde8b00a6a358_08079331';
?>
<BODY>
<!-- 顶部开始 -->
<?php $_smarty_tpl->_subTemplateRender("file:main_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- 顶部结束 -->
<!-- 中部开始 -->
   <!-- 左侧菜单开始 -->
   <?php $_smarty_tpl->_subTemplateRender("file:main_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <!-- 左侧菜单结束 -->
 <!-- 右侧主体开始 -->
 <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/backend/index.php/Admin/Welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
<div class="page-content-bg"></div>
<!-- 右侧主体结束 --><?php }
}
