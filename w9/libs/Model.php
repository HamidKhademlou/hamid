<?php

class Model{

    public $con;
    public function __construct($servername=db_Servername, $username=db_username,$password=db_password, $dbname=db_Databasename){

        try {
            $this-> con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this-> con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
             //echo "Connected successfully";
        }
        catch(PDOException $e)
            {
            echo "Connection Failed" . $e->getMessage();
            }
    }
    public function insert($object,$table){

        $con = $this -> con;
        $keys = "";
        $values = "";
        foreach ($object as $key => $value) {
             $keys .= $key.' , ';
             $values .= "'".$value."'"." , ";
        }

        $keys = rtrim($keys, ', ');
        $values = rtrim($values, ', ');

        var_dump($keys);
        var_dump($values);
        $sql = "INSERT INTO $table ( $keys )
        VALUES ( $values )";
        // use exec() because no results are returned
        $con->exec($sql);}

        public function select($tablename, $fields = "*", $condition = 1,$flag=0)
        {        
            $stmt = $this->con->prepare("SELECT $fields FROM $tablename WHERE $condition "); //زمانی که * بزنیم اینجا همه رو میاره رو سیستم ولی اگع متغیر بزنیم خود انجینی دیتابیس انحامش میده
            // var_dump($stmt);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // var_dump($stmt->fetch());//اینجا وردامپ میده ولی تو سایت تو تابع سرچ یوزر نمیده
            if($flag == 1){
            return ($stmt->fetch());}
            elseif($flag==0){
            return ($stmt->fetchAll());}
            // var_dump($rows);
        }



    
}