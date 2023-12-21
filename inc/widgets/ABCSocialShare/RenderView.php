<?php
/**
 * ABC Social Share Render View
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$settings = $this->get_settings_for_display();
$show_single_share_icon = isset($settings['abc_elementor_single_share_icon_show']) && $settings['abc_elementor_single_share_icon_show'] === 'yes';
?>

<div class="abc-elementor-social-share-area">

    <?php $abcelsocialtitle = str_replace(' ', '%20', the_title_attribute('echo=0')); ?>

    <ul>
        <?php if ($show_single_share_icon) : ?>
            <li class="abc-single-share"><i class="fa-solid fa-share-nodes"></i></li>
        <?php endif; ?>

        <li><a href="http://twitter.com/home/?status=<?php echo esc_attr($abcelsocialtitle); ?>-<?php the_permalink(); ?>" title="<?php esc_html_e('Tweet This Post', 'ABCMAFTH'); ?>" target=_blank><i class="fa-brands fa-x-twitter"></i></a></li>

        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo esc_attr($abcelsocialtitle); ?>" title="<?php esc_html_e('Share on Facebook', 'ABCMAFTH'); ?>" target=_blank><i class="fa-brands fa-facebook-f"></i></a></li>

        <?php
        global $post;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_url = wp_get_attachment_url($thumbnail_id);
        ?>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($thumbnail_url); ?>" title="<?php esc_html_e('Share on Pinterest', 'ABCMAFTH'); ?>" target=_blank><i class="fa-brands fa-pinterest-p"></i></a></li>

        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo esc_attr($abcelsocialtitle); ?>&amp;url=<?php the_permalink(); ?>" title="<?php esc_html_e('Share on LinkedIn', 'ABCMAFTH'); ?>" target=_blank><i class="fa-brands fa-linkedin-in"></i></a></li>

        <li><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($abcelsocialtitle); ?>" title="<?php esc_html_e('Share on Reddit', 'ABCMAFTH'); ?>" target=_blank><i class="fa-brands fa-reddit-alien"></i></a></li>
    </ul>

</div><!-- social share area -->
