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
                              <div class="col card-header text-right">
                                  <a href="client" class="btn btn-primary plus float-right" data-toggle="modal" data-target="#modal-addUsers">
                                      <i class="fas fa-fw fa-plus"></i> <span data-feather="plus">Add users</span>
                                  </a>

                              </div>

                              <!-- /.card-header -->
                              <div class="card-body">
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
                                          <?php $no = 1;
                                            foreach ($listusers->result() as $rowusers) : ?>
                                              <tr>
                                                  <th scope="row"><?= $no; ?></th>
                                                  <td><?= $rowusers->name; ?></td>
                                                  <td><?= $rowusers->username; ?></td>
                                                  <td style="text-align: center;"><?php if ($rowusers->is_active == "1") : ?>
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
                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
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

              <div class="modal fade" id="modal-addUsers">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Add Users</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <?= $this->session->flashdata('message'); ?>
                              <form class="form-horizontal" method="post" action="<?= base_url('users/registration'); ?>">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                      </div>
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" id="password2" name="password2" placeholder="Retry Password">
                                      </div>
                                      <?php if ($this->session->userdata('company_id') == "1") : ?>
                                          <div class="row">
                                              <div class="col-sm">
                                                  <!-- select -->
                                                  <div class="form-group">
                                                      <select name="role_id" class="form-control">
                                                          <?php foreach ($listroles->result() as $rowroles) :
                                                                if ($rowroles->id != '2') { ?>
                                                                  <option value="<?php echo $rowroles->id ?>"><?php echo $rowroles->role_name ?></option>
                                                              <?php
                                                                }
                                                                ?>

                                                          <?php endforeach; ?>
                                                      </select>
                                                  </div>
                                              </div>
                                          <?php else : ?>
                                          <?php endif; ?>

                                          </div>
                                          <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">
                                                  Register Account
                                              </button>
                                          </div>
                                          <!-- /.card-body -->
                                  </div>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
          </section>
      </div>