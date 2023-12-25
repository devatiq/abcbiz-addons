<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('admin_menu', 'abcbiz_add_admin_menu');

function abcbiz_add_admin_menu() {
    // Add a new top-level menu
    add_menu_page(
        esc_html__('ABCBiz Settings', 'abcbiz-multi'),  // Page title
        esc_html__('ABCBiz Settings', 'abcbiz-multi'),  // Menu title
        'manage_options',                               // Capability
        'abcbiz_settings',                              // Menu slug
        'abcbiz_settings_page',                         // Function to display the page
        plugin_dir_url(__FILE__) . 'img/admin-icon.png',// Icon URL
        6                                               // Position
    );

    // Add a submenu page
    add_submenu_page(
        'abcbiz_settings', 
        esc_html__('Available Widgets', 'abcbiz-multi'), // Page title
        esc_html__('Available Widgets', 'abcbiz-multi'), // Menu title
        'manage_options',                                // Capability
        'abcbiz_widgets',                                // Menu slug
        'abcbiz_widgets_page'                            // Function to display the page
    );
}

add_action('admin_menu', 'abcbiz_add_admin_menu');

//Setting link
function abcbiz_add_settings_link( $links ) {
    $settings_link = '<a href="' . admin_url( 'admin.php?page=abcbiz_settings' ) . '">' . esc_html__( 'Settings', 'abcbiz-multi' ) . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
add_filter( 'plugin_action_links_abcbiz-multi-addons-pro-for-elementor/abcbiz-multi.php', 'abcbiz_add_settings_link' );


//Setting page
function abcbiz_settings_page() {
    ?>
    <div class="wrap">
        <h1>ABCBiz Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('abcbiz_settings');
            do_settings_sections('abcbiz_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

//Available Widget
function abcbiz_widgets_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('abcbiz_settings');
            do_settings_sections('abcbiz_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function abcbiz_widgets_settings_init() {
    // Add a field for each widget
    add_settings_field(
        'abcbiz_widget_1_field',
        __('Widget 1', 'abcbiz-multi'),
        'abcbiz_widget_1_field_render',
        'abcbiz_settings',
        'abcbiz_settings_section'
    );

    add_settings_field(
        'abcbiz_widget_2_field',
        __('Widget 2', 'abcbiz-multi'),
        'abcbiz_widget_2_field_render',
        'abcbiz_settings',
        'abcbiz_settings_section'
    );

    add_settings_field(
        'abcbiz_widget_4_field',
        __('Widget 4', 'abcbiz-multi'),
        'abcbiz_widget_4_field_render',
        'abcbiz_settings',
        'abcbiz_settings_section'
    );

    add_settings_field(
        'abcbiz_widget_5_field',
        __('Widget 5', 'abcbiz-multi'),
        'abcbiz_widget_5_field_render',
        'abcbiz_settings',
        'abcbiz_settings_section'
    );
}
add_action('admin_init', 'abcbiz_widgets_settings_init');

function abcbiz_widget_1_field_render() {
    $option = get_option('abcbiz_widget_1');
    ?>
    <label class="abcbiz-switch">
        <input type="checkbox" name="abcbiz_widget_1" value="1" <?php checked(1, $option, true); ?>>
        <span class="abcbiz-slider abcbiz-round"></span>
    </label>
    <?php
}

function abcbiz_widget_2_field_render() {
    $option = get_option('abcbiz_widget_2');
    ?>
    <label class="abcbiz-switch">
        <input type="checkbox" name="abcbiz_widget_2" value="1" <?php checked(1, $option, true); ?>>
        <span class="abcbiz-slider abcbiz-round"></span>
    </label>
    <?php
}

function abcbiz_widget_4_field_render() {
    $option = get_option('abcbiz_widget_3');
    ?>
    <label class="abcbiz-switch">
        <input type="checkbox" name="abcbiz_widget_4" value="1" <?php checked(1, $option, true); ?>>
        <span class="abcbiz-slider abcbiz-round"></span>
    </label>
    <?php
}

function abcbiz_widget_5_field_render() {
    $option = get_option('abcbiz_widget_5');
    ?>
    <label class="abcbiz-switch">
        <input type="checkbox" name="abcbiz_widget_5" value="1" <?php checked(1, $option, true); ?>>
        <span class="abcbiz-slider abcbiz-round"></span>
    </label>
    <?php
}


function abcbiz_settings_init() {
    // Register a new setting for "ABCBiz Settings" page
    register_setting('abcbiz_settings', 'abcbiz_options');

    // Add a new section to a settings page
    add_settings_section(
        'abcbiz_settings_section',
        esc_html__('ABCBiz Custom Settings', 'abcbiz-multi'), // Localized title
        'abcbiz_settings_section_callback',
        'abcbiz_settings'
    );

    // Add a new field to a section of a settings page
    add_settings_field(
        'abcbiz_field_pill',
        esc_html__('Custom Field', 'abcbiz-multi'), // Localized title
        //'abcbiz_field_pill_callback',
        'abcbiz_settings',
        'abcbiz_settings_section'
    );
    
    //available widgets
    register_setting('abcbiz_settings', 'abcbiz_widget_1');
    register_setting('abcbiz_settings', 'abcbiz_widget_2');
    register_setting('abcbiz_settings', 'abcbiz_widget_4');
    register_setting('abcbiz_settings', 'abcbiz_widget_5');

    if (get_option('abcbiz_widget_4') === false) {
        update_option('abcbiz_widget_4', '1'); // Set default value to '1' (on)
    }

    if (get_option('abcbiz_widget_5') === false) {
        update_option('abcbiz_widget_5', '0'); // Set default value to '0' (off)
    }

}

function abcbiz_settings_section_callback() {
    // Localized text for the settings section description
    echo '<p>' . esc_html__('Custom settings for the ABCBiz plugin.', 'abcbiz-multi') . '</p>';
}
add_action('admin_init', 'abcbiz_settings_init');

function abcbiz_setting_enqueue_admin_styles() {
    wp_enqueue_style('abcbiz-settings-admin-style', plugin_dir_url(__FILE__) . 'css/admin-settings.css');
    $abcbiz_custom_css = "";
    wp_add_inline_style('abcbiz-settings-admin-style', $abcbiz_custom_css);
}

add_action('admin_enqueue_scripts', 'abcbiz_setting_enqueue_admin_styles');


