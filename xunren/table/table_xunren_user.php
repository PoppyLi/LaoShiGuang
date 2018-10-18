<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_xunren_user extends discuz_table
{
	public function __construct() {

		$this->_table = 'xunren_user';
		$this->_pk    = '';

		parent::__construct();
	}


	public function fetch_all_by_uid($uid,$type) {
		return DB::fetch_all("SELECT * FROM %t WHERE uid=%d and type=%d", array($this->_table, $uid, $type));
	}

	public function fetch_all_by_type($type) {
		return DB::fetch_all("SELECT * FROM %t WHERE type=%d", array($this->_table, $type));
	}

	public function fetch_where_by_value($type, $where, $value) {
		return DB::fetch_all("SELECT * FROM %t WHERE type=%d and $where LIKE %s", array($this->_table, $type, '%'.$value.'%'));
	}

	public function delete_by_uid_usernames($uid, $usernames) {
		DB::query("DELETE FROM %t WHERE uid=%d AND xid IN (%n)", array($this->_table, $uid, $usernames));
	}

	public function update_comment_by_uid_xid($uid, $xid, $xname, $xuser, $xdate, $xserver, $xgroup, $xfriend, $xtext) {
		DB::query("UPDATE %t SET xname=%s,xuser=%s,xdate=%s,xserver=%s,xgroup=%s,xfriend=%s,xtext=%s WHERE uid=%d AND xid=%d", array($this->_table, $xname, $xuser, $xdate, $xserver, $xgroup, $xfriend, $xtext, $uid, $xid));
	}

	public function fetch_by_xid($xid) {
		return DB::fetch_first("SELECT * FROM %t WHERE xid=%d", array($this->_table, $xid));
	}

	public function fetch_type_count($type) {
		return DB::result_first("SELECT count(*) FROM %t WHERE type=%d", array($this->_table, $type));
	}

	public function fetch_limt_type($type,$start,$perpage) {
		return DB::fetch_all("SELECT * FROM %t WHERE type=%d".DB::limit($start, $perpage), array($this->_table, $type));
	}

	public function fetch_where_count($type, $where, $value) {
		if(!empty($where) && !empty($value)){
			return DB::result_first("SELECT count(*) FROM %t WHERE type=%d and $where LIKE %s", array($this->_table, $type, '%'.$value.'%'));
		}else{
			return DB::result_first("SELECT count(*) FROM %t WHERE type=%d", array($this->_table, $type));
		}
	}

	public function fetch_limt_value($type, $where, $value, $start, $perpage) {
		if(!empty($where) && !empty($value)){
			return DB::fetch_all("SELECT * FROM %t WHERE type=%d and $where LIKE %s".DB::limit($start, $perpage), array($this->_table, $type, '%'.$value.'%'));
		}else{
			return DB::fetch_all("SELECT * FROM %t WHERE type=%d".DB::limit($start, $perpage), array($this->_table, $type));
		}
	}
}

?>