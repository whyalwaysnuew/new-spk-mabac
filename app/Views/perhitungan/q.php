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
                            <h6 class="m-0 font-weight-bold text-daark"><i class="fa fa-table"></i> Matriks jarak alternatif dari daerah perkiraan perbatasan (Q)</h6>
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
                                            <th>Total Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $perhitungan_model->hapus_hasil();
                                            $no=1;
                                            foreach ($alternatif as $keys): ?>
                                        <tr align="center">
                                            <td><?= $no; ?></td>
                                            <td align="left"><?= $keys->nama ?></td>
                                            <?php
                                            $t_q = 0;
                                            foreach ($kriteria as $key): ?>
                                            <td>
                                            <?php 
                                                $nilai_b = $perhitungan_model->get_nilai_v($keys->id_alternatif,$key->id_kriteria);
                                                $nilai_g = $perhitungan_model->get_nilai_g($key->id_kriteria);
                                                echo $n_q = $nilai_b['nilai']-$nilai_g['nilai'];
                                                $t_q += $n_q;
                                            ?>
                                            </td>
                                            <?php endforeach;
                                            $hasil_akhir = [
                                                'id_alternatif' => $keys->id_alternatif,
                                                'nilai' => $t_q
                                            ];
                                            $perhitungan_model->insert_nilai_hasil($hasil_akhir);
                                            ?>
                                            <td><?=$t_q; ?></td>
                                        </tr>
                                        <?php
                                            $no++;
                                            endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>