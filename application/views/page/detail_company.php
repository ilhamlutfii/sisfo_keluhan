       <!-- Begin Page Content -->
       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
           <!-- Content Header (Page header) -->
           <section class="content-header">
               <div class="container-fluid">
                   <div class="row mb-2">
                       <div class="col-sm-6">
                           <h1><?= $title; ?></h1>
                       </div>
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                               <li class="breadcrumb-item"><a href="#">Home</a></li>
                               <li class="breadcrumb-item active">General Form</li>
                           </ol>
                       </div>
                   </div>
               </div><!-- /.container-fluid -->
           </section>
           <!-- Main content -->

           <div class="col-12 col-sm-12" style="padding-left: 20px; padding-right: 15px;">
               <div class="card">
                   <div class="card-header">
                       <h3 class="card-title"><a href="<?= base_url('') ?>client?>" style="color: green;"><i class="fas fa-fw fa-chevron-circle-left"></i> Kembali</a></h3>
                   </div>
               </div>
           </div>

           <div class="col-12 col-sm-12" style="padding-left: 20px; padding-right: 15px;">
               <div class="card card-primary card-outline card-outline-tabs">
                   <div class="card-header p-0 border-bottom-0">
                       <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                           <li class="nav-item">
                               <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#tab-info" role="tab" aria-controls="tabs-info" aria-selected="true">General Info</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#tab-users" role="tab" aria-controls="tabs-users" aria-selected="false">Users</a>
                           </li>
                       </ul>
                   </div>
                   <section class="content">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-12">
                                   <div class="card" style="box-shadow: none;">
                                       <div class="card-body">
                                           <div class="tab-content" id="custom-tabs-four-tabContent">
                                               <div class="tab-pane fade active show" id="tab-info" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                   <div class="ml-2">
                                                       <tr>
                                                           <td><?php if (isset($detailcompany->status) ? $detailcompany->status == 1 : '') : ?>
                                                                   <p class="badge badge-success" style="font-size:90%">Aktif</p>
                                                               <?php else : ?>
                                                                   <p class="badge badge-danger" style="font-size:90%">Non Aktif</p>
                                                               <?php endif; ?>
                                                           </td>
                                                       </tr>
                                                   </div>
                                                   <form class="form-horizontal" method="post" action="<?= base_url('') ?>client/editcompany/<?= $detailcompany->id ?>">
                                                       <table class="table " width="100%" cellspacing="0">
                                                           <tbody>
                                                               <tr>
                                                                   <td width="200px">Code</td>
                                                                   <td width="10px">:</td>
                                                                   <td style="padding-left: 12.5px;">
                                                                       <?= $detailcompany->company_code ?>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Company Name</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="text" id="company_name" name="company_name" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->company_name ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Address</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="textarea" id="address" name="address" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->address ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Person In Charge</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="text" id="pic_name" name="pic_name" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->pic_name ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Contact</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="text" id="pic_contact" name="pic_contact" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->pic_contact ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Licence</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="text" id="licence" name="licence" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->licence ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td width="200px">Version</td>
                                                                   <td width="10px">:</td>
                                                                   <td>
                                                                       <input type="text" id="version" name="version" class="w3-border-0" style="width: 500px;" value="<?= $detailcompany->version ?>" placeholder="">
                                                                   </td>
                                                               </tr>
                                                           </tbody>
                                                       </table>
                                                       <!-- /.card-body -->
                                                       <div class="modal-footer justify-content-between">
                                                           <button type="submit" class="btn btn-info">Save</button>
                                                       </div>
                                                   </form>
                                               </div>
                                               <div class="card" style="box-shadow: none; margin-bottom:0px">
                                                   <div class="col text-right">
                                                       <a href="client" class="btn btn-info plus float-right" data-toggle="modal" data-target="#modal-addUsers">
                                                           <i class="fas fa-fw fa-plus"></i> <span data-feather="plus">Add client</span>
                                                       </a>
                                                   </div>
                                                   <hr style="margin: 10px;">
                                               </div>
                                               <div class="tab-pane fade" id="tab-users" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">

                                                   <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                                       <thead>
                                                           <tr>
                                                               <th scope="col">NO</th>
                                                               <th scope="col">NAME</th>
                                                               <th scope="col">USERNAME</th>
                                                               <th scope="col" style="width: 1px; text-align:center">STATUS</th>
                                                               <th scope="col" style="width: 1px; text-align:center">ACTION</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody>
                                                           <?php $no = 1;
                                                            foreach ($detailusers as $rowusers) : ?>
                                                               <tr>
                                                                   <th scope="row"><?= $no; ?></th>
                                                                   <td><?= $rowusers['name']; ?></td>
                                                                   <td><?= $rowusers['username']; ?></td>
                                                                   <td style="text-align: center;"><?php if ($rowusers['is_active'] == "1") : ?>
                                                                           <p class="badge badge-success">Aktif</p>
                                                                       <?php else : ?>
                                                                           <p class="badge badge-danger">Non Aktif</p>
                                                                       <?php endif; ?>
                                                                   </td>
                                                                   <td style="text-align: center;">
                                                                       <div class="btn-group">
                                                                           <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                               <i class="fas fa-user-cog"></i>
                                                                           </button>
                                                                           <div class="dropdown-menu">
                                                                               <a href class="dropdown-item" id="modal-<?= $rowusers['id']; ?>" data-toggle="modal" data-target="#modal-editUsers-<?= $rowusers['id']; ?>"><i class="fas fa-fw fa-key"></i> <span data-feather="unchek">Ganti Password</span></a>
                                                                               <a href class="dropdown-item" data-toggle="modal" data-target="#modal-deleteUsers-<?= $rowusers['id']; ?>"><i class="fas fa-fw fa-trash"></i> <span data-feather="unchek">Hapus</span></a>
                                                                               <?php if ($rowusers['is_active'] == "1") : ?>
                                                                                   <a href='<?= base_url('') ?>users/activation/<?= $rowusers['id']; ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowusers['id']; ?>"><i class="fas fa-fw fa-times-circle"></i> <span data-feather="unchek">Non Aktifkan</span></a>
                                                                               <?php else : ?>
                                                                                   <a href='<?= base_url('') ?>users/activation/<?= $rowusers['id']; ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowusers['id']; ?>"><i class="fas fa-fw fa-check-circle"></i> <span data-feather="chek">Aktifkan</span></a>
                                                                               <?php endif; ?>
                                                                           </div>
                                                                       </div>
                                                                   </td>
                                                               </tr>
                                                               <?php $no++; ?>
                                                           <?php endforeach; ?>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- /.card -->
                               </div>
                           </div>
                       </div>
                   </section>

                   <!-- Add User -->
                   <div class=" modal fade" id="modal-addUsers">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="card card-info">
                                   <div class="card-header">
                                       <h3 class="card-title">Add Users</h3>
                                   </div>
                                   <!-- /.card-header -->
                                   <!-- form start -->
                                   <form class="form-horizontal" method="post" action="<?= base_url('') ?>client/registration/<?= $detailcompany->id ?>">
                                       <div class="card-body">
                                           <div class="form-group">
                                               <label for="name">Name</label>
                                               <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                               <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                           </div>
                                           <div class="form-group">
                                               <label for="username">Username</label>
                                               <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                               <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                           </div>
                                           <div class="form-group">
                                               <label for="password1">Password</label>
                                               <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter password">
                                               <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                           </div>
                                           <div class="form-group">
                                               <label for="password2">Confirm Password</label>
                                               <input type="password" class="form-control" id="password2" name="password2" placeholder="Enter confirm password">
                                               <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                           </div>
                                       </div>
                                       <!-- /.card-body -->
                                       <div class="modal-footer justify-content-between">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           <button type="submit" class="btn btn-info">Save</button>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- /.modal -->