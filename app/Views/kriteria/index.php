<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
                        <div class="d-flex">
                            <button class="button btn btn-success shadow-sm mr-2" onclick="getModalUpload()">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>
                                Upload Data
                            </button>
                            <button class="button btn btn-primary shadow-sm mr-2" onclick="getModalCreate()">
                                <i class="fas fa-plus-square"></i>
                                Create
                            </button>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="dataTableKriteria" cellspacing="0">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                            <th>Jenis</th>
                                            <th>Bobot</th>
                                            <th class="text-center" data-orderable="false" data-searchable="false">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if(@$kriteria) { ?>
                                        <?php foreach($kriteria as $no => $data) {?>
                                            <tr>
                                                <td class="text-center"><?= $no+1; ?></td>
                                                <td><?= $data->kode_kriteria; ?></td>
                                                <td><?= $data->keterangan; ?></td>
                                                <td><?= $data->jenis; ?></td>
                                                <td><?= $data->bobot; ?></td>
                                                <td class="text-center align-middle">
                                                    <a href="<?= base_url('/kriteria/edit/') . $data->id_kriteria; ?>" type="button" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    
                                                    <button id="removeKriteria" data-id="<?= $data->id_kriteria; ?>" type="button" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <!-- begin::Modal -->
            <div class="modal fade" id="Modal" data-backdrop="static" tabindex="-1" role="dialog" data-bs-keyboard="false" data-bs-backdrop="static">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document" id="contentModal"></div>
            </div>
            <!-- end::Modal -->

<?= $this->endSection(); ?>