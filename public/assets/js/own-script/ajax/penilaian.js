function modalInput(id) {
  let id_alternatif = id;

  $.ajax({
    url: base_url + "penilaian/modalInput",
    type: "GET",
    data: {id: id_alternatif},
    success: (response) => {
      // console.log(response);
      $("#Modal").modal("show");
      $("#contentModal").html(response);
    },
  });
}

function modalEdit(id) {
  let id_alternatif = id;

  $.ajax({
    url: base_url + "penilaian/modalEdit",
    type: "GET",
    data: {id: id_alternatif},
    success: (response) => {
      // console.log(response);
      $("#Modal").modal("show");
      $("#contentModal").html(response);
    },
  });
}

function getModalUpload() {
  $.ajax({
    url: base_url + "penilaian/getModalUpload",
    type: "GET",
    success: (result) => {
      $("#Modal").modal("show"), $("#contentModal").html(result);
    },
  });
}

$("#buttonDownload").on("click", function () {
  $("#buttonDownload")
    .html('<i class="fas fa-circle-notch fa-spin mr-2"></i>Please wait...')
    .prop("disabled", true);

  $.ajax({
    url: base_url + "penilaian/download",
    method: "GET",
    success: function () {
      $("#buttonDownload")
        .html('<i class="fas fa-download mr-2"></i>Download')
        .prop("disabled", false);
    },
    error: function () {
      Swal.fire("Error!", "Something went wrong! Please try again.", "error");
      $("#buttonDownload")
        .html('<i class="fas fa-download mr-2"></i>Download')
        .prop("disabled", false);
    },
  });
});
