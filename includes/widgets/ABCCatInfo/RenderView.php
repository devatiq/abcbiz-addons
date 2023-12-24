<?php
/**
 * Render View file for ABC Post Category Info.
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly
 
$abcbiz_settings = $this->get_settings_for_display();
?>

<!-- Post Category Area-->
<div class="abcbiz-ele-post-cat-area">
    <div class="abcbiz-ele-post-cat">
    
    <?php 
$categories = get_the_category();
$separator_class = 'abcbiz-ele-category-separator';
$separator = '<span class="' . esc_attr($separator_class) . '"> / </span>';
$output = '';
$count = count($categories);

if ( ! empty( $categories ) ) {
    foreach( $categories as $index => $category ) {
        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'abcbiz-multi' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
        
        // Add separator if not the last iteration
        if ($index < $count - 1) {
            $output .= $separator;
        }
    }
    echo $output;
}
?>
    </div>
</div><!--/ Post Category Area-->