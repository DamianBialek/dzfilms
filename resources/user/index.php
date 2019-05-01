<?php include __DIR__.'/../Header.php';?>
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
                            <div class="d-flex flex-column align-items-center">
                                <a href="<?=url('/movie/give/'.$movie['movie_id'])?>" class="btn btn-danger my-1">Oddaj</a>
                                <a href="<?=url('/movie/'.$movie['movie_id'])?>" class="btn btn-primary my-1">Sprawdź więcej o filmie</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h6 class="d-inline-block">Stan twojego konta:</h6><h5 class="d-inline-block ml-2"><strong><?=number_format($user['account_balance'], 2, ",", '')?> zł</strong></h5>
            </div>
            <div class="text-center">
                <h6 class="d-inline-block">Wypożyczyłeś filmy za:</h6><h5 class="d-inline-block ml-2"><strong><?=number_format($sum, 2, ",", '')?> zł</strong></h5>
            </div>
        </div>
    </div>
</main>
<?php
include_once __DIR__.'/../Footer.html';
?>