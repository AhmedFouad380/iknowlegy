


  	/* AUTHOR LINK */
	  $('.about-me-img').hover(function(){
		$('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
	}, function(){
		$('.authorWindowWrapper').stop().fadeOut('fast').find('p').removeClass('trans');
	});

	$(".rating-component .star").on("mouseover", function () {
var onStar = parseInt($(this).data("value"), 10); //
$(this).parent().children("i.star").each(function (e) {
if (e < onStar) {
  $(this).addClass("hover");
} else {
  $(this).removeClass("hover");
}
});
}).on("mouseout", function () {
$(this).parent().children("i.star").each(function (e) {
$(this).removeClass("hover");
});
});

$(".rating-component .stars-box .star").on("click", function () {
var onStar = parseInt($(this).data("value"), 10);
var stars = $(this).parent().children("i.star");
var ratingMessage = $(this).data("message");

var msg = "";
if (onStar > 1) {
msg = onStar;
} else {
msg = onStar;
}
$('.rating-component .starrate .ratevalue').val(msg);



$(".fa-smile-wink").show();

$(".button-box .done").show();

if (onStar === 5) {
$(".button-box .done").removeAttr("disabled");
} else {
$(".button-box .done").attr("disabled", "true");
}

for (i = 0; i < stars.length; i++) {
$(stars[i]).removeClass("selected");
}

for (i = 0; i < onStar; i++) {
$(stars[i]).addClass("selected");
}

$(".status-msg .rating_msg").val(ratingMessage);
// $(".status-msg").html(ratingMessage);
$("[data-tag-set]").hide();
$("[data-tag-set=" + onStar + "]").show();
});

$(".feedback-tags  ").on("click", function () {
var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
choosedTagsLength = choosedTagsLength + 1;

if ($(this).hasClass("choosed")) {
$(this).removeClass("choosed");
choosedTagsLength = choosedTagsLength - 2;
} else {
$(this).addClass("choosed");
$(".button-box .done").removeAttr("disabled");
}

console.log(choosedTagsLength);

if (choosedTagsLength <= 0) {
$(".button-box .done").attr("enabled", "false");
}
});



$(".compliment-container .fa-smile-wink").on("click", function () {
$(this).fadeOut("slow", function () {
$(".list-of-compliment").fadeIn();
});
});



$(".done").on("click", function () {
$(".rating-component").hide();
$(".feedback-tags").hide();
$(".button-box").hide();
$(".submited-box").show();
$(".submited-box .loader").show();

setTimeout(function () {
$(".submited-box .loader").hide();
$(".submited-box .success-message").show();
}, 1500);
});


	$.fn.jQuerySimpleCounter = function( options ) {
	    var settings = $.extend({
	        start:  0,
	        end:    100,
	        easing: 'swing',
	        duration: 400,
	        complete: ''
	    }, options );

	    var thisElement = $(this);

	    $({count: settings.start}).animate({count: settings.end}, {
			duration: settings.duration,
			easing: settings.easing,
			step: function() {
				var mathCount = Math.ceil(this.count);
				thisElement.text(mathCount);
			},
			complete: settings.complete
		});
	};


$('#number1').jQuerySimpleCounter({end: 12,duration: 3000});
$('#number2').jQuerySimpleCounter({end: 55,duration: 3000});
$('#number3').jQuerySimpleCounter({end: 359,duration: 2000});
$('#number4').jQuerySimpleCounter({end: 246,duration: 2500});


    document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function(element){
                element.addEventListener('click', function (e) {
                    let nextEl = this.nextElementSibling;
                    if(nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        if(nextEl.style.display == 'block'){
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
// end if innerWidth
    });


