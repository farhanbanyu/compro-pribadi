const getCkeditor = document.currentScript.getAttribute('ckeditor');
const ckeditor = getCkeditor.split(",")
  
$('._form').submit(function(e){
  swalWaiting()
  var formData = new FormData(this)

  if (getCkeditor) {
    for (let i = 0; i < ckeditor.length; i++) {
      formData.append(ckeditor[i], editorDocument[`ck_val_${ckeditor[i]}`].getData());
    }
  }

  $.ajax({
    url : this.action,
    type : "POST",
    data : formData,
    processData : false,
    contentType : false,
    cache : false,
    success: function (e) {
      console.log(e);
      Swal.close()
      Swal.fire({
        title: (e.success == true) ? 'Berhasil!' : 'Gagal!',
        text: e.message,
        icon: (e.success == true) ? 'success' : 'error',
        buttons: {
          cancel: "Tutup",
        },
      });
      if(e.url){
        window.location.replace(e.url)
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
  return false;
})
