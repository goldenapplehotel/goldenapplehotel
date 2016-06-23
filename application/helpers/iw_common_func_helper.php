<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/* ------------------------------------------------
 * 파일명 : iw_common_func.php
 * 개  요 : 공통함수
  ------------------------------------------------ */

// validate checkbox

function func_get_post_array_checkbox($post_arr){
	$country_values= "";
		foreach ($post_arr as $selected){
			if($country_values != ""){
				$country_values .= "^".$selected;	
			}else{
				$country_values = $selected;
			}
		}
	return $country_values;
}

//POST 배열을 array['key'] = value 형태로 리턴
function func_get_post_array($post_arr) {

	$values = $post_arr;

	$keys = func_get_array_keys($values);

	$inData = "";
	for ($i = 0; $i < sizeof($keys); $i++) {
		if (is_array($values[$keys[$i]])) {
			$tmpStr = "";
			$tmpArr = $values[$keys[$i]];
			
			for ($j = 0; $j < sizeof($tmpArr); $j++) {
				$tmpStr.= $tmpArr[$j] . "|";
			}
			
			$inData[$keys[$i]] = $tmpStr;
		} else {
			$inData[$keys[$i]] = $values[$keys[$i]];
		}
	}

	return $inData;
}

function func_get_array_keys($arr) {
	$keys = '';
	if (count($arr) > 0) {
		$keys = @array_keys($arr);
	}
	return $keys;
}

//배열의 value 값을 리턴
function func_get_array_values($arr) {
	$values = '';
	if (count($arr) > 0) {
		$values = array_values($arr);
	}
	return $values;
}

//----------validate checkbox value--------------
function func_checkbox_validate($post_value,$val_checkbox){
	$checkbox_array = explode('^',$post_value);
	$chk_status ="";
	if (count($checkbox_array) > 0) {
		for ($i = 0; $i < count($checkbox_array); $i++) {
			if ($checkbox_array[$i] == $val_checkbox) {
				$chk_status = 'checked="checked"';
			}
		}
	}
	return $chk_status;
}

function func_get_post_checkbox($post_arr){
	$sch_checkbox = array();
	$sch_checkbox = $post_arr;

	if ($sch_checkbox != '') {

		if(count($sch_checkbox) > 0)
		{
			$tmpStr = '';

			for($i = 0; $i < count($sch_checkbox); $i++)
			{
				if ($tmpStr != '') {
					$tmpStr .= ' or ';
				}
				$chk_condition = $sch_checkbox[$i] ;
				$where[$chk_condition] = 'Y';
			}

		}
	}
	return $sch_checkbox;
}

?>
