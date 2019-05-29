<?php
//declare(strict_types=1);
require '../vendor/autoload.php';
require '../handler/auth_session.php';

const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";
const USERNAME_EMAIL_PHONE_EXISTS = '用户名或Email或电话号码已存在';
const USER_DOES_NOT_EXIST = '用户不存在,请重新输入!';
	
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Medz\Cors\Cors;

class Member {
	

	
	public $redis;
	public $dp;
	public $sessionDB;
	static $INSERT_FIELDS = array('name', 'email', 'pass','phone','qq_number');
	static $EDIT_FIELDS = array('mode','uuid','email', 'phone','qq_number');
	static $PASS_FIELDS = array('mode','uuid','password');

	// determine login status
	public $loggedIn ;
	public $loggedUser;
	// session thumbprint
	public $thumbPrint ;
	public $storedPrint ;

	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		$this->auth = new AuthSession();
		$this->dp = new DB_Member();
		$this->sessionDB = new DB_Sessions();
		$this->redis = new Redis();
    $this->redis->connect('127.0.0.1', 6379);
	
	}
	function get($id=NULL, $page=1,$split=10) {
	
		if ( !$this->auth->loggedIn && $this->auth->thumbPrint !==  $this->auth->storedPrint) {
			//$info = 'SESSION INVALID!!!';
			//error_log('Session Invalid: ' . date('Y-m-d H:i:s'), 0);
			header('Location: /backend/signin.php');
			exit();
			// take appropriate action
		}     
		
	   //	$t1 = microtime(true);
		

      
			return is_null($id) ? $this->dp->getAll($page,$split) : $this->dp->get($id);
			
			/*
				$_data =	is_null($id) ? $this->dp->getAll($page,$split) : $this->dp->get($id);
				$t2 = microtime(true);
        $_end = '耗时'.round($t2-$t1,3).'秒<br>';
				echo "<pre>";
				var_dump($t1);
			
				var_dump(	$_data );

				var_dump($_end);
				echo "</pre>";
			*/
		}

		

	function postSignin($request_data=NULL) {
		$_uuid='';
		 $signinKey = "SIGNIN-CAPTCHA:".strtoupper($request_data['captcha']);
		 if( $this->redis->exists($signinKey) ){
		
			$logined =  $this->dp->signin($request_data) ;
			if($logined["success"]){
				$uuid = Uuid::uuid4();
				$_uuid = strtoupper(str_replace('-','',$uuid->toString()));
				$logined['data']->uuid = $_uuid;
				$this->sessionDB->insert($logined['data']);
			//	return $logined ;
			}
			else{
				return array(  "success"=> false,  "code"=>1, "error_message"=>USER_DOES_NOT_EXIST,"data"=>'' );
			}
			$session = $this->sessionDB->getSessByUuid($_uuid);
		
			$logined['data']->signinTime = $session->created_at;
			return 	$logined ;
		 }
		 else{
			return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
		 }
		//return $this->dp->insert($this->_validate($request_data));
	
	}

  function postSignout() {
		$member_id = $_SESSION['member_id'] ;
		unset($_SESSION['member_id']);
		return	$this->sessionDB->delByMemberId($member_id);
  }

	
	function postSignup($request_data=NULL) {
	  	$signupKey = "SIGNUP-CAPTCHA:".strtoupper($request_data['captcha']);
	//	if(strtoupper($request_data['captcha'])===strtoupper($_SESSION['SIGNUP-CAPTCHA'])){
		if( $this->redis->exists($signupKey)){
			if(!$this->dp->validate_Uniqueness($request_data))
			{
				$signupData =  $this->dp->insert($this->_validate($request_data));
		
		  	$sessionData = array('data'=>new stdClass());
				if($signupData["success"]){
					$uuid = Uuid::uuid4();
					$_uuid = strtoupper(str_replace('-','',$uuid->toString()));
					$sessionData['data']->uuid = $_uuid;
					$sessionData['data']->Id = $signupData['data']['Id'];
					$sessionData['data']->name = $signupData['data']['name'];
					$sessionData['data']->email = $signupData['data']['email'];
					$sessionData['data']->phone = $signupData['data']['phone'];
					$sessionData['data']->qq_number = $signupData['data']['qq_number'];

				
					$this->sessionDB->insert($sessionData['data']);

					$session = $this->sessionDB->getSessByUuid($_uuid);
		
					$sessionData['data']->signinTime = $session->created_at;
		
					return array(  "success"=> true, "code"=>0, "data"=>$sessionData['data'] );
				}
			}else{
			return array(  "success"=> false, "error_message"=>USERNAME_EMAIL_PHONE_EXISTS, "code"=>1,"data"=>'' );
			}
		}else{
			return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
		 }
	 }
	

   function postAdd($request_data=NULL) {
		$request_data['pass'] = '111111';
		if(!$this->dp->validate_Uniqueness($request_data))
		{
			return $this->dp->insert($this->_validate($request_data));
		}else{
			return array(  "success"=> false, "error_message"=>USERNAME_EMAIL_PHONE_EXISTS, "code"=>1,"data"=>'' );
		}		
	}

	function postUpdate($id=NULL,$request_data=NULL) {	
	  
		if($request_data["mode"]==='status'){
			
			return $this->dp->updateStatus($request_data);
		}
		if($request_data["mode"]==='info'){
		
			return $this->dp->update($this->_validate_edit($request_data));
		}
		if($request_data["mode"]==='pass'){
			
			return $this->dp->updatePass($this->_validate_pass($request_data));
		}
		if(!$this->dp->validate_Uniqueness($request_data))
		{
			return $this->dp->update($id, $this->_validate($request_data));
		}else{
			return array(  "success"=> false, "error_message"=>USERNAME_EMAIL_PHONE_EXISTS, "code"=>1,"data"=>'' );
		}		
	
	}
		
   function postDel($id=NULL) {
	
		return $this->dp->delete($id);
	}

	function put($id=NULL, $request_data=NULL) {
		echo "put===";
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function delete($id=NULL) {
		echo "delete===";
		return $this->dp->delete($id);
	}
	
	
	private function _validate($data){
		$member=array();
		foreach (Member::$INSERT_FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$member[$field]=$data[$field];
		}
		return $member;
	}

	private function _validate_edit($data){
		$member=array();
		foreach (Member::$EDIT_FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$member[$field]=$data[$field];
		}
		return $member;
	}

	private function _validate_pass($data){
		$member=array();
		foreach (Member::$PASS_FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$member[$field]=$data[$field];
		}
		return $member;
	}
}