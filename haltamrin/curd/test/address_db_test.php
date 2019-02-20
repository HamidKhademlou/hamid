<?php

require __DIR__ . '/../model/address/Address.php';
require __DIR__ . '/../model/address/db/AddressDBManager.php';


$dBManager = new AddressDBManager();

$object = new Address();

$object->setLocation('HassanAbad');
$object->setPostalCode('13648465');

//$userObject->setRole();
//$userObject->setAddress();


$dBManager->insert($object);


var_dump($object);