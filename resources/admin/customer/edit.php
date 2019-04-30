<?php include __DIR__.'/../template.php' ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Edytowanie danych klienta</h4>
    <a href="<?=url("admin/customers")?>" class="btn btn-primary">Powrót do listy klientów</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            <form class="mt-3" method="post" action="<?=url('admin/customers/update')?>">
                <input type="hidden" name="id" value="<?=$customer['id']?>" />
                <div class="form-group">
                    <label for="nick">Nick</label>
                    <input value="<?=$customer['nick']?>" name="nick" required type="text" class="form-control" id="nick" placeholder="Wpisz nick klienta">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?=$customer['email']?>" required type="email" name="email" id="email" class="form-control" placeholder="test@test.pl" />
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__.'/../footer.php' ?>