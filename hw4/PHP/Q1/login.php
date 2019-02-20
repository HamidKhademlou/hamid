<?php require 'header.php'; ?>

    <?php
        require_once '../database.php';
        
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['logout'])) {
                if ($_GET['logout'] == 1) {
                    $_SESSION['login'] = false;
                    $_SESSION['username'] = "";
                }
            }
        }

        $isValid = true;
        $username = $password = "";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['username'])) {
                $isValid = false;
                notification("نام کاربری نباید خالی باشد.", "danger");
            } else {
                $username = valid_input($_POST['username']);
                if (!preg_match("/^[a-zA-Z]*$/", $username)) {
                    $isValid = false;
                    notification("در نام کاربری فقط حروف مجازی است.", "danger");
                }
            }

            if (empty($_POST['password'])) {
                $isValid = false;
                notification("رمز عبور نباید خالی باشد.", "danger");
            } else {
                $password = valid_input($_POST['password']);
                if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $password)) {
                    $isValid = false;
                    notification("رمز عبور وارد شده معتبر نیست.", "danger");
                }
            }

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDb, $passwordDb);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if($isValid) {
                    $row = $conn->query("SELECT * FROM users WHERE username = '$username' and password = '$password'");
                    if ($row->rowCount() > 0) {
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $username;
                        notification("شما با موفقیت وارد شدید.", "success");
                        $username = $password = "";

                        header('LOCATION: ' . 'index.php');
                    }
                    else
                        notification("نام کاربری یا رمز عبور وارد شده صحیح نیست.", "warning"); 
                }
            }
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }

        function valid_input($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        function notification($msg, $status) {
            echo "<script> UIkit.notification({ message: '$msg', status: '$status', pos: 'bottom-left' }); </script>";
        }
    ?>

    <div class="uk-section uk-section-secondary uk-light">
        <div class="uk-container uk-container-small">
            <div class="uk-panel uk-light uk-margin-medium">
                <h1>ورود</h1>
            </div>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="uk-form-stacked">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-username-text">نام کاربری</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-username-text" type="text" name="username" value="<?php echo $username; ?>">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-password-text">رمز عبور</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-password-text" type="password" name="password">
                    </div>
                </div>
                <button type="submit" name="submit" class="uk-button uk-button-primary uk-align-center">ورود</button>
            </form>
        </div>
    </div>

<?php require 'footer.php'; ?>