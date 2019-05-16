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
                return  array( "success"=>true,  "code"=>0, "data"=>$row );
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
        $sql  = "SELECT * FROM `recharge`";
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
        /*
        echo "<pre> =====111====";
        var_dump($rec);
        echo "</pre>";
       */
       $month = (int)$rec['purchase_month'];
       $_month = date("Y-m-d G:H:s",strtotime("+ $month month"));
       echo "<pre> =====111====";
       var_dump( $_month);
       echo "</pre>";
       $sql  = "INSERT INTO  `recharge` (`amount`,`token_id`,`purchase_month`,`code`,`expire_at`) ";
       $sql .=" VALUES ('{$rec['amount']}','{$rec['token_id']}','{$rec['purchase_month']}','{$rec['code']}','$_month')";
       $this->pdo->query($sql);     

       if($this->pdo->lastInsertId())
        {
           // $rec['Id']=$this->pdo->lastInsertId();
            return  array( "success"=>true,  "code"=>0, "data"=>$this->pdo->lastInsertId() );
        }
        else{
            return array(  "success"=> false,  "code"=>1,"data"=>0 );
        } 
      
    }

    function update ($id, $rec)
    {
       $_id = (int)$id;

       $sql  = "update `recharge` set `type_id`=". (int)$rec['type_id'].",`name`='{$rec['name']}' ,`code`='{$rec['code']}',`remarks`='{$rec['remarks']}'";
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
    
        $sql  = "delete from `recharge` where Id in ($sid)";
   
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