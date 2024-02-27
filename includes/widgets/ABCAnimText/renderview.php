<?php
/**
 * Render View for ABC Animated Text
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_anim_text_before = $abcbiz_settings['abcbiz_elementor_anim_text_before'];
$abcbiz_anim_text_after = $abcbiz_settings['abcbiz_elementor_anim_text_after'];
$abcbiz_animated_texts = $abcbiz_settings['abcbiz_elementor_anim_text_list']; 
$abcbiz_animated_text_type = $abcbiz_settings['abcbiz_elementor_anim_text_type']; 
?>

<div class="abcbiz-elementor-anim-text-area <?php if (!empty($abcbiz_anim_text_after)) : ?>abcbiz-anim-has-after-text<?php endif; ?>">
    <<?php echo esc_html($abcbiz_settings['abcbiz_elementor_anim_text_tag']); ?> class="abcbiz-anim-text-headline cd-headline <?php echo esc_html($abcbiz_animated_text_type);?>">
	<?php if (!empty($abcbiz_anim_text_before)) : ?><span class="abcbiz-anim-before-text"><?php echo esc_html($abcbiz_anim_text_before); ?></span><?php endif; ?>
        <span class="abcbiz-anim-texts cd-words-wrapper">
            <?php if (!empty($abcbiz_animated_texts)) : ?>
                <?php foreach ($abcbiz_animated_texts as $index => $item) : ?>
                    <b class="<?php echo $index === 0 ? 'is-visible' : ''; ?>"><?php echo esc_html($item['abcbiz_elementor_anim_text']); ?></b>
                <?php endforeach; ?>
            <?php endif; ?>
        </span>
		<?php if (!empty($abcbiz_anim_text_after)) : ?> <span class="abcbiz-anim-after-text"><?php echo esc_html($abcbiz_anim_text_after); ?></span><?php endif; ?></<?php echo esc_html($abcbiz_settings['abcbiz_elementor_anim_text_tag']); ?>>
</div><!-- end animated text area -->