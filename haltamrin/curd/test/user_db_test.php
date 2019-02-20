<?php

require __DIR__ . '/../model/user/User.php';
require __DIR__ . '/../model/user/db/UserDBManager.php';

require __DIR__ . '/../model/address/Address.php';
require __DIR__ . '/../model/address/db/AddressDBManager.php';


$userDBManager = new UserDBManager();
$addressDBManager = new AddressDBManager();

$userObject = new User();
$addressObject = $addressDBManager->select(3);


$userObject->setUsername('hasan23');
$userObject->setPassword('hasan23');
$userObject->setEmail('hasan23');
$userObject->setFirstName('hasan23');
$userObject->setLastName('hasan23');
//TODO set role from db like address
//$userObject->setRole();
$userObject->setAddress($addressObject);


$userDBManager->insertUser($userObject);


var_dump($userObject);