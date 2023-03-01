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
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($listcompany->result() as $company) : ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= $company->company_code; ?></td>
                                            <td><a href="<?= base_url('') ?>client/detail/<?= $company->id ?>"><?= $company->company_name; ?></a></td>
                                            <td><?= $company->version; ?></td>
                                            <td style="text-align: center;"><?php if ($company->status == "1") : ?>
                                                    <p class="badge badge-success">Aktif</p>
                                                <?php else : ?>
                                                    <p class="badge badge-danger">Non Aktif</p>
                                                <?php endif; ?>
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