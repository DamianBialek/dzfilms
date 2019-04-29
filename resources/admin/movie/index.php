<?php include __DIR__ . '/../template.php' ?>

    <div class="d-flex justify-content-between align-items-center">
        <h4>Lista filmów</h4>
        <a href="<?= url("admin/movies/create") ?>" class="btn btn-primary">Dodaj nowy film</a>
    </div>
<?php if ($success): ?>
    <div class="alert alert-success text-center my-3" role="alert">
        <?= $success ?>
    </div>
<?php endif; ?>
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Okładka</th>
                <th>Tytuł filmu</th>
                <th>Krótki opis</th>
                <th class="text-center">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $movie['id'] ?></td>
                    <td><img style="max-width: 100px" src="<?= $movie['thumbnail'] ?>"/></td>
                    <td><?= $movie['title'] ?></td>
                    <td><?= mb_substr($movie['description'], 0, 51, 'utf-8') ?>...</td>
                    <td class="text-center align-middle">
                        <a href="<?= url('/admin/movies/edit/' . $movie['id']) ?>" rel="button" class="btn btn-primary">Edytuj</a>
                        <a data-movie-title="<?= $movie['title'] ?>" data-action="remove"
                           href="<?= url('/admin/movies/remove/' . $movie['id']) ?>" rel="button"
                           class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(function () {
            $("[data-action='remove']").on("click", function (e) {
                e.preventDefault();
                const clickedMovie = $(this);

                $.confirm({
                    title: 'Usuwanie filmu',
                    content: 'Czy na pewno chcesz usunąć film <b>' + $(this).attr("data-movie-title") + "</b> ?",
                    buttons: {
                        cancel: {
                            text: "Anuluj",
                            action: function () {

                            },
                        },
                        confirm: {
                            text: "Usuń",
                            action: function () {
                                location.replace(clickedMovie.attr('href'))
                            },
                        },

                    },
                });
            });
        });
    </script>
<?php include __DIR__ . '/../footer.php' ?>