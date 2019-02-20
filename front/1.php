<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="1.css">
    <title>93</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <?php @$username = Session::getSession('Login'); ?>
        <?php if ($username) : ?>
        <a class="navbar-brand" href="#">Hello
            <?= $username ?> </a>
        <?php else : ?>
        <a class="navbar-brand" href="#">Hello Dear guest</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>/site/index">Home</a>
                </li>
                <?php if ((@$_SESSION["Type"]) == "Admin") : ?>
                <li class="nav-item">
                    <a class="nav-link" href='<?= URL ?>/admin/table'>Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='<?= URL ?>/market/add'>Products</a>
                </li>
                <?php elseif ((@$_SESSION["Type"]) == "normal") : ?>
                <li class="nav-item">
                    <a class="nav-link" href='<?= URL ?>/login/index'>USer Profile</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <?php if (!isset($_SESSION["Login"])) {
                        echo "<a class=\"nav-link\" href=\"" . URL . "/login/login\">Login</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION["Login"])) {
                        echo "<a class=\"nav-link\" href=\"" . URL . "/login/logout\">Logout</a>";
                    }
                    ?>
                </li>
                <?php if (isset($_SESSION["Login"])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href='<?= URL ?>/market'>Market</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <button type="button" class="btn-sm btn-primary" onclick="window.location.href='<?= URL ?>/market/basket/'">
                        سبد خرید <span class="badge badge-light">
                            <?php echo @$_SESSION['count']; ?></span>
                    </button>
                </li>
                <li class="nav-item">
                    <form class="form-inline mx-1" action="<?= URL ?>/market/search/">
                        <input class="form-control-sm" style="height:28px" type="text" placeholder="جستجوی کالا" name="search">
                        <button class="btn-sm" type="submit">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">




                <script src="bootstrap/js/bootstrap.min.js"></script>
                <script src="jquery-3.3.1.min.js"></script>
                <script src="1.js"></script>
</body>

</html>