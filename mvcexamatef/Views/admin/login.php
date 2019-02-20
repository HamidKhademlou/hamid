<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CK editor -->
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

    <!-- my css -->
    <link rel="stylesheet" href="<?=$dir?>css/mycss.css">

    <style>
        .login{
            background: url("<?=$dir?>image/b1.jpg") no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="login">
    <!-- Header -->
    <header>
    </header>


    <!-- Main -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col s4 offset-s4 z-depth-5 m_5 white">

                    <div class="row m_0">
                        <div class="col s12 center-align">
                            <h2>LOGIN</h2>
                        </div>

                        <?php if(isset($_GET['error'])):?>
                            <div class="col s12 center-align">
                                <span class="error">Invalid Username or Password!</span>
                            </div>
                        <?php endif;?>

                        <form class="col s12" method="POST" action="<?=root_url."admin/login"?>">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="username" name="username" type="text" class="validate">
                                    <label for="username">User Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn-large waves-effect waves-light col s12" type="submit" name="action">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>


    <!-- Footer -->
    <footer class="">
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
</body>

</html>