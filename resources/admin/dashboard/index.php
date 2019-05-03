<?php include __DIR__.'/../template.php'; ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Strona główna - informacje o serwisie</h4>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="card-box bg-blue">
            <h6 class="text-uppercase">Liczba filmów</h6>
            <span class="number"><?=$numberOfMovies?></span>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="card-box bg-yellow">
            <h6 class="text-uppercase">Liczba klientów</h6>
            <span class="number"><?=$numberOfCustomers?></span>
        </div>
    </div>
</div>

<?php include __DIR__.'/../footer.php' ?>
