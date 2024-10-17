<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User</h1>
                        <button type="button" onclick="getModalCreate()" class="btn btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> 
                            Create
                        </button>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="dataTableUser" cellspacing="0">
                                    <thead class="fw-bold">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th class="text-center" data-orderable="false" data-searchable="false">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if(@$users) { ?>
                                        <?php foreach($users as $no => $user) {?>
                                            <tr>
                                                <td class="text-center"><?= $no+1; ?></td>
                                                <td><?= $user->nama; ?></td>
                                                <td><?= $user->email; ?></td>
                                                <td><?= $user->username; ?></td>
                                                <td><?= $user->user_level; ?></td>
                                                <td class="text-center align-middle">
                                                    <button type="button" onclick="getModalEdit('<?= $user->id_user; ?>')" class="btn btn-warning btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    
                                                    <button id="removeUser" data-id="<?= $user->id_user; ?>" type="button" class="btn btn-danger btn-sm" title="Delete">
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