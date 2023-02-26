<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">KODE</th>
                            <th scope="col">NAMA PERUSAHAAN</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">NAMA PIC</th>
                            <th scope="col">LISENSI</th>
                            <th scope="col">VERSI</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($listcompany->result() as $company) : ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $company->company_code; ?></td>
                                <td><?= $company->company_name; ?></td>
                                <td><?= $company->address; ?></td>
                                <td><?= $company->pic_name; ?></td>
                                <td><?= $company->licence; ?></td>
                                <td><?= $company->version; ?></td>
                                <td>
                                    <a href="" class="badge badge-info">Edit</a>
                                    <a href="" class="badge badge-danger">Delete</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->