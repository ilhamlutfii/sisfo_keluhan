<!-- Begin Page Content -->
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
                            <a href="client" class="btn btn-info plus float-right" data-toggle="modal" data-target="#modal-addClient">
                                <i class="fas fa-fw fa-plus"></i> <span data-feather="plus">Add client</span>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">CODE</th>
                                        <th scope="col">COMPANY NAME</th>
                                        <th scope="col">VERSION</th>
                                        <th scope="col" style="width: 1px; text-align:center">STATUS</th>
                                        <th scope="col" style="width: 160px; text-align:center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($listcompany->result() as $rowcompany) : ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= $rowcompany->company_code; ?></td>
                                            <td><a href="<?= base_url('') ?>client/detail/<?= $rowcompany->id ?>"><?= $rowcompany->company_name; ?></a></td>
                                            <td><?= $rowcompany->version; ?></td>
                                            <td style="text-align: center;"><?php if ($rowcompany->status == "1") : ?>
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
                                                        <a href class="dropdown-item" id="model-" data-toggle="modal" data-target="#modal-deleteClient-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-trash"></i> <span data-feather="unchek">Hapus</span></a>
                                                        <?php if ($rowcompany->status == "1") : ?>
                                                            <a href='<?= base_url('') ?>detail/activation/<?= $rowcompany->id ?>' class="dropdown-item" id="modal-<?= $rowcompany->id ?>" data-toggle="modal" data-target="#modal-ActiveClient-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-times-circle"></i> <span data-feather="unchek">Non Aktifkan</span></a>
                                                        <?php else : ?>
                                                            <a href='<?= base_url('') ?>detail/activation/<?= $rowcompany->id ?>' class="dropdown-item" id="modal-<?= $rowcompany->id ?>" data-toggle="modal" data-target="#modal-ActiveClient-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-check-circle"></i> <span data-feather="chek">Aktifkan</span></a>
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

        <?php $no = 0;
        foreach ($listcompany->result() as $rowcompany) : ?>
            <!-- Add User -->
            <div class=" modal fade" id="modal-addClient">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="<?= base_url('client/addclient'); ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Company Code</label>
                                        <input type="text" class="form-control" id="company_code" name="company_code" placeholder="Enter company code">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
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

            <!-- Aktivasi Modal-->
            <div class="modal fade" id="modal-ActiveClient-<?= $rowcompany->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <?php if ($rowcompany->status == "1") : ?>
                                <h5 class="modal-title" id="activeModal">Non aktifkan company?.</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                        </div>
                        <div class="modal-body">Pilih "Non Active" untuk menonaktifkan company.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="<?php base_url('') ?>detail/activation/<?= $rowcompany->id ?>">Non Active</a>
                        <?php else : ?>
                            <h5 class="modal-title" id="activeModal">Non aktifkan company?.</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih "Activation" untuk mengaktifkan company.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="<?php base_url('') ?>detail/activation/<?= $rowcompany->id ?>">Activation</a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal-->
            <div class="modal fade" id="modal-deleteClient-<?= $rowcompany->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Delete Company?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Delete" for delete company.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="<?php base_url('') ?>client/delete/<?= $rowcompany->id ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

    </section>
</div>

<?php endforeach; ?>