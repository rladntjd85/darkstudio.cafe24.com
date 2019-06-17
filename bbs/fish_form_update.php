<?
include_once('./_common.php');


//print $reservation;

//exit;

function format_phone($mb_hp){
//
    $mb_hp = preg_replace("/[^0-9]/", "", $mb_hp);
    $length = strlen($mb_hp);

    switch($length){
      case 11 :
          return preg_replace("/([0-9]{3})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $mb_hp);
          break;
      case 10:
          return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $mb_hp);
          break;
      default :
          return $mb_hp;
          break;
    }
}



$mb_hp = format_phone($mb_hp);


if($w == ""){

	$sql = "INSERT INTO g5_fish 
				SET
					wr_2				='$wr_2',
					mb_id				='$mb_id',
					mb_name				='$mb_name',
					mb_hp				='$mb_hp',
					bo_table			= '$bo_table',
					wr_id				= '$wr_id',
					f_date				= '$f_date',
					reservation			= '$reservation',
					r_date				= NOW()
			";
	sql_query($sql);

//인설트한 키값 받기 write_update가서 와서 f_idx에 담아서 보낸다 이전에는 g5_write_fish테이블이었다.
    $f_idx = sql_insert_id();

}else{

	$sql = "update g5_fish
				SET
					mb_id				='$mb_id',
					r_date             = '$r_date',
				where
					b_idx = $b_idx
				
			";

	sql_query($sql);

}


goto_url("./fish_reservation_result.php?f_idx=".$f_idx);

?>