<?php

    function __autoload($class_name)
    {
        include_once 'Class.' . $class_name . '.php';
    }

    //Controller:
    $edit_row = $priceError = $quantityError = null;
    if(!empty($_POST)){
        $controllerObj = new Controller($_POST);
        $edit_row = $controllerObj->getEditRow();
        $quantityError = $controllerObj->getQuantityError();
        $priceError = $controllerObj->getPriceError();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link href="theme.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3 class="text-white text-center">Insert Product info</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="type" name="type" placeholder="Type">
                    </div>
                    <div class="form-group col-md-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-2">
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" step="1" placeholder="Quantity">
                    </div>
                    <div class="form-group col-md-3">
                    <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" placeholder="Price">
                    </div>
                    <div class="form-group col-md-1">
                    <input type="submit" class="btn btn-primary" value="Insert">
                    </div>
                </div>
            </form>
            <div>
                <hr class="my-3 bg-white">
                <h3 class="text-white text-center">Store Products Information List</h3>
                <table class="center">
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    </tr>
                    
                    <?php
                        $selectObj = new Database('localhost', 'root', '', 'frooshgah');
                        $selectObj->search('*', 'products','', $edit_row);
                        unset($selectObj);
                    ?>

                </table>

                <?php
                    if($quantityError != null){
                        echo "<p class=\"error\">$quantityError</p>";
                    }
                    if($priceError != null){
                        echo "<p class=\"error\">$priceError</p>";
                    }
                ?>

            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
</html>