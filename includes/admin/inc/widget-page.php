<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Available Widget
function abcbiz_widgets_page() {
    // Include the plugin.php file if it hasn't been already
    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    ?>
    <div class="wrap abcbiz-available-widget-wrap">
        <h2><?php echo esc_html__('ABCBiz & WooCommerce Widgets', 'abcbiz-multi');?></h2>
        <div class="abcbiz-tabs">
            <button class="tablink button button-secondary" onclick="openTab(event, 'ABCBizWidgets')">ABCBiz Widgets</button>
            <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ): ?>
                <button class="tablink button button-secondary" onclick="openTab(event, 'WooCommerceWidgets')">WooCommerce Widgets</button>
            <?php endif; ?>
        </div>

        <form action="options.php" method="post">
            <?php settings_fields('abcbiz_widgets_menu'); ?>

            <div id="ABCBizWidgets" class="tabcontent">
                <h3>ABCBiz Multi Widgets</h3>
                <div class="abcbiz-widgets-grid">
                <?php abcbiz_blockquote_widget_field_render(); ?>
                <?php abcbiz_blog_fancy_widget_field_render(); ?>
                <?php abcbiz_author_bio_widget_field_render(); ?>
                <?php abcbiz_blog_grid_widget_field_render(); ?>
                <?php abcbiz_blog_list_widget_field_render(); ?>
                <?php abcbiz_breadcrumb_widget_field_render(); ?>
                <?php abcbiz_cat_list_widget_field_render(); ?>
                <?php abcbiz_contact_form7_widget_field_render(); ?>
                <?php abcbiz_circular_skill_widget_field_render(); ?>
                <?php abcbiz_comment_form_widget_field_render(); ?>
                <?php abcbiz_counter_up_widget_field_render(); ?>
                <?php abcbiz_feat_img_widget_field_render(); ?>
                <?php abcbiz_icon_box_widget_field_render(); ?>
                <?php abcbiz_img_hover_widget_field_render(); ?>
                <?php abcbiz_page_title_widget_field_render(); ?>
                <?php abcbiz_abc_popup_widget_field_render(); ?>
                <?php abcbiz_portfolio_widget_field_render(); ?>
                <?php abcbiz_post_meta_widget_field_render(); ?>
                <?php abcbiz_post_title_widget_field_render(); ?>
                <?php abcbiz_pricing_table_widget_field_render(); ?>
                <?php abcbiz_recent_post_widget_field_render(); ?>
                <?php abcbiz_related_post_widget_field_render(); ?>
                <?php abcbiz_search_form_widget_field_render(); ?>
                <?php abcbiz_sec_title_widget_field_render(); ?>
                <?php abcbiz_shape_anim_widget_field_render(); ?>
                <?php abcbiz_skill_bar_widget_field_render(); ?>
                <?php abcbiz_social_share_widget_field_render(); ?>
                <?php abcbiz_tag_info_widget_field_render(); ?>
                <?php abcbiz_team_member_widget_field_render(); ?>
                </div>
            </div>

            <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ): ?>
                <div id="WooCommerceWidgets" class="tabcontent">
                    <h3>WooCommerce Widgets</h3>
                    <div class="abcbiz-widgets-grid">
                    <?php abcbiz_wc_product_cart_icon_field_render(); ?>
                    <?php abcbiz_wc_product_title_field_render(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
    <?php 
}

// Require Widget Register File
require_once plugin_dir_path(__FILE__) . 'widgets-register-functions.php';
// Require Widget Render File
require_once plugin_dir_path(__FILE__) . 'widgets-render-functions.php';

// Require Widget Register File
require_once plugin_dir_path(__FILE__) . 'wc-widgets-register-functions.php';
// Require Widget Render File
require_once plugin_dir_path(__FILE__) . 'wc-widgets-render-functions.php';

//callback function
function abcbiz_available_widgets_section_callback() {
    echo '<p>' . esc_html__('Manage available widgets here.', 'abcbiz-multi') . '</p>';
}

//Ajax Saving
function abcbiz_save_widget_setting() {
    check_ajax_referer('abcbiz-widget-nonce', 'nonce');
    $widgetName = sanitize_text_field($_POST['widgetName']);
    $value = sanitize_text_field($_POST['value']);

    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    update_option($widgetName, $value);

    echo 'Success';
    wp_die();
}
add_action('wp_ajax_abcbiz_save_widget_setting', 'abcbiz_save_widget_setting');
