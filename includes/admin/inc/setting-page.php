<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Setting page
function abcbiz_settings_page() {

        // Ensure the function is available
        if ( ! function_exists( 'get_plugin_data' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }   
      
        $plugin_file_path = dirname( dirname( dirname( plugin_dir_path( __FILE__ ) ) ) ) . '/abcbiz-multi.php';   
        if ( file_exists( $plugin_file_path ) ) {
            $plugin_data = get_plugin_data( $plugin_file_path );
            $plugin_name = $plugin_data['Name'];
            $plugin_version = $plugin_data['Version'];
        } else {
            $plugin_name = esc_html__('Plugin Name Not Found', 'abcbiz-multi');
            $plugin_version = esc_html__('Plugin Version Not Found', 'abcbiz-multi'); 
        }
    

    ?>
    <div class="wrap">
       
        <div id="abcbiz-custom-header" class="abcbiz-custom-header">
            <!-- Banner -->
            <div class="abcbiz-banner-area">
                <h1><?php echo esc_html__("Welcome to", "abcbiz-multi"); ?> <?php echo esc_html($plugin_name); ?></h1>  
                <p class="abcbiz-banner-version"><?php echo esc_html__("Version: ", "abcbiz-multi"); ?> <?php echo esc_html($plugin_version); ?></p>              
                <!-- Buttons -->
                <div class="abcbiz-resource-buttons">
                    <a href="https://abcplugin.com/abcbiz-multi-addons-for-elementor/" target="_blank" class="button button-secondary"><?php echo esc_html__("Demo", "abcbiz-multi"); ?></a>
                    <a href="https://abcplugin.com/" class="button button-secondary" target="_blank"><?php echo esc_html__("Documentation", "abcbiz-multi"); ?></a>
                    <a href="https://abcplugin.com/contact-us/" target="_blank" class="button button-secondary"><?php echo esc_html__("Support", "abcbiz-multi"); ?></a>
                </div>
            </div>         
        </div>

    </div>
    <?php
}