<?php
include_once 'Header.php';
?>
<main class="container mt-3">
    <div class="row">
        <?php if($notifications = Notifications::getAll('customer')): ?>
            <div class="notification-box w-100 text-center">
                <?php foreach ($notifications as $notification): ?>
                    <?php if($notification['type'] == 'success'): ?>
                        <div class="alert alert-success" role="alert">
                            <?=$notification['message']?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$notification['message']?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($movies)) foreach ($movies as $movie): ?>
            <div class=" col-sm-6 col-md-4 col-lg-3 py-3 movie text-center">
                <a href="#" class="d-block w-100">
                    <div class="movie-image w-100 d-flex justify-content-center align-items-center">
                        <img src="<?=$movie['thumbnail']?>" class="img-thumbnail w-100" alt="Okładka filmu <?=$movie['title']?>">
                        <a style="z-index: 9999" href="<?=url('/movie/'.$movie['id'])?>" class="btn btn-primary">Czytaj więcej ></a>
                    </div>
                </a>
                <span class="movie-price my-2"><?=$movie['price']?> PLN</span>
                 <?php if(!empty($_SESSION['user'])): ?>
                <a role="button" href="<?=url('/movie/rent/'.$movie['id'])?>" class="btn btn-danger my-1 btn-block <?=(!$movie['available'] ? 'disabled' : '')?>" <?=(!$movie['available'] ? 'aria-disabled="true"' : '')?>>Wypożycz</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php
include_once 'Footer.html';
?>


