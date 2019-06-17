<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.main_btn{
  margin: 0 auto; 
 
}
.main_btn button{
  background:#233f67;
  color:#fff;
  border:none;
  position:relative;
  height:60px;
  font-size:1.6em;
  padding:0 2em;
  cursor:pointer;
  transition:800ms ease all;
  outline:none;
  width:100%;
}
.main_btn button:hover{
  background:#fff;
  color:#233f67;
}
.main_btn button:before, .main_btn  button:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background: #233f67;
  transition:400ms ease all;
}
.main_btn button:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.main_btn button:hover:before, .main_btn button:hover:after{
  width:100%;
  transition:800ms ease all;
}
</style>
<div class="content_wrap">
	<form name="fish" id="fish" action="<?=G5_BBS_URL?>/fish_reservation_list.php" onsubmit="return checkfish();" method="post">
	<input type="hidden" name="bo_table" value="fish">

	<div class="item box_wrap">
		<h2>낚시,어디로 가세요?<?=$ca_name?></h2>
		<?
		switch ($ca_name) {

		case "선상" : $check1="checked";

		break;

		case "갯바위" : $check2="checked";

		break;

		case "방파제" : $check3="checked";

		break;

		default : break;

		}

		?>
		<div class="item box_content">
			<label for="ca_name1">
			<input type="radio" name="ca_name" value="선상"  id="ca_name1" <?=$check1?>> 선상</label>&nbsp;&nbsp;
			<label for="ca_name2">
			<input type="radio" name="ca_name" value="갯바위" id="ca_name2" <?=$check2?>> 갯바위</label>&nbsp;&nbsp;
			<label for="ca_name3">
			<input type="radio" name="ca_name" value="방파제" id="ca_name3" <?=$check3?>> 방파제</label>
		</div>
	</div>

	<div class="item box_wrap">
		<h2>언제 가시나요?</h2>
		<div class="date_wrap">
			<label for="f_date" class=""></label>
			<input type="text" name="f_date" id="f_date"  class="" size="32" placeholder="날짜를 선택해주세요" readonly style="border:1px solid #365480;  padding:0 20px; border-radius:3px; line-height:50px; cursor:pointer;">
		</div>
	</div>
	<div class="item box_content">
		<h2>잡고 싶은 어종이 있나요?</h2>
		<div>
			<label for="wr_2_1" class="">
				<input type="checkbox" name="wr_2_array[]" value="쭈꾸미"  id="wr_2_1" checked <?if(strpos($wr_2, "쭈꾸미") !== false) echo "checked";?> > 쭈꾸미
			</label>&nbsp;&nbsp;
			<label for="wr_2_2" class="">
				<input type="checkbox" name="wr_2_array[]" value="감성돔" id="wr_2_2"checked  <?if(strpos($wr_2, "감성돔") !== false) echo "checked";?> > 감성돔
			</label>&nbsp;&nbsp;
			<label for="wr_2_3" class="">
				<input type="checkbox" name="wr_2_array[]" value="갈치" id="wr_2_3" checked <?if(strpos($wr_2, "갈치") !== false) echo "checked";?> > 갈치
			</label>&nbsp;&nbsp;
			<label for="wr_2_4" class="">
				<input type="checkbox" name="wr_2_array[]" value="민어" id="wr_2_4" checked <?if(strpos($wr_2, "민어") !== false) echo "checked";?> > 민어
			</label>
		</div>
	</div>
		<br><br><br>
	<div class="main_btn">
		<button>검색하기</button>
	</div>
	</form>
</div>

<!-- 달력출력 -->
<script>
$(function(){
	$("#f_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" , minDate: 1 ,maxDate: "+14D"});
});
</script>
<script>


function checkfish(){
	var mb_id ="<?=$member[mb_id]?>";

	if(mb_id == ""){
		alert("회원만 이용가능합니다.");
		location.href=g5_url+"/bbs/login.php";
		return false;
	}

	var wr_2 = $(':input[id=wr_2]:checkbox:checked').val();

	var ca_name = $(':input[name=ca_name]:radio:checked').val();

	var f_date = $("#f_date").val();

	if(!ca_name){
		alert("장소를 선택하세요");
		return false;
	}
	if(!f_date){
		alert("예약일 선택하세요");
		return false;
	}
}
</script>





<?php
include_once(G5_PATH.'/tail.php');
?>