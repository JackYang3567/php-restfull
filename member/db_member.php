<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
const USER_OR_PASSWORD_ERROR ='用户或密码错误';

class DB_Member
{
    public $pdo;
   
    public $params = [
        'host' => 'localhost',
        'user' => 'root',
        'pwd'  => 'root',
        'db'   => 'work_caiji'
    ];
    
    public $dsn ;
    public $opts;
    
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
                return  array( "success"=>true,  "code"=>0, "data"=>$row );
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
        $sql  = "SELECT * FROM `member`";
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

    function getAll ()
    {

        $sql  = "SELECT * FROM `member`";
        $sql .=" ORDER BY id ";
         $stmt = $this->pdo->query($sql);
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0, "data"=>$row );
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

    function update ($id, $rec)
    {
        $password = $rec['pass'];
        $salt = "Member";// 只取前两个
        $_id = (int)$id;

       $sql  = "update `member` set `name`='{$rec['name']}',`pass`='".crypt($password, $salt)."',`email`='{$rec['email']}',`phone`='{$rec['phone']}', `qq_number`='{$rec['qq_number']}'";
       $sql .=" where Id={$_id}";
       echo  $sql;
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
        $this->dsn  = sprintf('mysql:charset=UTF8;host=%s;dbname=%s',  $this->params['host'],  $this->params['db']);
        $this->opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->pdo  = new PDO($this->dsn,  $this->params['user'],  $this->params['pwd'], $this->opts);
       
    }
}