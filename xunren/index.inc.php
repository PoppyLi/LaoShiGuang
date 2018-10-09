<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$action = addslashes($_GET['action']);
$op = addslashes($_GET['op']);

if($action == 'list1' || $action == '') {
	$list1 = array();
	$listsql1 = array();
	if($op == '')
		$listsql1 = C::t('#xunren#xunren_user')->fetch_all_by_type(1);
	elseif($op == 'search1'){
		$cks1name = addslashes($_GET['s1name']);
		$cks1where = addslashes($_GET['s1where']);
		$listsql1 = C::t('#xunren#xunren_user')->fetch_where_by_value(1, $cks1where, $cks1name);
	}

	foreach($listsql1 as $xunren_user) {
		$xunrenall['xh_id'] = htmlspecialchars($xunren_user['xid']);
		$xunrenall['xh_name'] = $xunren_user['xname'];
		$xunrenall['xh_user'] = $xunren_user['xuser'];
		$xunrenall['xh_date'] = $xunren_user['xdate'];
		$xunrenall['xh_server'] = $xunren_user['xserver'];
		$xunrenall['xh_group'] = $xunren_user['xgroup'];
		$xunrenall['xh_friend'] = $xunren_user['xfriend'];
		$xunrenall['xh_text'] = $xunren_user['xtext'];
		$list1[] = $xunrenall;
	}
}elseif($action == 'list2') {
	$list2 = array();
	foreach(C::t('#xunren#xunren_user')->fetch_all_by_type(2) as $xunren_user) {
		$xunrenall['xh_id'] = htmlspecialchars($xunren_user['xid']);
		$xunrenall['xh_name'] = $xunren_user['xname'];
		$xunrenall['xh_user'] = $xunren_user['xuser'];
		$xunrenall['xh_date'] = $xunren_user['xdate'];
		$xunrenall['xh_server'] = $xunren_user['xserver'];
		$xunrenall['xh_group'] = $xunren_user['xgroup'];
		$xunrenall['xh_friend'] = $xunren_user['xfriend'];
		$xunrenall['xh_text'] = $xunren_user['xtext'];
		$list2[] = $xunrenall;
	}
}


include_once template('xunren:index');
?>