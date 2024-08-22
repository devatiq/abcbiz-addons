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
			  if(!empty(wp_get_attachment_caption($image['id']))) {
				$caption = wp_get_attachment_caption($image['id']);				
			  }elseif(!empty(get_post_field( 'post_title', $image['id'] ))) {
				$caption = get_post_field( 'post_title', $image['id'] );
			  }else{
				$caption = '';
			  }					
			?>	
			<span href="<?php echo esc_attr($image['url']); ?>" title="<?php echo esc_attr($caption); ?>"><img
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
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				allowHTMLInTemplate: true,
				image: {
					verticalFit: true,
					titleSrc: function (item) {
						return item.el.attr('title');
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