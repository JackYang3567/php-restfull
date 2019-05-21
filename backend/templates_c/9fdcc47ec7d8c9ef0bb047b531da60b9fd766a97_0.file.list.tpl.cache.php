<?php
/* Smarty version 3.1.33, created on 2019-05-20 17:15:54
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\members\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce2704a9233c1_80304383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fdcc47ec7d8c9ef0bb047b531da60b9fd766a97' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\members\\list.tpl',
      1 => 1558343751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce2704a9233c1_80304383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '9208098865ce2704a8f3101_41242169';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
  
  <body>
   
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
          <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入会员名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加会员','/backend/index.php/Admin/NewMember',600,400)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span id="totalCount"></span> 条</span>
      </xblock>
      <form class="layui-form">
       
      <table  class="layui-table x-admin">
        <thead >
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>会员名</th>
            <th>性别</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>地址</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        
        <tbody id="tbody">

        </tbody>
       
        </table>
      </form>
        <div class="page">
            <div class="box" id="box"></div>
        </div>
  
        <div style="display:none">
          <input type="hidden" id="page" value="1">
          <input type="hidden" id="split" value="10">
          <input type="hidden" id="setTotalCount" value="">
          <input type="hidden" id="searchStr">
          <input type="hidden" id="api" value="/member/index.php/Member">
      </div>

    </div>
    <?php echo '<script'; ?>
>

      var api = $("#api").val()
      var page = getQueryString("page") || parseInt($("#page").val());// 初始页码
    
      var split  = parseInt($("#split").val()); //每页最大记录数 
      var setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
      var totalPage = Math.ceil(setTotalCount / split); //总页数
      var searchStr =$("#search").serialize()
      var reloadUrl = api+'?page='+page+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
    
      $(function(){
          getMemberlist(reloadUrl,'doc ready');
         // setTimeout(function() {
          pagein(api)
        //  }, 500); 

       
      })  
   

    
    //load info
     function getMemberlist(reloadUrl,step=''){
     
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
                    setTotalCount = parseInt(res.data.count); //总记录数
                    totalPage = Math.ceil(setTotalCount / split); //总页数     
                   generatorTableTr(res.data.rows)
                }
                else{
                   alert(res.error_message)
              }
            }
        });
        
     }


     function pagein(api){
      
         page = getQueryString("page") || parseInt($("#page").val());// 初始页码
         split  = parseInt($("#split").val()); //每页最大记录数    
       
         setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
         totalPage = Math.ceil(setTotalCount / split) ; //总页数  
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
                 getMemberlist(reloadUrl,'pagein');
                // $("#totalCount").html(setTotalCount)
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
            <td>`+data[k].name  +`</td>
            <td>`  
            if (data[k].gender==1){
                  gender = '男'
               }else{
                  gender ='女'
             }
                   
           trStr +=``+gender +`</td>
            <td>`+data[k].phone  +`</td>
            <td>`+data[k].email  +`</td>
            <td>`+data[k].qq_number  +`</td>
            <td>`+data[k].created_at  +`</td>
            <td class="td-status">`  
            if (data[k].status==1){
                  status = `<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>`
               }else{
                  status =` <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已停用</span>`
             }
                   
           trStr +=``+status +`</td>
            <td class="td-manage">
           `  
            if (data[k].status==1){
                  status = ` <a onclick="member_stop(this,'`+data[k].Id  +`')" href="javascript:;"  title="停用">
                      <i class="layui-icon">&#xe62f;</i> 
                    </a>`
               }else{
                  status =`  <a onclick="member_stop(this,'`+data[k].Id +`')" href="javascript:;"  title="启用">
                     <i class="layui-icon">&#xe601;</i> 
                    </a>`
             }
                   
           trStr += status+` <a title="编辑"  onclick="x_admin_show('编辑','/api/v2/user/`+data[k].Id +`/edit?page=1',600,600)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a onclick="x_admin_show('修改密码','/api/v2/user/`+data[k].Id +`/edit?page=0',600,400)" title="修改密码" href="javascript:;">
                <i class="layui-icon">&#xe631;</i>
              </a>
              <a title="删除" onclick="member_del(this,'`+data[k].Id +`')" href="javascript:;">
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

       /*会员-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把会员状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
            

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
              
              }
              
          });
      }

      /*会员-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              delMember(id);              
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
            delMember(data);       
            let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                   window.location.reload()
               }); 
        });
      }

       //删除
       function delMember(id) {
       
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
    <?php echo '</script'; ?>
>
   
   <?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
