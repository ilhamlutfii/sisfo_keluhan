        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar accordion" id="accordionSidebar">
            <!-- sidebar-dark -->

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3" style="color: white;">TEST</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- QUERY MENU -->

            <?php foreach ($listrole->result() as $menu) : ?>
                <?php if ($title == $menu->menu_name) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item ">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url($menu->url); ?>">
                        <i class="<?= $menu->icon; ?>"></i>
                        <span><?= $menu->menu_name; ?></span></a>
                    </li>
                <?php endforeach ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->