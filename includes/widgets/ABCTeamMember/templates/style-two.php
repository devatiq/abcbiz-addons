<?php
/**
 * Render View file for ABC Team Member 2
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_style_two_id = $this->get_id();

$abcbiz_member_image = $abcbiz_settings['abcbiz_elementor_teammember_image'];
$abcbiz_member_name = $abcbiz_settings['abcbiz_elementor_teammember_name'];
$abcbiz_team_designation = $abcbiz_settings['abcbiz_elementor_teammember_designation'];
$abcbiz_member_link = $abcbiz_settings['abcbiz_elementor_teammember_link'];
$abcbiz_member_image_dimension = $abcbiz_settings['abcbiz_elementor_teammember_image_dimension'];
?>

<!-- Team Member Wrap Start-->
<div class="abcbiz-elementor-team-member-area  abcbiz-team-style-two" id="abcbiz-team-member-<?php echo esc_attr($abcbiz_style_two_id); ?>">
 
    <!-- Team Member Single Item-->
    <div class="abcbiz-team-single-item-style-two">
        <div class="abcbiz-elementor-team-img" id="abcbiz-elementor-team-style-two-img">
           
        <!-- Team Member Image -->
        <div class="abcbiz-ele-team-image">
            <?php
             if (!empty($abcbiz_member_image['id'])) {
             $abcbiz_image_id = $abcbiz_member_image['id'];
             $abcbiz_image_dimension = $abcbiz_member_image_dimension;

             $abcbiz_image_size = !empty($abcbiz_image_dimension) ? [$abcbiz_image_dimension['width'], $abcbiz_image_dimension['height']] : 'abcbiz_square_img';

             $abcbiz_image_array = wp_get_attachment_image_src($abcbiz_image_id, $abcbiz_image_size);
             $abcbiz_member_image_url = $abcbiz_image_array ? $abcbiz_image_array[0] : '';
           }

            if (empty($abcbiz_member_image_url)) {
            $abcbiz_member_image_url = plugins_url(trim(str_replace(WP_PLUGIN_DIR, '', AbcBizElementor_Path), '/') . '/assets/img/member-placeholder.jpg');
           }
          ?>
           <img src="<?php echo esc_url($abcbiz_member_image_url); ?>" alt="<?php echo esc_html($abcbiz_member_name); ?>">
            </div><!-- /Team Member Image -->

            <div class="abcbiz-ele-team-style-two-info">
                
            <?php if (!empty($abcbiz_team_designation)) : ?>
                        <p class="abcbiz-ele-team-designation"><?php echo esc_html($abcbiz_team_designation); ?></p>
                    <?php endif; ?>

                <div class="abcbiz-elementor-team-name" id="abcbiz-elementor-team-two-name">
                <?php if (!empty($abcbiz_member_name)) : ?>
                        <h3 class="abcbiz-ele-team-name">
                        <?php if (!empty($abcbiz_member_link)) : ?>
                        <a href="<?php echo esc_url($abcbiz_member_link); ?>">
                        <?php endif; ?>
                         <?php echo esc_html($abcbiz_member_name); ?></h3>
                         <?php if (!empty($abcbiz_member_link)) : ?>
                         </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php 
                    if($abcbiz_settings['abcbiz_elementor_teammember_display_social' ] == 'yes') :
                ?>
                <!--Social Profile Overlay-->
                <div class="abcbiz-ele-team-social-overlay abcbiz-team-style-two-social">
                <?php include __DIR__ . '/partials/social-links.php'; ?><!-- social icons -->                     
                </div><!--Social Profile Overlay-->
                <?php endif; ?>
            </div>

        </div>
    </div><!--/ Team Member Single Item-->   
    
</div><!-- Team Member Wrap Start-->