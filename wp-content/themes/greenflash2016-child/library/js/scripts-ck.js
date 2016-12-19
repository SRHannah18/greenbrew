/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// IE8 ployfill for GetComputed Style (for Responsive Script below)
function mce_preload_check(){if(mce_preload_checks>40)return;mce_preload_checks++;try{var e=jQuery}catch(t){setTimeout("mce_preload_check();",250);return}var n=document.createElement("script");n.type="text/javascript";n.src="http://downloads.mailchimp.com/js/jquery.form-n-validate.js";head.appendChild(n);try{var r=jQuery("#fake-form").validate({})}catch(t){setTimeout("mce_preload_check();",250);return}mce_init_form()}function mce_init_form(){jQuery(document).ready(function(e){var t={errorClass:"mce_inline_error",errorElement:"div",onkeyup:function(){},onfocusout:function(){},onblur:function(){}},n=e("#mc-embedded-subscribe-form").validate(t);e("#mc-embedded-subscribe-form").unbind("submit");t={url:"http://greenflashbrew.us3.list-manage.com/subscribe/post-json?u=c1f925c6a0e4f28f7f65ff72b&id=a36e0a438d&c=?",type:"GET",dataType:"json",contentType:"application/json; charset=utf-8",beforeSubmit:function(){e("#mce_tmp_error_msg").remove();e(".datefield","#mc_embed_signup").each(function(){var t="filled",n=new Array,r=0;e(":text",this).each(function(){n[r]=this;r++});e(":hidden",this).each(function(){var e=!1;if(n.length==2){e=!0;n[2]={value:1970}}n[0].value=="MM"&&n[1].value=="DD"&&(n[2].value=="YYYY"||e&&n[2].value==1970)?this.value="":n[0].value==""&&n[1].value==""&&(n[2].value==""||e&&n[2].value==1970)?this.value="":/\[day\]/.test(n[0].name)?this.value=n[1].value+"/"+n[0].value+"/"+n[2].value:this.value=n[0].value+"/"+n[1].value+"/"+n[2].value})});e(".phonefield-us","#mc_embed_signup").each(function(){var t=new Array,n=0;e(":text",this).each(function(){t[n]=this;n++});e(":hidden",this).each(function(){t[0].value.length!=3||t[1].value.length!=3||t[2].value.length!=4?this.value="":this.value="filled"})});return n.form()},success:mce_success_cb};e("#mc-embedded-subscribe-form").ajaxForm(t)})}function mce_success_cb(e){jQuery(document).ready(function(t){t("#mce-success-response").hide();t("#mce-error-response").hide();if(e.result=="success"){t("#mce-"+e.result+"-response").show();t("#mce-"+e.result+"-response").html(e.msg);t("#mc-embedded-subscribe-form").each(function(){this.reset()})}else{var n=-1,r;try{var s=e.msg.split(" - ",2);if(s[1]==undefined)r=e.msg;else{i=parseInt(s[0]);if(i.toString()==s[0]){n=s[0];r=s[1]}else{n=-1;r=e.msg}}}catch(o){n=-1;r=e.msg}try{if(n==-1){t("#mce-"+e.result+"-response").show();t("#mce-"+e.result+"-response").html(r)}else{err_id="mce_tmp_error_msg";html='<div id="'+err_id+'">'+r+"</div>";var u="#mc_embed_signup",a=t(u);if(ftypes[n]=="address"){u="#mce-"+fnames[n]+"-addr1";a=t(u).parent().parent().get(0)}else if(ftypes[n]=="date"){u="#mce-"+fnames[n]+"-month";a=t(u).parent().parent().get(0)}else{u="#mce-"+fnames[n];a=t().parent(u).get(0)}if(a){t(a).append(html);t(u).focus()}else{t("#mce-"+e.result+"-response").show();t("#mce-"+e.result+"-response").html(r)}}}catch(o){t("#mce-"+e.result+"-response").show();t("#mce-"+e.result+"-response").html(r)}}})}window.getComputedStyle||(window.getComputedStyle=function(e,t){this.el=e;this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;t=="float"&&(t="styleFloat");n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()}));return e.currentStyle[t]?e.currentStyle[t]:null};return this});jQuery(document).ready(function(e){var t=e(window).width(),n=e(document).height();t<768&&e("#mobile-nav-button").click(function(){e("#main-navigation").slideToggle();e("#header-top-bar").slideToggle()});t>481;if(t>767){jQuery("#home-instagram .instagram-content, #store-div .store-image").hover(function(){var e=jQuery(this).attr("data-id");jQuery("#"+e).slideToggle("fast")});e("#jobs-list a").click(function(){var t=e(this).attr("data-id");e("#"+t).fadeIn("fast");jQuery("#dim").css({opacity:.8});jQuery("#dim").css("height",n+"px");jQuery("#dim").show();jQuery("#dim").attr("data-id",t);return!1});e("#jobs-content-container .job-close, #dim").click(function(){var t=e(this).attr("data-id");e("#"+t).fadeOut("fast");jQuery("#dim").hide();return!1});e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))});function r(t,n){if(e(t).get(0)){var r=e(t).last().position(),i=r.left,s=Math.floor(parseInt(i)),o=s/1e3*1e3,u=((1e3-o)/2-65)/1e3*100;u<0&&(u=0);e(n).css("margin-left",u+"%")}}var i,s=!1,o=200;e(window).resize(function(){i=new Date;if(s===!1){s=!0;setTimeout(u,o)}});function u(){new Date-i<o?setTimeout(u,o):s=!1}var a=jQuery(window).scrollTop(),f=jQuery("#main-beer-image").height();a>f?jQuery("#beer-nav").addClass("stick"):jQuery("#beer-nav").removeClass("stick");jQuery(window).scroll(function(){var e=jQuery(window).scrollTop(),t=jQuery("#main-beer-image").height();e>t?jQuery("#beer-nav").addClass("stick"):jQuery("#beer-nav").removeClass("stick")});var l=jQuery("#tribe-events-pg-template .open-lightbox, #tribe-events-pg-template .open-lightbox2"),c=jQuery("#tribe-events-pg-template .open-tooltip");l.click(function(){jQuery("#dim").css({opacity:.7});jQuery("#dim").css("height",n+"px");jQuery("#dim").show();var e=jQuery(this).attr("data-lightbox-id");jQuery("#"+e).addClass("one-day-lightbox");return!1});c.click(function(){jQuery("#dim").css({opacity:.7});jQuery("#dim").css("height",n+"px");jQuery("#dim").show();var e=jQuery(this).attr("data-tooltip-id");jQuery("#"+e).show();return!1});jQuery("#dim, #tribe-events-pg-template .one-day-container").click(function(e){jQuery(".one-day-container").removeClass("one-day-lightbox");if(jQuery(e.target).is("a"))return!0;jQuery("#dim, .tribe-events-tooltip").hide();return!1});var h=jQuery(".scrolltofooter");h.click(function(){jQuery("html, body").animate({scrollTop:jQuery("#inner-footer").offset().top},1e3)});jQuery("#view-poster,#tasting-room-box-nav .view-popup").click(function(){var e=jQuery(this).attr("href");window.open(e,"","width=900,height=600,resizable=yes,scrollbars=yes");return!1});var p=jQuery(".tribe-events-sub-nav2 li a");p.click(function(){cal_href=jQuery(this).attr("href");jQuery(this).attr("href",cal_href+"#tribe-events-content-wrapper")});var d=jQuery("#limited a img, #event-navigation a img, #tasting-room-box-nav a img, .fade-rollover, .cal-images li img, #dlinks-container .dlinks-inner.fade");d.hover(function(){jQuery(this).css({opacity:.6})},function(){jQuery(this).css({opacity:1})});function v(t){t=typeof t=="string"?t:e(this).attr("href");var n=200;if(t.indexOf("#")==0){var r=e(t);if(r.length){e("html, body").animate({scrollTop:r.offset().top-n});if(history&&"pushState"in history){history.pushState({},document.title,window.location.pathname+t);return!1}}}}v(window.location.hash);e("body").on("click","a",v)}t>1030;jQuery("#tribe-bar-geoloc").attr("placeholder","city or zip");var m=jQuery(".popup-content");m.click(function(){jQuery("#popup-content-wrapper1").show();jQuery("#dim").css({opacity:.7});jQuery("#dim").show();jQuery("#dim").css("position","fixed");jQuery("#popup-content-wrapper1").css("height",n+"px");jQuery("#popup-content-wrapper2").css({opacity:1});var e=jQuery(this).attr("data-content-type"),t=jQuery(this).attr("data-link"),r;e=="iframe"?r='<iframe width="950" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'+t+'"></iframe>':r='<img src="'+t+'" alt="" width="" height="" />';jQuery("#popup-content").html(r);return!1});jQuery("#popup-close").click(function(){jQuery("#popup-content-wrapper1").hide();jQuery("#dim").hide()});jQuery("#virginia-beach-icon #close").click(function(){jQuery("#virginia-beach-icon").fadeOut()});var g=jQuery("#locator-zip-code, #find-this-beer #zipcode, #mce-EMAIL, #searchform #s");jQuery("#searchform #s").val("Search");g.click(function(){var e=jQuery(this).attr("data-value");jQuery(this).val()===e&&jQuery(this).val("")});g.blur(function(){var e=jQuery(this).attr("data-value");jQuery(this).val()===""&&jQuery(this).val(e)});jQuery("#beer-nav a").click(function(){jQuery("html, body").animate({scrollTop:jQuery(jQuery.attr(this,"href")).offset().top-180},500);return!1});jQuery("#learn-more-1, #learn-more-2, #learn-more-3, #learn-more-4, #learn-more-5, #close-more-1, #close-more-2,  #close-more-3, #close-more-4, #close-more-5").click(function(){var e=jQuery(this).attr("data-overlay"),t=jQuery(this).attr("data-initial"),n=jQuery(this).attr("data-secondary"),r=jQuery(this).attr("data-parent-button"),i=jQuery(this).attr("data-child-button"),s=jQuery(this).attr("data-class"),o,u,a,f;if(e=="slide-kegs"){o="-350";a="20";u="0";f="0"}else if(e=="slide-bottles"){o="20";a="20";u="0";f="32%"}else if(e=="slide-discovery"){o="-92";a="20";u="0";f="0"}else{o="-150";a="20";u="0";f="0"}if(jQuery("#"+t).is(":visible")){jQuery(this).html("Learn Less");jQuery(this).addClass("open");jQuery("#"+r).html("Learn Less");jQuery("#"+i).show();jQuery("#"+t).fadeOut();jQuery("#"+e).animate({bottom:o,left:u},250)}else{jQuery(this).html("Learn More");jQuery(this).removeClass("open");jQuery("#"+r).html("Learn More");jQuery("#"+r).removeClass("open");s=="close-more"&&jQuery(this).hide();jQuery("#"+t).fadeIn();jQuery("#"+i).hide();jQuery("#"+e).animate({bottom:a,left:f},250)}});e(".jqui-datepicker").datepicker({dateFormat:"DD, MM dd, yy",beforeShowDay:function(e){return[e.getDay()==1,""]}})});var fnames=new Array,ftypes=new Array;fnames[0]="EMAIL";ftypes[0]="email";fnames[1]="FNAME";ftypes[1]="text";fnames[2]="LNAME";ftypes[2]="text";try{var jqueryLoaded=jQuery;jqueryLoaded=!0}catch(err){var jqueryLoaded=!1}var head=document.getElementsByTagName("head")[0];if(!jqueryLoaded){var script=document.createElement("script");script.type="text/javascript";script.src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js";head.appendChild(script);script.readyState&&script.onload!==null&&(script.onreadystatechange=function(){this.readyState=="complete"&&mce_preload_check()})}setTimeout("mce_preload_check();",250);var mce_preload_checks=0;(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);