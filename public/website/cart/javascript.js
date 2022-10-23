// payment Tabs
$(".cards .card").click(function () { // Add active class to active link
    $(this).addClass("active").siblings().removeClass("active");  // Hide all divs on click
    $(".action > div").hide();  //show div
    $('.' + $(this).data("class")).show();
    value = $(this).data('type');
    $("#type").val(value) ;

    //$('.action').slideUp();
    //$('.action').delay(0).slideDown();
    //$('.action').stop();
});

// hide show edit card
$('.editcardForm').on('click', function () {

    if ($('.editCard').hasClass('hide')) {
        $('.editCard').removeClass('hide') .addClass('show');
    } else {
        $('.editCard').addClass('hide').removeClass('show');
    }
});
