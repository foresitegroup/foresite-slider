<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Foresite Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Foresite_Script {
	function __construct() {
		// Action to add style at front side
		add_action('wp_enqueue_scripts', array($this, 'foresite_front_style'));
		
		// Action to add script at front side
		add_action('wp_enqueue_scripts', array($this, 'foresite_front_script'));	
	}

	/**
	 * Function to add style on front end
	 * @package Foresite Slider
	 * @since 1.0.0
	 */
	function foresite_front_style() {
		// Registring and enqueing cycle slider css
		if( !wp_style_is('foresite-cycle-style', 'registered') ) {
			wp_register_style('foresite-cycle-style', FSG_URL.'assets/cycle.css', array(), FSG_VERSION);
			wp_enqueue_style('foresite-cycle-style');
		}
	}
	
	/**
	 * Function to add script on front end
	 * @package Foresite Slider
	 * @since 1.0.0
	 */
	function foresite_front_script() {
		// Registring cycle slider script
		if( !wp_script_is('foresite-cycle-jquery', 'registered')) {
			wp_register_script('foresite-cycle-jquery', FSG_URL.'assets/jquery.cycle2.min.js', array('jquery'), FSG_VERSION, true);
		}
		
		// Registring and enqueing public script
		// wp_register_script('foresite-public-script', FSG_URL.'assets/js/foresite-public.js', array('jquery'), FSG_VERSION, true);
		// wp_localize_script('foresite-public-script', 'Foresite', array(
		// 									 'is_mobile' => (wp_is_mobile()) ? 1 : 0,
		// 									 'is_rtl' => (is_rtl()) ? 1 : 0,
		// ));
	}
}

$foresite_script = new Foresite_Script();