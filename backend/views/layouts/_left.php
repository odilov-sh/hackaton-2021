<?php

use common\models\Contract;

$menuItems = [
    ['label' => "Bosh sahifa", 'url' => ['/site/index'], 'icon' => 'home',],
    ['label' => "Doktorlar", 'url' => ['/usermanager'], 'icon' => 'user-md',],
    ['label' => "Doktor turlari", 'url' => ['/doctor-type'], 'icon' => 'star-of-life,fas'],
];


?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= to(['site/index']) ?>" class="brand-link">
        <img src="/template/adminlte3//img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Smart Doctor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?=
            \soft\widget\adminlte3\Menu::widget([
                'items' => $menuItems,
            ])
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>