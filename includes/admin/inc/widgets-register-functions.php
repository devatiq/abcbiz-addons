<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function abcbiz_widgets_settings_init() {
    add_settings_section(
        'abcbiz_available_widgets_section',          // Section ID
        esc_html__('Available Widgets', 'abcbiz-addons'), // Title
        'abcbiz_available_widgets_section_callback', // Callback function
        'abcbiz_widgets_menu'                             // Page slug where this section will be shown
    );

// Register settings 
register_setting('abcbiz_widgets_menu', 'abcbiz_anim_text_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_count_down_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_before_after_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_back_top_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_card_info_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_flip_box_widget_field');
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
register_setting('abcbiz_widgets_menu', 'abcbiz_testi_caro_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wp_menu_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_search_icon_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_contact_info_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_cta_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_dual_button_widget_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_business_hours_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_archive_title_field');


// Set default values if not already set
add_option('abcbiz_anim_text_widget_field', '1');
add_option('abcbiz_count_down_widget_field', '1');
add_option('abcbiz_before_after_widget_field', '1');
add_option('abcbiz_card_info_widget_field', '1');
add_option('abcbiz_back_top_widget_field', '1');
add_option('abcbiz_cta_widget_field', '1');
add_option('abcbiz_contact_info_widget_field', '1');
add_option('abcbiz_search_icon_widget_field', '1');
add_option('abcbiz_wp_menu_widget_field', '1');
add_option('abcbiz_testi_caro_widget_field', '1');
add_option('abcbiz_flip_box_widget_field', '1');
add_option('abcbiz_blockquote_widget_field', '1');
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
add_option('abcbiz_dual_button_widget_field', '1');
add_option('abcbiz_business_hours_field', '1');
add_option('abcbiz_archive_title_field', '1');


//Animated Text
add_settings_field(
    'abcbiz_anim_text_widget_field',
    esc_html__('Count Down timer', 'abcbiz-addons'),
    'abcbiz_anim_text_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Count Down
add_settings_field(
    'abcbiz_count_down_widget_field',
    esc_html__('Count Down timer', 'abcbiz-addons'),
    'abcbiz_count_down_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Before After Image
add_settings_field(
    'abcbiz_before_after_widget_field',
    esc_html__('Image After Image', 'abcbiz-addons'),
    'abcbiz_before_after_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Card Info
add_settings_field(
    'abcbiz_card_info_widget_field',
    esc_html__('Card Info', 'abcbiz-addons'),
    'abcbiz_card_info_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Back To Top 
add_settings_field(
    'abcbiz_back_top_widget_field',
    esc_html__('Back To Top', 'abcbiz-addons'),
    'abcbiz_back_top_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// CTA
add_settings_field(
    'abcbiz_cta_widget_field',
    esc_html__('Call To Action', 'abcbiz-addons'),
    'abcbiz_cta_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// WordPress Menu
add_settings_field(
    'abcbiz_wp_menu_widget_field',
    esc_html__('WordPress Menu', 'abcbiz-addons'),
    'abcbiz_wp_menu_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// testimonial slider
add_settings_field(
    'abcbiz_testi_caro_widget_field',
    esc_html__('Testimonial Carousel', 'abcbiz-addons'),
    'abcbiz_testi_caro_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// flip box
add_settings_field(
    'abcbiz_flip_box_widget_field',
    esc_html__('Flip Box', 'abcbiz-addons'),
    'abcbiz_flip_box_widget_field_render',
    'abcbiz_widgets_menu', // Page slug where this field will be shown
    'abcbiz_available_widgets_section'
);

// blockquote
add_settings_field(
    'abcbiz_blockquote_widget_field',
    esc_html__('Blockquote', 'abcbiz-addons'),
    'abcbiz_blockquote_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

 // blog fancy
 add_settings_field(
    'abcbiz_blog_fancy_widget_field',
    esc_html__('Blog Post Fancy', 'abcbiz-addons'),
    'abcbiz_blog_fancy_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// author bio
add_settings_field(
    'abcbiz_author_bio_widget_field',
    esc_html__('Author Bio', 'abcbiz-addons'),
    'abcbiz_author_bio_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Blog Grid
add_settings_field(
    'abcbiz_blog_grid_widget_field',
    esc_html__('Blog Grid', 'abcbiz-addons'),
    'abcbiz_blog_grid_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Blog List
add_settings_field(
    'abcbiz_blog_list_widget_field',
    esc_html__('Blog List', 'abcbiz-addons'),
    'abcbiz_blog_list_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// breadcrumb
add_settings_field(
    'abcbiz_breadcrumb_widget_field',
    esc_html__('Blog List', 'abcbiz-addons'),
    'abcbiz_breadcrumb_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Category List
add_settings_field(
    'abcbiz_cat_list_widget_field',
    esc_html__('Blog List', 'abcbiz-addons'),
    'abcbiz_cat_list_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Contact Form 7 Style
add_settings_field(
    'abcbiz_contact_form7_widget_field',
    esc_html__('Contact Form 7 Style', 'abcbiz-addons'),
    'abcbiz_contact_form7_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Circular Skill
add_settings_field(
    'abcbiz_circular_skill_widget_field',
    esc_html__('Circular Skill', 'abcbiz-addons'),
    'abcbiz_circular_skill_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Comment Form
add_settings_field(
    'abcbiz_comment_form_widget_field',
    esc_html__('Comment Form', 'abcbiz-addons'),
    'abcbiz_comment_form_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Counter Up
add_settings_field(
    'abcbiz_counter_up_widget_field',
    esc_html__('Counter Up', 'abcbiz-addons'),
    'abcbiz_counter_up_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Featured Image
add_settings_field(
    'abcbiz_feat_img_widget_field',
    esc_html__('Featured Image', 'abcbiz-addons'),
    'abcbiz_feat_img_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Icon Box
add_settings_field(
    'abcbiz_icon_box_widget_field',
    esc_html__('Icon Box', 'abcbiz-addons'),
    'abcbiz_icon_box_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Image Hover
add_settings_field(
    'abcbiz_img_hover_widget_field',
    esc_html__('Image Hover', 'abcbiz-addons'),
    'abcbiz_img_hover_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Page Title
add_settings_field(
    'abcbiz_page_title_widget_field',
    esc_html__('Page Title', 'abcbiz-addons'),
    'abcbiz_page_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Popup
add_settings_field(
    'abcbiz_abc_popup_widget_field',
    esc_html__('Popup', 'abcbiz-addons'),
    'abcbiz_abc_popup_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Portfolio
add_settings_field(
    'abcbiz_portfolio_widget_field',
    esc_html__('Portfolio', 'abcbiz-addons'),
    'abcbiz_portfolio_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Post Meta
add_settings_field(
    'abcbiz_post_meta_widget_field',
    esc_html__('Post Meta', 'abcbiz-addons'),
    'abcbiz_post_meta_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Post Title
add_settings_field(
    'abcbiz_post_title_widget_field',
    esc_html__('Post Title', 'abcbiz-addons'),
    'abcbiz_post_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Pricing Table
add_settings_field(
    'abcbiz_pricing_table_widget_field',
    esc_html__('Pricing Table', 'abcbiz-addons'),
    'abcbiz_pricing_table_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Recent Post
add_settings_field(
    'abcbiz_recent_post_widget_field',
    esc_html__('Recent Posts', 'abcbiz-addons'),
    'abcbiz_recent_post_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Related Post
add_settings_field(
    'abcbiz_related_post_widget_field',
    esc_html__('Related Posts', 'abcbiz-addons'),
    'abcbiz_related_post_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Search Form
add_settings_field(
    'abcbiz_search_form_widget_field',
    esc_html__('Search Form', 'abcbiz-addons'),
    'abcbiz_search_form_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Section Title
add_settings_field(
    'abcbiz_sec_title_widget_field',
    esc_html__('Section Title', 'abcbiz-addons'),
    'abcbiz_sec_title_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Shape Animation
add_settings_field(
    'abcbiz_shape_anim_widget_field',
    esc_html__('Animated Shape', 'abcbiz-addons'),
    'abcbiz_shape_anim_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Skill Bar
add_settings_field(
    'abcbiz_skill_bar_widget_field',
    esc_html__('Skill Bar', 'abcbiz-addons'),
    'abcbiz_skill_bar_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Skill Bar
add_settings_field(
    'abcbiz_social_share_widget_field',
    esc_html__('Social Share', 'abcbiz-addons'),
    'abcbiz_social_share_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Tag Info
add_settings_field(
    'abcbiz_tag_info_widget_field',
    esc_html__('Post Tag Info', 'abcbiz-addons'),
    'abcbiz_tag_info_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

//Team Member
add_settings_field(
    'abcbiz_team_member_widget_field',
    esc_html__('Team Member', 'abcbiz-addons'),
    'abcbiz_team_member_widget_field_render',
    'abcbiz_widgets_menu',
    'abcbiz_available_widgets_section'
);

// Add settings field for ABC Dual Button
add_settings_field(
    'abcbiz_dual_button_widget_field', 
    esc_html__('ABC Dual Button', 'abcbiz-addons'), 
    'abcbiz_dual_button_widget_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section' 
);

// Add settings field for Business Hours
add_settings_field(
    'abcbiz_business_hours_field',
    esc_html__('Business Hours', 'abcbiz-addons'),
    'abcbiz_business_hours_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Add settings field for Archive Title
add_settings_field(
    'abcbiz_archive_title_field',
    esc_html__('Archive Title', 'abcbiz-addons'),
    'abcbiz_archive_title_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

}
add_action('admin_init', 'abcbiz_widgets_settings_init');