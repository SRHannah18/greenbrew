jQuery(function($){
  
	var userFeed = new Instafeed({
  target: 'instafeed',
  get: 'user',
  userId: 176678467,
  clientId: '18b39f808f464e098cc6a21c33c3848c',
  //accessToken: '2076201406.1677ed0.67a83e4035ff464f89a4eb2316d507ff',
  accessToken: '176678467.1677ed0.3e934278d7714d77b9706c66d76db846',
  limit: '10',
  resolution: 'standard_resolution',
  template: '<div class="instagram-single"><a href="{{link}}" target="_blank"><div class="instagram-overlay"><p>{{caption}}</p></div><img src="{{image}}" /><div class="instagram-inner-icon"><img src="/wp-content/uploads/2016/06/insta-gray-new.png" height="24" width="24"/></div></a></div>'
	});
	if ( $('#instafeed').length > 0 ) {
	  userFeed.run();
	  
	}	
	
	function adjustArrows(event, slider) {
    if(typeof slider !== 'object') slider = $('#video-carousel');
    visibleSlides = $('#video-carousel').find('.owl-item').filter(':in-viewport');
    if(visibleSlides.length < 1) return false;
    leftSlide = visibleSlides.first();
    if(visibleSlides.length < 1) return false;
    rightSlide = visibleSlides.length > 0 && typeof visibleSlides.eq(2) != 'undefined' ? visibleSlides.eq(2) : visibleSlides.length > 0 && typeof visibleSlides.eq(1) != 'undefined' ? visibleSlides.eq(1).next() : visibleSlides.first().next().next();
    leftArrow = slider.find('.owl-prev');
    rightArrow = slider.find('.owl-next');
        
    leftOffset = leftSlide.offset().left + leftSlide.outerWidth(false);
    rightOffset = rightSlide.offset().left;
    
    leftArrow.css('left', leftOffset - leftArrow.width() - 10);
    rightArrow.css('left', rightOffset + 10);
  }

	function footerAdjust(){
		var adjusted = 'adjusted';
		var accordionHTML = '<div class="footerAccordion"><div class="visitUs accordionWrap"><div class="visitHead accordionHead"><h3>Visit Us</h3></div><div class="visitContent accordionContent"></div></div><div class="partners accordionWrap"><div class="partnersHead accordionHead"><h3>Partners</h3></div><div class="partnersContent accordionContent"></div></div></div>';
		var footerContainer = $('#footer #footer-top');
		if (!footerContainer.hasClass(adjusted)) {
			footerContainer.prepend(accordionHTML);
			var accordionObj = $('.footerAccordion'),
				  visitObj = $('.visitUs'),
				  visitInner = $('.visitUs .visitContent'),
				  visitHead = $('.visitUs .visitHead'),
				  partnersObj = $('.partners'),
				  partnersInner = $('.partners .partnersContent'),
				  partnersHead = $('.partners .partnersHead');
			var footerContent = [
			$('#footer #footer-top .flex_column:nth-of-type(2)').detach(),
			$('#footer #footer-top .flex_column:nth-of-type(2)').detach(),
			$('#footer #footer-top .flex_column:nth-of-type(2)').detach()
			];
			$.each(footerContent, function(){
		    $(this).appendTo(visitInner);
		  });
			var partnerContent = $('#footer #footer-top #nav_menu-5').detach();
		  partnerContent.appendTo(partnersInner);
		  footerContainer.addClass(adjusted);
		  visitInner.hide();
		  partnersInner.hide();
		  visitHead.click(function(){
			  if (!visitObj.hasClass('active')) {
				  visitInner.slideDown();
					visitObj.addClass('active');
			  } else {
				  visitInner.slideUp();
					visitObj.removeClass('active');
			  }
			  
		  });
		  partnersHead.click(function(){
			  if (!partnersObj.hasClass('active')) {
				  partnersInner.slideDown();
					partnersObj.addClass('active');
			  } else {
				  partnersInner.slideUp();
					partnersObj.removeClass('active');
			  }
			  
		  });
		}	
	}
	function reverseAdjust(){
		var adjusted = 'adjusted';
		var footerContainer = $('#footer #footer-top');
		if (footerContainer.hasClass(adjusted)) {
			var accordionObj = $('.footerAccordion');
			var footerContent = [
			$('#footer .visitContent > .flex_column:nth-of-type(3)').detach(),
			$('#footer .visitContent > .flex_column:nth-of-type(2)').detach(),
			$('#footer .visitContent > .flex_column:nth-of-type(1)').detach()
			];
			$.each(footerContent, function(){
		    $(this).prependTo(footerContainer);
		  });
		  var partnerContent = $('#footer #footer-top #nav_menu-5').detach();
		  partnerContent.appendTo('#footer #footer-top .flex_column:last-of-type');
		  footerContainer.removeClass(adjusted);
		  accordionObj.remove();
		}	
	}
	function headerAdjust() {
		var adjusted = 'adjusted';
		var mobileMenuContainer = $('#mobile-advanced');
		var searchWrap = $('.above-main-menu .search-form');
		if (!mobileMenuContainer.hasClass(adjusted)) {
			var searchContent = searchWrap.detach();
			mobileMenuContainer.append(searchContent);
			mobileMenuContainer.addClass(adjusted);
		}
	}
	function headerReverseAdjust() {
		var adjusted = 'adjusted';
		var mobileMenuContainer = $('#mobile-advanced');
		var aboveMain = $('.above-main-menu');
		var searchWrap = $('#mobile-advanced .search-form');
		if (mobileMenuContainer.hasClass(adjusted)) {
			var searchContent = searchWrap.detach();
			aboveMain.append(searchContent);
			mobileMenuContainer.removeClass(adjusted);
		}
	}
	function beerAdjust(){
		var beerMobile = $('.single-beer-mobile-split'),
				adjusted = 'adjusted';
		if (!beerMobile.hasClass(adjusted)) {
			var beerBottleMobile = $('.single-beer-mobile-split .mobile-bottle-holder'),
				  beerArtMobile = $('.single-beer-mobile-split .mobile-art-holder'),
				  beerImageContainer = $('.main-beer-image'),
				  rightSide = $('.image-search'),
				  beerImageContent = beerImageContainer.html(),
					rightSideContent = rightSide.html();
			beerImageContainer.empty();
			rightSide.empty();
			beerBottleMobile.html(beerImageContent);
			beerArtMobile.html(rightSideContent);
		  beerMobile.addClass(adjusted);
		}	
	}
	function beerReverseAdjust(){
		var beerMobile = $('.single-beer-mobile-split'),
				adjusted = 'adjusted';
		if (beerMobile.hasClass(adjusted)) {
			var beerBottleMobile = $('.single-beer-mobile-split .mobile-bottle-holder'),
				  beerArtMobile = $('.single-beer-mobile-split .mobile-art-holder'),
				  beerImageContainer = $('.main-beer-image'),
				  rightSide = $('.image-search'),
				  beerImageContent = beerBottleMobile.html(),
					rightSideContent = beerArtMobile.html();
			beerArtMobile.empty();
			beerBottleMobile.empty();
			beerImageContainer.html(beerImageContent);
			rightSide.html(rightSideContent);
		  beerMobile.removeClass(adjusted);
		}	
	}
	// Instagram Home textboxes
	function instagramTextSizer() {
		var instagramItem = $('.instagram-single');
		var instagramItemText = $('.instagram-single .instagram-overlay p');
		var instagramSize = instagramItem.height() * .75;
		instagramItemText.css('max-height', instagramSize);
	}
	var win = $(window);
	win.load(function(){
		instagramTextSizer();
	});
	if (win.width() < 768 ) {
		footerAdjust();
		beerAdjust();
		headerAdjust();
	}
	win.resize(function() {
		instagramTextSizer();
	  if ( win.width() < 768 ) {
		  footerAdjust();
		  beerAdjust();
		  headerAdjust();
		} else {
			reverseAdjust();
			beerReverseAdjust();
			headerReverseAdjust();
		}
	});
	
	/***** Prettier Mobile Menu *****/
	var menuTitle = $('#mobile-advanced .menu-item-has-children>a');
	var subMenu = $('#mobile-advanced .sub-menu');
	var flyout = "menu-open";
	menuTitle.click(function(e){
		e.preventDefault();
		var parentLI = $(this).parent();
		var thisSub = parentLI.find(subMenu);
		if (!parentLI.hasClass(flyout)){
			thisSub.slideDown();
			parentLI.addClass(flyout);
		} else {
			thisSub.slideUp();
			parentLI.removeClass(flyout);
		}
		
	});
	
	
	/**** Owl Carousel ***/
	function initOwlCarousel(selector, lazySetting, lightbox, items) {
	  if( $(selector).data('owlCarousel') === undefined ) {
	    $(selector).owlCarousel({
	      nav: true,
	      loop:true,
	      margin:30,
	      responsiveClass:true,
	      center: true,
	      items: items,
	      dots: true,
	      itemsDesktop: [1199,2],
				itemsDesktopSmall: [979,1],
	      itemsMobile: [0, 1],
	      lazyLoad: lazySetting,
	      responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false,
                stagePadding: 100
            },
            1000:{
                items:1,
                nav:true,
                loop:true,
                stagePadding: 300
            }
        },
	      onInitialized: function() {
	        if (lightbox) {
	          $(selector).find('a').magnificPopup({
	        		disableOn: 200,
	        		type: 'iframe',
	        		mainClass: 'mfp-fade',
	        		removalDelay: 160,
	        		preloader: false,
	        		fixedContentPos: false
	        	});
	        }
	        adjustArrows();
	        var resizeId;
	        function doneResizing() {
  	        adjustArrows();
	        }
	        $(window).on('throttledresize', function() {
  	        clearTimeout(resizeId);
  	        resizeId = setTimeout(doneResizing, 200);
	        });
	      }
	    });
	  }
	}
	initOwlCarousel("#video-carousel", false, true, 3);
	
	$('#involved-carousel').owlCarousel({
		nav: true,
	  loop:true,
	  items: 3,
	  dots: false,
	  itemsDesktop: [1199,3],
		itemsDesktopSmall: [979,2],
    itemsMobile: [0, 1]
	});
	
	// Tribe Events Popup
	$('.open-popup-link').magnificPopup({
	  type:'inline',
	  closeOnContentClick: true,
	  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	});
	
	var reverseStack = $('.reverse-stack');
	var reverseStackParent = $('.reverse-stack').parent();
  reverseStackParent.css('direction', 'rtl');
  reverseStackParent.children().css('direction', 'ltr');
  
  $('.tribe-venue a').removeAttr("href");
	$('a.tribe-events-gcal.tribe-events-button').attr("target", "_blank");
  var calLinks = $('.tribe-events-cal-links');
  var calDescription = $('.tribe-events-single-event-description');
  var calLinksContent = calLinks.detach();
  calDescription.append(calLinksContent);
  
  var prevNav = $('.avia-post-nav.avia-post-prev'),
  		nextNav = $('.avia-post-nav.avia-post-next'),
			prevNavLink = prevNav.attr("href"),
			nextNavLink = nextNav.attr("href"),
			pressPrevBtn = $('.prev-btn a'),
			pressNextBtn = $('.next-btn a');
  if (typeof pressPrevBtn != undefined) {
	  if (prevNavLink == undefined || prevNavLink == 'http://greenflashbrew.wpengine.com/' ||  prevNavLink == 'http://greenflashbrew.com/' ) {
		  pressPrevBtn.parent('.prev-btn').hide();
	  } else {
		  pressPrevBtn.attr("href", prevNavLink);
	  }
	  prevNav.hide();
  }
  if (typeof pressNextBtn != undefined) {
	  if (nextNavLink != undefined) {
		  pressNextBtn.attr("href", nextNavLink);
	  } else {
		  pressNextBtn.parent('.next-btn').hide();
	  }
	  nextNav.hide();
  }
  $("select").chosen({disable_search_threshold: 999});
  $('.gfield_description').each(function(){
	  var label = $(this).parent().find('.gfield_label');
	  var required = label.find('.gfield_required');
	  var desc = $(this).detach();
	  label.append(desc);
	  
  });
  $('label#label_2_16_1').append('<span class="label-legal"> (ABC license required at time of pick-up)</span>');
  
  if($(window).width() < 768) {
    //var results = $('.beer-finder-wrapper .beer-finder-form-wrapper').detach();
    //$('.beer-finder-wrapper').prepend(results);
  }
  
});

var texttolowercase = document.querySelector('#top #wrap_all .beer-finder-results');
function downCaseText(node) {
    if(node === null || typeof node == 'undefined') {
      return true;
    } else if (node.nodeType == 3) {
        node.nodeValue = node.nodeValue.toLowerCase();
    } else {
        for (var i = 0; i < node.childNodes.length; i++) {
            downCaseText(node.childNodes[i]);
        }
    }
}
downCaseText(texttolowercase);
