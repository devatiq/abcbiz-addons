<?php

/**
 * Render View file for ABC Post Info.
 */
$settings = $this->get_settings_for_display();

// post info switcher
$abc_post_show_date = $settings['abc_elementor_post_info_date_switch'] === 'yes';
$abc_post_show_author = $settings['abc_elementor_post_info_author_switch'] === 'yes';
$abc_post_show_comments = $settings['abc_elementor_post_info_comment_switch'] === 'yes';

?>
<!-- Post Info Area-->
<div class="abc-ele-post-info-area">
    <div class="abc-ele-post-info">
    
    <?php if($abc_post_show_date == 'yes' ) : ?><span class="abc-ele-posted-on"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time( get_option( 'date_format' ) ); ?></span> <?php endif; ?><?php if($abc_post_show_author == 'yes' ) : ?><span class="abc-ele-posted-by"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span><?php endif; ?> <?php if($abc_post_show_comments == 'yes' ) : ?>
    <span class="abc-ele-comment-link"><a href="<?php comments_link(); ?>"> <i class="fa fa-commenting" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Leave a comment', 'ABCMAFTH' ), esc_html__( '1 Comment', 'ABCMAFTH' ), esc_html__( '% Comments', 'ABCMAFTH' )); ?></a></span><?php endif; ?>
      
    </div>
</div><!--/ Post Info Area-->