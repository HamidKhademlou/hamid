<?php 

$exp = $_SERVER['REQUEST_URI'];
$req = explode('/', $exp);

$http = $req[3];
    //start of controller
if (file_exists('Controllers/' . $http . ".php")) {
    require('Controllers/' . $http . ".php");
    //end of controller
} else {
    require_once("index.php");
    die;
}

if (isset($req[4])) {

    $req1 = explode('&', $req[4]);

    $func1 = $req1[0];

    if (isset($req1[1])) {

        $param = array_slice($req1, 2);
    }
        // var_dump($req1);

    if (!isset($req[5])) {
        $inr = 0;
    } else {
        $inr = array_slice($req, 5);
    }
}
$new = new $http;

if (method_exists($new, $func1)) {
        
        // $b = implode(", ",$inr);

    echo $new->$func1($inr);

//         echo $new->$func1($param);
//این رو تبدیل کن به اونی که میخوای

} else {
    echo "method not found";
}