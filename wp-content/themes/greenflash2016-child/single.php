<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();

	$title  = __('Blog - Latest News', 'avia_framework'); //default blog title
	$t_link = home_url('/');
	$t_sub = "";
	
	$custom_file_upload = get_field('photos_upload');
	
	if(avia_get_option('frontpage') && $new = avia_get_option('blogpage'))
	{
		$title 	= get_the_title($new); //if the blog is attached to a page use this title
		$t_link = get_permalink($new);
		$t_sub =  avia_post_meta($new, 'subtitle');
	}

	if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title(array('heading'=>'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub));
	
	do_action( 'ava_after_main_title' );

?>
		<div id="banner-section" class="avia-section main_color avia-section-default avia-no-border-styling avia-full-stretch avia-bg-style-scroll  avia-builder-el-0  el_before_av_section  avia-builder-el-first  banner container_wrap fullsize" style="background-repeat: no-repeat; background-image: url(/wp-content/uploads/2016/05/banner-press-release.jpg); background-attachment: scroll; background-position: center center; " data-section-bg-repeat="stretch">
			<div class="container">
				<main role="main" itemprop="mainContentOfPage" class="template-page content  av-content-full alpha units">
					<div class="post-entry post-entry-type-page post-entry-10833">
						<div class="entry-content-wrapper clearfix">
							<div class="avia-image-container  av-styling-   avia-builder-el-1  avia-builder-el-no-sibling   avia-align-center " itemscope="itemscope" itemtype="https://schema.org/ImageObject">
								<div class="avia-image-container-inner">
									<img class="avia_image " src="/wp-content/uploads/2016/05/headline-press-release.png" alt="" title="headline-press-room" itemprop="contentURL">
								</div>
							</div>
						</div>
					</div>
				</main><!-- close content main element -->
			</div>
		</div>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>' style='background-color: #eeece9;'>

			<div class='container template-blog template-single-blog '>

				<main class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>

                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-index.php and that will be used instead.
                    *
                    */

                        get_template_part( 'includes/loop', 'index' );
						
                        //show related posts based on tags if there are any
                        get_template_part( 'includes/related-posts');

                        //wordpress function that loads the comments template "comments.php"
                        comments_template();

                    ?>

				<!--end content-->
				<?php if ($custom_file_upload['url'] != '') : ?>
					<div class="clear"></div>
					<div class="press-file-upload"><a href="<?php echo $custom_file_upload['url'] ?>" class="btn btn-large">Download Photos</a></div>
				<?php endif; ?>
				
				</main>

				<?php
				$avia_config['currently_viewing'] = "blog";
				//get the sidebar
				get_sidebar();


				?>


			</div><!--end container-->

		</div><!-- close default .container_wrap element -->
		
		<div id="press-release-footer" class="avia-section main_color avia-section-default avia-no-border-styling container_wrap fullsize thin-bar">
			<div class="container">
				<main role="main" itemprop="mainContentOfPage" class="template-page content  av-content-full alpha units">
					<div class="post-entry post-entry-type-page post-entry-10833">
						<div class="entry-content-wrapper clearfix">
							<div class="press-footer-link"><a href="/press-room">Press Room</a></div>
							<div class="press-footer-nav">
								<div class="prev-btn"><a href="#" class="btn btn-small">Previous</a></div>
								<div class="next-btn"><a href="#" class="btn btn-small">Next</a></div>
							</div>
						</div>
					</div>
				</main><!-- close content main element -->
			</div>
		</div>

<?php get_footer(); ?>