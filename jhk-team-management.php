<?php
/*
Plugin Name: JHK Team Management
Plugin URL: https://wordpress.org/plugins/jhk-team-management/
Description: Simplify team collaboration plugin
Version: 1.0.0
Author: JHK Infotech
Author URI: https://www.jhkinfotech.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/** For not running file direct on url **/
if(!defined('ABSPATH')){
    header("Location: /");
    die("");
}

/** Activation of Plugin **/
function jhktm_plugin_activation(){

 }
register_activation_hook(__FILE__,'jhktm_plugin_activation');


/** Deactivation of Plugin **/
function jhktm_plugin_deactivation(){

}
register_deactivation_hook( __FILE__, 'jhktm_plugin_deactivation' );

/** Include common css file **/
function jhktm_enqueue_common_styles() {
    wp_enqueue_style('jhktm-common-styles', plugin_dir_url(__FILE__) . 'assets/css/jhktm-global.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'jhktm_enqueue_common_styles');
add_action('admin_enqueue_scripts', 'jhktm_enqueue_common_styles');

function jhktm_enqueue_public_styles() {
    wp_enqueue_style('jhktm-layout-styles', plugin_dir_url(__FILE__) . 'assets/css/jhktm-layout.css', array(), '1.0', 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap');
    wp_enqueue_style('jhktm-custom-font-awesome', plugin_dir_url(__FILE__) .'assets/css/jhktm-all.min.css', array(), '6.5.1', 'all');
    wp_enqueue_script('jhktm-layout-js', plugin_dir_url(__FILE__) . 'assets/js/jhktm-layout.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'jhktm_enqueue_public_styles');


/** Include the file of plugin **/
require_once('inc/jhktm-post-types.php');
require_once('lib/cmb2/init.php');
require_once('inc/jhktm-shortcode.php');
require_once('admin/jhktm-shortcode-generator.php');
require_once('admin/jhktm-admin.php');
require_once('inc/jhktm-metaboxes.php');