<?php

/**
 * Render View file for ABC Post Category Info.
 */
$settings = $this->get_settings_for_display();

?>

<!-- Post Category Area-->
<div class="abc-ele-post-cat-area">
    <div class="abc-ele-post-cat">
    
    <?php 
$categories = get_the_category();
$separator_class = 'abc-ele-category-separator';
$separator = '<span class="' . esc_attr($separator_class) . '"> / </span>';
$output = '';
$count = count($categories);

if ( ! empty( $categories ) ) {
    foreach( $categories as $index => $category ) {
        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'ABCMAFTH' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
        
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