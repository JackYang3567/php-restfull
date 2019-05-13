<?php

/*{
	"row":1,
	"code":"txffc",
	"data":	[
		{"opentime":"2019-05-11 18:07:01","expect":"201905111087","opencode":"9,8,4,5,7"}
		]
}
*/
class say {
    public $id;
	public $expect;
    public $code;
    public $type;
    public $time;
	
	function get($t='',$limit=10,$token) {
		$params = [
			'host' => 'localhost',
			'user' => 'root',
			'pwd'  => 'root',
			'db'   => 'work_caiji'
		];
		try {
			$dsn  = sprintf('mysql:charset=UTF8;host=%s;dbname=%s', $params['host'], $params['db']);
			
			$opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$pdo  = new PDO($dsn, $params['user'], $params['pwd'], $opts);
		    $sql  = "SELECT id,expect,code,type,time FROM code where type='{$t}' ORDER BY id desc LIMIT {$limit}";
           // echo $sql;
			
			$stmt = $pdo->query($sql);
			
			if(is_object($stmt)){

				$row = $stmt->fetchAll(PDO::FETCH_CLASS);
			
				return array( "row" => $limit,  "code"=>$t, "data"=>$row  );
				/*
				echo "<pre>";
				var_dump($row);
				echo "</pre>";
				*/
				//while ($row = $stmt->fetch(PDO::FETCH_CLASS)) {
				while ($row = $stmt->fetchAll(PDO::FETCH_CLASS)) {
					//printf('%4d | %20s | %5s' . PHP_EOL, $row->id, $row->expect, $row->code);
				}
			}else{
				echo "不是对象";
	
			}
	
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		} catch (Throwable $e) {
			echo $e->getMessage();
		}
		
	}
}



