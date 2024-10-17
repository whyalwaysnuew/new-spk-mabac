<div class="modal-content border-dashed border-gray-400">
    <div class="modal-header">
        <h4 class="modal-title">Tambah Data User</h4>
        <!--begin::Close-->
        <div class="btn btn-sm btn-secondary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div>
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <form id="inputForm" method="post" enctype="multipart/form-data">
            <div class="row">

                <input autocomplete="off" type="hidden" name="id_user" value="<?= $user->id_user; ?>" required class="form-control" required/>
                
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Nama</label>
                    <input autocomplete="off" type="text" name="nama" value="<?= $user->nama; ?>" required class="form-control" placeholder="e.g. Hafidz Fadhillah" required/>
                </div>
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Username</label>
                    <input autocomplete="off" type="text" name="username" value="<?= $user->username; ?>" required class="form-control" placeholder="e.g. hadizfadhillah" required/>
                </div>
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Email</label>
                    <input autocomplete="off" type="text" name="email" value="<?= $user->email; ?>" required class="form-control" placeholder="e.g. hafidz@gmail.com" required/>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="id_level">Level</label>
                    <select name="id_level" class="form-control" id="id_level" required>
                        <option value="" selected disabled>--Pilih--</option>
                        <?php if(@$levels){ ?>
                            <?php foreach ($levels as $key => $level) { ?>
                                <option value="<?= $level->id_user_level; ?>" <?= $level->id_user_level == $user->id_user_level ? 'selected' : ''; ?>><?= @$level->user_level; ?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Password</label>
                    <input autocomplete="off" type="password" name="password" required class="form-control" placeholder="******" required/>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <!--begin::Actions-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary me-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success fw-bold" onclick="submitForm()">Update</button>
        </div>
        <!--end::Actions-->
    </div>

</div>
<script>
    function submitForm()
    {
        var form = new FormData($('#inputForm')[0]);
        var target = base_url + 'user/update';

        $.ajax({
            url: target, 
            method: 'POST',
            dataType: 'json',
            data: form,
            processData: false,
            contentType: false,
            success: (result) => {
                if (result.response == 200) {
                    Swal.fire(
                        "Success!",
                        result.message,
                        "success"
                    ).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.fire(
                        "Error!",
                        result.message,
                        "error"
                    )
                }
            },
            error: () => {
                console.log('Error Processing data');
            }
        });
    }
</script>