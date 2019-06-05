<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */


class DB_AccessToken
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
       if ($id==="ByMemberld"){
        return $this->getByMemberld($_SESSION['member_id']);
       }
       else{
        $sql  = "SELECT * FROM `access_token` where Id=".$id;
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
    }

    
    function get ($id)
    {
        return $this->find($id);
    }

    function getByUuid($muuid){
        $member_id = 0 ;
        $sql_session  = "SELECT * FROM `sessions` where `uuid`='{$muuid}'";
        $sql_session .="  ORDER BY id DESC";
        $stmt = $this->pdo->query( $sql_session);
        
        if(is_object($stmt)){
           $row = $stmt->fetchAll(PDO::FETCH_CLASS);
           $member_id = $row[0]->member_id;
        }
        return $this->getByMemberld($member_id);
    }

    function getByMemberld($member_id){
       
        $sql  = "SELECT * FROM `access_token` where `member_id`=".$member_id;
        
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

    function getAll ()
    {
        $sql  = "SELECT * FROM `access_token`";
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
      

       $sql_session  = "SELECT * FROM `sessions` where uuid='{$rec['uuid']}'";
       $sql_session .="  ORDER BY id DESC";
    
        $stmt = $this->pdo->query( $sql_session);
        
        if(is_object($stmt)){
           $row = $stmt->fetchAll(PDO::FETCH_CLASS);
           $rec['member_id'] = $row[0]->member_id;
        }

       $countsql = "select count(*) as counter from access_token where `member_id`='{$rec['member_id']}' && `status` = 0";
       $_count = $this->pdo->query($countsql);  
       $count = $_count->fetchAll(PDO::FETCH_CLASS); 

       
      /*
       echo "<pre>";
       var_dump($count[0]->counter);
       echo "</pre>";
       */
      if($count[0]->counter <3 ){
       $sql  = "INSERT INTO  `access_token` (`member_id`,`token`) ";
       $sql .=" VALUES ('{$rec['member_id']}','{$rec['token']}')";
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
     else{
       // 账号下已有多个未使用的接口账号啦 
       return array(  "success"=> false, "error_message"=>"账号下已有多个未使用的接口账号啦", "code"=>1,"data"=>0 );
     }   
    }

    function update ($id, $rec)
    {
       $_id = (int)$id;
       $sql  = "update `access_token` set `Id`=". (int)$rec['id'];
      isset($rec['notes']) ? $sql .=",`notes`='{$rec['notes']}' " : $sql .=",`token`='{$rec['token']}' ";
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

    function delete ($id)
    {
        $_id = array();
        if(is_array($id)){
            array_merge($_id, $id);
        } else {
            array_push($_id,$id);
        }
        $sid = implode(",",$_id);
    
        $sql  = "delete from `access_token` where Id in ($sid) && `is_auth`=0";
   
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