{config_load file="test.conf" section="setup"}
{include file="../layouts/header.tpl" title='GK数据API'}
 
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
    
        <div class="page">
            <div class="box" id="box"></div>
        </div>
  
        <div style="display:none">
          <input type="hidden" id="pageStart" value="1">
          <input type="hidden" id="split" value="10">
          <input type="hidden" id="setTotalCount" value="">
          <input type="hidden" id="searchStr">
          <input type="hidden" id="api" value="/member/index.php/Member">
      </div>

    </div>
    <script>

      var api = $("#api").val()
      var pageStart = getQueryString("page") || parseInt($("#pageStart").val());// 初始页码
      var split  = parseInt($("#split").val()); //每页最大记录数 
      var setTotalCount = parseInt($("#setTotalCount").val()) || parseInt($("#totalCount").html()); //总记录数
      var totalPage = Math.ceil(setTotalCount / split); //总页数
      var searchStr =$("#search").serialize()
      var apiUrl = api+'?page='+pageStart+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
    
      
      $(function(){
          getMemberlist(apiUrl);
      })  
   

    
    //load info
     function getMemberlist(apiUrl){
        $.ajax({
            url:apiUrl,
            type:"GET",
            data:'',
            success:function(res){    
              //console.log(res);          
               if(res.success){   
                   $("#setTotalCount").val(res.data.count); //总记录数
                   $("#totalCount").html(res.data.count) ;
                  
                    generatorTableTr(res.data.rows)
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
         totalPage = Math.ceil(setTotalCount / split) ; //总页数  
         
         $('#box').paging({
            initPageNo: pageStart, // 初始页码
            totalPages: totalPage, //总页数
            totalCount: '合计' + setTotalCount + '条数据', // 条目总数
            slideSpeed: 600, // 缓动速度。单位毫秒
            jump: true, //是否支持跳转
            callback: function(page) { // 回调函数 split当前页码
             
                //alert(pageStart+"----"+page);
                apiUrl = api+'?page='+page+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
               
                if(pageStart!==page){
                  $("#pageStart").val(page);
                  getMemberlist(apiUrl);
                }
              
            }
         })
       
            if(setTotalCount<1){
              $('#box').html('<h1 style="margin-left:80px">没有符合条件的记录</h1>')
              return
            } 
           // $('#box').html('')
       
      }
      
       function generatorTableTr(data){
       let trStr = ``
       let gender =''
       let status = ''
       let len = data.length
       for(let k=0;k<len;k++){
      
       trStr +=`<tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" onclick="encheched(this);" lay-skin="primary" data-id='`+data[k].Id+`'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>`+data[k].Id +`</td>
            <td>`+data[k].name  +`</td>
            <td>`  
            if (data[k].gender==1){
                  gender = '男'
               }else{
                  gender ='女'
             }
                   
           trStr += gender +`</td>
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
                   
           trStr += status+` <a title="编辑"  onclick="x_admin_show('编辑会员信息','/backend/index.php/Admin/EditMember?id=`+data[k].Id +`&page=1',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a onclick="x_admin_show('重置会员密码','/backend/index.php/Admin/EditMember?id=`+data[k].Id +`&page=0',600,400)" title="重置密码" href="javascript:;">
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

     

       /*会员-停用*/
      function member_stop(obj,id){
             let _title = $(obj).attr('title');
        layer.confirm('确认要'+_title +'吗？',function(index){
              let opt = new Object; 
               opt.icon = 5;
               opt.time = 1000;
              let props = new Object;
                  props.id = id;
            if($(obj).attr('title')=='停用'){

              //发异步把用户状态进行更改
                 props.status = 0;
                 updateMember(props);
                 $(obj).attr('title','启用')
                 $(obj).find('i').html('&#xe601;');

                 $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                 layer.msg('已停用!',opt);

            }else{
                props.status = 1;
                opt.icon = 1;
                opt.time = 1000;
                updateMember(props);
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');
               

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',opt);
            }
            });
      }

//更新
     function updateMember(props) {       
         let data = "mode=status&id="+props.id+"&status="+ props.status; // $(".layui-form").serialize()
         let url = '/member/index.php/Member/Update';
         
         $.ajax({
            url:url,
            type:"post",
            data:data,
            success:function(res){
               // console.log("------res==",res);
                if(res.success){
                   apiUrl = api+'?page='+pageStart+'&split='+split+'&t='+Date.parse(new Date())+Math.random(); //更新后刷新当前页
                   getMemberlist(apiUrl);     
                }
                else{
                   alert(res.error_message)
              }
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
                   //window.location.reload();
               }); 
               
          });
      }



      function delAll (argument) {
        var data = tableCheck.getData();
        let opt = new Object; 
               opt.icon = 1;
        if(data.length<1)
        {
            layer.msg('请勾选要删除的记录',opt);
            return false;
        }
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            delMember(data);                  
               opt.time = 1000;
               layer.msg('已删除!',opt,function(){
                  // window.location.reload();
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
                   getMemberlist(apiUrl);     
                }
                else{
                   alert(res.error_message)
              }
            }
        });   
           
     }   

    

    </script>
   
   {include file="../layouts/footer.tpl"}