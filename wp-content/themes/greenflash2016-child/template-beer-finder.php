<?php
	/*
	Template Name: Beer-Finder
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
	 get_header();


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
	echo $content;

  ?>
  </div>
  </div>
  </div>
  </div>
  <style>

    
  </style>
  
  <?php
      
      $zip    = '';
      if($_GET['brand']){
        $brand  = $_GET['brand'];
      }else{
        $brand  = '0'; 
      }
      
      $miles      = '0';
      $type       = '0';
      $is_search  = 'no';
      if( $_POST['zip'] || $_GET['zip'] ){
        $is_search  = 'yes';
        if( $_POST['zip'] ){
          //echo 'go post zip '. $_POST['zip'] ;
          $zip    = $_POST['zip'];
        }
        
        if( $_GET['zip'] ){
          //echo 'go get zip '. $_GET['zip'] ;
          $zip    = $_GET['zip'];
        }
        
        $brand  = $_POST['brand'];
        $miles  = $_POST['miles'];
        $type   = $_POST['storeType'];
        $pages  = 100;
        
        if($miles == 0){
          $pages = 20;
        }else{
          $miles = $miles;
          $pages = 100;
        }
        
        switch($miles){ 
          case '0': 
            $zoom = '13'; 
          break; 
          case '1': 
            $zoom = '20'; 
          break; 
          case '5': 
            $zoom = '18'; 
          break; 
          case '10': 
            $zoom = '17'; 
          break; 
          case '25': 
            $zoom = '15'; 
          break; 
          case '50': 
            $zoom = '13'; 
          break; 
          case '100': 
            $zoom = '11'; 
          break; 
          default:
	          $zoom = '13';
	        break;
        }
        
         
        // GET API OPTIONS
        $custID = 'GFB';
        $secret = '66A0B0F4F14BGFB217F51B885F1';
        $parms = 'action=results&pagesize='.$pages.'&zip='.$zip;
        
        if($miles != '0'){
          $parms .= '&miles='.$miles;
        }
        
        if($brand != '0'){
          $parms .= '&brand='.str_replace(' ','+',$brand);
        }
        
        if($type != '0'){
          $parms .= '&storeType='.$type;
        }
        $parms .= '&custID=GFB&terr=1';
        //echo $parms;
        
        date_default_timezone_set('GMT');
        $stamp = date("D, j M Y H:i:00 T", time());
        $url = "https://www.vtinfo.com/PF/product_finder-service.asp";
        // https://www.vtinfo.com/PF/product_finder.asp?custID=GFB&terr=1
        $sigString = $stamp . $secret . $parms . $custID;
        $sigHash = hash('sha256',$sigString);
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL,$url .'?'. $parms);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vipCustID: '. $custID,'vipTimestamp: '. $stamp,'vipSignature: '. $sigHash)); 
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('action' => 'results', 'miles'=>$miles, 'storeType'=>$type, 'brand'=>$brand));
        $result     = curl_exec($ch);

        //print_r($result);
        $locations  = simplexml_load_string($result) or die("Error: Cannot create object");
        
        //print_r($results);
        
      }
  
      // GET API OPTIONS
      $custID = 'GFB';
      $secret = '66A0B0F4F14BGFB217F51B885F1';
      $parms = 'action=brands';
      date_default_timezone_set('GMT');
      $stamp = date("D, j M Y H:i:00 T", time());
      $url = "https://www.vtinfo.com/PF/product_finder-service.asp";
      $sigString = $stamp . $secret . $parms . $custID;
      $sigHash = hash('sha256',$sigString);
     
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL,$url .'?'. $parms);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('vipCustID: '. $custID,'vipTimestamp: '. $stamp,'vipSignature: '. $sigHash)); 
      
      curl_setopt($ch, CURLOPT_POSTFIELDS, array('action' => 'brands'));
      $result = curl_exec($ch);
      //print_r($result);
      $xml=simplexml_load_string($result) or die("Error: Cannot create object");
      ?>
  <div class="clear"></div>
  
  
  <!-- DESKTOP -->
  <div class="beer-finder-outer mobile-hide">
	  
	  <div class="beer-finder-wrapper clearfix">

	    <div class="beer-finder-map">
	      <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	      <div id="map" style="width: 100%; height: 700px;"></div>
	      <div class="desktop-hidden mobile-map-holder"></div>
	      <script type="text/javascript">
  	      
  	      function go_map(latitude, longitude, locations, zoom){
    	      console.log(zoom);
    	      var map = new google.maps.Map(document.getElementById('map'), {
  	          zoom: zoom,
  	          center: new google.maps.LatLng(latitude, longitude),
  	          mapTypeId: google.maps.MapTypeId.ROADMAP
  	        });
  	    
  	        var infowindow = new google.maps.InfoWindow();
            var marker, i;
  	    
  	        for (i = 0; i < locations.length; i++) {  
  	          marker = new google.maps.Marker({
  	            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
  	            map: map
  	          });
  	    
  	          google.maps.event.addListener(marker, 'click', (function(marker, i) {
  	            return function() {
    	            
    	            console.log(locations[i]);
    	            
  	              infowindow.setContent(locations[i][0]);
  	              infowindow.open(map, marker);
  	            }
  	          })(marker, i));
  	        }
    	      
  	      }
  	      
  	      
  	      var latitude    = '';
  	      var longitude   =  '';
  	      <?php 
    	      
    	      $mapLat   = '32.7157';
            $mapLong  = '-117.1611';
            $loopCOUNT = 1;
            $arraySize = count($locations->locations->location);
    	    if($arraySize >= 1){ ?>
	        var locations = [
	          <?php 

	            foreach($locations->locations->location AS $location){ 
	              
	              if($loopCOUNT == 1 ){
	                $mapLat   = $location->lat;
	                $mapLong  = $location->long;
	              }
	              
	              $infoHTML = '<div style="line-height: 14px; font-size: 12px;">';
  	            $infoHTML .= '<strong>'.$location->dba.'</strong><br />';
  	            $infoHTML .= $location->street.'<br />';
  	            $infoHTML .= $location->city.','.$location->state.' '.$location->zip.'<br />';
  	            $infoHTML .= $location->phone.'<br /><br />';
	         
	              $directions = str_replace(' ','+',$location->street);
	              $directions .= '+'.str_replace(' ','+',$location->city);
	              $directions .= '+'.str_replace(' ','+',$location->state);
	              $directions .= '+'.str_replace(' ','+',$location->zip);
	            
                $infoHTML .= '<a href="https://maps.google.com?daddr='.$directions.'" class="beer-finder-directions" target="_blank">Directions</a><br /><br />';
                $infoHTML .= '</div>';
	            ?>

	            ['<?php echo $infoHTML;?>',<?php echo $location->lat;?>,<?php echo $location->long;?>,<?php echo $loopCOUNT;?>]<?php if($arraySize != $loopCOUNT){ echo ',';}?>
	            
	            
	 
	          <?php 
	            $loopCOUNT = $loopCOUNT + 1;
	            } 
	            ?>
	        ];
	        
	        latitude  = <?php echo $mapLat; ?>;
          longitude = <?php echo $mapLong; ?>;
	        go_map(latitude, longitude, locations, <?php echo $zoom;?>);
	        <?php }else{ ?>
	          <?php 
  	          
  	          if(!$zip){
    	          $zip = '92101';
  	          }
  	          if(!$zoom){
    	          $zoom = '11';
  	          }
  	          
	          ?>
	          var data = {};
	          var url  = 'http://maps.googleapis.com/maps/api/geocode/json?address=<?php echo $zip;?>&sensor=false';
	          $.ajax({
                data: data,
                type: 'get',
                url: url,
                success: function(data){
                  locations = [];
                  console.log(data.results[0].geometry.location);
                  latitude  = data.results[0].geometry.location.lat;
                  longitude = data.results[0].geometry.location.lng;
                  go_map(latitude, longitude, locations, <?php echo $zoom;?>);
                },
                error: function(){
      
                }
            });  
	        <?php } // end if location check?>

          
	        
	      </script>
	    </div>
	    <!-- end -->
	    
	    
	    
	    <div class="beer-finder-form-wrapper contain-right padding-left-20">
	      
	      <h1>Find Green Flash Beer</h1>
	      <form action="/find-beer" method="post" class="beer-finder-form">
	        
	        <div class="float-50">
  	        <?php 
    	        if( $is_search == 'no'){
  	            $zip = '';
              } 
            ?>
	          <input type="text" name="zip" placeholder="Enter Zip" value="<?php echo $zip; ?>" class="find-beer-input" />
	          <button class="js-go-beer btn btn-large">FIND BEER</button>
	        </div>
	        <div class="float-50 padding-left-20">
	          
	          <select name="brand" class="select-gray">
	            <option value="0">ALL BEERS</option>
	            <?php
  	            function begins_with($haystack, $needle) {
                  return strpos($haystack, $needle) === 0;
                }
	              $brand_selected = $brand;
	              foreach($xml->brands->brand AS $brand){
	                $selected       = '';
	                if($brand_selected == $brand){
	                  $selected = 'selected="Selected"';
	                }
	                
	                if($_GET['beer']){
  	                if(str_replace('-',' ',$_GET['beer']) == strtolower($brand)){
  	                  $selected = 'selected="Selected"';
  	                }
	                }
	                
                  
                  
                  if (begins_with(strtolower($brand), "alpine")) {

                  }else{
                    echo '<option value="'.$brand.'" '.$selected.'>'.$brand.'</option>';
                  }
	                
	              }  
	              
	              
	              
	              
	            ?>
	          </select>
	          
	          <select name="miles" class="select-gray">
	             <option value="0" <?php if($miles == '0'){ echo 'selected="Selected"'; } ?>>ANY DISTANCE</option>
	            <option value="1" <?php if($miles == '1'){ echo 'selected="Selected"'; } ?>>1 Miles</option>
	            <option value="5" <?php if($miles == '5'){ echo 'selected="Selected"'; } ?>>5 Miles</option>
	            <option value="10" <?php if($miles == '10'){ echo 'selected="Selected"'; } ?>>10 Miles</option>
	            <option value="25" <?php if($miles == '25'){ echo 'selected="Selected"'; } ?>>25 Miles</option>
	            <option value="50" <?php if($miles == '50'){ echo 'selected="Selected"'; } ?>>50 Miles</option>
	            <option value="100" <?php if($miles == '100'){ echo 'selected="Selected"'; } ?>>100 Miles</option>
	          </select>
	          
	          <select name="storeType" class="select-gray">
	            <option value="0">ANY STORE TYPE</option>
	            <?php
	              $location_selected = $type;
	              $selected       = '';
	              foreach($xml->locations->location AS $location){
	                $selected       = '';
	                if($location_selected == $location->attributes()->code){
	                  $selected = 'selected="Selected"';
	                }
	                echo '<option value="'.$location->attributes()->code.'" '.$selected.'>'.$location.'</option>';
	              }  
	            ?>
	          </select>
	          
	        </div>
	        
	      </form>
	      
	      <div class="beer-finder-results">
	 
	        <script src="/wp-content/themes/greenflash2016-child/js/bxslider/jquery.bxslider.min.js"></script>
	        <link href="/wp-content/themes/greenflash2016-child/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
	        <div style="clear: both;"></div>
	        <?php if($arraySize >= 1){ ?>
	        <ul class="bxslider">
	          <?php foreach($locations->locations->location AS $location){ ?>
	          <li>
	            <strong><?php echo $location->dba;?></strong><br />
	            <?php echo $location->street;?><br />
	            <?php echo $location->city;?>, <?php echo $location->state;?> <?php echo $location->zip;?><br />
	            <?php echo $location->phone;?><br />
	            <?php 
	              $directions = str_replace(' ','+',$location->street);
	              $directions .= '+'.str_replace(' ','+',$location->city);
	              $directions .= '+'.str_replace(' ','+',$location->state);
	              $directions .= '+'.str_replace(' ','+',$location->zip);
	            ?>
	            
	            <a href="https://maps.google.com?daddr=<?php echo $directions; ?>" class="beer-finder-directions" target="_blank">Directions</a><br /><br />
	          </li>
	          <?php } ?>
	        </ul>
	        <script>
	          jQuery(document).ready(function($){
	            jQuery('.bxslider').bxSlider({
	              minSlides: 1,
	              maxSlides: 1,
	              slideWidth: 600,
	              slideMargin: 0,
	              pagerType:'short',
	              onSliderLoad: function(){
		              var pager = $('.bx-default-pager');
		              var newText = pager.text().replace('/', 'of');
		              pager.text(newText);
		              console.log(newText);
		            }
	            });
	          }); 
	        </script>
	        <?php }else{ ?>
	          <?php if( $is_search == 'yes'){ ?>
	            <div>No Results Found</div>     
            <?php } ?>  
	        <?php } ?>
	      </div>
	      
	      
	    </div>
	    <!-- end -->
	    <div style="clear:both;"></div>
	  </div>
  </div>
  
  <script>
    
    jQuery(window).load(function(){
      
      if( $(document).width() < 768 ){
        
        <?php if($_GET['beer']){ ?>
        //$('.beer-finder-form').submit();
        <?php } ?>
        
        
        $('.mobile-map-holder').html( $('.beer-finder-results').detach() );
        $('.bxslider li').css('text-align','left');
        $('.bx-wrapper').css('margin-top','20px !important');
        
        <?php if( $is_search == 'no'){ ?>
        $('.beer-finder-map').hide();
        <?php }  ?>
        
        //.bxslider li
        /*
        $('.beer-finder-map-mobile').removeClass('beer-finder-map');
        
        $('.mobile-map-holder').html( $('.beer-finder-map-mobile').html() );
        $('.beer-finder-map-mobile').addClass('desktop-hidden');
        
        $('.beer-finder-form-wrapper').addClass('beer-finder-form-wrapper-mobile');
        $('.beer-finder-form-wrapper-mobile').removeClass('beer-finder-form-wrapper');
        */
        
      }
      
    });
    
  </script>
  
<?php
get_footer();