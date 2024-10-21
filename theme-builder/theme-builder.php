<?php
namespace ABCBIZ\ThemeBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ABCBizThemeBuilder
{
    /**
     * Theme Builder constructor.
     *
     * Initializes the class, registers the hooks.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));

        $this->ExtranalClasses();

        add_action('wp_ajax_primekitlibrary_new_post', array($this, 'handle_new_template_submission'));
        add_action('single_template', array($this, 'load_canvas_template'));

        add_action('get_header', array($this, 'abcbiz_override_header'));
        add_action('get_footer', [$this, 'abcbiz_override_footer']);
        add_action('abcbiz_footer', [$this, 'abcbiz_render_footer']);
        add_action('abcbiz_header', [$this, 'abcbiz_render_header']);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_elementor_styles_scripts'));

    }


    /**
     * Override the header template.
     *
     * If a header template is assigned in the theme builder, this function will
     * load that template instead of the default header.php.
     *
     * @since 1.0.0
     */
    public function abcbiz_override_header()
    {
        if (self::should_display_template('header')) {
            require_once ABCBIZ_TB_Path . '/inc/templates/abcbiz-header.php';
            $templates = [];
            $templates[] = 'header.php';
            remove_all_actions('wp_head');
            ob_start();
            locate_template($templates, true);
            ob_get_clean();
        }
    }


    /**
     * Render the header template.
     *
     * This method is responsible for rendering the header template which is set in the elementor page settings.
     * It is hooked in the `abcbiz_header` action.
     *
     * @since 1.0.0
     */
    public function abcbiz_render_header()
    {
        ?>
        <header class="abcbiz-custom-header dynamic-header">
            <div class="abcbiz-container">
                <?php echo self::get_header_content(); ?>
            </div>
        </header>
        <?php
    }

    /**
     * Retrieves the ID of the header template.
     *
     * @since 1.0.0
     * @return int|false The ID of the header template, or false if not found.
     */
    public static function abcbiz_get_header_id()
    {
        $header_id = self::get_template_id('header');

        if ('' === $header_id) {
            $header_id = false;
        }

        return apply_filters('abcbiz_get_header_id', $header_id);
    }


    /**
     * Gets the ID of a template by type.
     *
     * @param string $type The type of template to retrieve (e.g. 'header', 'footer', etc).
     *
     * @return int|string The ID of the template, or an empty string if no template is found.
     */
    public static function get_template_id($type)
    {

        $args = [
            'post_type' => 'primekitlibrary',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ];
        $abcbiz_hf_templates = get_posts($args);

        foreach ($abcbiz_hf_templates as $template) {
            if (get_post_meta(absint($template->ID), 'abcbiz_themebuilder_select', true) === $type) {
                return $template->ID;
            }
        }

        return '';

    }
    /**
     * Retrieve the content of the header template.
     *
     * If a header template is assigned in the theme builder, this function will
     * load that template and echo its content.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function get_header_content()
    {
        $abcbiz_get_header_id = self::abcbiz_get_header_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($abcbiz_get_header_id);
    }

    /**
     * Overrides the footer template for the current request.
     *
     * If a footer template is assigned in the theme builder, this function will
     * load that template instead of the default footer.php.
     *
     * @since 1.0.0
     */
    public function abcbiz_override_footer()
    {
        if (self::should_display_template('footer')) {
            require_once ABCBIZ_TB_Path . '/inc/templates/abcbiz-footer.php';
            $templates = [];
            $templates[] = 'footer.php';
            remove_all_actions('wp_footer');
            ob_start();
            locate_template($templates, true);
            ob_get_clean();
        }
    }

    /**
     * Renders the footer template.
     *
     * This method is used to render the footer template, which is a custom
     * footer template that is used by the theme builder.
     *
     * @since 1.0.0
     */
    public function abcbiz_render_footer()
    {
        ?>
        <footer class="abcbiz-custom-footer">
            <div class="abcbiz-container">
                <?php echo self::get_footer_content(); ?>
            </div>
        </footer>
        <?php
    }

