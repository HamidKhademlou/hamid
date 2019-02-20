<?php
class Model
{
    public function __construct($servername = "localhost", $usernamee = "root", $passwordd = "", $dbname = "mydbpdo")
    {
        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$dbname", $usernamee, $passwordd);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connected successfully";
        } catch (PDOException $e) {
            echo "connection failed<br>" . $e->getMessage();
        }
    }

    public function insert($tablename, $read, $condition = null)
    {
        $con = $this->con;
        $keys = "";
        $values = "";
        foreach ($read as $key => $value) {
            $keys .= $key . " , ";
            $values .= "'" . $value . "'" . " , ";
        }
        $keys = rtrim($keys, ', ');
        $values = rtrim($values, ', ');

        if ($tablename == "kala") {
            $sql = "INSERT INTO $tablename ( id,$keys) VALUES ('',$values)";
        } elseif ($tablename == "editor") {
            $sql = "INSERT INTO $tablename ( postid,$keys) VALUES ('',$values)";
        } else {
            $sql = "INSERT INTO $tablename ( id,$keys,typeuser) VALUES ('',$values,'notactive')";
        }

        if ($condition) {
            $sql = "INSERT INTO $tablename ( id,$keys,typeuser) VALUES ('',$values,'notactive') WHERE $condition";
        }
        $con->exec($sql);
        // $last_id = $con->lastInsertId();
    }

    public function select($tablename, $fields = "*", $condition, $flag = 0)
    {
        $con = $this->con;
        $sql = "SELECT $fields FROM $tablename WHERE $condition";
        if ($condition == "") {
            $sql = "SELECT $fields FROM $tablename";
        }
        if ($tablename=="editor"){
            $sql = "SELECT $fields FROM $tablename ORDER BY postid DESC";
        }
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        if ($flag == 0) {
            return ($stmt->fetchAll(PDO::FETCH_ASSOC));
        } elseif ($flag == 1) {
            return ($stmt->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function delete($tablename, $id)
    {
        $con = $this->con;
        $sql = "DELETE FROM $tablename WHERE postid=$id";
        $con->exec($sql);
    }

    public function update($tablename, $read, $condition)
    {
        $sql = "UPDATE $tablename SET ";
        $con = $this->con;
        foreach ($read as $key => $value) {
            $sql .= $key . "=" . "'" . $value . "'" . ", ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE " . $condition;
        $con->exec($sql);
    }
}