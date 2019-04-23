<?php include __DIR__.'/../header.php'; ?>
<div class="admin-login-wrapper">
    <div class="admin-login-container d-flex align-items-center justify-content-center flex-column">
        <h4 class="text-center">Logowanie do panelu administracyjnego</h4>
        <form class="my-5 text-center" action="<?=url('/admin/login')?>" method="post">
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

            <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
        </form>
    </div>
</div>
