<?php

/** For not running file direct on url **/
if(!defined('ABSPATH')){
    header("Location: /");
    die("");
}

class jhktm_Admin 
{
    public function __construct()
    {
        add_action( 'admin_enqueue_scripts', [ $this, 'jhktm_admin_assets' ] );
    }

    public function jhktm_admin_assets()
    {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style('jhktm-admin-css', plugin_dir_url(__FILE__) . 'assets/css/jhktm-admin.css');
        wp_enqueue_script('jhktm-admin-js', plugin_dir_url(__FILE__) . 'assets/js/jhktm-shortcode-builder.js', array('jquery'), '1.0', true);
        wp_enqueue_script('wp-color-picker');
        
    }
}

new jhktm_Admin();