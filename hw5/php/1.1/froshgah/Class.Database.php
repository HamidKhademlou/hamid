<?php

    class Database {

        protected $con = null;
        
        /**
         * Security validation for inputs
         */
        protected function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            $data = htmlspecialchars($data);
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
                $key = $this->test_input($key);
                $keys .= $key.", ";
                //Security Validate before insert:
                $value = $this->test_input($value);
                $values .= "'".$value."', ";
            }

            $keys = rtrim($keys,', ');
            $values = rtrim($values,', ');

            try {
                $sql = "INSERT INTO $tbname (id,$keys)
                VALUES ('',$values)";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>console.log('"."New record created successfully"."')</script>";
                }
            catch(PDOException $e)
                {
                echo "<script>console.log('".$sql . "<br>" . $e->getMessage()."')</script>";
                }
            
            $conn = null;
        }

        /**
         * Database SELECT function
         */
        public function search($col, $tbname, $condition, $edit_row){
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

            for($j = 0; $j < $i; $j++){
                echo "<form method=\"post\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">"."\n";
                echo "<tr>"."\n";
                foreach($output[$j] as $key => $value){
                    if($key == 'id'){
                        echo "<td>$value</td>"."\n";
                    }else if($key == 'quantity'){
                        echo "<td class=\"\">\n<input type=\"number\" ";
                        if($edit_row != $output[$j]["id"]){
                            echo "class=\"viewForm\"";
                        }else{
                            echo "class=\"editForm\"";
                        }
                        echo " id=\"$key\" name=\"$key\" min=\"0\" step=\"1\" value=\"$value\" ";
                        if($edit_row != $output[$j]['id']){
                            echo "readonly>\n</td>"."\n";
                        }else{
                            echo ">\n</td>"."\n";
                        }
                    }else if($key == 'price'){
                        echo "<td class=\"\">\n<input type=\"number\" ";
                        if($edit_row != $output[$j]["id"]){
                            echo "class=\"viewForm\"";
                        }else{
                            echo "class=\"editForm\"";
                        }
                        echo " id=\"$key\" name=\"$key\" min=\"0\" step=\"0.01\" value=\"$value\" ";
                        if($edit_row != $output[$j]['id']){
                            echo "readonly>\n</td>"."\n";
                        }else{
                            echo ">\n</td>"."\n";
                        }
                    }else{
                        echo "<td>\n<input type=\"text\" ";
                        if($edit_row != $output[$j]["id"]){
                            echo "class=\"viewForm\"";
                        }else{
                            echo "class=\"editForm\"";
                        }
                        echo " id=\"$key\" name=\"$key\" value=\"$value\" ";
                        if($edit_row != $output[$j]['id']){
                            echo "readonly>\n</td>"."\n";
                        }else{
                            echo ">\n</td>"."\n";
                        }
                    }
                }
                $keyId = $output[$j]["id"];
                if($edit_row != $keyId){
                    echo "<td>\n<input type=\"submit\" name=\"edit_$keyId\" id=\"edit_$keyId\" value=\"Edit\" class=\"btn btn-warning\">\n<input type=\"submit\" name=\"delete_$keyId\" id=\"delete_$keyId\" value=\"Remove\" class=\"btn btn-danger\">\n</td>\n";
                }else{
                    echo "<td>\n<input type=\"submit\" name=\"save_$keyId\" id=\"save_$keyId\" value=\"Save\" class=\"btn btn-primary\">\n<input type=\"submit\" name=\"cancel_$keyId\" id=\"cancel_$keyId\" value=\"Cancel\" class=\"btn btn-secondary\">\n</td>\n";
                }
                echo "</tr>"."\n";
                echo "</form>\n";
            }

            return $output;
        }

        /**
         * Database UPDATE function
         */
        public function update($associativeArray, $tbname, $condition){
            $conn = $this->con;
            try {
                // Prepare SQL Query
                $sql = "UPDATE $tbname SET ";
                foreach($associativeArray as $key => $value){
                    $key = $this->test_input($key);
                    $value = $this->test_input($value);
                    $sql .= $key."="."'".$value."'".", ";
                }
                $sql = rtrim($sql, ', ');
                $sql .= " WHERE ".$condition;

                // Prepare statement
                $stmt = $conn->prepare($sql);
            
                // execute the query
                $stmt->execute();
            
                // echo a message to say the UPDATE succeeded
                echo "<script>console.log('".$stmt->rowCount() . " records UPDATED successfully"."')</script>";
                }
            catch(PDOException $e)
                {
                echo "<script>console.log('".$sql . "<br>" . $e->getMessage()."')</script>";
                }
            
            $conn = null;
        }

        /**
         * Database DELETE function
         */
        public function delete($tbname, $condition){
            $conn = $this->con;
            try {
                // sql to delete a record
                $sql = "DELETE FROM $tbname WHERE $condition";
            
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>console.log('"."Record deleted successfully"."')</script>";
                }
            catch(PDOException $e)
                {
                echo "<script>console.log('".$sql . "<br>" . $e->getMessage()."')</script>";
                }
            
            $conn = null;
        }
    }