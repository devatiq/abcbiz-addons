<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Available Widget
function abcbiz_widgets_page() {
    // Include the plugin.php file if it hasn't been already
    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    // Get the plugin data
    $abcbiz_plugin_data = abcbiz_multi_plugin_info();
    ?>
    <div class="wrap abcbiz-available-widget-wrap">
        <h2><?php echo esc_html($abcbiz_plugin_data['Name']); ?></h2>
        <div class="abcbiz-tabs">
            <button class="tablink button button-secondary" onclick="openTab(event, 'ABCBizWidgets')"><?php echo esc_html__('ABCBiz Widgets', 'abcbiz-addons');?></button>
            <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ): ?>
                <button class="tablink button button-secondary" onclick="openTab(event, 'WooCommerceWidgets')"><?php echo esc_html__('WooCommerce Widgets', 'abcbiz-addons');?></button>
            <?php endif; ?>
        </div>

        <form action="options.php" method="post">
            <?php settings_fields('abcbiz_widgets_menu'); ?>

            <div id="ABCBizWidgets" class="tabcontent">
                <h3><?php echo esc_html__('ABCBiz Multi Widgets', 'abcbiz-addons');?></h3>
                <div class="abcbiz-widgets-grid">
                <?php abcbiz_anim_text_widget_field_render(); ?>
                <?php abcbiz_blockquote_widget_field_render(); ?>
                <?php abcbiz_blog_fancy_widget_field_render(); ?>
                <?php abcbiz_author_bio_widget_field_render(); ?>
                <?php abcbiz_blog_grid_widget_field_render(); ?>
                <?php abcbiz_blog_list_widget_field_render(); ?>
                <?php abcbiz_breadcrumb_widget_field_render(); ?>
                <?php abcbiz_back_top_widget_field_render(); ?>
                <?php abcbiz_before_after_widget_field_render(); ?>
                <?php abcbiz_card_info_widget_field_render(); ?>
                <?php abcbiz_cat_list_widget_field_render(); ?>
                <?php abcbiz_contact_form7_widget_field_render(); ?>
                <?php abcbiz_circular_skill_widget_field_render(); ?>
                <?php abcbiz_comment_form_widget_field_render(); ?>
                <?php abcbiz_contact_info_widget_field_render(); ?>
                <?php abcbiz_count_down_widget_field_render(); ?>
                <?php abcbiz_counter_up_widget_field_render(); ?>
                <?php abcbiz_cta_widget_field_render(); ?>
                <?php abcbiz_feat_img_widget_field_render(); ?>
                <?php abcbiz_flip_box_widget_field_render(); ?>
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
                <?php abcbiz_search_icon_widget_field_render(); ?>
                <?php abcbiz_sec_title_widget_field_render(); ?>
                <?php abcbiz_shape_anim_widget_field_render(); ?>
                <?php abcbiz_skill_bar_widget_field_render(); ?>
                <?php abcbiz_social_share_widget_field_render(); ?>
                <?php abcbiz_tag_info_widget_field_render(); ?>
                <?php abcbiz_team_member_widget_field_render(); ?>
                <?php abcbiz_testi_caro_widget_field_render(); ?>
                <?php abcbiz_wp_menu_widget_field_render(); ?>
                <?php abcbiz_dual_button_widget_field_render(); ?>
                <?php abcbiz_business_hours_field_render(); ?>
                <?php abcbiz_archive_title_field_render(); ?>
                </div>
            </div>

            <?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ): ?>
                <div id="WooCommerceWidgets" class="tabcontent">
                    <h3><?php echo esc_html__('WooCommerce Widgets', 'abcbiz-addons');?></h3>
                    <div class="abcbiz-widgets-grid">
                    <?php abcbiz_wc_add_to_cart_icon_field_render(); ?>
                    <?php abcbiz_wc_product_cart_icon_field_render(); ?>
                    <?php abcbiz_wc_cart_page_field_render(); ?>
                    <?php abcbiz_wc_checkout_page_field_render(); ?>
                    <?php abcbiz_wc_product_img_field_render(); ?>
                    <?php abcbiz_wc_product_meta_field_render(); ?>
                    <?php abcbiz_wc_product_price_field_render(); ?>
                    <?php abcbiz_wc_product_related_field_render(); ?>
                    <?php abcbiz_wc_product_short_desc_field_render(); ?>
                    <?php abcbiz_wc_product_tabs_field_render(); ?>
                    <?php abcbiz_wc_product_title_field_render(); ?>
                    <?php abcbiz_wc_product_bread_crumb_field_render(); ?>
                    <?php abcbiz_wc_my_account_field_render(); ?>
                    </div>
                </div>
               
            <?php endif; ?>
        </form>
    </div>
    <?php 
}

require_once plugin_dir_path(__FILE__) . 'widgets-register-functions.php';
require_once plugin_dir_path(__FILE__) . 'widgets-render-functions.php';
require_once plugin_dir_path(__FILE__) . 'wc-widgets-register-functions.php';
require_once plugin_dir_path(__FILE__) . 'wc-widgets-render-functions.php';


//callback function
function abcbiz_available_widgets_section_callback() {
    echo '<p>' . esc_html__('Manage available widgets here.', 'abcbiz-addons') . '</p>';
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
