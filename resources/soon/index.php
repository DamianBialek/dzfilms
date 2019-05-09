<?php include __DIR__.'/../Header.php'; ?>

  <main class="container mt-3">
      <h1 class="text-center">Wkrótce dostępne filmy</h1>
    <div class="row">
        <?php if(count($movies) > 0): ?>
            <?php foreach ($movies as $movie): ?>
                <div class="col-12 d-flex">
                    <div class="col-md-3">
                        <img src="<?=$movie['thumbnail']?>" class="img-thumbnail" alt="Okładka filmu <?=$movie['title']?>" />
                    </div>
                    <div class="col-md-9">
                        <h1><?=$movie['title']?></h1>
                        <p><?=$movie['description']?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="col-12 text-center">
                <h3>Nasi redaktorzy już pracują nad nowymi filmami :)</h3>
            </div>
        <?php endif; ?>
    </div>
</main>




<?php include __DIR__.'/../Footer.html' ?>



