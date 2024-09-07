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

        // Fetch Mailchimp API key from plugin settings
        $this->settings = get_option('abcbiz_mailchimp_options'); // Assuming 'abcbiz_mailchimp_options' is the option name where API key is stored
    }

    protected function register_controls() {
        $data = $this->get_settings();

        // Fetch the Mailchimp audience lists
       $mailchimp_lists = $this->get_mailchimp_lists($data['mailchimp_api_key']);

        $this->start_controls_section(
            'section_mailchimp',
            [
                'label' => __('MailChimp Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'mailchimp_api_sources',
			[
				'label' => esc_html__( 'Choose API Source', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'global',
				'options' => [
					'global' => esc_html__( 'Global', 'abcbiz-addons' ),
					'custom' => esc_html__( 'Custom', 'abcbiz-addons' ),
				],
			]
		);

        // Add Mailchimp API key input
        $this->add_control(
            'mailchimp_api_key',
            [
                'label' => __('MailChimp API Key', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => sprintf(__('Enter your MailChimp API key. You can find it %shere%s.', 'abcbiz-addons'), '<a href="https://admin.mailchimp.com/account/api" target="_blank">', '</a>'),
                'condition' => ['mailchimp_api_sources' => 'custom'],
            ]
        );

        $this->add_control(
            'mailchimp_list_id',
            [
                'label' => __('Audience List', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $mailchimp_lists, // Populate with the fetched Mailchimp lists
                'description' => sprintf(__('Select your Mailchimp Audience List. You can find more information %shere%s.', 'abcbiz-addons'), '<a href="https://mailchimp.com/help/find-audience-id/" target="_blank">', '</a>'),
                'dynamic' => ['active' => true],
            ]
        );

        $this->end_controls_section();
    }

    private function get_mailchimp_lists($api_key) {
        // Fetch the API key from the settings
        //$api_key = isset($this->settings['mailchimp_api_key']) ? sanitize_text_field($this->settings['mailchimp_api_key']) : '';

        if (empty($api_key)) {
            return []; // Return an empty array if no API key is set
        }

        $data_center = substr($api_key, strpos($api_key, '-') + 1);
        $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists';

        $response = wp_remote_get($url, [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
            ],
        ]);

        if (is_wp_error($response)) {
            return []; // Return an empty array on error
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        if (empty($data->lists)) {
            return []; // Return an empty array if no lists are found
        }

        $lists = [];
        foreach ($data->lists as $list) {
            $lists[$list->id] = $list->name;
        }

        return $lists;
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