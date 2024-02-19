function modalInput(id)
{
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

function modalEdit(id)
{
    let id_alternatif = id;

    $.ajax({
        url: base_url + "penilaian/modalEdit",
        type: 'GET',
        data: {id: id_alternatif},
        success: (response) => {
            // console.log(response);
            $('#Modal').modal('show');
            $('#contentModal').html(response)
        }
    });
}