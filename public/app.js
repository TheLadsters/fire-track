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