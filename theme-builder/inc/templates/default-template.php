<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

get_header(); ?>

<main class="abcbiz-single-post">
    <div class="abcbiz-container">
        <?php
        // Check if the current post is built with Elementor
        if (\Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()) {
            // Display the Elementor content for the post
            echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display(get_the_ID());
        } else {
            the_content();
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>