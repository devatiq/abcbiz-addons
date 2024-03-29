<?php
/**
 * Render View file for ABC Comment Form.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

add_filter('comments_template', 'abcbiz_custom_comments_template', 99);

function abcbiz_custom_comments_template($theme_template) {
    if (is_singular() && (comments_open() || get_comments_number())) {
        $plugin_template = ABCBIZ_Path . '/includes/widgets/ABCCommentForm/template/comment-form.php';
        if ( file_exists($plugin_template) ) {
            return $plugin_template;
        }
    }
    return $theme_template;
}

?>

<!-- Comment Form Area-->
<div class="abcbiz-ele-comment-form-area">
    <div class="abcbiz-ele-comment-form">
    
    <?php 
if ( comments_open() || get_comments_number() ) {
    comments_template();
}
?>
    </div>
</div><!--/ Comment Form Area-->
