<?php include __DIR__ . '/../template.php' ?>

    <div class="d-flex justify-content-between align-items-center">
        <h4>Lista klientów</h4>
        <a href="<?= url("admin/customers/create") ?>" class="btn btn-primary">Dodaj nowego klienta</a>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Nick</th>
                <th>Stan konta</th>
                <th class="text-center">Statystyki wypożyczeń <br /> <span style="color:blue">wszystkie</span>/<span style="color:green">oddane</span>/<span style="color:red">wypożyczone</span></th>
                <th class="text-center">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?=$customer['id']?></td>
                    <td><?=$customer['email']?></td>
                    <td><?=$customer['nick']?></td>
                    <td><?=number_format($customer['account_balance'], 2, ",", '')?> zł</td>
                    <td class="text-center">
                        <span style="color:blue"><?=$customer['all']?></span> /
                        <span style="color:green"><?=$customer['returned']?></span> /
                        <span style="color:red"><?=$customer['borrowed']?></span>
                    </td>
                    <td class="text-center align-middle">
                        <a href="<?= url('/admin/customers/statistics/' . $customer['id']) ?>" rel="button" class="btn btn-info">Statystyki</a>
                        <a href="<?= url('/admin/customers/edit/' . $customer['id']) ?>" rel="button" class="btn btn-primary">Edytuj</a>
                        <a data-customer-nick="<?= $customer['nick'] ?>" data-action="remove"
                           href="<?= url('/admin/customers/remove/' . $customer['id']) ?>" rel="button"
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
                const clickedCustomer = $(this);

                $.confirm({
                    title: 'Usuwanie filmu',
                    content: 'Czy na pewno chcesz usunąć klienta <b>' + $(this).attr("data-customer-nick") + "</b> ?",
                    buttons: {
                        cancel: {
                            text: "Anuluj",
                            action: function () {

                            },
                        },
                        confirm: {
                            text: "Usuń",
                            action: function () {
                                location.replace(clickedCustomer.attr('href'))
                            },
                        },

                    },
                });
            });
        });
    </script>
<?php include __DIR__ . '/../footer.php' ?>