<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Represents the view for the public-facing component of the plugin.
 *
 * This typically includes any information, if any, that is rendered to the
 * frontend of the theme when the plugin is activated.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>
 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */

$id = $stream->id;
//$seo = $this->generalSettings->isSEOMode();
$seo = false;
$disableCache = isset($_REQUEST['disable-cache']);
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '0';

if ( ! in_array( 'curl', get_loaded_extensions() ) ) {
	echo "<p style='background: indianred;padding: 15px;color: white;'>Flow-Flow admin info: Your server doesn't have cURL module installed. Please ask your hosting to check this.</p>";
	return;
}

?>
<!-- Flow-Flow — Social streams plugin for Wordpress -->
<style id="ff-dynamic-styles-<?php echo $id;?>">
#ff-stream-<?php echo $id;?> .ff-header h1,#ff-stream-<?php echo $id;?> .ff-controls-wrapper > span:hover { color: <?php echo $stream->headingcolor;?>; }
#ff-stream-<?php echo $id;?> .ff-controls-wrapper > span:hover { border-color: <?php echo $stream->headingcolor;?> !important; }
#ff-stream-<?php echo $id;?> .ff-header h2 { color: <?php echo $stream->subheadingcolor;?>; }
#ff-stream-<?php echo $id;?> .ff-filter-holder .ff-filter,
#ff-stream-<?php echo $id;?> .ff-filter-holder:before,
#ff-stream-<?php echo $id;?> .ff-loadmore-wrapper .ff-btn:hover {
	background-color: <?php echo $stream->filtercolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-filter:hover,
#ff-stream-<?php echo $id;?> .ff-loadmore-wrapper .ff-btn,
#ff-stream-<?php echo $id;?> .ff-square:nth-child(1) {
	background-color: <?php echo $stream->headingcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-filter-holder .ff-search input {
	border-color: <?php echo $stream->filtercolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-filter-holder .ff-search:after {
	color: <?php echo $stream->filtercolor;?>;
}
#ff-stream-<?php echo $id;?>,
#ff-stream-<?php echo $id;?> .ff-search input,
#ff-stream-<?php echo $id;?>.ff-layout-compact .picture-item__inner {
	background-color: <?php echo $stream->bgcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-header h1, #ff-stream-<?php echo $id;?> .ff-header h2 {
	text-align: <?php echo $stream->hhalign;?>;
}
#ff-stream-<?php echo $id;?> .ff-controls-wrapper, #ff-stream-<?php echo $id;?> .ff-controls-wrapper > span {
	border-color: <?php echo $stream->filtercolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-controls-wrapper, #ff-stream-<?php echo $id;?> .ff-controls-wrapper > span {
	color: <?php echo $stream->filtercolor;?>;
}
<?php if($stream->layout == 'grid'):?>
#ff-stream-<?php echo $id;?> .ff-item, #ff-stream-<?php echo $id;?> .shuffle__sizer{
	width:  <?php echo $stream->width;?>px;
}
#ff-stream-<?php echo $id;?> .ff-item {
	margin-bottom: <?php echo $stream->margin;?>px !important;
}
#ff-stream-<?php echo $id;?> .shuffle__sizer {
	margin-left: <?php echo $stream->margin;?>px !important;
}
<?php endif?>
<?php if($stream->layout == 'grid' && $stream->theme == 'classic'):?>
#ff-stream-<?php echo $id;?>  .picture-item__inner {
	background: <?php echo $stream->cardcolor;?>;
	color: <?php echo $stream->textcolor;?>;
	box-shadow: 0 1px 4px 0 <?php echo $stream->shadow;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a,
#ff-stream-<?php echo $id;?> .ff-mob-link,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a {
	background-color: <?php echo $stream->textcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:after,
