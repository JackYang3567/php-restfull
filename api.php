<?php
     
    //工具类
    //include 'util.php';
 
    const LOTTERY_DOES_NOT_EXIST = "彩票不存在";
    const TOKEN_ERROR = "Token错误";
    class api
    {
        function __construct(){
            $this->dp = new DB_Api();
            $this->redis = new Redis();
            $this->redis->connect('127.0.0.1', 6379);
        }

         //           /json.php/api/$T/$limit/$token/$date
         //get 请求   /json.php/api/dlt/10/CA8D17EB60DBFFFD/20190514
         //get 请求   /xml.php/api/dlt/10/CA8D17EB60DBFFFD/20190514
        function get($t,$limit=10,$token,$date=NULL) {
                $freekey = "free:api:".$token;
                if($this->redis->exists($freekey))
                {
                    return  $this->dp->getAll($t,$limit,$token,$date);
                }
                else{
                  return array(  "success"=> false,  "code"=>1, "error_message"=>TOKEN_ERROR,"data"=>'' );
                }
               
        }

       //get 请求 /url/xml
       //get 请求  /index.php/api/Xml/dlt/10/CA8D17EB60DBFFFD
        public function getXml($t='', $limit=10, $token)
        {
            if (!$deviceType) {
                return array('xml' =>"error ");
            }
 
            if ($deviceType=='1') {
                 
                //return ios
                return array('xml' =>"ios");
            }
            elseif ($deviceType=='2') {
                 
                //return android
                return array('xml' =>"android");
            }
 
            elseif ($deviceType=='3') {
                //return pc
                return array('xml' =>"pc");
            }
 
            else
            {
                return array('xml' =>"none support deviceType");
            }
 
        }
 
        //post 请求,
        public function postXXL($dev)
        {
            return returnXML($dev);
        }
 
 
        //当类名与文件名相同时，可以不用 include 该类
        public function getAAA()
        {
            $bd = new Baidu();
            return $ret = array('site' => "baidu.com", );;
        }
 
    }
     
?>