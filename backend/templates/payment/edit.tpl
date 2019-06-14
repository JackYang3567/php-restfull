{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form"  id="edit_form">
        <input type="hidden" id="Id" payer="id" value="{$context['id']}">
        <div class="layui-form-item"></div>
        <div class="layui-form-item"></div>
       
       <input type="hidden" payer="id" id="id_val"  />
       <div class="layui-form-item">
           <label for="payer" class="layui-form-label">
               <span class="x-red"></span>充值会员名
           </label>
           <div class="layui-input-inline">
               <input type="text" id="payer" readonly payer="payer" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           
       </div>

       <div class="layui-form-item">
           <label for="amount" class="layui-form-label">
               <span class="x-red"></span>充值金额
           </label>
           <div class="layui-input-inline">
               <input type="text" id="amount" readonly  onblur="computerAmount()" onkeyup = "value=value.replace(/[^\d]/g,'')" payer="amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           
       </div>
       <div class="layui-form-item">
           <label for="pay_account_four" class="layui-form-label">
               <span class="x-red"></span>转账单号
           </label>
           <div class="layui-input-inline">
               <input type="text" id="pay_account_four" readonly  onkeyup = "value=value.replace(/[^\d]/g,'')" payer="pay_account_four" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
                <span class="x-red"></span>转账单号最后四位
            </div>
       </div>
       <div class="layui-form-item">
           <label for="method" class="layui-form-label">
               <span class="x-red"></span>支付方式
           </label>
           <div class="layui-input-inline">
               <input type="text" id="method" readonly onkeyup = "value=value.replace(/[^\d]/g,'')" payer="method" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red"></span>
           </div>
       </div>
       <div class="layui-form-item">
            <label class="layui-form-label"><span class="x-red">*</span>是否到账</label>
            <div class="layui-input-block">
               <input type="radio" payer="examine" id="examine_0" value="0" title="未到账" checked="">
              
               <input type="radio" payer="examine" id="examine_1" value="1" title="已到账" checked="">
               
             </div>
            
        </div>
       
        <div class="layui-form-item">
            <label  class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit  type="button">
                通过到账审核
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
                    let reloadUrl ='/payment/index.php/Payment/Update';
                    let data = $("#edit_form").serialize();
                    alert(data);
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
                if(parseInt($("#month_amount").val())<= 0){
                ret = false; 
                }
                if(parseInt($("#season_amount").val())<= 0){
                    ret = false; 
                }
                if(parseInt($("#discount").val())<= 0){
                    ret = false; 
                }
               
               return ret;
            }

           
           
            function getDataById(){
                    let reloadUrl ='/payment/index.php/Payment?id='+$("#Id").val();
                    // alert(reloadUrl)
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
           $("#payer").val(info.payer); 
           $("#amount").val(info.amount); 
           $("#method").val(info.name); 
           $("#pay_account_four").val(info.pay_account_four);
          
           if(parseInt(info.examine) == 1){
            $("#examine_show_1").attr("class");
              $("#examine_1").attr("checked","checked");
              $("#examine_0").removeAttr("checked");
              $('#examine_0 + div').removeClass("layui-form-radioed");
              $('#examine_0 > i').removeClass("layui-anim-scaleSpring");
              $('#examine_1 + div').addClass("layui-form-radioed");//layui-anim-scaleSpring
              $('#examine_1 > i').addClass("layui-anim-scaleSpring");
           }
           if(parseInt(info.examine) == 0){
               $("#examine_0").attr("checked","checked");
               $("#examine_1").removeAttr("checked");
               $('#examine_1 + div').removeClass("layui-form-radioed");
               $('#examine_1 > i').removeClass("layui-anim-scaleSpring");
               $('#examine_0 + div').html('<i class="layui-anim layui-icon"></i><div>未到账</div>');
              // $('#examine_0 > i').html("&#xe643;");
             // "&#xe63f;"
               $('#examine_1 + div').html( '<i class="layui-anim layui-icon"></i><div>已到账</div>');
               
              $('#examine_0 + div').addClass("layui-form-radioed");
              $('#examine_0 > i').addClass("layui-anim-scaleSpring");
           }
       }
        </script> 
{include file="../layouts/footer.tpl"}