#ff-stream-<?php echo $id;?> .ff-mob-link:after,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:after {
	color: <?php echo $stream->cardcolor;?>;
}
#ff-stream-<?php echo $id;?>,
#ff-stream-<?php echo $id;?>-slideshow {
	color: <?php echo $stream->textcolor;?>;
}
#ff-stream-<?php echo $id;?> li,
#ff-stream-<?php echo $id;?>-slideshow li,
#ff-stream-<?php echo $id;?> .ff-square {
	background: <?php echo $stream->cardcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-icon, #ff-stream-<?php echo $id;?>-slideshow .ff-icon {
	border-color: <?php echo $stream->cardcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-style-2 .ff-icon:after {
	text-shadow: -1px 0 <?php echo $stream->cardcolor;?>, 0 1px <?php echo $stream->cardcolor;?>, 1px 0 <?php echo $stream->cardcolor;?>, 0 -1px <?php echo $stream->cardcolor;?>;
}
#ff-stream-<?php echo $id;?>  a, #ff-stream-<?php echo $id;?>-slideshow  a{
	color: <?php echo $stream->linkscolor;?>;
}

#ff-stream-<?php echo $id;?> h4, #ff-stream-<?php echo $id;?>-slideshow h4,
#ff-stream-<?php echo $id;?> .ff-name, #ff-stream-<?php echo $id;?>-slideshow .ff-name {
	color: <?php echo $stream->namecolor;?> !important;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:hover,
#ff-stream-<?php echo $id;?> .ff-mob-link:hover,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:hover {
	background-color: <?php echo $stream->namecolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-nickname,
#ff-stream-<?php echo $id;?>-slideshow .ff-nickname,
#ff-stream-<?php echo $id;?> .ff-timestamp,
#ff-stream-<?php echo $id;?>-slideshow .ff-timestamp {
	color: <?php echo $stream->restcolor;?> !important;
}
#ff-stream-<?php echo $id;?> .ff-item {
	text-align: <?php echo $stream->talign;?>;
}
#ff-stream-<?php echo $id;?> .ff-theme-classic.ff-style-1 .ff-item-meta:before,
#ff-stream-<?php echo $id;?> .ff-theme-classic.ff-style-2 .ff-item-meta:before,
#ff-stream-<?php echo $id;?> .ff-theme-classic.ff-style-6 .ff-item-meta:before,
#ff-stream-<?php echo $id;?> .ff-item-meta,
#ff-stream-<?php echo $id;?>-slideshow .ff-item-meta {
	border-color: <?php echo $stream->bcolor;?>;
}
<?php endif;?>
<?php if($stream->layout == 'grid' && $stream->theme == 'flat'):?>
#ff-stream-<?php echo $id;?> .picture-item__inner {
	background: <?php echo $stream->fcardcolor;?>;
	color: <?php echo $stream->ftextcolor;?>;
}
#ff-stream-<?php echo $id;?>, #ff-stream-<?php echo $id;?> h4,
#ff-stream-<?php echo $id;?>-slideshow, #ff-stream-<?php echo $id;?>-slideshow h4  {
	color: <?php echo $stream->ftextcolor;?>;
}
#ff-stream-<?php echo $id;?> li,
#ff-stream-<?php echo $id;?>-slideshow li,
#ff-stream-<?php echo $id;?> .ff-square {
	background: <?php echo $stream->fcardcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:after,
#ff-stream-<?php echo $id;?> .ff-mob-link:after,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:after {
	color: <?php echo $stream->fcardcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a,
#ff-stream-<?php echo $id;?> .ff-mob-link,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a {
	background-color: <?php echo $stream->ftextcolor;?>;
}
#ff-stream-<?php echo $id;?> a,
#ff-stream-<?php echo $id;?>-slideshow a {
	color: <?php echo $stream->fnamecolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-name,
#ff-stream-<?php echo $id;?>-slideshow .ff-name {
	color: <?php echo $stream->fnamecolor;?> !important;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:hover,
#ff-stream-<?php echo $id;?> .ff-mob-link:hover,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:hover {
	background-color: <?php echo $stream->fnamecolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-nickname, #ff-stream-<?php echo $id;?> .ff-timestamp,
