<?php include __DIR__.'/../template.php' ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Dodawanie nowego klienta</h4>
    <a href="<?=url("admin/customers")?>" class="btn btn-primary">Powrót do listy klientów</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$error?>
                    </div>
                <?php endif; ?>
                <form class="mt-3" method="post">
                    <div class="form-group">
                        <label for="nick">Nick</label>
                        <input value="<?=$data['nick']?>" name="nick" required type="text" class="form-control" id="nick" placeholder="Wpisz nick klienta">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?=$data['email']?>" required type="email" name="email" id="email" class="form-control" placeholder="test@test.pl" />
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input required type="password" name="pass" id="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Powtórz hasło</label>
                        <input required type="password" name="confirm-password" id="confirm-password" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
<?php include __DIR__.'/../footer.php' ?>