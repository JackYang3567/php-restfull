<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';

use Application\Database\Connection;

class DB_Whitelist
{
    public $pdo;
       
    function __construct ()
    {
       $this->init();
    }
    

    private function find ($id)
    {
      
        $sql  = "SELECT * FROM `white_list` where Id=".$id;
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

        $Count_sql  = "SELECT * FROM `white_list`";
        $Count_sql .=" ORDER BY Id ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();


        if($page && $split){
            $offset = (int)( ($page - 1)* $split);  
            $limit = (int)$split;  
            $sql  = "SELECT * FROM `white_list` ";
            $sql .=" ORDER BY Id ";
             $sql .=" limit $offset,$limit ";
          }else{
              $sql  = "SELECT * FROM `white_list` ";
              $sql .=" ORDER BY Id ";
          }
          $stmt = $this->pdo->query($sql);

         if(is_object($stmt)){
            $row = $stmt->fetchAll(PDO::FETCH_CLASS);
            if(count($row))
            {
                return  array( "success"=>true,  "code"=>0,"data"=>array("count"=>  $count,"rows"=>$row ));
            }
            else{
                return array(  "success"=> false,  "code"=>1,"data"=>$row );
            }
         }
    }

    function insert ($rec)
    {
       $sql  = "INSERT INTO  `white_list` (`token_id`,`member_id`,`ip`) ";
       $sql .=" VALUES ('{$rec['token_id']}','{$rec['member_id']}','{$rec['ip']}')";
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

       $sql  = "update `white_list` set `ip`='{$rec['ip']}'";
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
    
        $sql  = "delete from `white_list` where Id in ($sid)";
   
        $stmt=$this->pdo->query($sql);

        if($stmt->rowCount())
        {
           
           return  array( "success"=>true,  "code"=>0, "data"=>$stmt->rowCount() );
        }
        else{
         
            return array(  "success"=> false,  "code"=>1,"data"=>$stmt->rowCount() );
        }
       
    }

    function deleteAll($member_id) {
        $sql  = "delete from `white_list` where `member_id` = $member_id ";
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