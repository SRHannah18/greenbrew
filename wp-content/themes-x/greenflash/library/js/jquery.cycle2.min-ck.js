/*!
* jQuery Cycle2; build: v20131005
* http://jquery.malsup.com/cycle2/
* Copyright (c) 2013 M. Alsup; Dual licensed: MIT/GPL
*//*! core engine; version: 20131003 */(function(e){"use strict";function t(e){return(e||"").toLowerCase()}var n="20131003";e.fn.cycle=function(n){var r;return 0!==this.length||e.isReady?this.each(function(){var r,i,s,o,u=e(this),a=e.fn.cycle.log;if(!u.data("cycle.opts")){(u.data("cycle-log")===!1||n&&n.log===!1||i&&i.log===!1)&&(a=e.noop),a("--c2 init--"),r=u.data();for(var f in r)r.hasOwnProperty(f)&&/^cycle[A-Z]+/.test(f)&&(o=r[f],s=f.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,t),a(s+":",o,"("+typeof o+")"),r[s]=o);i=e.extend({},e.fn.cycle.defaults,r,n||{}),i.timeoutId=0,i.paused=i.paused||!1,i.container=u,i._maxZ=i.maxZ,i.API=e.extend({_container:u},e.fn.cycle.API),i.API.log=a,i.API.trigger=function(e,t){return i.container.trigger(e,t),i.API},u.data("cycle.opts",i),u.data("cycle.API",i.API),i.API.trigger("cycle-bootstrap",[i,i.API]),i.API.addInitialSlides(),i.API.preInitSlideshow(),i.slides.length&&i.API.initSlideshow()}}):(r={s:this.selector,c:this.context},e.fn.cycle.log("requeuing slideshow (dom not ready)"),e(function(){e(r.s,r.c).cycle(n)}),this)},e.fn.cycle.API={opts:function(){return this._container.data("cycle.opts")},addInitialSlides:function(){var t=this.opts(),n=t.slides;t.slideCount=0,t.slides=e(),n=n.jquery?n:t.container.find(n),t.random&&n.sort(function(){return Math.random()-.5}),t.API.add(n)},preInitSlideshow:function(){var t=this.opts();t.API.trigger("cycle-pre-initialize",[t]);var n=e.fn.cycle.transitions[t.fx];n&&e.isFunction(n.preInit)&&n.preInit(t),t._preInitialized=!0},postInitSlideshow:function(){var t=this.opts();t.API.trigger("cycle-post-initialize",[t]);var n=e.fn.cycle.transitions[t.fx];n&&e.isFunction(n.postInit)&&n.postInit(t)},initSlideshow:function(){var t,n=this.opts(),r=n.container;n.API.calcFirstSlide(),"static"==n.container.css("position")&&n.container.css("position","relative"),e(n.slides[n.currSlide]).css("opacity",1).show(),n.API.stackSlides(n.slides[n.currSlide],n.slides[n.nextSlide],!n.reverse),n.pauseOnHover&&(n.pauseOnHover!==!0&&(r=e(n.pauseOnHover)),r.hover(function(){n.API.pause(!0)},function(){n.API.resume(!0)})),n.timeout&&(t=n.API.getSlideOpts(n.currSlide),n.API.queueTransition(t,t.timeout+n.delay)),n._initialized=!0,n.API.updateView(!0),n.API.trigger("cycle-initialized",[n]),n.API.postInitSlideshow()},pause:function(t){var n=this.opts(),r=n.API.getSlideOpts(),i=n.hoverPaused||n.paused;t?n.hoverPaused=!0:n.paused=!0,i||(n.container.addClass("cycle-paused"),n.API.trigger("cycle-paused",[n]).log("cycle-paused"),r.timeout&&(clearTimeout(n.timeoutId),n.timeoutId=0,n._remainingTimeout-=e.now()-n._lastQueue,(0>n._remainingTimeout||isNaN(n._remainingTimeout))&&(n._remainingTimeout=void 0)))},resume:function(e){var t=this.opts(),n=!t.hoverPaused&&!t.paused;e?t.hoverPaused=!1:t.paused=!1,n||(t.container.removeClass("cycle-paused"),0===t.slides.filter(":animated").length&&t.API.queueTransition(t.API.getSlideOpts(),t._remainingTimeout),t.API.trigger("cycle-resumed",[t,t._remainingTimeout]).log("cycle-resumed"))},add:function(t,n){var r,i=this.opts(),s=i.slideCount,o=!1;"string"==e.type(t)&&(t=e.trim(t)),e(t).each(function(){var t,r=e(this);n?i.container.prepend(r):i.container.append(r),i.slideCount++,t=i.API.buildSlideOpts(r),i.slides=n?e(r).add(i.slides):i.slides.add(r),i.API.initSlide(t,r,--i._maxZ),r.data("cycle.opts",t),i.API.trigger("cycle-slide-added",[i,t,r])}),i.API.updateView(!0),o=i._preInitialized&&2>s&&i.slideCount>=1,o&&(i._initialized?i.timeout&&(r=i.slides.length,i.nextSlide=i.reverse?r-1:1,i.timeoutId||i.API.queueTransition(i)):i.API.initSlideshow())},calcFirstSlide:function(){var e,t=this.opts();e=parseInt(t.startingSlide||0,10),(e>=t.slides.length||0>e)&&(e=0),t.currSlide=e,t.reverse?(t.nextSlide=e-1,0>t.nextSlide&&(t.nextSlide=t.slides.length-1)):(t.nextSlide=e+1,t.nextSlide==t.slides.length&&(t.nextSlide=0))},calcNextSlide:function(){var e,t=this.opts();t.reverse?(e=0>t.nextSlide-1,t.nextSlide=e?t.slideCount-1:t.nextSlide-1,t.currSlide=e?0:t.nextSlide+1):(e=t.nextSlide+1==t.slides.length,t.nextSlide=e?0:t.nextSlide+1,t.currSlide=e?t.slides.length-1:t.nextSlide-1)},calcTx:function(t,n){var r,i=t;return n&&i.manualFx&&(r=e.fn.cycle.transitions[i.manualFx]),r||(r=e.fn.cycle.transitions[i.fx]),r||(r=e.fn.cycle.transitions.fade,i.API.log('Transition "'+i.fx+'" not found.  Using fade.')),r},prepareTx:function(e,t){var n,r,i,s,o,u=this.opts();return 2>u.slideCount?(u.timeoutId=0,void 0):(!e||u.busy&&!u.manualTrump||(u.API.stopTransition(),u.busy=!1,clearTimeout(u.timeoutId),u.timeoutId=0),u.busy||(0!==u.timeoutId||e)&&(r=u.slides[u.currSlide],i=u.slides[u.nextSlide],s=u.API.getSlideOpts(u.nextSlide),o=u.API.calcTx(s,e),u._tx=o,e&&void 0!==s.manualSpeed&&(s.speed=s.manualSpeed),u.nextSlide!=u.currSlide&&(e||!u.paused&&!u.hoverPaused&&u.timeout)?(u.API.trigger("cycle-before",[s,r,i,t]),o.before&&o.before(s,r,i,t),n=function(){u.busy=!1,u.container.data("cycle.opts")&&(o.after&&o.after(s,r,i,t),u.API.trigger("cycle-after",[s,r,i,t]),u.API.queueTransition(s),u.API.updateView(!0))},u.busy=!0,o.transition?o.transition(s,r,i,t,n):u.API.doTransition(s,r,i,t,n),u.API.calcNextSlide(),u.API.updateView()):u.API.queueTransition(s)),void 0)},doTransition:function(t,n,r,i,s){var o=t,u=e(n),a=e(r),f=function(){a.animate(o.animIn||{opacity:1},o.speed,o.easeIn||o.easing,s)};a.css(o.cssBefore||{}),u.animate(o.animOut||{},o.speed,o.easeOut||o.easing,function(){u.css(o.cssAfter||{}),o.sync||f()}),o.sync&&f()},queueTransition:function(t,n){var r=this.opts(),i=void 0!==n?n:t.timeout;return 0===r.nextSlide&&0===--r.loop?(r.API.log("terminating; loop=0"),r.timeout=0,i?setTimeout(function(){r.API.trigger("cycle-finished",[r])},i):r.API.trigger("cycle-finished",[r]),r.nextSlide=r.currSlide,void 0):(i&&(r._lastQueue=e.now(),void 0===n&&(r._remainingTimeout=t.timeout),r.paused||r.hoverPaused||(r.timeoutId=setTimeout(function(){r.API.prepareTx(!1,!r.reverse)},i))),void 0)},stopTransition:function(){var e=this.opts();e.slides.filter(":animated").length&&(e.slides.stop(!1,!0),e.API.trigger("cycle-transition-stopped",[e])),e._tx&&e._tx.stopTransition&&e._tx.stopTransition(e)},advanceSlide:function(e){var t=this.opts();return clearTimeout(t.timeoutId),t.timeoutId=0,t.nextSlide=t.currSlide+e,0>t.nextSlide?t.nextSlide=t.slides.length-1:t.nextSlide>=t.slides.length&&(t.nextSlide=0),t.API.prepareTx(!0,e>=0),!1},buildSlideOpts:function(n){var r,i,s=this.opts(),o=n.data()||{};for(var u in o)o.hasOwnProperty(u)&&/^cycle[A-Z]+/.test(u)&&(r=o[u],i=u.match(/^cycle(.*)/)[1].replace(/^[A-Z]/,t),s.API.log("["+(s.slideCount-1)+"]",i+":",r,"("+typeof r+")"),o[i]=r);o=e.extend({},e.fn.cycle.defaults,s,o),o.slideNum=s.slideCount;try{delete o.API,delete o.slideCount,delete o.currSlide,delete o.nextSlide,delete o.slides}catch(a){}return o},getSlideOpts:function(t){var n=this.opts();void 0===t&&(t=n.currSlide);var r=n.slides[t],i=e(r).data("cycle.opts");return e.extend({},n,i)},initSlide:function(t,n,r){var i=this.opts();n.css(t.slideCss||{}),r>0&&n.css("zIndex",r),isNaN(t.speed)&&(t.speed=e.fx.speeds[t.speed]||e.fx.speeds._default),t.sync||(t.speed=t.speed/2),n.addClass(i.slideClass)},updateView:function(e,t){var n=this.opts();if(n._initialized){var r=n.API.getSlideOpts(),i=n.slides[n.currSlide];!e&&t!==!0&&(n.API.trigger("cycle-update-view-before",[n,r,i]),0>n.updateView)||(n.slideActiveClass&&n.slides.removeClass(n.slideActiveClass).eq(n.currSlide).addClass(n.slideActiveClass),e&&n.hideNonActive&&n.slides.filter(":not(."+n.slideActiveClass+")").hide(),n.API.trigger("cycle-update-view",[n,r,i,e]),e&&n.API.trigger("cycle-update-view-after",[n,r,i]))}},getComponent:function(t){var n=this.opts(),r=n[t];return"string"==typeof r?/^\s*[\>|\+|~]/.test(r)?n.container.find(r):e(r):r.jquery?r:e(r)},stackSlides:function(t,n,r){var i=this.opts();t||(t=i.slides[i.currSlide],n=i.slides[i.nextSlide],r=!i.reverse),e(t).css("zIndex",i.maxZ);var s,o=i.maxZ-2,u=i.slideCount;if(r){for(s=i.currSlide+1;u>s;s++)e(i.slides[s]).css("zIndex",o--);for(s=0;i.currSlide>s;s++)e(i.slides[s]).css("zIndex",o--)}else{for(s=i.currSlide-1;s>=0;s--)e(i.slides[s]).css("zIndex",o--);for(s=u-1;s>i.currSlide;s--)e(i.slides[s]).css("zIndex",o--)}e(n).css("zIndex",i.maxZ-1)},getSlideIndex:function(e){return this.opts().slides.index(e)}},e.fn.cycle.log=function(){window.console&&console.log&&console.log("[cycle2] "+Array.prototype.join.call(arguments," "))},e.fn.cycle.version=function(){return"Cycle2: "+n},e.fn.cycle.transitions={custom:{},none:{before:function(e,t,n,r){e.API.stackSlides(n,t,r),e.cssBefore={opacity:1,display:"block"}}},fade:{before:function(t,n,r,i){var s=t.API.getSlideOpts(t.nextSlide).slideCss||{};t.API.stackSlides(n,r,i),t.cssBefore=e.extend(s,{opacity:0,display:"block"}),t.animIn={opacity:1},t.animOut={opacity:0}}},fadeout:{before:function(t,n,r,i){var s=t.API.getSlideOpts(t.nextSlide).slideCss||{};t.API.stackSlides(n,r,i),t.cssBefore=e.extend(s,{opacity:1,display:"block"}),t.animOut={opacity:0}}},scrollHorz:{before:function(e,t,n,r){e.API.stackSlides(t,n,r);var i=e.container.css("overflow","hidden").width();e.cssBefore={left:r?i:-i,top:0,opacity:1,display:"block"},e.cssAfter={zIndex:e._maxZ-2,left:0},e.animIn={left:0},e.animOut={left:r?-i:i}}}},e.fn.cycle.defaults={allowWrap:!0,autoSelector:".cycle-slideshow[data-cycle-auto-init!=false]",delay:0,easing:null,fx:"fade",hideNonActive:!0,loop:0,manualFx:void 0,manualSpeed:void 0,manualTrump:!0,maxZ:100,pauseOnHover:!1,reverse:!1,slideActiveClass:"cycle-slide-active",slideClass:"cycle-slide",slideCss:{position:"absolute",top:0,left:0},slides:"> img",speed:500,startingSlide:0,sync:!0,timeout:4e3,updateView:-1},e(document).ready(function(){e(e.fn.cycle.defaults.autoSelector).cycle()})})(jQuery),function(e){"use strict";function t(t,r){var i,s,o,u=r.autoHeight;if("container"==u)s=e(r.slides[r.currSlide]).outerHeight(),r.container.height(s);else if(r._autoHeightRatio)r.container.height(r.container.width()/r._autoHeightRatio);else if("calc"===u||"number"==e.type(u)&&u>=0){if(o="calc"===u?n(t,r):u>=r.slides.length?0:u,o==r._sentinelIndex)return;r._sentinelIndex=o,r._sentinel&&r._sentinel.remove(),i=e(r.slides[o].cloneNode(!0)),i.removeAttr("id name rel").find("[id],[name],[rel]").removeAttr("id name rel"),i.css({position:"static",visibility:"hidden",display:"block"}).prependTo(r.container).addClass("cycle-sentinel cycle-slide").removeClass("cycle-slide-active"),i.find("*").css("visibility","hidden"),r._sentinel=i}}function n(t,n){var r=0,i=-1;return n.slides.each(function(t){var n=e(this).height();n>i&&(i=n,r=t)}),r}function r(t,n,r,i){var s=e(i).outerHeight(),o=n.sync?n.speed/2:n.speed;n.container.animate({height:s},o)}function i(n,s){s._autoHeightOnResize&&(e(window).off("resize orientationchange",s._autoHeightOnResize),s._autoHeightOnResize=null),s.container.off("cycle-slide-added cycle-slide-removed",t),s.container.off("cycle-destroyed",i),s.container.off("cycle-before",r),s._sentinel&&(s._sentinel.remove(),s._sentinel=null)}e.extend(e.fn.cycle.defaults,{autoHeight:0}),e(document).on("cycle-initialized",function(n,s){function o(){t(n,s)}var u,a=s.autoHeight,f=e.type(a),l=null;("string"===f||"number"===f)&&(s.container.on("cycle-slide-added cycle-slide-removed",t),s.container.on("cycle-destroyed",i),"container"==a?s.container.on("cycle-before",r):"string"===f&&/\d+\:\d+/.test(a)&&(u=a.match(/(\d+)\:(\d+)/),u=u[1]/u[2],s._autoHeightRatio=u),"number"!==f&&(s._autoHeightOnResize=function(){clearTimeout(l),l=setTimeout(o,50)},e(window).on("resize orientationchange",s._autoHeightOnResize)),setTimeout(o,30))})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{caption:"> .cycle-caption",captionTemplate:"{{slideNum}} / {{slideCount}}",overlay:"> .cycle-overlay",overlayTemplate:"<div>{{title}}</div><div>{{desc}}</div>",captionModule:"caption"}),e(document).on("cycle-update-view",function(t,n,r,i){"caption"===n.captionModule&&e.each(["caption","overlay"],function(){var e=this,t=r[e+"Template"],s=n.API.getComponent(e);s.length&&t?(s.html(n.API.tmpl(t,r,n,i)),s.show()):s.hide()})}),e(document).on("cycle-destroyed",function(t,n){var r;e.each(["caption","overlay"],function(){var e=this,t=n[e+"Template"];n[e]&&t&&(r=n.API.getComponent("caption"),r.empty())})})}(jQuery),function(e){"use strict";var t=e.fn.cycle;e.fn.cycle=function(n){var r,i,s,o=e.makeArray(arguments);return"number"==e.type(n)?this.cycle("goto",n):"string"==e.type(n)?this.each(function(){var u;return r=n,s=e(this).data("cycle.opts"),void 0===s?(t.log('slideshow must be initialized before sending commands; "'+r+'" ignored'),void 0):(r="goto"==r?"jump":r,i=s.API[r],e.isFunction(i)?(u=e.makeArray(o),u.shift(),i.apply(s.API,u)):(t.log("unknown command: ",r),void 0))}):t.apply(this,arguments)},e.extend(e.fn.cycle,t),e.extend(t.API,{next:function(){var e=this.opts();if(!e.busy||e.manualTrump){var t=e.reverse?-1:1;e.allowWrap===!1&&e.currSlide+t>=e.slideCount||(e.API.advanceSlide(t),e.API.trigger("cycle-next",[e]).log("cycle-next"))}},prev:function(){var e=this.opts();if(!e.busy||e.manualTrump){var t=e.reverse?1:-1;e.allowWrap===!1&&0>e.currSlide+t||(e.API.advanceSlide(t),e.API.trigger("cycle-prev",[e]).log("cycle-prev"))}},destroy:function(){this.stop();var t=this.opts(),n=e.isFunction(e._data)?e._data:e.noop;clearTimeout(t.timeoutId),t.timeoutId=0,t.API.stop(),t.API.trigger("cycle-destroyed",[t]).log("cycle-destroyed"),t.container.removeData(),n(t.container[0],"parsedAttrs",!1),t.retainStylesOnDestroy||(t.container.removeAttr("style"),t.slides.removeAttr("style"),t.slides.removeClass(t.slideActiveClass)),t.slides.each(function(){e(this).removeData(),n(this,"parsedAttrs",!1)})},jump:function(e){var t,n=this.opts();if(!n.busy||n.manualTrump){var r=parseInt(e,10);if(isNaN(r)||0>r||r>=n.slides.length)return n.API.log("goto: invalid slide index: "+r),void 0;if(r==n.currSlide)return n.API.log("goto: skipping, already on slide",r),void 0;n.nextSlide=r,clearTimeout(n.timeoutId),n.timeoutId=0,n.API.log("goto: ",r," (zero-index)"),t=n.currSlide<n.nextSlide,n.API.prepareTx(!0,t)}},stop:function(){var t=this.opts(),n=t.container;clearTimeout(t.timeoutId),t.timeoutId=0,t.API.stopTransition(),t.pauseOnHover&&(t.pauseOnHover!==!0&&(n=e(t.pauseOnHover)),n.off("mouseenter mouseleave")),t.API.trigger("cycle-stopped",[t]).log("cycle-stopped")},reinit:function(){var e=this.opts();e.API.destroy(),e.container.cycle()},remove:function(t){for(var n,r,i=this.opts(),s=[],o=1,u=0;i.slides.length>u;u++)n=i.slides[u],u==t?r=n:(s.push(n),e(n).data("cycle.opts").slideNum=o,o++);r&&(i.slides=e(s),i.slideCount--,e(r).remove(),t==i.currSlide?i.API.advanceSlide(1):i.currSlide>t?i.currSlide--:i.currSlide++,i.API.trigger("cycle-slide-removed",[i,t,r]).log("cycle-slide-removed"),i.API.updateView())}}),e(document).on("click.cycle","[data-cycle-cmd]",function(t){t.preventDefault();var n=e(this),r=n.data("cycle-cmd"),i=n.data("cycle-context")||".cycle-slideshow";e(i).cycle(r,n.data("cycle-arg"))})}(jQuery),function(e){"use strict";function t(t,n){var r;return t._hashFence?(t._hashFence=!1,void 0):(r=window.location.hash.substring(1),t.slides.each(function(i){if(e(this).data("cycle-hash")==r){if(n===!0)t.startingSlide=i;else{var s=i>t.currSlide;t.nextSlide=i,t.API.prepareTx(!0,s)}return!1}}),void 0)}e(document).on("cycle-pre-initialize",function(n,r){t(r,!0),r._onHashChange=function(){t(r,!1)},e(window).on("hashchange",r._onHashChange)}),e(document).on("cycle-update-view",function(e,t,n){n.hash&&"#"+n.hash!=window.location.hash&&(t._hashFence=!0,window.location.hash=n.hash)}),e(document).on("cycle-destroyed",function(t,n){n._onHashChange&&e(window).off("hashchange",n._onHashChange)})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{loader:!1}),e(document).on("cycle-bootstrap",function(t,n){function r(t,r){function s(t){var s;"wait"==n.loader?(u.push(t),0===f&&(u.sort(o),i.apply(n.API,[u,r]),n.container.removeClass("cycle-loading"))):(s=e(n.slides[n.currSlide]),i.apply(n.API,[t,r]),s.show(),n.container.removeClass("cycle-loading"))}function o(e,t){return e.data("index")-t.data("index")}var u=[];if("string"==e.type(t))t=e.trim(t);else if("array"===e.type(t))for(var a=0;t.length>a;a++)t[a]=e(t[a])[0];t=e(t);var f=t.length;f&&(t.hide().appendTo("body").each(function(t){function o(){0===--a&&(--f,s(c))}var a=0,c=e(this),h=c.is("img")?c:c.find("img");return c.data("index",t),h=h.filter(":not(.cycle-loader-ignore)").filter(':not([src=""])'),h.length?(a=h.length,h.each(function(){this.complete?o():e(this).load(function(){o()}).error(function(){0===--a&&(n.API.log("slide skipped; img not loaded:",this.src),0===--f&&"wait"==n.loader&&i.apply(n.API,[u,r]))})}),void 0):(--f,u.push(c),void 0)}),f&&n.container.addClass("cycle-loading"))}var i;n.loader&&(i=n.API.add,n.API.add=r)})}(jQuery),function(e){"use strict";function t(t,n,r){var i,s=t.API.getComponent("pager");s.each(function(){var s=e(this);if(n.pagerTemplate){var o=t.API.tmpl(n.pagerTemplate,n,t,r[0]);i=e(o).appendTo(s)}else i=s.children().eq(t.slideCount-1);i.on(t.pagerEvent,function(e){e.preventDefault(),t.API.page(s,e.currentTarget)})})}function n(e,t){var n=this.opts();if(!n.busy||n.manualTrump){var r=e.children().index(t),i=r,s=i>n.currSlide;n.currSlide!=i&&(n.nextSlide=i,n.API.prepareTx(!0,s),n.API.trigger("cycle-pager-activated",[n,e,t]))}}e.extend(e.fn.cycle.defaults,{pager:"> .cycle-pager",pagerActiveClass:"cycle-pager-active",pagerEvent:"click.cycle",pagerTemplate:"<span>&bull;</span>"}),e(document).on("cycle-bootstrap",function(e,n,r){r.buildPagerLink=t}),e(document).on("cycle-slide-added",function(e,t,r,i){t.pager&&(t.API.buildPagerLink(t,r,i),t.API.page=n)}),e(document).on("cycle-slide-removed",function(t,n,r){if(n.pager){var i=n.API.getComponent("pager");i.each(function(){var t=e(this);e(t.children()[r]).remove()})}}),e(document).on("cycle-update-view",function(t,n){var r;n.pager&&(r=n.API.getComponent("pager"),r.each(function(){e(this).children().removeClass(n.pagerActiveClass).eq(n.currSlide).addClass(n.pagerActiveClass)}))}),e(document).on("cycle-destroyed",function(e,t){var n=t.API.getComponent("pager");n&&(n.children().off(t.pagerEvent),t.pagerTemplate&&n.empty())})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{next:"> .cycle-next",nextEvent:"click.cycle",disabledClass:"disabled",prev:"> .cycle-prev",prevEvent:"click.cycle",swipe:!1}),e(document).on("cycle-initialized",function(e,t){if(t.API.getComponent("next").on(t.nextEvent,function(e){e.preventDefault(),t.API.next()}),t.API.getComponent("prev").on(t.prevEvent,function(e){e.preventDefault(),t.API.prev()}),t.swipe){var n=t.swipeVert?"swipeUp.cycle":"swipeLeft.cycle swipeleft.cycle",r=t.swipeVert?"swipeDown.cycle":"swipeRight.cycle swiperight.cycle";t.container.on(n,function(){t.API.next()}),t.container.on(r,function(){t.API.prev()})}}),e(document).on("cycle-update-view",function(e,t){if(!t.allowWrap){var n=t.disabledClass,r=t.API.getComponent("next"),i=t.API.getComponent("prev"),s=t._prevBoundry||0,o=void 0!==t._nextBoundry?t._nextBoundry:t.slideCount-1;t.currSlide==o?r.addClass(n).prop("disabled",!0):r.removeClass(n).prop("disabled",!1),t.currSlide===s?i.addClass(n).prop("disabled",!0):i.removeClass(n).prop("disabled",!1)}}),e(document).on("cycle-destroyed",function(e,t){t.API.getComponent("prev").off(t.nextEvent),t.API.getComponent("next").off(t.prevEvent),t.container.off("swipeleft.cycle swiperight.cycle swipeLeft.cycle swipeRight.cycle swipeUp.cycle swipeDown.cycle")})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{progressive:!1}),e(document).on("cycle-pre-initialize",function(t,n){if(n.progressive){var r,i,s=n.API,o=s.next,u=s.prev,a=s.prepareTx,f=e.type(n.progressive);if("array"==f)r=n.progressive;else if(e.isFunction(n.progressive))r=n.progressive(n);else if("string"==f){if(i=e(n.progressive),r=e.trim(i.html()),!r)return;if(/^(\[)/.test(r))try{r=e.parseJSON(r)}catch(l){return s.log("error parsing progressive slides",l),void 0}else r=r.split(RegExp(i.data("cycle-split")||"\n")),r[r.length-1]||r.pop()}a&&(s.prepareTx=function(e,t){var i,s;return e||0===r.length?(a.apply(n.API,[e,t]),void 0):(t&&n.currSlide==n.slideCount-1?(s=r[0],r=r.slice(1),n.container.one("cycle-slide-added",function(e,t){setTimeout(function(){t.API.advanceSlide(1)},50)}),n.API.add(s)):t||0!==n.currSlide?a.apply(n.API,[e,t]):(i=r.length-1,s=r[i],r=r.slice(0,i),n.container.one("cycle-slide-added",function(e,t){setTimeout(function(){t.currSlide=1,t.API.advanceSlide(-1)},50)}),n.API.add(s,!0)),void 0)}),o&&(s.next=function(){var e=this.opts();if(r.length&&e.currSlide==e.slideCount-1){var t=r[0];r=r.slice(1),e.container.one("cycle-slide-added",function(e,t){o.apply(t.API),t.container.removeClass("cycle-loading")}),e.container.addClass("cycle-loading"),e.API.add(t)}else o.apply(e.API)}),u&&(s.prev=function(){var e=this.opts();if(r.length&&0===e.currSlide){var t=r.length-1,n=r[t];r=r.slice(0,t),e.container.one("cycle-slide-added",function(e,t){t.currSlide=1,t.API.advanceSlide(-1),t.container.removeClass("cycle-loading")}),e.container.addClass("cycle-loading"),e.API.add(n,!0)}else u.apply(e.API)})}})}(jQuery),function(e){"use strict";e.extend(e.fn.cycle.defaults,{tmplRegex:"{{((.)?.*?)}}"}),e.extend(e.fn.cycle.API,{tmpl:function(t,n){var r=RegExp(n.tmplRegex||e.fn.cycle.defaults.tmplRegex,"g"),i=e.makeArray(arguments);return i.shift(),t.replace(r,function(t,n){var r,s,o,u,a=n.split(".");for(r=0;i.length>r;r++)if(o=i[r]){if(a.length>1)for(u=o,s=0;a.length>s;s++)o=u,u=u[a[s]]||n;else u=o[n];if(e.isFunction(u))return u.apply(o,i);if(void 0!==u&&null!==u&&u!=n)return u}return n})}})}(jQuery);(function(e){"use strict",e.fn.cycle.transitions.scrollVert={before:function(e,t,n,r){e.API.stackSlides(e,t,n,r);var i=e.container.css("overflow","hidden").height();e.cssBefore={top:r?-i:i,left:0,opacity:1,display:"block"},e.animIn={top:0},e.animOut={top:r?i:-i}}}})(jQuery);(function(e){"use strict";var t="ontouchend"in document;e.event.special.swipe=e.event.special.swipe||{scrollSupressionThreshold:10,durationThreshold:1e3,horizontalDistanceThreshold:30,verticalDistanceThreshold:75,setup:function(){var t=e(this);t.bind("touchstart",function(n){function r(t){if(!o)return;var n=t.originalEvent.touches?t.originalEvent.touches[0]:t;s={time:(new Date).getTime(),coords:[n.pageX,n.pageY]},Math.abs(o.coords[0]-s.coords[0])>e.event.special.swipe.scrollSupressionThreshold&&t.preventDefault()}var i=n.originalEvent.touches?n.originalEvent.touches[0]:n,s,o={time:(new Date).getTime(),coords:[i.pageX,i.pageY],origin:e(n.target)};t.bind("touchmove",r).one("touchend",function(n){t.unbind("touchmove",r),o&&s&&s.time-o.time<e.event.special.swipe.durationThreshold&&Math.abs(o.coords[0]-s.coords[0])>e.event.special.swipe.horizontalDistanceThreshold&&Math.abs(o.coords[1]-s.coords[1])<e.event.special.swipe.verticalDistanceThreshold&&o.origin.trigger("swipe").trigger(o.coords[0]>s.coords[0]?"swipeleft":"swiperight"),o=s=undefined})})}},e.event.special.swipeleft=e.event.special.swipeleft||{setup:function(){e(this).bind("swipe",e.noop)}},e.event.special.swiperight=e.event.special.swiperight||e.event.special.swipeleft})(jQuery);(function(e){"use strict";e.fn.cycle.transitions.scrollVertUp={before:function(e,t,n,r){e.API.stackSlides(e,t,n,r);var i=e.container.css("overflow","hidden").height();e.cssBefore={top:r?i:-i,left:0,opacity:1,display:"block"};e.animIn={top:0};e.animOut={top:r?-i:i}}}})(jQuery);!function(e){"use strict";e(document).on("cycle-bootstrap",function(e,t,n){"carousel"===t.fx&&(n.getSlideIndex=function(e){var t=this.opts()._carouselWrap.children(),n=t.index(e);return n%t.length},n.next=function(){var e=t.reverse?-1:1;t.allowWrap===!1&&t.currSlide+e>t.slideCount-t.carouselVisible||(t.API.advanceSlide(e),t.API.trigger("cycle-next",[t]).log("cycle-next"))})}),e.fn.cycle.transitions.carousel={preInit:function(t){t.hideNonActive=!1,t.container.on("cycle-destroyed",e.proxy(this.onDestroy,t.API)),t.API.stopTransition=this.stopTransition;for(var n=0;n<t.startingSlide;n++)t.container.append(t.slides[0])},postInit:function(t){var n,r,i,s,o=t.carouselVertical;t.carouselVisible&&t.carouselVisible>t.slideCount&&(t.carouselVisible=t.slideCount-1);var u=t.carouselVisible||t.slides.length,f={display:o?"block":"inline-block",position:"static"};if(t.container.css({position:"relative",overflow:"hidden"}),t.slides.css(f),t._currSlide=t.currSlide,s=e('<div class="cycle-carousel-wrap"></div>').prependTo(t.container).css({margin:0,padding:0,top:0,left:0,position:"absolute"}).append(t.slides),t._carouselWrap=s,o||s.css("white-space","nowrap"),t.allowWrap!==!1){for(r=0;r<(void 0===t.carouselVisible?2:1);r++){for(n=0;n<t.slideCount;n++)s.append(t.slides[n].cloneNode(!0));for(n=t.slideCount;n--;)s.prepend(t.slides[n].cloneNode(!0))}s.find(".cycle-slide-active").removeClass("cycle-slide-active"),t.slides.eq(t.startingSlide).addClass("cycle-slide-active")}t.pager&&t.allowWrap===!1&&(i=t.slideCount-u,e(t.pager).children().filter(":gt("+i+")").hide()),t._nextBoundry=t.slideCount-t.carouselVisible,this.prepareDimensions(t)},prepareDimensions:function(t){var n,r,i,s,o=t.carouselVertical,u=t.carouselVisible||t.slides.length;if(t.carouselFluid&&t.carouselVisible?t._carouselResizeThrottle||this.fluidSlides(t):t.carouselVisible&&t.carouselSlideDimension?(n=u*t.carouselSlideDimension,t.container[o?"height":"width"](n)):t.carouselVisible&&(n=u*e(t.slides[0])[o?"outerHeight":"outerWidth"](!0),t.container[o?"height":"width"](n)),r=t.carouselOffset||0,t.allowWrap!==!1)if(t.carouselSlideDimension)r-=(t.slideCount+t.currSlide)*t.carouselSlideDimension;else for(i=t._carouselWrap.children(),s=0;s<t.slideCount+t.currSlide;s++)r-=e(i[s])[o?"outerHeight":"outerWidth"](!0);t._carouselWrap.css(o?"top":"left",r)},fluidSlides:function(t){function n(){clearTimeout(i),i=setTimeout(r,20)}function r(){t._carouselWrap.stop(!1,!0);var e=t.container.width()/t.carouselVisible;e=Math.ceil(e-o),t._carouselWrap.children().width(e),t._sentinel&&t._sentinel.width(e),u(t)}var i,s=t.slides.eq(0),o=s.outerWidth()-s.width(),u=this.prepareDimensions;e(window).on("resize",n),t._carouselResizeThrottle=n,r()},transition:function(t,n,r,i,s){var o,u={},f=t.nextSlide-t.currSlide,l=t.carouselVertical,c=t.speed;if(t.allowWrap===!1){i=f>0;var h=t._currSlide,p=t.slideCount-t.carouselVisible;f>0&&t.nextSlide>p&&h==p?f=0:f>0&&t.nextSlide>p?f=t.nextSlide-h-(t.nextSlide-p):0>f&&t.currSlide>p&&t.nextSlide>p?f=0:0>f&&t.currSlide>p?f+=t.currSlide-p:h=t.currSlide,o=this.getScroll(t,l,h,f),t.API.opts()._currSlide=t.nextSlide>p?p:t.nextSlide}else i&&0===t.nextSlide?(o=this.getDim(t,t.currSlide,l),s=this.genCallback(t,i,l,s)):i||t.nextSlide!=t.slideCount-1?o=this.getScroll(t,l,t.currSlide,f):(o=this.getDim(t,t.currSlide,l),s=this.genCallback(t,i,l,s));u[l?"top":"left"]=i?"-="+o:"+="+o,t.throttleSpeed&&(c=o/e(t.slides[0])[l?"height":"width"]()*t.speed),t._carouselWrap.animate(u,c,t.easing,s)},getDim:function(t,n,r){var i=e(t.slides[n]);return i[r?"outerHeight":"outerWidth"](!0)},getScroll:function(e,t,n,r){var i,s=0;if(r>0)for(i=n;n+r>i;i++)s+=this.getDim(e,i,t);else for(i=n;i>n+r;i--)s+=this.getDim(e,i,t);return s},genCallback:function(t,n,r,i){return function(){var n=e(t.slides[t.nextSlide]).position(),s=0-n[r?"top":"left"]+(t.carouselOffset||0);t._carouselWrap.css(t.carouselVertical?"top":"left",s),i()}},stopTransition:function(){var e=this.opts();e.slides.stop(!1,!0),e._carouselWrap.stop(!1,!0)},onDestroy:function(){var t=this.opts();t._carouselResizeThrottle&&e(window).off("resize",t._carouselResizeThrottle),t.slides.prependTo(t.container),t._carouselWrap.remove()}}}(jQuery);!function(e){"use strict";function t(){try{this.playVideo()}catch(e){}}function n(){try{this.pauseVideo()}catch(e){}}var r='<div class=cycle-youtube><object width="640" height="360"><param name="movie" value="{{url}}"></param><param name="allowFullScreen" value="{{allowFullScreen}}"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="opaque"></param><embed src="{{url}}" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="{{allowFullScreen}}" wmode="opaque"></embed></object></div>';e.extend(e.fn.cycle.defaults,{youtubeAllowFullScreen:!0,youtubeAutostart:!1,youtubeAutostop:!0}),e(document).on("cycle-bootstrap",function(i,s){s.youtube&&(s.hideNonActive=!1,s.container.find(s.slides).each(function(t){if(void 0!==e(this).attr("href")){var n,i=e(this),o=i.attr("href"),u=s.youtubeAllowFullScreen?"true":"false";o+=(/\?/.test(o)?"&":"?")+"enablejsapi=1",s.youtubeAutostart&&s.startingSlide===t&&(o+="&autoplay=1"),n=s.API.tmpl(r,{url:o,allowFullScreen:u}),i.replaceWith(n)}}),s.slides=s.slides.replace(/(\b>?a\b)/,"div.cycle-youtube"),s.youtubeAutostart&&s.container.on("cycle-initialized cycle-after",function(n,r){var i="cycle-initialized"==n.type?r.currSlide:r.nextSlide;e(r.slides[i]).find("object,embed").each(t)}),s.youtubeAutostop&&s.container.on("cycle-before",function(t,r){e(r.slides[r.currSlide]).find("object,embed").each(n)}))})}(jQuery);