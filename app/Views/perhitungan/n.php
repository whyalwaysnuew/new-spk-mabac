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
                        <!-- /.card-header -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-daark">
                                <i class="fa fa-table"></i> Normalisasi Matriks Keputusan (N)
                            </h6>
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
                                                $min_max=$perhitungan_model->get_max_min($key->id);
                                                if($min_max['jenis']=='Benefit'){
                                                    echo @(($data_pencocokan['nilai']-$min_max['min'])/($min_max['max']-$min_max['min']));
                                                }else{
                                                    echo @(($data_pencocokan['nilai']-$min_max['max'])/($min_max['min']-$min_max['max']));
                                                }
                                            ?>
                                            </td>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php
                                            $no++;
                                            endforeach ?>
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