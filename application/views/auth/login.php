<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <!-- <div class="col-lg-7"> -->
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- bg-login-image -->
                        <!-- <div class="col-lg-5 d-none d-lg-block"><img src="assets/dist/img/logo.png" class="logo-img mx-auto d-block" alt="logo" style="width:120px;height:110px;margin-top:130px;"></div> -->
                        <div class=" col-lg">
                            <div class="p-2">
                                <div class="text-center" style="margin-top: 10px;">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="form-horizontal" method="post" action="<?= base_url('auth') ?>">
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <input type="text" class="form-control form-control-user" id="company_code" name="company_code" placeholder="Company Code..." value="<?= set_value('company_id'); ?>">
                                            <?= form_error('company_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username..." value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password...">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <button type="submit" class="btn btn-primary" style="width: 100%;">Sign in</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>