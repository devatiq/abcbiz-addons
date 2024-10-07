<?php
/**
 * Render View file for ABC Blog.
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Lib\PostViewTracker; // Import the PostViewTracker class

$settings = $this->get_settings_for_display();

$fallback_image = ABCBIZ_Assets . '/img/blog/image-placeholder.jpg';
$random_color_switch = isset($settings['category_random_color_switch']) ? $settings['category_random_color_switch'] : 'false';


// Determine if popular posts should be based on comments or views
$orderby = $settings['abcbiz_popular_posts_views'] === 'views' ? 'meta_value_num' : 'comment_count';
$meta_key = $settings['abcbiz_popular_posts_views'] === 'views' ? 'abcbiz_post_views' : '';

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $settings['abcbiz_popular_posts_limit'],
    'ignore_sticky_posts' => true,
    'orderby' => $orderby,
    'meta_key' => $meta_key,
    'order' => 'DESC',
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
                $random_color = $this->generate_random_color(); // get random color
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
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '"';
                                if ('true' === $random_color_switch) {
                                    echo ' style="background-color: ' . $random_color . '"';
                                }
                                echo '>' . esc_html($categories[0]->name) . '</a>';
                            }
                            ?>
                        </div><!--/ Category -->
                        <!-- Post Title -->
                        <h3 class="abcbiz-popular-post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3><!--/ Post Title -->
                        <!-- Post Meta -->
                        <div class="abcbiz-popular-post-meta">
                            <span class="abcbiz-popular-post-comment">
                                <i class="fa fa-comments"></i>
                                <?php $comments_number = get_comments_number();
                                printf(
                                    esc_html(_n('%s Comment', '%s Comments', $comments_number, 'abcbiz-addons')),
                                    esc_html($comments_number)
                                );
                                ?>
                            </span>
                            <span class="abcbiz-popular-post-date">
                                <span class="abcbiz-popular-post-views">
                                    <i class="fa fa-eye"></i>
                                    <?php
                                    // Get the post views using the PostViewTracker class
                                    $views = PostViewTracker::get_views(get_the_ID());
                                    echo esc_html($views) . ' ' . esc_html__('Views', 'abcbiz-addons');
                                    ?>
                                </span>
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