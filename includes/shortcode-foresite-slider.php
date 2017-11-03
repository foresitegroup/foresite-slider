<?php 
function get_foresite_slider($atts, $content = null) {          
  extract(shortcode_atts(array(
    "category"   => '',
    "timeout"    => '5000',
    "speed"      => '2000',
    "transition" => 'fade',
    "pause"      => 'true',
    "dots"       => 'false',
    "arrows"     => 'false'
	), $atts));	

  $cat        = (!empty($category)) ? explode(',', $category) : '';
  $timeout    = (!empty($timeout)) ? $timeout : 5000;
  $speed      = (!empty($speed)) ? $speed : 2000;

  $slider_conf = ' data-cycle-timeout="' . $timeout . '"';
  $slider_conf .= ' data-cycle-speed="' . $speed . '"';
  if ($transition != "fade") $slider_conf .= ' data-cycle-fx="' . $transition . '"';
  if ($pause == "true") $slider_conf .= ' data-cycle-pause-on-hover="true"';
  if ($dots == "true") $slider_conf .= ' data-cycle-pager-template="<span></span>"';

	// Enqueus required script
	wp_enqueue_script('foresite-cycle-jquery');

	ob_start();	
	
	global $post;
	$unique 	 = foresite_get_unique();
	$post_type = 'foresite_slider';
	$orderby 	 = 'title';
	$order 		 = 'ASC';		

  $args = array ( 
	  'post_type'      => $post_type,
	  'orderby'        => $orderby,
	  'order'          => $order,
	  'posts_per_page' => $limit,
	);

	if ($cat != "") {
    $args['tax_query'] = array(
    	array('taxonomy'=> 'foresite_slider-category',
    				'field' 	=> 'id',
    				'terms' 	=> $cat)
    );
  }
  
  $query = new WP_Query($args);
  $post_count = $query->post_count;
  
  if ($query->have_posts()) :
		?>
    <div class="cycle-slideshow slideshow-<?php echo $unique; ?>" data-cycle-slides="> div" data-cycle-auto-height="false"<?php echo $slider_conf; ?>>
      <?php
      if ($arrows == "true") echo "<a href=\"#\" class=\"fs fs-arrow cycle-prev\"></a><a href=\"#\" class=\"fs fs-arrow cycle-next\"></a>\n";
      if ($dots == "true") echo "<span class=\"cycle-pager\"></span>\n";
      
      while ($query->have_posts() ) : $query->the_post();   
        $slider_img = foresite_get_post_featured_image($post->ID);
      ?>
        <div style="background-image: url(<?php echo $slider_img; ?>);">
          <div class="foresite-content site-width">
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
		<?php
  endif; 

  wp_reset_query();
	return ob_get_clean();
}
add_shortcode('foresite-slider','get_foresite_slider');