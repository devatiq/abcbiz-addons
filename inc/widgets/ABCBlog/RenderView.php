<?php

/**
 * Render View file for ABC Blog.
 */
$settings = $this->get_settings_for_display();

// blog info switcher
$abc_blog_date_switch = $settings['abc_elementor_blog_date_switch'] ? $settings['abc_elementor_blog_date_switch'] : '';
$abc_blog_comment_switch = $settings['abc_elementor_blog_comment_switch'] ? $settings['abc_elementor_blog_comment_switch'] : '';

// blog readmore switcher
$abc_blog_readmore_switch = $settings['abc_elementor_blog_read_more_switch'] ? $settings['abc_elementor_blog_read_more_switch'] : '';

// "Read More Text" control
$abc_read_more_text = $this->get_settings('abc_elementor_blog_read_more_text');
$abc_selected_category_fancy = $settings['abc_elementor_blog_category_fancy'];

?>
<!-- Blog Area-->
<div class="abc-ele-blogs-area">
    <div class="abc-ele-blogs">

        <?php
        // Query the first post of post type 'post'
        $first_post_args = array(
            'post_type' => 'post',
            'posts_per_page' => 1, // Number of posts to display
            'ignore_sticky_posts' => 1 // skip the sticky post
        );

         // specific category query
         if ($abc_selected_category_fancy && $abc_selected_category_fancy !== 'all') {
            $first_post_args['cat'] = $abc_selected_category_fancy;
        }

        $first_post_query = new WP_Query($first_post_args);

        if ($first_post_query->have_posts()) :
            while ($first_post_query->have_posts()) : $first_post_query->the_post();
        ?>

                <!-- Single Blog Area for the first post -->
                <div class="abc-ele-single-blog-area abc-ele-single-first">
                    <!-- Thumbnail -->
                    <div class="abc-ele-single-blog-thumbnail">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('abc-elementor-post'); // Use the custom thumbnail size
                            } else {
                                echo '<img src="' . ABCELEMENTOR_ASSETS . '/img/blog/image-placeholder.jpg" alt="">';
                            }
                            ?>
                        </a>
                    </div><!--/ Thumbnail -->
                    <!-- Content Area -->
                    <div class="abc-ele-single-blog-content-area">

                        <!-- Blog info -->     
                        <?php if ($abc_blog_date_switch == 'yes' || $abc_blog_comment_switch == 'yes') : ?>
                            <div class="abc-ele-single-blog-info">
                                <?php if($abc_blog_date_switch == 'yes' ) : ?>
                                    <div class="abc-ele-single-blog-date">
                                        <i class="eicon-calendar"></i>
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if($abc_blog_comment_switch == 'yes' ) : ?>
                                    <div class="abc-ele-single-blog-author">
                                        <i class="eicon-instagram-comments"></i>
                                        <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!--/ Blog info -->
                        <?php endif; ?> 
                        <!-- Blog Title -->
                        <div class="abc-ele-single-blog-title">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 10, NULL)); ?></a></h2>
                        </div><!--/ Blog Title -->
                        <!-- Blog Button -->
                        <div class="abc-ele-single-blog-button">
                            <?php if ($abc_blog_readmore_switch == 'yes') : ?>
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html($abc_read_more_text);?> <i class="eicon-arrow-right"></i></a>
                            <?php endif; ?>
                        </div><!--/ Blog Button -->
                    </div><!--/ Content Area -->
                </div><!--/ Single Blog Area -->

        <?php
            endwhile;
            wp_reset_postdata(); // Reset the post data
        endif;
        ?>

        <!-- Single 3 posts Blog Area -->
        <div class="abc-ele-single-blog-rem-posts">

            <?php
            // Query the next three posts of post type 'post'
            $remaining_posts_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3, // Number of posts to display
                'offset' => 1, // Skip the first post
                'ignore_sticky_posts' => 1 // skip the sticky post
            );

             // specific category query
           if ($abc_selected_category_fancy && $abc_selected_category_fancy !== 'all') {
            $remaining_posts_args['cat'] = $abc_selected_category_fancy;
        }

            $remaining_posts_query = new WP_Query($remaining_posts_args);

            if ($remaining_posts_query->have_posts()) :
                while ($remaining_posts_query->have_posts()) : $remaining_posts_query->the_post();
            ?>

                    <!-- Single Blog Area for the remaining posts -->
                    <div class="abc-ele-single-blog-area">
                        <!-- Thumbnail -->
                        <div class="abc-ele-single-blog-thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('abc-elementor-post'); // Use the custom thumbnail size
                                } else {
                                    echo '<img src="' . ABCELEMENTOR_ASSETS . '/img/blog/image-placeholder.jpg" alt="">';
                                }
                                ?>
                            </a>
                        </div><!--/ Thumbnail -->
                        <!-- Content Area -->
                        <div class="abc-ele-single-blog-content-area">
                            <!-- Blog info -->
                            <?php if ($abc_blog_date_switch == 'yes' || $abc_blog_comment_switch == 'yes') : ?>
                                <div class="abc-ele-single-blog-info">
                                    <?php if($abc_blog_date_switch == 'yes' ) : ?>                                      
                                        <div class="abc-ele-single-blog-date">
                                            <i class="eicon-calendar"></i>
                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($abc_blog_comment_switch == 'yes' ) : ?>
                                        <div class="abc-ele-single-blog-author">
                                            <i class="eicon-instagram-comments"></i>
                                            <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div><!--/ Blog info -->
                            <?php endif; ?>                            
                            <!-- Blog Title -->
                            <div class="abc-ele-single-blog-title">
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 5, NULL)); ?></a></h2>
                            </div><!--/ Blog Title -->
                            <!-- Blog Button -->
                            <div class="abc-ele-single-blog-button">
                                <?php if ($abc_blog_readmore_switch == 'yes') : ?>
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html($abc_read_more_text);?> <i class="eicon-arrow-right"></i></a>
                                <?php endif; ?>
                            </div><!--/ Blog Button -->
                        </div><!--/ Content Area -->
                    </div><!--/ Single Blog Area -->

            <?php
                endwhile;
                wp_reset_postdata(); // Reset the post data
            endif;
            ?>

        </div><!--/ Single 3 posts Blog Area-->

    </div>
</div><!--/ Blog Area-->
