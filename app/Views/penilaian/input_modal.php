<div class="modal-content border-dashed border-gray-400">    
    <div class="modal-header">
        <h4 class="modal-title">Input Penilaian</h4>
        <!--begin::Close-->
        <div class="btn btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div>
        <!--end::Close-->
    </div>
    
    <form id="inputForm" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <?php foreach ($kriteria as $key): ?>
            <?php 
            $sub_kriteria = $penilaian_model->data_sub_kriteria($key->id_kriteria);
            ?>
            <?php if ($sub_kriteria!=NULL): ?>
            <input type="text" name="id_alternatif" value="<?= $id ?>" hidden>
            <input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
            <div class="form-group">
                <label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
                <select name="nilai[]" class="form-control" id="<?= $key->id_kriteria ?>" required>
                    <option value="">--Pilih--</option>
                    <?php foreach ($sub_kriteria as $subs_kriteria): ?>
                    <option value="<?= $subs_kriteria['id_sub_kriteria'] ?>"><?= $subs_kriteria['deskripsi'] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            <button type="button" onclick="formSubmit()" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <!-- <button type="submit" class="btn btn-primary">Test</button> -->
        </div>
    </form>
</div>

<script>
    function formSubmit() {
        var form = new FormData($('#inputForm')[0]);
        var target = base_url + 'penilaian/store';

        $.ajax({
            url: target, 
            method: 'POST',
            dataType: 'json',
            data: form,
            processData: false,
            contentType: false,
            success: (result) => {
                if (result.response == 200) {
                    console.log(result);
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