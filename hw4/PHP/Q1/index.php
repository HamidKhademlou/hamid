<?php require 'header.php'; ?>

<div class="uk-section uk-section-secondary uk-light">
    <div class="uk-container uk-container-small">
        <h1>صفحه اصلی</h1>
        <?php if ($_SESSION['login']): ?>
        <p>سلام <?= $_SESSION['username']; ?></p>
        <?php else : ?>
        <p>سلام کاربر مهمان!</p>
        <?php endif ?>
    </div>
</div>
<?php require 'footer.php'; ?>