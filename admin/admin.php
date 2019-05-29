<?php
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;
//require '../handler/connection_db.php';

class Admin {

    static $FIELDS = array('name', 'pass','captcha');
   
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
       // $this->pdo = new Conn();
       // session_start();
       $this->init();
	}
	function get($id=NULL) {
		return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
	}
	function postSignin($request_data=NULL) {
      

        $password = $request_data['pass'];
        $salt = "admin";// 只取前两个            
        $sql  = "SELECT `name`,`email`,`phone`,`qq_number`,`pass` FROM `admin` ";
        $sql .=" where `name`='{$request_data['name']}' && `pass`='".crypt($password, $salt);
        $sql .="'  ORDER BY Id ";

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
		foreach (admin::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$admin[$field]=$data[$field];
		}
		return $admin;
    }
    
    private function init ()
    {
        $conn = new Connection(include __DIR__ . DB_CONFIG_FILE);
        $this->pdo = $conn->pdo;
    }
}