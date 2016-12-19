<?php get_header(); ?>

      <div id="content">


        <div id="inner-content" class="wrap clearfix">

          <div class="page-banner-image">
            <?php if($deviceType != 'phone') { ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/tours/brewery-tours.jpg" alt="Brewery Tours" width="1400" height="300" />
            <?php } else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/tours/brewery-tours-mobile.jpg" alt="Brewery Tours" width="700" height="153" />
            <?php } ?>

          </div>



          <div class="inner-wrap">

            <div id="main" class="twelevecol first clearfix" role="main">

            <?php include('library/tasting-room-nav.php'); ?>

            <h1 class="archive-title h2 image-replacement">Tours</h1>

            <?php if(have_posts()) { ?>
            <table>
                <tr>
                  <th>Tour</th>
                  <th>Date / Time</th>
                  <th>Public / Private</th>
                  <!-- <th>Open Spots</th> -->
                  <th class="th-status">Register<span>Status</span></th>
                </tr>
            <?php } ?>
              <?php
              if (have_posts()) : while (have_posts()) : the_post(); // LIVE
              //while (have_posts()) : the_post(); // TESTING
              ?>


                <tr>
                <td><?php the_title(); ?></td>
                <td><?php espresso_event_date('F j, Y'); ?></td>
                <td class="event-category"><?php espresso_event_categories(); ?></td>
                <!-- <td><?php //espresso_event_tickets_available(); ?></td> -->

                <td><?php espresso_event_reg_button(); ?></td>
                </tr>


                <?php // end article section ?>



              <?php endwhile; ?>

              </table>



                  <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
                      <?php bones_page_navi(); ?>
                  <?php } else { ?>
                      <nav class="wp-prev-next">
                          <ul class="clearfix">
                            <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
                            <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
                          </ul>
                      </nav>
                  <?php } ?>



              <?php else : ?>

              </table>

              <!-- anyguide snippet -->
              <script src="https://www.anyguide.com/assets/integration.js"></script>
              <div id="iframe_wrapper"></div>
              <script language="javascript" type="text/javascript">
                (function(){
                  window.anyroad = new AnyRoad({
                    container: "#iframe_wrapper",
                    tours: { guide: 'katiew' },
                    iframe_style: { width: '100%', background: 'transparent' },
                    referrer: { name: "katiew", token: "katiew3oY" }
                  });
                })();
              </script>

                  <!-- Backup -->
                  <article id="post-not-found" class="hentry clearfix" style="display:none">
                    <header class="article-header">
                      <h1><?php _e( 'No Tours at this Time', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                      <p><?php _e( 'We have no tours scheduled at this time. Check back here in the future to schedule a tour. Thanks!', 'bonestheme' ); ?></p>
                    </section>
                  </article>

              <?php endif; ?>


              <p style="display:none!important"><img src="<?php bloginfo('template_directory') ?>/images/tours/tours-header.jpg" alt="The Green Flash Brewery" width="1000" height="667" /></p>

            </div> <?php // end #main ?>

            <?php //get_sidebar('espresso'); ?>

                </div> <?php // end #inner-content ?>
        </div> <?php // end .inner-wrap ?>
      </div> <?php // end #content ?>

<?php get_footer(); ?>
