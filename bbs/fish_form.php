<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.php');


$sql ="select * from g5_write_fish where wr_id =$wr_id";
$row = sql_fetch($sql);

$sql ="select * from g5_fish where f_idx =$f_idx ";
$fish = sql_fetch($sql);


?>

<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo G5_BBS_URL ?>/fish_form_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="f_idx" value="<?php echo $f_idx ?>">
	<input type="hidden" name="mb_id" value="<?php echo $member[mb_id] ?>" id="mb_id"  >
	<input type="hidden" name="f_date" value="<?php echo $f_date ?>" id="f_date"  >
	<input type="hidden" name="reservation" value="예약" id="reservation"  >


	<div class="">
         <label for="mb_name" class=""><strong>배이름 :</strong><?php echo $row[wr_subject]; ?></label>
	</div>

	<div class="">
         <label for="ca_name" class=""><strong>선택장소: </strong><?=$row[ca_name]; ?></label>
	</div>

	<div class="">
         <label for="wr_2" class=""><strong>선택어종: </strong>
		 <!-- <input type="text"name="wr_2" id="wr_2" value="<?=$wr_2 ?>"> -->
		 <input type="checkbox" name="wr_2" value="<?=$wr_2 ?>" checked ><?=$wr_2 ?></label>
	</div>


	<div class="">
         <label for="wr_4" class=""><strong>금액 :</strong><?php echo $row[wr_4]; ?>원</label>
	</div>


	<div class="">
         <label for="mb_name" class=""><strong>예약자명  :</strong>
            <input type="text" name="mb_name" id="mb_name" required class="" size="50" maxlength="255" placeholder="예약자명을 입력해주세요."></label>
	</div>

	<div class="">
         <label for="mb_hp" class=""><strong>연락처  :</strong>
            <input type="text" name="mb_hp" id="mb_hp" required class="" size="50" maxlength="255" placeholder="연락처를 입력해주세요."></label>
	</div>

	<div class="">
		 <label for="f_date" class=""><strong>선택 예약일:</strong><?php echo $f_date ?></label>
            
	</div>

    <div class="">
        <input type="submit" value="예약하기" id="btn_submit" accesskey="s" class="btn_submit btn">
		<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel btn">취소</a>
    </div>
    </form>

    <script>
  
    function fwrite_submit(f)
    {


        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<?
include_once(G5_PATH.'/tail.php');

?>
