<?php
/**
 * Plugin generic functions file
 * @package Foresite Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to get plugin image sizes array
 * @package Foresite Slider
 * @since 1.0.0
 */
function foresite_get_unique() {
  static $unique = 0;
  $unique++;

  return $unique;
}

/**
 * Function to get post featured image
 * @package Foresite Slider
 * @since 1.0.0
 */
function foresite_get_post_featured_image($post_id = '') {
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');

  if (!empty($image)) $image = isset($image[0]) ? $image[0] : '';
  
  return $image;
}
