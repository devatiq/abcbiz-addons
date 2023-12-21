<?php
/**
 * Render View file for ABC Blog List.
 */
$settings = $this->get_settings_for_display();
$abc_recent_number_of_posts = $this->get_settings('abc_elementor_recent_posts_post_number')['size'];
$abc_post_date_switch = $settings['abc_elementor_recent_posts_date_switch'];
$abc_post_comment_switch = $settings['abc_elementor_recent_posts_comment_switch'];
$abc_post_read_more_switch = $settings['abc_elementor_recent_posts_read_more_switch'];
$abc_post_read_more_text = $settings['abc_elementor_recent_posts_read_more_text'];
$abc_selected_post_categories = $settings['abc_elementor_recent_posts_post_category'];
?>

<!-- Recent Posts Area -->
<div class="abc-ele-recent-post-area">
    <div class="abc-ele-recent-post">

        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }

        $args = array(
            'post_type'      => 'post',
            'paged'          => $paged,
            'posts_per_page' => $abc_recent_number_of_posts,
        );

        // specific category query
        if ($abc_selected_post_categories && $abc_selected_post_categories !== 'all') {
            $args['cat'] = $abc_selected_post_categories;
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post(); ?>

                <div class="abc-ele-recent-post-item">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="abc-ele-recent-post-content">
                            <h3 class="abc-ele-recent-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="abc-ele-recent-post-meta">
                                <?php if ($abc_post_date_switch === 'yes') : ?><span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time(get_option('date_format')); ?></span><?php endif; ?>
                                <?php if ($abc_post_comment_switch === 'yes') : ?><span class="comment-link"><a href="<?php comments_link(); ?>"><i class="fa fa-commenting" aria-hidden="true"></i> <?php comments_number(esc_html__('Leave a comment', 'ABCMAFTH'), esc_html__('1 Comment', 'ABCMAFTH'), esc_html__('% Comments', 'ABCMAFTH')); ?></a></span><?php endif; ?>
                            </div>

                            <?php if ($abc_post_read_more_switch === 'yes') : ?>
                                <div class="abc-ele-recent-post-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html($abc_post_read_more_text); ?></a></div>
                            <?php endif; ?>
                        </div>

                    </article>

                </div> <!-- end abc-ele-recent-post-item -->

            <?php endwhile; ?>

        <?php else : ?>
            <div class="clearfix"></div>
            <h3 class="post-title"><?php esc_html_e('No Post Found', 'ABCMAFTH'); ?></h3>
            <?php
            wp_reset_postdata();
        endif; ?>

    </div>
</div><!--/ Recent Posts Area -->
