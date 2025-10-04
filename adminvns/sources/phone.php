<?php
if(!defined('SOURCES')) die("Error");

switch($act)
{
	case "edit":
	get_item();
	$template = "phone/man/item_add";
	break;

	case "save":
	save_item();
	$template = "phone/man/item_add";
	break;

	default:
	$template = "404";
}

/* Get phone */
function get_item()
{
	global $d, $item;
	$item = $d->rawQueryOne("select * from #_phone limit 0,1");
	$row = $d->rawQueryOne("select id, options from #_phone");
	$option = json_decode($row['options'],true);
}

/* Save phone */
function save_item()
{
	global $d, $func, $curPage;

	/* Post dữ liệu */
	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	$row = $d->rawQueryOne("select id, options from #_phone");
	$option = json_decode($row['options'],true);

	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			if(is_array($value))
			{
				foreach($value as $k2 => $v2) $option[$k2] = $v2;
				$data[$column] = json_encode($option);
			}
			else
			{
				$data[$column] = htmlspecialchars($value);
			}
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
	}

	if(isset($row['id']) && $row['id'] > 0)
	{
		$d->where('id',$id);
		if($d->update('phone',$data))
		{
			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=phone&act=edit");
		}
		else
		{
			$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=phone&act=edit", false);
		}
	}
}
?>