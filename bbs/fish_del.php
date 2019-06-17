<?php
include_once('./_common.php');

//exit;
$result="select * from g5_fish where f_idx='$f_idx'";
$row = sql_fetch($result);
//exit;

	if($f_idx==$row[f_idx])
	{
		$query ="delete from g5_fish where f_idx='$f_idx'";
		sql_query($query);
	}

?>
<center>

<FONT size=2 >삭제되었습니다.</font>
<?
goto_url("./fish_reservation_confirm.php");
?>