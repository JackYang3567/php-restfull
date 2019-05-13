<?php
     
    //工具类
    //include 'util.php';
 
    class api
    {
        //&t=jsk3&limit=20&token=CA8D17EB60DBFFFD
         //get 请求   /json.php/api/show/dlt/10/CA8D17EB60DBFFFD
        function getShow($t='', $limit=10, $token) {
           // return "Hello $to!";
            return array(
            'id' =>"7169 ",
            'expect' =>"2019023 ",
           'code' =>"01,03,14,26,30,06,11",
           'type' =>"dlt",
           'time' =>"2019-03-02 20:30:00",
         );
        }
        //get 请求 /url/xml
       //get 请求  /index.php/api/xml/?deviceType=2
        public function getXml($deviceType)
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