<?php 
	global $wpdb;

	$_GET = stripslashes_deep($_GET);
	$anyguide_message = '';

	// Snippet Types
	$snippet_types = array(
	  'contact' => "Contact Form",
	  'curated' => "Curated Tours List",
	  'tours' => "Tours Listing"
	);

	if(isset($_GET['any_msg'])){
		$anyguide_message = abs(intval($_GET['any_msg']));
	}

	function anyguide_successfully_saved() {
	  ?>
      <div class="AnyNotification clearfix" id="system_notice_area">
        <div class="pull-left Message">
          <i class="fa fa-info-circle"></i> Your Anyguide Snippet was successfully saved
        </div>
        <div class="pull-right Close">
          <span id="system_notice_area_dismiss">
            <i class="fa fa-times-circle"></i> Close
          </span>
        </div>
      </div>
    <?php
	}

	function anyguide_successfully_deleted() {
	  ?>
      <div class="AnyNotification clearfix" id="system_notice_area">
        <div class="pull-left Message">
          <i class="fa fa-info-circle"></i> Your Anyguide Snippet was successfully deleted
        </div>
        <div class="pull-right Close">
          <span id="system_notice_area_dismiss">
            <i class="fa fa-times-circle"></i> Close
          </span>
        </div>
      </div>
    <?php
	}

	function anyguide_not_found() {
	  ?>
      <div class="AnyNotification clearfix" id="system_notice_area">
        <div class="pull-left Message">
          <i class="fa fa-info-circle"></i> Anyguide Snippet not found
        </div>
        <div class="pull-right Close">
          <span id="system_notice_area_dismiss">
            <i class="fa fa-times-circle"></i> Close
          </span>
        </div>
      </div>
    <?php
	}

	function anyguide_existing_snippet_notice() {
	  ?>
      <div class="AnyNotification clearfix" id="system_notice_area">
        <div class="pull-left Message">
          <i class="fa fa-info-circle"></i> This Snippet already exists
        </div>
        <div class="pull-right Close">
          <span id="system_notice_area_dismiss">
            <i class="fa fa-times-circle"></i> Close
          </span>
        </div>
      </div>
    <?php
	}

	add_action('admin_notices', 'anyguide_successfully_saved');
	add_action('admin_notices', 'anyguide_successfully_deleted');
	add_action('admin_notices', 'anyguide_not_found');

	if ($anyguide_message == 1 || $anyguide_message == 5) { anyguide_successfully_saved(); }
	if ($anyguide_message == 2) { anyguide_not_found(); }
	if ($anyguide_message == 3) { anyguide_successfully_deleted(); }
?>

