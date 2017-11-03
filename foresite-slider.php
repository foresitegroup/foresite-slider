<?php
/**
 * Plugin Name: Foresite Slider
 * Plugin URI: https://foresitegrp.com
 * Text Domain: foresite-slider
 * Description: Easy to add and display image slider
 * Author: Foresite Group
 * Version: 1.0.1
 * Author URI: https://foresitegrp.com
 *
 * @package WordPress
 * @author Foresite Group
 */

if (!defined('FSG_VERSION')) define( 'FSG_VERSION', '1.0.0' ); // Plugin version
if (!defined('FSG_VERSION_DIR')) define( 'FSG_VERSION_DIR', dirname( __FILE__ ) ); // Plugin dir
if (!defined('FSG_URL')) define( 'FSG_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
if (!defined('FSG_POST_TYPE')) define( 'FSG_POST_TYPE', 'foresite_slider' ); // Plugin post type

// Function file
require_once(FSG_VERSION_DIR . '/includes/foresite-function.php');

// Script
require_once(FSG_VERSION_DIR . '/includes/class-foresite-script.php');

// Post type file
require_once(FSG_VERSION_DIR . '/includes/foresite-slider-custom-post.php');

// Shortcode File
require_once(FSG_VERSION_DIR . '/includes/shortcode-foresite-slider.php');


// How it works file, Load admin files
if (is_admin() || (defined('WP_CLI') && WP_CLI)) {
  require_once(FSG_VERSION_DIR . '/includes/admin/foresite-how-it-works.php');
}