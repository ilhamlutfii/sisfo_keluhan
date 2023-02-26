<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="card shadow mb-4">
        <div class="card-header py-10">
            <table class="table-sm" width="100%">
                <td>
                    <h6 class="m-0 font-weight-bold text-primary"><?= (isset($detailcompany->company_name) ? $detailcompany->company_name : ''); ?></h6>
                </td>
                <td style="text-align: right;">
                    <h6 class="btn btn-info" style="margin-bottom: auto; ">Add User</h6>
                </td>
            </table>

        </div>

        <div class="card-body">
            <div class="table-responsive">
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
                    <br>
                    <p class="ml-2" style="width: 300px;">Users</p>
                    <hr>
                    <div class="tab-pane ml-2 fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
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
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->