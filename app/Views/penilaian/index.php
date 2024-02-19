<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Penilaian</h1>
                        <div class="d-flex">
                            <button class="button btn btn-success shadow-sm mr-2" onclick="getModalUpload()">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>
                                Upload Data
                            </button>
                        </div>
                    </div>

                    

                    <div class="card shadow mb-4">
                        <!-- /.card-header -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-white">
                                        <tr align="center">
                                            <th width="5%">No</th>
                                            <th>Alternatif</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                        $no=1;
                                        foreach ($alternatif as $keys): ?>
                                        <tr align="center">
                                            <td><?=$no ?></td>
                                            <td align="left"><?= $keys->nama ?></td>
                                            <?php $cek_tombol = $penilaian_model->untuk_tombol($keys->id_alternatif); ?>

                                            <td>
                                            <?php if ($cek_tombol==0) { ?>
                                                <button typw="button" class="btn btn-success btn-sm" onclick="modalInput('<?= $keys->id_alternatif; ?>')">
                                                    <i class="fa fa-plus"></i> Input
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-warning btn-sm" onclick="modalEdit('<?= $keys->id_alternatif; ?>')">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    
                                <?php 
                                    $no++;
                                    endforeach
                                ?>
                                </tbody>
                            </table>
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