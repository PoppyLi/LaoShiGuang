<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$aid = empty($_GET['aid'])?0:intval($_GET['aid']);
if(empty($aid)) {
	showmessage('抱歉，您尚未正确内容');
}

$article = C::t('#xunren#xunren_user')->fetch_by_xid($aid);

$page = intval($_GET['page']);
if($page<1) $page = 1;

$content = $contents = array();
$multi = '';

//$content = C::t('portal_article_content')->fetch_by_aid_page($aid, $page);

include_once template("xunren:xiangxi");
?>