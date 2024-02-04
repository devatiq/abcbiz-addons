<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Setting page
function abcbiz_home_page() {

    // Get the plugin data
    $abcbiz_plugin_data = get_abcbiz_multi_plugin_info();

    ?>
    <div class="wrap">
       
        <div id="abcbiz-custom-header" class="abcbiz-custom-header">
            <!-- Banner -->
            <div class="abcbiz-banner-area">
                <h1><?php echo esc_html__("Welcome to", "abcbiz-addons"); ?> <?php echo esc_html($abcbiz_plugin_data['Name']); ?></h1>  
                <p class="abcbiz-banner-version"><?php echo esc_html__("Version: ", "abcbiz-addons"); ?> <?php echo esc_html($abcbiz_plugin_data['Version']); ?></p>              
                <!-- Buttons -->
                <div class="abcbiz-resource-buttons">                
                                        
                    <a href="https://abcbizaddons.com/abcbiz-multi-addons-for-elementor/" target="_blank" class="button"><?php echo esc_html__("Demos", "abcbiz-addons"); ?></a>
                    
                    <a href="https://abcbizaddons.com/documentation/" class="button" target="_blank"><?php echo esc_html__("Documentation", "abcbiz-addons"); ?></a>
                   
                    <a href="https://abcbizaddons.com/contact-us/" target="_blank" class="button"><?php echo esc_html__("Support", "abcbiz-addons"); ?></a>     
                    
                    <a href="<?php echo esc_url(admin_url( 'admin.php?page=abcbiz_widgets_menu' )); ?>" class="button"><?php echo esc_html__( 'Avilable Widgets', 'abcbiz-addons' ); ?><span class="dashicons dashicons-arrow-right-alt"></span></a>
                </div>
            </div>         
        </div>

    </div>
    <?php
}
