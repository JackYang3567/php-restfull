<?php


class LotteryType {
	public $dp;
	static $FIELDS = array('type_name', 'type_code','remarks');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		$this->dp = new DB_Lotterytype();
	}

	function get($id=NULL, $page=NULL,$split=NULL) {
		return is_null($id) ? $this->dp->getAll( $page,$split) : $this->dp->get($id);
	}
	function postAdd($request_data=NULL) {

		return $this->dp->insert($this->_validate($request_data));
	}
	//function put($id=NULL, $request_data=NULL) {
	function postUpdate($id=NULL, $request_data=NULL) {
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function postDel($id=NULL) {
		return $this->dp->delete($id);
	}
	
	private function _validate($data){
		$lotterytype=array();
		foreach (LotteryType::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$lotterytype[$field]=$data[$field];
		}
		return $lotterytype;
	}
}