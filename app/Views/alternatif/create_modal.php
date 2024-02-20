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
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Nama Alternatif</label>
                    <input autocomplete="off" type="text" name="nama" required class="form-control"/>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <!--begin::Actions-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary me-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success fw-bold" onclick="submitForm()">Submit</button>
            <!-- Button Like -->
            <!-- <button type="submit" class="btn btn-primary me-2" id="submitForm">
                <span class="indicator-label fw-bold">Submit</span>
            </button> -->
            <!-- End Button Like -->
        </div>
        <!--end::Actions-->
        
    </div>

</div>
<script>
    function submitForm()
    {
        var form = new FormData($('#inputForm')[0]);
        var target = base_url + 'alternatif/store';

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