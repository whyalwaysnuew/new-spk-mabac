<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Perhitungan</h1>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-white">
                                        <tr align="center">
                                            <th width="5%">No</th>
                                            <th>Alternatif</th>
                                            <?php foreach ($kriteria as $key): ?>
                                            <th><?= $key->kode_kriteria ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach ($alternatif as $keys): ?>
                                        <tr align="center">
                                            <td><?= $no; ?></td>
                                            <td align="left"><?= $keys->nama ?></td>
                                            <?php foreach ($kriteria as $key): ?>
                                            <td>
                                            <?php 
                                                $data_pencocokan = $perhitungan_model->data_nilai($keys->id,$key->id);
                                                echo @$data_pencocokan['nilai'];
                                            ?>
                                            </td>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php
                                            $no++;
                                            endforeach
                                        ?>
                                        <tr align="center">
                                            <th colspan="2">MAX</th>
                                            <?php
                                                foreach ($kriteria as $key){
                                                    $min_max=$perhitungan_model->get_max_min($key->id);
                                            ?>
                                                <td><?= $min_max['max']; ?></td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                        <tr align="center">
                                            <th colspan="2">MIN</th>
                                            <?php
                                                foreach ($kriteria as $key){
                                                    $min_max=$perhitungan_model->get_max_min($key->id);
                                            ?>
                                                <td><?= $min_max['min']; ?></td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
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