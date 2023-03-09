<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/dist/img/logo.png" class="user-image img-circle elevation-5" alt="User Image">
                    <span class="mr-2 d-none d-lg-inline text-white-600 small">
                        <b class="header-text"><?= $user['name']; ?></b><br>
                    </span>
                    <p class="sub-text text-white-600 small"><i><?= $user['username']; ?></i></p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    <div class="mb-2"></div>
                </ul>
            </li>
        </ul>
    </nav>
    <br> <!-- /.navbar -->