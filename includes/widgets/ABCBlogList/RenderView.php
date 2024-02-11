<?php
/**
 * Render View file for ABC Blog List.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_number_of_posts = $this->get_settings('abcbiz_elementor_blog_list_post_number')['size'];

$abcbiz_img_switch = $abcbiz_settings['abcbiz_elementor_blog_list_img_switch'];
$abcbiz_date_switch = $abcbiz_settings['abcbiz_elementor_blog_list_date_switch'];
$abcbiz_comment_switch = $abcbiz_settings['abcbiz_elementor_blog_list_comment_switch'];
$abcbiz_excerpt_switch = $abcbiz_settings['abcbiz_elementor_blog_list_excerpt_switch'];
$abcbiz_read_more_switch = $abcbiz_settings['abcbiz_elementor_blog_list_read_more_switch'];
$abcbiz_pagination_switch = $abcbiz_settings['abcbiz_elementor_blog_list_pagination'];
$abcbiz_list_read_more_text = $abcbiz_settings['abcbiz_elementor_blog_list_read_more_text'];
$abcbiz_selected_category_list = $abcbiz_settings['abcbiz_elementor_blog_list_category'];
$abcbiz_excerpt_length_list = $abcbiz_settings['abcbiz_elementor_blog_list_excerpt_length'];
?>
<!-- Blog List Area-->
<div class="abcbiz-ele-blog-list-area">
    <div class="abcbiz-ele-blog-list">

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
           if ($abcbiz_selected_category_list && $abcbiz_selected_category_list !== 'all') {
            $args['cat'] = $abcbiz_selected_category_list;
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post(); ?>

                <div class="abcbiz-ele-blog-list-item">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php if (has_post_thumbnail() && $abcbiz_img_switch === 'yes') : ?>
                            <div class="abcbiz-ele-blog-list-thumb">
                                <figure>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('abcbiz_blog_list_thumb'); ?>
                                    </a>
                                </figure>
                            </div>
                        <?php elseif ($abcbiz_img_switch === 'yes') : ?>
                            <div class="abcbiz-ele-blog-list-thumb">
                                <figure>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php echo '<img src="' . esc_attr(ABCBIZ_Assets) . '/img/blog/img-placeholder.jpg" alt="' . the_title_attribute(['echo' => false]) . '">'; ?>
                                    </a>
                                </figure>
                            </div>
                        <?php endif; ?>

                        <div class="abcbiz-ele-blog-list-content">
                            <h3 class="abcbiz-ele-blog-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="abcbiz-ele-blog-list-meta">
                                <?php if ($abcbiz_date_switch === 'yes') : ?><span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time(get_option('date_format')); ?></span><?php endif; ?>
                                <?php if ($abcbiz_comment_switch === 'yes') : ?><span class="comment-link"><a href="<?php comments_link(); ?>"><i class="fa fa-commenting" aria-hidden="true"></i> <?php comments_number(esc_html__('Leave a comment', 'abcbiz-addons'), esc_html__('1 Comment', 'abcbiz-addons'), esc_html__('% Comments', 'abcbiz-addons')); ?></a></span><?php endif; ?>
                            </div>

                            <?php if ($abcbiz_excerpt_switch === 'yes') : ?>
                                <!-- Blog excerpt -->
                                <?php
                                $abcbiz_post_id = get_the_ID();
                                $abcbiz_excerpt_content = get_post_meta($abcbiz_post_id, 'abcbiz_multi_excerpt_content', true);
                                $abcbiz_limited_excerpt = wp_trim_words($abcbiz_excerpt_content, $abcbiz_excerpt_length_list);
                                if (!empty($abcbiz_excerpt_content)) : ?>
                               <div class="abcbiz-ele-blog-list-excerpt">
                               <p><?php echo esc_html($abcbiz_limited_excerpt); ?></p>
                               </div>
                           <?php endif; ?>
                           <!-- /Blog excerpt -->
                            <?php endif; ?>

                            <?php if ($abcbiz_read_more_switch === 'yes') : ?>
                                <div class="abcbiz-ele-blog-list-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html($abcbiz_list_read_more_text); ?></a></div>
                            <?php endif; ?>
                        </div>

                    </article>

                </div> <!-- end abcbiz-ele-blog-list-item -->

            <?php endwhile; ?>

            <?php if ($abcbiz_pagination_switch === 'yes') : ?>
                <div class="clearfix"></div>
                <div class="abcbiz-ele-blog-list-pagi-container">
                    <?php
                    $abcbig = 999999999;
                    echo paginate_links(array(
                        'base'    => str_replace($abcbig, '%#%', esc_url(get_pagenum_link($abcbig))),
                        'format'  => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total'   => $query->max_num_pages,
                    ));
                    ?>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="clearfix"></div>
            <h3 class="post-title"><?php esc_html_e('No Post Found', 'abcbiz-addons'); ?></h3>
            <?php
            wp_reset_postdata();
        endif; ?>

    </div>
</div><!--/ Blog List Area-->
