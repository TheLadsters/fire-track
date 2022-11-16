////////// JS FOR LOGIN PAGE //////////

// code for movement of text for username password in login page
$(function() {
	'use strict';
	
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value) {
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});

});
// end of code for movement of text for username password in login page

// (temporary) code for login button to redirect to main page
$('.btn-submit').on('click', function(e){
    e.preventDefault();

    if($('.form-group #signInUsernameInput').val() == "admin"){
        window.location.href = "http://127.0.0.1:8000/user-management-user";

    }
    else if($('.form-group #signInUsernameInput').val() == "firefighter"){
        window.location.href = "http://127.0.0.1:8000/edit-profile";

    }
    else{
        window.location.href = "http://127.0.0.1:8000/edit-profile";

    }
    
});
// end of (temporary) code for login button to redirect to main page


////////// END OF JS FOR LOGIN PAGE //////////





////////// CODE FOR SIDEBAR //////////

// code for checking current site and highlighting sidebar
$(function() {
    // this will get the full URL at the address bar
    let url = window.location.href;

    $(".nav .nav_list a").each(function() {
        // checks if its the same on the address bar
        if (url == (this.href)) {
            $(this).closest("a").addClass("active");
        }
    });
}); 

document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });

// code for when smaller screen size, remove drop downs
jQuery(document).ready(function($) {
        var alterClass = function() {
          var ww = document.body.clientWidth;
          if (ww < 768) {
            $('#dropdown-user').removeClass('dropdown-container-user');
            $('#dropdown-firealert').removeClass('dropdown-container-firealert');
          } else if (ww >= 768) {
            $('#dropdown-user').addClass('dropdown-container-user');
            $('#dropdown-firealert').addClass('dropdown-container-firealert');
          };
        };
        $(window).resize(function(){
          alterClass();
        });
        //Fire it when the page first loads:
        alterClass();
      });


$('.dropdown-btn-user').click(function(){
    if($('.dropdown-container-user').hasClass('d-none')){
        $('.dropdown-container-user').removeClass('d-none');
        $('.dropdown-container-user').addClass('d-block');
    }
    else{
        $('.dropdown-container-user').removeClass('d-block');
        $('.dropdown-container-user').addClass('d-none');
    }

})

$('.dropdown-btn-hydrant').click(function(){
    if($('.dropdown-container-firealert').hasClass('d-none')){
        $('.dropdown-container-firealert').removeClass('d-none');
        $('.dropdown-container-firealert').addClass('d-block');
    }
    else{
        $('.dropdown-container-firealert').removeClass('d-block');
        $('.dropdown-container-firealert').addClass('d-none');
    }

})

////////// END OF CODE FOR SIDEBAR //////////


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


////////// CODE FOR EDIT PROFILE PAGE //////////

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
    // END OF SHOW UPLOADED IMAGE CODE

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
  

  $('#changePass').on('click', function () {
    $('#ChangePasswordModal').modal('show');
  })  





////////// END CODE FOR EDIT PROFILE PAGE //////////


