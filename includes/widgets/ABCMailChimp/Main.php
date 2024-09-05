<?php

namespace ABCBiz\Includes\Widgets\ABCMailChimp;

use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Main extends \Elementor\Widget_Base {

    private $settings;

    public function get_name() {
        return 'abcbiz-mailchimp';
    }

    public function get_title() {
        return __('ABC MailChimp', 'abcbiz-addons');
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return ['abcbiz-category'];
    }

    public function get_keywords() {
        return ['email', 'mailchimp', 'newsletter', 'subscription'];
    }

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
        $this->settings = get_option('abcbiz_mailchimp_api_key'); // Fetch Mailchimp API settings from your plugin's settings.

        // Enqueue custom scripts only in Elementor editor mode
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'enqueue_editor_scripts']);
    }

    public function enqueue_editor_scripts() {
        wp_enqueue_script('abcbiz-mailchimp-editor', ABCBIZ_Assets . '/js/mailchimp-editor.js', ['jquery'], '1.0', true);
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_mailchimp',
            [
                'label' => __('MailChimp Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mailchimp_api_key',
            [
                'label' => __('API Key', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Enter your MailChimp API key', 'abcbiz-addons'),
                'default' => $this->settings['api_key'] ?? '',
                'description' => sprintf(__('Enter your Mailchimp API Key. You can get it %shere%s.', 'abcbiz-addons'), '<a href="https://us6.admin.mailchimp.com/account/api/" target="_blank">', '</a>'),
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'mailchimp_list_id',
            [
                'label' => __('List ID', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [], // Initially empty
                'description' => sprintf(__('Enter your Mailchimp List ID. You can find it %shere%s.', 'abcbiz-addons'), '<a href="https://mailchimp.com/help/find-audience-id/" target="_blank">', '</a>'),
                'dynamic' => ['active' => true],
            ]
        );

        $this->end_controls_section();

        // Additional sections...
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="abcbiz-mailchimp-wrapper">
            <form id="abcbiz-mailchimp-form">
                <?php if (isset($settings['show_name']) && $settings['show_name'] === 'yes'): ?>
                    <input type="text" name="fname" placeholder="First Name">
                    <input type="text" name="lname" placeholder="Last Name">
                <?php endif; ?>
                <input type="email" name="email" placeholder="Your Email" required>
                <button type="submit"><?php esc_html_e('Subscribe', 'abcbiz-addons'); ?></button>
                <div class="abcbiz-mailchimp-response"></div>
            </form>
        </div>
        <?php
    }
}


// Register AJAX action for fetching lists and subscription
add_action('wp_ajax_abcbiz_fetch_mailchimp_lists', 'abcbiz_fetch_mailchimp_lists');

function abcbiz_fetch_mailchimp_lists() {
    if (!isset($_POST['api_key']) || empty($_POST['api_key'])) {
        wp_send_json_error(['message' => __('API Key is missing.', 'abcbiz-addons')]);
    }

    $api_key = sanitize_text_field($_POST['api_key']);
    $data_center = substr($api_key, strpos($api_key, '-') + 1);
    $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists';

    $response = wp_remote_get($url, [
        'headers' => [
            'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
        ],
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => __('Failed to fetch lists. Please check your API Key.', 'abcbiz-addons')]);
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (empty($data->lists)) {
        wp_send_json_error(['message' => __('No lists found or invalid API Key.', 'abcbiz-addons')]);
    }

    $lists = [];
    foreach ($data->lists as $list) {
        $lists[] = [
            'id' => $list->id,
            'name' => $list->name,
        ];
    }

    wp_send_json_success(['lists' => $lists]);
}

// Register AJAX action for subscription
add_action('wp_ajax_abcbiz_mailchimp_subscribe', 'abcbiz_mailchimp_subscribe');
add_action('wp_ajax_nopriv_abcbiz_mailchimp_subscribe', 'abcbiz_mailchimp_subscribe');

function abcbiz_mailchimp_subscribe() {
    $api_key = sanitize_text_field($_POST['api_key']);
    $list_id = sanitize_text_field($_POST['list_id']);
    $email = sanitize_email($_POST['email']);
    $fname = sanitize_text_field($_POST['fname']);
    $lname = sanitize_text_field($_POST['lname']);

    // MailChimp API URL
    $data_center = substr($api_key, strpos($api_key, '-') + 1);
    $url = "https://$data_center.api.mailchimp.com/3.0/lists/$list_id/members/";

    $args = [
        'method' => 'POST',
        'body' => json_encode([
            'email_address' => $email,
            'status' => 'subscribed',
            'merge_fields' => [
                'FNAME' => $fname,
                'LNAME' => $lname,
            ],
        ]),
        'headers' => [
            'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
            'Content-Type' => 'application/json',
        ],
    ];

    $response = wp_remote_post($url, $args);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => __('An error occurred. Please try again.', 'abcbiz-addons')]);
    } else {
        wp_send_json_success(['message' => __('Thank you for subscribing!', 'abcbiz-addons')]);
    }

    wp_die();
}
