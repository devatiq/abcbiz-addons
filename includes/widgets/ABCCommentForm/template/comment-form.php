<?php 
// How comments are displayed
if (!function_exists('abcbiz_multi_comment_nav')) :
	function abcbiz_multi_comment_nav()
	{
		if (get_comment_pages_count() > 1 && get_option('page_comments')) :
	?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'abcbiz-addons'); ?></h2>
				<div class="nav-links">
					<?php
					if ($prev_link = get_previous_comments_link(__('Older Comments', 'abcbiz-addons'))) :
						printf('<div class="nav-previous">%s</div>', $prev_link);
					endif;

					if ($next_link = get_next_comments_link(__('Newer Comments', 'abcbiz-addons'))) :
						printf('<div class="nav-next">%s</div>', $next_link);
					endif;
					?>
				</div><!-- .nav-links -->
			</nav><!-- .comment-navigation -->
	<?php
		endif;
	}
endif;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

<div class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'abcbiz-addons' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h3>

		<?php abcbiz_multi_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php abcbiz_multi_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'abcbiz-addons' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- .comments-area -->

</div>