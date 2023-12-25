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

// Set default values if not already set
add_option('abcbiz_blockquote_widget_field', '1'); //default on
add_option('abcbiz_blog_fancy_widget_field', '1');
add_option('abcbiz_author_bio_widget_field', '1');
add_option('abcbiz_blog_grid_widget_field', '1');
add_option('abcbiz_blog_list_widget_field', '1');
add_option('abcbiz_breadcrumb_widget_field', '1');
add_option('abcbiz_cat_list_widget_field', '1');
add_option('abcbiz_contact_form7_widget_field', '1');
add_option('abcbiz_circular_skill_widget_field', '1');
add_option('abcbiz_comment_form_widget_field', '1');

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
