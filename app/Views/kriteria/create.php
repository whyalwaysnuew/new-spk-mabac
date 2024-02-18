<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
                        <a href="<?= base_url('/kriteria'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                            <i class="fas fa-arrow-left mr-2"></i> Back
                        </a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Kode Kriteria</label>
                                    <input autocomplete="off" type="text" name="kode_kriteria" required class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Nama Kriteria</label>
                                    <input autocomplete="off" type="text" name="keterangan" required class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Bobot Kriteria</label>
                                    <input autocomplete="off" type="number" step="0.001" name="bobot" required class="form-control"/>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Jenis Kriteria</label>
                                    <select name="jenis" class="form-control" required>
                                        <option value="">--Pilih Jenis Kriteria--</option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>						
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            

<?= $this->endSection(); ?>