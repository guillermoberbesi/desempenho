<?php
class Date {
  
  function convertDateEsToEn($date) {
    $date=explode("-",$date);
    $year=$date[2];
    $month=$date[1];
    $day=$date[0];
    $date=$year."-".$month."-".$day;
    return $date;
  }
  
  function convertDateEnToEs($date) {
    $date=explode("-",$date);
    $year=$date[0];
    $month=$date[1];
    $day=$date[2];
    $date=$day."-".$month."-".$year;
    return $date;
  }
  
  function getAge($date) {
    list($year,$month,$day) = explode("-",$date);
    $year_dif = date("Y") - $year;
    $month_dif = date("m") - $month;
    $day_dif = date("d") - $day;
    if ($month_dif < 0 || ($month_dif == 0 && $day_dif < 0))
      $year_dif--;
    return $year_dif;
  }
  
  function convertTime24To12($time) {
    if($time)
      return date("h:i A", strtotime($time));
    return "--";
  }
  
}