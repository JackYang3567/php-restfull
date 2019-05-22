
{include file="../layouts/header.tpl" title='GK数据API'}
  
  <body>
    
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
          <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入彩票名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加彩票','/backend/index.php/Admin/NewLottery',600,400)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span id="totalCount"></span> 条</span>
      </xblock>
      <table class="layui-table x-admin">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>彩票名</th>
            <th>彩票类型ID</th>
            <th>彩票类型编码</th>
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
          <input type="hidden" id="pageStart" value="1">
          <input type="hidden" id="split" value="10">
          <input type="hidden" id="setTotalCount">
          <input type="hidden" id="searchStr">
          <input type="hidden" id="api" value="/lottery/index.php/Lottery">
      </div>

    </div>
    <script>

      var api = $("#api").val()
      var pageStart = getQueryString("page") || parseInt($("#pageStart").val());// 初始页码
      var split  = parseInt($("#split").val()); //每页最大记录数       
      var setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
      var totalPage = Math.ceil(setTotalCount / split); //总页数
      var searchStr =$("#search").serialize()
      var reloadUrl = api+'?page='+pageStart+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
    
      $(function(){
          getLotterylist(reloadUrl);
          pagein();
      })  
   

    
    //load info
     function getLotterylist(reloadUrl,step=''){
        $.ajax({
            url:reloadUrl,
            type:"GET",
            data:'',
            success:function(res){    
              console.log(res);          
               if(res.success){     

                   $("#setTotalCount").val(res.data.count); //总记录数
                   $("#totalCount").html(res.data.count);      
                   generatorTableTr(res.data.rows);
                   pagein();
                }
                else{
                   alert(res.error_message)
              }
            }
        });
        
     }


     function pagein(){
      
         pageStart =  parseInt($("#pageStart").val());// 初始页码
         split  = parseInt($("#split").val()); //每页最大记录数       
         setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
         totalPage = Math.ceil(setTotalCount / split); //总页数  
       // alert("setTotalCount > split"+setTotalCount +">"+split);      
     
         // alert("paging");
         $('#box').paging({
            initPageNo: pageStart, // 初始页码
            totalPages: totalPage, //总页数
            totalCount: '合计' + setTotalCount + '条数据', // 条目总数
            slideSpeed: 600, // 缓动速度。单位毫秒
            jump: true, //是否支持跳转
            callback: function(page) { // 回调函数 split当前页码
               
                 reloadUrl = api+'?page='+page+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
                 if(pageStart!==page){
                   $("#pageStart").val(page);
                   getLotterylist(reloadUrl,'pagein');
                }
            }
         })
       
            if(setTotalCount<1){
              $('#box').html('<h1 style="margin-left:80px">没有符合条件的记录</h1>')
              return
            } 
          
       
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
            <th>`+data[k].type_id  +`</th>
            <td>`+data[k].code  +`</td>
            <td>`+data[k].remarks  +`</td>
            <td class="td-manage">
           `  
           
                   
           trStr += status+` <a title="编辑"  onclick="x_admin_show('编辑','/api/v2/user/`+data[k].Id +`/edit?page=1',600,600)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
             
              <a title="删除" onclick="lottery_del(this,'`+data[k].Id +`')" href="javascript:;">
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
      function lottery_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              delLottery(id);              
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
            delLottery(data);       
            let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                   window.location.reload()
               }); 
        });
      }

       //删除
       function delLottery(id) {
       
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
   
   {include file="../layouts/footer.tpl"}