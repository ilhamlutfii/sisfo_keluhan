<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/dist/img/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php foreach ($companyname->result() as $companyname) : ?>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i><?= $companyname->company_code; ?></i>
                            <p> - <?= $companyname->company_name; ?></p>
                        </a>
                    <?php endforeach ?>
                    </li>
            </ul>
        </nav>

        <!-- Sidebar Menu -->
        <nav class=" mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php foreach ($listrole->result() as $menu) : ?>
                    <?php if ($title == $menu->menu_name) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url($menu->url); ?>">
                            <?php else : ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url($menu->url); ?>">
                            <?php endif; ?>
                            <i class="nav-icon <?= $menu->icon; ?>"></i>
                            <p><?= $menu->menu_name; ?></p>
                            </a>
                        <?php endforeach ?>
                        </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>