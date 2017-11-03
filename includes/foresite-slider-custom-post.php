<?php
add_action('init', 'foresite_slider_init');
function foresite_slider_init() {
  $foresite_slider_labels = array(
  'name'                 => _x('Foresite Slides', 'foresite-slider'),
  'singular_name'        => _x('foresite slider', 'foresite-slider'),
  'add_new'              => _x('Add Slide', 'foresite-slider'),
  'add_new_item'         => __('Add New Slide', 'foresite-slider'),
  'edit_item'            => __('Edit Foresite Slider', 'foresite-slider'),
  'new_item'             => __('New Foresite Slider', 'foresite-slider'),
  'view_item'            => __('View Foresite Slider', 'foresite-slider'),
  'search_items'         => __('Search Foresite Slider', 'foresite-slider'),
  'not_found'            => __('No Foresite Slider Items found', 'foresite-slider'),
  'not_found_in_trash'   => __('No Foresite Slider Items found in Trash', 'foresite-slider'), 
  '_builtin'             =>  false, 
  'parent_item_colon'    => '',  
  'menu_name'            => _x('Foresite Slider', 'admin menu', 'foresite-slider')
  );

  $foresite_slider_args = array(
    'labels'                => $foresite_slider_labels,
    'public'                => false,    
    'show_ui'               => true,
    'show_in_menu'          => true, 
    'query_var'             => false,
    'rewrite'               => false,
    'capability_type'       => 'post',
    'has_archive'           => false,
    'hierarchical'          => false, 
	  'exclude_from_search'   => true,	
    'menu_icon'             => 'dashicons-slides',
    'supports'              => array('title','editor','thumbnail')
  );

  register_post_type('foresite_slider',$foresite_slider_args);
}

/* Register Taxonomy */
add_action('init', 'foresite_slider_taxonomies');
function foresite_slider_taxonomies() {
  $labels = array(
    'name'              => _x( 'Category', 'foresite-slider' ),
    'singular_name'     => _x( 'Category', 'foresite-slider' ),
    'search_items'      => __( 'Search Category', 'foresite-slider' ),
    'all_items'         => __( 'All Category', 'foresite-slider' ),
    'parent_item'       => __( 'Parent Category', 'foresite-slider' ),
    'parent_item_colon' => __( 'Parent Category' , 'foresite-slider' ),
    'edit_item'         => __( 'Edit Category', 'foresite-slider' ),
    'update_item'       => __( 'Update Category', 'foresite-slider' ),
    'add_new_item'      => __( 'Add New Category', 'foresite-slider' ),
    'new_item_name'     => __( 'New Category Name', 'foresite-slider' ),
    'menu_name'         => __( 'Slider Category', 'foresite-slider' )
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'foresite_slider-category')
  );

  register_taxonomy('foresite_slider-category', array('foresite_slider'), $args);
}

function foresite_slider_rewrite_flush() {  
	foresite_slider_init();
  flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'foresite_slider_rewrite_flush' );


// Manage Category Shortcode wpcolumns
add_filter("manage_foresite_slider-category_custom_column", 'foresite_slider_category_columns', 10, 3);
add_filter("manage_edit-foresite_slider-category_columns", 'foresite_slider_category_manage_columns'); 
function foresite_slider_category_manage_columns($theme_columns) {
  $new_columns = array(
    'cb' => '<input type="checkbox">',
    'name' => __('Name'),
    'foresite_shortcode' => __('Slider Category Shortcode', 'foresite-slider' ),
    'slug' => __('Slug'),
    'posts' => __('Posts')
	);

  return $new_columns;
}

function foresite_slider_category_columns($out, $column_name, $theme_id) {
  $theme = get_term($theme_id, 'foresite_slider-category');
  switch ($column_name) {      
    case 'title':
      echo get_the_title();
      break;
    case 'foresite_shortcode':
  	  echo '[foresite-slider category="' . $theme_id. '"]';
      break;
    default:
      break;
  }
  return $out;
}
