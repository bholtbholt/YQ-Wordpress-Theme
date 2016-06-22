webshim.setOptions("forms", {
	lazyCustomMessages: true,
	customDatalist: "auto",
	list: {
		"filter": "^"
	}
});
webshim.polyfill('forms');

jQuery(document).ready(function($) {
	// Fade In/Up Hero Message
	fadeInAndUp('.hero-message',50,600);


	// Mailto Anti Spam logic
	// Use: <a class="mailto" data-domain="youneeq.ca" data-prefix="info" ></a>
  $('.mailto').each(function() {
      prefix = $(this).data('prefix');
      domain = $(this).data('domain');
      $(this).attr('href', 'mailto:'+prefix+'@'+domain).append(prefix+'@'+domain);
  });


	// Auto Hide FAQ Answer
	$('.faq-answer').hide();


	// Open FAQs
	$('.faq-question').click(function(event){
		event.preventDefault();
		answer = $(this).siblings('.faq-answer').html();
		$('#faq-answer-box').fadeTo(200, 0, function () {
	    $(this).delay(200);
	    $(this).html(answer);
	    $(this).fadeTo(200, 1);
		});
	});


  // Show search box
  var isSearchVisible = false;
  $('#search-trigger').click(function(event){
		event.preventDefault();
		searchBarLength = $(window).width() > 992 ? 532 : 465;
		if (!isSearchVisible) {
			$('.nav-searchform').animate({right:0}, 0, function() {
				$('.nav-searchform').animate({right:30}, 550);
				$('#nav-searchform input').animate({width:searchBarLength}, 600);
				$('#nav-searchform input').focus();
				isSearchVisible = true;
			});
		} 
	});
	$('#nav-searchform input').focusout(function(event){
		if (isSearchVisible) {
			$('.nav-searchform').animate({right:-1000}, 600, function() {
				$('#nav-searchform input').animate({width:0});
				isSearchVisible = false;
			});
		}
	});


	// Toggle Hide articles
	$('.article-title').click(function(event){
		$(this).siblings('section').slideToggle();
	});


	// Enable link to tab
	var hash = document.location.hash;
	var prefix = "tab_";
	if (hash) {
	  $('.nav-tabs a[href='+hash.replace(prefix,"")+']').tab('show');
	} 
	// Change hash for page-reload
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
	  window.location.hash = e.target.hash.replace("#", "#" + prefix);
	});


	//Fix Masonry and Bootstrap Tab height problem
	$('a[data-toggle=tab]').on('shown.bs.tab', function (e) {
	    $(window).trigger("resize");
	});
	$(window).resize(function(){
	    $this = $('.masonry-container');
	    $this.masonry({ itemSelector: '.media-box' });               
	});


	//Ajax contact form
	$(function() {
		var form = $('#ContactForm');
		var formMessages = $('#form-messages');

		$(form).submit(function(event) {
			event.preventDefault();
			var formData = $(form).serialize();

			$.ajax({  
				type: "POST",
				data: formData,
				url: yq_scripts_vars.template_path + '/snippets/forms/contactForm.php'				
			}).done(function(response) {
		    // Set the message text.
		    $(formMessages).text(response);

		    // Clear the form.
		    $('#name').val('');
		    $('#email').val('');
		    $('#subject').val('');		    
		    $('#message').val('');
			}).fail(function(data) {
		    // Set the message text.
		    if (data.responseText !== '') {
	        $(formMessages).text(data.responseText);
		    } else {
	        $(formMessages).text('Oops! An error occurred and your message could not be sent.');
		    }
			})
		});
	})
		

	//Bootstrap Lightbox
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
	});


	// Media Queries
	if ($(window).width() > 768) {
		groupSearchResults(3);
		if ($(window).width() > 992) {
			slideInROICalculator();
		}
	} else {
		groupSearchResults(1);
	}


	// Slide in ROI Calculator on scroll
	function slideInROICalculator() {
		if ($('#roi-calculator-section').length > 0){
			$('#roi-calculator').animate({top:500});
			// Raise Roi Calculator as calculation results are added
			$('#roi-calculator-submit').mousedown(function(event){
	    		$('#roi-calculator').animate({top:-18}, 400);
	  	});
	  	roiPosition = $('#roi-calculator-section').offset().top;
	  	// Slide in ROI Calculator once
			$(window).on('scroll', function () {
		    if (window.pageYOffset > roiPosition-300) {
		    	$('#roi-calculator').animate({top:45}, 400);
		    	$(window).off('scroll');
		    }
			});
		};
	}


	// Wrap search results in groups of 3 and display in a carousel
	function groupSearchResults(split) {
		var $singleService = $('.single-search-result');
		var servicesLength = $singleService.length;
		for (var i = 0;i < servicesLength;i+=split){
			$singleService.filter(':eq('+i+'),:lt('+(i+split)+'):gt('+i+')').wrapAll("<div class='item'></div>");  //add item wrappers
		}
		$("#search-results-carousel .carousel-inner div:first").addClass("active");  //activate the carousel
	}


	// Fade In and Up
	function fadeInAndUp(object, distance, delay) {
		$(object).css("opacity", 0);
		$(object).animate({bottom:-distance},0, function(){
			$(this).animate({bottom:0, opacity:1},delay)
		});
	}	
});