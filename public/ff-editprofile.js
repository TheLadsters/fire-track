
$.ajaxSetup({
  headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  }
});

$(function(){

 /* UPDATE USER PERSONAL INFO */


//change profile info
 $('#UserInfoForm').on('submit', function(e){
     e.preventDefault();

     $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success:function(data){
             if(data.status == 0){
               $.each(data.error, function(prefix, val){
                 $('span.'+prefix+'_error').text(val[0]);
               });
             }else{
               $('.user_name').each(function(){
                  $(this).html( $('#UserInfoForm').find( $('input[name="fname"]'), $('input[name="lname"]')  ).val() );
               });
               Swal.fire({
                 title: data.msg,
                 icon: "success",
                 confirmButtonText: "OK",
                
               });
             }
            
        }
     });
 });

//change password
$('#changePasswordFirefighterForm').on('submit', function(e){
  e.preventDefault();

  $.ajax({
     url:$(this).attr('action'),
     method:$(this).attr('method'),
     data:new FormData(this),
     processData:false,
     dataType:'json',
     contentType:false,
     beforeSend:function(){
       $(document).find('span.error-text').text('');
     },
     success:function(data){
       if(data.status == 0){
         $.each(data.error, function(prefix, val){
           $('span.'+prefix+'_error').text(val[0]);
         });
       }else{
         $('#changePasswordFirefighterForm')[0].reset();
         Swal.fire({
           title: data.msg,
           icon: "success",
           confirmButtonText: "OK",
         });
       }
     }
  });
});



})  