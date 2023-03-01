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
           <section class="content">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-12">
                           <div class="card">
                               <div class="card-header">
                                   <h3 class="card-title">DataTable with minimal features & hover style</h3>
                               </div>
                               <!-- /.card-header -->
                               <div class="card-body">
                                   <nav>
                                       <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                           <a class="nav-link active" style="color: grey;" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">General Info</a>
                                           <a class="nav-link" style="color: grey;" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="false">Users</a>
                                       </div>
                                   </nav>
                                   <div class="tab-content" id="nav-tabContent">
                                       <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                                           <br>
                                           <p class="ml-2" style="width: 300px;">General Info </p>
                                           <table class="table" width="100%" cellspacing="0">
                                               <tbody>
                                                   <tr>
                                                       <td width="200px">Code</td>
                                                       <td><?= (isset($detailcompany->company_code) ? $detailcompany->company_code : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Company Name</td>
                                                       <td><?= (isset($detailcompany->company_name) ? $detailcompany->company_name : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Address</td>
                                                       <td><?= (isset($detailcompany->address) ? $detailcompany->address : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Person In Charge</td>
                                                       <td><?= (isset($detailcompany->pic_name) ? $detailcompany->pic_name : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Contact</td>
                                                       <td><?= (isset($detailcompany->pic_contact) ? $detailcompany->pic_contact : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Licence</td>
                                                       <td><?= (isset($detailcompany->licence) ? $detailcompany->licence : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Version</td>
                                                       <td><?= (isset($detailcompany->version) ? $detailcompany->version : ''); ?></td>
                                                   </tr>
                                                   <tr>
                                                       <td width="200px">Status</td>
                                                       <td><?php if (isset($detailcompany->status) ? $detailcompany->status == 1 : '') : ?>
                                                               <p class="badge badge-success">Aktif</p>
                                                           <?php else : ?>
                                                               <p class="badge badge-danger">Non Aktif</p>
                                                           <?php endif; ?>
                                                       </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                       <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                                           <br>
                                           <p class="ml-2" style="width: 300px;">Users</p>
                                           <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                                   <?php $no = 1; ?>
                                                   <tr>
                                                       <th scope="row"><?= $no; ?></th>
                                                       <td><?= (isset($detailusers->name) ? $detailusers->name : ''); ?></td>
                                                       <td><?= (isset($detailusers->username) ? $detailusers->username : ''); ?></td>
                                                       <td style="text-align: center;"><?php if (isset($detailusers->is_active) ? $detailusers->is_active == 1 : '') : ?>
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
                                                                   <a class="dropdown-item" href="#">Edit</a>
                                                                   <a class="dropdown-item" href="#">Hapus</a>
                                                               </div>
                                                           </div>
                                                       </td>
                                                   </tr>
                                                   <?php $no++; ?>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                                   <!-- /.card-body -->
                               </div>
                               <!-- /.card -->
                           </div>
                           <!-- /.col -->
                       </div>
                       <!-- /.row -->
                   </div>
                   <!-- /.container-fluid -->
           </section>
       </div>