
<?php
/*
Template Name: Splash Page
*/

if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $post;

	if ( post_password_required() )
    {
		get_template_part( 'page' ); exit();
    }

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header('splash');

 	 // set up post data
	 setup_postdata( $post );

	 //check if we want to display breadcumb and title
	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 
	 do_action( 'ava_after_main_title' );

	 //filter the content for content builder elements
	 $content = apply_filters('avia_builder_precompile', get_post_meta(get_the_ID(), '_aviaLayoutBuilderCleanData', true));

	 //if user views a preview me must use the content because WordPress doesn't update the post meta field
	if(is_preview())
	{
		$content = apply_filters('avia_builder_precompile', get_the_content());
	}

	 //check first builder element. if its a section or a fullwidth slider we dont need to create the default openeing divs here

	 $first_el = isset(ShortcodeHelper::$tree[0]) ? ShortcodeHelper::$tree[0] : false;
	 $last_el  = !empty(ShortcodeHelper::$tree)   ? end(ShortcodeHelper::$tree) : false;
	 if(!$first_el || !in_array($first_el['tag'], AviaBuilder::$full_el ) )
	 {
        echo avia_new_section(array('close'=>false,'main_container'=>true, 'class'=>'main_color container_wrap_first'));
	 }
	
	$content = apply_filters('the_content', $content);
	$content = apply_filters('avf_template_builder_content', $content);
	//echo $content;
?>

<div style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; background: url(/wp-content/uploads/2014/01/splash-bg.jpg) center center; background-size: cover; background-repeat: no-repeat;">
  

  <table width="100%" height="100%" class="splash-wrapper splash-no-padding">
    <tr>
      <td valign="middle" align="center" class="splash-align-middle">
        <!-- -->
        <div class="age-gate-div">
          <table class="age-gate-table splash-no-padding">
            <tr class="splash-no-padding">
              <td class="splash-row-01" align="center">You must be at least 21 to enter</td>
            </tr>
            <tr>
              <td class="splash-row-02 splash-no-padding" align="center"><div>Are you</div></td>
            </tr>
            <tr class="splash-no-padding">
              <td class="splash-row-03 splash-no-padding" align="center">
                <!-- -->
                <table width="80%" class="splash-row-03-table splash-no-padding" align="center">
                  <tr>
                    <td class="splash-row-03-col-01" valign="middle" width="20%"><div>over</div></td>
                    <td class="splash-row-03-col-02" width="100%">Twenty One?</td>
                  </tr>
                </table>
                <!-- -->
              </td>
            </tr>
            <tr>
              <td class="splash-row-03">
                <!-- -->
                <table width="100%" class="splash-no-padding">
                  <tr>
                    <td width="1" align="right" class="splash-row-04-col-01 splash-no-padding"><a href="/home" class="go-age-gate">Yes</a></td>
                    <td width="100" class="splash-row-04-col-02 splash-no-paddinggg"><div>or</div></td>
                    <td width="1" align="left" class="splash-row-04-col-03 splash-no-padding"><a href="https://www.facebook.com/GreenFlashBrew">No</a></td>
                  </tr>
                </table>
                <!-- -->
              </td>
            </tr>
          </table>
        </div>
        <!-- -->
      </td>
    </tr>
  </table>
  
  <!-- 
  <div class="splash-inner">
    <div class="splash-sp first-sp">You must be at least 21 to enter</div>
    <div class="splash-rw first-rw">Are you</div>
    <div class="middle-line">
    <div class="splash-sp second-sp">over</div>
    <div class="splash-fran">Twenty One?</div>
    </div>
    <div class="lower-section">
    <div class="splash-rw lower-rw"><a href="/home" class="go-age-gate">Yes</a></div>
    <div class="splash-sp third-sp">or</div>
    <div class="splash-rw lower-rw"><a href="https://www.facebook.com/GreenFlashBrew">No</a></div>
    </div>
  </div> -->
  
</div>


<?php

	$avia_wp_link_pages_args = apply_filters('avf_wp_link_pages_args', array(
																			'before' =>'<nav class="pagination_split_post">'.__('Pages:','avia_framework'),
														                    'after'  =>'</nav>',
														                    'pagelink' => '<span>%</span>',
														                    'separator'        => ' ',
														                    ));

	wp_link_pages($avia_wp_link_pages_args);

	
	
	//only close divs if the user didnt add fullwidth slider elements at the end. also skip sidebar if the last element is a slider
	if(!$last_el || !in_array($last_el['tag'], AviaBuilder::$full_el_no_section ) )
	{
		$cm = avia_section_close_markup();

		echo "</div>";
		echo "</div>$cm <!-- section close by builder template -->";

		//get the sidebar
		if (is_singular('post')) {
		    $avia_config['currently_viewing'] = 'blog';
		}else{
		    $avia_config['currently_viewing'] = 'page';
		}
		get_sidebar();
	}
	else
	{
		echo "<div><div>";
		
	}


echo avia_sc_section::$close_overlay;
echo '		</div><!--end builder template-->';
echo '</div><!-- close default .container_wrap element -->';
?>
<script>
  jQuery(window).load(function(){
    
    jQuery('.splash-row-01').html('You must be at least 21 to enter');
    jQuery('.splash-row-02 splash-no-padding').html('<div>Are you</div>');
    
    jQuery('.age-gate-div').fadeIn(700);
    
    
    
  });
  jQuery(document).ready(function(){
    
    function setCookie(cname, cvalue, exdays) {
      console.log('go cookie function');
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + "; " + expires;
      
      window.location = '/home';
    }
    
    jQuery('.go-age-gate').click(function(){
      var ageverify = 'yes'
      setCookie("ageverify", ageverify, 365);
      console.log('go cookie');
      return false;
    });
    
    
  });
  
</script>
