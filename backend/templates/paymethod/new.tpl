{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form">

        
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
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                增加
            </button>
        </div>
    </form>

    <script>
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

                       
                      
                    }
                    else{
                        alert(res.error_message)
                }
                }
            });
            
        }
    </script>
{include file="../layouts/footer.tpl"}