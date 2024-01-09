<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Contact Info
function abcbiz_cta_widget_field_render() {
    $option = get_option('abcbiz_cta_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/call-to-action-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-cta.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div> 
        <h3><?php echo esc_html__("Call To Action- CTA", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_cta_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Contact Info
function abcbiz_contact_info_widget_field_render() {
    $option = get_option('abcbiz_contact_info_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/contact-and-social-info-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-contact-info.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div> 
        <h3><?php echo esc_html__("Contact & Social Info", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_contact_info_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Search Icon
function abcbiz_search_icon_widget_field_render() {
    $option = get_option('abcbiz_search_icon_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/search-icon-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-search-icon.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div> 
        <h3><?php echo esc_html__("Search Icon", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_search_icon_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//WordPress Menu
function abcbiz_wp_menu_widget_field_render() {
    $option = get_option('abcbiz_wp_menu_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/wordpress-menu-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-wp-menu.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div> 
        <h3><?php echo esc_html__("WordPress Menu", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_wp_menu_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Testimonial Carousel
function abcbiz_testi_caro_widget_field_render() {
    $option = get_option('abcbiz_testi_caro_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/testimonial-carousel-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-testimonial-slider.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Testimonial Carousel", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_testi_caro_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

//Flip Box
function abcbiz_flip_box_widget_field_render() {
    $option = get_option('abcbiz_flip_box_widget_field');
    ?>
    <div class="abcbiz-widget-lists">
        <div class="abcbiz-widget-image-overlay">
            <a href="https://abcplugin.com/widgets/flip-box-elementor-widget/" target="_blank">
                <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../img/abc-flip-box.jpg'); ?>">
                <div class="abcbiz-overlay">
                    <span class="abcbiz-overlay-text"><span class="dashicons dashicons-admin-links"></span> <?php echo esc_html__("Preview", "abcbiz-multi");?></span>
                </div>
            </a>
        </div>
        <h3><?php echo esc_html__("Flip Box", "abcbiz-multi"); ?></h3>
        <label class="abcbiz-switch">
            <input type="checkbox" name="abcbiz_flip_box_widget_field" value="1" <?php checked(1, $option, true); ?>>
            <span class="abcbiz-slider abcbiz-round"></span>
        </label>
    </div>
    <?php
}

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