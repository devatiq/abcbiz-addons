<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Available Widget
function abcbiz_widgets_page() {
    ?>
    <div class="wrap abcbiz-available-widget-wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php settings_fields('abcbiz_widgets_menu'); ?>
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
        </form>
    </div>
    
    <?php 
}

function abcbiz_widgets_settings_init() {
    add_settings_section(
        'abcbiz_available_widgets_section',          // Section ID
        esc_html__('Available Widgets', 'abcbiz-multi'), // Title
        'abcbiz_available_widgets_section_callback', // Callback function
        'abcbiz_widgets_menu'                             // Page slug where this section will be shown
    );
// blockquote
add_settings_field(
    'abcbiz_blockquote_widget_field',
    esc_html__('Blockquote', 'abcbiz-multi'),
    'abcbiz_blockquote_widget_field_render',
    'abcbiz_widgets_menu', // Page slug where this field will be shown
    'abcbiz_available_widgets_section'
);

 // blog fancy
 add_settings_field(
    'abcbiz_blog_fancy_widget_field',
    esc_html__('Blog Post Fancy', 'abcbiz-multi'),
    'abcbiz_blog_fancy_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// author bio
add_settings_field(
    'abcbiz_author_bio_widget_field',
    esc_html__('Author Bio', 'abcbiz-multi'),
    'abcbiz_author_bio_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Blog Grid
add_settings_field(
    'abcbiz_blog_grid_widget_field',
    esc_html__('Blog Grid', 'abcbiz-multi'),
    'abcbiz_blog_grid_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Blog List
add_settings_field(
    'abcbiz_blog_list_widget_field',
    esc_html__('Blog List', 'abcbiz-multi'),
    'abcbiz_blog_list_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// breadcrumb
add_settings_field(
    'abcbiz_breadcrumb_widget_field',
    esc_html__('Blog List', 'abcbiz-multi'),
    'abcbiz_breadcrumb_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Category List
add_settings_field(
    'abcbiz_cat_list_widget_field',
    esc_html__('Blog List', 'abcbiz-multi'),
    'abcbiz_cat_list_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Contact Form 7 Style
add_settings_field(
    'abcbiz_contact_form7_widget_field',
    esc_html__('Contact Form 7 Style', 'abcbiz-multi'),
    'abcbiz_contact_form7_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Circular Skill
add_settings_field(
    'abcbiz_circular_skill_widget_field',
    esc_html__('Circular Skill', 'abcbiz-multi'),
    'abcbiz_circular_skill_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Comment Form
add_settings_field(
    'abcbiz_comment_form_widget_field',
    esc_html__('Comment Form', 'abcbiz-multi'),
    'abcbiz_comment_form_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Counter Up
add_settings_field(
    'abcbiz_counter_up_widget_field',
    esc_html__('Counter Up', 'abcbiz-multi'),
    'abcbiz_counter_up_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Featured Image
add_settings_field(
    'abcbiz_feat_img_widget_field',
    esc_html__('Featured Image', 'abcbiz-multi'),
    'abcbiz_feat_img_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Icon Box
add_settings_field(
    'abcbiz_icon_box_widget_field',
    esc_html__('Icon Box', 'abcbiz-multi'),
    'abcbiz_icon_box_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Image Hover
add_settings_field(
    'abcbiz_img_hover_widget_field',
    esc_html__('Image Hover', 'abcbiz-multi'),
    'abcbiz_img_hover_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Page Title
add_settings_field(
    'abcbiz_page_title_widget_field',
    esc_html__('Page Title', 'abcbiz-multi'),
    'abcbiz_page_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Popup
add_settings_field(
    'abcbiz_abc_popup_widget_field',
    esc_html__('Popup', 'abcbiz-multi'),
    'abcbiz_abc_popup_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Portfolio
add_settings_field(
    'abcbiz_portfolio_widget_field',
    esc_html__('Portfolio', 'abcbiz-multi'),
    'abcbiz_portfolio_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Post Meta
add_settings_field(
    'abcbiz_post_meta_widget_field',
    esc_html__('Post Meta', 'abcbiz-multi'),
    'abcbiz_post_meta_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Post Title
add_settings_field(
    'abcbiz_post_title_widget_field',
    esc_html__('Post Title', 'abcbiz-multi'),
    'abcbiz_post_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Pricing Table
add_settings_field(
    'abcbiz_pricing_table_widget_field',
    esc_html__('Pricing Table', 'abcbiz-multi'),
    'abcbiz_pricing_table_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Recent Post
add_settings_field(
    'abcbiz_recent_post_widget_field',
    esc_html__('Recent Posts', 'abcbiz-multi'),
    'abcbiz_recent_post_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Related Post
add_settings_field(
    'abcbiz_related_post_widget_field',
    esc_html__('Related Posts', 'abcbiz-multi'),
    'abcbiz_related_post_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Search Form
add_settings_field(
    'abcbiz_search_form_widget_field',
    esc_html__('Search Form', 'abcbiz-multi'),
    'abcbiz_search_form_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Section Title
add_settings_field(
    'abcbiz_sec_title_widget_field',
    esc_html__('Section Title', 'abcbiz-multi'),
    'abcbiz_sec_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Shape Animation
add_settings_field(
    'abcbiz_shape_anim_widget_field',
    esc_html__('Animated Shape', 'abcbiz-multi'),
    'abcbiz_shape_anim_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Skill Bar
add_settings_field(
    'abcbiz_skill_bar_widget_field',
    esc_html__('Skill Bar', 'abcbiz-multi'),
    'abcbiz_skill_bar_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Skill Bar
add_settings_field(
    'abcbiz_social_share_widget_field',
    esc_html__('Social Share', 'abcbiz-multi'),
    'abcbiz_social_share_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Tag Info
add_settings_field(
    'abcbiz_tag_info_widget_field',
    esc_html__('Post Tag Info', 'abcbiz-multi'),
    'abcbiz_tag_info_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Team Member
add_settings_field(
    'abcbiz_team_member_widget_field',
    esc_html__('Team Member', 'abcbiz-multi'),
    'abcbiz_team_member_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Register settings
register_setting('abcbiz_widgets_menu', 'abcbiz_blockquote_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_blog_fancy_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_author_bio_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_blog_grid_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_blog_list_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_breadcrumb_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_cat_list_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_contact_form7_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_circular_skill_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_comment_form_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_counter_up_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_feat_img_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_icon_box_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_img_hover_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_page_title_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_abc_popup_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_portfolio_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_post_meta_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_post_title_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_pricing_table_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_recent_post_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_related_post_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_search_form_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_sec_title_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_shape_anim_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_skill_bar_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_social_share_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_tag_info_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_team_member_widget_field');

// Set default values if not already set
add_option('abcbiz_blockquote_widget_field', '1'); //1 is default on
add_option('abcbiz_blog_fancy_widget_field', '1');
add_option('abcbiz_author_bio_widget_field', '1');
add_option('abcbiz_blog_grid_widget_field', '1');
add_option('abcbiz_blog_list_widget_field', '1');
add_option('abcbiz_breadcrumb_widget_field', '1');
add_option('abcbiz_cat_list_widget_field', '1');
add_option('abcbiz_contact_form7_widget_field', '1');
add_option('abcbiz_circular_skill_widget_field', '1');
add_option('abcbiz_comment_form_widget_field', '1');
add_option('abcbiz_counter_up_widget_field', '1');
add_option('abcbiz_feat_img_widget_field', '1');
add_option('abcbiz_icon_box_widget_field', '1');
add_option('abcbiz_img_hover_widget_field', '1');
add_option('abcbiz_page_title_widget_field', '1');
add_option('abcbiz_abc_popup_widget_field', '1');
add_option('abcbiz_portfolio_widget_field', '1');
add_option('abcbiz_post_meta_widget_field', '1');
add_option('abcbiz_post_title_widget_field', '1');
add_option('abcbiz_pricing_table_widget_field', '1');
add_option('abcbiz_recent_post_widget_field', '1');
add_option('abcbiz_related_post_widget_field', '1');
add_option('abcbiz_search_form_widget_field', '1');
add_option('abcbiz_sec_title_widget_field', '1');
add_option('abcbiz_shape_anim_widget_field', '1');
add_option('abcbiz_skill_bar_widget_field', '1');
add_option('abcbiz_social_share_widget_field', '1');
add_option('abcbiz_tag_info_widget_field', '1');
add_option('abcbiz_team_member_widget_field', '1');

}
add_action('admin_init', 'abcbiz_widgets_settings_init');

//Blockquote
function abcbiz_blockquote_widget_field_render() {
    $option = get_option('abcbiz_blockquote_widget_field');
    ?>
    <div class="abcbiz-widget-lists blockquote-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/blockquote-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-blockquoute.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Blockquote Widget", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_blockquote_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Blog Fancy
function abcbiz_blog_fancy_widget_field_render() {
    $option = get_option('abcbiz_blog_fancy_widget_field');
    ?>
    <div class="abcbiz-widget-lists blog-fancy-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/fancy-blog-posts-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-blog-post-fancy.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Blog Fancy", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_blog_fancy_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Author Bio
function abcbiz_author_bio_widget_field_render() {
    $option = get_option('abcbiz_author_bio_widget_field');
    ?>
    <div class="abcbiz-widget-lists author-bio-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/post-author-bio-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-author-bio.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Author Bio", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_author_bio_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Blog Grid
function abcbiz_blog_grid_widget_field_render() {
    $option = get_option('abcbiz_blog_grid_widget_field');
    ?>
    <div class="abcbiz-widget-lists blog-grid-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/blog-posts-grid-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-post-grid.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Blog Grid", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_blog_grid_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Blog List
function abcbiz_blog_list_widget_field_render() {
    $option = get_option('abcbiz_blog_list_widget_field');
    ?>
    <div class="abcbiz-widget-lists blog-list-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/simple-blog-posts-list-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-post-list.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Blog List", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_blog_list_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Breadcrumb
function abcbiz_breadcrumb_widget_field_render() {
    $option = get_option('abcbiz_breadcrumb_widget_field');
    ?>
    <div class="abcbiz-widget-lists abcbiz-breadcrumb-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/custom-breadcrumb-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-breadcrumb.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Breadcrumb", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_breadcrumb_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Category List
function abcbiz_cat_list_widget_field_render() {
    $option = get_option('abcbiz_cat_list_widget_field');
    ?>
    <div class="abcbiz-widget-lists cat-list-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/post-category-list-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/post-categories.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Category List", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_cat_list_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Contact Form 7 Style
function abcbiz_contact_form7_widget_field_render() {
    $option = get_option('abcbiz_contact_form7_widget_field');
    ?>
    <div class="abcbiz-widget-lists contact-form7-style-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/contact-form-7-style-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-contact-form-7-style.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Contact Form 7 Style", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_contact_form7_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Circular Skill
function abcbiz_circular_skill_widget_field_render() {
    $option = get_option('abcbiz_circular_skill_widget_field');
    ?>
    <div class="abcbiz-widget-lists circular-skill-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/advanced-circular-skill-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/circular-skill.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Circular Skill", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_circular_skill_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Comment Form
function abcbiz_comment_form_widget_field_render() {
    $option = get_option('abcbiz_comment_form_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/comment-form-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-comments.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Comment Form", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_comment_form_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Counter Up
function abcbiz_counter_up_widget_field_render() {
    $option = get_option('abcbiz_counter_up_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/counter-up-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/counter-up.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Counter Up", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_counter_up_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Featured Image
function abcbiz_feat_img_widget_field_render() {
    $option = get_option('abcbiz_feat_img_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/featured-image-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/featured-image.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Featured Image", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_feat_img_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Icon Box
function abcbiz_icon_box_widget_field_render() {
    $option = get_option('abcbiz_icon_box_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/advanced-icon-box-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/icon-box.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Icon Box", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_icon_box_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Image Hover
function abcbiz_img_hover_widget_field_render() {
    $option = get_option('abcbiz_img_hover_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/image-hover-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-image-hover.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Image Hover", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_img_hover_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Page Title
function abcbiz_page_title_widget_field_render() {
    $option = get_option('abcbiz_page_title_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/page-title-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/page-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Page Title", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_page_title_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Popup
function abcbiz_abc_popup_widget_field_render() {
    $option = get_option('abcbiz_abc_popup_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/popup-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/popup.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Popup", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_abc_popup_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Portfolio
function abcbiz_portfolio_widget_field_render() {
    $option = get_option('abcbiz_portfolio_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/portfolio-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-portfolio.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Portfolio", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_portfolio_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Post Meta Info
function abcbiz_post_meta_widget_field_render() {
    $option = get_option('abcbiz_post_meta_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/post-meta-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/meta-info.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Post Meta", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_post_meta_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Post Title
function abcbiz_post_title_widget_field_render() {
    $option = get_option('abcbiz_post_title_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/post-title-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/post-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Post Title", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_post_title_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Pricing Table
function abcbiz_pricing_table_widget_field_render() {
    $option = get_option('abcbiz_pricing_table_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/advanced-pricing-table-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-pricing-table.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Pricing Table", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_pricing_table_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Recent Posts
function abcbiz_recent_post_widget_field_render() {
    $option = get_option('abcbiz_recent_post_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/recent-posts-list-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-recent-posts.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Recent Posts", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_recent_post_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Related Posts
function abcbiz_related_post_widget_field_render() {
    $option = get_option('abcbiz_related_post_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/related-posts-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-related-post.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Related Posts", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_related_post_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Search Form
function abcbiz_search_form_widget_field_render() {
    $option = get_option('abcbiz_search_form_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/search-form-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-search-form.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Search Form", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_search_form_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Section Title
function abcbiz_sec_title_widget_field_render() {
    $option = get_option('abcbiz_sec_title_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/section-title-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-section-title.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Section Title", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_sec_title_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Animated Shape
function abcbiz_shape_anim_widget_field_render() {
    $option = get_option('abcbiz_shape_anim_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/animated-shape-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/animated-shape.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Animated Shape", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_shape_anim_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Skill Bar
function abcbiz_skill_bar_widget_field_render() {
    $option = get_option('abcbiz_skill_bar_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/skill-bar-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-skill-bar.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Skill Bar", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_skill_bar_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Social Share
function abcbiz_social_share_widget_field_render() {
    $option = get_option('abcbiz_social_share_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/social-share-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-social-share.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Social Share", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_social_share_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Tag Info
function abcbiz_tag_info_widget_field_render() {
    $option = get_option('abcbiz_tag_info_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/post-tag-info-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-post-tags.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Post Tag Info", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_tag_info_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Team Member
function abcbiz_team_member_widget_field_render() {
    $option = get_option('abcbiz_team_member_widget_field');
    ?>
    <div class="abcbiz-widget-lists comment-form-widget">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/team-member-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-team-member.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Team Member", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_team_member_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

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
