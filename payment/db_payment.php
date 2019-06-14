<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;

class DB_Payment
{
    public $pdo;   
   
    function __construct ()
    {
       $this->init();
    }    

    private function find ($id)
    {
      
        $sql  = "SELECT * FROM `view_payment_method` where Id=".$id;
        $sql .=" ORDER BY Id DESC ";         
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
        $Count_sql  = "SELECT * FROM `payment`";
        $Count_sql .=" ORDER BY Id ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();

        $offset = (int)( ($page - 1)* $split);  
        $limit = (int)$split;  
        $sql  = "SELECT * FROM `view_payment_method`";
        $sql .=" ORDER BY Id DESC";
        $sql .=" limit $offset,$limit ";
         $stmt = $this->pdo->query($sql);
         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0,  "data"=>array("count"=>  $count,"rows"=>$row ) );
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row );
            }
         }
    }

    function insert ($rec)
    {
       $order_id = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
       $time = (int)$rec['time'];
       $_time = date("Y-m-d H:i:s",strtotime($time));
       $sql  = "INSERT INTO  `payment` (`member_id`,`amount`, `payer`,`pay_account_four`,`method`,`time`,`order_id`) ";
       $sql .=" VALUES ('{$rec['member_id']}','{$rec['amount']}','{$rec['payer']}','{$rec['pay_account_four']}','{$rec['method']}','$_time','$order_id')";
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
        $time = (int)$rec['time'];
        $_time = date("Y-m-d G:H:s",strtotime($time));
       $sql  = "update `payment` set `amount`= (`amount` + ". $rec['amount'].")";
       $sql .=", `pay_account_four`='{$rec['pay_account_four']}' ,`method`='{$rec['method']}',`time`='$_time'";
       $sql .=" where `member_id`='{$rec['member_id']}' && `Id`='$id'";
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
    
        $sql  = "delete from `payment` where Id in ($sid) ";
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