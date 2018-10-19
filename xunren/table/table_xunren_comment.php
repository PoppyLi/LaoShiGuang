<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_xunren_comment extends discuz_table
{
	public function __construct() {

		$this->_table = 'xunren_comment';
		$this->_pk    = '';

		parent::__construct();
	}


	public function fetch_all_by_xid($xid) {
		return DB::fetch_all("SELECT * FROM %t WHERE xid=%d", array($this->_table, $xid));
	}
}

?>