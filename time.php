<?php
// // date_default_timezone_set("Asia/Tehran");
// echo date("Y/m/d h/i/sa", time());
// echo "<br>";
// echo time();//timestamp
// echo "<br>";
// $a = mktime(9, 31, 30, 11, 12, 2015);
// echo date("Y/m/d H/i/sa", $a);
// echo "<br>";

// $d = strtotime("today");
// echo date("Y/m/d H/i/sa", $d);
// echo "<br>";

// $startdate = strtotime("saturday");
// $enddate = strtotime("+6 weeks", $startdate);
// while ($startdate < $enddate) {
//     echo date("M d", $startdate) . "<br>";
//     $startdate = strtotime("+1 week", $startdate);
// }

// echo "<br>";
// $d1 = strtotime("July 30");
// $d2 = ceil(($d1 - time()) / 60 / 60 / 24);
// // var_dump($d2); die;
// echo "There are " . $d2 . " days until 4th of July.";
// echo "<br>";

// $start = new DateTime("08:00");
// $end = new DateTime("16:00");
// $interval = $start->diff($end);
// $workingHours = (strtotime($end) - strtotime($start)) / 3600;
// echo $interval->format("%H");

$start = \DateTime::createFromFormat('d. m. Y', '22. 11. 1968');
echo 'Start date: ' . $start->format('Y.m.d') . "\n";

// create a copy of $start and add one month and 7 days
$end = clone $start;
$end->add(new \DateInterval('P1M7D'));

$diff = $end->diff($start);
echo '<br> Difference: ' . $diff->format('%m month, %d days (total: %a days)') . "\n";