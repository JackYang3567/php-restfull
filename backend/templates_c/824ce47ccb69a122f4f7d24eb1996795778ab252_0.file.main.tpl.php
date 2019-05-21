<?php
/* Smarty version 3.1.33, created on 2019-05-21 08:02:02
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\layouts\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce33ffa38cad4_48396722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '824ce47ccb69a122f4f7d24eb1996795778ab252' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\main.tpl',
      1 => 1558314521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/main_top.tpl' => 1,
    'file:../layouts/main_left.tpl' => 1,
    'file:../layouts/frame_footer.tpl' => 1,
  ),
),false)) {
function content_5ce33ffa38cad4_48396722 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- 顶部开始 -->
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/main_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- 顶部结束 -->
<!-- 中部开始 -->
   <!-- 左侧菜单开始 -->
   <?php $_smarty_tpl->_subTemplateRender("file:../layouts/main_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
<!-- 右侧主体结束 -->
<!-- 底部开始 -->
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/frame_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- 底部结束 <?php }
}
