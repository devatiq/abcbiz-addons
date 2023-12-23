<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Render View file for ABC Blog.
 */
$settings = $this->get_settings_for_display();
$abcbiz_number_of_posts = $this->get_settings('abcbiz_elementor_blog_grid_post_number')['size'];

$abcbiz_img_switch = $settings['abcbiz_elementor_blog_grid_img_switch'];
$abcbiz_date_switch = $settings['abcbiz_elementor_blog_grid_date_switch'];
$abcbiz_comment_switch = $settings['abcbiz_elementor_blog_grid_comment_switch'];
$abcbiz_excerpt_switch = $settings['abcbiz_elementor_blog_grid_excerpt_switch'];
$abcbiz_read_more_switch = $settings['abcbiz_elementor_blog_grid_read_more_switch'];
$abcbiz_pagination_switch = $settings['abcbiz_elementor_blog_grid_pagination'];
$abcbiz_grid_read_more_text = $settings['abcbiz_elementor_blog_grid_read_more_text'];
$abcbiz_selected_category = $settings['abcbiz_elementor_blog_grid_category'];
$abcbiz_excerpt_length_grid = $settings['abcbiz_elementor_blog_grid_excerpt_length'];

?>
<!-- Blog grid Area-->
<div class="abcbiz-ele-blog-grid-area">
   <div class="abcbiz-ele-blog-grid">
<?php
// Get the selected blog layout
$abcbiz_blog_layout = $this->get_settings('abcbiz_elementor_blog_grid_layout');

switch ($abcbiz_blog_layout) {
    case 'two-column':
        include( ABCBIZELEMENTOR_PATH . '/includes/widgets/ABCBlogGrid/template/two-column.php' );
        break;
    case 'three-column':
        include( ABCBIZELEMENTOR_PATH . '/includes/widgets/ABCBlogGrid/template/three-column.php' );
        break;
    case 'four-column':
        include( ABCBIZELEMENTOR_PATH . '/includes/widgets/ABCBlogGrid/template/four-column.php' );
        break;
    default:
    include( ABCBIZELEMENTOR_PATH . '/includes/widgets/ABCBlogGrid/template/three-column.php' );
        break;
}
?>
    </div>
</div><!--/ Blog grid Area-->