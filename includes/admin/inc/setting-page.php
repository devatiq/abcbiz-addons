<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Setting page
function abcbiz_settings_page() {
    ?>
    <div class="wrap">
       
        <div id="abcbiz-custom-header" class="abcbiz-custom-header">
            <!-- Banner -->
            <div class="abcbiz-banner-area">
                <h1>Welcome to ABCBiz Addons Pro for Elementor</h1>
                <!-- Buttons -->
                <div class="abcbiz-resource-buttons">
                    <a href="https://abcplugin.com/abcbiz-multi-addons-for-elementor/" target="_blank" class="button button-secondary">Demo</a>
                    <a href="https://abcplugin.com/" class="button button-secondary" target="_blank">Documentation</a>
                    <a href="https://abcplugin.com/widgets/contact-us" target="_blank" class="button button-secondary">Support</a>
                </div>
            </div>          

        
        </div>

        <!-- Original Settings Form -->   
        <form method="post" action="options.php">
            <?php
            settings_errors();
            settings_fields('abcbiz_settings_menu'); // Use the settings menu slug
            do_settings_sections('abcbiz_settings_menu'); // Use the settings menu slug
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


function abcbiz_settings_init() {
    // Register a new setting for "ABCBiz Settings" page
    register_setting('abcbiz_settings_menu', 'abcbiz_options');

    // Add a new section to a settings page
    add_settings_section(
        'abcbiz_settings_section',
        esc_html__('ABCBiz Custom Settings', 'abcbiz-multi'), // Localized title
        'abcbiz_settings_section_callback',
        'abcbiz_settings_menu'
    );

    // Add a new field to a section of a settings page
    add_settings_field(
        'abcbiz_field_pill',
        esc_html__('Custom Field', 'abcbiz-multi'), // Localized title
        'abcbiz_field_pill_callback',
        'abcbiz_settings_menu',
        'abcbiz_settings_section'
    );
}

function abcbiz_settings_section_callback() {
    // Localized text for the settings section description
    echo '<p>' . esc_html__('Custom settings for the ABCBiz plugin.', 'abcbiz-multi') . '</p>';
}
add_action('admin_init', 'abcbiz_settings_init');

function abcbiz_field_pill_callback() {
    $option = get_option('abcbiz_options'); // Make sure to use the correct option name
    ?>
    <input type="text" name="abcbiz_options[abcbiz_field_pill]" value="<?php echo isset($option['abcbiz_field_pill']) ? esc_attr($option['abcbiz_field_pill']) : ''; ?>">
    <?php
}
