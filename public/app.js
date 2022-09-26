// code for highlighting when clicking sidebar options
$('.sidebar ul li').on('click', function(){
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
})

// code for open and closing sidebar
$('.open-btn').on('click', function(){
    $('.sidebar').addClass('active');
});

$('.close-btn').on('click', function(){
    $('.sidebar').removeClass('active');
});
// end of code



// forgot password modal start
$('#forgotPassword').on('click', function () {
    $('#forgetPasswordModal').modal('show');
  })

$('#dismissX').on('click', function () {
    $('#forgetPasswordModal').modal('hide');
  })

$('#forgotPassword').on('click', function () {
    $('#forgetPasswordModal').modal('show');
}) 
// end of forgot password modal code



// start of editprofile code

// code for hiding/unhiding passwords
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(e) {
        e.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_password i').addClass( "bi bi-eye" );
        }
    });

    $("#show_hide_current_password a").on('click', function(e) {
        e.preventDefault();
        if($('#show_hide_current_password input').attr("type") == "text"){
            $('#show_hide_current_password input').attr('type', 'password');
            $('#show_hide_current_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_current_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_current_password input').attr("type") == "password"){
            $('#show_hide_current_password input').attr('type', 'text');
            $('#show_hide_current_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_current_password i').addClass( "bi bi-eye" );
        }
    });

    $("#show_hide_new_password a").on('click', function(e) {
        e.preventDefault();
        if($('#show_hide_new_password input').attr("type") == "text"){
            $('#show_hide_new_password input').attr('type', 'password');
            $('#show_hide_new_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_new_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_new_password input').attr("type") == "password"){
            $('#show_hide_new_password input').attr('type', 'text');
            $('#show_hide_new_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_new_password i').addClass( "bi bi-eye" );
        }
    });


    $("#show_hide_repeat_new_password a").on('click', function(e) {
        e.preventDefault();
        if($('#show_hide_repeat_new_password input').attr("type") == "text"){
            $('#show_hide_repeat_new_password input').attr('type', 'password');
            $('#show_hide_repeat_new_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_repeat_new_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_repeat_new_password input').attr("type") == "password"){
            $('#show_hide_repeat_new_password input').attr('type', 'text');
            $('#show_hide_repeat_new_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_repeat_new_password i').addClass( "bi bi-eye" );
        }
    });
});

// SHOW UPLOADED IMAGE
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});
// END OF UPLOAD IMG

$('#resetPasswordBtn').on('click', function () {
    $('#changePasswordModal').modal('show');
  })

  $('#dismissX').on('click', function () {
    $('#changePasswordModal').modal('hide');
  })

  $('#dismissX2').on('click', function () {
    $('#forgetPasswordModal').modal('hide');
  })

  $('#forgotPassLink').on('click', function () {
    $('#changePasswordModal').modal('hide');
    $('#forgetPasswordModal').modal('show');
  })  


// end of editprofile code


