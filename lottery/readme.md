
# RESTfull method
list   get : /lottery/index.php/Lottery 
add    post: /lottery/index.php/Lottery/Add 
update post: /lottery/index.php/Lottery/Update 
del    post: /lottery/index.php/Lottery/Del  

# 临时帐号: F49E345AB926F152
终止时间: 2019-05-14 12:15:50(共计120分钟)
按最新查询XML采集地址: 
     http://api.b1api.com/t?p=xml&t=gxk3&limit=20&token=F49E345AB926F152
按最新查询JSON采集地址:
     http://api.b1api.com/t?p=json&t=gxk3&limit=20&token=F49E345AB926F152
按日期查询XML采集地址: 
     http://api.b1api.com/t?p=xml&t=gxk3&token=F49E345AB926F152&date=20190514
按日期查询JSON采集地址:
     http://api.b1api.com/t?p=json&t=gxk3&token=F49E345AB926F152&date=20190514
账号说明：临时账号仅供“实时开奖接口”中试用，请勿用于"正式付费接口"中

```
arrary(
    "temporary_account"=> {
      "res"=> "临时帐号",
      "val"=> "F49E345AB926F152"
    } ,    
    "stop_time"=> {
      "res"=> "终止时间",
      "val"=> "2019-05-14 12:15:50(共计120分钟)"
    } ,          
    "latest_query_json"=>  {
      "res"=> "按最新查询JSON采集地址",
      "val"=> "/t?p=json&t=gxk3&limit=20&token=F49E345AB926F152"
    },   
    "query_json_by_date"=> {
      "res"=> "按日期查询JSON采集地址",
      "val"=> "/t?p=json&t=gxk3&token=F49E345AB926F152&date=20190514"
    } ,   
    "latest_query_xml"=>  {
      "res"=> "按最新查询XML采集地址",
      "val"=> "/t?p=xml&t=gxk3&limit=20&token=F49E345AB926F152"
    },   
    "query_xml_by_date"=> {
      "res"=> "按日期查询XML采集地址",
      "val"=> "t?p=xml&t=gxk3&token=F49E345AB926F152&date=20190514"
    } ,  
)
```