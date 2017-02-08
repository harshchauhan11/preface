	new WOW().init();
	$(document).foundation();
	$(document).ready(function() {
		var $timeline_block = $('#section4 .cd-timeline-block');

		$timeline_block.each(function(){
			if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
			}
		});

		$('#contact-details .parallax-overlay').height($('#contact-details').height());
		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});
		$("#submit").click(function (e) {
			e.preventDefault();            
			var name = $("#name").val(),
				email = $("#email").val(),
				phone = $("#phone").val(),
				comments = $("#comments").val();
			$.ajax({
				type: "POST",
				url: "contact_us.php",
				data: "name="+name+"&email="+email+"&phone="+phone+"&comments="+comments,
				success:function(response) {
					$("#message").html(response);
					$("#message").slideDown();
					$("#name,#email,#phone,#comments").val('');
				}
			});
		});
		$('#menu a').click(function(e) {
			e.preventDefault();
			$('#menu').parent().parent().animate({
				"bottom": "90%"
			}, 800, 'easeOutCirc');
			if($(this).html() == "about") {
				$("html, body").animate({ scrollTop: $('#section2').offset().top });
			} else if($(this).html() == "capabilities") {
				$("html, body").animate({ scrollTop: $('#section4').offset().top });
			} else if($(this).html() == "team") {
				$("html, body").animate({ scrollTop: $('#section5').offset().top });
			} else if($(this).html() == "contact") {
				$("html, body").animate({ scrollTop: $('#contact-details').offset().top });
//				$('#menu a').css("color","#000");
			}
		});
		$(document).on('scroll', function() {
			$timeline_block.each(function(){
				if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
					$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
				}
			});

/*
			if ( $(window).scrollTop() >= $('#section2').offset().top && $(window).scrollTop() < ($(window).height() + $('#section2').offset().top) ) {
				$('#menu ul li a').css({"color": "#333", "text-shadow": "none"});
				$('#menu ul li a[href="#section2"]').css({"color": "#e1e3e5", "text-shadow": "0px 0px 5px rgba(241,243,245,.3)"});
			} else if ( $(window).scrollTop() >= $('#section3').offset().top && $(window).scrollTop() < ($(window).height() + $('#section3').offset().top) ) {
				$('#nav02 ul li a').css({"color": "#555", "text-shadow": "none"});
				$('#nav02 ul li a[href="#section3"]').css({"color": "#000", "text-shadow": "0px 0px 5px rgba(0,0,0,.3)"});
			} else if ( $(window).scrollTop() >= $('#section4').offset().top && $(window).scrollTop() < ($(window).height() + $('#section4').offset().top) ) {
				$('#nav02 ul li a').css({"color": "#333", "text-shadow": "none"});
				$('#nav02 ul li a[href="#section4"]').css({"color": "#e1e3e5", "text-shadow": "0px 0px 5px rgba(241,243,245,.3)"});
			} else if ( $(window).scrollTop() >= $('#section5').offset().top && $(window).scrollTop() <= ($(window).height() + $('#section5').offset().top) ) {
				$('#nav02 ul li a').css({"color": "#333", "text-shadow": "none"});
				$('#nav02 ul li a[href="#section5"]').css({"color": "#e1e3e5", "text-shadow": "0px 0px 5px rgba(241,243,245,.3)"});
			} else if ( $(window).scrollTop() >= $('#contact-details').offset().top && $(window).scrollTop() <= ($(window).height() + $('#contact-details').offset().top) ) {
				$('#nav02 ul li a').css({"color": "#333", "text-shadow": "none"});
				$('#nav02 ul li a[href="#contact-details"]').css({"color": "#e1e3e5", "text-shadow": "0px 0px 5px rgba(241,243,245,.3)"});
			}
*/
			if ( $(window).scrollTop() >= $('#section2').offset().top ) {
				if ( $(window).scrollTop() >= $('#section2').offset().top && $(window).scrollTop() < ($(window).height() + $('#section2').offset().top) ) {
					$('#menu_li ul li a').removeClass('changed');
					$('#menu_li ul li a[href="#section2"]').addClass('changed');
//				} else if ( $(window).scrollTop() >= $('#section3').offset().top && $(window).scrollTop() < ($(window).height() + $('#section3').offset().top) ) {
//					$('#menu ul li a').removeClass('changed');
//					$('#menu ul li a[href="#section3"]').addClass('changed');
				} else if ( $(window).scrollTop() >= $('#section4').offset().top && $(window).scrollTop() < ($('#section4').height() + $('#section4').offset().top) ) {
//					$('#menu ul li a').css({"color": "#555"});
//					$('#menu ul li a[href="#section4"]').css({"color": "#e1e3e5", "text-shadow": "0px 0px 5px #1f8fd6"});
					$('#menu ul li a').removeClass('changed');
					$('#menu ul li a[href="#section4"]').addClass('changed');
				} else if ( $(window).scrollTop() >= $('#section7').offset().top && $(window).scrollTop() < ($('#section7').height() + $('#section7').offset().top) ) {
                    $('#menu ul li a').removeClass('changed');
					$('#menu ul li a[href="#section7"]').addClass('changed');
				} else if ( $(window).scrollTop() >= $('#section5').offset().top && $(window).scrollTop() < ($(window).height() + $('#section5').offset().top) ) {
					$('#menu ul li a').removeClass('changed');
					$('#menu ul li a[href="#section5"]').addClass('changed');
				} else if ( $(window).scrollTop() >= $('#contact-details').offset().top && $(window).scrollTop() < ($(window).height() + $('#contact-details').offset().top) ) {
					$('#menu ul li a').removeClass('changed');
					$('#menu ul li a[href="#contact-details"]').addClass('changed');
				}
				if ( ($('#section2').offset().top + 28) > $(window).scrollTop() ) {
					$("#menu").hide();
					$("#menu").removeClass("y-bottom-abs");
					$("#menu").css({"position": "fixed", "top": 0, "z-index": "2000", "background": "rgba(0,0,0,1)"});
					$("#menu").slideDown();
				} else {
//					$("#menu").css({"position": "fixed", "top": 0, "background": "rgba(0,0,0,.2)"});
					$("#menu a").css("color", "#f1f3f5");
				}
			} else {
				$("#menu").css({"position": "absolute", "bottom": 0, "top": "auto", "z-index": "2000", "background": "transparent"});
				$("#menu a").css("color", "#f1f3f5");
				$('#menu ul li a').removeClass('changed');
//				$("#nav02").css({"position": "relative", "top": 0, "background": "transparent"});
//				$("#nav02 a").css({"color": "#333", "text-shadow": "none"});
			}
		});
	});
