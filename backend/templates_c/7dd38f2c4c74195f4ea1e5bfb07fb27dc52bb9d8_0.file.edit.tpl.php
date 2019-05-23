<?php
/* Smarty version 3.1.33, created on 2019-05-23 12:42:47
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\members\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce624c7c273c9_23884267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dd38f2c4c74195f4ea1e5bfb07fb27dc52bb9d8' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\members\\edit.tpl',
      1 => 1558586545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/header.tpl' => 1,
    'file:../layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5ce624c7c273c9_23884267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'GK数据API'), 0, false);
if ($_smarty_tpl->tpl_vars['context']->value['page'] == 1) {?>
<form class="layui-form" method="POST" action="/member/index.php/Member/Update"  id="edit_form">
        <div class="layui-form-item"></div>
        <div class="layui-form-item">

            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>登录名
            </label>
            <div class="layui-input-inline">
                 <input type="hidden" id="Id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['context']->value['id'];?>
">
                
                 <input type="hidden"  name="mode" value="info">
                 <input type="hidden" name="status" id="status" >
                <input type="text" id="name" readonly name="name" required="" lay-verify="name"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>手机
            </label>
            <div class="layui-input-inline">
                <input type="text" id="phone" onkeyup="value=value.replace(/[^\d]/g,'')" name="phone" required="" lay-verify="phone"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>11位数字
            </div>
        </div>
        <div class="layui-form-item">
            <label for="email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="text" id="email" name="email" required="" lay-verify="email"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="x-red">*</span>性别</label>
            <div class="layui-input-block">
               <input type="radio" name="gender" id="gender_0" value="0" title="女" checked="">
              
               <input type="radio" name="gender" id="gender_1" value="1" title="男" checked="">
               
             </div>
        </div>
        <div class="layui-form-item">
            <label for="qq_number" class="layui-form-label">
                <span class="x-red">*</span>QQ号码
            </label>
            <div class="layui-input-inline">
                <input type="text" id="qq_number" onkeyup="value=value.replace(/[^\d]/g,'')" name="qq_number" required="" lay-verify="qq_number"
                autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到16位数字
            </div>
        </div>
      
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit  type="button" >
                保存 <!-- lay-submit=""-->
            </button>
        </div>
    </form>
    <?php } else { ?> 
    <form method="post"  class="layui-form" id="pass_form">
        <div class="layui-form-item"> </div>
        <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['context']->value['id'];?>
">
        <input type="hidden"  name="mode" value="resetpass">
            <div class="layui-form-item">
             <!--   <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>旧密码
                </label>-->
                <div class="layui-input-inline">
                    <input type="hidden" id="L_pass" name="pass"  lay-verify="pass"
                    autocomplete="off" class="layui-input">
                </div>
              <!--  <div class="layui-form-mid layui-word-aux">
                    6到16个字符
                </div> -->
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>新密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_password" name="password" readonly value="111111" lay-verify="password"
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
                    <input type="password" id="L_repass" name="repassword" readonly value="111111" required="" lay-verify="repass"
                    autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label  class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="pass" lay-submit  type="button">
                    保存
                </button>
            </div>
        </form>
    <?php }?> 
    <?php echo '<script'; ?>
>
        $(function  () {
                getMemberById();
                layui.use('form', function(){
                  var form = layui.form,
                      layer = layui.layer;
                  form.on('submit(edit)', function(data){
                       submitUpdate();
                  });

                  form.on('submit(pass)', function(data){
                       updatePass();
                  });
                });
        })
    
        function submitUpdate(){
            if(check()){
                let reloadUrl ='/member/index.php/Member/Update';
                let data = $("#edit_form").serialize();
               
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
        
        function updatePass(){
            if( checkPass()){
                let reloadUrl ='/member/index.php/Member/Update';
                let data = $("#pass_form").serialize();
              
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

        function checkPass(){
            let ret = true;
           // if($("#L_pass").val().length==0){
            //    ret = false; 
            //}
            if($("#L_password").val().length==0){
                ret = false; 
            }
            if($("#L_repass").val().length==0){
                ret = false; 
            }
           return ret;
        }
        function getMemberById(){
              
                let reloadUrl ='/member/index.php/Member?id='+$("#Id").val();
                let data ='';
                $.ajax({
                    url:reloadUrl,
                    type:"GET",
                    data:data,
                    dataType:'JSON',
                    success:function(res){  
                       if(res.success){
                        renderInfo(res.data);
                       }
                    }
                });
        }

        function renderInfo(info){ 
           $("#name").val(info.name); 
           $("#phone").val(info.phone); 
           $("#qq_number").val(info.qq_number); 
           $("#email").val(info.email);
           $("#status").val(info.status);
           if(parseInt(info.gender) == 1){
            $("#gender_show_1").attr("class");
              $("#gender_1").attr("checked","checked");
              $("#gender_0").removeAttr("checked");
              $('#gender_0 + div').removeClass("layui-form-radioed");
              $('#gender_0 > i').removeClass("layui-anim-scaleSpring");
              $('#gender_1 + div').addClass("layui-form-radioed");//layui-anim-scaleSpring
              $('#gender_1 > i').addClass("layui-anim-scaleSpring");
           }
           if(parseInt(info.gender) == 0){
               $("#gender_0").attr("checked","checked");
               $("#gender_1").removeAttr("checked");
               $('#gender_1 + div').removeClass("layui-form-radioed");
               $('#gender_1 > i').removeClass("layui-anim-scaleSpring");
               $('#gender_0 + div').html('<i class="layui-anim layui-icon"></i><div>女</div>');
              // $('#gender_0 > i').html("&#xe643;");
             // "&#xe63f;"
               $('#gender_1 + div').html( '<i class="layui-anim layui-icon"></i><div>男</div>');
               
              $('#gender_0 + div').addClass("layui-form-radioed");
              $('#gender_0 > i').addClass("layui-anim-scaleSpring");
           }
       }
         
        function popMsg(msg){
            let opt = new Object; 
            opt.icon = 1;
            opt.time = 100;
            layer.msg(msg,opt,function(){}); 
        }
    <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
