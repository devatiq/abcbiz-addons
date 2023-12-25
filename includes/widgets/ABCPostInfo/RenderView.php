<?php
/**
 * Render View file for ABC Post Info.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

// post info switcher
$abcbiz_post_show_date = $abcbiz_settings['abc_elementor_post_info_date_switch'] === 'yes';
$abcbiz_post_show_author = $abcbiz_settings['abc_elementor_post_info_author_switch'] === 'yes';
$abcbiz_post_show_comments = $abcbiz_settings['abc_elementor_post_info_comment_switch'] === 'yes';

?>
<!-- Post Info Area-->
<div class="abcbiz-ele-post-info-area">
    <div class="abcbiz-ele-post-info">
    
    <?php if($abcbiz_post_show_date == 'yes' ) : ?><span class="abcbiz-ele-posted-on"><i class="eicon-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></span> <?php endif; ?><?php if($abcbiz_post_show_author == 'yes' ) : ?><span class="abcbiz-ele-posted-by"><i class="eicon-user-circle-o"></i> <?php the_author_posts_link(); ?></span><?php endif; ?> <?php if($abcbiz_post_show_comments == 'yes' ) : ?>
    <span class="abcbiz-ele-comment-link"><a href="<?php comments_link(); ?>"> <i class="eicon-instagram-comments"></i> <?php comments_number(esc_html__( 'Leave a comment', 'abcbiz-multi' ), esc_html__( '1 Comment', 'abcbiz-multi' ), esc_html__( '% Comments', 'abcbiz-multi' )); ?></a></span><?php endif; ?>
      
    </div>
</div><!--/ Post Info Area-->