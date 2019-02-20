<?php

    class database {

        public $con = null;

        //Security validation for inputs:
        public function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            $data = htmlspecialchars($data);
            return $data;
        }

        //Security validation for ckeditor input:
        public function test_input2($data) {
            $data = stripslashes($data);
            $data = strip_tags($data,"<p><strong><em><s><ol><li><ul><blockquote><h1><h2><h3><h4><h5><h6><div><span><big><small><tt><code><samp><var><del><ins><cite><q><pre><a><table><caption><thead><tr><th><tbody><td><hr><img>");
            return $data;
        }

        /**
         * conection to database construct function
         */
        public function __construct($servername, $username, $password, $dbname){
            try {
                $this->con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<script>console.log('"."Connected successfully"."')</script>";
                }
            catch(PDOException $e)
                {
                echo "<script>console.log('"."Connection failed: " . $e->getMessage()."')</script>";
                }
        }

        /**
         * releases all resources
         */
        public function __destruct(){
            echo "<script>console.log('".'The class "', __CLASS__, '" was destroyed.'."')</script>";
        }

        /**
         * Database INSERT function
         */
        public function insert($tbname, $array) {
            $conn = $this->con;
            $keys = $values = null;
            foreach($array as $key=>$value){
                if($key == "editorInput"){
                    //Security Validate before insert:
                    $key = $this->test_input2($key);
                    $value = $this->test_input2($value);
                }else{
                    //Security Validate before insert:
                    $key = $this->test_input($key);
                    $value = $this->test_input($value);
                }
                $keys .= $key.", ";
                $values .= "'".$value."', ";
            }

            $keys = rtrim($keys,', ');
            $values = rtrim($values,', ');

            try {
                $sql = "INSERT INTO $tbname (id,$keys)
                VALUES ('',$values)";
                // use exec() because no results are returned
                $conn->exec($sql);
                $last_id = $conn->lastInsertId();
                echo "<script>console.log('"."New record created successfully"."')</script>";
                }
            catch(PDOException $e)
                {
                echo "<script>console.log('".$sql . "<br>" . $e->getMessage()."')</script>";
                }
            
            $conn = null;
            return $last_id;
        }

        /**
         * Database SELECT function
         */
        public function search($col, $tbname, $condition){
            $conn = $this->con;
            $output = null;
            try {
                if(empty($condition)){
                    $stmt = $conn->prepare("SELECT $col FROM $tbname");
                }else{
                    $stmt = $conn->prepare("SELECT $col FROM $tbname WHERE $condition");
                }
                $stmt->execute();
            
                //Set the all result to associative array output: 
                $i = 0;
                while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $output[$i]=$result;
                    $i++;
                }
            }
            catch(PDOException $e) {
                echo "<script>console.log('"."Error: " . $e->getMessage()."')</script>";
            }
            $conn = null;
            return $output;
        }
    }