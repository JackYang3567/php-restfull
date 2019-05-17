<?php
 require '../libs/Smarty.class.php';

 //session_start();
const VERIFICATION_CODE_IS_INCORRECT = " 验证码不正确,请刷新页面后重试";
class Admin {
    public $pdo;
    public $smarty;
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
        session_start();
        $this->smarty = new Smarty;
    }
     public function render($tpl='index.tpl')
    {
         //$smarty->force_compile = true;
            $this->smarty->debugging = true;
            $this->smarty->caching = true;
            $this->smarty->cache_lifetime = 120;
            $this->smarty->assign("Name", "GK数据API", true);
            $this->smarty->display($tpl);
    }
	function get() {
        //return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
            if (!$_SESSION['admin_session_id']){
                header('Location: /backend/signin.php');
                exit();
            }
            $this->render('index.tpl');
    }
    function getSignout(){
        unset($_SESSION['admin_session_id']);
        header('Location: /backend/signin.php');
        exit();
    }
    function getWelcome(){
       echo "Welcome";
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
               // echo  $row[0]->pass;
                $_SESSION['admin_session_id'] = $row[0]->pass ;
              
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