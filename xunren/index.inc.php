<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$action = addslashes($_GET['action']);
$op = addslashes($_GET['op']);


$perpage = 5;  

if($action == 'list1' || $action == '') {
	$list1 = array();
	$listsql1 = array();
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page = 1;  
	$start1 = ($page-1)*$perpage;

	if($op == ''){
		$count1 = C::t('#xunren#xunren_user')->fetch_type_count(1);
		$listsql1 = C::t('#xunren#xunren_user')->fetch_limt_type(1,$start1,$perpage);
	}elseif($op == 'search1'){
		$cks1name = addslashes($_GET['s1name']);
		$cks1where = addslashes($_GET['s1where']);

		$count1 = C::t('#xunren#xunren_user')->fetch_where_count(1, $cks1where, $cks1name);
		$listsql1 = C::t('#xunren#xunren_user')->fetch_limt_value(1, $cks1where, $cks1name,$start1,$perpage);
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

	$multipage1 = multi($count1,$perpage,$page,'plugin.php?id=xunren:index&action='.$action.'&op='.$op);
}elseif($action == 'list2') {
	$list2 = array();
	$listsql2 = array();
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) $page = 1;  
	$start2 = ($page-1)*$perpage;

	if($op == ''){
		$count2 = C::t('#xunren#xunren_user')->fetch_type_count(2);
		$listsql2 = C::t('#xunren#xunren_user')->fetch_limt_type(2,$start2,$perpage);
	}
	elseif($op == 'search2'){
		$cks2name = addslashes($_GET['s2name']);
		$cks2where = addslashes($_GET['s2where']);

		$count2 = C::t('#xunren#xunren_user')->fetch_where_count(1, $cks2where, $cks2name);
		$listsql2 = C::t('#xunren#xunren_user')->fetch_limt_value(2, $cks2where, $cks2name,$start2,$perpage);
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
	$multipage2 = multi($count2,$perpage,$page,'plugin.php?id=xunren:index&action='.$action.'&op='.$op);
}



include_once template('xunren:index');
?>