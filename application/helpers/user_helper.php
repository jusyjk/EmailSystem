<?php
function checkUserLogin($id){
    if($id){
        return true;
    }
    return false;
}

function getDateFormatted($date,$format='FdYHi'){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    $dateFormat = '';
    switch ($format){
        case 'dmY': $dateFormat='d-m-Y'; break;
        case 'dMY': $dateFormat='d-M-Y'; break;
        case 'dmYHi': $dateFormat='d-m-Y H:i'; break;
        case 'dmYHiA': $dateFormat='d-m-Y H:i A'; break;
        case 'FdY':  $dateFormat='F d, Y'; break;
        case 'FdYHi': $dateFormat='F d, Y  H:i'; break;
        case 'Hi': $dateFormat='H:i'; break;
        case 'HiA': $dateFormat='H:i A'; break;
        case 'MdYHiA': $dateFormat='M d,Y H:i'; break;
        case 'hiA': $dateFormat='h:i A'; break;
        case 'jdY':  $dateFormat='M d, Y'; break;
    }
    return date($dateFormat, strtotime($date));
}

function getDateDMY($date){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    return date('d-M-Y',strtotime($date));
}
function getDateDmYHiFormat($date){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    return date('d-m-Y H:i',strtotime($date));
}
function getDiscussDateDMY($date){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    return date('d M Y',strtotime($date));
}
function getDateMDCY($date){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    return date('M d,Y',strtotime($date));
}
function getDiscussDateDFY($date){
    if($date=='' || is_null($date) || $date=='0000-00-00'){
        return '--';
    }
    return date('d F, Y',strtotime($date));
}
function getDateDMYHIS($date){
    return date('d-M-Y H:i:s',strtotime($date));
}
function getDateFDYHI($date){
    return date('F d, Y  H:i',strtotime($date));
}
function getDateFDY($date){
    return date('F d, Y',strtotime($date));
}
function getDateDMYHI($date){
    return date('d-M-Y H:i',strtotime($date));
}
function getDateDMYDP($date){
    return date('d/m/Y',strtotime($date));
}
function getDateDmYDPL($date){
    return date('d-m-Y',strtotime($date));
}
function getCalendarEDate($date){
    return date('D, d F',strtotime($date));
}
function getDateYMDDP($date){
    return date('Y-m-d',strtotime($date));
}
function getTime($date){
    return date('g:i',strtotime($date));
}
function getTimeTP($date){
    return date('H:i',strtotime($date));
}
function getTimeTPM($date){
    return date('H:i A',strtotime($date));
}
function getTimeHIS($date){
    return date('h:iA',strtotime($date));
}
function getDateYmd($date){
    return date('Y-m-d',strtotime($date));
}
function getCurrentDateTime(){
    return date('Y-m-d H:i:s');
}
function scheduleEndTime($time) {
    return date('h:iA', strtotime($time.' +1 minute'));
}
function getAddedTime($time) {
    $exp_time = explode(':', $time);
    if($exp_time[1]==59) {
        $time = date('H:i', strtotime($time.' +1 minute'));
    } else {
        $time = date('H:i', strtotime($time));
    }
    return $time;
}
function addMinutesToTime($time, $mins=0) {
    $time = strtotime($time);
    return date('h:iA', strtotime('+'.$mins.' minutes', $time));
}
function getCurrentDate(){
    return date('Y-m-d');
}
function getCurrentDateDMY(){
    return date('d-m-Y');
}
function convertDateTime($date){
    return date('Y-m-d H:i:s',strtotime($date));
}
function convertDateTimeReport($date){
    return date('Y-m-d H:i',strtotime($date));
}
function convertTimeTP($date){
    return date('H:i:s',strtotime($date));
}
function getStrToTime($date=''){
    if(strlen($date) > 4){
        return strtotime($date);
    }else{
        return strtotime(date('Y-m-d H:i:s'));
    }
}
function getDatePickerDmY($date){
    if($date=='' || is_null($date)){
        return '--';
    }
    return date('d-m-Y',strtotime($date));
}
function getDateToDays($date) {
    $now = strtotime(date('Y-m-d'));
    $end_date = strtotime($date);
    $datediff = $end_date - $now;
    return round($datediff / (60 * 60 * 24));
}
function getDaysBetweenTwoDates($start,$end) {
    $start_date = strtotime($start);
    $end_date = strtotime($end);
    $datediff = $end_date - $start_date;
    return round($datediff / (60 * 60 * 24));
}
function communityStatus($id=false){
    $arr = array('Y'=>"Active",'N'=>"Inactive");
    if($id){
        return $arr[$id];
    }else if($id == 0){
        return $arr[$id];
    }
    return $arr;
}



