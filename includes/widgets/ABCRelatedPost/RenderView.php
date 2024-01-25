<?php 
/**
 * Render View file for ABC Related Post.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
global $post; 
?>

<!-- Related post Area-->
<div class="abcbiz-ele-related-post-area">
    <div class="abcbiz-ele-related-post">
        <ul>
            <?php
            $orig_post = $post;

            // Ensure $post is set
            if (isset($post)) {
                $categories = get_the_category($post->ID);

                if ($categories) {
                    $category_ids = array();
                    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                    $args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => 1,
                    );

                    $my_query = new WP_Query($args);

                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
            ?>
                            <li>
                                <figure><a rel="external" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('abcbiz_blog_grid_thumb'); ?></a></figure>
                                <h4 class="abcbiz-ele-related-post-heading"><a rel="external" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                            </li>
            <?php
                        }
                    } else {
                        echo '<li>' . esc_html__('No related posts found', 'abcbiz-addons') . '</li>';
                    }
                    wp_reset_query();
                }
            } else {
                echo '<li>' . esc_html__('No post available.', 'abcbiz-addons') . '</li>';
            }

            $post = $orig_post;
            ?>
        </ul>
   <div class="clearfix"></div>
    </div>
</div><!--/ Related post Area-->