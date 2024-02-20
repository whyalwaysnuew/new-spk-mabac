<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Alternatif</h1>
                        <div class="d-flex">
                            <a href="<?= base_url('/alternatif/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <!-- <i class="fas fa-download fa-sm text-white-50"></i>  -->
                                <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                                Back
                            </a>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-fw fa-plus"></i> Tambah Data Alternatif</h6>
                        </div>
                        
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Alternatif</label>
                                        <input autocomplete="off" type="text" name="nama" required class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" onclick="submitForm()" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>