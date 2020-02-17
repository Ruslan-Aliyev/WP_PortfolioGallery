<?php 
/**
Plugin Name: Advance Portfolio Grid 
Plugin URI: https://wpbean.com/downloads/wpb-filterable-portfolio/
Description: Advance Portfolio Grid, a highly customizable most advance portfolio plugin for WordPress. Use this shortcode [wpb-portfolio]
Author: wpbean
Version: 1.04.6
Author URI: https://wpbean.com
text-domain: wpb_fp
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Internationalization
 */

function wpb_fp_textdomain() {
	load_plugin_textdomain( 'wpb_fp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'wpb_fp_textdomain' );



/**
 * Add plugin action links
 */

function wpb_portfolio_plugin_actions( $links ) {
   $links[] = '<a href="https://wpbean.com/downloads/wpb-filterable-portfolio/" target="_blank">'. esc_html__('Buy Pro Version', 'wpb_fp') .'</a>';
   $links[] = '<a href="'. menu_page_url('portfolio-settings', false) .'">'. esc_html__('Settings', 'wpb_fp') .'</a>';
   $links[] = '<a href="https://wpbean.com/support/" target="_blank">'. esc_html__('Support', 'wpb_fp') .'</a>';
   return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpb_portfolio_plugin_actions' );



/**
 * Plugin Activation redirect 
 */

if( !function_exists( 'wpb_fp_activation_redirect' ) ){
	function wpb_fp_activation_redirect( $plugin ) {
	    if( $plugin == plugin_basename( __FILE__ ) ) {
	        exit( wp_redirect( admin_url( 'edit.php?post_type=wpb_fp_portfolio&page=portfolio-settings' ) ) );
	    }
	}
}
add_action( 'activated_plugin', 'wpb_fp_activation_redirect' );


/**
 * Requred files 
 */

require_once dirname( __FILE__ ) . '/wpb_scripts.php';
require_once dirname( __FILE__ ) . '/wpb-fp-shortcode.php';
require_once dirname( __FILE__ ) . '/admin/wpb-fp-getting-options.php';
require_once dirname( __FILE__ ) . '/wpb-fp-post-type.php';
require_once dirname( __FILE__ ) . '/admin/wpb_aq_resizer.php';
require_once dirname( __FILE__ ) . '/admin/wpb-fp-admin.php';
require_once dirname( __FILE__ ) . '/admin/wpb-class.settings-api.php';
require_once dirname( __FILE__ ) . '/admin/wpb-settings-config.php';
require_once dirname( __FILE__ ) . '/wpb-portfolio.php';
require_once dirname( __FILE__ ) . '/wpb_fp_metabox.php';