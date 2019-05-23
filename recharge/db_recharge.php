<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */


class DB_Recharge
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
      
        $sql  = "SELECT * FROM `recharge` where Id=".$id;
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

    
    function get ($id)
    {
        return $this->find($id);
    }

    

    function getAll ()
    {
        $sql  = "SELECT * FROM `view_auth_token_api`";
        $sql .=" ORDER BY `expire_at` DESC";
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

    function getTokenId_Code($rec){
        $sql  = "SELECT * FROM `view_auth_token_api`";
        $sql .= " where `token_id`={$rec['token_id']} && `code`='{$rec['code']}'";
        $sql .=" ORDER BY `expire_at` ";
        $stmt = $this->pdo->query($sql);
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  $row[0] ;
            }
            else{
                return false;
            }
         }
    }

    function insert ($rec)
    {
      
       $month = (int)$rec['purchase_month'];
       $_month = date("Y-m-d G:H:s",strtotime("+ $month month"));
      
       $sql  = "INSERT INTO  `recharge` (`amount`,`token_id`,`purchase_month`,`code`,`expire_at`) ";
       $sql .=" VALUES ('{$rec['amount']}','{$rec['token_id']}','{$rec['purchase_month']}','{$rec['code']}','$_month')";
       $this->pdo->query($sql);     

       if($this->pdo->lastInsertId())
        {
            return  array( "success"=>true,  "code"=>0, "data"=>$this->pdo->lastInsertId() );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>0 );
        } 
      
    }

    function update ($id, $rec)
    {
       $_id = (int)$id;
       $month = (int)$rec['purchase_month'];
      // $_month = date("Y-m-d G:H:s",strtotime("+ $month month"));

       $sql  = "update `recharge` set `amount`= (`amount` + ". $rec['amount'].")";
       $sql .=", `expire_at`=DATE_ADD(`expire_at`,INTERVAL $month MONTH)";
       $sql .=" where `token_id`='{$rec['token_id']}' && `code`='{$rec['code']}'";
      echo $sql;
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
    
        $sql  = "delete from `recharge` where Id in ($sid) ";
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