<?php

class RoleDBManager
{

    private $db;

    /**
     * AddressDBManager constructor.
     * @param string $table
     */
    public function __construct()
    {
        $this->db = new PDO('jdbc:mysql://localhost:3306/user_crud', 'root', 'toor');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert($object)
    {
        $sql = "";
    }


}