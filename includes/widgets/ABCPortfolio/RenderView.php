<?php
/**
 * Render View file for ABC Portfolio
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_portfolio_image = $abcbiz_settings['abcbiz_elementor_portfolio_image'];
$abcbiz_portfolio_image_dimension = $abcbiz_settings['abcbiz_elementor_portfolio_image_dimension'];
$abcbiz_portfolio_title = $abcbiz_settings['abcbiz_elementor_portfolio_title_text'];
$abcbiz_portfolio_subtitle = $abcbiz_settings['abcbiz_elementor_portfolio_sub_title_text'];
$abcbiz_portfolio_link = $abcbiz_settings['abcbiz_elementor_portfolio_link'];
?>

<!-- Abcbiz Portfolio Area Start -->
<div class="abcbiz-elementor-portfolio-area">
    <div class="abcbiz-elementor-portfolio-wrap">
        <div class="abcbiz-elementor-portfolio-item">

             <?php
             if (!empty($abcbiz_portfolio_image['id'])) {
             $abcbiz_image_id = $abcbiz_portfolio_image['id'];
             $abcbiz_image_dimension = $abcbiz_portfolio_image_dimension;

             $abcbiz_image_size = !empty($abcbiz_image_dimension) ? [$abcbiz_image_dimension['width'], $abcbiz_image_dimension['height']] : 'abcbiz_square_img';

             $abcbiz_image_array = wp_get_attachment_image_src($abcbiz_image_id, $abcbiz_image_size);
             $abcbiz_portfolio_image_url = $abcbiz_image_array ? $abcbiz_image_array[0] : '';
           }

            if (empty($abcbiz_portfolio_image_url)) {
            $abcbiz_portfolio_image_url = plugins_url(trim(str_replace(WP_PLUGIN_DIR, '', ABCBIZ_Path), '/') . '/assets/img/port-placeholder.jpg');
           }
          ?>
           <img src="<?php echo esc_url($abcbiz_portfolio_image_url); ?>" alt="<?php echo esc_html($abcbiz_portfolio_title); ?>">

            <?php if (!empty($abcbiz_portfolio_link['url'])) : ?>
                <a href="<?php echo esc_url($abcbiz_portfolio_link['url']); ?>" <?php echo $abcbiz_portfolio_link['is_external'] ? 'target="' . esc_attr('_blank') . '"' : ''; ?> <?php echo $abcbiz_portfolio_link['nofollow'] ? 'rel="' . esc_attr('nofollow') . '"' : ''; ?>>
              <?php endif; ?>
                 <div class="abcbiz-portfolio-overlay"> 
                    <?php if (!empty($abcbiz_portfolio_title)) : ?>
                        <h3 class="abcbiz-portfolio-title"><?php echo esc_html($abcbiz_portfolio_title); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($abcbiz_portfolio_subtitle)) : ?>
                        <p class="abcbiz-portfolio-subtitle"><?php echo esc_html($abcbiz_portfolio_subtitle); ?></p>
                    <?php endif; ?>
                 </div>
            <?php if (!empty($abcbiz_portfolio_link['url'])) : ?>
                </a>
            <?php endif; ?>
        </div><!-- /portfolio item -->
    </div><!-- /portfolio wrap -->
</div><!-- /portfolio area -->
