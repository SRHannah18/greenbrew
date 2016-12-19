<?php
/*
Template Name: Beer Finder
*/


?>

<?php get_header(); ?>
<?php if(isset($_POST['d'])) { ?>
<form action="http://www.vtinfo.com/PF/product_finder.asp?custID=GFB" id="the_beer_finder" target="beer_finder_iframe" method="post" >
<input type="hidden" data-value="ZIP" name="d" id="locator-zip-code" value="<?php echo $_POST['d']; ?>" />
<?php if(isset($_POST['b'])) { ?>
<input type="hidden" name="b" value="<?php echo $_POST['b']; ?>" />
<?php } else { ?>
<input type="hidden" name="b" value="" />
<?php } ?>
<input type="hidden" value="GFB" name="custID">
<input type="hidden" value="0" name="terr">
<input type="hidden" value="view" name="a">
<input type="hidden" value="0" name="p">
<input type="hidden" value="" name="lat">
<input type="hidden" value="" name="long">
<input type="hidden" value="" name="dbg">
<input type="hidden" name="t" value="" />
<input type="hidden" name="m" value="25" />
</form>
<script>
jQuery(document).ready(function($) {
   
   jQuery("#the_beer_finder").submit();

});
</script>
	
<?php } ?>	

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<div class="inner-wrap">
				

						<div id="main" class="twelvecol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>
									
								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									<p><iframe src="http://www.vtinfo.com/PF/product_finder.asp?custID=GFB" name="beer_finder_iframe" id="beerfinderiframe"></iframe></p>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer> <?php // end article footer ?>

								<?php //comments_template(); ?>

							</article> <?php // end article ?>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <?php // end #main ?>

						<?php //get_sidebar(); ?>
				</div> <?php // end .inner-wrap ?>
				</div> <?php // end #inner-content ?>

			</div> <?php // end #content ?>
			

<?php get_footer(); ?>
