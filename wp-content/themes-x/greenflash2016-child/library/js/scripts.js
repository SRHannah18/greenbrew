/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}


// as the page loads, call these scripts
//$.noConflict();
jQuery(document).ready(function($) {

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    var window_height = $(document).height();
    
    /* if is below 768px */
    if (responsive_viewport < 768) {

        $('#mobile-nav-button').click(function() {
            $('#main-navigation').slideToggle();
            $('#header-top-bar').slideToggle();
        });


    // mobile nav

        // var mobile_nav = $('#main-navigation ul > li');
        // $('#main-navigation ul ul').addClass('closed');
        // mobile_nav.click(function() {
            
        //      $(this).children('ul').addClass('open').slideToggle(250);
             
            
        //     return false;
            
        //  });

        //mobile_nav.on('click', function(e) {
            //e.stopPropagation();
           // $(this).children('ul').slideToggle();
        //});

        
    
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport > 767) {

        // instagram home page
    jQuery('#home-instagram .instagram-content, #store-div .store-image').hover(function(){
        var id = jQuery(this).attr('data-id');
        jQuery('#'+id).slideToggle('fast');
    });

    // Job page

    $('#jobs-list a').click(function() {
        var content_id = $(this).attr('data-id');
        $('#'+content_id).fadeIn('fast');
        jQuery('#dim').css({opacity: 0.8});
        jQuery('#dim').css('height',window_height+'px');
        jQuery('#dim').show();
        jQuery('#dim').attr('data-id',content_id);
        return false;
    });

    $('#jobs-content-container .job-close, #dim').click(function() {
        var content_id = $(this).attr('data-id');
        $('#'+content_id).fadeOut('fast');
        jQuery('#dim').hide();
        return false;
    })
    
        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });


        function position_bottles(last_one,html_div) {
        //bottle_position is undefined on pages without
        //beer bottles which broke the newsletter submit area
        if($(last_one).get(0)){
            var bottle_position = $(last_one).last().position();
            var bottle_left = bottle_position.left;
            var bottle_position2 = Math.floor(parseInt(bottle_left));
            var percentage = (bottle_position2/1000)*1000;
            var margin_left = ((((1000 - percentage)/2)-65)/1000)*100;
            if(margin_left < 0) {margin_left = 0;}
            $(html_div).css('margin-left', margin_left+'%');
        }
    }

    //position_bottles('#slide-beers ul li', '#slide-beers ul');
    //position_bottles('#slide-kegs ul li', '#slide-kegs ul');

    var rtime;
    var timeout = false;
    var delta = 200;
    $(window).resize(function() {
        rtime = new Date();
        if (timeout === false) {
            timeout = true;
            setTimeout(resizeend, delta);
        }
    });

        function resizeend() {
            if (new Date() - rtime < delta) {
                setTimeout(resizeend, delta);
            } else {
                timeout = false;
                //position_bottles('#slide-beers ul li', '#slide-beers ul');
                //position_bottles('#slide-kegs ul li', '#slide-kegs ul');

               
            }               
        }




        // make beer nav stick on scroll up

        // have to do this initially for page refreshes....
        var nav_position = jQuery(window).scrollTop();

        // calculate height of hero image
        var hero_height = jQuery('#main-beer-image').height();
            
        if(nav_position > hero_height) {
            jQuery('#beer-nav').addClass('stick');
        } else {
            jQuery('#beer-nav').removeClass('stick'); 
        }


        jQuery(window).scroll(function() {
            //var nav_position = jQuery('#beer-nav').offset();
            var nav_position = jQuery(window).scrollTop();
            var hero_height = jQuery('#main-beer-image').height();
            //alert(nav_position.top);
            if(nav_position > hero_height) {
                jQuery('#beer-nav').addClass('stick');
            } else {
                jQuery('#beer-nav').removeClass('stick'); 
            }

        });


        var open_lightbox = jQuery('#tribe-events-pg-template .open-lightbox, #tribe-events-pg-template .open-lightbox2');
        var open_tooltip = jQuery('#tribe-events-pg-template .open-tooltip');

        open_lightbox.click(function(){
            jQuery('#dim').css({opacity: 0.7});
            jQuery('#dim').css('height',window_height+'px');
            jQuery('#dim').show();
            var box_id = jQuery(this).attr('data-lightbox-id');
            jQuery('#'+box_id).addClass('one-day-lightbox');
            return false;
        });

        open_tooltip.click(function(){
            jQuery('#dim').css({opacity: 0.7});
            jQuery('#dim').css('height',window_height+'px');
            jQuery('#dim').show();
            var box_id = jQuery(this).attr('data-tooltip-id');
            jQuery('#'+box_id).show();
            return false;
        });

        //jQuery('.one-day-lightbox').css({opacity: 1.3});

        // if dim is clicked close all windows
        jQuery('#dim, #tribe-events-pg-template .one-day-container').click(function(e){
            jQuery('.one-day-container').removeClass('one-day-lightbox');
            
            if(jQuery(e.target).is('a')){
                return true;
            } else {
                jQuery('#dim, .tribe-events-tooltip').hide();
                return false;
            }


        });

        var scroll_to_footer = jQuery(".scrolltofooter");

        scroll_to_footer.click(function() {
            jQuery('html, body').animate({
                scrollTop: jQuery("#inner-footer").offset().top
            }, 1000);
        });

        jQuery('#view-poster,#tasting-room-box-nav .view-popup').click(function() {
            var href = jQuery(this).attr('href');
            window.open(href,'','width=900,height=600,resizable=yes,scrollbars=yes');
            return false;
        });

        var cal_nav_link = jQuery('.tribe-events-sub-nav2 li a');
        cal_nav_link.click(function(){
            cal_href = jQuery(this).attr('href');
            jQuery(this).attr('href',cal_href+'#tribe-events-content-wrapper');
        });
        

        // General Image Link Opacity Code
        // use this for other areas if it doesn't require
        // special features...
        var fade_image_on_rollover = jQuery('#limited a img, #event-navigation a img, #tasting-room-box-nav a img, .fade-rollover, .cal-images li img, #dlinks-container .dlinks-inner.fade');
        fade_image_on_rollover.hover(
             function() {
                jQuery( this ).css({opacity:0.6});
            }, function() {
                jQuery( this ).css({opacity:1.0});
            }
        );




        // anchor link fix
        /**
 * Check a href for an anchor. If exists, and in document, scroll to it.
 * If href argument ommited, assumes context (this) is HTML Element,
 * which will be the case when invoked by jQuery after an event
 */
function scroll_if_anchor(href) {
    href = typeof(href) == "string" ? href : $(this).attr("href");
    
    // You could easily calculate this dynamically if you prefer
    var fromTop = 200;
    
    // If our Href points to a valid, non-empty anchor, and is on the same page (e.g. #foo)
    // Legacy jQuery and IE7 may have issues: http://stackoverflow.com/q/1593174
    if(href.indexOf("#") == 0) {
        var $target = $(href);
        
        // Older browser without pushState might flicker here, as they momentarily
        // jump to the wrong position (IE < 10)
        if($target.length) {
            $('html, body').animate({ scrollTop: $target.offset().top - fromTop });
            if(history && "pushState" in history) {
                history.pushState({}, document.title, window.location.pathname + href);
                return false;
            }
        }
    }
}    

// When our page loads, check to see if it contains and anchor
scroll_if_anchor(window.location.hash);

// Intercept all anchor clicks
$("body").on("click", "a", scroll_if_anchor);


        
        
    } // EOF DESKTOP JAVASCRIPT
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }



    // add all your scripts here
    
    // CALENDAR STUFF
    // Search area
    jQuery('#tribe-bar-geoloc').attr('placeholder','city or zip');
    
    //jQuery('#tribe-bar-geoloc').attr('value','city or zip');
    //jQuery('#tribe-bar-geoloc').click(function(){
        //jQuery(this).attr('placeholder','');
        //jQuery(this).attr('value','');
    //});
    

   

    // EOF CALENDAR STUFF

    var popupcontent = jQuery('.popup-content');
    popupcontent.click(function(){

        jQuery('#popup-content-wrapper1').show();
        jQuery('#dim').css({opacity: 0.7});
        jQuery('#dim').show();
        jQuery('#dim').css('position','fixed');
        jQuery('#popup-content-wrapper1').css('height',window_height+'px');
        jQuery('#popup-content-wrapper2').css({opacity: 1.0});
        // load the content
        var data_content_type = jQuery(this).attr('data-content-type');
        var data_link = jQuery(this).attr('data-link');
        var data_content;
        if(data_content_type == 'iframe') {
            data_content = '<iframe width="950" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'+data_link+'"></iframe>';
        } else {
            data_content = '<img src="'+data_link+'" alt="" width="" height="" />';
        }
        jQuery('#popup-content').html(data_content);


        return false;

    });

    jQuery('#popup-close').click(function(){
        jQuery('#popup-content-wrapper1').hide();
        jQuery('#dim').hide();
    })
    
	
	
    // home close virginia beach
    jQuery('#virginia-beach-icon #close').click(function(){
        jQuery('#virginia-beach-icon').fadeOut();
    });

    // home zipcode search
    var searchInput = jQuery('#locator-zip-code, #find-this-beer #zipcode, #mce-EMAIL, #searchform #s');

    jQuery('#searchform #s').val('Search');

    searchInput.click(function () {
        var searchDefault = jQuery(this).attr('data-value');
        if(jQuery(this).val() === searchDefault){
            jQuery(this).val('');
        }
    });
    searchInput.blur(function () {
        var searchDefault = jQuery(this).attr('data-value');
        if(jQuery(this).val() === ''){
            jQuery(this).val(searchDefault);
        }
    });

    // smooth scrolling on beer page
    jQuery('#beer-nav a').click(function(){
        jQuery('html, body').animate({
            // because of fixed nav at top have to adjust offset
            scrollTop: (jQuery( jQuery.attr(this, 'href') ).offset().top) - 180
        }, 500);
        return false;
    });

    // sliding areas on beer page
    
    jQuery('#learn-more-1, #learn-more-2, #learn-more-3, #learn-more-4, #learn-more-5, #close-more-1, #close-more-2,  #close-more-3, #close-more-4, #close-more-5').click(function() {
        
        var overlay = jQuery(this).attr('data-overlay');
        var first = jQuery(this).attr('data-initial'); 
        var second = jQuery(this).attr('data-secondary');
        var parent_btn = jQuery(this).attr('data-parent-button');
        var child_btn = jQuery(this).attr('data-child-button');
        var btn_class = jQuery(this).attr('data-class');
        var offset;
        var offsetLeft;
        var offsetReset;
        var offsetLeftReset;

        if(overlay == 'slide-kegs') {
            offset = "-350";
            offsetReset = "20";
            offsetLeft = "0";
            offsetLeftReset = "0";

        } else if(overlay == 'slide-bottles') {
            offset = "20";
            offsetReset = "20";
            offsetLeft = "0";
            offsetLeftReset = "32%";
        } else if(overlay == 'slide-discovery') {
            offset = "-92";
            offsetReset = "20";
            offsetLeft = "0";
            offsetLeftReset = "0";
        } else {
            offset = "-150";
            offsetReset = "20";
            offsetLeft = "0";
            offsetLeftReset = "0";
        }

        if(jQuery('#'+first).is(':visible'))
        {

        jQuery(this).html('Learn Less');
        jQuery(this).addClass('open');
        jQuery('#'+parent_btn).html('Learn Less');
        jQuery('#'+child_btn).show();
        jQuery('#'+first).fadeOut();
        jQuery('#'+overlay).animate({
            bottom: offset,
            left: offsetLeft
            
            }, 250);
        
        } else {

            jQuery(this).html('Learn More');
            jQuery(this).removeClass('open');
            jQuery('#'+parent_btn).html('Learn More');
            jQuery('#'+parent_btn).removeClass('open');
            if(btn_class == 'close-more') {
                jQuery(this).hide();
            }
            jQuery('#'+first).fadeIn();
            jQuery('#'+child_btn).hide();
            jQuery('#'+overlay).animate({
                bottom: offsetReset,
                left: offsetLeftReset,
            
            }, 250);
        }

    }); // eof sliders

  $( ".jqui-datepicker").datepicker({
            dateFormat: "DD, MM dd, yy",
            beforeShowDay: function(date){
            return [date.getDay() == 1, ''];
            }

        });

          
   
	
 
}); /* end of as page load scripts */

/* MAIL CHIMP */


var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}


//var err_style = '';
//try{
    //err_style = mc_custom_error_style;
//} catch(e){
    //err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
//}
//var head= document.getElementsByTagName('head')[0];
//var style= document.createElement('style');
//style.type= 'text/css';
//if (style.styleSheet) {
  //style.styleSheet.cssText = err_style;
//} else {
  //style.appendChild(document.createTextNode(err_style));
//}
//head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
    head.appendChild(script);
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://greenflashbrew.us3.list-manage.com/subscribe/post-json?u=c1f925c6a0e4f28f7f65ff72b&id=a36e0a438d&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                        if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else {
                                            if (/\[day\]/.test(fields[0].name)){
                                                this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;                                           
                                            } else {
                                                this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                            }
                                        }
                                    });
                            });
                        $('.phonefield-us','#mc_embed_signup').each(
                            function(){
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                            this.value = '';
                                        } else {
                                            this.value = 'filled';
                                        }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    jQuery(document).ready( function($) {
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
        });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'">'+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
});
}



// EOF MAIL CHIMP

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );