<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>
<!-- four column blog area -->
<div class="abcbiz-ele-four-column-blog-area">

    <div class="abcbiz-ele-four-column-blog"><!-- start abcbiz-ele-four-column-blog -->
        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }

        $args = array(
            'post_type'      => 'post',
            'paged'          => $paged,
            'posts_per_page' => $abcbiz_number_of_posts,
        );

        // specific category query
        if ($abcbiz_selected_category && $abcbiz_selected_category !== 'all') {
            $args['cat'] = $abcbiz_selected_category;
        }

        $query = new WP_Query($args);

        $post_count = 0;

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <div class="abcbiz-ele-blog-item">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php if (has_post_thumbnail() && $abcbiz_img_switch === 'yes') : ?>
                            <div class="abcbiz-ele-blog-thumb">
                                <figure>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('abcbiz_blog_grid_thumb'); ?>
                                    </a>
                                </figure>
                            </div>
                        <?php elseif ($abcbiz_img_switch === 'yes') : ?>
                            <div class="abcbiz-ele-blog-thumb">
                                <figure>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                                        <?php echo '<img src="' . AbcBizElementor_Assets . '/img/blog/img-placeholder.jpg" alt="the_title_attribute();">'; ?>

                                    </a>
                                </figure>
                            </div>
                        <?php endif; ?>

                        <h3 class="abcbiz-ele-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="abcbiz-ele-blog-meta">
                            <?php if ($abcbiz_date_switch === 'yes') : ?><span class="posted-on"><i class="eicon-calendar"></i> <?php the_time(get_option('date_format')); ?></span><?php endif; ?>
                            <?php if ($abcbiz_comment_switch === 'yes') : ?><span class="comment-link"><a href="<?php comments_link(); ?>"><i class="eicon-instagram-comments"></i> <?php comments_number(esc_html__('Leave a comment', 'abcbiz-multi'), esc_html__('1 Comment', 'abcbiz-multi'), esc_html__('% Comments', 'abcbiz-multi')); ?></a></span><?php endif; ?>
                        </div>

                        <?php if ($abcbiz_excerpt_switch === 'yes') : ?>
                             <!-- Blog excerpt -->
                             <?php
                                $abcbiz_post_id = get_the_ID();
                                $abcbiz_excerpt_content = get_post_meta($abcbiz_post_id, 'abcbiz_multi_excerpt_content', true);
                                $abcbiz_limited_excerpt = wp_trim_words($abcbiz_excerpt_content, $abcbiz_excerpt_length_grid);
                                if (!empty($abcbiz_excerpt_content)) : ?>
                               <div class="abcbiz-ele-blog-grid-excerpt">
                               <p><?php echo esc_html($abcbiz_limited_excerpt); ?></p>
                               </div>
                           <?php endif; ?>
                           <!-- /Blog excerpt -->
                        <?php endif; ?>

                        <?php if ($abcbiz_read_more_switch === 'yes') : ?>
                            <div class="abcbiz-ele-blog-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html($abcbiz_grid_read_more_text); ?></a> </div><?php endif; ?>
                    </article>

                </div> <!-- end abcbiz-ele-blog-item -->

                <?php
                $post_count++;

                ?>

            <?php endwhile; ?>
    </div> <!-- end abcbiz-ele-four-column-blog -->
    <?php if ($abcbiz_pagination_switch === 'yes') : ?>
        <div class="abcbiz-ele-pagination-container">
            <?php
                $abcbig = 999999999;
                echo paginate_links(array(
                    'base'    => str_replace($abcbig, '%#%', esc_url(get_pagenum_link($abcbig))),
                    'format'  => '?paged=%#%',
                    'current' => max(1, $paged),
                    'total'   => $query->max_num_pages,
                ));
            ?>
        </div><?php endif; ?>

        <?php else : ?>
            <div class="clearfix"></div>
            <h3 class="post-title"><?php esc_html_e('No Post Found', 'abcbiz-multi'); ?></h3>
        <?php
            wp_reset_postdata();
        endif; ?>
</div><!-- / four column blog -->