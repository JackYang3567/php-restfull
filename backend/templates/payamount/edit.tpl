{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form"  id="edit_form">
        <input type="hidden" id="Id" name="id" value="{$context['id']}">
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
            <label for="amount_val" class="layui-form-label">
                <span class="x-red">*</span>预设金额
            </label>
            <div class="layui-input-inline">
                <input type="text" id="amount_val" onkeyup="value=value.replace(/[^\d]/g,'')" name="amount_val" required="" lay-verify="required"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的预设金额(数字)
            </div>
        </div>
        <div class="layui-form-item">
            <label for="sortId" class="layui-form-label">
                <span class="x-red">*</span>排序号 
            </label>
            <div class="layui-input-inline">
                <input type="text" id="sortId" onkeyup="value=value.replace(/[^\d]/g,'')" name="sortId" required="" lay-verify="required"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                    排序号(数字)
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
                    let reloadUrl ='/payamount/index.php/Payamount/Update';
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
                if($("#amount_val").val().length==0){
                    ret = false; 
                }
                if($("#sortId").val().length==0){
                    ret = false; 
                }
               return ret;
            }
    
           
            function getDataById(){
                    let reloadUrl ='/payamount/index.php/Payamount?id='+$("#Id").val();
                  
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
               $("#amount_val").val(info.amount_val); 
               $("#sortId").val(info.sortId); 
              
           }
        </script> 
{include file="../layouts/footer.tpl"}