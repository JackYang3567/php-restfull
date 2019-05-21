<?php
/* Smarty version 3.1.33, created on 2019-05-21 10:44:13
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\layouts\main_top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce365fd9b6e08_07535580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5db4a7091b5f27e84a7ca784a1273ab772f4033f' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\main_top.tpl',
      1 => 1558406652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce365fd9b6e08_07535580 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 顶部开始 -->
<div class="container">
        <div class="logo"><a href="/backend/">GK数据API</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('彩票类型','/backend/index.php/Admin/NewLotteryType',600,400)"><i class="iconfont">&#xe6a2;</i>彩票类型</a></dd>
              <dd><a onclick="x_admin_show('彩票种类','/backend/index.php/Admin/NewLottery',600,400)"><i class="iconfont">&#xe6a8;</i>彩票种类</a></dd>
              <dd><a onclick="x_admin_show('会员','/backend/index.php/Admin/NewMember',600,400)"><i class="iconfont">&#xe6b8;</i>会员</a></dd>
              <dd><a onclick="x_admin_show('支付方式','/backend/index.php/Admin/NewPaymethod',600,400)"><i class="iconfont">&#xe6b8;</i>支付方式</a></dd>
              <dd><a onclick="x_admin_show('预设充值金额','/backend/index.php/Admin/NewPayamount',600,400)"><i class="iconfont">&#xe6b8;</i>预设充值金额</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('管理员信息','/backend/index.php/Admin/ShowInfo',600,400)">管理员信息</a></dd>
              <dd><a onclick="x_admin_show('修改密码','/backend/index.php/Admin/EditPass',600,400)">修改密码</a></dd>
              <dd><a href="/backend/index.php/Admin/Signout/">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/" target="_blank">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <?php }
}
