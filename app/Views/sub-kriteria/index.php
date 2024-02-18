<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Sub Kriteria</h1>
                        <div class="d-flex">
                            <a href="<?= base_url('/kriteria/create'); ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> 
                                Create
                            </a>
                        </div>
                    </div>


                    <?php if(@$kriteria) {?>
                        <?php foreach($kriteria as $item) {?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 align-items-center justify-content-between d-flex">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $item->keterangan . ' ' . '(' . $item->kode_kriteria . ')'; ?></h6>
                                <button type="button" class="btn btn-success" onclick="getModalUpload('<?= $item->id ?>')">Upload</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped w-100" id="dataTableKriteria" cellspacing="0">
                                        <thead class="fw-bold">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Deskripsi</th>
                                                <th>Nilai</th>
                                                <th class="text-center" data-orderable="false" data-searchable="false">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php if(@$subkriteria) { ?>
                                                <?php $counter = 1; ?>
                                                <?php foreach($subkriteria as $no => $data) {?>
                                                <?php if($item->id == $data->id_kriteria) {?>
                                                    
                                                    <tr>
                                                        <td class="text-center"><?= $counter++; ?></td>
                                                        <td><?= $data->deskripsi; ?></td>
                                                        <td><?= $data->nilai; ?></td>
                                                        <td class="text-center align-middle">
                                                            <a href="<?= base_url('/kriteria/edit/') . $data->id; ?>" type="button" class="btn btn-warning btn-sm" title="Edit">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            
                                                            <button id="removeKriteria" data-id="<?= $data->id; ?>" type="button" class="btn btn-danger btn-sm" title="Delete">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                            <?php }}} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php }}?>

                </div>
                <!-- /.container-fluid -->

            <!-- begin::Modal -->
            <div class="modal fade" id="Modal" data-backdrop="static" tabindex="-1" role="dialog" data-bs-keyboard="false" data-bs-backdrop="static">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document" id="contentModal"></div>
            </div>
            <!-- end::Modal -->

<?= $this->endSection(); ?>