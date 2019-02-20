<?php
    // $_input["quantity"] = "salam";
    // $_input["quantity"] = (int)$_input["quantity"];
    // echo $_input["quantity"]."<br>";
    // $_input["price"] = 250.060;
    // if(is_int($a)){
    //     $a = ltrim($a, '0');
    //     echo "int:".(int)$a;
    // }
    // if(is_double($a)){
    //     $a = ltrim($a, '0');
    //     echo "double:".(double)$a;
    // }

    // if(is_numeric($a)){
    //     $a = ltrim($a, '0');
    //     echo "<br>"."numeric:".(double)$a;
    // }
    // $insertOk = 0;
    // if(is_int($_input["quantity"]) && $_input["quantity"] >= 0){
    //     $_input["quantity"] = ltrim($_input["quantity"], '0');
    //     $_input["quantity"] = (int)$_input["quantity"];
    //     // $getObj->setQuantity($_input["quantity"]);
    //     $insertOk += 1;
    // }
    // if(is_numeric($_input["price"]) && $_input["price"] >= 0){
    //     $_input["price"] = ltrim($_input["price"], '0');
    //     $_input["price"] = (double)$_input["price"];
    //     // $getObj->setPrice($_input["price"]);
    //     $insertOk += 1;
    // }

    // echo  $insertOk;

    $a = '00020.02';
    // var_dump($a);
    // $a = (double)$a;
    if (preg_match('/^(?:0|[1-9]*)(?:\.{2})?$/', $a)) {
        $a = ltrim($a, '0');
        $a = (double)$a;
        echo "hello:".$a;
     }
    
?>