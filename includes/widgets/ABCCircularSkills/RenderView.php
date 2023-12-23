<?php
/**
 * Render View file for ABC Circular Skills.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget


$abcbiz_skills_text     = $settings['abcbiz_elementor_circl_skill_text'] ? $settings['abcbiz_elementor_circl_skill_text'] : '';
$abcbiz_skills_value    = $settings['abcbiz_elementor_circl_skill_value'] ? $settings['abcbiz_elementor_circl_skill_value'] : '80';
$skill_empty_color = $settings['abcbiz_elementor_circl_skill_empty_fill_color'] ? $settings['abcbiz_elementor_circl_skill_empty_fill_color'] : 'rgba(0, 0, 0, .3)';
$abcbiz_skill_style     = 'skilldark';
$abcbiz_skill_color_one = $settings['abcbiz_elementor_circl_skill_fill_gradient_color_one'] ? $settings['abcbiz_elementor_circl_skill_fill_gradient_color_one'] : '#e60a0a';
$abcbiz_skill_color_two = $settings['abcbiz_elementor_circl_skill_fill_gradient_color_two'] ? $settings['abcbiz_elementor_circl_skill_fill_gradient_color_two'] : '#d1de04';
$abcbiz_skill_cir_size = isset($settings['abcbiz_elementor_circl_skill_size']['size']) ? $settings['abcbiz_elementor_circl_skill_size']['size'] : '180';

?>

<div class="abcbiz-ele-skill-area">
    <div class="abcbiz-ele-skill-circle abcbiz-ele-skill-<?php echo esc_attr($id) ?>">
        <strong></strong>
        <span><?php echo esc_attr($abcbiz_skills_text); ?></span>
    </div>
</div><!-- end skill area -->

<script type="text/javascript">
    jQuery(function($) {
        'use strict';

        //Cricle script
        let abcskillskill<?php echo esc_attr($id) ?> = $('.abcbiz-ele-skill-<?php echo esc_attr($id) ?>');
        abcskillskill<?php echo esc_attr($id) ?>.appear({
            force_process: true
        });

        abcskillskill<?php echo esc_attr($id) ?>.on('appear', function() {
            let circle = $(this);
            if (!circle.data('inited')) {
                circle.circleProgress({
                    value: <?php echo (esc_attr($abcbiz_skills_value) / 100); ?>,
                    size: <?php echo (int)$abcbiz_skill_cir_size; ?>,
                    fill: {
                        gradient: ["<?php echo esc_attr($abcbiz_skill_color_one); ?>", "<?php echo esc_attr($abcbiz_skill_color_two); ?>"]
                    },
                    emptyFill: "<?php echo esc_attr($skill_empty_color); ?>"

                });
                circle.data('inited', true);
            }
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(parseInt(<?php echo esc_attr($abcbiz_skills_value); ?> * progress) + '<i>%</i>');
        });
    });
</script>