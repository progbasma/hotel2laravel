(function ($) {
    "use strict";
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
    //Preloader
    var win = $(window);
    win.on("load", function () {
        $(".tw-loader").delay(100).fadeOut("slow");
    });
	
	//Menu active
	var href = location.href;
	var elem = '.main-menu li a[href="' + href + '"]';
	
	$('ul.main-menu li').parent().removeClass('active');
	$('ul.main-menu li a').parent().removeClass('active');

	var parentClase = $(elem).parents();
	if (parentClase.length) {
		$(parentClase).addClass('active');
		$(elem).parent().addClass('active');
	}else{
		$(elem).addClass('active');
	}
	
    //ScrollToTop
    $(".scroll-to-top").scrollToTop(1000);

    //Header sticky
	win.on("scroll", function () {
		if ($(this).scrollTop() > 100) {
			$("#sticky-header").addClass("sticky");
			$("#sticky-menu").addClass("sticky");
		} else {
			$("#sticky-header").removeClass("sticky");
			$("#sticky-menu").removeClass("sticky");
		}
	});

    // Off Canvas Open close start
    $(".off-canvas-btn").on("click", function () {
        $(".mobile-menu-wrapper").addClass("open");
    });

    $(".offcanvas-btn-close, .off-canvas-overlay").on("click", function () {
        $(".mobile-menu-wrapper").removeClass("open");
    });

    // slide effect dropdown
    function dropdownAnimation() {
        $(".dropdown").on("show.bs.dropdown", function (e) {
            $(this)
                .find(".dropdown-menu")
                .first()
                .stop(true, true)
                .slideDown(500);
        });

        $(".dropdown").on("hide.bs.dropdown", function (e) {
            $(this)
                .find(".dropdown-menu")
                .first()
                .stop(true, true)
                .slideUp(500);
        });
    }

    dropdownAnimation();

    //offcanvas mobile menu start
    var $offCanvasNav = $(".mobile-menu"),
        $offCanvasNavSubMenu = $offCanvasNav.find(".dropdown");

    //Add Toggle Button With Off Canvas Sub Menu
    $offCanvasNavSubMenu
        .parent()
        .prepend('<span class="menu-expand"><i></i></span>');

    //Close Off Canvas Sub Menu
    $offCanvasNavSubMenu.slideUp();

    //Category Sub Menu Toggle
    $offCanvasNav.on("click", "li a, li .menu-expand", function (e) {
        var $this = $(this);
        if (
            $this
                .parent()
                .attr("class")
                .match(/\b(has-children-menu|has-children|has-sub-menu)\b/) &&
            ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
        ) {
            e.preventDefault();
            if ($this.siblings("ul:visible").length) {
                $this.parent("li").removeClass("active");
                $this.siblings("ul").slideUp();
            } else {
                $this.parent("li").addClass("active");
                $this
                    .closest("li")
                    .siblings("li")
                    .removeClass("active")
                    .find("li")
                    .removeClass("active");
                $this.closest("li").siblings("li").find("ul:visible").slideUp();
                $this.siblings("ul").slideDown();
            }
        }
    });

    //magnificPopup
    $(".popup-video").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        disableOn: 300,
    });
	
    //Testimonial slider
    $(".testimonial-slider").slick({
        rtl: isRTL,
        infinite: true,
        loop: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        margin: 24,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },{
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    //Room Details
    $(".pd-slider-for").slick({
        rtl: isRTL,
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: false,
        speed: 300,
        asNavFor: ".pd-slider-nav",
        arrows: false,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="bi bi-arrow-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="bi bi-arrow-right"></i></button>',
    });

    $(".pd-slider-nav").slick({
        rtl: isRTL,
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: ".pd-slider-for",
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        draggable: false,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="bi bi-arrow-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="bi bi-arrow-right"></i></button>',
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true,
                },
            },
        ],
    });
	
	$('.room_gallery_view').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1]
		}
	});
	
	//Subscribe for footer
	$(document).on("click", ".subscribe_btn", function(event) {
		event.preventDefault();

		var sub_email = $("#subscribe_email").val();
		var status = 'subscribed';
		
		var sub_btn = $('.sub_btn').html();
		var sub_recordid = '';
		
		var subscribe_email = sub_email.trim();
		
		if(subscribe_email == ''){
			$('.subscribe_msg').html('<p class="text-danger">The email address field is required.</p>');
			return;
		}
		
		$.ajax({
			type : 'POST',
			url: base_url + '/frontend/saveSubscriber',
			data: 'RecordId=' + sub_recordid+'&email_address='+subscribe_email+'&status='+status,
			beforeSend: function() {
				$('.subscribe_msg').html('');
				$('.sub_btn').html('<span class="spinner-border spinner-border-sm"></span> Please Wait...');
			},
			success: function (response) {			
				var msgType = response.msgType;
				var msg = response.msg;

				if (msgType == "success") {
					$("#subscribe_email").val('');
					$('.subscribe_msg').html('<p class="text-success">'+msg+'</p>');
				} else {
					$('.subscribe_msg').html('<p class="text-danger">'+msg+'</p>');
				}
				
				$('.sub_btn').html(sub_btn);
			}
		});
	});
	
})(jQuery);
