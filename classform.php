<!DOCTYPE HTML>
<?php
session_start();
session_unset(); 
?>
<html>
<head>
<style>.error {color: red;}</style>
</head>
<body>
<center>
<?php
$name=$lastname=$email=$username=$password="";
$nameerr=$lastnameerr=$emailerr=$usernameerr=$passworderr="";
$upload=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameerr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  if (empty($_POST["lastname"])){
   $lastnameerr="Lastname is requierd";
  }else{
    $lastname = test_input($_POST["lastname"]);
  }
  if (empty($_POST["email"])) {
    $emailerr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["username"])) {
    $usernameerr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }
  if (empty($_POST["password"])) {
    $passworderr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = htmlspecialchars($data);
    $data = preg_replace('/\s+/','', $data);
  return $data;
}
?>

<h2>Please Register</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" >
  <span class="error">*<?php echo $nameerr;?></span>
  <br><br>
  Lastname: <input type="text" name="lastname" >
  <span class="error">*<?php echo $lastnameerr;?></span>
  <br><br>
  E-mail: <input type="email" name="email" >
  <span class="error">*<?php echo $emailerr;?></span>
  <br><br>
  Username: <input type="text" name="username" >
  <span class="error">*<?php echo $usernameerr;?></span>
  <br><br>
  Password: <input type="text" name="password" >
  <span class="error">*<?php echo $passworderr;?></span>
  <br><br>
  <input type="submit" value="تایید" name="submit">  
</form>

<?php
if (empty($_POST["name"]) or empty($_POST["lastname"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["username"])){
} else {
  $upload=1;
  
  $servername = "localhost";
  $usernamee = "root";
  $passwordd = "";
  $dbname = "mydbpdo";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamee, $passwordd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dat=time();
    $sql = "INSERT INTO user (name,family,username,password_hash,email,create_at,update_at,address,postcode,typeuser)
      VALUES ('$name','$lastname','$username','$password','$email','$dat',$dat,'rasht','2','2')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
 catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
}

if ($upload==1){
    echo "<br>";
    echo "Hi $name $lastname";
    echo "<br>";
    echo "your username is: $username";
    echo "<br>";
    echo "your password is: $password";
    exit;    
}
?>
</center>
</body>
</html>