<div class="AnyguideWrapper">
	<div class="Header">
		<div class="Navbar clearfix">
		  <div class="pull-left">
		    <ul class="list-inline">
		      <li>
		        <img src="<?php echo plugins_url('assets/images/anyguide_logo.png', dirname(__FILE__)) ?>" class="img-responsive" style="height: 40px;">
		      </li>
		      <li class="navbtn">
		        <a href="<?php echo admin_url('admin.php?page=anyguide-settings');?>">Settings</a>
		      </li>
		      <li class="navbtn">
		        <a href="<?php echo admin_url('admin.php?page=anyguide-help');?>">Help</a>
		      </li>
		    </ul>
		  </div>
		</div>
		<div class="clouds-sm"></div>
	</div>

	<div class="AnySection">
		<div class="container">
			<div class="row">
			  <!-- Snippets -->
			  <div class="col-md-9">
					<?php 
						global $wpdb;
						$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
						$limit = get_option('anyguide_limit');			
						$offset = ( $pagenum - 1 ) * $limit;
						$entries = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."anyguide_short_code ORDER BY id DESC LIMIT $offset,$limit" );
					?>
			    <div class="SnippetsContainer">
			      <ul class="SnippetList">
							<?php 
								if (count($entries) > 0) {
									$count = 1;
									foreach($entries as $entry) {
										?>
										<li class="IndividualSnippet">
											<div class="row">

												<div class="SnippetInfo col-md-5 col-sm-12">
													<i class="fa fa-server"></i>
													<span class="Type">
														<?php echo esc_html($snippet_types[$entry->type]); ?>
													</span>
												</div>

												<div class="SnippetTitle col-md-5">
													<div class="divider hidden-md hidden-sm hidden-xs"></div>
													<?php $short_code = '[anyguide snippet="'.esc_html($entry->title).'"]'; ?>										
													<div class="input-group ">
														<span class="input-group-addon"><i class="fa fa-code"></i></span>    
														<input type="text" class="form-control" value='<?php echo $short_code ?>' onClick="this.setSelectionRange(0, this.value.length)">
													</div>
												</div>

												<div class="SnippetActions  col-md-2 col-sm-6 col-xs-12 text-center">
													<span class="divider hidden-xs"></span>
													<span class="Buttons">
														<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Edit Snippet" href="<?php echo admin_url('admin.php?page=anyguide-manage&action=snippet-edit&snippetId=' . $entry->id . '&pageno='.$pagenum); ?>">
															<i class="fa fa-cogs"></i> 
														</a>

														<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Delete Snippet" href="<?php echo admin_url('admin.php?page=anyguide-manage&action=snippet-delete&snippetId=' . $entry->id . '&pageno='.$pagenum); ?>" onclick="javascript: return confirm('Are you sure you want to delete this Snippet? This action can\'t be undone');">
															<i class="fa fa-trash-o"></i> 
														</a>
													</span>
												</div>

												<div class="SnippetState">
													<i class="fa fa-check"></i>
												</div>
											</div>

										</li>
									<?php
										$count++;
										}
								} else { ?>
									<div class="row">
                    <div class="col-md-8 col-md-offset-3">
                      <div class="">
                        <div class="box">
                        <div class="box-content">
                            <h1 class="tag-title">You're Almost done</h1>
                            <hr />
                            <p class="text-center">
                              Do you have your <b>Slug</b> & <b>Token</b> already?
                            </p>

                            <p class="text-center">
                              This Plugin connects to your <a target="_blank" href="http://www.anyguide.com/?utm_source=landingpage&utm_medium=wordpress-backend&utm_campaign=wordpress-plugin">Anyguide</a> 
                              Account and provides a <b>Beautiful checkout experience</b> for your Guests. You can <b>Accept online payments and deposits</b> and much more, totally Free!
                            </p>

                            <br>
                            <br>

                            <p class="text-center">
                              If you don't have an Account yet please don't hesitate to fill out the form below and
                              we will get back to you in less than a Business Day.
                            </p>

                            <p>
                              <div id="mc_embed_signup">
                              <form action="//AnyGuide.us11.list-manage.com/subscribe/post?u=976789ce1674fad1d398ed652&amp;id=664ec25665" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                              <div id="mc_embed_signup_scroll">
                              <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                              <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                              </label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                              </div>
                              <div class="mc-field-group">
                                <label for="mce-FNAME">First Name  <span class="asterisk">*</span>
                              </label>
                                <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
                              </div>
                              <div class="mc-field-group">
                                <label for="mce-LNAME">Last Name </label>
                                <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                              </div>
                              <div class="mc-field-group">
                                <label for="mce-WEBSITE">Website  <span class="asterisk">*</span>
                              </label>
                                <input type="text" value="" name="WEBSITE" class="required" id="mce-WEBSITE">
                              </div>
                                <div id="mce-responses" class="clear">
                                  <div class="response" id="mce-error-response" style="display:none"></div>
                                  <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                  <div style="position: absolute; left: -5000px;"><input type="text" name="b_976789ce1674fad1d398ed652_664ec25665" tabindex="-1" value=""></div>
                                  <div class="clear"><input type="submit" value="Continue" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                  </div>
                              </form>
                              </div>
                              <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                              <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[4]='WEBSITE';ftypes[4]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                            </p>
                        </div>
                    </div>
                      </div>
                    </div>         
                  </div>
							<?php } ?>

			      </ul>

			      <!-- Pagination -->
			      <?php
							$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."anyguide_short_code" );
							$num_of_pages = ceil( $total / $limit );

							$page_links = paginate_links( array(
								'base' => add_query_arg( 'pagenum','%#%'),
								'format' => '',
								'prev_text' =>  '&laquo;',
								'next_text' =>  '&raquo;',
								'total' => $num_of_pages,
								'current' => $pagenum
							) );

							if ( $page_links ) {
								echo '<ul class="AnyPagination pull-right">' . $page_links . '</ul>';
							}
						?>

			    </div>         
			  </div>

			  <!-- Sidebar -->
			  <div class="col-md-3">
			    <div class="Sidebar">
			      <a href="<?php echo admin_url('admin.php?page=anyguide-manage&action=snippet-add');?>" class="add-new-snippet-button btn-block" id="trackNewSnippet">
			        <i class="fa fa-plus-circle"></i> New Snippet
			      </a>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>