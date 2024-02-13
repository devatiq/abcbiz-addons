<?php
/**
 * Render View for ABC Flip Box Widget
 */

 if (!defined('ABSPATH')) exit; // Exit if accessed directly

 $abcbiz_settings = $this->get_settings_for_display();
 
 $abcbiz_elementor_flip_box_type = $abcbiz_settings['abcbiz_elementor_flip_box_icon_img_selection'];
 $abcbiz_flip_front_icon = $abcbiz_settings['abcbiz_elementor_flip_box_front_icon'];
 $abcbiz_flip_front_image = $abcbiz_settings['abcbiz_elementor_flip_box_front_image'];
 $abcbiz_flip_front_title = $abcbiz_settings['abcbiz_elementor_flip_box_front_title'];
 $abcbiz_flip_front_desc = $abcbiz_settings['abcbiz_elementor_flip_box_front_desc'];
 $abcbiz_flip_back_title = $abcbiz_settings['abcbiz_elementor_flip_box_back_title'];
 $abcbiz_flip_back_desc = $abcbiz_settings['abcbiz_elementor_flip_box_back_desc'];
 $abcbiz_flip_back_btn_text = $abcbiz_settings['abcbiz_elementor_flip_box_back_btn'];
 $abcbiz_flip_back_btn_link = $abcbiz_settings['abcbiz_elementor_flip_box_back_btn_link'];
$abcbiz_flip_back_btn_link_url = $abcbiz_flip_back_btn_link['url'];
$abcbiz_flip_back_btn_link_is_external = $abcbiz_flip_back_btn_link['is_external'] ? ' target="_blank"' : '';
$abcbiz_flip_back_btn_link_nofollow = $abcbiz_flip_back_btn_link['nofollow'] ? ' rel="nofollow"' : '';
$abcbiz_flip_direction = $abcbiz_settings['abcbiz_elementor_page_title_align'];
$abcbiz_flip_direction_class = !empty($abcbiz_flip_direction) ? $abcbiz_flip_direction : 'abcbiz-right-flip';
 ?>
 
 <div class="abcbiz-elementor-flip-box-area <?php echo esc_attr($abcbiz_flip_direction_class); ?>">
	 <div class="abcbiz-flip-box">
	 <div class="abcbiz-flip-box-front">
    <?php 
    // Check the selection type
    if ($abcbiz_elementor_flip_box_type === 'icon' && !empty($abcbiz_flip_front_icon)) : ?>
        <div class="abcbiz-flip-box-icon">
            <?php \Elementor\Icons_Manager::render_icon($abcbiz_flip_front_icon, ['aria-hidden' => 'true']); ?>
        </div>
    <?php elseif ($abcbiz_elementor_flip_box_type === 'image' && !empty($abcbiz_flip_front_image)) : ?>
        <div class="abcbiz-flip-box-image">
            <img src="<?php echo esc_url($abcbiz_flip_front_image['url']); ?>" alt="<?php echo esc_html($abcbiz_flip_front_title); ?>">
        </div>
    <?php endif; ?>

    <?php if (!empty($abcbiz_flip_front_title)) : ?>
        <h2><?php echo esc_html($abcbiz_flip_front_title); ?></h2>
    <?php endif; ?>

    <?php if (!empty($abcbiz_flip_front_desc)) : ?>
        <p class="abcbiz-front-description"><?php echo esc_html($abcbiz_flip_front_desc); ?></p>
    <?php endif; ?>
</div><!-- end front -->

		 <div class="abcbiz-flip-box-back">
			 <?php if (!empty($abcbiz_flip_back_title)) : ?>
				 <h3><?php echo esc_html($abcbiz_flip_back_title); ?></h3>
			 <?php endif; ?>
 
			 <?php if (!empty($abcbiz_flip_back_desc)) : ?>
				 <p class="abcbiz-back-description"><?php echo esc_html($abcbiz_flip_back_desc); ?></p>
			 <?php endif; ?>
 
			 <?php if (!empty($abcbiz_flip_back_btn_text)) : ?>
				<div class="abcbiz-flip-back-btn">
                <a href="<?php echo esc_url($abcbiz_flip_back_btn_link_url); ?>" <?php echo esc_attr($abcbiz_flip_back_btn_link_is_external); ?> <?php echo esc_attr($abcbiz_flip_back_btn_link_nofollow); ?>>
               <?php echo esc_html($abcbiz_flip_back_btn_text); ?>
               </a></div>
            <?php endif; ?>
		 </div><!-- end back -->
	 </div>
 </div><!-- end flip box area --> 