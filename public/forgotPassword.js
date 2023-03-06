$(document).ready(function() {

    $(".send-passlink").click(function(e){

        Swal.fire({
            title: 'Sending Password Link',
            text: 'Please Wait...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
              }
        });

    });

    if($("#email_sent").length){
        Swal.fire({
            title: 'Reset Password Link Sent Successfully!',
            icon: 'success',
            confirmButtonText: 'Okay'
          })
    }

});
