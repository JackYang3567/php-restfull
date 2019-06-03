<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */
define('DB_CONFIG_FILE', '/../config/db.config.php');
include __DIR__ . '/../Application/Database/Connection.php';
include __DIR__ . '/../Application/Database/Finder.php';

use Application\Database\Connection;
use Application\Database\Finder;

class DB_Lotteryhistory
{
    public $pdo;
    
    function __construct ()
    {
       $this->init();
    }
    

    private function find ($type)
    {
      
        $sql  = "SELECT * FROM `code` WHERE `type`='".$type."'";
        $sql  .= " ORDER BY time desc ";
        $sql  .= " limit 1 ";
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
    
    function getAll ($type, $range, $time, $page, $split)
    {
       
        $Count_sql  = "SELECT * FROM `code` WHERE `type`='".$type."'";
        if((int)$range === 1){
            $Count_sql .=" and DATE_SUB(CURDATE(), INTERVAL 2 DAY) <= date( time) ";
        }
        if((int)$range === 2){
            $Count_sql .="  and to_days(time) = to_days('".$time."') ";
        }
        $Count_sql .=" ORDER BY time desc ";
        $count_stmt = $this->pdo->query($Count_sql);
        $count =  $count_stmt->rowCount();

        $offset = (int)( ($page - 1)* $split);  
        $limit = (int)$split;  
        $sql  = "SELECT * FROM `code` WHERE `type`='".$type."'";
        if((int)$range === 1){
            $sql .=" and DATE_SUB(CURDATE(), INTERVAL 2 DAY) <= date( time) ";
        }
        if((int)$range === 2){
            $sql .="  and to_days(time) = to_days('".$time."') ";
        }
        $sql .=" ORDER BY time desc";
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

    function findCodeByTypeLatestOne($req)
    {
        var_dump( explode(",",$req['types']));
     $whereArr = explode(",",$req['types']);
     

   
     $sql ="SELECT * FROM `lottery` WHERE `code` in ({$whereArr})";
     var_dump( $sql);
        // select * from code where  type='bj28' order by time desc limit 1
      //  $stmt = $this->pdo->query('SELECT * FROM `lottery` WHERE `type_id` = ' . (int) $type_ids);
      //  $results = $stmt->fetch(PDO::FETCH_ASSOC);
     var_dump($results);
        /*
        if ($results) {
            $results['history'] = 
                // define secondary lookup
                function ($id, $conn) {
                    $sql = 'SELECT * FROM `code` AS u '
                        . 'JOIN products AS r '
                        . 'ON u.product_id = r.id '
                        . 'WHERE `type` = :id '
                        . 'ORDER BY u.date';
                    $stmt = $conn->pdo->prepare($sql);
                    $stmt->execute(['id' => $id]);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        yield $row;
                    }
                };
        }
        return $results;
        */
    }
    
    function get ($type)
    {
       return $this->find($type);
    }

    
  
    

    private function init ()
    {
        $conn = new Connection(include __DIR__ . DB_CONFIG_FILE);
        $this->pdo = $conn->pdo;
    }
}