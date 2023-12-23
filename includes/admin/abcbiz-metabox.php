<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Add metabox for post excerpt
add_action('add_meta_boxes', 'abcbiz_multi_add_excerpt_metabox');

function abcbiz_multi_add_excerpt_metabox() {
    add_meta_box(
        'abcbiz_multi_excerpt_metabox',
        esc_html__('ABCBiz Blog Excerpt', 'abcbiz-multi'),
        'abcbiz_multi_excerpt_metabox_content',
        'post', 
        'normal', 
        'high'
    );
}

// Save post excerpt metabox data
add_action('save_post', 'abcbiz_multi_save_excerpt_metabox');

function abcbiz_multi_save_excerpt_metabox($post_id) {
    // Nonce check
    if (!isset($_POST['abcbiz_multi_excerpt_metabox_nonce']) || !wp_verify_nonce($_POST['abcbiz_multi_excerpt_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // Check if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check user permissions
    if ('post' == $_POST['post_type'] && !current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Validate and sanitize data
    $excerpt_content = isset($_POST['abcbiz_multi_excerpt_content']) ? sanitize_textarea_field($_POST['abcbiz_multi_excerpt_content']) : '';

    // Update post meta
    update_post_meta($post_id, 'abcbiz_multi_excerpt_content', $excerpt_content);
}

// Metabox content for post excerpt
function abcbiz_multi_excerpt_metabox_content($post) {
    // Add nonce field
    wp_nonce_field(basename(__FILE__), 'abcbiz_multi_excerpt_metabox_nonce');

    // Retrieve the existing value (if any)
    $excerpt_content = get_post_meta($post->ID, 'abcbiz_multi_excerpt_content', true);
    ?>

    <label for="abcbiz_multi_excerpt_content"><?php esc_html_e('Enter Excerpt Content:', 'abcbiz-multi'); ?></label>
    
    <textarea name="abcbiz_multi_excerpt_content" id="abcbiz_multi_excerpt_content" rows="5" style="width:100%;">
        <?php echo esc_textarea($excerpt_content); ?>
    </textarea>

    <?php
}