<?php

class Model
{
    public $con = null;
    /**
     * conection to database construct function
     */
    public function __construct($servername = db_Servername, $username = db_username, $password = db_password, $dbname = db_Databasename)
    {
        try {
            $this->con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully"."<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->con;
    }

    /**
     * Database INSERT function
     */
    public function insert($tbname, $array)
    {
        $conn = $this->con;
        $keys = $values = null;
        foreach ($array as $key => $value) {
            // $key = $this->test_input($key);
            $keys .= $key . ", ";
            //Security Validate before insert:
            // $value = $this->test_input($value);
            $values .= "'" . $value . "', ";
        }

        $keys = rtrim($keys, ', ');
        $values = rtrim($values, ', ');

        try {
            $sql = "INSERT INTO $tbname (id,$keys)
            VALUES ('',$values)";
            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    /**
     * Database SELECT function
     */
    public function search($col, $tbname, $condition, $fetchall = true)
    {
        $conn = $this->con;
        $output = null;
        try {
            if (empty($condition)) {
                $stmt = $conn->prepare("SELECT $col FROM $tbname");
            } else {
                $stmt = $conn->prepare("SELECT $col FROM $tbname WHERE $condition");
            }
            $stmt->execute();

            //Set the all result to associative array output: 
            $i = 0;
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output[$i] = $result;
                $i++;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        if ($fetchall == true) {
            return $output;
        } else {
            return $output[$i - 1];
        }
    }

    /**
     * Database UPDATE function
     */
    public function update($associativeArray, $tbname, $condition)
    {
        $conn = $this->con;
        $job = false;
        try {
            // Prepare SQL Query
            $sql = "UPDATE $tbname SET ";
            foreach ($associativeArray as $key => $value) {
                // $keys = $this->test_input($keys);
                // $value = $this->test_input($value);
                $sql .= $key . "=" . "'" . $value . "'" . ", ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE " . $condition;

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            // echo $stmt->rowCount() . " records UPDATED successfully";
            $job = true;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            $job = false;
        }

        $conn = null;
        return $job;
    }

    /**
     * Database DELETE function
     */
    public function delete($tbname, $condition)
    {
        $conn = $this->con;
        $job = false;
        try {
            // sql to delete a record
            $sql = "DELETE FROM $tbname WHERE $condition";
            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $job = true;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            $job = false;
        }
        $conn = null;
        return $job;
    }
}
