<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-10">
            <table class="table-sm" width="100%">
                <td>
                    <h6 class="m-0 font-weight-bold text-primary">USER LIST</h6>
                </td>
                <td style="text-align: right;">
                    <h6 class="btn btn-info" style="margin-bottom: auto; ">Add User</h6>
                </td>
            </table>

        </div>

        <div class="card-body">
            <div class="table-responsive">

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
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->