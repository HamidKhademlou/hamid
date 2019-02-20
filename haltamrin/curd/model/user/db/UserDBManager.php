<?php

class UserDBManager
{

    private $db;

    /**
     * AddressDBManager constructor.
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost:3306;dbname=user_crud', 'root', 'toor');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param User $object
     */
    public function insertUser($object)
    {

        //TODO check address id is available

        $sql = "INSERT INTO `user` (`username`, `password`, `email`, `firstName`, `LastName`, `address_id`, `role_id`)
 VALUES ('{$object->getUsername()}', '{$object->getPassword()}', '{$object->getEmail()}', '{$object->getFirstName()}', '{$object->getLastName()}', '{$object->getAddress()->getId()}', '1');";


        $this->db->exec($sql);
    }


}