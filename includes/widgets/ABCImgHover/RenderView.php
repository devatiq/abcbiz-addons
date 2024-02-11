<?php
/**
 * Render View file for ABC Image Hover
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_imghover_image = $abcbiz_settings['abcbiz_elementor_imghover_image'];
$abcbiz_imghover_image_dimension = $abcbiz_settings['abcbiz_elementor_imghover_image_dimension'];
$abcbiz_imghover_title = $abcbiz_settings['abcbiz_elementor_imghover_title_text'];
$abcbiz_imghover_subtitle = $abcbiz_settings['abcbiz_elementor_imghover_sub_title_text'];
$abcbiz_imghover_link = $abcbiz_settings['abcbiz_elementor_imghover_link'];
?>

<!-- Abcbiz Img Hover Area Start -->
<div class="abcbiz-elementor-img-hover-area">
    <div class="abcbiz-elementor-img-hover-wrap">
        <div class="abcbiz-elementor-img-hover-item">

             <?php
             if (!empty($abcbiz_imghover_image['id'])) {
             $abcbiz_image_id = $abcbiz_imghover_image['id'];
             $abcbiz_image_dimension = $abcbiz_imghover_image_dimension;

             $abcbiz_image_size = !empty($abcbiz_image_dimension) ? [$abcbiz_image_dimension['width'], $abcbiz_image_dimension['height']] : 'abcbiz_square_img';

             $abcbiz_image_array = wp_get_attachment_image_src($abcbiz_image_id, $abcbiz_image_size);
             $abcbiz_imghover_image_url = $abcbiz_image_array ? $abcbiz_image_array[0] : '';
           }

            if (empty($abcbiz_imghover_image_url)) {
            $abcbiz_imghover_image_url = plugins_url(trim(str_replace(WP_PLUGIN_DIR, '', ABCBIZ_Path), '/') . '/assets/img/img-hover-placeholder.jpg');
           }
          ?>
           <img src="<?php echo esc_url($abcbiz_imghover_image_url); ?>" alt="<?php echo esc_html($abcbiz_imghover_title); ?>">

            <?php if (!empty($abcbiz_imghover_link['url'])) : ?>
              <a href="<?php echo esc_url($abcbiz_imghover_link['url']); ?>" <?php echo $abcbiz_imghover_link['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $abcbiz_imghover_link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
              <?php endif; ?>
                 <div class="abcbiz-img-hover-overlay"> 
                    <?php if (!empty($abcbiz_imghover_title)) : ?>
                        <h3 class="abcbiz-img-hover-title"><?php echo esc_html($abcbiz_imghover_title); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($abcbiz_imghover_subtitle)) : ?>
                        <p class="abcbiz-img-hover-subtitle"><?php echo esc_html($abcbiz_imghover_subtitle); ?></p>
                    <?php endif; ?>
                 </div>
            <?php if (!empty($abcbiz_imghover_link['url'])) : ?>
                </a>
            <?php endif; ?>
        </div><!-- /Img Hover item -->
    </div><!-- /Img Hover wrap -->
</div><!-- /Img Hover area -->
