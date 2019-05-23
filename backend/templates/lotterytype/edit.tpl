{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form"  id="edit_form">
        <input type="hidden" id="Id" name="id" value="{$context['id']}">
    <div class="layui-form-item"></div>
   
    <div class="layui-form-item">
        <label for="type_name" class="layui-form-label">
            <span class="x-red">*</span>彩票种类名
        </label>
        <div class="layui-input-inline">
            <input type="text" id="type_name" name="type_name" required="" lay-verify="required"
            autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <span class="x-red">*</span>唯一的彩票种类名
        </div>
    </div>
    <div class="layui-form-item">
        <label for="type_code" class="layui-form-label">
            <span class="x-red">*</span>彩票种类编码
        </label>
        <div class="layui-input-inline">
            <input type="text" id="type_code" name="type_code" required="" lay-verify="type_code"
            autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <span class="x-red">*</span>唯一的彩票种编码
        </div>
    </div>
    <div class="layui-form-item">
        <label for="remarks" class="layui-form-label">
           彩票种类备注
        </label>
        <div class="layui-input-inline">
            <textarea type="text" rows="8" cols="16" id="remarks" name="remarks" required="" lay-verify="remarks"
            autocomplete="off" class="layui-textarea"> </textarea>
        </div>
        
    </div>
        <div class="layui-form-item">
                <label  class="layui-form-label">
                    </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit  type="button">
                保存
            </button>
        </div>
    </form>

    <script>
        $(function  () {
                getDataById();
                layui.use('form', function(){
                  var form = layui.form,
                      layer = layui.layer;
                  form.on('submit(edit)', function(data){
                       submitUpdate();
                  });
                });
        })
    
        function submitUpdate(){
            if(check()){
                let reloadUrl ='/lotterytype/index.php/LotteryType/Update';
                let data = $("#edit_form").serialize();
               // alert(data);
                 $.ajax({
                    url:reloadUrl,
                    type:"post",
                     data:data,
                     success:function(res){ 
                        if(res.success){      
                            let opt = new Object; 
                           opt.icon = 1;
                            layer.alert("操作成功",opt,function () {
                                //关闭当前frame
                                x_admin_close();
                                // 可以对父窗口进行刷新 
                                x_admin_father_reload();
                            });
                       }
                    }
                });
            }
        }
        function check(){
            let ret = true;
            if($("#type_name").val().length==0){
                ret = false; 
            }
            if($("#type_code").val().length==0){
                ret = false; 
            }
            if($("#remarks").val().length==0){
                ret = false; 
            }
           return ret;
        }

       
        function getDataById(){
                let reloadUrl ='/lotterytype/index.php/LotteryType?id='+$("#Id").val();
              
                let data = '';
                $.ajax({
                    url:reloadUrl,
                    type:"GET",
                    data:data,
                    success:function(res){  
                       if(res.success){
                         renderInfo(res.data);
                       }
                    }
                });
        }

        function renderInfo(info){ 
           $("#type_name").val(info.type_name); 
           $("#type_code").val(info.type_code); 
           $("#remarks").val(info.remarks); 
          
       }
    </script>
{include file="../layouts/footer.tpl"}