{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form" id="add_form">

        
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
            <label for="L_remarks" class="layui-form-label">
                <span class="x-red">*</span>彩票种类备注
            </label>
            <div class="layui-input-inline">
                <textarea type="text" rows="8" cols="16" id="L_remarks" name="remarks" required="" lay-verify="remarks"
                autocomplete="off" class="layui-textarea"> </textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>
        
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit  type="button">
                保存
            </button>
        </div>
    </form>

    <script>
         $(function  () {
                layui.use('form', function(){
                  var form = layui.form,
                      layer = layui.layer;
                  form.on('submit(add)', function(data){
                       submitAdd();
                  });
                });
            })
    
        function submitAdd(){
           
            if(check()){
                let reloadUrl ='/recharge/index.php/Recharge/Add';
                let data = $("#add_form").serialize();
                $.ajax({
                    url:reloadUrl,
                    type:"POST",
                    data:data,
                    dataType:'JSON',
                    success:function(res){  
                        console.log('===',res.success)
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
            if($("#name").val().length==0){
                ret = false; 
            }
            if($("#phone").val().length==0){
                ret = false; 
            }
            if($("#qq_number").val().length==0){
                ret = false; 
            }
            if( $("#email").val().length==0 ){   
                ret = false;             
                //popMsg('新密码和确认密码不一致');  
             }
           return ret;
        }
    </script>
{include file="../layouts/footer.tpl"}