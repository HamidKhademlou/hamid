<?php


require 'model/user/User.php';
require 'model/user/db/UserDBManager.php';


$userDBManager = new UserDBManager();

$userObject = new User();

$userObject->setUsername('hasan');
$userObject->setPassword('hasan');
$userObject->setEmail('hasan');
$userObject->setFirstName('hasan');
$userObject->setLastName('hasan');
//$userObject->setRole();
//$userObject->setAddress();



$userDBManager->insertUser($userObject);


var_dump($userObject);