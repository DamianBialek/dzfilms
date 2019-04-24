<?php include __DIR__.'/../template.php' ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Dodawanie nowego filmu</h4>
    <a href="<?=url("admin/movies")?>" class="btn btn-primary">Powrót do listy filmów</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-3">
                <?php if($success): ?>
                    <div class="alert alert-success text-center" role="alert">
                        Poprawnie dodałeś/aś nowy film !
                    </div>
                <?php endif; ?>
                <form class="mt-3" method="post">
                    <div class="form-group">
                        <label for="title">Tytuł filmu</label>
                        <input name="title" required type="text" class="form-control" id="title" placeholder="Wpisz tytuł filmu">
                    </div>
                    <div class="form-group">
                        <label for="description">Opis filmu</label>
                        <textarea name="description" required class="form-control" id="description" placeholder="Wpisz opis filmu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Link do okładki filmu</label>
                        <input name="thumbnail" required type="text" class="form-control" id="thumbnail" placeholder="Wklej link do okładki filmu">
                    </div>
                    <div class="form-group">
                        <label for="price">Cena filmu</label>
                        <input name="price" required type="number" class="form-control" id="price" step="0.01" value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
</body>