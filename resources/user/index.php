<?php include __DIR__.'/../Header.php';?>
<main class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h1 class="text-center">Aktualnie wypożyczone filmy</h1>
            <?php if(!empty($movies)): ?>
                <?php foreach ($movies as $movie): ?>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?=$movie['thumbnail']?>" class="img-thumbnail" alt="Okładka filmu <?=$movie['title']?>" />
                        </div>
                        <div class="col-md-9">
                            <h3><?=$movie['title']?></h3>
                            <p><?=$movie['description']?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h6 class="d-inline-block">Stan twojego konta:</h6><h5 class="d-inline-block ml-2"><strong>25,98 zł</strong></h5>
            </div>
            <div class="text-center">
                <h6 class="d-inline-block">Wypożyczyłeś filmy za:</h6><h5 class="d-inline-block ml-2"><strong>135,65 zł</strong></h5>
            </div>
        </div>
    </div>
</main>
<?php
include_once __DIR__.'/../Footer.html';
?>