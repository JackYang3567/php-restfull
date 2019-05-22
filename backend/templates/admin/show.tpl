{include file="../layouts/header.tpl" title='GK数据API'}


<div class="layui-form-item"> </div>

<div class="layui-form-item">
    <label for="username" class="layui-form-label">
      登录名
    </label>
    <div class="layui-input-inline">
        <input type="text" id="username" name="username" disabled="" lay-verify="required"
        autocomplete="off" value="{$context->name}" class="layui-input">
    </div>
    
</div>
<div class="layui-form-item">
    <label for="phone" class="layui-form-label">
      手机
    </label>
    <div class="layui-input-inline">
        <input type="text" value="{$context->phone}" id="phone" name="phone" disabled="" lay-verify="phone"
        autocomplete="off" class="layui-input">
    </div>
   
</div>
<div class="layui-form-item">
    <label for="L_email" class="layui-form-label">
        邮箱
    </label>
    <div class="layui-input-inline">
        <input type="text" value="{$context->email}" id="L_email" name="email" disabled="" lay-verify="email"
        autocomplete="off" class="layui-input">
    </div>
   
</div>

<div class="layui-form-item">
    <label for="L_pass" class="layui-form-label">
       QQ号码
    </label>
    <div class="layui-input-inline">
        <input type="text" id="L_pass" name="pass" disabled='' value="{$context->qq_number}" lay-verify="pass"
        autocomplete="off" class="layui-input">
    </div>
   
</div>

{include file="../layouts/footer.tpl"}