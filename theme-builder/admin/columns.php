<?php
namespace ABCBIZ\ThemeBuilder\Admin;

defined('ABSPATH') || exit;

class ABCBiz_Admin_Columns
{
    public function __construct()
    {
        // Add custom columns to the 'primekitlibrary' post type
        add_filter('manage_primekitlibrary_posts_columns', array($this, 'add_custom_columns'));

        // Populate the custom columns with data
        add_action('manage_primekitlibrary_posts_custom_column', array($this, 'populate_custom_columns'), 10, 2);

        // Make the 'Type' column sortable
        add_filter('manage_edit-primekitlibrary_sortable_columns', array($this, 'make_columns_sortable'));

        // Handle sorting by the 'Type' column
        add_action('pre_get_posts', array($this, 'sort_by_type_column'));
    }

    // Add custom columns to the 'primekitlibrary' post type
    public function add_custom_columns($columns)
    {
      
        $new_columns = array(
            'cb' => $columns['cb'],  // Checkbox column
            'title' => __('Title'),
            'abcbiz_type' => __('Type', 'abcbiz-addons'), 
        );
    
        // Merge the rest of the columns after 'Type'
        unset($columns['title']); 
        return array_merge($new_columns, $columns); 
    }
    

    // Populate the custom columns with data from 'abcbiz_themebuilder_select'
    public function populate_custom_columns($column, $post_id)
    {
        if ($column === 'abcbiz_type') {
            
            $type_value = get_post_meta($post_id, 'abcbiz_themebuilder_select', true);
    
            
            $type_labels = array(
                'archive_page' => __('Archive Page', 'abcbiz-addons'),
                'search_page' => __('Search Page', 'abcbiz-addons'),
                '404_page' => __('404 Page', 'abcbiz-addons'),
                'single_post' => __('Single Post', 'abcbiz-addons'),
                'single_page' => __('Single Page', 'abcbiz-addons'),
                'footer' => __('Footer', 'abcbiz-addons'),
                'header' => __('Header', 'abcbiz-addons'),
                
            );
    
            // Display the label if it exists, otherwise show the raw value
            if (!empty($type_value) && isset($type_labels[$type_value])) {
                echo esc_html($type_labels[$type_value]);
            } else {
                echo __('Unknown Type', 'abcbiz-addons');
            }
        }
    }
    

    // Make the 'Type' column sortable
    public function make_columns_sortable($columns)
    {
        $columns['abcbiz_type'] = 'abcbiz_type';
        return $columns;
    }

    // Handle sorting by the 'Type' column
    public function sort_by_type_column($query)
    {
        if (!is_admin() || !$query->is_main_query()) {
            return;
        }

        if ('abcbiz_type' === $query->get('orderby')) {
            $query->set('meta_key', 'abcbiz_themebuilder_select');
            $query->set('orderby', 'meta_value');
        }
    }
}
