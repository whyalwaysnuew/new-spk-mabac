<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Lengkap</h6>
                        </div>
                        <div class="card-body">
                            <form id="inputForm" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <input autocomplete="off" type="hidden" name="id_user" value="<?= $user->id_user; ?>" required class="form-control" required/>
                                    
                                    <div class="form-group col-12">
                                        <label class="font-weight-bold">Nama Lengkap</label>
                                        <input autocomplete="off" type="text" name="nama" value="<?= $user->nama; ?>" required class="form-control" placeholder="e.g. Hafidz Fadhillah" required/>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="font-weight-bold">Username</label>
                                        <input autocomplete="off" type="text" name="username" value="<?= $user->username; ?>" required class="form-control" placeholder="e.g. hadizfadhillah" required/>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="font-weight-bold">Email</label>
                                        <input autocomplete="off" type="text" name="email" value="<?= $user->email; ?>" required class="form-control" placeholder="e.g. hafidz@gmail.com" required/>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="font-weight-bold">Password</label>
                                        <input autocomplete="off" type="password" name="password" required class="form-control" placeholder="******" required/>
                                    </div>

                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary col-12" onclick="submitForm()">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            

<?= $this->endSection(); ?>