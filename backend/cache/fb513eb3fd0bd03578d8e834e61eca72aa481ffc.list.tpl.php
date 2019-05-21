<?php
/* Smarty version 3.1.33, created on 2019-05-21 07:55:08
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lotterytype\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce33e5c794110_51228926',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    'c35e673898f20ddf8b5eb9c2e039fa1e36e1e222' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lotterytype\\list.tpl',
      1 => 1558343051,
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
function content_5ce33e5c794110_51228926 (Smarty_Internal_Template $_smarty_tpl) {
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
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
          <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入彩票类型名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加彩票类型','/backend/index.php/Admin/NewLotteryType',600,400)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span id="totalCount"></span> 条</span>
      </xblock>
      <table class="layui-table x-admin">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>彩票类型名</th>
            <th>类型编码</th>
            <th>描述</th>
            <th>操作</th></tr>
        </thead>
        <tbody id="tbody">
          </tbody>
        </table>
       
        <div class="page">
            <div class="box" id="box"></div>
        </div>
  
        <div style="display:none">
          <input type="hidden" id="page" value="1">
          <input type="hidden" id="split" value="10">
          <input type="hidden" id="setTotalCount">
          <input type="hidden" id="searchStr">
          <input type="hidden" id="api" value="/lotterytype/index.php/LotteryType">
      </div>

    </div>
    <script>

      var api = $("#api").val()
      var page = getQueryString("page") || parseInt($("#page").val());// 初始页码
      var split  = parseInt($("#split").val()); //每页最大记录数       
      var setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
      var totalPage = Math.ceil(setTotalCount / split); //总页数
      var searchStr =$("#search").serialize()
      var reloadUrl = api+'?page='+page+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
    
      $(function(){
          getLotteryTypelist(reloadUrl,'doc ready');
         // setTimeout(function() {
          pagein(api)
        //  }, 500); 
      })  
   

    
    //load info
     function getLotteryTypelist(reloadUrl,step=''){
        $.ajax({
            url:reloadUrl,
            type:"GET",
            dataType:"json",
            timeout:10000,
            data:'',
            success:function(res){    
              console.log(res);          
               if(res.success){     

                   $("#setTotalCount").val(res.data.count); //总记录数
                   $("#totalCount").html(res.data.count)      
                   generatorTableTr(res.data.rows)
                }
                else{
                   alert(res.error_message)
              }
            }
        });
        
     }


     function pagein(api){
      
        let page = getQueryString("page") || parseInt($("#page").val());// 初始页码
        let split  = parseInt($("#split").val()); //每页最大记录数       
        let setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
        let totalPage = Math.ceil(setTotalCount / split); //总页数  
       // alert("setTotalCount > split"+setTotalCount +">"+split);      
     
         // alert("paging");
         $('#box').paging({
            initPageNo: page, // 初始页码
            totalPages: totalPage, //总页数
            totalCount: '合计' + setTotalCount + '条数据', // 条目总数
            slideSpeed: 600, // 缓动速度。单位毫秒
            jump: true, //是否支持跳转
            callback: function(page) { // 回调函数 split当前页码
                 $("#page").val(page)
                 reloadUrl = api+'?page='+page+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
                 getUserlist(reloadUrl,'pagein');
                 $("#totalCount").html(setTotalCount)
            }
         })
       
            if(setTotalCount<1){
              $('#box').html('<h1 style="margin-left:80px">没有符合条件的记录</h1>')
              return
            } 
            $('#box').html('')
       
      }
      
       function generatorTableTr(data){
       let trStr = ``
       let gender =''
       let status = ''
       let len = data.length
      
       for(let k=0;k<len;k++){
       trStr +=`<tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='`+data[k].Id+`'><i class="layui-icon">&#xe605;</i></div>
              
            </td>
            <td>`+data[k].Id +`</td>
            <td>`+data[k].type_name  +`</td>
            
            <td>`+data[k].type_code  +`</td>
            <td>`+data[k].remarks  +`</td>
            <td class="td-manage">
           `  
           
                   
           trStr += status+` <a title="编辑"  onclick="x_admin_show('编辑','/api/v2/user/`+data[k].Id +`/edit?page=1',600,600)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
             
              <a title="删除" onclick="lotterytype_del(this,'`+data[k].Id +`')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>`
         }
      
        $("#tbody").html(trStr)
     }

      layui.use('laydate', function(){
         var laydate = layui.laydate;

         //执行一个laydate实例
         laydate.render({
           elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
           elem: '#end' //指定元素
        });
      });

      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      
     /*删除*/
     function lotterytype_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              delLotteryType(id);              
               let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                   window.location.reload()
               }); 
               
          });
      }



      function delAll (argument) {
        var data = tableCheck.getData();
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            delLotteryType(data);       
            let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                   window.location.reload()
               }); 
        });
      }

       //删除
       function delLotteryType(id) {
       
        let api = $("#api").val()
        let data = 'id='+id;
        let url = api+'/Del';
        $.ajax({
            url:url,
            type:"POST",
            dataType:"json",
            timeout:10000,
            data:data,
            success:function(res){
               if(res.success){                   
                    getUserlist(reloadUrl);     
                }
                else{
                   alert(res.error_message)
              }
            }
        });   
           
     } 
    </script>
   
   

 
</BODY>
</HTML>
<?php }
}
