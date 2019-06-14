{config_load file="test.conf" section="setup"}
{include file="../layouts/header.tpl" title='GK数据API'}
  
  <body>
   
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
          <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入预设金额名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
       <!-- <button class="layui-btn" onclick="x_admin_show('添加预设金额','/backend/index.php/Admin/NewPayment',600,550)"><i class="layui-icon"></i>添加</button> -->
        <span class="x-right" style="line-height:40px">共有数据：<span id="totalCount"></span> 条</span>
      </xblock>
      <table class="layui-table x-admin">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>订单号</th>
            <th>充值会员名</th>
            <th>支付方式</th>
            <th>充值金额</th>
            <th>转账单号后四位数</th>
            <th>到账审核</th>
            <th>备注</th>
            <th>操作</th>
          </tr>
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
          <input type="hidden" id="api" value="/payment/index.php/Payment">
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
          getPaymentlist(reloadUrl);
          pagein();
      })  
   

    
    //load info
     function getPaymentlist(reloadUrl){
       // alert(reloadUrl)
        $.ajax({
            url:reloadUrl,
            type:"GET",
            data:'',
            success:function(res){    
              console.log("======res====",res);          
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
                   getPaymentlist(reloadUrl);
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
     
       let len = data.length
      
       for(let k=0;k<len;k++){
       let examine = '未到账'
       if(parseInt(data[k].examine)>1){
        examine = '到账通过'
       }
       trStr +=`<tr>
            <td>
                <div class="layui-unselect layui-form-checkbox"  onclick="encheched(this);"  lay-skin="primary" data-id='`+data[k].Id+`'><i class="layui-icon">&#xe605;</i></div>
              
            </td>
            <td>`+data[k].Id +`</td>
            <td>`+data[k].order_id  +`</td>
            <td>`+data[k].payer  +`</td>
            <td>`+data[k].name  +`</td>
            <td>`+data[k].amount  +`</td>
           
            <td>`+data[k].pay_account_four +`</td>
            <td>`+ examine  +`</td>
            <td>`+data[k].notes  +`</td>
           
            <td class="td-manage">
           `   
           trStr += ` <a title="审核"  onclick="x_admin_show('充值到账审核','/backend/index.php/Admin/EditPayment?id=`+data[k].Id +`',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
             
              <a title="删除" onclick="payment_del(this,'`+data[k].Id +`')" href="javascript:;">
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
     function payment_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              delPayment(id);              
               let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                  
               }); 
               
          });
      }



      function delAll (argument) {
        var data = tableCheck.getData();
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            delPayment(data);       
            let opt = new Object; 
               opt.icon = 1;
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                  
               }); 
        });
      }

       //删除
       function delPayment(id) {
       
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
                    getPaymentlist(reloadUrl);     
                }
                else{
                   alert(res.error_message)
              }
            }
        });   
           
     } 
    </script>
   
   {include file="../layouts/footer.tpl"}