<?php

namespace ABCBiz\Includes\Widgets\ABCMailChimp;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;

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
    }

    protected function register_content_controls() {
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
                'default' => $this->settings['api_key'] ?? '', // Default value from plugin settings
            ]
        );

        $this->add_control(
            'mailchimp_list_id',
            [
                'label' => __('List ID', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Enter your MailChimp List ID', 'abcbiz-addons'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_form',
            [
                'label' => __('Form Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_name',
            [
                'label' => __('Show Name Field', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'success_message',
            [
                'label' => __('Success Message', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Thank you for subscribing!', 'abcbiz-addons'),
                'placeholder' => __('Enter success message', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'error_message',
            [
                'label' => __('Error Message', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('An error occurred. Please try again.', 'abcbiz-addons'),
                'placeholder' => __('Enter error message', 'abcbiz-addons'),
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Prepare HTML for form rendering
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
	
		<script>
			(function ($) {
				$('#abcbiz-mailchimp-form').on('submit', function (e) {
					e.preventDefault();
					var form = $(this);
					var data = {
						action: 'abcbiz_mailchimp_subscribe',
						api_key: '<?php echo esc_js($settings['mailchimp_api_key'] ?? ''); ?>',
						list_id: '<?php echo esc_js($settings['mailchimp_list_id'] ?? ''); ?>',
						email: form.find('input[name="email"]').val(),
						fname: form.find('input[name="fname"]').val(),
						lname: form.find('input[name="lname"]').val(),
					};
	
					$.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function (response) {
						form.find('.abcbiz-mailchimp-response').html(response.data.message);
					});
				});
			})(jQuery);
		</script>
		<?php
	}
	
}

// Register AJAX action for subscription
add_action('wp_ajax_abcbiz_mailchimp_subscribe', 'abcbiz_mailchimp_subscribe');
add_action('wp_ajax_nopriv_abcbiz_mailchimp_subscribe', 'abcbiz_mailchimp_subscribe');

function abcbiz_mailchimp_subscribe() {
    $api_key = $_POST['api_key'];
    $list_id = $_POST['list_id'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // MailChimp API URL
    $url = "https://<dc>.api.mailchimp.com/3.0/lists/$list_id/members/";

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