<?php

namespace ABCBiz\Includes\Widgets\ABCMailChimp;

use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Main extends \Elementor\Widget_Base
{

    private $settings;

    public function get_name()
    {
        return 'abcbiz-mailchimp';
    }

    public function get_title()
    {
        return __('ABC MailChimp', 'abcbiz-addons');
    }

    public function get_icon()
    {
        return 'eicon-mail';
    }

    public function get_categories()
    {
        return ['abcbiz-category'];
    }

    // Use this method to register the scripts
    public function get_script_depends()
    {
        return ['abcbiz-mailchimp-newsletter']; // The handle for your script
    }

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        // Fetch Mailchimp API key from plugin settings
        $this->settings = get_option('abcbiz_mailchimp_options');

        // Localize the script for AJAX usage
        //  add_action('wp_enqueue_scripts', [$this, 'localize_script']);
    }

    public function localize_script()
    {
        wp_localize_script('abcbiz-mailchimp-newsletter', 'abcbizMailchimpAjax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('abcbiz_mailchimp_nonce'),
        ]);
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_mailchimp',
            [
                'label' => __('MailChimp Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mailchimp_list_id',
            [
                'label' => __('Audience List', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_mailchimp_lists(),
                'description' => sprintf(__('Select your Mailchimp Audience List. You can find more information %shere%s.', 'abcbiz-addons'), '<a href="https://mailchimp.com/help/find-audience-id/" target="_blank">', '</a>'),
                'dynamic' => ['active' => true],
            ]
        );

        // Toggle control to enable or disable name fields
        $this->add_control(
            'enable_name_fields',
            [
                'label' => __('Enable Name Fields', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();
    }

    private function get_mailchimp_lists()
    {
        $api_key = isset($this->settings['mailchimp_api_key']) ? sanitize_text_field($this->settings['mailchimp_api_key']) : '';

        if (empty($api_key)) {
            return [];
        }

        $data_center = substr($api_key, strpos($api_key, '-') + 1);
        $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists';

        $response = wp_remote_get($url, [
            'timeout' => 15,
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
            ],
        ]);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        if (json_last_error() !== JSON_ERROR_NONE || empty($data->lists)) {
            return [];
        }

        $lists = [];
        foreach ($data->lists as $list) {
            $lists[$list->id] = $list->name;
        }

        return $lists;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="abcbiz-mailchimp-wrapper">
            <form id="abcbiz-mailchimp-form">
                <?php if ('yes' === $settings['enable_name_fields']): ?>
                    <input id="abcbiz-mailchimp-fname" type="text" name="fname" placeholder="First Name">
                    <input id="abcbiz-mailchimp-lname" type="text" name="lname" placeholder="Last Name">
                <?php endif; ?>
                <input id="abcbiz-mailchimp-email" type="email" name="email" placeholder="Your Email" required>
                <input id="abcbiz-mailchimp-list" type="hidden" name="list"
                    value="<?php echo esc_attr($settings['mailchimp_list_id']); ?>">
                <button type="submit"><?php esc_html_e('Subscribe', 'abcbiz-addons'); ?></button>
                <div class="abcbiz-mailchimp-response"></div>
            </form>
        </div>
        <?php
    }
}