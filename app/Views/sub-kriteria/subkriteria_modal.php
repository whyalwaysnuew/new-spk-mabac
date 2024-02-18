<div class="modal-content border-dashed border-gray-400">
    <div class="modal-header">
        <h4 class="modal-title">Upload Data SubKriteria <?= @$id; ?></h4>
        <!--begin::Close-->
        <div class="btn btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div>
        <!--end::Close-->
    </div>

    <!-- <form id="createForm" class="form" enctype="multipart/form-data"> -->
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
                <button type="button" class="btn btn-danger me-2 fw-bold" data-bs-dismiss="modal">Close</button>
                <!-- Button Like -->
                <button type="submit" class="btn btn-primary me-2" id="submitForm">
                    <!--begin::Indicator labellabel-->
                    <span class="indicator-label fw-bold">Submit</span>
                </button>
                <!-- End Button Like -->
            </div>
            <!--end::Actions-->
            
        </div>
    <!-- </form> -->

</div>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        var myDropzone = new Dropzone("#dropzone", {
            url: base_url + "subkriteria/upload?id=" + <?= @$id; ?>,
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

                // console.log(response);
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
                url: base_url + "subkriteria/removeFile",
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