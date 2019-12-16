<?php
session_start();
// echo $ip = $_SERVER['REMOTE_ADDR'];
$ip = getenv('HTTP_CLIENT_IP') ?:
$ip1 = getenv('HTTP_X_FORWARDED_FOR') ?:
$ip2 = getenv('HTTP_X_FORWARDED') ?:
$ip3 = getenv('HTTP_FORWARDED_FOR') ?:
$ip4 = getenv('HTTP_FORWARDED') ?:
$ip5 = getenv('REMOTE_ADDR');

echo "HTTP_CLIENT_IP  : " . $ip . "</br>";
echo "HTTP_X_FORWARDED_FOR : " . $ip1 . "</br>";
echo "HTTP_X_FORWARDED : " . $ip2 . "</br>";
echo "HTTP_FORWARDED_FOR  : " . $ip3 . "</br>";
echo "HTTP_FORWARDED  : " . $ip4 . "</br>";
echo "REMOTE_ADDR : " . $ip5 . "</br>";
echo $_SERVER['REMOTE_ADDR'] . "</br>";
echo $_SERVER['HTTP_USER_AGENT'] . "</br>";

var_dump($_SESSION);