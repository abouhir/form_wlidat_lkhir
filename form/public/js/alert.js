function alertSuccess(message){
    Swal.fire({
        title : "" , 
        icon : "success" , 
        confirmButtonText: 'نعم' , 
        toast : true ,
       
        
    });
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
 
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: message
})
}


function alertUpdate(btnSubmit,formSubmit){
    btnSubmit.addEventListener("click",function(){
      console.log("voila");
        const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  });
  
   swalWithBootstrapButtons.fire({
    title: 'هل تريد فعلا التحديث',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'نعم , تحديث',
    cancelButtonText: 'لا, رجوع',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      formSubmit.submit();
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'لم يتم التحديث',
        '',
        'error'
      );
    
    }
  });
      });


}
function alertDelete(btnSubmit,formSubmit){
  btnSubmit.addEventListener("click",function(){
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

 swalWithBootstrapButtons.fire({
  title: 'هل تريد فعلا الحدف',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'نعم , حدف',
  cancelButtonText: 'لا, رجوع',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    formSubmit.submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'لم يتم الحدف',
      '',
      'error'
    );
  
  }
});
    });

}
