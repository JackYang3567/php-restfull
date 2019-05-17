<?php
require '../vendor/autoload.php';
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";
const USERNAME_EMAIL_PHONE_EXISTS = '用户名或Email或电话号码已存在';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Member {
	public $dp;
	public $sesinoDB;
	static $FIELDS = array('name', 'email', 'pass','phone','qq_number');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		session_start();
		$this->dp = new DB_Member();
		$this->sesinoDB = new DB_Sessions();
	}
	function get($id=NULL) {
		if( isset($_SESSION['admin_session_id']))
{
   echo "true";
}
else{
    echo "false";
}
		//	return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
	}

	

	function postSignin($request_data=NULL) {
		
	    
		 if(strtoupper($request_data['captcha'])===strtoupper($_SESSION['SIGNIN-CAPTCHA'])){
		
			$logined =  $this->dp->signin($request_data) ;
			if($logined["success"]){
				//$uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'session.com');
				$member_id = $logined['data']->Id;
				$uuid = Uuid::uuid4();
				$_uuid = strtoupper(str_replace('-','',$uuid->toString()));
				$logined['data']->uuid = $_uuid;
				 $this->sesinoDB->insert($logined['data']);
			
				 $_SESSION['member_id'] = $member_id;
                
			}else{
			  return $logined ;
			}
			
		 }
		 else{
			return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
		 }
		//return $this->dp->insert($this->_validate($request_data));
	}

  function postSignout() {
		$member_id = $_SESSION['member_id'] ;
		unset($_SESSION['member_id']);
		return	$this->sesinoDB->delByMemberId($member_id);
  }

	
	function postSignup($request_data=NULL) {
		if(strtoupper($request_data['captcha'])===strtoupper($_SESSION['SIGNUP-CAPTCHA'])){
			if(!$this->dp->validate_Uniqueness($request_data))
			{
			return $this->dp->insert($this->_validate($request_data));
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
		foreach (Member::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$member[$field]=$data[$field];
		}
		return $member;
	}
}