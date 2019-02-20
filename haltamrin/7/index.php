<?php
include "arr.php";
$result=new arr();
$result->setvalue(0,4);
$result->setvalue(1,2);
$result->setvalue(2,5);
$result->setvalue(3,-1);
$result->setvalue(4,8);
$result->view(4);
echo $result->view(4)."<br>";
// foreach($result->sort())
var_dump($result->sort());