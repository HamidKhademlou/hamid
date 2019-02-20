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
        .admin{
            background: url("<?=$dir?>image/b2.jpeg") no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="admin">
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <div class="navbar-fixed">
            <nav class="grey darken-3">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Welcome <?=Session::getSession("admin_login")?></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?=root_url?>">Home</a></li>
                        <?php if(Session::getSession("admin_login") != false):?>
                            <li><a href="<?=root_url?>admin/logout">LogOut</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <!-- Main -->
    <main>
        <div class="container z-depth-5 m_5 white">
            <!-- Page Layout here -->
            <div class="row">

                <div class="col s12" style="margin-top: 20px;">
                    <div class="row center-align">
                        <strong class="god">"In The Name of GOD"</strong>
                    </div>
                </div>

                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <span class="error" id="errors"></span>
                        </div>
                    </div>
                </div>

                <div class="col s12">

                    <div class="row m_0">
                        <form class="col s12" method="POST" enctype="multipart/form-data" id="addBlog">

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate">
                                    <label for="title">Title:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="abstract" name="abstract" class="materialize-textarea"></textarea>
                                    <label for="abstract">Abstract:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="author" name="author" type="text" class="validate">
                                    <label for="author">Author:</label>
                                </div>
                            </div>

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image:</span>
                                    <input type="file" id="img" name="img">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" id="filePath">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <p>Content:</p>
                                    <textarea id="content" name="content" class="materialize-textarea"></textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                            </div>
                        </form>

                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light right" id="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                            
                    </div>

                </div>

            </div>

        </div>
    </main>


    <!-- Footer -->
    <footer class="page-footer grey darken-3">
        <!-- <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                        content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="footer-copyright grey darken-4">
            <div class="container">
                © 2018 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">Disign by Mo.Atefrad</a>
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

    <!-- my JS -->
    <?php foreach($this->js as $js): ?>
      <script src="<?=root_url."Views/admin/"?>js/<?=$js?>"></script>
    <?php endforeach;?>
</body>

</html>