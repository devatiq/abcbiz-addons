<?php
/**
 * Render View file for ABC Skill Bar Widget.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_id = $this->get_id(); //unique id for this widget

?>
<!--Single Skill Bar-->
<div class="abcbiz-ele-skill-bar-area">
    <?php if ($abcbiz_settings['abc_skills_bar_list']): ?>
        <?php foreach ($abcbiz_settings['abc_skills_bar_list'] as $item): ?>
            <div class="abcbiz-ele-progress-bar-row elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                <p class="abcbiz-ele-progress-bar-text">
                    <?php echo esc_attr($item['abcbiz_elementor_skill_bar_text']); ?>
                    <?php if ($abcbiz_settings['abcbiz_elementor_skill_bar_percent_value_right'] == 'yes'): ?>
                        <span>
                            <?php echo esc_attr($item['abcbiz_elementor_skill_bar_value']); ?>%
                        </span>
                    <?php endif; ?>
                </p>
                <div class="abcbiz-ele-progress-bar">
                    <span class="abcbiz-ele-skill-bar-percent"
                        data-percent="<?php echo esc_attr($item['abcbiz_elementor_skill_bar_value']); ?>">
                        <?php if ($abcbiz_settings['abcbiz_elementor_skill_bar_tooltip_switch'] == 'yes'): ?>
                            <span class="abc_skills_bar_percent_tooltip">
                                <?php echo esc_attr($item['abcbiz_elementor_skill_bar_value']); ?>%
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div><!--/ Single Skill Bar-->