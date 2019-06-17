<?php
include_once('./_common.php');


include_once(G5_PATH.'/head.php');

$sql ="select * from g5_fish where f_idx =$f_idx ";
$fish = sql_fetch($sql);

$sql ="select * from g5_write_fish where wr_id =$fish[wr_id]";
$row = sql_fetch($sql);
?>
<style>
.main_btn a{
  background:#365480;
  color:#fff;
  border:none;
  position:relative;
  height:80px;
  font-size:1.6em;
  padding:0 2em;
  cursor:pointer;
  transition:800ms ease all;
  outline:none;
}
.main_btn a:hover{
  background:#fff;
  color:#365480;
}
.main_btn a:before, .main_btn  a:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background: #365480;
  transition:400ms ease all;
}
.main_btn a:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.main_btn a:hover:before, .main_btn a:hover:after{
  width:100%;
  transition:800ms ease all;
}


.result_box{
	width:600px;margin:0 auto;overflow:hidden;font-size:16px;margin-top:15px;
}


.result_box table th{
	background:#365480;
	color:#fff;
	height:50px;
}

.result_box table td{
	padding-left:30px;
	text-align:left;
}
</style>



<div class="result_box" style="">
	<div style="font-size : 18pt;text-align:center;width:100%;overflow:hidden;background:#fff;color:#365480;height:50px;line-height:50px;margin-bottom:20px"> * <!-- <?=$row['wr_subject']?> --> 예약이 완료되었습니다.</div>

<table width="100%"  border="0" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #365480">
	<tr height="35" >
		<th width="25%"style="border-right:1px solid #365480;">ID</th>
		<td width="75%" ><?=$fish['mb_id']?></td>
	</tr>

	<tr height="1">
		<td style="border-top:1px solid #fff;"></td>
		<td style="border-top:1px solid #365480;"></td>
	</tr>
	<tr height="35">
		<th>예약자</th>
		<td><?=$fish['mb_name']?></td>
	</tr>
	<tr height="1">
		<td style="border-top:1px solid #fff;"></td>
		<td style="border-top:1px solid #365480;"></td>
	</tr>
	<tr height="35">
		<th>예약연락처</th>
		<td><?=$fish['mb_hp']?></td>
	</tr>
	<tr height="1">
		<td style="border-top:1px solid #fff;"></td>
		<td style="border-top:1px solid #365480;"></td>
	</tr>
	<tr height="35">
		<th>예약일</th>
		<td><?=$fish['f_date']?></td>
	</tr>
	<tr height="1">
		<td style="border-top:1px solid #fff;"></td>
		<td style="border-top:1px solid #365480;"></td>
	</tr>
	<tr height="35">
		<th>업체명</th>
		<td><?=$row['wr_subject']?></td>
	</tr>
	<tr height="1">
		<td style="border-top:1px solid #fff;"></td>
		<td style="border-top:1px solid #365480;"></td>
	</tr>
	<tr height="35">
		<th>어종</th>
		<td><?=$fish['wr_2']?></td>
	</tr>
</table>
</div>








<div class="result_box" style="">
	<div style="font-size : 18pt;text-align:center;width:100%;overflow:hidden;background:#fff;color:#365480;height:50px;line-height:50px;margin-bottom:20px">* 안내사항</div>
	<div style="font-size : 10pt;">

<textarea name="" style="width:100%;height:200px;border:1px solid #365480" readonly>
입금계좌: 땡땡은행 324234-234-234-XXXX

24시간 내에 입금을 하지 않으시면 자동 취소됩니다.

4일전 예약취소:전액환불

3일전 예약취소:80%환불

2일전 예약취소:50%환불

당일 취소 환불은 불가합니다.

</textarea>
	</div>
	<div class="main_btn" style="text-align:center;margin-top:50px;width:100%">
		<a href="./fish_reservation_confirm.php?f_idx=<?=$f_idx?>&bo_table=<?=$fish[bo_table];?>" class="main_btn">나의 예약내역 보기</a>
	</div>
</div>



<br>

<?
include_once(G5_PATH.'/tail.php');
?>
