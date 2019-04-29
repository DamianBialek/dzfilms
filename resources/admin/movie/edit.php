<?php include __DIR__.'/../template.php' ?>
<div class="d-flex justify-content-between align-items-center">
    <h4>Edytowanie filmu - <?=$movie['title']?></h4>
    <a href="<?=url("admin/movies")?>" class="btn btn-primary">Powrót do listy filmów</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            <form class="mt-3" method="post" action="<?=url('admin/movies/update')?>">
                <input type="hidden" name="id" value="<?=$movie['id']?>" />
                <div class="form-group">
                    <label for="title">Tytuł filmu</label>
                    <input value="<?=$movie['title']?>" name="title" required type="text" class="form-control" id="title" placeholder="Wpisz tytuł filmu">
                </div>
                <div class="form-group">
                    <label for="description">Opis filmu</label>
                    <textarea rows="10" name="description" required class="form-control" id="description" placeholder="Wpisz opis filmu"><?=$movie['description']?></textarea>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Link do okładki filmu</label>
                    <input value="<?=$movie['thumbnail']?>" name="thumbnail" required type="text" class="form-control" id="thumbnail" placeholder="Wklej link do okładki filmu">
                </div>
                <div class="form-group">
                    <label for="price">Cena filmu</label>
                    <input name="price" required type="number" class="form-control" id="price" step="0.01" value="<?=$movie['price']?>">
                </div>
                <div class="form-group">
                    <label for="trailer">Link do zwiastunu filmu z YT (tylko pogrubiona część - https://www.youtube.com/watch?v=<b>c7AvpuBAR34</b>)</label>
                    <input value="<?=$movie['trailer']?>" name="trailer" type="text" class="form-control" id="trailer" placeholder="Wklej link do zwiastunu filmu">
                </div>
                <div class="form-group">
                    <label for="active">Aktywny</label>
                    <input name="active" type="checkbox" id="active" value="1" <?=$movie['active'] == '1' ? 'checked' : ''?>/>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__.'/../footer.php' ?>