    /**
     * Retrieves the content of the footer template.
     *
     * If a footer template is assigned in the theme builder, this function will
     * load that template and echo its content.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function get_footer_content()
    {
        $abcbiz_get_footer_id = self::abcbiz_get_footer_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($abcbiz_get_footer_id);
    }


    /**
     * Retrieve the ID of the footer template.
     *
     * @since 1.0.0
     * @return int|false The ID of the footer template, or false if not found.
     */
    public static function abcbiz_get_footer_id()
    {
        $footer_id = self::get_template_id('footer');

        if ('' === $footer_id) {
            $footer_id = false;
        }

        return apply_filters('abcbiz_get_footer_id', $footer_id);
    }


    /**
     * Enqueues Elementor styles and scripts on the frontend, and the custom styles for the theme builder.
     *
     * Checks if Elementor is loaded before enqueueing its styles and scripts. Then enqueues the custom styles for the theme builder.
     */
    public function enqueue_elementor_styles_scripts()
    {
        // if (did_action('elementor/loaded')) {
        //     \Elementor\Plugin::instance()->frontend->enqueue_styles();
        //     \Elementor\Plugin::instance()->frontend->enqueue_scripts();
        // }

        wp_enqueue_style('abcbiz-theme-builder-style', ABCBIZ_TB_Assets . '/css/style.css');
    }

    /**
     * Loads all the required external classes.
     * 
     * Loads Theme Builder CPT, MetaBox, Admin Menu, Modal Markup, Condition Manager, Template Content Hooks, 
     * Template Override, and Admin Custom classes.
     * 
     * @since 1.0.0
     */
    public function ExtranalClasses()
    {
        // Loading Theme Builder CPT
        if (!class_exists('ABCBIZ\ThemeBuilder\Classes\CPT')) {
            require_once ABCBIZ_TB_Path . '/classes/cpt.php';
            new \ABCBIZ\ThemeBuilder\Classes\CPT();
        }

        // Loading MetaBox
        if (!class_exists('ABCBIZ\ThemeBuilder\Classes\MetaBox')) {
            require_once ABCBIZ_TB_Path . '/classes/MetaBox.php';
            new \ABCBIZ\ThemeBuilder\Classes\MetaBox();
        }

        // Loading Admin Menu
        if (!class_exists('ABCBIZ\ThemeBuilder\Admin\ThemeBuilderMenus')) {
            require_once ABCBIZ_TB_Path . '/admin/Menus.php';
            new \ABCBIZ\ThemeBuilder\Admin\ThemeBuilderMenus();
        }

        // Loading Modal Markup
        if (!class_exists('ABCBIZ\ThemeBuilder\Classes\ModalMarkup')) {
            require_once ABCBIZ_TB_Path . '/classes/modal-markup.php';
            new \ABCBIZ\ThemeBuilder\Classes\ModalMarkup();
        }

        // Loading Condition Manager
        if (!class_exists('ABCBIZ\ThemeBuilder\Admin\ABCBiz_Conditions_Manager')) {
            require_once ABCBIZ_TB_Path . '/admin/conditions-manager.php';
            new \ABCBIZ\ThemeBuilder\Admin\ABCBiz_Conditions_Manager();
        }

        // Loading Template Content Hooks
        if (!class_exists('ABCBIZ\ThemeBuilder\Inc\Hooks\Template_Content_Hooks')) {
            require_once ABCBIZ_TB_Path . '/inc/hooks/template-content-hooks.php';
            new \ABCBIZ\ThemeBuilder\Inc\Hooks\Template_Content_Hooks();
        }

        // Loading Template Override
        if (!class_exists('ABCBIZ\ThemeBuilder\Classes\TemplateOverride')) {
            require_once ABCBIZ_TB_Path . '/classes/template-override.php';
            new \ABCBIZ\ThemeBuilder\Classes\TemplateOverride();
        }

        // Loading Admin Custom
        if (!class_exists('ABCBIZ\ThemeBuilder\Admin\ABCBiz_Admin_Columns')) {
            require_once ABCBIZ_TB_Path . '/admin/columns.php';
            new \ABCBIZ\ThemeBuilder\Admin\ABCBiz_Admin_Columns();
        }
    }


