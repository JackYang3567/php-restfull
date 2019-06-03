{include file="../layouts/header.tpl" title='GK数据API'}
<form class="layui-form"  id="edit_form">
        <input type="hidden" id="Id" name="id" value="{$context['id']}">
        <div class="layui-form-item"></div>
        <div class="layui-form-item"></div>
        <div class="layui-form-item">
               <label for="type_id" class="layui-form-label">
                   <span class="x-red">*</span>彩票种类名
               </label>
               <div class="layui-input-inline">
                   <select type="select" id="type_id" required="" lay-verify="required"
                   autocomplete="off" class="layui-select" >
                   
                   </select>
               </div>
               <div class="layui-form-mid layui-word-aux">
                   <span class="x-red">*</span>彩票种类id
               </div>
       </div>
       <input type="hidden" name="type_id" id="type_id_val"  />
       <div class="layui-form-item">
           <label for="month_amount" class="layui-form-label">
               <span class="x-red">*</span>月付金额预
           </label>
           <div class="layui-input-inline">
               <input type="text" id="month_amount" onkeyup = "value=value.replace(/[^\d]/g,'')" name="month_amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red">*</span>月付金额预
           </div>
       </div>

       <div class="layui-form-item">
           <label for="discount" class="layui-form-label">
               <span class="x-red">*</span>折扣
           </label>
           <div class="layui-input-inline">
               <input type="text" id="discount" onblur="computerAmount()" onkeyup = "value=value.replace(/[^\d]/g,'')" name="discount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               折扣
           </div>
       </div>
       <div class="layui-form-item">
           <label for="sortId" class="layui-form-label">
               <span class="x-red">*</span>排序号
           </label>
           <div class="layui-input-inline">
               <input type="text" id="sortId"  onkeyup = "value=value.replace(/[^\d]/g,'')" name="sortId" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
                   排序号(数字)
           </div>
       </div>
       <div class="layui-form-item">
           <label for="season_amount" class="layui-form-label">
               <span class="x-red"></span>季付金额预
           </label>
           <div class="layui-input-inline">
               <input type="text" id="season_amount" readonly onkeyup = "value=value.replace(/[^\d]/g,'')" name="season_amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red"></span>
           </div>
       </div>

       <div class="layui-form-item">
           <label for="year_amount" class="layui-form-label">
               <span class="x-red"></span>年付金额预
           </label>
           <div class="layui-input-inline">
               <input type="text" id="year_amount" readonly onkeyup = "value=value.replace(/[^\d]/g,'')" name="year_amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red"></span>
           </div>
       </div>
       <div class="layui-form-item">
           <label for="three_yaear_amount" class="layui-form-label">
               <span class="x-red"></span>3年付金额预
           </label>
           <div class="layui-input-inline">
               <input type="text" id="three_yaear_amount" readonly  onkeyup = "value=value.replace(/[^\d]/g,'')" name="three_yaear_amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red"></span>
           </div>
       </div>
       <div class="layui-form-item">
           <label for="five_yaar_amount" class="layui-form-label">
               <span class="x-red"></span>5年付金额预
           </label>
           <div class="layui-input-inline">
               <input type="text" id="five_yaar_amount" readonly onkeyup = "value=value.replace(/[^\d]/g,'')" name="five_yaar_amount" required="" lay-verify="required"
               autocomplete="off" class="layui-input">
           </div>
           <div class="layui-form-mid layui-word-aux">
               <span class="x-red"></span>
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
    <script src="/backend/public/js/lottery.js"></script>
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
                if(parseInt($("#sortId").val())<= 0){
                    ret = false; 
                }
               return ret;
            }

            function computerAmount(){
               let unit = parseInt($("#month_amount").val())
               let discount = parseInt($("#discount").val())
               $("#season_amount").val(parseInt((discount/10 * unit*3)) )
               $("#year_amount").val( parseInt((discount-1)/10 * unit*12) )
               $("#three_yaear_amount").val( parseInt((discount-2)/10 * unit*36)  )
               $("#five_yaar_amount").val( parseInt((discount-3)/10 * unit*60) )  
             
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
               $("#discount").val(info.discount)
               $("#sortId").val(info.sortId)
               $("#month_amount").val(info.month_amount); 
               $("#season_amount").val(info.season_amount)
               $("#year_amount").val(info.year_amount )
               $("#three_yaear_amount").val(info.three_yaear_amount )
               $("#five_yaar_amount").val(info.five_yaar_amount ) 

               $("dd").each(function(){
                    if( $(this).attr("lay-value") == info.type_id){
                        //alert($(this).attr("lay-value"));
                        $("#type_id_val").val(info.type_id);
                        $(this).attr("class","layui-this");
                        $(".layui-select-title > input").attr("value",$(this).text());
                    }
                    $(this).attr("class","");
               })
           }
        </script> 
{include file="../layouts/footer.tpl"}