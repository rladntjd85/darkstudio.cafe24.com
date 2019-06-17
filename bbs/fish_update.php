<?php
include_once('./_common.php');

if($type == "c"){

	$query ="update g5_fish set reservation ='예약취소'  where f_idx='$f_idx'";
	sql_query($query);
	
}else if($type == "f"){
	$query ="update g5_fish set reservation ='입금확인'  where f_idx='$f_idx'";
	sql_query($query);
	
}

//reservation

goto_url("./fish_reservation_confirm.php?bo_table=".$bo_table);
?>