<?php
/**
 * Render View for ABC Modern Post Grid style 1
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

?>

<!-- Modern Post Grid Area-->
<div class="abcbiz-modern-posts-style5-area">
    <!-- Modern Posts Wrapper -->
    <div class="abcbiz-modern-post-style5-wrapper">
        <?php
        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $random_color = $this->generate_random_color(); // get random color
                ?>               
                <!-- Single Post -->
                <div class="abcbiz-modern-single-post-style4">
                    <!-- Thumbnail -->
                    <div class="abcbiz-modren-sps4-thumbnail">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php else: ?>
                            <img src="<?php echo esc_url($fallback_image); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div><!--/ Thumbnail -->

                    <!-- Post Content -->
                    <div class="abcbiz-modern-sps4-content">
                        <?php if($categories_switch === 'true' && !empty($categories_switch)): ?>
                            <!--Post Category-->
                            <div class="abcbiz-modern-sps4-category">
                                <a href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>" <?php if('true' === $random_color_switch): ?>style="background-color: <?php echo $random_color; ?>"<?php endif; ?>>
                                    <?php echo esc_html(get_the_category()[0]->name); ?>
                                </a>
                            </div><!--/ Post Category-->
                        <?php endif; ?>
                        <!-- Post Title -->
                        <div class="abcbiz-modern-sps4-title abcbiz-modren-single-post-title">
                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </div><!--/ Post Title -->

                        <!-- Post info -->
                        <div class="abcbiz-modren-single-post-info">
                            <ul>
                                <li><span class="fa fa-calendar"></span><a
                                        href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_date('d/m/y'); ?></a>
                                </li>
                                <li><span class="fa fa-user"></span><a
                                        href="<?php echo esc_attr(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                                </li>
                                <li><span class="fa fa-comments"></span><a
                                        href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
                            </ul>
                        </div><!--/ Post info -->
                    </div> <!--/ Post Content -->

                </div><!--/ Single Post -->

                <?php
            endwhile;
            wp_reset_postdata(); // Reset after the custom query loop
        else:
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div><!--/ Modern Posts Wrapper -->
</div><!-- Modern Post Grid Area-->