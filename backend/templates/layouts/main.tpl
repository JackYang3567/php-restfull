
<!-- 顶部开始 -->
{include file="../layouts/main_top.tpl"}
<!-- 顶部结束 -->
<!-- 中部开始 -->
   <!-- 左侧菜单开始 -->
   {include file="../layouts/main_left.tpl"}
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
{include file="../layouts/frame_footer.tpl"}
<!-- 底部结束 