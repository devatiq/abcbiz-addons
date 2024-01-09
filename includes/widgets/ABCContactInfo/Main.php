<?php 
namespace ABCBiz\Includes\Widgets\ABCContactInfo;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

		protected $name = 'abcbiz-contact-info';
		protected $title = 'ABC Contact & Social Info';
		protected $icon = 'eicon-social-icons';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'contact', 'info', 'social'
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_contact_switch_Settings',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//contact info
		$this->add_control(
			'abcbiz_elementor_contact_info_switch',
			[
				'label' => esc_html__( 'Contact Info', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'abcbiz-multi' ),
				'label_off' => esc_html__( 'Hide', 'abcbiz-multi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//social
		$this->add_control(
			'abcbiz_elementor_contact_social_icon_switch',
			[
				'label' => esc_html__( 'Social Icons', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'abcbiz-multi' ),
				'label_off' => esc_html__( 'Hide', 'abcbiz-multi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//type
		$this->add_control(
			'abcbiz_elementor_contact_style_type',
			[
				'label' => esc_html__( 'Style type', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'stack',
				'options' => [
					'stack' => esc_html__( 'Stack', 'abcbiz-multi' ),
					'inline'  => esc_html__( 'Inline', 'abcbiz-multi' ),
				],
			]
		);

		$this->end_controls_section();//end settings

		//Contact Info section
		$this->start_controls_section(
			'abcbiz_elementor_contact_info_Settings',
			[
				'label' => esc_html__( 'Contact Info', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'abcbiz_elementor_contact_info_switch' => 'yes',
				],
			]
		);

		//Address
		$this->add_control(
			'abcbiz_elementor_contact_info_address',
			[
				'label' => esc_html__( 'Address:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__( '1234 Street Name, City, Zip Code, Country', 'abcbiz-multi' ),
			]
		);

		//Mobile
		$this->add_control(
			'abcbiz_elementor_contact_info_mobile',
			[
				'label' => esc_html__( 'Mobile:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+123 456 7890', 'abcbiz-multi' ),
			]
		);

		//Email
		$this->add_control(
			'abcbiz_elementor_contact_info_email',
			[
				'label' => esc_html__( 'Email:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'example@example.com', 'abcbiz-multi' ),
			]
		);

		$this->end_controls_section(); //end contact info

		//Social Icon section
		$this->start_controls_section(
			'abcbiz_elementor_contact_social_cions_Settings',
			[
				'label' => esc_html__( 'Social Icons', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'abcbiz_elementor_contact_social_icon_switch' => 'yes',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_block_quote_border_color',
			[
				'label' => esc_html__( 'Border Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#59a818',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-block-quote-area blockquote' => 'border-left-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_block_quote_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-block-quote-area blockquote',
			]
		);
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
	protected function render()
	{
		$abcbiz_settings = $this->get_settings_for_display();
		if (isset($abcbiz_settings['abcbiz_elementor_contact_style_type']) && $abcbiz_settings['abcbiz_elementor_contact_style_type'] === 'inline') {
			include 'inline-render.php';
		} else {
			include 'stack-render.php';
		}
	}
	
}