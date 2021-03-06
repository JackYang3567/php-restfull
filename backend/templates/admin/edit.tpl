{include file="../layouts/header.tpl" title='GK数据API'}
<form method="post"  class="layui-form" id="pass_form">
    <div class="layui-form-item"> </div>
   
    <input type="hidden"  name="Id" value="{$context->Id}">
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>旧密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>新密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_password" name="password" required="" lay-verify="password"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>确认密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="repassword"  required="" lay-verify="repass"
                autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit  type="button">
                提交
            </button>
        </div>
    </form>
    <script>
        $(function  () {
                layui.use('form', function(){
                  var form = layui.form;
                  form.on('submit(edit)', function(data){
                       submitPass();
                  });
                });
            })
    
        function submitPass(){
            if(check()){
                let reloadUrl ='/backend/index.php/Admin/UpdatePass';
                let data = $("#pass_form").serialize();
                $.ajax({
                    url:reloadUrl,
                    type:"POST",
                    data:data,
                    dataType:'JSON',
                    success:function(res){  
                        console.log('===',res.success)
                       if(res.success){
                        top.location.reload();
                        // window.location.href = "/backend/signin.php";
                       }
                            
                    }
                });
            }
        }

        function check(){
            let ret = true;
            if($("#L_pass").val().trim().length==0){
                ret = false; 
            }
            if($("#L_password").val().trim().length==0){
                ret = false; 
            }
            if($("#L_repass").val().trim().length==0){
                ret = false; 
            }
            if( $("#L_password").val().trim() !== $("#L_repass").val().trim() ){   
                ret = false;             
                //popMsg('新密码和确认密码不一致');  
             }
           return ret;
        }
         
        function popMsg(msg){
            let opt = new Object; 
            opt.icon = 1;
            opt.time = 100;
            layer.msg(msg,opt,function(){}); 
        }
    </script>
{include file="../layouts/footer.tpl"}