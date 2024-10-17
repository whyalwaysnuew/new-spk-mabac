function submitForm() {
  var form = new FormData($("#inputForm")[0]);
  var target = base_url + "auth/login";
  var username = $('#username').val();
  var password = $('#password').val();

  $("#submitButton")
    .html('<i class="fas fa-circle-notch fa-spin mr-2"></i>Please wait...')
    .prop("disabled", true);

  if (username && password) {
    $.ajax({
      url: target,
      method: "POST",
      data: form,
      processData: false,
      contentType: false,
      dataType: "json",
      success: (result) => {
        if (result.response == 200) {
          Swal.fire("Authentication Success!", result.message, "success");

          window.setTimeout(() => {
            window.location.href = base_url;
          }, 2000);
        } else {
          Swal.fire("Authentication Failed!", result.message, "error");
        }
      },
      complete: () => {
        $("#submitButton")
          .html(
            'Login'
          )
          .prop("disabled", false);
      },
      error: () => {
        Swal.fire("Error!", "Something went wrong. Please try again.", "error");
      },
    });
  } else {
    Swal.fire("Error!", "Required Username and Password.", "error");

    $("#submitButton")
      .html('Login')
      .prop("disabled", false);
  }
}
