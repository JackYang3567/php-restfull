{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form" id="add_form">

        
         <div class="layui-form-item"></div>
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>支付方式名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="name" name="name" required="" lay-verify="required"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的支付方式名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="code" class="layui-form-label">
                <span class="x-red">*</span>支付方式编码
            </label>
            <div class="layui-input-inline">
                <input type="text" id="code" name="code" required="" lay-verify="required"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>唯一的支付方式编码
            </div>
        </div>
        <div class="layui-form-item">
            <label for="icon_path" class="layui-form-label">
                <span class="x-red">*</span>支付方式图标
            </label>
            <div class="layui-input-inline">
                <input type="text"  id="icon_path" name="icon_path" required="" lay-verify="required"
                autocomplete="off" class="layui-input" /> 
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>支付方式图标
            </div>
        </div>
        <div class="layui-form-item">
                <label for="qrcode_path" class="layui-form-label">
                    <span class="x-red">*</span>收款二维码图
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="qrcode_path" name="qrcode_path" required="" lay-verify="required"
                    autocomplete="off" class="layui-input" />
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>收款二维码图
                </div>
            </div>
            <div class="layui-form-item">
                    <label for="sortId" class="layui-form-label">
                        <span class="x-red">*</span>排序号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="sortId" onkeyup = "value=value.replace(/[^\d]/g,'')" name="sortId" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                            排序号(数字)
                    </div>
                </div>   
        <div class="layui-form-item">
            <label  class="layui-form-label">
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
                let reloadUrl ='/paymethod/index.php/Paymethod/Add';
                let data = $("#add_form").serialize();
               // alert(data);
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
            if($("#code").val().length==0){
                ret = false; 
            }
            if($("#icon_path").val().length==0){
                ret = false; 
            }
            if( $("#qrcode_path").val().length==0 ){   
                ret = false; 
             }
           return ret;
        }
    </script>
{include file="../layouts/footer.tpl"}