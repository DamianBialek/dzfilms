<?php include __DIR__.'/../Header.php' ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <img src="<?=$movie['thumbnail']?>" class="img-thumbnail" />
        </div>
        <div class="col-md-9">
            <h1><?=$movie['title']?></h1>
            <p><?=$movie['description']?></p>
          <?php if(!empty($_SESSION['user'])): ?>
                <a role="button" href="#" class="btn btn-danger my-3  <?=(!$movie['available'] ? 'disabled' : '')?>" <?=(!$movie['available'] ? 'aria-disabled="true"' : '')?>>Wypożycz</a>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Footer.html' ?>
