<div id="sidebar1" class="sidebar threecol last clearfix" role="complementary">

	<?php if(!is_page()) { ?>
		<?php dynamic_sidebar( 'sidebar1' ); ?>
	

	<?php } else { ?>
		
		<?php

		if ($post->post_parent)	{

			$ancestors=get_post_ancestors($post->ID);
			$root=count($ancestors)-1;
			$parent = $ancestors[$root];
		} else {
			$parent = $post->ID;
		}

 		if($parent == 445) { ?>

			<?php dynamic_sidebar( 'sidebar3' ); // distributor sidebar ?>

		<?php } elseif($parent == 1228) { ?>

			<?php dynamic_sidebar( 'sidebar4' ); // retailer sidebar ?>

    	<?php } else { ?>

   			<?php dynamic_sidebar( 'sidebar2' ); ?>

        <?php } ?>

         <?php } ?>

</div>


