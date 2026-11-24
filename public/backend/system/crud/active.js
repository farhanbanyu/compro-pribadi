const elementActive = document.currentScript.getAttribute('element');

$(`.activeForm`).submit(function(e){
  var id = $(this).data('id')
  swalWaiting()
  $.ajax({
    url: this.action,
    type: 'POST',
    data:{id},
    success: function (e) {
      Swal.close()
      if (!e.success) {
        Swal.fire({
          title: 'Gagal!',
          text: e.message,
          icon: 'error',
          showConfirmButton: false,
          timer: (e.success == true) ? 1500 : 10000
        });
      } else if (!elementActive) {
        if (e.active) {
          $(`#active-${id}`).addClass('btn-danger').removeClass('btn-success').html('<i class="fas fa-times"></i>&nbsp;&nbsp;Matikan')
        } else {
          $(`#active-${id}`).addClass('btn-success').removeClass('btn-danger').html('<i class="fas fa-check"></i>&nbsp;&nbsp;Aktifkan')
        }
      } else if(e.data.status === "publish"){
        $(`#action-${id}`).html(`<span class="badge bg-danger">Data sudah dipublish! <br />Tidak bisa melakan perubahan / hapus data.</span>`)
      }
    },
    error: function(xhr, status, error) {
      Swal.close()
      var err = eval("(" + xhr.responseText + ")");
      Swal.fire({
        title: 'Gagal!',
        text: err.message,
        icon: 'error',
        buttons: {
          cancel: "Tutup",
        },
      });
    }
  });
  return false
})
