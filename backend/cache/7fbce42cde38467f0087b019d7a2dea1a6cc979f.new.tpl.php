<?php
/* Smarty version 3.1.33, created on 2019-05-20 18:23:18
  from 'D:\works\vmsworks\phpworks\rest-data\backend\templates\lotterytype\new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce28016138356_57526968',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    'c27fc0342006babd9c0f20cec004d198c976f0ff' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\lotterytype\\new.tpl',
      1 => 1558344841,
      2 => 'file',
    ),
    'bb5432901cd78217ae80477be6fdda468253f971' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\header.tpl',
      1 => 1558331771,
      2 => 'file',
    ),
    '587f9afb1f771f025ea977f6075bb8af385b96bc' => 
    array (
      0 => 'D:\\works\\vmsworks\\phpworks\\rest-data\\backend\\templates\\layouts\\footer.tpl',
      1 => 1558311118,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ce28016138356_57526968 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<HTML  class="x-admin-sm">
<HEAD>
	<meta charset="UTF-8">
	<TITLE>GK数据API - <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</TITLE>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/backend/public/css/font.css">
    <link rel="stylesheet" href="/backend/public/css/xadmin.css">
    <link rel="stylesheet" href="/backend/public/css/paging.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/backend/public/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/backend/public/js/xadmin.js"></script>
    <script type="text/javascript" src="/backend/public/js/cookie.js"></script>
    <script src="/backend/public/js/paging.js"></script>
</HEAD>
<BODY><form class="layui-form">

        
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


 
</BODY>
</HTML>
<?php }
}
