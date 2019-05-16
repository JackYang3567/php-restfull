<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */


class DB_Sessions
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
      
        $sql  = "SELECT * FROM `sessions` where Id=".$id;
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

    
    function get ($id)
    {
        $index = $this->find($id);
        if ($index === FALSE)
            return FALSE;
        return $_SESSION['rs'][$index];
    }

    function getAll ()
    {

        $sql  = "SELECT * FROM `sessions`";
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

    function insert($rec)
    {
        

       $sql  = "INSERT INTO  `sessions` (`name`,`uuid`,`email`,`member_id`) ";
       $sql .=" VALUES ('{$rec->name}','{$rec->uuid}','{$rec->email}','{$rec->Id}')";
      

       $this->pdo->query($sql);     

       if($this->pdo->lastInsertId())
        {
            $rec->Id=$this->pdo->lastInsertId();
            return  array( "success"=>true,  "code"=>0, "data"=>$rec );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>$rec );
        }   
         
    }

    function update ($id, $rec)
    {
       $_id = (int)$id;

       $sql  = "update `sessions` set `type_id`=". (int)$rec['type_id'].",`name`='{$rec['name']}' ,`code`='{$rec['code']}',`remarks`='{$rec['remarks']}'";
       $sql .=" where Id={$_id}";
      
       $stmt=$this->pdo->query($sql);

       if($stmt->rowCount())
        {
            $rec['Id']= $_id;
            return  array( "success"=>true,  "code"=>0, "data"=>$rec );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>$rec );
        }
       
    }
    function delByMemberId ($member_id){
        $sql  = "delete from `sessions` where `member_id` in ($member_id)";
   
        $stmt=$this->pdo->query($sql);

        if($stmt->rowCount())
        {
           
           return  array( "success"=>true,  "code"=>0, "data"=>$stmt->rowCount() );
        }
        else{
         
            return array(  "success"=> false,  "code"=>1,"data"=>0 );
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
    
        $sql  = "delete from `sessions` where Id in ($sid)";
   
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