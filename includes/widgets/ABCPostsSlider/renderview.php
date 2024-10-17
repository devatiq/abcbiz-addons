<?php
/**
 * Render View for ABC Posts Slider Widget
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


$settings = $this->get_settings_for_display();
$fallback_image = ABCBIZ_Assets . '/img/blog/image-placeholder.jpg';

// $slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 1;
// $slides_per_view = !empty($settings['slides_per_view']) ? $settings['slides_per_view'] : 1;
// $slides_per_view_tablet = isset($settings['slides_per_view_tablet']) ? $settings['slides_per_view_tablet'] : 1;
// $slides_per_view_mobile = isset($settings['slides_per_view_mobile']) ? $settings['slides_per_view_mobile'] : 1;

// $loop = $settings['slider_loop'] === 'yes' ? true : false;
// $autoplay = $settings['slider_autoplay'] === 'yes' ? ['delay' => 6000, 'disableOnInteraction' => false] : false;
// $arrows = $settings['show_arrows'] === 'yes' ? true : false;
// $pagination = $settings['show_pagination'] === 'yes' ? true : false;

// Combine all the settings into a single JSON string
$slider_settings = json_encode([
    'slidesPerView' => 3,
    // 'slidesPerViewTablet' => $slides_per_view_tablet,
    // 'slidesPerViewMobile' => $slides_per_view_mobile,
    'loop' => true,
    'autoplay' => true,
    // 'arrows' => $arrows,
    // 'pagination' => $pagination,
]);

// Create a unique ID for the slider instance
$unique_id = $this->get_id();

$arg = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'ignore_sticky_posts' => true
);

$posts = new WP_Query($arg);
?>

<!-- Posts Slider Area-->
<div class="abcbiz-posts-slider-area"  data-settings='<?php echo esc_attr($slider_settings); ?>' id="abcbiz-posts-sliders-<?php echo esc_attr($unique_id); ?>" >

    <div class="abcbiz-posts-slider-container">
        <!--Slider Wrapper -->
        <div class="abcbiz-posts-slider-wrapper">
            <?php
            if ($posts->have_posts()):
                while ($posts->have_posts()):
                    $posts->the_post();
                    ?>
                    <!--Slider Single Item -->
                    <div class="abcbiz-posts-slider-single-item">
                        <!-- Slider Thumbnail -->
                        <div class="abcbiz-posts-slider-thumbnail">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php else: ?>
                                <img src="<?php echo esc_url($fallback_image); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div><!--/ Slider Thumbnail -->
                        <!-- Slider Contents -->
                        <div class="abcbiz-posts-slider-contents">
                            <!-- Post Date -->
                            <span class="abcbiz-posts-slider-date"><?php echo get_the_date(); ?></span>
                            <!-- Post Title -->
                            <h3 class="abcbiz-posts-slider-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div><!--/ Slider Contents -->
                    </div><!--/ Slider Single Item -->

                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div><!--/ Slider Wrapper -->

        <!-- Add Pagination -->
        <div class="abcbiz-posts-slider-pagination">
            <div class="swiper-pagination"></div>
        </div><!--/ Add Pagination -->

        <!-- Add Navigation -->
        <div class="abcbiz-posts-slider-navigation">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div><!--/ Add Navigation -->

    </div>

</div><!-- Posts Slider Area-->