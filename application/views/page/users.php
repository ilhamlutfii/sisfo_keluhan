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
                                  <?php echo $this->session->status == 'true' ? $this->session->flashdata('message') : '' ?>
                                  <a href="client" class="btn btn-info plus float-right" data-toggle="modal" data-target="#modal-addUsers">
                                      <i class="fas fa-fw fa-plus"></i> <span data-feather="plus">Add users</span>
                                  </a>

                              </div>

                              <!-- /.card-header -->
                              <div class="card-body">
                                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                          <tr>
                                              <th scope="col">NO</th>
                                              <th scope="col">USERNAME</th>
                                              <th scope="col">NAME</th>
                                              <th scope="col" style="width: 1px; text-align:center">STATUS</th>
                                              <th scope="col" style="width: 160px; text-align:center">ACTION</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1;
                                            foreach ($listusers->result() as $rowusers) : ?>
                                              <tr>
                                                  <th><?= $no; ?></th>
                                                  <td><?= $rowusers->username; ?></td>
                                                  <td><?= $rowusers->name; ?></td>
                                                  <td style="text-align: center;"><?php if ($rowusers->is_active == "1") : ?>
                                                          <p class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> Aktif</p>
                                                      <?php else : ?>
                                                          <p class="badge badge-danger"><i class="fas fa-fw fa-times-circle"></i> Non Aktif</p>
                                                      <?php endif; ?>
                                                  </td>
                                                  <td style="text-align: center;">
                                                      <div class="btn-group">
                                                          <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              <i class="fas fa-user-cog"></i>
                                                          </button>
                                                          <div class="dropdown-menu">
                                                              <a href class="dropdown-item" id="modal-<?= $rowusers->id ?>" data-toggle="modal" data-target="#modal-editUsers-<?= $rowusers->id ?>"><i class="fas fa-fw fa-key"></i> <span data-feather="unchek">Ganti Password</span></a>
                                                              <a href class="dropdown-item" data-toggle="modal" data-target="#modal-deleteUsers-<?= $rowusers->id ?>"><i class="fas fa-fw fa-trash"></i> <span data-feather="unchek">Hapus</span></a>
                                                              <?php if ($rowusers->is_active == "1") : ?>
                                                                  <a href='<?= base_url('') ?>users/activation/<?= $rowusers->id ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowusers->id ?>"><i class="fas fa-fw fa-times-circle"></i> <span data-feather="unchek">Non Aktifkan</span></a>
                                                              <?php else : ?>
                                                                  <a href='<?= base_url('') ?>users/activation/<?= $rowusers->id ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowusers->id ?>"><i class="fas fa-fw fa-check-circle"></i> <span data-feather="chek">Aktifkan</span></a>
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
                              <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                      </div>
                      <!-- /.col -->
                  </div>
                  <!-- /.row -->
              </div>
              <!-- /.container-fluid -->

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
                              <form class="form-horizontal" method="post" action="<?= base_url('users/registration'); ?>">
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
                                      <div class="form-group">
                                          <?php if ($this->session->userdata('company_id') == "1") : ?>
                                              <label for="password2">Confirm Password</label>
                                              <select name="role_id" class="form-control">
                                                  <?php foreach ($listroles->result() as $rowroles) :
                                                        if ($rowroles->id != '2') { ?>
                                                          <option value="<?php echo $rowroles->id ?>"><?php echo $rowroles->role_name ?></option>
                                                      <?php
                                                        }
                                                        ?>

                                                  <?php endforeach; ?>
                                              </select>
                                          <?php else : ?>
                                          <?php endif; ?>
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

              <!-- Edit User -->
              <?php $no = 0;
                foreach ($listusers->result() as $rowusers) : $no++; ?>
                  <div class="modal fade" id="modal-editUsers-<?= $rowusers->id ?>">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="card card-info">
                                  <div class="card-header">
                                      <h3 class="card-title">Change Password</h3>
                                  </div>
                                  <!-- /.card-header -->
                                  <!-- form start -->
                                  <form class="form-horizontal" method="post" action="<?= base_url('') ?>users/changepassword/<?= $rowusers->id ?>">
                                      <div class="card-body">
                                          <div id="flashmessage-<?= $rowusers->id ?>">
                                          </div>
                                          <div class="form-group">
                                              <input type="hidden" value="<?= $rowusers->id ?>" class="form-control" placeholder="" disabled>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Username</label>
                                              <input type="text" value="<?= $rowusers->username ?>" class="form-control" placeholder="" disabled>
                                          </div>
                                          <div class="form-group">
                                              <label for="current_password">Old Password</label>
                                              <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password">

                                          </div>
                                          <div class="form-group">
                                              <label for="new_password">New Password</label>
                                              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">

                                          </div>
                                          <div class="form-group">
                                              <label for="confirm_new_password">Confirm New Password</label>
                                              <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Enter confirm password">

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
          </section>
      </div>

      <!-- Aktivasi Modal-->
      <div class="modal fade" id="modal-Activation-<?= $rowusers->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">

                      <?php if ($rowusers->is_active == "1") : ?>
                          <h5 class="modal-title" id="deleteModal">Non aktifkan akun?.</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                  </div>
                  <div class="modal-body">Pilih "Non Active" untuk menonaktifkan akun.</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-danger" href="<?php base_url('') ?>users/activation/<?= $rowusers->id ?>">Non Active</a>
                  <?php else : ?>
                      <h5 class="modal-title" id="deleteModal">Non aktifkan akun?.</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">Pilih "Activation" untuk mengaktifkan akun.</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-danger" href="<?php base_url('') ?>users/activation/<?= $rowusers->id ?>">Activation</a>
                  <?php endif; ?>

                  </div>
              </div>
          </div>
      </div>

      <!-- Delete Modal-->
      <div class="modal fade" id="modal-deleteUsers-<?= $rowusers->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="deleteModal">Delete user account?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">Select "Delete" for delete data user account.</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-danger" href="<?php base_url('') ?>users/delete/<?= $rowusers->id ?>">Delete</a>
                  </div>
              </div>
          </div>
      </div>


      <?php endforeach; ?>