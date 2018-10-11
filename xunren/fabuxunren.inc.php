<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!$_G['uid']) {
	showmessage('not_loggedin', NULL, array(), array('login' => 1));
}

if($_GET['pluginop'] == 'add' && submitcheck('adduser')) {
	$xdate = addslashes(strip_tags($_GET['datetime']));
	$xname = addslashes(strip_tags($_GET['gamename']));
	$xserver = addslashes(strip_tags($_GET['server']));
	$xuser = addslashes(strip_tags($_GET['gameuser']));
	$xgroup = addslashes(strip_tags($_GET['group']));
	$xfriend = addslashes(strip_tags($_GET['friend']));
	$text = addslashes(strip_tags($_GET['text']));

	DB::query("INSERT INTO ".DB::table('xunren_user')." (uid, xname, xuser, xdate, xserver, xgroup, xfriend, type, xtext) VALUES ('$_G[uid]', '$xname', '$xuser', '$xdate', '$xserver', '$xgroup', '$xfriend', '2', '$text')");
	showmessage('添加成功!', 'home.php?mod=spacecp&ac=plugin&id=xunren:fabuxunren');

} elseif($_GET['pluginop'] == 'update' && submitcheck('updateuser')) {
	if(!empty($_GET['delete'])) {
		C::t('#xunren#xunren_user')->delete_by_uid_usernames($_G['uid'], $_GET['delete']);
	}

	$_GET['comment'] = daddslashes($_GET['comment']);

	foreach($_GET['comment'] as $key => $value) {
		C::t('#xunren#xunren_user')->update_comment_by_uid_xid($_G['uid'], $key, strip_tags($_GET['comment'][$key]['xh_name']), strip_tags($_GET['comment'][$key]['xh_user']), strip_tags($_GET['comment'][$key]['xh_date']), strip_tags($_GET['comment'][$key]['xh_server']), strip_tags($_GET['comment'][$key]['xh_group']), strip_tags($_GET['comment'][$key]['xh_friend']), strip_tags($_GET['comment'][$key]['xh_text']));
	}
	showmessage('更新成功!', 'home.php?mod=spacecp&ac=plugin&id=xunren:fabuxunren');
}

$repeatusers = array();
foreach(C::t('#xunren#xunren_user')->fetch_all_by_uid($_G['uid'],2) as $xunren_user) {
	$xunrenall['xh_id'] = htmlspecialchars($xunren_user['xid']);
	$xunrenall['xh_name'] = $xunren_user['xname'];
	$xunrenall['xh_user'] = $xunren_user['xuser'];
	$xunrenall['xh_date'] = $xunren_user['xdate'];
	$xunrenall['xh_server'] = $xunren_user['xserver'];
	$xunrenall['xh_group'] = $xunren_user['xgroup'];
	$xunrenall['xh_friend'] = $xunren_user['xfriend'];
	$xunrenall['xh_text'] = $xunren_user['xtext'];
	$repeatusers[] = $xunrenall;
}


?>