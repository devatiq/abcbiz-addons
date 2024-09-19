<?php
/**
 * Render View for ABC Animated Text
 */
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$id = $this->get_id();
?>

<div class="abcbiz-photos-gallery" id="abcbiz-photos-gallery-<?php echo esc_attr($id); ?>">
	<?php if (!empty($settings['abcbiz_elementor_gallery'])) { ?>
		<?php foreach ($settings['abcbiz_elementor_gallery'] as $image) {
			if (!empty(wp_get_attachment_caption($image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'caption') {
				$caption = wp_get_attachment_caption($image['id']);
			} elseif (!empty(get_post_field('post_title', $image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'title') {
				$caption = get_post_field('post_title', $image['id']);
			} elseif (!empty(get_post_field('post_content', $image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'description') {
				$caption = get_post_field('post_content', $image['id']);
			} elseif (!empty(get_post_meta($image['id'], '_wp_attachment_image_alt', true)) && $settings['abcbiz_elementor_gallery_title'] == 'alt') {
				$caption = get_post_meta($image['id'], '_wp_attachment_image_alt', true);
			} else {
				$caption = '';
			}
			?>
			<span abc-data-url="<?php echo esc_attr($image['url']); ?>" title="<?php echo esc_attr($caption); ?>">
				<img src="<?php echo esc_attr($image['url']); ?>">
				<?php if (!empty($caption)) { ?>
					<span class="abcbiz-photos-gallery-caption"><?php echo esc_html($caption); ?></span>
				<?php } ?>
			</span>

		<?php } ?>
	<?php } else { ?>
		<span abc-data-url="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"><img
				src="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"></span>
		<span abc-data-url="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"><img
				src="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"></span>
		<span abc-data-url="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"><img
				src="<?php echo ABCBIZ_Assets; ?>/img/member-placeholder.jpg"></span>
	<?php } ?>

</div>

<script>
	(function ($) {
		$(document).ready(function () {

			$('#abcbiz-photos-gallery-<?php echo esc_attr($id); ?>').magnificPopup({
				delegate: 'span',
				type: 'image',
				closeOnContentClick: false,
				showCloseBtn: <?php echo $settings['abcbiz_elementor_gallery_close_button'] == 'true' ? 'true' : 'false'; ?>,
				closeBtnInside: <?php echo !empty($settings['abcbiz_elementor_gallery_btn_inside']) && $settings['abcbiz_elementor_gallery_btn_inside'] == 'true' ? 'true' : 'false'; ?>,
				mainClass: 'mfp-with-zoom mfp-img-mobile abcbiz-photos-gallery-popup',
				allowHTMLInTemplate: true,
				image: {
					verticalFit: true,
					titleSrc: function (item) {
						return item.el.attr('title');
					}
				},
				callbacks: {
					elementParse: function (item) {
						item.src = item.el.attr('abc-data-url');
					}
				},
				gallery: {
					enabled: true,
					preload: [0, 1],
					// Custom navigation icons
					arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%">' +
						'<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg">' +
						'<g id="_16_next" data-name="16 next">' +
						'<path d="m16 2a14 14 0 1 0 14 14 14 14 0 0 0 -14-14zm0 26a12 12 0 1 1 12-12 12 12 0 0 1 -12 12zm-2.5-18.41 6.41 6.41-6.41 6.41-1.41-1.41 5-5-5-5z"></path>' +
						'</g></svg>' +
						'</button>',
					tPrev: 'Previous', // title for left button
					tNext: 'Next', // title for right button
				},
				zoom: {
					enabled: true,
					duration: 300, // don't forget to change the duration also in CSS
					opener: function (element) {
						return element.find('img');
					}
				},
			});
		});
	})(jQuery);
</script>
