$(document).ready(function(){

$('#sidebarAlertBurger').click(function(){

    $('.container-firealert .right-sidebar').width("20%");
    $('.container-firealert #sidebarAlertBurger').hide();
    $('.right-sidebar .top-details').show();
    $('.right-sidebar .middle-details').show();
    $('.right-sidebar .bottom-details').show();
    $('.right-sidebar .hamburger').show();
});

$('#sidebarHydrantBurger').click(function(){

    $('.container-hydrant .right-sidebar-hydrant').width("20%");
    $('.container-hydrant #sidebarHydrantBurger').hide();
    $('.right-sidebar-hydrant .top-details-hydrant').show();
    $('.right-sidebar-hydrant .middle-details-hydrant').show();
    $('.right-sidebar-hydrant .bottom-details-hydrant').show();
    $('.right-sidebar-hydrant .hamburger-hydrant').show();
});


$('.right-sidebar .hamburger').click(function(){
    $('.container-firealert .right-sidebar').width("0");
    $('.container-firealert #sidebarAlertBurger').show();

    $('.right-sidebar .top-details').hide();
    $('.right-sidebar .middle-details').hide();
    $('.right-sidebar .bottom-details').hide();

    $('.right-sidebar .hamburger').hide();
});

$('.right-sidebar-hydrant .hamburger-hydrant').click(function(){
    $('.container-hydrant .right-sidebar-hydrant').width("0");
    $('.container-hydrant #sidebarHydrantBurger').show();

    $('.right-sidebar-hydrant .top-details-hydrant').hide();
    $('.right-sidebar-hydrant .middle-details-hydrant').hide();
    $('.right-sidebar-hydrant .bottom-details-hydrant').hide();

    $('.right-sidebar .hamburger-hydrant').hide();
});

});

