<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Perhitungan</h1>
                        <div class="d-flex">
                            <a href="<?= base_url('perhitungan/download'); ?>" target="_blank" class="btn btn-success shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> 
                                Download
                            </a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <!-- /.card-header -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-white">
                                        <tr align="center">
                                            <th>Alternatif</th>
                                            <th>Nilai</th>
                                            <th width="15%">Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach ($hasil as $keys): ?>
                                        <tr align="center">
                                            <td align="left">
                                                <?php
                                                $nama_alternatif = $perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
                                                echo $nama_alternatif['nama'];
                                                ?>
                                            
                                            </td>
                                            <td><?= $keys->nilai ?></td>
                                            <td><?= $no; ?></td>
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

<?= $this->endSection(); ?>