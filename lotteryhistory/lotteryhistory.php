<?php

require '../vendor/autoload.php';

//use Ramsey\Uuid\Uuid;
//use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
//const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";

class Lotteryhistory {
	
	public $redis;
	public $dp;

	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		$this->dp = new DB_Lotteryhistory();
		$this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
	}

	function get($type=NULL, $time, $page=1,$split=10) {
		return $time ? $this->dp->getAll($type, $page,$split) : $this->dp->get($type);
	}

	//CodeByTypeLatestOne
	function postCodebtlo($request_data=NULL) {
        //var_dump($request_data);
		return  $this->dp->findCodeByTypeLatestOne($request_data) ;
	}

	
}