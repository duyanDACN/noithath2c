<?php
if(!defined('SOURCES')) die("Error");

switch($act)
{
	case "man":
	get_items();
	$template = "history/man/items";
	break;

	default:
	$template = "404";
}

/* Get history */
function get_items()
{
	global $d, $func, $curPage, $items, $paging;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and ten LIKE '%$keyword%'";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_user_log where id<>0 $where order by id desc $limit";
	$items = $d->rawQuery($sql);
	$sqlNum = "select count(*) as 'num' from #_user_log where id<>0 $where order by id desc";
	$count = $d->rawQueryOne($sqlNum);
	$total = $count['num'];
	$url = "index.php?com=history&act=man";
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit history */
function get_item()
{
	global $d, $func, $curPage, $item;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=history&act=man&p=".$curPage, false);

	$item = $d->rawQueryOne("select * from #_user_log where id = ? limit 0,1",array($id));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=history&act=man&p=".$curPage, false);
}