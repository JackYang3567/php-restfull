<?php
 //require '../libs/Smarty.class.php';

 require '../handler/auth_session.php';
 //session_start();
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";
class Admin {

    public $pdo;
    public $smarty;
    public $auth;
    static $FIELDS = array('name', 'pass','captcha');

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
    }

    
    
	function get() {
        $this->_isAuth();
        $data = array();        
      //  $this->render('admin/index.tpl', $data);
      $this->auth->render('admin/index.tpl', $data);
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

    function getWhiteList() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('whitelist/list.tpl', $data);
    }


    function getPaymethodList() {
        $this->_isAuth(); 
        $data = array();  
        $this->auth->render('paymethod/list.tpl', $data);
    }

    function getPayamountList() {
        $this->_isAuth();  
        $data = array();  
        $this->auth->render('payamount/list.tpl', $data);
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
            // take appropriate action
        }  
        $data = array( $_SESSION['admin'],date("Y-m-d H:i:s"));      
       // $this->render('admin/welcome.tpl', $data);
        $this->auth->render('admin/welcome.tpl', $data);
    }
	function postSignin($request_data=NULL) {
      
        if(strtoupper($request_data['captcha'])!==strtoupper($_SESSION['ADMIN-CAPTCHA'])){
            return array(  "success"=> false,  "code"=>1, "error_message"=>VERIFICATION_CODE_IS_INCORRECT,"data"=>'' );
        }
        
        $dsn  = sprintf('mysql:charset=UTF8;host=%s;dbname=%s',  $this->params['host'],  $this->params['db']);
		$opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $pdo  = new PDO($dsn,  $this->params['user'],  $this->params['pwd'], $opts);

        $password = $request_data['pass'];
        $salt = "admin";// 只取前两个            
        $sql  = "SELECT `name`,`email`,`phone`,`qq_number`,`pass` FROM `admin` ";
        $sql .=" where `name`='{$request_data['name']}' && `pass`='".crypt($password, $salt);
        $sql .="'  ORDER BY id ";

        // echo $sql;
         
         $stmt = $pdo->query($sql);
         
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
               
                $this->auth->loggedIn = TRUE;
                $_SESSION['admin'] = strip_tags($row[0]->name);
                $_SESSION['isLoggedIn'] = TRUE;
                    // store thumbprint
                $_SESSION['thumbprint'] =  $this->auth->thumbPrint;
              
                return array( "success"=>true,  "code"=>0, "data"=>$row[0] );
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row[0] );
            }
         }
        
    }
    
	function putChangepass($id=NULL, $request_data=NULL) {
		return $this->dp->update($id, $this->_validate($request_data));
    }
    
	function delete($id=NULL) {
		return $this->dp->delete($id);
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
}