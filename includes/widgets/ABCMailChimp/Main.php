<?php 
namespace ABCBiz\Includes\Widgets\ABCMailChimp;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-ABCMailChimp';
		protected $title = 'ABC MailChimp';
		protected $icon = 'eicon-animation-text abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'form', 'mailchimp'
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_anim_text_setting',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Notice
		$this->add_control(
			'abcbiz_elementor_anim_text_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'warning',
				'dismissible' => false,
				'heading' => esc_html__( 'Notice:', 'abcbiz-addons' ),
				'content' => esc_html__( 'To view the full animation, please check in the front end', 'abcbiz-addons' ),
			]
		);

	   $this->end_controls_section();//end after text style

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}