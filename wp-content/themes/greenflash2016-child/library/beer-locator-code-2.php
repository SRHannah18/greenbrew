<div id="find-beer" class="outerwrap twelvecol first beer-locator">
	<div class="inner-wrap">
		<h2 class="image-replacement">Find Green Flash Beer in Your Area</h2>
			<form action="<?php bloginfo('wpurl'); ?>/find-beer/" name="the_beer_finder" id="the_beer_finder" method="post" >
				<p>
					<label for="locator-zip-code" class="label-what-is-zipcode">What's your zip code?</label>
					<input type="text" data-value="ZIP CODE" name="d" id="locator-zip-code" value="ZIP CODE" />
					<input type="submit" id="locator-submit" value="BEER ME" />
					<input type="hidden" value="GFB" name="custID">
					<?php // http://www.vtinfo.com/PF/product_finder.asp?custID=GFB ?>
				</p>
			</form>			
	</div> <?php // end .inner-wrap ?>
</div>