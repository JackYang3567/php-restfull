<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;


const USER_OR_PASSWORD_ERROR ='用户或密码错误';

class DB_Member
{
    public $pdo;
   
    function __construct ()
    {     
       $this->init();       
    }
    
    private function find ($id)
    {      
        $sql  = "SELECT * FROM `member` where Id=".$id;
        $sql .=" ORDER BY id ";
         
         $stmt = $this->pdo->query($sql);
         
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0, "data"=>$row[0] );
            }
            else{
                return  FALSE;
            }
         }
    }

    function validate_Uniqueness($rec){
        $sql  = "SELECT * FROM `member`";
        $sql .=" where `name`='{$rec['name']}'";
        $rec['email'] ? $sql .="  || `email`='{$rec['email']}'" :'';
        $rec['phone'] ? $sql .="  || `phone`='{$rec['phone']}'" :'';

        $stmt = $this->pdo->query($sql);

        if(is_object($stmt)){
           $row = $stmt->fetchAll(PDO::FETCH_CLASS);
           if(count($row))
           {
              // $_SESSION[$captchaText] = $captcha->getPhrase();
               return true;
           }
           else{
               return false;
           }
        }
    }
    
    function signin($rec){
        $password = $rec['pass'];
        $salt = "Member";// 只取前两个
        $sql  = "SELECT `Id`,`name`,`email`,`qq_number`,`phone`,`created_at` FROM `member`";
        $sql .=" where `name`='{$rec['name']}' && `pass`='".crypt($password, $salt)."'";
        $stmt = $this->pdo->query($sql);
        
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
               // $_SESSION[$captchaText] = $captcha->getPhrase();
                return  array( "success"=>true,  "code"=>0, "data"=>$row[0] );
            }
            else{
                return array(  "success"=> false, "error_message"=>USER_OR_PASSWORD_ERROR, "code"=>1,"data"=>$row );
            }
         }
    }
    

    function get ($id)
    {
       
        return $this->find($id);
    }

    function getAll ($page,$split)
    {
        $Count_sql  = "SELECT * FROM `member`";
        $Count_sql .=" ORDER BY id ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();

        $offset = (int)( ($page - 1)* $split);  
        $limit = (int)$split;  
        $sql  = "SELECT * FROM `member`";
        $sql .=" ORDER BY id DESC";
        $sql .=" limit $offset,$limit ";
       
         $stmt = $this->pdo->query($sql);
        
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0,  "data"=>array("count"=>  $count,"rows"=>$row ));
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row );
            }
         }
    }

    function insert ($rec)
    {
       $password = $rec['pass'];
       $salt = "Member";// 只取前两个
       $sql  = "INSERT INTO  `member` (`name`,`pass`,`email`,`phone`,`qq_number`) ";
       $sql .=" VALUES ('{$rec['name']}','".crypt($password, $salt)."','{$rec['email']}','{$rec['phone']}','{$rec['qq_number']}')";
       $this->pdo->query($sql);     

       if($this->pdo->lastInsertId())
        {
            $rec['Id']=$this->pdo->lastInsertId();
            return  array( "success"=>true,  "code"=>0, "data"=>$rec );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>$rec );
        }      
    }

    function updateStatus($rec){
        $_id = (int)$rec['id'];
        $sql  = "update `member` set `status`='{$rec['status']}'";
        $sql .=" where Id={$_id}";
        $stmt = $this->pdo->query($sql);

       if($stmt->rowCount())
        {
            return  array( "success"=>true,  "code"=>0 );
        }
        else{
            return array(  "success"=> false,  "code"=>1 );
        }
    }

    function update ($rec)
    {
        $_id = 0;
        $uuid =$rec['uuid']; 
        $memberId_sql  = "SELECT `member_id` FROM `sessions` where uuid='".$uuid."'";
        $_stmt = $this->pdo->query( $memberId_sql);
        
        if(is_object($_stmt)){
            $_row = $_stmt->fetchAll(PDO::FETCH_CLASS);
            $_id=$_row[0]->member_id;
        }
      
       $sql  = "update `member` set ";
       $sql .="`email`='{$rec['email']}',`phone`='{$rec['phone']}', `qq_number`='{$rec['qq_number']}'";
       $sql .=" where Id={$_id}";
      
       $stmt = $this->pdo->query($sql);

       if($stmt->rowCount())
        {
            $rec['Id']= $_id;
            return  array( "success"=>true,  "code"=>0, "data"=>$rec );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>$rec );
        }
       
    }

    function updatePass ($rec)
    {
        $_id = 0;
        $uuid =$rec['uuid']; 
        $memberId_sql  = "SELECT `member_id` FROM `sessions` where uuid='".$uuid."'";
        $_stmt = $this->pdo->query( $memberId_sql);
        
        if(is_object($_stmt)){
            $_row = $_stmt->fetchAll(PDO::FETCH_CLASS);
            $_id=$_row[0]->member_id;
        }
        
        $password = $rec['password'];
        $salt = "Member";// 只取前两个

        $sql  = "update `member` set ";           
        $sql .=" `pass`='".crypt($password, $salt)."'";
        $sql .=" where Id={$_id} ";
       
        $stmt = $this->pdo->query($sql);

       if($stmt->rowCount())
        {
            return  array( "success"=>true,  "code"=>0 );
        }
        else{
            return array(  "success"=> false,  "code"=>1 );
        }
       
    }
    function delete ($id)
    {
        $_id = array();
        if(is_array($id)){
            array_merge($_id, $id);
        } else {
            array_push($_id,$id);
        }
        $sid = implode(",",$_id);
    
        $sql  = "delete from `member` where Id in ($sid)";
   
        $stmt=$this->pdo->query($sql);

        if($stmt->rowCount())
        {
           
           return  array( "success"=>true,  "code"=>0, "data"=>$stmt->rowCount() );
        }
        else{
         
            return array(  "success"=> false,  "code"=>1,"data"=>$stmt->rowCount() );
        }
       
    }

    private function init ()
    {
        $conn = new Connection(include __DIR__ . DB_CONFIG_FILE);
        $this->pdo = $conn->pdo;
    }
}