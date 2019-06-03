<?php

require '../vendor/autoload.php';


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";

class AccessToken {
	public $sessionDB;
	public $redis;
	public $dp;
	public $dp_Recharge;
	static $FIELDS = array('member_id','token', 'opened','is_auth','status');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		session_start();
		
		$this->dp = new DB_AccessToken();
		$this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
	}

	function get($id=NULL) {
		//echo "uuid=====".$this->dp->getUuid()."\n";
		return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
	}

	
	

	function postAdd($request_data=NULL) {
	
		$uuid = Uuid::uuid4();
		$_uuid = strtoupper(str_replace('-','',$uuid->toString()));
		$request_data['token'] = $_uuid;
		
		return $this->dp->insert($request_data);
	}

	

	function postGetApi($code=NULL,$captcha=NULL){
		session_start();
		if(strtoupper($captcha)===strtoupper($_SESSION['FREE-CAPTCHA']))
		{
			$uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'Gk.com');
			$_uuid = strtoupper(str_replace('-','',$uuid5->toString()));
			$t = $code;
			$limit = 20;
			$token = $_uuid;
			$date = date("Ymd");

			$stop_time = date("Y-m-d G:H:s",strtotime('now'))."===". date("Y-m-d G:H:s",strtotime("+2 hours"));
			//  /json.php/api/$t/$limit/$token/$date
			$ret = array(
				"temporary_account" => array( 
					"res"=>"临时帐号",
					"val"=>$token),
				"stop_time"=> array(
					"res"=> "终止时间",
					"val"=> "$stop_time(共计120分钟)"),      
					"latest_query_json"=>  array(
					"res"=> "按最新查询JSON采集地址",
					"val"=> "/json.php/api/$t/$limit/$token"),
					"query_json_by_date"=> array(
					"res"=> "按日期查询JSON采集地址",
					"val"=> "/json.php/api/$t/$limit/$token/$date"),
					"latest_query_xml"=> array(
					"res"=> "按最新查询XML采集地址",
					"val"=> "/xml.php/api/$t/$limit/$token"),
					"query_xml_by_date"=>  array(
					"res"=> "按日期查询XML采集地址",
					"val"=> "/xml.php/api/$t/$limit/$token/$date")
			 );
			
			$freekey = "free:api:".$_uuid;
			$this->redis->set($freekey,1);
			$this->redis->expire($freekey,7200);
	        return $ret;
		}else{
			return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
		}
			
	}
	//function put($id=NULL, $request_data=NULL) {
	function postUpdate($id=NULL, $request_data=NULL) {
	
		//return $request_data;
		
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function postDel($id=NULL) {
	
		return $this->dp->delete($id);
	}
	
	private function _validate($data){
		$accesstoken=array();
		foreach (Lottery::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$accesstoken[$field]=$data[$field];
		}
		return $accesstoken;
	}
}