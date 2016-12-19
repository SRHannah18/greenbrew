<?php
/*
Template Name: Splash Page
*/
?>

<?php 
get_header('splash'); 
?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol first clearfix" role="main">

						<div id="splash-content">

                         <img class="no-mobile" src="<?php bloginfo('template_directory'); ?>/images/txt-are-you-twenty-one-820x619-3.png" alt="You must be at least 21 to enter. Are You over Twenty One? Yes or No." width="820" height="619" />
                         
                         <p class="hide at-least-21 double-lines">You must be at least 21 to enter.</p>
                         <p class="hide"><span class="are-you">Are you</span> <span class="double-lines">over</span> <span class="twenty-one">twenty-one?</span></p> 
                         <a id="yes" href="<?php bloginfo('wpurl'); ?>/home">YES</a>  <span class="hide double-lines">or</span> <a id="no" href="https://www.facebook.com/GreenFlashBrew">NO</a>
                         </div>

						</div> <?php // end #main ?>

						

				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>

<?php get_footer('splash'); ?>