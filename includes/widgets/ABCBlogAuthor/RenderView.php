<?php
/**
 * Render View file for ABC Author Bio.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

// post info switcher
$abcbiz_author_show_link = $abcbiz_settings['abcbiz_elementor_author_bio_link_switch'] === 'yes';
$abcbiz_author_text = $abcbiz_settings['abcbiz_elementor_author_bio_text'] ? $abcbiz_settings['abcbiz_elementor_author_bio_text'] : '';
?>

<!-- Author Bio Area-->
<div class="abcbiz-ele-author-bio-area">
    <div class="abcbiz-ele-author-bio">
    
    <div class="abcbiz-ele-authorleft">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), 200); ?>
</div>
<div class="abcbiz-ele-authorright">
    <?php if(!empty($abcbiz_author_text)) : ?>
        <h3 class="abc-author-bio-title"><?php echo esc_html($abcbiz_author_text);?></h3>
    <?php endif; ?>
<?php the_author_meta( 'description' ); ?><?php if($abcbiz_author_show_link == 'yes' ) : ?><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php esc_html_e( 'View all posts by', 'abcbiz-addons' );?></a> <?php the_author_posts_link(); ?> <span class="meta-nav">&rarr;</span><?php endif; ?>
</div>
      
    </div>
</div><!--/ Author bio Area-->