<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-12">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body text-center">
                                    <h3 class="text-secondary fw-bold">
                                        WELCOME <?= session()->get('nama'); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            

<?= $this->endSection(); ?>