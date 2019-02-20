<!-- <p>This is first page of my site.</p> -->
<?php foreach($this->postsInfo as $key=>$value):?>
    <div class="row col-12 text-danger mt-5" id="<?=$value["id"]?>"><h2><?=$value["title"]?>.</h2></div>
    <hr style="width:50px;border:5px solid red" class="rounded float-left">

    <div class="row col-12 px-0 d-flex justify-content-between">
        <div class="col-6 p-2">
            <img src="<?=root_url."Views/blog/image/posts_img/".$value["img"]?>" class="img-thumbnail">
        </div>
    </div>

    <!-- <div class="row col-12"><img src="<?=root_url."Views/blog/image/posts_img/".$value["img"]?>" class="card_img_top"></div> -->
    <div class="row col-12 d-flex flex-wrap justify-content-between">
        <span class="mt-3"><?=$value["abstract"]?></span>
        <div class="col-12 p-0"><hr></div>
        <div class="col-12"><?=$value["content"]?></div>
    </div>
    <hr>
    <div class="row col-12"><p>Posted By <span class="font-italic"><?=$value["author"]?></span></p></div>
<?php endforeach; ?>