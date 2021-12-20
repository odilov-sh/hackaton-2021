<?php

use soft\widget\adminlte3\Menu;

$menuItems = [
    ['label' => "Bosh sahifa", 'url' => ['/doctor'], 'icon' => 'home',],
    ['label' => "Mijozlar", 'url' => ['client/index'], 'icon' => 'hospital-user,fas',],
    ['label' => "Qabul", 'url' => ['reception/index'], 'icon' => 'user',],
];

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= to(['site/index']) ?>" class="brand-link">
        <img src="/template/adminlte3//img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Edu system</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <?= Menu::widget([
                'items' => $menuItems,
            ])
            ?>
        </nav>
    </div>
</aside>
