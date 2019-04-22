<?php include __DIR__.'/../Header.php' ?>

<div class="container d-flex justify-content-center align-items-center my-6">
        <form class="my-5 text-center" action="<?=url('/login')?>" method="post">
            <?php if(!empty($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$error?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Adres e-mail">
            </div>
            <div class="form-group">
                <input type="password" id="password" class="form-control" name="pass" placeholder="Hasło">
            </div>

            <button type="submit" class="btn btn-primary">Zaloguj się</button>
        </form>
    </div>
</div>
<?php include __DIR__.'/../Footer.html' ?>
