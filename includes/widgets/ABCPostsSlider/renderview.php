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
    'loop' => false,
    'autoplay' => false,
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
<div class="abcbiz-posts-slider-area" data-settings='<?php echo esc_attr($slider_settings); ?>'
    id="abcbiz-posts-sliders-<?php echo esc_attr($unique_id); ?>">

    <!-- Posts Slider Container -->
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
                            <!-- Slider Contents -->
                            <div class="abcbiz-posts-slider-contents">
                                <!-- Post Date -->
                                <span
                                    class="abcbiz-posts-slider-date"><?php $this->post_date_icon();
                                    echo esc_html(get_the_date('d M Y')); ?></span>
                                <!-- Post Title -->
                                <h3 class="abcbiz-posts-slider-title"><a
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div><!--/ Slider Contents -->
                        </div><!--/ Slider Thumbnail -->

                    </div><!--/ Slider Single Item -->

                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div><!--/ Slider Wrapper -->
    </div><!--/ Posts Slider Container -->
    <!-- Add Pagination -->
    <div class="abcbiz-posts-slider-pagination">
        <div class="swiper-pagination"></div>
    </div><!--/ Add Pagination -->

    <!-- Add Navigation -->
    <div class="abcbiz-posts-slider-navigation">
        <div class="swiper-button-next">
            <svg version="1.1" id="fi_664866" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.009 512.009"
                style="enable-background:new 0 0 512.009 512.009;" xml:space="preserve">
                <g>
                    <path
                        d="M508.625 247.801L508.625 247.801 392.262 131.437c-4.18-4.881-11.526-5.45-16.407-1.269-4.881 4.18-5.45 11.526-1.269 16.407.39.455.814.88 1.269 1.269l96.465 96.582H11.636C5.21 244.426 0 249.636 0 256.063s5.21 11.636 11.636 11.636H472.32l-96.465 96.465c-4.881 4.18-5.45 11.526-1.269 16.407s11.526 5.45 16.407 1.269c.455-.39.88-.814 1.269-1.269l116.364-116.364C513.137 259.67 513.137 252.34 508.625 247.801z">
                    </path>
                </g>
            </svg>
        </div>
        <div class="swiper-button-prev">
            <svg version="1.1" id="fi_545680" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <path
                        d="M492 236H68.442l70.164-69.824c7.829-7.792 7.859-20.455.067-28.284-7.792-7.83-20.456-7.859-28.285-.068L5.884 242.824c-.007.006-.012.013-.018.019-7.809 7.792-7.834 20.496-.002 28.314.007.006.012.013.018.019l104.504 104c7.828 7.79 20.492 7.763 28.285-.068 7.792-7.829 7.762-20.492-.067-28.284L68.442 276H492c11.046 0 20-8.954 20-20 0-11.046-8.954-20-20-20z">
                    </path>
                </g>
            </svg>

        </div>
    </div><!--/ Add Navigation -->

</div><!-- Posts Slider Area-->