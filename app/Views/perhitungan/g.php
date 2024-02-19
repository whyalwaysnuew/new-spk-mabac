<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Perhitungan</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <!-- /.card-header -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-daark"><i class="fa fa-table"></i> Nilai Batas Matriks (G)</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-white">
                                        <tr align="center">
                                            <th>Kode Kriteria</th>
                                            <th>Nama Kriteria</th>
                                            <th>Nilai Batas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($kriteria as $key){
                                                $nilai_g = $perhitungan_model->get_nilai_g($key->id_kriteria);
                                        ?>
                                            <tr align="center">
                                                <td><?= $key->kode_kriteria?></td>	
                                                <td><?= $key->keterangan?></td>	
                                                <td><?= $nilai_g['nilai'];?></td>	
                                            </td>
                                        <?php
                                            }
                                        ?>
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