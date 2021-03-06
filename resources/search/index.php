<?php include __DIR__.'/../Header.php'; ?>

  <main class="container mt-3">
      <h1 class="text-center">Szukałeś : <?=$q?></h1>
    <div class="container mt-3">
        
    <?php if(!empty($movies)): ?>    
        <?php foreach ($movies as $movie): ?>
            <div class="row">
                <div class="col-md-3">
                    <img src="<?=$movie['thumbnail']?>" class="img-thumbnail" alt="Okładka filmu <?=$movie['title']?>" />
                </div>
                <div class="col-md-9">
                    <h1><?=$movie['title']?></h1>
                    <p><?=$movie['description']?></p>
                    <div class="d-flex flex-column align-items-center">
                        <?php if(!empty($_SESSION['user'])): ?>
                            <a role="button" href="<?=url('/movie/rent/'.$movie['id'])?>" class="btn btn-danger my-3  <?=(!$movie['available'] ? 'disabled' : '')?>" <?=(!$movie['available'] ? 'aria-disabled="true"' : '')?>>Wypożycz</a>
                        <?php endif; ?>
                        <a href="<?=url('/movie/'.$movie['id'])?>" class="btn btn-primary my-1">Sprawdź więcej o filmie</a>
                    </div>
                </div>
            </div>
       <?php endforeach; ?>
        <?php else: ?>
        <h4 class="text-center" >Nie znaleziono szukanej frazy!</h4>
        <div class="text-center"><a href="<?=url('/')?>" class="btn btn-outline-dark" >Powrót na stronę główną</a></div>
    <?php endif; ?>
</div>
</main>




<?php include __DIR__.'/../Footer.html' ?>
