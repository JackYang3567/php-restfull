<?php
class Member {
	public $dp;
	static $FIELDS = array('name', 'email');
	function __construct(){
	    /**
		* $this->dp = new DB_PDO_Sqlite();
		* $this->dp = new DB_PDO_MySQL();
		* $this->dp = new DB_Serialized_File();
		*/
		$this->dp = new DB_Session();
	}
	function get($id=NULL) {
		echo "get===".$request_data;
		return is_null($id) ? $this->dp->getAll() : $this->dp->get($id);
	}
	function post($request_data=NULL) {
		 echo "post===".$request_data;
		return $this->dp->insert($this->_validate($request_data));
	}
	function put($id=NULL, $request_data=NULL) {
		echo "put===".$request_data;
		return $this->dp->update($id, $this->_validate($request_data));
	}
	function delete($id=NULL) {
		echo "delete===".$request_data;
		return $this->dp->delete($id);
	}
	
	private function _validate($data){
		$member=array();
		foreach (Member::$FIELDS as $field) {
//you may also vaildate the data here
			if(!isset($data[$field]))throw new RestException(417,"$field field missing");
			$member[$field]=$data[$field];
		}
		return $member;
	}
}