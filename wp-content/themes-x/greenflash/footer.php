			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
					<div class="inner-wrap">

					<div id="footer-logo"><a href="<?php bloginfo('wpurl'); ?>">Taste Enlightenment</a></div>
					<div id="tasting-room-hours">Green Flash Tasting Room Open Tuesday-Sunday | Closed Monday: Private Events Only</div>
					<address>6550 Mira Mesa Blvd. San Diego, CA 92121  |  <a href="tel://+18586220085">858-622-0085</a>  |  <a href="mailto:<?php echo antispambot('info@greenflashbrew.com'); ?>"><?php echo antispambot('info@greenflashbrew.com'); ?></a></address>
					<div id="tasting-room-hours">Cellar 3 Tasting Room Open Wednesday-Sunday | Closed Monday + Tuesday: Private Events Only</div>
<address>12260 Crosthwaite Circle, Poway, CA 92064  |  <a href="tel://+18582633883">858-263-3883</a>  |  <a href="mailto:<?php echo antispambot('c3@greenflashbrew.com'); ?>"><?php echo antispambot('c3@greenflashbrew.com'); ?></a></address>



<ul id="social-links-footer">
						<?php 
						global $gfb_facebook; 
						global $gfb_twitter;
						global $gfb_instagram;
						global $gfb_youtube;
						?>
						<li><a target="_blank" href="<?php echo $gfb_facebook; ?>" id="facebook-footer">Facebook</a></li>
						<li><a target="_blank" href="<?php echo $gfb_twitter; ?>" id="twitter-footer">Twitter</a></li>
						<li><a target="_blank" href="<?php echo $gfb_instagram; ?>" id="instagram-footer">Instagram</a></li>
						<li><a target="_blank" href="<?php echo $gfb_youtube; ?>" id="youtube-footer">YouTube</a></li>
					</ul>

					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> Green Flash Brewing Co. All rights reserved.</p>

					</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-footer ?>

			</footer> <?php // end footer ?>

		</div> <?php // end #container ?>
		<div id="dim"></div>
		<div id="popup-content-wrapper1">
			<div id="popup-content-wrapper2">
				<div id="popup-close">CLOSE</div>
				<div id="popup-content"></div>
			</div>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <?php // end page. what a ride! ?>
