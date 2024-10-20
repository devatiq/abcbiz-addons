<?php
/*
 * search template
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

\Elementor\Plugin::$instance->frontend->add_body_class('elementor-template-full-width');

get_header();
/**
 * Before Header-Footer page template content.
 *
 * Fires before the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action('elementor/page_templates/header-footer/before_content');
?>

<div class="abcbiz-search-results-page">
    <?php
    if (!\Elementor\Plugin::$instance->preview->is_preview_mode()):
        do_action('abcbiz_search_page_content');
    else:
        ?>
        <div class="abcbiz-container">
            <?php if (have_posts()): ?>
                <h1 class="abcbiz-search-title">
                    <?php
                    /* Translators: %s is the search query */
                    printf(__('Search Results for: %s', 'abcbiz-addons'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>

                <div class="abcbiz-search-results-list">
                    <?php
                    // Start the Loop
                    while (have_posts()):
                        the_post();
                        ?>
                        <div class="abcbiz-search-result-item">
                            <h2 class="abcbiz-search-result-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="abcbiz-search-result-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>

                    <!-- Pagination -->
                    <div class="abcbiz-search-pagination">
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

                <h1 class="abcbiz-no-results-title"><?php _e('No Results Found', 'abcbiz-addons'); ?></h1>
                <p class="abcbiz-no-results-message">
                    <?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'abcbiz-addons'); ?>
                </p>

                <!-- Display search form -->
                <div class="abcbiz-search-form-container">
                    <?php get_search_form(); ?>
                </div>

            <?php endif; ?>

        </div>

    <?php endif; ?>
</div>

<?php
/**
 * After Header-Footer page template content.
 *
 * Fires after the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action('elementor/page_templates/header-footer/after_content');

get_footer();