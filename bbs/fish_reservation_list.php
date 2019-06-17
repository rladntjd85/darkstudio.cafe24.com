<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

if(!$is_member){
	alert("회원만 이용가능 합니다.","http://darkstudio.cafe24.com/bbs/login.php");
}

if($bo_table==""){
	alert("접근방법이 잘못되었습니다.");
}

$wr_2 = "";

for ($i=0; $i < count($wr_2_array); $i++){
	if($i ==0){
		$wr_2 .= $wr_2_array[$i];
	}else{
		$wr_2 .= ",".$wr_2_array[$i];
	}
}


?>


<div style="width:100%">

<script>
function fish_form(bo_table,wr_id,wr_2,f_date){
	var bo_table = bo_table;
	var wr_id = wr_id;
	var wr_2 = wr_2;
	var f_date = f_date;

//console.log(wr_2);
	$('html,body').css({'overflow': 'hidden', 'height': '100%'});
	$("#ajax_box").empty("");
	$.ajax({
		url:g5_url+"/bbs/ajax_fish_form.php",
		type:'POST',
		cache: false,
		async: true,
		data: { bo_table : bo_table , wr_id : wr_id , wr_2 : wr_2 , f_date : f_date},
		 dataType : 'html',
		success:function(html){
			$(".mask").fadeIn(500);

			$("#ajax_box").fadeIn(500);
			$("#ajax_box").html(html);
		},
		error:function(jqXHR, textStatus, errorThrown){
		}
	});
}


</script>
<?	if($f_date){?>

<br>
<table width="100%" border=0 cellpadding=0 cellspacing=0 style="font-size:18px;" >
	<tr height=50 bgcolor=#365480>
		<td width="40%" align="center" colspan=6><font color=white>[ 예약일 ] <?=$f_date?></font></td>
		<td width="60%" align=center colspan=6><font color=white>[ 선택어종 ] <?=$wr_2 ?></font></td>
	</tr>
</table>


<table width="100%" border=0  cellpadding=0 cellspacing=0 >

	<?
	//이전 페이지에서 뿌리는 것을 테이블에서 낚시장소와 날짜와 어종을 일치하는 값을 들고와야됨
	//장소가 있으면
	if($ca_name){
		$sql_add .="and ca_name = '$ca_name'";
	}
	
	//검색 조건에 선택어종이 있으면
	if($wr_2){
		$wr_2_sql = explode(",",$wr_2);
		$sql_add .=" and ( ";
		for($i=0;  $i < count($wr_2_sql); $i++){
			if($i == 0){
				$sql_add .="  wr_2 like '%$wr_2_sql[$i]%' ";
			}else{
				$sql_add .=" or wr_2 like '%$wr_2_sql[$i]%' ";
			}
		}
		$sql_add .=" )";

	}

	$sql = "SELECT * FROM g5_write_fish where 1 {$sql_add} order by wr_id desc ";
	$result = sql_query($sql);

	while($row=sql_fetch_array($result)){
	
	$sql2 = "SELECT count(*) as cnt FROM `g5_fish` where bo_table ='$bo_table' and wr_id =$row[wr_id] and f_date ='$f_date'";
	$row2 = sql_fetch($sql2);
	$thumb = get_list_thumbnail($bo_table, $row['wr_id'], "800", "300", false, true);

	if($thumb['src']) {
		$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" style="width:100%">';
	} else {
		$img_content = '<span class="no_image">no image</span>';
	}
	$row[wr_4] = preg_replace("/[^0-9]/", "", $row[wr_4]);

	?>
	<tr>
		<td align=center>
<!-- <a href="<?=G5_BBS_URL?>/fish_form.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>&wr_2=<?=$wr_2?>&f_date=<?=$f_date?>"> -->

<font style="color:blue;">

<!-- 			<a href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>">
			 -->

			<div style="position:relative; width:100%;height:300px; overflow:hidden;z-index:200">
			<?=$img_content;?>
				<div style="position:absolute; width:100%;height:100px; overflow:hidden; bottom:0px; left:0px; color:#fff;font-size:20px;background:rgba(0,0,0,0.5);z-index:300">
				</div>

				<div style="position:absolute; left:0; right:0; bottom:20px; width:80%; margin:0 auto; overflow:hidden; color:#fff;font-size:20px;z-index:500;">
					<ul>
						<li style="float:left;width:50%;margin-top:20px; text-align:left;">
							<a href="<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>" class="list_txt"><b><?=$row[wr_subject]?></b>
							<span class="view_btn">상세보기</span></a>
							<p style="font-size:18px; padding:10px 0 0 0;">현재 예약인원 : <?=$row2[cnt]?>명 |  최대인원 : <?=$row[wr_7]?>명</p>
						</li>
						<li style="float:right;width:50%;margin-top:10px; text-align:right;">

							<div style="padding:0 0 5px 0; font-size:26px;"><b><?=number_format($row[wr_4])?>원</b></div>

							<?if($row2[cnt] < $row[wr_7]){?>
							<p><span onclick="fish_form('<?=$bo_table?>','<?=$row[wr_id]?>','<?=$wr_2?>','<?=$f_date?>')" class="list_btn">예약하기</span></p>
							<?}else{?>
							<span class="list_btn">마감</span>
							<?}?>
						</li>

					</ul>
				</div>
			</div>
		  </font>
		</td>
	</tr>
	<tr height="10"><td></td></tr>
	<?
	}
	?>
	
</table>
</div>
<?
}

include_once(G5_PATH.'/tail.php');

?>



