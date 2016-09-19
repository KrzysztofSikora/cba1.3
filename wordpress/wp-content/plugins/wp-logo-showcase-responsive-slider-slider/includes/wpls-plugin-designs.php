<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'wpls_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */
function wpls_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.WPLS_POST_TYPE, __('Logo Showcase Pro Designs', 'logoshowcase'), __('Pro Designs', 'logoshowcase'), 'manage_options', 'wpls-designs', 'wpls_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */
function wpls_designs_page() {

	$wpsisac_feed_tabs = array(
								'design-feed' 	=> __('Plugin Designs', 'logoshowcase'),
								'plugins-feed' 	=> __('Our Plugins', 'logoshowcase')
							);

	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	?>
	
	<div class="wrap wpls-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpsisac_feed_tabs as $tab_key => $tab_val) {

				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => WPLS_POST_TYPE, 'page' => 'wpls-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_val; ?></a>

			<?php } ?>
		</h2>

		<div class="wpls-tab-cnt-wrp">
		<?php 
			if( isset($_GET['tab']) && $_GET['tab'] == 'plugins-feed' ) {
				echo wpls_get_plugin_design( 'plugins-feed' );
			} else {
				echo wpls_get_plugin_design();
			}
		?>
		</div><!-- end .wpls-tab-cnt-wrp -->

	</div><!-- end .wpls-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */
function wpls_get_plugin_design( $feed_type = '' ) {
	
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'design-feed';
	$transient_key 	= 'wpls_' . $active_tab;
	
	// Feed URL
	if( $feed_type == 'plugins-feed' ) {
		$url 			= 'http://wponlinesupport.com/plugin-data-api/plugins-data.php';
		$transient_key 	= 'wpos_plugins_feed';
	} else {
		$url = 'http://wponlinesupport.com/plugin-data-api/wp-logo-showcase-responsive-slider/wp-logo-showcase-responsive-slider.php';
	}
	
	$cache = get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, 172800 );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'logoshowcase' ) . '</div>';
		}
	}
	return $cache;
}