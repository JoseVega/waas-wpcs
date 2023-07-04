<?php

namespace WaaSHost\Assets;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) )
    exit;

class Module
{
    public static function init()
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_confirm_cancel_button']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_wpcs_product_data_visibility']);
    }

    public static function enqueue_confirm_cancel_button()
    {
        if(\is_account_page())
        {
            $script_name = 'sub-confirm-cancel-button.js';
            $src = plugin_dir_url( __FILE__ ) . "/js/$script_name";
            $version = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . "js/$script_name" ));
            wp_enqueue_script('confirm-cancel-button', $src, ['jquery'], $version, true);
        }
    }

    public static function enqueue_wpcs_product_data_visibility()
    {
        $script_name = 'wpcs-product-data-visibility.js';
        $src = plugin_dir_url( __FILE__ ) . "/js/$script_name";
        $version = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . "js/$script_name" ));
        wp_enqueue_script('wpcs-product-data-visibility', $src, ['jquery'], $version, true);
    }
}
