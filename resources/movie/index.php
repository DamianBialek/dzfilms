<?php include __DIR__.'/../Header.php' ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <img src="<?=$movie['thumbnail']?>" class="img-thumbnail" />
        </div>
        <div class="col-md-9">
            <h1><?=$movie['title']?></h1>
            <p><?=$movie['description']?></p>
            <?php if(!empty($movie['trailer'])): ?>
            <div class="trailer">
                <h4 class="text-center">Zwiastun filmu</h4>
                <iframe allowfullscreen="allowfullscreen" id="ytplayer" width="100%" height="360" src="http://www.youtube.com/embed/<?=$movie['trailer']?>?modestbranding=1&rel=0&showinfo=0"></iframe>
            </div>
            <?php endif; ?>
            <?php if(!empty($_SESSION['user'])): ?>
            <div class="rent-action text-center">
                <a role="button" href="<?=url('/movie/rent/'.$movie['id'])?>" class="btn btn-danger my-3  <?=(!$movie['available'] ? 'disabled' : '')?>" <?=(!$movie['available'] ? 'aria-disabled="true"' : '')?>>Wypożycz</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Footer.html' ?>
