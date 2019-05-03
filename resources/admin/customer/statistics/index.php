<?php include __DIR__ . '/../../template.php' ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Statystyki klienta - <?=$customer['nick']?> (<?=$customer['email']?>)</h4>
    <a href="<?=url("admin/customers")?>" class="btn btn-primary">Powrót do listy klientów</a>
</div>
<div class="row mt-3">
    <div class="col-xs-12 col-md-4">
        <div class="card-box bg-primary">
            <h6 class="text-uppercase">Wszystkie</h6>
            <span class="number"><?=$customer['all']?></span>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="card-box bg-success">
            <h6 class="text-uppercase">Oddane</h6>
            <span class="number"><?=$customer['returned']?></span>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="card-box bg-danger">
            <h6 class="text-uppercase">Wypożyczone</h6>
            <span class="number"><?=$customer['borrowed']?></span>
        </div>
    </div>
</div>
<div class="table-responsive mt-3">
    <h3>Lista filmów</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Okładka</th>
            <th>Tytuł filmu</th>
            <th>Status</th>
            <th>Data wypożyczenia</th>
            <th>Data oddania</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customerMovies as $movie): ?>
            <tr>
                <td><?= $movie['id'] ?></td>
                <td><img style="max-width: 100px" src="<?= $movie['thumbnail'] ?>"/></td>
                <td><?= $movie['title'] ?></td>
                <td>
                    <?php if(empty($movie['comm_date'])): ?>
                        <span style="color: red">Wypożyczony</span>
                    <?php else: ?>
                        <span style="color: green">Oddany</span>
                    <?php endif; ?>
                </td>
                <td><?=$movie['rental_date']?></td>
                <td><?=$movie['comm_date']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../../footer.php' ?>
