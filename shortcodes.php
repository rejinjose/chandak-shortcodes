<?php
/*
Plugin Name: Chandak Shortcodes
Plugin URI: https://quadnotion.com/
Description: Quadnotion bundle For King Composer plugin is a mega powerful extensions/addons collection for King Composer page builder.
Author: Quadnotion
Author URI: https://quadnotion.com/
Version: 1.0
*/
if ( ! defined( 'ABSPATH' ) ) exit;

if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

function chandak_group_shortcode_icon() {
    wp_enqueue_style('mytheme_shortcode_icon_css', plugins_url( 'css/icon.css' , __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'chandak_group_shortcode_icon' );

// require_once 'shortcodes/adam-render-portfolio.php';


if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    require_once ('shortcodes/quad-accordian.php');
    require_once ('shortcodes/portfolio-listing.php');
    require_once ('shortcodes/slide-in-text-img-banner.php');
}

// Check If King Composer is activate
function quadnotionuser_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'quadnotion_user_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) );

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

}
add_action( 'admin_init', 'quadnotionuser_required_plugin' );

function quadnotion_user_required_plugin_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}
?>
