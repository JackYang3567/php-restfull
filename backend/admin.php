<?php
 //require '../libs/Smarty.class.php';
 require '../handler/auth_session.php';
 //session_start();
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";
class Admin {

    public $pdo;
    public $opts;
    public $smarty;
    public $auth;
    static $FIELDS = array('Id', 'pass','password','repassword');

    public $params = [
        'host' => 'localhost',
        'user' => 'root',
        'pwd'  => 'root',
        'db'   => 'work_caiji'
    ];
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
        //$this->pdo = new Conn();       
        $this->auth = new AuthSession();
        $this->init ();
    }

    
    
	function get() {
        $this->_isAuth();
        $data = array();        
      //  $this->render('admin/index.tpl', $data);
      $this->auth->render('admin/index.tpl', $data);
    }

    
    function getShowInfo() {
        $this->_isAuth(); 
        $data =  $this->_getMyInfo();  
        $this->auth->render('admin/show.tpl', $data);
    }

    function getEditPass() {
        $this->_isAuth(); 
        $data = $this->_getMyInfo();
        $this->auth->render('admin/edit.tpl', $data);
    }

    function getMemberList() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('members/list.tpl', $data);
    }

    function getNewMember() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('members/new.tpl', $data);
    }

    function getEditMember($request_data) {
        $this->_isAuth();  
        $data = $request_data;// array();//array("id"=>$id,"page"=>$page);  
      
        $this->auth->render('members/edit.tpl', $data);
    }
   

    function getLotteryTypeList() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('lotterytype/list.tpl', $data);
    }

    function getNewLotteryType() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('lotterytype/new.tpl', $data);
    }

    function getEditLotteryType($request_data) {
        $this->_isAuth();  
        $data = $request_data; 
        $this->auth->render('lotterytype/edit.tpl', $data);
    }
   

    function getLotteryList() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('lottery/list.tpl', $data);
    }

    function getNewLottery() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('lottery/new.tpl', $data);
    }

    function getEditLottery($request_data) {
        $this->_isAuth(); 
        $data = $request_data;  
        $this->auth->render('lottery/edit.tpl', $data);
    }

    function getWhiteList() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('whitelist/list.tpl', $data);
    }

    function getEditWhiteList($request_data) {
        $this->_isAuth(); 
        $data = $request_data; 
        $this->auth->render('whitelist/edit.tpl', $data);
    }


    function getPaymethodList() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('paymethod/list.tpl', $data);
    }

    function getNewPaymethod() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('paymethod/new.tpl', $data);
    }

    function getEditPaymethod($request_data) {
        $this->_isAuth(); 
        $data = $request_data;   
        $this->auth->render('paymethod/edit.tpl', $data);
    }

    function getPayamountList() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('payamount/list.tpl', $data);
    }
    function getNewPayamount() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('payamount/new.tpl', $data);
    }

    function getEditPayamount($request_data) {
        $this->_isAuth();  
        $data = $request_data;  
        $this->auth->render('payamount/edit.tpl', $data);
    }

    function getRechargeList() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('recharge/list.tpl', $data);
    }

    function getNewRecharge() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('recharge/new.tpl', $data);
    }

    function getEditRecharge($request_data) {
        $this->_isAuth();  
        $data = $request_data;  
        $this->auth->render('recharge/edit.tpl', $data);
    }
    
    function getSignout(){      
        // 清除会话数据wipe out session data
        session_unset();
        // 销毁会话destroy session
        session_destroy();
        // 会话cookie过期 expire session cookie
        setcookie('PHPSESSID', 0, time() - 3600);
        // force a new request cycle
        //header('Location: ' . $_SERVER['REQUEST_URI'] );
        header('Location: /backend/signin.php');
        exit();
    }
    function getWelcome(){
        if ( !$this->auth->loggedIn && $this->auth->thumbPrint !==  $this->auth->storedPrint) {
            header('Location: /backend/signin.php');
            exit();
        }  
        $data = array( $_SESSION['admin'],date("Y-m-d H:i:s"));      
        $this->auth->render('admin/welcome.tpl', $data);
    }
	function postSignin($request_data=NULL) {
       
        if(strtoupper($request_data['captcha'])!==strtoupper($_SESSION['ADMIN-CAPTCHA'])){
            return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
        }
        $password = $request_data['pass'];
        $salt = "admin";  // 只取前两个            
        $sql  = "SELECT `name`,`email`,`phone`,`qq_number`,`pass` FROM `admin` ";
        $sql .=" where `name`='{$request_data['name']}' && `pass`='".crypt($password, $salt);
        $sql .="'  ORDER BY id ";
        $stmt = $this->pdo->query($sql);
        if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                $this->auth->loggedIn = TRUE;
                $_SESSION['admin'] = strip_tags($row[0]->name);
                $_SESSION['isLoggedIn'] = TRUE;
                $_SESSION['thumbprint'] =  $this->auth->thumbPrint;
                return array( "success"=>true,  "code"=>0, "data"=>$row[0] );
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row[0] );
            }
        }
    }
    
    function postUpdatePass($request_data=NULL) {
        $_req = $this->_validate($request_data);
        if($request_data['password']!==$request_data['repassword']){
            return array(  "success"=> false, "error_message"=>"新密码和确认密码不一致",  "code"=>1,"data"=>$row[0] );
        }
     
        //return $this->dp->update($id, $this->_validate($request_data));
        $_id= $request_data['Id'];
        $password = $request_data['password'];
        $salt = "admin";// 只取前两个    
        $sql  = "update `admin` set `pass`='".crypt($password, $salt)."'";
        $sql .=" where Id=$_id && `pass`='".crypt( $request_data['pass'], $salt)."'";
    
        $stmt = $this->pdo->query($sql);
        if($stmt)
        {
            session_unset();
            session_destroy();
            setcookie('PHPSESSID', 0, time() - 3600);
            return array( "success"=>true,  "code"=>0);
        }
        else{
            return array(  "success"=> false,  "code"=>1 );
        }
    }
	

    private function _getMyInfo(){       
        if ( !$this->auth->loggedIn && $this->auth->thumbPrint !==  $this->auth->storedPrint) {
            header('Location: /backend/signin.php');
            exit();
        }                 
        $sql  = "SELECT `Id`,`name`,`email`,`phone`,`qq_number`,`pass` FROM `admin` ";
        $sql .=" where `name`='{$_SESSION['admin']}'";
        $sql .="  ORDER BY Id ";  
       
        $stmt = $this->pdo->query($sql);

        if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
               return $row[0];
            }           
         }
    }
    private function _isAuth(){
        if ( !$this->auth->loggedIn && $this->auth->thumbPrint !==  $this->auth->storedPrint) {
            header('Location: /backend/signin.php');
            exit();
        }       
    }

	private function _validate($data){
		$admin=array();
		foreach (Admin::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$admin[$field]=$data[$field];
		}
		return $admin;
    }
    
    private function init ()
    {
        $this->dsn  = sprintf('mysql:charset=UTF8;host=%s;dbname=%s',  $this->params['host'],  $this->params['db']);
        $this->opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->pdo  = new PDO($this->dsn,  $this->params['user'],  $this->params['pwd'], $this->opts);
    }
}