    /**
     * Enqueue admin scripts and styles.
     *
     * Enqueues the plugin's admin styles and scripts, including the modal CSS and
     * JavaScript, as well as the new template submission JavaScript.
     *
     * @since 1.0.0
     *
     * @param string $hook The current admin screen.
     */
    public function admin_scripts($hook)
    {

        if (in_array($hook, array('edit.php', 'post-new.php'))) {
            $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
            if ('primekitlibrary' === $post_type || ('post-new.php' === $hook && empty($post_type))) {

                wp_enqueue_style('abcbiz-theme-builder-modal', plugins_url('assets/css/modal.css', __FILE__), array(), '1.0.0', 'all');

                wp_enqueue_script('abcbiz-theme-builder-main', plugins_url('assets/js/admin.js', __FILE__), array('jquery'), '1.0.0', true);

                wp_enqueue_script('abcbiz-tb-modal-ajax', plugins_url('assets/js/new-template-ajax.js', __FILE__), array('jquery'), '1.0.0', true);

                wp_enqueue_script('micromodal-js', '//unpkg.com/micromodal@0.4.10/dist/micromodal.min.js', array('jquery'), '0.4.10', true);

                wp_localize_script('abcbiz-tb-modal-ajax', 'abcbizNewTemplateCreated', [
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('abcbiz_new_template_nonce'),
                ]);
            }
        }
    }

 
    /**
     * Handles the submission of the new template modal form.
     *
     * Expects the following $_POST variables:
     * - postTitle: The title of the new post.
     * - templateType: The type of template to create (e.g. 'header', 'footer', etc.).
     * - postType: The post type to create (defaults to 'primekitlibrary' if not provided).
     *
     * Creates a new post with the given title and type, and updates the custom field
     * with the template type. If Elementor is installed and active, sets the Elementor
     * page template to 'elementor_canvas' for Header and Footer types, or
     * 'elementor_header_footer' for other types.
     *
     * @since 1.0.0
     */
    public function handle_new_template_submission()
    {
        check_ajax_referer('abcbiz_new_template_nonce', 'security');

        $post_title = sanitize_text_field($_POST['postTitle']);
        $template_type = sanitize_text_field($_POST['templateType']);
        $post_type = isset($_POST['postType']) ? sanitize_text_field($_POST['postType']) : 'primekitlibrary';

        $post_id = wp_insert_post([
            'post_title' => $post_title,
            'post_status' => 'draft',
            'post_type' => $post_type,
        ]);

        if ($post_id && !is_wp_error($post_id)) {
            // Update the custom field with the template type
            update_post_meta($post_id, 'abcbiz_themebuilder_select', $template_type);

            // Check if Elementor is installed and active
            if (did_action('elementor/loaded')) {
                // Only set Elementor Canvas template for Header and Footer types
                if (in_array($template_type, ['header', 'footer'])) {
                    update_post_meta($post_id, '_wp_page_template', 'elementor_canvas');
                } else {
                    update_post_meta($post_id, '_wp_page_template', 'elementor_header_footer');
                }

                $edit_with_elementor_url = admin_url("post.php?post={$post_id}&action=elementor");
                wp_send_json_success(['redirect_url' => $edit_with_elementor_url]);
            } else {
                wp_send_json_success(['redirect_url' => get_edit_post_link($post_id, '')]);
            }
        } else {
            wp_send_json_error(['message' => 'Failed to create post.']);
        }

        exit;
    }

    /**
     * Override the page template for the primekitlibrary post type.
     *
     * We want to use Elementor's canvas template for the Theme Builder templates.
     *
     * @param string $single_template The path to the template.
     * @return string The path to the template.
     */
    public function load_canvas_template($single_template)
    {
        global $post;

        if ('primekitlibrary' == $post->post_type) {
            $elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

            if (file_exists($elementor_2_0_canvas)) {
                return $elementor_2_0_canvas;
            } else {
                return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
            }
        }

        return $single_template;
    }

    /**
     * Determines whether the given template type should be displayed or not.
     *
     * @since 1.0.0
     *
     * @param string $template_type The type of template to check. Can be one of:
     *     single_post, single_page, archive, 404, search, etc.
     *
     * @return bool True if the template should be displayed, false otherwise.
     */
    public static function should_display_template($template_type)
    {
        // Get the template ID based on the type (single_post, single_page, etc.)
        $template_id = self::get_template_id($template_type);


        if (!$template_id) {
            return false;
        }

        // Get the template type selected in `primekitlibrary`
        $selected_template = get_post_meta($template_id, 'abcbiz_themebuilder_select', true);

        if ($selected_template === $template_type) {
            return true;
        }

        return false;
    }

}


