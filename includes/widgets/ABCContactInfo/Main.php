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

		//Alignment
		$this->add_responsive_control(
				'abcbiz_elementor_contact_info_inline_align',
				[
					'label' => esc_html__( 'Content Alignment', 'abcbiz-multi'),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'flex-start',
					'options' => [
						'flex-start'    => [
							'title' => esc_html__( 'Left', 'abcbiz-multi' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'abcbiz-multi' ),
							'icon' => 'eicon-text-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'abcbiz-multi' ),
							'icon' => 'eicon-text-align-right',
						],
					],				
					'selectors' => [
						'{{WRAPPER}} .abcbiz-contact-info-inline' => 'justify-content: {{VALUE}}',
					],
					'condition' => [
						'abcbiz_elementor_contact_style_type' => 'inline',
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
			'abcbiz_elementor_contact_social_icons_Settings',
			[
				'label' => esc_html__( 'Social Icons', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'abcbiz_elementor_contact_social_icon_switch' => 'yes',
				],
			]
		);

		//Facebook
		$this->add_control(
			'abcbiz_elementor_contact_info_fb_url',
			[
				'label' => esc_html__( 'Facebook URL:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);

		//X
		$this->add_control(
			'abcbiz_elementor_contact_info_x_url',
			[
				'label' => esc_html__( 'Twitter/X:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);

		//Instagram
		$this->add_control(
			'abcbiz_elementor_contact_info_ins_url',
			[
				'label' => esc_html__( 'Instagram:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);

		//Linkedin
		$this->add_control(
			'abcbiz_elementor_contact_info_link_url',
			[
				'label' => esc_html__( 'Linkedin:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);

		//Pinterest
		$this->add_control(
			'abcbiz_elementor_contact_info_pin_url',
			[
				'label' => esc_html__( 'Pinterest:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		//Dribbble
		$this->add_control(
			'abcbiz_elementor_contact_info_drib_url',
			[
				'label' => esc_html__( 'Dribbble:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		//Behance
		$this->add_control(
			'abcbiz_elementor_contact_info_behan_url',
			[
				'label' => esc_html__( 'Behance:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		//TikTok
		$this->add_control(
			'abcbiz_elementor_contact_info_tikton_url',
			[
				'label' => esc_html__( 'TikTok:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		//Vimeo
		$this->add_control(
			'abcbiz_elementor_contact_info_vimeo_url',
			[
				'label' => esc_html__( 'Vimeo:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		//Youtube
		$this->add_control(
			'abcbiz_elementor_contact_info_yt_url',
			[
				'label' => esc_html__( 'Youtube:', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);

		$this->end_controls_section();//end socian icons

		//Contact Info Style
		$this->start_controls_section(
			'abcbiz_elementor_contact_info_style',
			[
				'label' => esc_html__( 'Contact Info Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_contact_info_switch' => 'yes',
				],
			]
		);

		//Icon Size
		$this->add_responsive_control(
			'abcbiz_elementor_contact_info_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-area svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_contact_info_icon_size_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#903cf2',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-area svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Info typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_contact_info_text_typography',
				'label' => esc_html__( 'Text Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-contact-info-area',
			]
		);

		//Info Text Color
		$this->add_control(
			'abcbiz_elementor_contact_info_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-area, {{WRAPPER}} .abcbiz-contact-info-area a' => 'color: {{VALUE}}',
				],
			]
		);

		//Info Hover Color
		$this->add_control(
			'abcbiz_elementor_contact_info_text_hov_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-area a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//Spacing Stack
		$this->add_responsive_control(
			'abcbiz_elementor_contact_info_item_spacing',
			[
				'label' => esc_html__( 'Info Bottom Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-address, {{WRAPPER}} .abcbiz-contact-info-mobile, {{WRAPPER}} .abcbiz-contact-info-email' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Spacing Inline
		$this->add_responsive_control(
			'abcbiz_elementor_contact_info_item_inline_spacing',
			[
				'label' => esc_html__( 'Info Right Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-inline .abcbiz-contact-info-address, {{WRAPPER}} .abcbiz-contact-info-inline .abcbiz-contact-info-mobile, {{WRAPPER}} .abcbiz-contact-info-inline .abcbiz-contact-info-email' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_contact_style_type' => 'inline',
				],
			]
		);

        $this->end_controls_section();//end contact info style

		//Social Icons Style
		$this->start_controls_section(
			'abcbiz_elementor_contact_social_icons_style',
			[
				'label' => esc_html__( 'Social Icons Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_contact_social_icon_switch' => 'yes',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_contact_social_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Icon BG Color
		$this->add_control(
			'abcbiz_elementor_contact_social_icon_bg_color',
			[
				'label' => esc_html__( 'Icon BG Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#f0f0f0',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li a' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Icon Hover Color
		$this->add_control(
			'abcbiz_elementor_contact_social_icon_hov_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li:hover svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Icon BG Color
		$this->add_control(
			'abcbiz_elementor_contact_social_icon_bg_hov_color',
			[
				'label' => esc_html__( 'Icon Hover BG Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#dddddd',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Icon Size
		$this->add_responsive_control(
			'abcbiz_elementor_contact_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon BG Size
		$this->add_responsive_control(
			'abcbiz_elementor_contact_social_icon_bg_size',
			[
				'label' => esc_html__( 'Icon Background Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon Gap
		$this->add_responsive_control(
			'abcbiz_elementor_contact_social_icon_gap',
			[
				'label' => esc_html__( 'Icon Gap', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-contact-info-social-icons ul li' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();//end social icons style

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