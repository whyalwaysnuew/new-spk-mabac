<div class="modal-content border-dashed border-gray-400">
    <div class="modal-header">
        <h4 class="modal-title">Tambah Data Alternatif</h4>
        <!--begin::Close-->
        <div class="btn btn-sm btn-secondary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div>
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <form id="inputForm" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" value="<?= $kriteria->id_kriteria; ?>">
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Kode Kriteria</label>
                    <input autocomplete="off" type="text" name="kode_kriteria" value="<?= $kriteria->kode_kriteria; ?>" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Nama Kriteria</label>
                    <input autocomplete="off" type="text" name="keterangan" value="<?= $kriteria->keterangan; ?>" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Bobot Kriteria</label>
                    <input autocomplete="off" type="number" step="0.001" name="bobot" value="<?= $kriteria->bobot; ?>" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Jenis Kriteria</label>
                    <select name="jenis" class="form-control" required>
                        <option value="" disabled>--Pilih Jenis Kriteria--</option>
                        <option value="Benefit" <?= $kriteria->jenis == 'Benefit' ? 'selected' : ''; ?>>Benefit</option>
                        <option value="Cost" <?= $kriteria->jenis == 'Cost' ? 'selected' : ''; ?>>Cost</option>						
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <!--begin::Actions-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary me-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="submitButton" class="btn btn-success fw-bold" onclick="submitForm()">Update</button>
        </div>
        <!--end::Actions-->
        
    </div>

</div>
<script>
    function submitForm()
    {
        var form = new FormData($('#inputForm')[0]);
        var target = base_url + 'kriteria/update';

        $('#submitButton').html('<i class="fas fa-circle-notch fa-spin mr-2"></i>Please wait...').prop("disabled", true);

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
                    );
                } 

                $('#submitButton').html('Submit').prop("disabled", false);
            },
            error: () => {
                console.log('Error Processing data');
                $('#submitButton').html('Submit').prop("disabled", false);
            }
        });
    }
</script>