<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package Foresite Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'foresite_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package Foresite Slider
 * @since 1.0.0
 */
function foresite_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.FSG_POST_TYPE, __('How It Works', 'foresite-slider'), __('How It Works', 'foresite-slider'), 'manage_options', 'foresite-designs', 'foresite_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package Foresite Slider
 * @since 1.0.0
 */
function foresite_designs_page() { ?>
	<div id="post-body-content" style="width: 98%;">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					
					<h3 class="hndle">
						<span>How It Works</span>
					</h3>
					
					<div class="inside">
						<h3>Getting Started with Foresite Slider</h3>

						<strong>Create a Category</strong><br>
						You can deploy multiple sliders by creating multiple categories.
						<ol>
							<li>Go to "Foresite Slider > Slider Category".</li>
							<li>Fill in the name of the new category. The other fields are optional, depending on how the slider is being used.</li>
							<li>Click the "Add New Category" button.</li>
							<li>Make a note of the Slider Category Shortcode; you will need it later.</li>
						</ol><br>
						<br>

						<strong>Add Slides</strong><br>
						Add slides to the category.
						<ol>
							<li>Go to "Foresite Slider > Add Slide".</li>
							<li>Add a title. Slides will be automatically sorted based on title so it's advised to give them numeric titles like "Home 1", "Home 2", etc. Titles will not be displayed on the front-end, so they can be anything you want.</li>
							<li>In the text box, add the content of the slide.</li>
							<li>Set the featured image. This will be the background image of the slide.</li>
							<li>Select the category. Slides without a category will not show up.</li>
						</ol><br>
						<br>

						<strong>Adding a Slider to a Page</strong><br>
						<ol>
							<li>If you don't already have it, go to "Foresite Slider > Slider Category" and copy the shortcode for your slider.</li>
							<li>Edit the page you want the slider to appear on and paste in the shortcode.</li>
							<li>Save the page.</li>
						</ol>
						<br>
						You may also display a slider directly into a template using <code>&lt;?php echo do_shortcode('[foresite-slider category="25"]'); ?&gt;</code><br>
						<br>
						<br>

						<h3>Slider Parameters</h3>
						You can add certain parameters to the shortcode to alter the default behavior of the slider. There is no need to add a parameter if you desire the default behavior. You may use multiple parameters, such as <code>[foresite-slider category="25" arrows="true" dots="true"]</code><br>
						<br>

						<strong>Arrows</strong><br>
						<code>[foresite-slider category="25" arrows="true"]</code><br>
						Display arrows to advance the slider manually. The default setting is "false".<br>
						<br>

            <strong>Dots</strong><br>
						<code>[foresite-slider category="25" dots="true"]</code><br>
						Display dots to jump to a particular slide manually. The default setting is "false".<br>
						<br>

						<strong>Pause</strong><br>
						<code>[foresite-slider category="25" pause="false"]</code><br>
						Pause the slideshow while the mouse is hovered over it. The default setting is "true".<br>
						<br>

						<strong>Timeout</strong><br>
						<code>[foresite-slider category="25" timeout="7000"]</code><br>
						The amount of time in milliseconds that each slide will appear before automatically changing to the next slide. The default setting is "5000".<br>
						<br>

						<strong>Transition</strong><br>
						<code>[foresite-slider category="25" transition="scrollHorz"]</code><br>
						The transition style of one one slide to the next. Transition styles include <code>fade</code>, <code>fadeout</code>, <code>none</code> and <code>scrollHorz</code>. The default setting is "fade".<br>
						<br>

						<strong>Transition Speed</strong><br>
						<code>[foresite-slider category="25" speed="1000"]</code><br>
						The amount of time in milliseconds that it takes for one slide to change to the next. The default setting is "2000".
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>