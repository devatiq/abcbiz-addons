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
	<?php if ($settings['abcbiz_elementor_gallery']) { ?>
		<?php foreach ($settings['abcbiz_elementor_gallery'] as $image) {
			if (!empty(wp_get_attachment_caption($image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'caption') {
				$caption = wp_get_attachment_caption($image['id']);
			} elseif (!empty(get_post_field('post_title', $image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'title') {
				$caption = get_post_field('post_title', $image['id']);
			} elseif (!empty(get_post_field('post_content', $image['id'])) && $settings['abcbiz_elementor_gallery_title'] == 'description')	 {
				$caption = get_post_field('post_content', $image['id']);
			} elseif (!empty(get_post_meta( $image['id'], '_wp_attachment_image_alt', true )) && $settings['abcbiz_elementor_gallery_title'] == 'alt') {
				$caption = get_post_meta( $image['id'], '_wp_attachment_image_alt', true );
			} else {
				$caption = '';
			}
			?>
			<span abc-data-url="<?php echo esc_attr($image['url']); ?>" title="<?php echo esc_attr($caption); ?>"><img
					src="<?php echo esc_attr($image['url']); ?>"></span>

		<?php } ?>
	<?php } ?>

</div>

<script>
	(function ($) {
		$(document).ready(function () {

			$('#abcbiz-photos-gallery-<?php echo esc_attr($id); ?>').magnificPopup({
				delegate: 'span',
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: true,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
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
					enabled: true
				},
				zoom: {
					enabled: true,
					duration: 300, // don't foget to change the duration also in CSS
					opener: function (element) {
						return element.find('img');
					}
				}

			});
		});
	})(jQuery);
</script>