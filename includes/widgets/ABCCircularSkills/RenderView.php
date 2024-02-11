<?php
/**
 * Render View file for ABC Circular Skills.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget


$abcbiz_skills_text     = $abcbiz_settings['abcbiz_elementor_circl_skill_text'] ? $abcbiz_settings['abcbiz_elementor_circl_skill_text'] : '';
$abcbiz_skills_value    = $abcbiz_settings['abcbiz_elementor_circl_skill_value'] ? $abcbiz_settings['abcbiz_elementor_circl_skill_value'] : '80';
$skill_empty_color = $abcbiz_settings['abcbiz_elementor_circl_skill_empty_fill_color'] ? $abcbiz_settings['abcbiz_elementor_circl_skill_empty_fill_color'] : 'rgba(0, 0, 0, .3)';
$abcbiz_skill_style     = 'skilldark';
$abcbiz_skill_color_one = $abcbiz_settings['abcbiz_elementor_circl_skill_fill_gradient_color_one'] ? $abcbiz_settings['abcbiz_elementor_circl_skill_fill_gradient_color_one'] : '#e60a0a';
$abcbiz_skill_color_two = $abcbiz_settings['abcbiz_elementor_circl_skill_fill_gradient_color_two'] ? $abcbiz_settings['abcbiz_elementor_circl_skill_fill_gradient_color_two'] : '#d1de04';
$abcbiz_skill_cir_size = isset($abcbiz_settings['abcbiz_elementor_circl_skill_size']['size']) ? $abcbiz_settings['abcbiz_elementor_circl_skill_size']['size'] : '180';

?>

<div class="abcbiz-ele-skill-area">
<div class="abcbiz-ele-skill-circle abcbiz-ele-skill-<?php echo esc_attr($id); ?>" 
     data-skill-value="<?php echo esc_attr($abcbiz_skills_value); ?>"
     data-skill-size="<?php echo esc_attr($abcbiz_skill_cir_size); ?>"
     data-skill-color-one="<?php echo esc_attr($abcbiz_skill_color_one); ?>"
     data-skill-color-two="<?php echo esc_attr($abcbiz_skill_color_two); ?>"
     data-skill-empty-color="<?php echo esc_attr($skill_empty_color); ?>">
        <strong></strong>
        <span><?php echo esc_attr($abcbiz_skills_text); ?></span>
    </div>
</div><!-- end skill area -->

