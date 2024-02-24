<div class="modal-content border-dashed border-gray-400">
    <div class="modal-header">
        <h4 class="modal-title">Upload Data SubKriteria <?= @$id; ?></h4>
        <!--begin::Close-->
        <!-- <div class="btn btn-sm btn-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </div> -->
        <!--end::Close-->
    </div>

    <!-- <form id="createForm" class="form" enctype="multipart/form-data"> -->
        <div class="modal-body">
            <form id="dropzone" method="POST" class="dropzone rounded bg-light d-flex justify-content-center">
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
            </form>
        </div>
    
        <div class="modal-footer">
            <!--begin::Actions-->
            <div class="d-flex justify-content-center">
                <a href="<?= base_url('./uploads/template/template_data_sub_kriteria.xlsx') ?>" target="_blank" download class="btn btn-primary me-2 fw-bold">Download Template</a>
                <a href="<?= base_url('/subkriteria'); ?>" class="btn btn-danger fw-bold" >Close</a>
            </div>
            <!--end::Actions-->
            
        </div>
    <!-- </form> -->

</div>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
        var myDropzone = new Dropzone("#dropzone", {
            url: base_url + "subkriteria/upload",
            acceptedFiles: ".xls, .xlsx",
            addRemoveLinks: true,
            maxFilesize: 10,
            dictDefaultMessage: "Drop your Excel file here or click to upload",
            sending: function (file, xhr, formData) {
                formData.append('id_kriteria', <?= @$id_kriteria; ?>);
            },
            success: function (file, response) {
                Swal.fire(
                    "Success!",
                    response.id_kriteria + response.message,
                    "success"
                );
            },
            error: function (file, response) {
                Swal.fire(
                    "Error!",
                    response,
                    "error"
                );
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