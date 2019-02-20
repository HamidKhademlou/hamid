<?php

class AddressDBManager
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
     * @param Address $object
     */
    public function insert($object)
    {
        $sql = "INSERT INTO `address` (`location`, `postalCode`)
 VALUES ('{$object->getLocation()}', '{$object->getPostalCode()}');";

        $this->db->exec($sql);
    }


    /**
     * @param int $int
     * @return Address|null
     */
    public function select($int)
    {
        $sql = "SELECT * FROM `address` WHERE `id` = ? ";

        $statement = $this->db->prepare($sql);
        $statement->execute(array($int));
        $result = $statement->fetch();

        if (!empty($result)) {
            $a = new Address();
            $a->setId($result['id']);
            $a->setLocation($result['location']);
            $a->setPostalCode($result['postalCode']);
            return $a;
        } else {
            return null;
        }
    }


}