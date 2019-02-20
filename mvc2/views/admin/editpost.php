<head>
    <!-- <script src="ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.10.1/full-all/ckeditor.js"></script>
</head>
<div class="jumbotron col-9 mx-auto my-2">
    <h3 class="text-center">post editor</h3>
    <form method="post" action="<?= URL ?>/admin/editpost">
        <input class="form-control col-8 mx-auto text-center my-2" type="text" name="title" value="<?= @$_GET['title'] ?>" placeholder="post title">
        <textarea name="myeditor" id="myeditor" rows="8" cols="80"><?= @$_GET['body'] ?></textarea>
        <script>CKEDITOR.replace('myeditor');</script>
        <hr class="my-2">
        <input type="hidden" value="<?= $_GET['postid'] ?>" name="postid">
        <input type="submit" name="submit" class="btn btn-outline-secondary btn-block col-4 mx-auto">
    </form>
</div>