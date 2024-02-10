<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Add metabox for post excerpt
add_action('add_meta_boxes', 'abcbiz_multi_add_excerpt_metabox');

function abcbiz_multi_add_excerpt_metabox() {
    add_meta_box(
        'abcbiz_multi_excerpt_metabox',
        esc_html__('ABCBiz Blog Excerpt', 'abcbiz-addons'),
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
    if (!isset($_POST['abcbiz_multi_excerpt_metabox_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash ($_POST['abcbiz_multi_excerpt_metabox_nonce'])), basename(__FILE__))) {
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

    <label for="abcbiz_multi_excerpt_content"><?php esc_html_e('Enter Excerpt Content:', 'abcbiz-addons'); ?></label>
    
    <textarea name="abcbiz_multi_excerpt_content" id="abcbiz_multi_excerpt_content" rows="5" style="width:100%;">
        <?php echo esc_textarea($excerpt_content); ?>
    </textarea>

    <?php
}

//WooCommerce Check
if ( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ) {
    // Product Description Meta Box
    function abcbiz_add_wc_product_meta_box() {
        add_meta_box(
            'abcbiz_wc_product_description',
            'ABCBiz Product Description Tab',
            'abcbiz_wc_product_meta_box_html',
            'product',
            'advanced',
            'high'
        );
    }
    add_action('add_meta_boxes', 'abcbiz_add_wc_product_meta_box', 5);

    function abcbiz_wc_product_meta_box_html($post) {
        echo '<p><strong>' . esc_html__('Note:', 'abcbiz-addons') . '</strong> ' . esc_html__('This area is specifically for ABCBiz Elementor Addons Products description tab contents.', 'abcbiz-addons') . '</p>';
        $content = get_post_meta($post->ID, '_abcbiz_wc_product_description', true);
        wp_editor(
            htmlspecialchars_decode($content),
            'abcbiz_wc_product_description_editor',
            array(
                'textarea_name' => 'abcbiz_wc_product_description',
                'editor_height' => 200,
                'media_buttons' => true
            )
        );
    }

    function abcbiz_save_postdata($post_id) {
        if (array_key_exists('abcbiz_wc_product_description', $_POST)) {
            update_post_meta(
                $post_id,
                '_abcbiz_wc_product_description',
                wp_kses_post($_POST['abcbiz_wc_product_description'])
            );
        }
    }
    add_action('save_post', 'abcbiz_save_postdata');
}
