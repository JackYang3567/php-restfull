<?php
/* Smarty version 3.1.33, created on 2019-05-21 15:26:11
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\signin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce3a813043772_18222852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3710756f4e54a968dcd1185da98d0907d45bd78' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\signin.tpl',
      1 => 1558423488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./layouts/header.tpl' => 1,
  ),
),false)) {
function content_5ce3a813043772_18222852 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:./layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
?>
<body class="login-bg">
    
        <div class="login layui-anim layui-anim-up">
            <div class="message">管理登录</div>
            <div id="darkbannerwrap"></div>            
            <form  class="layui-form" >
                <input name="name" placeholder="用户名"  type="text"  autocomplete="off"lay-verify="required" class="layui-input" >
                <hr class="hr15">
                <input name="pass" lay-verify="required" placeholder="密码" autocomplete="off"  type="password" class="layui-input">
                <hr class="hr15">           
                <input name="captcha" lay-verify="required" placeholder="验证码" autocomplete="off"  type="text" class="layui-input" style="width:150px"> 
                 <img id="img-captcha" onclick="getCaptcha();" src="/handler/session.php?type=admin&str=" class="captcha" />
               <hr class="hr15">
               
               <span> 请填写图片中的字符，不区分大小写  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="getCaptcha();">看不清楚？换张图片</a></span>
              <span id='error-msg'></span>
                <hr class="hr15">
                <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="button">
                <hr class="hr20" >
            </form> 
        </div>
    
        <?php echo '<script'; ?>
>
            function getCaptcha(){
                var imgpath= '/handler/session.php?type=admin&str='+Date.parse(new Date())+Math.random();
                $("#img-captcha").attr("src",imgpath) ;
            }

            $(function  () {
                layui.use('form', function(){
                  var form = layui.form;
                  form.on('submit(login)', function(data){
                       signin();
                  });
                });
            })
    
       function signin(){
          
          let data = $(".layui-form").serialize();
          $.ajax({
                url:'/backend/index.php/Admin/Signin',
                type:"POST",
                data:data,
                dataType:'JSON',
                success:function(res){
                  
                    if(res.success){
                            window.location.href = "/backend/index.php/Admin"
                    }else{
                        $("#error-msg").html(res.error_message)
                        $("#error-msg").attr('style','color:red;')
                    }
                }
            })
      }
        <?php echo '</script'; ?>
>
    </body>
    </html><?php }
}
