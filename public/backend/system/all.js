function readURL(input, element){
  if(input.files && input.files[0]){
    $(`#${element[1]}`).remove();
    const reader = new FileReader();
    reader.onload = function(e){
      $(`#${element[0]}`).after(`<div id="${element[1]}"><img src="${e.target.result}" style="margin-top: 10px;width:200px;height:auto"></div>`);
    }
    reader.readAsDataURL(input.files[0])
  }
}

$(`#file`).change(function(){
  readURL(this, ['file', 'preview'])
})

$(`#file2`).change(function(){
  readURL(this, ['file2', 'preview2'])
})
$(`#file3`).change(function(){
  readURL(this, ['file3', 'preview3'])
})

const swalWaiting = () => {
  Swal.fire({
    text: 'Tunggu proses selesai',
    icon: 'question',
    iconHtml: '<i class="fas fa-hourglass-half"></i>',
    showCancelButton: false,
    showConfirmButton: false,
  });
};