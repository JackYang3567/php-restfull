<?php

require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";

class Paymethod {
	
	public $redis;
	public $dp;
	static $FIELDS = array('name','code','icon_path','qrcode_path','sortId');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		$this->dp = new DB_Paymethod();
		$this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
	}

	function get($id=NULL, $page=1,$split=10) {
		return is_null($id) ? $this->dp->getAll( $page,$split) : $this->dp->get($id);
	}

	

	function postAdd($request_data=NULL) {

		return $this->dp->insert($this->_validate($request_data));
	}
	//function put($id=NULL, $request_data=NULL) {
	function postUpdate($id=NULL, $request_data=NULL) {
		
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function postDel($id=NULL) {
		
		return $this->dp->delete($id);
	}
	
	private function _validate($data){
		$paymethod=array();
		foreach (Paymethod::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$paymethod[$field]=$data[$field];
		}
		return $paymethod;
	}
}