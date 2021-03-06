<?php
/* Smarty version 3.1.33, created on 2019-05-21 07:55:08
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\admin\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce33e5c4bc885_08614494',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '5ee836f81098c506626c76f0843fd62f59396e81' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\admin\\index.tpl',
      1 => 1558310771,
      2 => 'file',
    ),
    'bb5432901cd78217ae80477be6fdda468253f971' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\header.tpl',
      1 => 1558331771,
      2 => 'file',
    ),
    '824ce47ccb69a122f4f7d24eb1996795778ab252' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\main.tpl',
      1 => 1558314521,
      2 => 'file',
    ),
    '5db4a7091b5f27e84a7ca784a1273ab772f4033f' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\main_top.tpl',
      1 => 1558310725,
      2 => 'file',
    ),
    'c3323d9e54696340fc2ecb1429583317f90b76c6' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\main_left.tpl',
      1 => 1558351830,
      2 => 'file',
    ),
    '86d52754d3007c59a7f292f348e54f930d18b2ac' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\frame_footer.tpl',
      1 => 1558311151,
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
function content_5ce33e5c4bc885_08614494 (Smarty_Internal_Template $_smarty_tpl) {
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
<BODY>
 
   <!-- 右侧主体开始 -->
   
<!-- 顶部开始 -->
<!-- 顶部开始 -->
<div class="container">
        <div class="logo"><a href="/backend/">GK数据API</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
              <dd><a href="/backend/index.php/Admin/Signout/">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 顶部结束 -->
<!-- 中部开始 -->
   <!-- 左侧菜单开始 -->
   <div class="left-nav">
        <div id="side-nav">
          <ul id="nav">
              <li>
                  <a _href="/backend/index.php/Admin/MemberList?page=1&split=10">
                      <i class="iconfont">&#xe6b8;</i>
                      <cite>会员管理</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                 
              </li>
              <li>
                  <a _href="/backend/public/member-list.html">
                      <i class="iconfont">&#xe723;</i>
                      <cite>订单管理</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                 
              </li>
              <li>
                  <a _href="/backend/index.php/Admin/LotteryTypeList?page=1&split=10">
                      <i class="iconfont">&#xe723;</i>
                      <cite>彩票分类管理</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                 
              </li>
              <li>
                  <a _href="/backend/index.php/Admin/LotteryList?page=1&split=10">
                      <i class="iconfont">&#xe723;</i>
                      <cite>彩票管理</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                  
              </li>
              <li>
                    <a _href="/backend/index.php/Admin/WhiteList?page=1&split=10">
                        <i class="iconfont">&#xe723;</i>
                        <cite>白名单管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    
                </li>
              <li>
                  <a href="javascript:;">
                      <i class="iconfont">&#xe726;</i>
                      <cite>基础数据</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                  <ul class="sub-menu">
                      <li>
                          <a _href="/backend/public/role-add.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>支付方式管理</cite>
                          </a>
                      </li >
                      <li>
                          <a _href="/backend/public/admin-add.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>充值金额预设</cite>
                          </a>
                      </li >
                     
                  </ul>
              </li>
              <li>
                  <a href="javascript:;">
                      <i class="iconfont">&#xe6ce;</i>
                      <cite>系统统计</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                  <ul class="sub-menu">
                      <li>
                          <a _href="echarts1.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>拆线图</cite>
                          </a>
                      </li >
                      <li>
                          <a _href="echarts2.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>柱状图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts3.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>地图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts4.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>饼图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts5.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>雷达图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts6.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>k线图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts7.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>热力图</cite>
                          </a>
                      </li>
                      <li>
                          <a _href="echarts8.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>仪表图</cite>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                <a _href="/backend/index.php/Lottery">
                      <i class="iconfont">&#xe6b4;</i>
                      <cite>充值管理</cite>
                      <i class="iconfont nav_right">&#xe697;</i>
                  </a>
                  <ul class="sub-menu">
                      <li>
                          <a _href="unicode.html">
                              <i class="iconfont">&#xe6a7;</i>
                              <cite>图标对应字体</cite>
                          </a>
                      </li>
                  </ul>
              </li>
             
          </ul>
        </div>
      </div>
      <!-- <div class="x-slide_left"></div> -->
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

<div class="footer">
    <div class="copyright">Copyright ©2019 GK-API  All Rights Reserved</div>  
</div>

<!-- 底部结束     <!-- 右侧主体结束 -->
<!-- 中部结束 -->
<!-- 底部开始 -->


 
</BODY>
</HTML>
<?php }
}
