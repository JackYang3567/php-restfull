<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;

class DB_Payamount
{
    public $pdo;
       
    function __construct ()
    {
       $this->init();
    }
    

    private function find ($id)
    {
      
        $sql  = "SELECT * FROM `payamount` where Id=".$id;
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
        $Count_sql  = "SELECT t.type_name as name ,p.*  FROM payamount p left join lottery_type t on p.type_id = t.id";
        $Count_sql .=" ORDER BY Id ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();

        $offset = (int)( ($page - 1)* $split);  
        $limit = (int)$split;  
        $sql  = "SELECT t.type_name as name ,p.*  FROM payamount p left join lottery_type t on p.type_id = t.id";
        $sql .=" ORDER BY Id ";
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
       $sql  = "INSERT INTO  `payamount` (`type_id`,`month_amount`,";
       $sql .="  `season_amount`,   `year_amount`,`three_yaear_amount`,";
       $sql .="  `five_yaar_amount`, `discount`,`sortId`) ";
       $sql .=" VALUES ('{$rec['type_id']}','{$rec['month_amount']}','{$rec['season_amount']}'";
       $sql .=" ,'{$rec['year_amount']}','{$rec['three_yaear_amount']}','{$rec['five_yaar_amount']}'";
       $sql .=" ,'{$rec['discount']}','{$rec['sortId']}')";

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

       $sql  = "update `payamount` set `type_id`='{$rec['type_id']}' ,`month_amount`='{$rec['month_amount']}',`season_amount`='{$rec['season_amount']}' ,";
       $sql .=" `year_amount`='{$rec['year_amount']}',`three_yaear_amount`='{$rec['three_yaear_amount']}',`five_yaar_amount`='{$rec['five_yaar_amount']}',";
       $sql .=" `discount`='{$rec['discount']}', `sortId`='{$rec['sortId']}'";
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
    
        $sql  = "delete from `payamount` where Id in ($sid)";
   
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