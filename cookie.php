<!DOCTYPE html>
<html>
<style>
    .error {
        color: red;
    }
</style>

<body>
    <center>
        <br>
        <form action="index42.php" method="POST">
            username: <input type="text" name="username"><br><br>
            password: <input type="text" name="password"><br><br>
            <input type="submit" name="submit" value="تایید">
        </form>
        <br>

        <body>
            <center>
                <?php
                session_start();
                include "database.php";
                include "getdataclass.php";

                if (isset($_POST["submit"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    if (empty($_POST["username"]) or empty($_POST["password"])) {
                    } else {
                        $db = new database('localhost', 'root', '', 'mydbpdo');
                        $read = new getdata();
                        $read->setName($username);
                        $read->setPrice($pasword);
                        $db->insert($read, 'kala');
                        echo "name: " . $read->getName() . "<br>";
                        echo "price: " . $read->getPrice();
                    }

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($result)) {
                        $_SESSION["username"] = $result['0']['username'];
                        $a = $result['0']['username'];
                        $_SESSION["login"] = true;
                        $name = $result['0']['name'];
                        $lastname = $result['0']['lastname'];
                        $cookie_name = "user";
                        $cookie_value = "$username";
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                        echo "YOUR WELCOME <span class=\"error\">$_COOKIE[$cookie_name]</span>" . "<br>";
                        echo "<img src=\"uploads/$a.jpg\" width=200px>" . "<br>";
                        echo "press <a href=\"index44.php\" > HERE</a> to change your Avatar<br>";
                        echo "<a href=\"index41.php\" >LOG OUT</a>";
                    } else {
                        echo "<span class=\"error\">there is no user with this Specifications ,please <a href=\"index41.php\" >REGISTER </span>";
                    }
                }
                ?>
            </center>
        </body>
    </center>