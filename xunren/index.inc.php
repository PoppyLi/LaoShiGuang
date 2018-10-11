<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$action = addslashes($_GET['action']);
$op = addslashes($_GET['op']);

if($action == 'list1' || $action == '') {
	$list1 = array();
	$listsql1 = array();
	$multi = '';
	$count = 1;
	$multi=multi($count,10,$curpage,'plugin.php?id=xunren:index&action=list1');
	if($op == '')
		$listsql1 = C::t('#xunren#xunren_user')->fetch_all_by_type(1);
	elseif($op == 'search1'){
		$cks1name = addslashes($_GET['s1name']);
		$cks1where = addslashes($_GET['s1where']);
		$listsql1 = C::t('#xunren#xunren_user')->fetch_where_by_value(1, $cks1where, $cks1name,1,5);
	}

	foreach($listsql1 as $xunren_user) {
		$count = $count + 1;
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
	if($op == '')
		$listsql2 = C::t('#xunren#xunren_user')->fetch_all_by_type(2);
	elseif($op == 'search2'){
		$cks2name = addslashes($_GET['s2name']);
		$cks2where = addslashes($_GET['s2where']);
		$listsql2 = C::t('#xunren#xunren_user')->fetch_where_by_value(2, $cks2where, $cks2name,1,5);
	}

	foreach($listsql2 as $xunren_user) {
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