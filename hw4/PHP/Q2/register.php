<?php require 'header.php'; ?>

    <?php
        require_once '../database.php';

        $isValid = true;
        $profile = null;
        $firstname = $lastname = $email = $username = $password = $passwordconf = "";
        $firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $passwordconfErr = $profileErr = "";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['firstName'])) {
                $isValid = false;
                $firstnameErr = "نام نباید خالی باشد.";
            } else {
                $firstname = valid_input($_POST['firstName']);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $isValid = false;
                    $firstnameErr = "فقط حروف و فاصله مجاز است.";
                }
            }

            if (empty($_POST['lastName'])) {
                $isValid = false;
                $lastnameErr = "نام خانوادگی نباید خالی باشد.";
            } else {
                $lastname = valid_input($_POST['lastName']);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $isValid = false;
                    $lastnameErr = "فقط حروف و فاصله مجاز است.";
                }
            }

            if (empty($_POST['email'])) {
                $isValid = false;
                $emailErr = "ایمیل نباید خالی باشد.";
            } else {
                $email = valid_input($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                    $emailErr = "ایمیل وارد شده معتبر نیست.";
                }
            }

            if (empty($_POST['username'])) {
                $isValid = false;
                $usernameErr = "نام کاربری نباید خالی باشد.";
            } else {
                $username = valid_input($_POST['username']);
                if (!preg_match("/^[a-zA-Z]*$/", $username)) {
                    $isValid = false;
                    $usernameErr = "فقط حروف مجاز است.";
                }
            }

            if (empty($_POST['password'])) {
                $isValid = false;
                $passwordErr = "رمز عبور نباید خالی باشد.";
            } else {
                $password = valid_input($_POST['password']);
                if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $password)) {
                    $isValid = false;
                    $passwordErr = "رمز عبور وارد شده معتبر نیست.";
                }
            }

            if (empty($_POST['passwordConfirm'])) {
                $isValid = false;
                $passwordconfErr = "تکرار رمز عبور نباید خالی باشد.";
            } else {
                $passwordconf = valid_input($_POST['passwordConfirm']);
                if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $passwordconf)) {
                    $isValid = false;
                    $passwordconfErr = "رمز عبور وارد شده معتبر نیست.";
                }
            }

            $profile = $_FILES['profile'];
            $imageFileType = strtolower(pathinfo(basename($profile['name']),PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
                $isValid = false;
                notification("پسوند تصویر ارسال شده معتبر نیست.", "danger");
            }
            if ($profile["size"] > (2 * 1024 * 1000)) {
                $isValid = false;
                notification("حجم تصویر ارسالی بیشتر از 2مگابایت است.", "danger");
            }

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDb, $passwordDb);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if ($isValid) {
                    if ($password != $passwordconf) {
                        $isValid = false;
                        $passwordErr = $passwordconfErr = "رمز عبور وارد شده یکسان نیست.";
                    }

                    $row = $conn->query("SELECT * FROM users WHERE username = '$username'");
                    if ($row->rowCount() > 0) {
                        $isValid = false;
                        $usernameErr = "نام کاربری شما قبلا استفاده شده است.";
                    }
                }

                if ($isValid) {
                    
                    $sql = "INSERT INTO users (id, firstname, lastname, email, username, password, profile) VALUES (null, '$firstname', '$lastname', '$email', '$username', '$password', '$username.$imageFileType')";
                    $conn->exec($sql);

                    move_uploaded_file($profile['tmp_name'], "uploads/$username.$imageFileType");

                    $firstname = $lastname = $email = $username = $password = $passwordconf = $profile = "";
                    $firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $passwordconfErr = $profileErr = "";
                    
                    notification("ثبت نام شما با موفقیت انجام شد.", "success");
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
            echo "<script> UIkit.notification({ message: '$msg', status: '$status', pos: 'bottom-center' }); </script>";
        }
    ?>

    <div class="uk-section uk-section-secondary uk-light">
        <div class="uk-container uk-container-small">
            <div class="uk-panel uk-light uk-margin-medium">
                <h1>ثبت نام</h1>
            </div>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" class="uk-grid-small uk-form-stacked" uk-grid>
                <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-fname-text">نام</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-fname-text" type="text" name="firstName" value="<?php echo $firstname; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $firstnameErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-lname-text">نام خانوادگی</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-lname-text" type="text" name="lastName" value="<?php echo $lastname; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $lastnameErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-email-text">ایمیل</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-email-text" type="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $emailErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-username-text">نام کاربری</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-username-text" type="text" name="username" value="<?php echo $username; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $usernameErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-1"><hr class="uk-divider-icon"></div>
                <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-password-text">رمز عبور</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-password-text" type="password" name="password" value="<?php echo $password; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-passconf-text">تکرار رمز عبور</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-passconf-text" type="password" name="passwordConfirm" value="<?php echo $passwordconf; ?>">
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $passwordconfErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <h4>شرایط رمز عبور انتخابی:</h4>
                    <ul class="uk-list uk-list-divider">
                        <li>طول آن حداقل 8 کارکتر باشد.</li>
                        <li>حداقل دارای یک حرف یا یک عدد باشد.</li>
                        <li>استفاده از < > یا سایر علائم خاص مجاز نیست.</li>
                        <li>فقط استفاده از حروف کوچک و بزرگ، اعداد و !@#$% مجاز است.</li>
                    </ul>
                </div>
                <div class="uk-width-1-1"><hr class="uk-divider-icon"></div>
                <div class="uk-width-1-2@s">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-passconf-text">تصویر پروفایل</label>
                        <div class="uk-form-controls">
                            <div uk-form-custom="target: true">
                                <input type="file" name="profile">
                                <input class="uk-input" type="text" placeholder="انتخاب تصویر" disabled>
                            </div>
                        </div>
                        <span class="uk-label uk-label-danger"><?php echo $profileErr; ?></span>
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <h4>شرایط تصویر انتخابی:</h4>
                    <ul class="uk-list uk-list-divider">
                        <li>حجم آن حداقل 2مگابایت باشد.</li>
                        <li>پسوند های مجاز: png و jpg و gif</li>
                    </ul>
                </div>
                <div class="uk-width-1-1">
                    <button type="submit" name="submit" class="uk-button uk-button-primary uk-align-center">ثبت نام</button>
                </div>
            </form>
        </div>
    </div>

<?php require 'footer.php'; ?>