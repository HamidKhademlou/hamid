<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=html_assets_url?>css/mycss.css">
</head>
<body>

    <div class="container-fluid" id="d1">
        <div class="row">
            <!-- sidbar -->
            <div class="col-3 h-100 bg-danger text-white d-flex align-content-around flex-wrap">
                <div class="row col12">
                    <div class="col-12"><h1>Company Name</h1></div> 
                </div>
                <div class="row col-12">
                    <div class="col-12">

                        <ul class="nav flex-column bghover">
                            <li class="nav-item">
                                <a class="nav-link text-white font-weight-bold" href="#d1">Home</a>
                            </li>
                            <?php foreach($this->postsInfo as $key=>$value):?>
                                <li class="nav-item">
                                    <a class="nav-link text-white font-weight-bold" href="#<?=$value["id"]?>"><?=$value["title"]?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!--page content -->
            <div class="col-9 h-100 bg-white scroll p-0 d-flex flex-wrap">
                <div class="container mt-5 px-5">
                    <div class="row col-12"><h1>Interior Design</h1></div>
