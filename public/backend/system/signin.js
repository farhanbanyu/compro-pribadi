$("#_loginForm").validate({
  rules: {
    email: { required: true, email: true }
  },
  submitHandler: function (form) {
    Swal.fire({
      text: 'Tunggu proses selesai',
      icon: 'warning',
      showCancelButton: false,
      showConfirmButton: false,
    });
    $.ajax({
      url: form.action,
      type: form.method,
      data: $(form).serialize(),
      success: function (e) {
        if (e.success) {
          window.location.href = e.url;
        }else{
          Swal.fire({
            title: (e.success == true) ? 'Berhasil!' : 'Gagal!',
            text: e.message,
            icon: (e.success == true) ? 'success' : 'error',
          });
        }
      },
      error: function(xhr, status, error) {
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
  }
});