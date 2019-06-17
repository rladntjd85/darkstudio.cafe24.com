<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.php');

if(!$is_member){
	alert("회원만 이용가능 합니다.","http://darkstudio.cafe24.com/bbs/login.php");
}

$member[mb_id];


if(!$is_admin){

	$sql = "SELECT * FROM `g5_fish` where mb_id ='$member[mb_id]' ORDER BY r_date DESC";
	$result = sql_query($sql);

}else{

	$sql = "SELECT * FROM `g5_fish` ORDER BY r_date DESC";
	$result = sql_query($sql);

}
?>

<style>
.result_box table{
	border:1px solid #365480;

}


.result_box table th{
	background:#365480;
	color:#fff;
	height:30px;
	border-bottom:1px solid #365480;

}
.result_box .right_border{
	border-right:1px solid #365480;
}
.result_box table td{
	border-bottom:1px solid #365480;
	text-align:center;
	height:30px;
}
</style>

<div style="width:100%;margin:0 auto;" class="result_box">
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
<center>

<?if(!$is_admin){?>
	<div style="font-size : 18pt;text-align:center;width:100%;overflow:hidden;background:#fff;color:#365480;height:50px;line-height:50px;margin-bottom:20px"> *  나의예약</div>
<?}else{?>
	<div style="font-size : 18pt;text-align:center;width:100%;overflow:hidden;background:#fff;color:#365480;height:50px;line-height:50px;margin-bottom:20px"> *  회원 예약 내역</div>
<?}?>
</center>
<br>
	<tr style="font-size : 10pt; font-family : 굴림; color : red;">
		<th width="70">업체명</th>
		<th width="auto">장소</th>
		<th width="70">어종</th>
		<?if($is_admin){?>
		<th>회원ID</th>
		<?}?>
		<th>예약자명</th>
		<th>예약연락처</th>
		<th>금액</th>
		<th >예약일</th>
		<th width="120">예약변경</th>
		<th width="70">예약상태</th>

	</tr>
	<?
	for($i =0; $row = sql_fetch_array($result); $i++){
		$sql2 = "select * from g5_write_fish where wr_id = $row[wr_id]  "; 
		$row2 = sql_fetch($sql2);
		if($row[reservation] =="") $row[reservation] = "예약";
		if($row2[wr_subject]){


	?>
	<tr>
		<!-- <td><a href="<?=G5_BBS_URL?>/fish_form.php?bo_table=<?=$row[bo_table]?>&wr_id=<?=$row['wr_id']?>&w=u&b_idx=<?=$row[b_idx]?>"><?=$row2[wr_subject]?></a></td> -->
		<td align='center' class="right_border"><a href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>"><?=$row2[wr_subject]?></a></td>
		<td align='center' class="right_border"><?=$row2[ca_name]?></td>
		<td align='center' class="right_border"><?=$row[wr_2]?></td>
		<?if($is_admin){?>
		<td align='center' class="right_border"><?=$row[mb_id]?></td>
		<?}?>
		<td align='center' class="right_border"><?=$row[mb_name]?></td>
		<td align='center' class="right_border"><?=$row[mb_hp]?></td>
		<td align='center' class="right_border"><?=number_format($row2[wr_4])?></td>
		<td align='center' class="right_border"><?=$row[f_date]?></td>
		<td align='center' class="right_border">
	<?
		$today = date("Y-m-d");

	if( $today < $row[f_date] and ($row['reservation'] == "" and !$is_admin)  ){?>
		<a href="<?=G5_BBS_URL?>/fish_update.php?bo_table=<?=$row[bo_table]?>&f_idx=<?=$row['f_idx']?>&type=c"><input type=submit value=예약취소  onclick="if(!confirm('예약을 취소 하시겠습니까?')){return false;}" style="background:#e7ebf3;border:0px;color:#7587a2;padding:2px 2px;border-radius:2px;"></a>
	<?}?>

	<?
	if($today < $row[f_date] and $is_admin and $row['reservation'] != "예약취소" ){?>
		<a href="<?=G5_BBS_URL?>/fish_update.php?bo_table=<?=$row[bo_table]?>&f_idx=<?=$row['f_idx']?>&type=c"><input type=submit value=예약취소  onclick="if(!confirm('예약을 취소 하시겠습니까?')){return false;}" style="background:#e7ebf3;border:0px;color:#7587a2;padding:2px 2px;border-radius:2px;"></a>
	<?}else if($today < $row[f_date] and $is_member and $row['reservation'] == "예약"){?>
		<a href="<?=G5_BBS_URL?>/fish_update.php?bo_table=<?=$row[bo_table]?>&f_idx=<?=$row['f_idx']?>&type=c"><input type=submit value=예약취소  onclick="if(!confirm('예약을 취소 하시겠습니까?')){return false;}" style="background:#e7ebf3;border:0px;color:#7587a2;padding:2px 2px;border-radius:2px;"></a>
	<?}
	if($is_admin and $row['reservation'] != "입금확인"){?>
		<a href="<?=G5_BBS_URL?>/fish_update.php?bo_table=<?=$row[bo_table]?>&f_idx=<?=$row['f_idx']?>&type=f" ><input type=submit value=예약확정  onclick="if(!confirm('예약확정 하시겠습니까?')){return false;}" style="background:#365480;border:0px;color:#fff;padding:2px 2px;border-radius:2px;"></a>
		</td>
	<?}?>

		<td align='center'><?=$row[reservation]?></td>

	</tr>
	
	<?
		}
	}
	?>
	 
</table>
</div>


<?
include_once(G5_PATH.'/tail.php');
?>
