<?php require 'header.php'; ?>

    <div class="uk-section uk-section-secondary uk-light uk-preserve-color">
        <div class="uk-container uk-container">
            <div class="uk-panel uk-light uk-margin-medium">
                <h1>کاربران</h1>
            </div>
            
            <div class="uk-child-width-1-2@s" uk-grid>
                <?php
                    require_once '../database.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDb, $passwordDb);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM users"); 
                        $stmt->execute();

                        $result = $stmt->fetchAll();
                        foreach ($result as $user) {
                            echo "<div>
                                <div class='uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@m uk-margin' uk-grid>
                                    <div class='uk-flex-start@s uk-card-media-left uk-cover-container'>
                                        <img src='uploads/$user[profile]' uk-cover>
                                        <canvas width='600' height='400'></canvas>
                                    </div>
                                    <div>
                                        <div class='uk-card-body'>
                                            <h3 class='uk-card-title'>$user[firstname] $user[lastname]</h3>
                                            <ul class='uk-list'>
                                                <li>$user[username]</li>
                                                <li>$user[email]</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                    catch(PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    
                    $conn = null;
                ?>
            </div>
        </div>
    </div>

<?php require 'footer.php'; ?>