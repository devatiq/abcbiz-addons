<?php

/**
 * Render View file for ABC Blog.
 */
$settings = $this->get_settings_for_display();
$abc_number_of_posts = $this->get_settings('abc_elementor_blog_post_number')['size'];

$abc_img_switch = $settings['abc_elementor_blog_grid_img_switch'];
$abc_date_switch = $settings['abc_elementor_blog_grid_date_switch'];
$abc_comment_switch = $settings['abc_elementor_blog_grid_comment_switch'];
$abc_excerpt_switch = $settings['abc_elementor_blog_grid_excerpt_switch'];
$abc_read_more_switch = $settings['abc_elementor_blog_grid_read_more_switch'];
$abc_pagination_switch = $settings['abc_elementor_blog_grid_pagination'];
$abc_grid_read_more_text = $settings['abc_elementor_blog_grid_read_more_text'];
$abc_selected_category = $settings['abc_elementor_blog_category'];

?>
<!-- Blog grid Area-->
<div class="abc-ele-blog-grid-area">
   <div class="abc-ele-blog-grid">
<?php
// Get the selected blog layout
$abc_blog_layout = $this->get_settings('abc_elementor_blog_grid_layout');

switch ($abc_blog_layout) {
    case 'two-column':
        include( ABCELEMENTOR_PATH . '/inc/widgets/ABCBlogGrid/template/two-column.php' );
        break;
    case 'three-column':
        include( ABCELEMENTOR_PATH . '/inc/widgets/ABCBlogGrid/template/three-column.php' );
        break;
    case 'four-column':
        include( ABCELEMENTOR_PATH . '/inc/widgets/ABCBlogGrid/template/four-column.php' );
        break;
    default:
    include( ABCELEMENTOR_PATH . '/inc/widgets/ABCBlogGrid/template/three-column.php' );
        break;
}
?>
    </div>
</div><!--/ Blog grid Area-->