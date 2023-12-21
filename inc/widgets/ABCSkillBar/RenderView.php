<?php

/**
 * Render View file for ABC Skill Bar Widget.
 */
$settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget

?>
<!--Single Skill Bar-->
<div class="abc-ele-skill-bar-area">
    <?php if ($settings['abc_skills_bar_list']): ?>
        <?php foreach ($settings['abc_skills_bar_list'] as $item): ?>
            <div class="abc-ele-progress-bar-row elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                <p class="abc-ele-progress-bar-text">
                    <?php echo esc_attr($item['abc_elementor_skill_bar_text']); ?>
                    <?php if ($settings['abc_elementor_skill_bar_percent_value_right'] == 'yes'): ?>
                        <span>
                            <?php echo esc_attr($item['abc_elementor_skill_bar_value']); ?>%
                        </span>
                    <?php endif; ?>
                </p>
                <div class="abc-ele-progress-bar">
                    <span class="abc-ele-skill-bar-percent"
                        data-percent="<?php echo esc_attr($item['abc_elementor_skill_bar_value']); ?>">
                        <?php if ($settings['abc_elementor_skill_bar_tooltip_switch'] == 'yes'): ?>
                            <span class="abc_skills_bar_percent_tooltip">
                                <?php echo esc_attr($item['abc_elementor_skill_bar_value']); ?>%
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div><!--/ Single Skill Bar-->