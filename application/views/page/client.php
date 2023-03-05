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

                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                                        <a href class="dropdown-item" id="modal-<?= $rowcompany->id ?>" data-toggle="modal" data-target="#modal-editUsers-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-key"></i> <span data-feather="unchek">Ganti Password</span></a>
                                                        <a href class="dropdown-item" data-toggle="modal" data-target="#modal-deleteUsers-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-trash"></i> <span data-feather="unchek">Hapus</span></a>
                                                        <?php if ($rowcompany->status == "1") : ?>
                                                            <a href='<?= base_url('') ?>users/activation/<?= $rowcompany->id ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-times-circle"></i> <span data-feather="unchek">Non Aktifkan</span></a>
                                                        <?php else : ?>
                                                            <a href='<?= base_url('') ?>users/activation/<?= $rowcompany->id ?>' class="dropdown-item" data-toggle="modal" data-target="#modal-Activation-<?= $rowcompany->id ?>"><i class="fas fa-fw fa-check-circle"></i> <span data-feather="chek">Aktifkan</span></a>
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
    </section>
</div>