#ff-stream-<?php echo $id;?>-slideshow .ff-nickname, #ff-stream-<?php echo $id;?>-slideshow .ff-timestamp {
	color: <?php echo $stream->frestcolor;?> !important;
}
#ff-stream-<?php echo $id;?> .ff-theme-flat h4,
#ff-stream-<?php echo $id;?> .ff-theme-flat .ff-content,
#ff-stream-<?php echo $id;?> .ff-item-meta,
#ff-stream-<?php echo $id;?>-slideshow .ff-item-meta {
	border-color: <?php echo $stream->fbcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-item {
	text-align: <?php echo $stream->ftalign;?>;
}
#ff-stream-<?php echo $id;?> .ff-style-1 .ff-no-image  .ff-item-cont:before,
#ff-stream-<?php echo $id;?> .ff-style-3 .ff-item-cont:before{
	background: <?php echo $stream->fscardcolor;?>;
}
<?php endif;;?>
<?php if($stream->mborder == 'yep'):?>
#ff-stream-<?php echo $id;?> .picture-item__inner {
	border: 1px solid #eee;
}
<?php endif;?>
<?php if($stream->layout == 'compact'): ?>
#ff-stream-<?php echo $id;?> li, #ff-stream-<?php echo $id;?>-slideshow li {
	background: <?php echo $stream->bgcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-item {
	text-align: <?php echo $stream->calign;?>;
}
#ff-stream-<?php echo $id;?>  .picture-item__inner, #ff-stream-<?php echo $id;?>, #ff-stream-<?php echo $id;?>-slideshow {
	color: <?php echo $stream->ctextcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a,
#ff-stream-<?php echo $id;?> .ff-mob-link,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a {
	background-color: <?php echo $stream->ctextcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:after,
#ff-stream-<?php echo $id;?> .ff-mob-link:after,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:after {
	color: <?php echo $stream->bgcolor;?>;
}
#ff-stream-<?php echo $id;?> a, #ff-stream-<?php echo $id;?>-slideshow a {
	color: <?php echo $stream->clinkscolor;?>;
}
#ff-stream-<?php echo $id;?>  h4,
#ff-stream-<?php echo $id;?>-slideshow  h4,
#ff-stream-<?php echo $id;?> .ff-name,
#ff-stream-<?php echo $id;?>-slideshow .ff-name {
	color: <?php echo $stream->cnamecolor;?> !important;
}
#ff-stream-<?php echo $id;?> .ff-share-wrapper a:hover,
#ff-stream-<?php echo $id;?> .ff-mob-link:hover,
#ff-stream-<?php echo $id;?>-slideshow .ff-share-wrapper a:hover {
	background-color: <?php echo $stream->cnamecolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-nickname,
#ff-stream-<?php echo $id;?>-slideshow .ff-nickname,
#ff-stream-<?php echo $id;?> .ff-timestamp,
#ff-stream-<?php echo $id;?>-slideshow .ff-timestamp {
	color: <?php echo $stream->crestcolor;?> !important;
}
#ff-stream-<?php echo $id;?>  .ff-c-style-2 .ff-item-cont:after {
	border-top-color: <?php echo $stream->bgcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-item-cont,
#ff-stream-<?php echo $id;?>-slideshow .ff-item-cont,
#ff-stream-<?php echo $id;?> .ff-item-meta,
#ff-stream-<?php echo $id;?>-slideshow .ff-item-meta {
	border-color: <?php echo $stream->cbcolor;?>;
}
#ff-stream-<?php echo $id;?> .ff-c-style-2 .ff-item-cont:before {
	border-top-color: <?php echo $stream->cbcolor;?>;
}
<?php endif;?>
<?php
  if(!empty($stream->css)) echo $stream->css;
