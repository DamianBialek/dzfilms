<?php include __DIR__.'/header.php'; ?>
<div class="d-flex">
    <div class="sidebar">
        <div class="sidebar-header py-4 px-3">
            <h5>Wypożyczalnia filmów panel administracyjny</h5>
        </div>
        <nav class="navbar-default">
            <ul class="list-group">
                <li class="list-group-item <?=$routeName == 'AdminDashboard' ? 'active' : ''?>">
                    <a href="<?=url("admin/dashboard")?>">Strona główna</a>
                </li>
                <li class="list-group-item <?=$routeName == 'AdminMovies' ? 'active' : ''?>">
                    <a href="<?=url("admin/movies")?>">Zarządzaj filmami</a>
                </li>
                <li class="list-group-item <?=$routeName == 'AdminCustomers' ? 'active' : ''?>">
                    <a href="<?=url("admin/customers")?>">Zarządzaj klientami</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="main-wrapper">
        <header class="main-header text-right row">
            Zalogowany jako:<span class="ml-2"><b><?=$_SESSION['admin']['user']['nick']?></b></span>
            <div class="sign-up">
                <a class="nav-link" href="<?=url("admin/logout")?>">Wyloguj się</a>
            </div>
        </header>
        <div class="main-container mt-3">
            <?php if($notifications = Notifications::getAll('admin')): ?>
                <div class="notification-box">
                    <?php foreach ($notifications as $notification): ?>
                        <?php if($notification['type'] == 'success'): ?>
                            <div class="alert alert-success" role="alert">
                                <?=$notification['message']?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                <?=$notification['message']?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

