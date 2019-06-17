<?php
include_once('./_common.php');


$sql ="select * from g5_write_fish where wr_id =$wr_id";
$row = sql_fetch($sql);

$sql ="select * from g5_fish where f_idx =$f_idx ";
$fish = sql_fetch($sql);

?>

<style>
.fish_reservation_box {
	font-size:16px;
	 
}
.fish_reservation_box input{
	width:200px;
	height:30px;
	color:16px;
	margin-top:-10px;
}
.fish_reservation_box li{
	float:left;
	list-style:none;
	height:25px;
	margin:7px 0;
}
.fish_reservation_box .left{
width:25%;

	border-right:1px solid #ccc;

}
.fish_reservation_box  .right{
width:60%;
margin-left:30px;

}


</style>
<section id="bo_w" >

	<div style="width:100%;height:40px;background:#365480;color:#fff;font-size:18px;line-height:40px;text-align:center"><b>예약 하기</b></div>

	<div style="width:100%;height:100%;overflow:hidden;margin:20px;">
		<!-- 게시물 작성/수정 시작 { -->
		<form name="fwrite" id="fwrite" action="<?php echo G5_BBS_URL ?>/fish_form_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">

		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
		<input type="hidden" name="w" value="<?php echo $w ?>">
		<input type="hidden" name="f_idx" value="<?php echo $f_idx ?>">
		<input type="hidden" name="mb_id" value="<?php echo $member[mb_id] ?>" id="mb_id">
		<input type="hidden" name="f_date" value="<?php echo $f_date ?>" >
		<input type="hidden" name="wr_2" value="<?php echo $wr_2 ?>" id="wr_2">



		<div class="fish_reservation_box">
			<li class="left">
				<strong>배이름 </strong>
			 </li>
			 <li class="right">
				<span style="color:#365480"><b><?php echo $row[wr_subject]; ?></b></span>
			 </li>
		</div>
		<div class="fish_reservation_box">
			<li class="left">
				<strong>선택장소</strong>
			 </li>
			 <li class="right">
				<span style="color:#365480"><b><?php echo $row[ca_name]; ?></b></span>
			 </li>
		</div>

		<div class="fish_reservation_box">
			<li class="left">
				<strong>선택어종</strong>
			 </li>
			 <li class="right">
				<span style="color:#365480"><b><?php echo $wr_2; ?>&nbsp;</b></span>
			 </li>
		</div>

		<div class="fish_reservation_box">
			<li class="left">
				<strong>금액</strong>
			 </li>
			 <li class="right">
				<span style="color:red"><b><?php echo number_format($row[wr_4]); ?> 원</b></span>
			 </li>
		</div>


		<div class="fish_reservation_box">
			<li class="left">
				<strong>예약자명</strong>
			 </li>
			 <li class="right">
				<input type="text" name="mb_name" id="mb_name" required  size="50" maxlength="255" placeholder="예약자명을 입력해주세요.">
			 </li>
		</div>
		<div class="fish_reservation_box">
			<li class="left">
				<strong>연락처</strong>
			 </li>
			 <li class="right">
				<input type="text" name="mb_hp" id="mb_hp" required  size="50" maxlength="255" placeholder="연락처를 입력해주세요.">
			 </li>
		</div>

		<div class="fish_reservation_box">
			<li class="left">
				<strong>선택 예약일</strong>
			 </li>
			 <li class="right">
				<span style="color:#365480"><b><?php echo $f_date ?> 일</b></span>
			 </li>
		</div>




		<div style="text-align:center;margin-top:15px;">
			<input type="submit" value="예약하기" id="btn_submit" accesskey="s" style="color:#fff;background:#365480;border-radius:3px;padding:10px 10px;cursor:pointer;border:1px solid #fff;margin-top:-5px;font-weight: bold;">
			<span onclick="fish_close()" style="color:#fff;background:#ccc;border-radius:3px;padding:10px 20px;cursor:pointer;border:1px solid #fff;font-weight: bold;">취소</span>
		</div>
		</form>

		<script>
	  
		function fwrite_submit(f)
		{


			document.getElementById("btn_submit").disabled = "disabled";

			return true;
		}
		</script>
	</div>
</section>

<script>
function fish_close(){
	$("#ajax_box").fadeOut(0);
	$("#ajax_box").empty("");
	$(".mask").fadeOut(500);
	$('html,body').css({'overflow': 'visible'});
}
</script>

