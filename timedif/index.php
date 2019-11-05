<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/woodart.php';

/**
 * This function gives data for making request according to dates by months.
 */
function getMonthDatesFromPast($monthsAgo = 0){
   $monthsAgo = abs(intval($monthsAgo));
   $tYear = date('Y');
   $tMonth = date('m');
   $date = new DateTime("$tYear-$tMonth-01");
   $dateFrom = $date->sub(new DateInterval("P" . (string)$monthsAgo . "M"))->format('Y-m-d 00:00:00');
   $dateTo = $date->add(new DateInterval("P1M"))->format('Y-m-d 00:00:00');
   $time=strtotime($dateFrom);
   $month=date("m",$time);
   $year=date("Y",$time);
   return [
      'dateFrom'=>$dateFrom,
      'dateTo'=>$dateTo,
      'month'=>$month,
      'year'=>$year,
      'days'=>cal_days_in_month(CAL_GREGORIAN, $month, $year)
   ];
}
echo date('Y-m-d H:i');

$sum = 0;
$statDays = getMonthDatesFromPast();
$statFrom = $statDays['dateFrom']; 
$statTo = $statDays['dateTo']; 
$whereClause =  " userid = 1 and time > '$statFrom' and time < '$statTo' ";
// ddd($statDays);
$db = new QueryBuilder(Connection::make());

$events = $db->selectAll('userevents', $whereClause, 'id');

if ($events[0]['type'] == 'out')

for ($i = 0; $i < count($events); $i++) {
   
}
ddd($events);
ddd(getMonthDatesFromPast(1));

$strStart = '2013-06-19 18:25';
   $strEnd   = '06/19/13 21:47';
$dteStart = new DateTime($strStart);
$dteEnd   = new DateTime($strEnd);
$dteDiff  = $dteStart->diff($dteEnd);
print $dteDiff->format("%H:%I:%S");
print ("\r");
print $dteDiff->format("%H:%I:%S");

