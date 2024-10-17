new DataTable("#dataTableAlternatif");

$(document).on("click", "#removeAlternatif", function () {
  var id = $(this).attr("data-id");
  // console.log(id);
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    reverseButtons: false,
    buttonsStyling: true,
    customClass: {
      confirmButton: "btn btn-danger",
      cancelButton: "btn btn-primary",
    },
  }).then((result) => {
    // console.log(result);
    if (result.isConfirmed == true) {
      deletedata(id);
    } else if (result.dismiss === "cancel") {
      Swal.fire({
        title: "Cancelled",
        text: "Your data is safe!",
        icon: "error",
        customClass: {
          confirmButton: "btn btn-primary",
        },
      });
    }
  });
});

function deletedata(id) {
  $.ajax({
    method: "GET",
    url: base_url + "/alternatif/delete?id=" + id,
  }).done(function (data) {
    Swal.fire(
      "Deleted!",
      "Your data is deleted from the servers",
      "success"
    ).then((result) => {
      location.reload();
    });
  });
}

function getModalUpload() {
  $.ajax({
    url: base_url + "alternatif/getModalUpload",
    type: "GET",
    success: (result) => {
      $("#Modal").modal("show"), $("#contentModal").html(result);
    },
  });
}

function getModalCreate() {
  $.ajax({
    url: base_url + "alternatif/getModalCreate",
    type: "GET",
    success: (result) => {
      $("#Modal").modal("show"), $("#contentModal").html(result);
    },
  });
}

function getModalEdit(id) {
  $.ajax({
    url: base_url + "alternatif/getModalEdit/" + id,
    type: "GET",
    success: (result) => {
      $("#Modal").modal("show"), $("#contentModal").html(result);
    },
  });
}