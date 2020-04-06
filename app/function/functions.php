<?php

$cate = array();
use Carbon\Carbon;
function stripUnicode($str){
      if(!$str) return false;
      $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '' =>'?|(|)|[|]|{|}|#|%|-|<|>|,|:|;|.|&|–|/'
      );

      foreach($unicode as $khongdau=>$codau) {
         $arr=explode("|",$codau);
         $str = str_replace($arr,$khongdau,$str);
      }
      return $str;
   }

               
function changeTitle($str){
   $str = trim($str);
   if ($str=="") return "";
      $str =str_replace('"','',$str);
      $str =str_replace("'",'',$str);
      $str = stripUnicode($str);
      $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');    // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
      $str = str_replace(' ','-',$str);
      
   return $str;
}
function treeCate($data, $parent = 0)
{
   static $tree2 = array();
   foreach ($data as $key => $val) {
     
      $id = $val["ID"];
      $name = $val["Name"];
      
      if($val["ParentID"]==$parent)
      {
         array_push($tree2,$id);
         treeCate($data,$id);
      }

   }
   return $tree2;
}

function cate_parent($data, $parent = 0, $str="--",$select=0)
{

	foreach ($data as $key => $val) {
     
		$id = $val["ID"];
		$name = $val["Name"];

		if($val["ParentID"]==$parent)
		{
			if($select != 0 && $id == $select)
			{
				echo "<option value='$id' selected='selected'>$str $name</option>";
			}
			else
			{
				echo "<option value='$id'>$str $name</option>";
			}
			
			cate_parent($data,$id,$str."--");
		}
	}
}
function cate_category($data, $parent = 0, $str="--",$select=0)
{

   foreach ($data as $key => $val) {
     
      $id = $val->ID;

      $name = $val->Name;

      if($val->ParentID==$parent)
      {
         if($select != 0 && $id == $select)
         {
            echo "<option value='$id' selected='selected'>$str $name</option>";
         }
         else
         {
            echo "<option value='$id'>$str $name</option>";
         }
         
         cate_category($data,$id,$str."--");
      }
   }
}
function gettime($time){
   
   // dd($time);
   $curent_time = Carbon::now();
   $curent_time->toDateTimeString();

   $starttime = strtotime($time);
   // dd($starttime);
   $endtime = strtotime($curent_time);
   // dd($endtime);
   $diff = $endtime - $starttime;

   if($diff < 3600)
   {
      $minutes = $diff/60;
      return floor($minutes)." phút";
   }
   elseif($diff < 24*60*60)
   {
      $hours = $diff/60/60;
      return round($hours,1)." giờ";
   }
   elseif($diff < 30*24*60*60)
   {
      $days = $diff/24/60/60;
      return round($days,1)." ngày";
   }
   elseif($diff < 12*30*24*60*60)
   {
      $mouths = $diff/30/24/60/60;
      return round($mouths,1)." tháng";
   }
   else
   {
      $years = $diff/12/30/24/60/60;
      return round($years,1)." năm";
   }
}
function checkStateusers($lastLoginTime, $lasrLogOutTime)
{

   $lastlogintime = strtotime($lastLoginTime);
   $lastlogouttime = strtotime($lasrLogOutTime);
   if($lastlogintime > $lastlogouttime){
     
      return "active";
   }else{
      return gettime($lasrLogOutTime);
   }
}