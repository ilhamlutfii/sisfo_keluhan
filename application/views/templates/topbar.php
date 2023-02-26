 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-secondary bg-light topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" id="userDropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-white-600 small"> <?php foreach ($companyname->result() as $companyname) : ?>
                                 <b class="header-text"><?= $companyname->company_name; ?></b><br>
                                 <p class="sub-text">
                                     <i class="sub-text"><?= $companyname->company_code; ?></i>
                                 </p>
                             <?php endforeach ?>
                         </span>
                     </a>
                     <!-- Dropdown - User Information -->
                 </li>

                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-dark-600 small"><b class="header-text"><?= $user['name']; ?></b><br>
                             <p class="sub-text"><i><?= $user['username']; ?></i></p>
                         </span>
                         <img class="img-profile rounded-circle" src="assets/img/profile/logo.png">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->