function displayPagination($total,$per_page,$page,$pclname){
    $adjacents = "2";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    $setLastpage = ceil($total/$per_page);
    $lpm1 = $setLastpage - 1;
    $setPaginate = "";
    $p = (($page-1)*$per_page) + 1;
    if($setLastpage > 1) {
        $setPaginate .= "<ul class='setPaginate pagination'>";
        $setPaginate .= "<li class='setPage page-item disabled'><a href='#' class='page-link '>Total Records : <b>$total</b>&nbsp;&nbsp;|&nbsp;&nbsp;Page&nbsp;<i><b>$page</b></i>&nbsp;of&nbsp;<i><b>$setLastpage</b></i>&nbsp;&nbsp;</a></li>";

        if(($page != 0) && ($page != 1)){
            $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_1' title='First'>&laquo;</a></li>";
            $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$prev' title='Prev'>&lsaquo;</a></li>";
        }

        if ($setLastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $setLastpage; $counter++) {
                if ($counter == $page)
                    $setPaginate.= "<li class='page-item active'><a href='#' class='page-link current_page '>$counter</a></li>";
                else
                    $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter' >$counter</a></li>";
            }
        }elseif($setLastpage > 5 + ($adjacents * 2)) {
            if($page < 1 + ($adjacents * 2)){
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $setPaginate.= "<li class='page-item active' ><a href='#' class='page-link current_page '>$counter</a></li>";
                    else
                        $setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$counter' >$counter</a></li>";
                }
                $setPaginate.= "<li class='dot'>...</li>";
                $setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$lpm1'>$lpm1</a></li>";
                $setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_$setLastpage' >$setLastpage</a></li>";
            }elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
                $setPaginate.= "<li class='page-item' ><a href='#' class='page-link $pclname' id='pg_1'>1</a></li>";
                $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_2'>2</a></li>";
                $setPaginate.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $setPaginate.= "<li class='page-item active' ><a href='#' class='page-link current_page '>$counter</a></li>";
                    else
                        $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter'>$counter</a></li>";
                }
                $setPaginate.= "<li class='page-item'>..</li>";
                $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$lpm1' >$lpm1</a></li>";
                $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$setLastpage'>$setLastpage</a></li>";
            }else{
                $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_1'>1</a></li>";
                $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_2'>2</a></li>";
                $setPaginate.= "<li class='dot'>..</li>";
                for ($counter = $setLastpage - (2 + ($adjacents * 2));
                     $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $setPaginate.= "<li class='page-item active'><a href='#' class='page-link current_page '>$counter</a></li>";
                    else
                        $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$counter'>$counter</a></li>";
                }
            }
        }
        if($page < $counter - 1){
            $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$next' title='Next'>&rsaquo;</a></li>";
            $setPaginate.= "<li class='page-item'><a href='#' class='page-link $pclname' id='pg_$setLastpage' title='Last'>&raquo;</a></li>";
        }
        $setPaginate.= "</ul>\n";
    }
    return $setPaginate;
}

function validEmail($email){
    // printData($email);
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
    // printData($domainLen);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }else{
         $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
         $isValid = (preg_match($regex, $email))?$isValid:false;

      }
   }
   return $isValid;
}

function printData($postArr,$die=TRUE) {
    echo "<pre>";
    print_r($postArr);
    echo '</pre>';
    if($die) {
        die();
    }
}
/*Paggination End*/
/*Cube View Category*/




