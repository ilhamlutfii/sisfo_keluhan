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
          </section>
      </div>