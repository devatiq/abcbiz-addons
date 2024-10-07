<?php
/**
 * Render View file for ABC Blog.
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();

$fallback_image = ABCBIZ_Assets . '/img/blog/image-placeholder.jpg';

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $settings['abcbiz_popular_posts_limit'],
    'ignore_sticky_posts' => true,
    'orderby' => 'comment_count', // Order by comment count
    'order' => 'DESC', // Display highest comments first
);

?>

<!-- Popular Posts Area-->
<div class="abcbiz-popular-posts-area">
    <div class="abcbiz-popular-posts-wrapper">
        <?php

        $popular_posts = new WP_Query($args);

        if ($popular_posts->have_posts()):
            while ($popular_posts->have_posts()):
                $popular_posts->the_post();

                ?>
                <!--Single Post -->
                <div class="abcbiz-popular-posts-single-post">
                    <!-- Post Thumbnail -->
                    <div class="abcbiz-popular-post-thumbanil">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php else: ?>
                            <img src="<?php echo esc_url($fallback_image); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div><!--/ Post Thumbnail -->
                    <!-- Post Contents -->
                    <div class="abcbiz-popular-post-contents">
                        <!--Category -->
                        <div class="abcbiz-popular-post-cat">
                            <a
                                href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>"><?php echo esc_html(get_the_category()[0]->name); ?></a>
                        </div><!--/ Category -->
                        <!-- Post Title -->
                        <h3 class="abcbiz-popular-post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3><!--/ Post Title -->
                        <!-- Post Meta -->
                        <div class="abcbiz-popular-post-meta">
                            <span class="abcbiz-popular-post-comment">
                                <i class="fa fa-comments"></i>
                                <?php echo get_comments_number(); ?>
                            </span>
                            <span class="abcbiz-popular-post-date">
                                <i class="fa fa-calendar"></i>
                                <?php echo get_the_date(); ?>
                                </span">
                        </div><!--/ Post Meta -->
                    </div><!--/ Post Contents -->
                </div><!--/ Single Post -->
                <?php
            endwhile;
        else:
            echo esc_html__('No posts found', 'abcbiz-addons');
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div><!--/ Popular Posts Area-->