<?php

/**
 * Render View file for ABC Circular Skills.
 */
$settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget


$abc_skills_text     = $settings['abc_elementor_circl_skill_text'] ? $settings['abc_elementor_circl_skill_text'] : '';
$abc_skills_value    = $settings['abc_elementor_circl_skill_value'] ? $settings['abc_elementor_circl_skill_value'] : '80';
$skill_empty_color = $settings['abc_elementor_circl_skill_empty_fill_color'] ? $settings['abc_elementor_circl_skill_empty_fill_color'] : 'rgba(0, 0, 0, .3)';
$abc_skill_style     = 'skilldark';
$abc_skill_color_one = $settings['abc_elementor_circl_skill_fill_gradient_color_one'] ? $settings['abc_elementor_circl_skill_fill_gradient_color_one'] : '#e60a0a';
$abc_skill_color_two = $settings['abc_elementor_circl_skill_fill_gradient_color_two'] ? $settings['abc_elementor_circl_skill_fill_gradient_color_two'] : '#d1de04';
$abc_skill_cir_size = isset($settings['abc_elementor_circl_skill_size']['size']) ? $settings['abc_elementor_circl_skill_size']['size'] : '180';

?>

<div class="abc-ele-skill-area">
    <div class="abc-ele-skill-circle abc-ele-skill-<?php echo esc_attr($id) ?>">
        <strong></strong>
        <span><?php echo esc_attr($abc_skills_text); ?></span>
    </div>
</div><!-- end skill area -->

<script type="text/javascript">
    jQuery(function($) {
        'use strict';

        //Cricle script
        let abcskillskill<?php echo esc_attr($id) ?> = $('.abc-ele-skill-<?php echo esc_attr($id) ?>');
        abcskillskill<?php echo esc_attr($id) ?>.appear({
            force_process: true
        });

        abcskillskill<?php echo esc_attr($id) ?>.on('appear', function() {
            let circle = $(this);
            if (!circle.data('inited')) {
                circle.circleProgress({
                    value: <?php echo (esc_attr($abc_skills_value) / 100); ?>,
                    size: <?php echo (int)$abc_skill_cir_size; ?>,
                    fill: {
                        gradient: ["<?php echo esc_attr($abc_skill_color_one); ?>", "<?php echo esc_attr($abc_skill_color_two); ?>"]
                    },
                    emptyFill: "<?php echo esc_attr($skill_empty_color); ?>"

                });
                circle.data('inited', true);
            }
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(parseInt(<?php echo esc_attr($abc_skills_value); ?> * progress) + '<i>%</i>');
        });
    });
</script>