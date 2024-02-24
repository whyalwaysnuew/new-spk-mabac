<div class="modal-content border-dashed border-gray-400">
    <div class="modal-header">
        <h4 class="modal-title">Upload Data Alternatif</h4>
        <!--begin::Close-->
        <!-- <div class="btn btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div> -->
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <div id="dropzone" class="dropzone rounded bg-light d-flex justify-content-center">
            <!--begin::Message-->
            <div class="dz-message needsclick">
                <i class="ki-duotone ki-file-up fs-3x text-primary">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>

                <!--begin::Info-->
                <div class="ms-4">
                    <h3 class="h6 font-weight-bold mb-1">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>
                        Drop file here or click to upload.
                    </h3>
                    <span class="h6 font-weight-bold text-gray-400">Upload 1 file</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <!--begin::Actions-->
        <div class="d-flex justify-content-center">
            <a href="<?= base_url('/public/uploads/template/template_data_alternatif.xlsx'); ?>" download class="btn btn-primary fw-bold me-2">Download Template</a>
            <a href="<?= base_url('/alternatif'); ?>" class="btn btn-danger fw-bold" >Close</a>
        </div>
        <!--end::Actions-->
        
    </div>

</div>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        var myDropzone = new Dropzone("#dropzone", {
            url: base_url + "alternatif/upload",
            acceptedFiles: ".xls, .xlsx",
            addRemoveLinks: true,
            maxFilesize: 10,
            dictDefaultMessage: "Drop your Excel file here or click to upload",
            success: function (file, response) {
                Swal.fire(
                    "Success!",
                    response.message,
                    "success"
                )

                console.log(response);
                // alert(response.message);
            },
            error: function (file, response) {
                // console.log(response);
                Swal.fire(
                    "Error!",
                    response,
                    "error"
                )
                // alert(response.message);
            }
        });

        myDropzone.on("removedfile", function (file) {
            // Handle file removal here
            $.ajax({
                type: "POST",
                url: base_url + "alternatif/removeFile",
                data: { filename: file.name },
                success: function (response) {
                    // console.log(response);
                    if(response.status == 'error')
                    {
                        Swal.fire(
                            "Error!",
                            response.message,
                            "error"
                        )
                    } else {
                        Swal.fire(
                            "Success!",
                            response.message,
                            "success"
                        )
                    }
                    // alert(response.message);
                },
                error: function (response) {
                    console.log(response);
                    Swal.fire(
                        "Error!",
                        'Something went wrong!',
                        "error"
                    )
                    // alert("Error removing the file.");
                }
            });
        });
    });
</script>