?>
</style>
<div class="ff-stream" id="ff-stream-<?php echo $id;?>"><span class="ff-loader"><span class="ff-square" ></span><span class="ff-square"></span><span class="ff-square ff-last"></span><span class="ff-square ff-clear"></span><span class="ff-square"></span><span class="ff-square ff-last"></span><span class="ff-square ff-clear"></span><span class="ff-square"></span><span class="ff-square ff-last"></span></span></div>
<?php if ($seo || isset($_REQUEST['debug'])){
if (isset($_REQUEST['debug'])) define(WP_DEBUG, true);
if (!isset($_REQUEST['stream-id'])) $_REQUEST['stream-id'] = $id;?>
<script type="text/javascript">
	(function ( $ ) {
		"use strict";
		var opts = window.FlowFlowOpts;
		if (!opts) {
			window.console && window.console.log('no Flow-Flow options');
			return;
		}
		if (!window.FF_resource) {
			window.console && window.console.log('no required script');
			return
		}
		var streamData = <?php echo FlowFlow::get_instance()->processRequest()?>;
		var isMobile = /android|blackBerry|iphone|ipad|ipod|opera mini|iemobile/i.test(navigator.userAgent);
		var streamOpts = opts['streams']['id' + <?php echo $stream->id;?>];
		var $cont = $("#ff-stream-"+<?php echo $stream->id;?>);
		var script, style;
		if (FF_resource.scriptDeferred.state() === 'pending' && !FF_resource.scriptLoading) {
			script = document.createElement('script');
			script.src = "<?php echo plugins_url();?>/flow-flow/js/public.js";
			script.onload = function( script, textStatus ) {
				FF_resource.scriptDeferred.resolve();
			};
			document.body.appendChild(script);
			FF_resource.scriptLoading = true;
		}
		if (FF_resource.styleDeferred.state() === 'pending' && !FF_resource.styleLoading) {
			style = document.createElement('link');
			style.type = "text/css";
			style.rel = "stylesheet";
			style.href = "<?php echo plugins_url();?>/flow-flow/css/public.css";
			style.media = "screen";
			style.onload = function( script, textStatus ) {
				FF_resource.styleDeferred.resolve();
			};
			document.getElementsByTagName("head")[0].appendChild(style);
			FF_resource.styleLoading = true;
		}
		$.when( FF_resource.scriptDeferred, FF_resource.styleDeferred ).done(function ( data ) {
			var $stream = FlowFlow.buildStreamWith(streamData);
			var num = streamOpts.layout === 'compact' || (streamOpts.mobileslider === 'yep' && isMobile)? (streamOpts.mobileslider === 'yep' ? 3 : streamOpts['cards-num']) : false;
			var w;
			if (streamOpts.layout === 'compact') {
				w = $cont.parent().width();
				FlowFlow.adjustImgHeight($stream, (w > 300 ? 300 : w) - 72); // todo remove hardcode
			}
			$cont.append($stream);
			if (typeof $stream !== 'string') {
				FlowFlow.setupGrid($cont.find('.ff-stream-wrapper'), num, streamOpts.scrolltop === 'yep', streamOpts.gallery === 'yep', streamOpts, $cont);
			}
			setTimeout(function(){
				$cont.find('.ff-header').removeClass('ff-loading').end().find('.ff-loader').addClass('ff-squeezed');
			}, 0);
		});
	}(jQuery));
</script>
<?php
if (isset($_REQUEST['debug'])) {
	echo '<h1>DEBUG!!!</h1>';
	printf('<h2>%d queries. %s seconds.</h2>', get_num_queries(), timer_stop(0, 3));
}
} else { ?>
<script type="text/javascript">
var _ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
(function ( $ ) {
	"use strict";
	if (/MSIE 8/.test(navigator.userAgent)) return;
	var opts = window.FlowFlowOpts;
	if (!opts) {
		window.console && window.console.log('no Flow-Flow options');
		return;
	}
	if (!window.FF_resource) {
		window.console && window.console.log('no required script');
		return
	}
	var data = {
		'action': 'fetch_posts',
		'stream-id': '<?php echo $stream->id;?>',
		'disable-cache': '<?php echo $disableCache;?>',
		'page': '<?php echo $page;?>'};
	var isMobile = /android|blackBerry|iphone|ipad|ipod|opera mini|iemobile/i.test(navigator.userAgent);
	var streamOpts = opts['streams']['id' + data['stream-id']];
	var $cont = $("#ff-stream-"+data['stream-id']);
	var ajaxDeferred;
	var script, style;
	if (FF_resource.scriptDeferred.state() === 'pending' && !FF_resource.scriptLoading) {
		script = document.createElement('script');
		script.src = "<?php echo plugins_url();?>/flow-flow/js/public.js";
		script.onload = function( script, textStatus ) {
			FF_resource.scriptDeferred.resolve();
		};
		document.body.appendChild(script);
		FF_resource.scriptLoading = true;
	}
	if (FF_resource.styleDeferred.state() === 'pending' && !FF_resource.styleLoading) {
		style = document.createElement('link');
		style.type = "text/css";
		style.rel = "stylesheet";
		style.href = "<?php echo plugins_url();?>/flow-flow/css/public.css";
		style.media = "screen";
		style.onload = function( script, textStatus ) {
			FF_resource.styleDeferred.resolve();
		};
		document.getElementsByTagName("head")[0].appendChild(style);
		FF_resource.styleLoading = true;
	}
	$cont.addClass('ff-layout-' + streamOpts.layout)
	if (streamOpts.layout == 'grid' && !isMobile) $cont.css('minHeight', '1000px');
	ajaxDeferred = $.get(_ajaxurl, data);
	$.when( ajaxDeferred, FF_resource.scriptDeferred, FF_resource.styleDeferred ).done(function ( data ) {
		var response, $stream;
		var $errCont, errs, err;
		var num = streamOpts.layout === 'compact' || (streamOpts.mobileslider === 'yep' && isMobile)? (streamOpts.mobileslider === 'yep' ? 3 : streamOpts['cards-num']) : false;
		var w;

		try {
			response = JSON.parse(data[0]);
		} catch (e) {
			window.console && window.console.log('Flow-Flow gets invalid data from server');
			if (opts.isAdmin) {
				$errCont = $('<div class="ff-errors" id="ff-errors-invalid-response"><div class="ff-disclaim">If you see this then you\'re administrator and Flow-Flow got invalid data from server. Please provide this info if you\'re doing support request.</div><div class="ff-err-info"></div></div>')
				$cont.before($errCont);
				$errCont.find('.ff-err-info').html(data[0] == '' ? 'Empty response from server' : data[0])
			}
			return;
		}

		$stream = FlowFlow.buildStreamWith(response);

		if (streamOpts.layout === 'compact') {
			w = $cont.parent().width();
			FlowFlow.adjustImgHeight($stream, (w > 300 ? 300 : w) - 72); // todo remove hardcode
		}
		$cont.append($stream);
		if (typeof $stream !== 'string') {
			FlowFlow.setupGrid($cont.find('.ff-stream-wrapper'), num, streamOpts.scrolltop === 'yep', streamOpts.gallery === 'yep', streamOpts, $cont);
		}
		setTimeout(function(){
			$cont.find('.ff-header').removeClass('ff-loading').end().find('.ff-loader').addClass('ff-squeezed');
		}, 0);
		if (opts.isAdmin && response.errors && response.errors.length) {
			$errCont = $('<div class="ff-errors" id="ff-errors-'+response.id+'"><div class="ff-disclaim">If you see this then you\'re administrator and Flow-Flow got next errors from API. Please provide this info if you\'re doing support request.</div><div class="ff-err-info"></div></div>')
			$cont.before($errCont);
			errs = '', err;
			for (var i = 0, len = response.errors.length;i < len; i++) {
				err = response.errors[i];
				if (typeof err === 'string') {
					errs += '<p>' + err + '</p>';
				} else if (typeof err  === 'object') {
					if (err['type'] && err['message']) {
						errs += '<p>From: ' + (err['type'] ? err['type'].toUpperCase() : 'Unknown') + '<br>' + err['message'] + '</p>';
					}
				  else if ($.isArray(err)) {
						for (var j = 0, _l = err.length; j < _l; j++ ) {
							errs += '<p>' + err[j] + '</p>';
						}
					}
				}
			}
			$errCont.find('.ff-err-info').html(errs)
		}
	});
	return false;
}(jQuery));
</script>
<!-- Flow-Flow — Social streams plugin for Wordpress -->
<?php } ?>