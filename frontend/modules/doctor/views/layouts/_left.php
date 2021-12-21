<?php


$menuItems = [
    ['label' => "Bosh sahifa", 'url' => ['/doctor'], 'icon' => 'home',],
    ['label' => "Bemorlar", 'url' => ['/doctor/client'], 'icon' => 'user',],
    ['label' => "Qabullar", 'url' => ['/doctor/reception'], 'icon' => 'clipboard-list,fas',],
    ['label' => "Mening bemorlarim", 'url' => ['/doctor/client/my-client'], 'icon' => 'users,fas',],
    ['label' => "Hududlar bo'yicha", 'url' => ['/doctor/client/region'], 'icon' => 'globe,fas',],

];


?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= to(['/doctor']) ?>" class="brand-link">
        <img src="/template/adminlte3//img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ISoft Medical Programm</span>
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