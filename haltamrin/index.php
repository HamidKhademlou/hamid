<?php
include "class1.php";
// $obj = new person();
// echo "<br>";
// $obj->firstName = "ali";
// $obj->lastName = "alavi";
// echo "<br>";

// $arr=['20','15','11', 10, 12];
// $myvar=new person($arr);
// // var_dump($myvar);
// $myvar->arrayUitls($arr);
// echo "<br>";

// $obj = new Printst();
// $obj->printstr("String!");
// echo $obj->var;

// $obj = new check();
// $obj->isint("salam");
// echo "<br>";
// $obj->isint(6);
// echo "<br>";
// $obj->fucturiel();
// echo "<br>";

// $ans = new Calc();
// $ans->setNumber(8, 7);
// $ans->sum();
// echo "<br>";
// $ans->dif();
// echo "<br>";
// $ans->mul();
// echo "<br>";
// $ans->div();
// echo "<br>";

$ans = new Calcoop(8);
$ans->isfloat(12.1);
echo "<br>";
$ans->sum();
echo "<br>";
$ans->dif();
echo "<br>";
$ans->mul();
echo "<br>";
$ans->div();
echo "<br>";
?>