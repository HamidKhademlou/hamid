<?php

    //Insert in Database:
    if(!empty($_POST)){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        //autoload classes:
        function myAutoloader($className)
        {
            // $path = '/path/to/class';
            
            include $className.'Class'.'.php';
        }
        spl_autoload_register('myAutoloader');
        
        $obj1 = new getInput();
        $obj1->setTitle($_POST["title"]);
        $obj1->setEditorInput($_POST["editorInput"]);

        $obj2 = new database('localhost', 'root', '', 'hw6');
        $last_id = $obj2->insert("editor", $obj1);
        unset($obj1);
        unset($obj2);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background: url('b1.jpg') no-repeat;
            background-size: cover;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CKEditor</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

</head>

<body>
    <div class="container-fluid px-0">
        <p class="text-center">"In the name of GOD"</p>
        <h1 class="text-center shadow-lg rounded">CK Editor</h1>
        <div style="display:flex;justify-content:center;align-items:center;" class="my-5">
            <div style="width:80%;height:80%;">
                <form action="editor.php" method="POST">
                    <input type="text" name="title" id="title" placeholder=". . . Title . . ." class="form-control mb-2 text-center">
                    <textarea name="editorInput"></textarea>
                    <script>
                        CKEDITOR.replace( 'editorInput' );
                        </script>
                    <input type="submit" class="btn btn-primary my-2 col-2" value="Save">
                </form>
            </div>
        </div>

        <?php
                if(isset($last_id)){
                    $obj3 = new database('localhost', 'root', '', 'hw6');
                    $output = $obj3->search('*', 'editor', "id=$last_id");
                    unset($obj3);

                    echo "<div class=\"jumbotron mx-5\">"."\n";
                    echo "<h1>".$output[0]["title"]."</h1>"."\n"."<hr>"."\n";
                    echo $output[0]["editorInput"]."\n";
                    echo "</div>"."\n";
                }
            ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>