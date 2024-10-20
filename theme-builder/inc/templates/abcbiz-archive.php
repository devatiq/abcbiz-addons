<?php
/**
 * Custom Archive Template
 * 
 * This is the template for displaying archives when no custom Elementor template is found.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-full-width' );

get_header();
/**
 * Before Header-Footer page template content.
 *
 * Fires before the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/before_content' );
?>

<div class="abcbiz-archive-page">
    <?php
    if (!\Elementor\Plugin::$instance->preview->is_preview_mode()):
        do_action('abcbiz_archive_page_content');
    else:
        ?>
        <div class="abcbiz-container">

            <?php if (have_posts()): ?>
                <h1 class="abcbiz-archive-title">
                    <?php
                    // Display the archive title
                    the_archive_title();
                    ?>
                </h1>

                <div class="abcbiz-archive-posts-list">
                    <?php
                    // Start the Loop
                    while (have_posts()):
                        the_post();
                        ?>
                        <div class="abcbiz-archive-post-item">
                            <h2 class="abcbiz-archive-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="abcbiz-archive-post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>

                    <!-- Pagination -->
                    <div class="abcbiz-archive-pagination">
                        <?php
                        // Pagination links
                        the_posts_pagination(array(
                            'prev_text' => __('Previous', 'abcbiz-addons'),
                            'next_text' => __('Next', 'abcbiz-addons'),
                        ));
                        ?>
                    </div>
                </div>

            <?php else: ?>

                <h1 class="abcbiz-no-posts-title"><?php _e('No Posts Found', 'abcbiz-addons'); ?></h1>
                <p class="abcbiz-no-posts-message">
                    <?php _e('Sorry, but no posts are available in this archive.', 'abcbiz-addons'); ?>
                </p>

            <?php endif; ?>

        </div>
        <?php
    endif;
    ?>
</div>

<?php
/**
 * After Header-Footer page template content.
 *
 * Fires after the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/after_content' );

get_footer();