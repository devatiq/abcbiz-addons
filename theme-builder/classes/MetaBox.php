<?php
namespace ABCBIZ\ThemeBuilder\Classes;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class MetaBox
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_custom_meta_box'));
        add_action('save_post', array($this, 'save_meta_box_data'));
    }

    public function add_custom_meta_box()
    {
        add_meta_box(
            'abcbiz_themebuilder_select',            // ID of the meta box
            __('Choose Template Type', 'abcbiz-addons'), // Title of the meta box
            array($this, 'meta_box_callback'),       // Callback function
            'abcbiz_library',                       // Post type
            //'side',                                 // Context
            'default'                               // Priority
        );
    }


    public function meta_box_callback($post)
    {
        // Nonce field for security
        wp_nonce_field('abcbiz_custom_box', 'abcbiz_custom_box_nonce');
    
        // Get the current values of the fields
        $template_value = get_post_meta($post->ID, 'abcbiz_themebuilder_select', true);
        $display_condition_value = get_post_meta($post->ID, 'abcbiz_display_condition_select', true);
        $specific_item_value = get_post_meta($post->ID, 'abcbiz_specific_item_value', true); // New field for specific options
    
        // Start table layout
        echo '<table class="form-table"><tbody>';
    
        // Row for Template Type
        echo '<tr>';
        echo '<th><label for="abcbiz_themebuilder_select">' . esc_html__('Type:', 'abcbiz-addons') . '</label></th>';
        echo '<td>';
        echo '<select id="abcbiz_themebuilder_select" name="abcbiz_themebuilder_select">';
        echo '<option value="">' . esc_html__('Select...', 'abcbiz-addons') . '</option>';
        echo '<option value="header"' . selected($template_value, 'header', false) . '>' . esc_html__('Header (Global)', 'abcbiz-addons') . '</option>';
        echo '<option value="footer"' . selected($template_value, 'footer', false) . '>' . esc_html__('Footer (Global)', 'abcbiz-addons') . '</option>';
        echo '<option value="single_post"' . selected($template_value, 'single_post', false) . '>' . esc_html__('Single Post', 'abcbiz-addons') . '</option>';
        echo '<option value="single_page"' . selected($template_value, 'single_page', false) . '>' . esc_html__('Single Page', 'abcbiz-addons') . '</option>';
        echo '<option value="search_page"' . selected($template_value, 'search_page', false) . '>' . esc_html__('Search Page', 'abcbiz-addons') . '</option>';
        echo '<option value="404_page"' . selected($template_value, '404_page', false) . '>' . esc_html__('404 Page', 'abcbiz-addons') . '</option>';
        echo '<option value="archive_page"' . selected($template_value, 'archive_page', false) . '>' . esc_html__('Archive Page', 'abcbiz-addons') . '</option>';
        echo '</select>';
        echo '</td>';
        echo '</tr>';
    

        // Row for Display Condition with optgroup
        echo '<tr style="display:none">';
        echo '<th><label for="abcbiz_display_condition_select">' . esc_html__('Display Condition:', 'abcbiz-addons') . '</label></th>';
        echo '<td>';
        echo '<select id="abcbiz_display_condition_select" name="abcbiz_display_condition_select">';

        echo '<option value="entire_site"' . selected($display_condition_value, 'entire_site', false) . '>' . esc_html__('Entire Site', 'abcbiz-addons') . '</option>';


        echo '</td>';
        echo '</tr>';
        // End table layout
        echo '</tbody></table>';


    }
    

    public function save_meta_box_data($post_id)
    {
        // Check nonce validity
        if (!isset($_POST['abcbiz_custom_box_nonce']) || !wp_verify_nonce($_POST['abcbiz_custom_box_nonce'], 'abcbiz_custom_box')) {
            return $post_id;
        }

        // Check the user's permissions.
        if ('abcbiz_library' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        // Save or Update the meta box field values
        $new_template_value = (isset($_POST['abcbiz_themebuilder_select']) ? sanitize_text_field($_POST['abcbiz_themebuilder_select']) : '');
        $new_display_condition_value = (isset($_POST['abcbiz_display_condition_select']) ? sanitize_text_field($_POST['abcbiz_display_condition_select']) : '');
        $new_specific_item_value = (isset($_POST['abcbiz_specific_item_value']) ? sanitize_text_field($_POST['abcbiz_specific_item_value']) : '');

        update_post_meta($post_id, 'abcbiz_themebuilder_select', $new_template_value);
        update_post_meta($post_id, 'abcbiz_display_condition_select', $new_display_condition_value);

        // Only save specific item value if one of the specific options is selected
        if (in_array($new_display_condition_value, ['category_specific', 'post_specific', 'page_specific'])) {
            update_post_meta($post_id, 'abcbiz_specific_item_value', $new_specific_item_value);
        } else {
            delete_post_meta($post_id, 'abcbiz_specific_item_value');
        }
    }



}
