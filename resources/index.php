<?php
include_once 'Header.php';
?>
<main class="container mt-3">
    <div class="row">
        <?php if(!empty($movies)) foreach ($movies as $movie): ?>
            <div class=" col-sm-6 col-md-4 col-lg-3 py-3 movie text-center">
                <a href="#" class="d-block w-100">
                    <div class="movie-image w-100 d-flex justify-content-center align-items-center">
                        <img src="<?=$movie['thumbnail']?>" class="img-thumbnail w-100">
                        <button class="btn btn-primary">Czytaj więcej ></button>
                    </div>
                </a>
                <span class="movie-price my-2"><?=$movie['price']?> PLN</span>
                <a role="button" href="#" class="btn btn-danger my-1 btn-block <?=(!$movie['available'] ? 'disabled' : '')?>" <?=(!$movie['available'] ? 'aria-disabled="true"' : '')?>>Wypożycz</a>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php
include_once 'Footer.html';
?>


