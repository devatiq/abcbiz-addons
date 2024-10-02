<?php
/**
 * Render View for ABC Modern Post Grid style 1
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly
// Placeholder image as fallback
$fallback_image = ABCBIZ_Assets . '/img/img-hover-placeholder.jpg';

?>
<!-- Modern Post Grid Area-->
<div class="abcbiz-modren-posts-grid-area">
    <div class="abcbiz-modren-posts-grid-wrapper abcbiz-modren-posts-grid-style3">
        <?php    
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();                
                ?>
                
                <!-- Single Post -->
                <div class="abcbiz-modren-single-post">
                    <!-- Post Thumbnail -->
                    <div class="abcbiz-modren-single-post-thumbnail">
                        <?php if(has_post_thumbnail( get_the_ID() )) : ?>
                            <?php the_post_thumbnail( 'full' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url($fallback_image); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div><!--/ Post Thumbnail -->
                    
                    <!-- Post Contents -->
                    <div class="abcbiz-modren-single-post-contents">
                        <!-- Post Title -->
                        <div class="abcbiz-modren-single-post-title">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div><!--/ Post Title -->

                        <!-- Post info -->
                        <div class="abcbiz-modren-single-post-info">
                            <ul>
                                <li><span class="fa fa-calendar"></span><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_date(); ?></a></li>
                                <li><span class="fa fa-user"></span><a href="<?php echo esc_attr(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></li>
                                <li><span class="fa fa-comments"></span><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
                            </ul>
                        </div><!--/ Post info -->
                    </div><!-- Post Contents -->
                </div><!--/ Single Post -->

            <?php
            endwhile;
            wp_reset_postdata(); // Reset after the custom query loop
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>
</div><!--/ Modern Post Grid Area-->