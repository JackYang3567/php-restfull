$(function(){
    getLotteryTypeIds();
 })

function changeSelect(obj){
         $("dd").each(function(){
             $(this).attr("class","");
         })
        $(".layui-select-title > input").attr("value",$(obj).text());
        $(obj).attr('class','layui-this');
        $("#type_id_val").val($(obj).attr('lay-value'));
}

 

    function getLotteryTypeIds(){
     let Url = '/lotterytype/index.php/LotteryType';
     $.ajax({
         url:Url,
         type:"GET",
         data:'',
         success:function(res){    
             if(res.success){ 
                generatorSelectList(res.data.count,res.data.rows);
             }
             else{
                 alert(res.error_message);
             }
          }
     });             
 }


 function generatorSelectList(count,data){
   let option = '';
   let ddStr = '';
   for(let k=0;k<data.length;k++){
           option +='<option value="'+data[k].Id+'">'+ data[k].type_name+'</option>';
           ddStr +='<dd onclick="changeSelect(this)" lay-value="'+data[k].Id+'" class="" >'+ data[k].type_name+'</dd>';
   };
  
     $(".layui-select-title > input").attr("value",data[0].type_name);
     $(".layui-select-title > input").attr("readonly"," ");
     $("#type_id").html(option);
     $("dl").html(ddStr);
     $("dl").removeAttr("style");
    
 }