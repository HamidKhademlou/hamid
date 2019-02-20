<div class="row mt-2 d-flex">
    <div class="col-3 d-flex align-self-start align-items-stretch">
        <div class="d-flex flex-column align-self-center p-0 col-12 border shadow rounded">
            <div class="py-3 text-center bd-highlight bg-warning text-white display-3">Exclusive News</div>
            <?php foreach ($output as $key => $value) : ?>
            <div class="py-3 text-center bd-highlight"><a href="#" class="text-dark py-0 btn col"><?= $value["title"] ?></a></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-6">
        <div class="d-flex justify-content-center flex-column text-center">
            <div class="text-center d-inline bg-warning text-white rounded m-0 py-3 display-4">latest news</div>
            <?php foreach ($output as $key => $value) : ?>
            <div class="card bg-light col-12 shadow" id="post-<?= $value['postid'] ?>">
                <!-- <img class="card-img-top" src="<?= URL ?>/views/market/pic/<?= $value[" name"] ?>.jpg" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title text-right"><a class="navbar-brand" href="#"><?= $value["title"] ?></a></h5>
                    <p class="card-text"><small class="text-muted"><?= $value["body"] ?></small></p>
                    <p class="card-title text-left text-dark"><small><?= $value["date"] ?></small></p>
                </div>
                <div class="d-flex btn-group btn-group-sm p-1 m-0" data-toggle="buttons">
                    <button class="btn-sm btn-danger mr-1 py-0" id="delete-<?= $value['postid'] ?>">Delete</button>
                    <button class="btn-sm btn-warning py-0" onclick="window.location.href='<?= URL ?>/admin/editpost/?postid=<?= $value['postid'] ?> &&title=<?= $value['title'] ?> &&body=<?= $value['body'] ?>'">Edit</button>
                </div>
            </div>
            <hr id="line-<?= $value['postid'] ?>" style="width:30rem;border:3px solid black" class="float-left rounded col mb-4">
            <?php endforeach; ?>
        </div>
    </div>
</div>