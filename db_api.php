<?php
/**
 * Fake Database. All records are stored in $_SESSION
 */


class DB_Api
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
    


    function getAll ($t,$limit,$token,$date)
    {
        $sql  = "select * from `code` "; 
        $sql .=" where type='{$t}'  "; 
        $date ? $sql .=" &&  DATE_FORMAT(time,'%Y%m%d') = '{$date}'" : "";
        $sql .=" order by id desc";
        $sql .=" limit $limit";
       
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

   function authToken($t,$limit,$token,$date){
        $sql  = "SELECT * FROM `view_auth_token_api`";
        $sql .= " where `token`='{$token}' && `code`='{$t}'";
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

    private function init ()
    {
        $this->dsn  = sprintf('mysql:charset=UTF8;host=%s;dbname=%s',  $this->params['host'],  $this->params['db']);
        $this->opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->pdo  = new PDO($this->dsn,  $this->params['user'],  $this->params['pwd'], $this->opts);
       
    }
}