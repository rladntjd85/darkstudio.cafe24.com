<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.php');

if(!$is_member){
	alert("회원이 되신 후 이용가능 합니다..");
}


//달력출력

include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<html>
<head>
<title>운칠기삼</title>
<style>
<!--
    td  { font-size : 9pt;   }
    A:link  { font : 9pt;  	color : black; 	text-decoration : none;	font-family : 굴림;	font-size : 9pt;  }
    A:visited  {   text-decoration : none; color : black;	font-size : 9pt;  }
    A:hover  { 	text-decoration : underline; color : black; font-size : 9pt;  }

	 .jb-rem { 
	   font-family: "Arial Black", sans-serif;
        font-size: 25px;
        font-weight: bold;
        color: #ffffff;
		text-shadow: 2px 2px 2px gray; 
	}

-->	
</style>

</head>

<!-- 달력출력 오늘 선택X 14일 내에 선택 가능-->
<script>
$(function(){
	$("#f_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" , minDate: 1 ,maxDate: "+14D"});
});

</script>

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<!-- 게시판 타이틀 -->
<a href="<?php echo G5_URL ?>">
	<span class="jb-rem">운칠기삼</span>
</a>

<BR>
<BR>
<form name="fwrite" id="fwrite" action="./fish_reservation_list.php" onsubmit="return checkfish();" method="post">

<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<table width=580 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
	<tr height=20 bgcolor=#999999>
		<td width=30 align=center>
			<font color=white>낚시,어디로 가세요?</font>
		</td>
	</tr>
	<tr>
		<td>
			<input type="radio" name="ca_name" value="선상" > 
			<label for="mb_certify_1">선상</label>

			<input type="radio" name="ca_name" value="갯바위"> 
			<label for="mb_certify_2">갯바위</label>

			<input type="radio" name="ca_name" value="방파제"> 
			<label for="mb_certify_2">방파제</label>
		</td>
	</tr>
	<tr height=20 bgcolor=#999999>
		<td width=30 align=center>
			<font color=white>언제 가시나요?</font>
		</td>
	</tr>
	<tr>
		<td>
			<label for="f_date" class=""><strong>날짜선택</strong></label>
            <input type="text" name="f_date" id="f_date"  class="" size="18" placeholder="날짜를 선택해주세요." readonly>
		</td>
	</tr>
	<tr height=20 bgcolor=#999999>
		<td width=30 align=center>
			<font color=white>잡고 싶은 어종이 있나요?</font>
		</td>
	</tr>
	<tr>
		<td>
			<label for="wr_2" class=""><strong>주요어종</strong></label><br>
				<input type="checkbox" name="wr_2_array[]" value="쭈꾸미" id="wr_2"> 쭈꾸미
				<input type="checkbox" name="wr_2_array[]" value="감성돔" id="wr_2"> 감성돔
				<input type="checkbox" name="wr_2_array[]" value="갈치" id="wr_2"> 갈치
				<input type="checkbox" name="wr_2_array[]" value="민어" id="wr_2"> 민어
		</td>
	</tr>
</table>

<input type="submit" value="검색하기" id=""  class="">
</form>

</center>
</body>
</html>



<script>
	
	function checkfish(){
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
        if(!wr_2){
            alert("어종을 선택하세요");
            return false;
        }


    }

</script>

<?php
include_once(G5_PATH.'/tail.php');
?>