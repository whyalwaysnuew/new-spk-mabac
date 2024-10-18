function submitForm(){
    var form = new FormData($("#inputForm")[0]);
    var target = base_url + "profile/update";

    $.ajax({
      url: target,
      method: "POST",
      dataType: "json",
      data: form,
      processData: false,
      contentType: false,
      success: (result) => {
        if (result.response == 200) {
          Swal.fire("Success!", result.message, "success").then((result) => {
            location.reload();
          });
        } else {
          Swal.fire("Error!", result.message, "error");
        }
      },
      error: () => {
        console.log("Error Processing data");
      },
    });
}