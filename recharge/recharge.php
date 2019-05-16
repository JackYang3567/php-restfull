<?php

require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";

class Recharge {
	
	public $redis;
	public $dp;
	
	static $FIELDS = array('token_id','amount', 'purchase_month','code');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		session_start();
		$this->dp = new DB_Recharge();
		
		$this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
	}

	function get($id=NULL) {
		//echo "uuid=====".$this->dp->getUuid()."\n";
		return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
	}

	
	

	function postAdd($request_data=NULL) {
		
		//$uuid = Uuid::uuid4();
		//$_uuid = strtoupper(str_replace('-','',$uuid->toString()));

		$request_data['member_id'] = $_SESSION['member_id'];
		//$request_data['token'] = $_uuid;
		
		return $this->dp->insert($request_data);
	}

	
	function postGetApi($request_data=NULL){
		echo "<pre>===111";
        var_dump($request_data);
		echo "</pre>";
		$apiItem = $this->dp->getTokenId_Code($request_data);
		echo "<pre>===111";
        var_dump($apiItem->token);
		echo "</pre>";
		
		if($apiItem )
		{
			$t = $apiItem->code;
			$limit = 20;
			$token = $apiItem->token;
			$date = date("Ymd");

			$stop_time = date("Y-m-d G:H:s",strtotime('now'))."===". date("Y-m-d G:H:s",strtotime("+2 hours"));
			//  /json.php/api/$t/$limit/$token/$date
			$ret = array(
					"latest"=>  array(
						"res" => "按最新查询",
						"json"=>  "/json.php/api/$t/$limit/$token",
						"xml"=> "/xml.php/api/$t/$limit/$token"
				     ),
					"bydate"=> array(
						"res" => "按日期查询:",
						"json"=>  "/json.php/api/$t/$limit/$token/$date",
						"xml"=> "/xml.php/api/$t/$limit/$token/$date"
					)
			 );
	        return $ret;
		}else{
			return array(  "success"=> false,  "code"=>1, "error_message"=>"获取API错误","data"=>'' );
		}
			
	}
	//function put($id=NULL, $request_data=NULL) {
	function postUpdate($id=NULL, $request_data=NULL) {
		
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function postDel($id=NULL) {
	
		return $this->dp->delete($id);
	}

	
	
	
	private function _validate($data){
		$accesstoken=array();
		foreach (Recharge::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$accesstoken[$field]=$data[$field];
		}
		return $accesstoken;
	}
}