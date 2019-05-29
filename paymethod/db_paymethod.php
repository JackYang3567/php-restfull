<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;

class DB_Paymethod
{
    public $pdo;
       
    function __construct ()
    {
       $this->init();
    }
    

    private function find ($id)
    {
      
        $sql  = "SELECT * FROM `paymethod` where Id=".$id;
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

    function getAll ($page,$split)
    {
        $Count_sql  = "SELECT * FROM `paymethod`";
        $Count_sql .=" ORDER BY Id ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();

        $offset = (int)( ($page - 1)* $split);  
        $limit = (int)$split;  
        $sql  = "SELECT * FROM `paymethod`";
        $sql .=" ORDER BY Id DESC";
        $sql .=" limit $offset,$limit ";
        
         $stmt = $this->pdo->query($sql);
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0, "data"=>array("count"=>  $count,"rows"=>$row ) );
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row );
            }
         }
    }

    function insert ($rec)
    {
       $sql  = "INSERT INTO  `paymethod` (`name`,`code`,`icon_path`,`qrcode_path`,`sortId`) ";
       $sql .=" VALUES ('{$rec['name']}','{$rec['code']}','{$rec['icon_path']}','{$rec['qrcode_path']}','{$rec['sortId']}')";
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
       $_id = (int)$id;

       $sql  = "update `paymethod` set `name`='{$rec['name']}' ,`code`='{$rec['code']}' ,";
       $sql .= " `icon_path`='{$rec['icon_path']}' ,`qrcode_path`='{$rec['qrcode_path']}' , `sortId`='{$rec['sortId']}'";
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
    
        $sql  = "delete from `paymethod` where Id in ($sid)";
   
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