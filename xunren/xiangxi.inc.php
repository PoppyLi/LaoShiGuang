<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$aid = empty($_GET['aid'])?0:intval($_GET['aid']);
if(empty($aid)) {
	showmessage('抱歉，您尚未正确内容');
}

$article = C::t('#xunren#xunren_user')->fetch_by_xid($aid);

$article_comment = array();
foreach(C::t('#xunren#xunren_comment')->fetch_all_by_xid($aid) as $xunren_comment) {
	$xunrenall['xh_cid'] = htmlspecialchars($xunren_comment['cid']);
	$xunrenall['xh_uid'] = $xunren_comment['uid'];
	$xunrenall['xh_username'] = $xunren_comment['username'];
	$xunrenall['xh_xid'] = $xunren_comment['xid'];
	$xunrenall['xh_dateline'] = $xunren_comment['dateline'];
	$xunrenall['xh_message'] = htmlspecialchars($xunren_comment['message']);
	$xunrenall['xh_status'] = $xunren_comment['status'];
	$article_comment[] = $xunrenall;
}

$page = intval($_GET['page']);
if($page<1) $page = 1;

$content = $contents = array();
$multi = '';


if(submitcheck('addcomment')){
	$message = $_GET['message'];
	$xid = $_GET['xid'];
	if(!$_G['uid']) {
		showmessage('not_loggedin', NULL, array(), array('login' => 1));
	}
	
	if(empty($message) && empty($xid)){
		showmessage('请正确填写！');
	}else{
		require_once libfile('function/spacecp');
		cknewuser();

		$waittime = interval_check('post');
		if($waittime > 0) {
			showmessage('operating_too_fast', '', array('waittime' => $waittime), array('return' => true));
		}

		$setarr = array(
			'uid' => $_G['uid'],
			'username' => $_G['username'],
			'xid' => $xid,
			'dateline' => $_G['timestamp'],
			'status' => 0,
			'message' => addslashes(strip_tags($message))
		);

		$pcid = C::t('#xunren#xunren_comment')->insert($setarr, true);

		showmessage('评论成功!', 'plugin.php?id=xunren:xiangxi&aid='.$xid);
	}
}

include_once template("xunren:xiangxi");
?>