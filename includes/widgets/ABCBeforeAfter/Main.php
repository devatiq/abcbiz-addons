<?php 
namespace ABCBiz\Includes\Widgets\ABCBeforeAfter;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-before-after-image';
		protected $title = 'ABC Before After Image';
		protected $icon = 'eicon-image-before-after abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'before', 'after', 'image', 'compare'
		];

		public function get_style_depends()
		{
			return ['twentytwenty'];
		}

		public function get_script_depends()
    {
        return ['jquery-event-move', 'jquery-twentytwenty', 'abcbiz-before-after-script']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_before_after_image',
			[
				'label' => esc_html__( 'Before After Image', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Before Image
		$this->add_control(
			'abcbiz_elementor_before_img_upload',
			[
				'label' => esc_html__( 'Upload Before Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		//Before Alt Text
		$this->add_control(
			'abcbiz_elementor_before_img_alt',
			[
				'label' => esc_html__( 'Before Image Alt Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Before Image', 'abcbiz-addons' ),
			]
		);

		//Before Image
		$this->add_control(
			'abcbiz_elementor_after_img_upload',
			[
				'label' => esc_html__( 'Upload After Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		//After Alt Text
		$this->add_control(
			'abcbiz_elementor_after_img_alt',
			[
				'label' => esc_html__( 'After Image Alt Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'After Image', 'abcbiz-addons' ),
			]
		);

		$this->end_controls_section();//end image section

		$this->start_controls_section(
			'abcbiz_elementor_before_after_setting',
			[
				'label' => esc_html__( 'Widget Setings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//orientation
		$this->add_responsive_control(
            'abcbiz_elementor_before_after_orientation',
            [
                'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'horizontal',
                'options' => [
                    'horizontal'    => [
                        'title' => esc_html__( 'Horizontal', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-stretch',
                    ],
                    'vertical' => [
                        'title' => esc_html__( 'Vertical', 'abcbiz-addons' ),
                        'icon' => 'eicon-v-align-stretch',
                    ],
                ],
            ]
        );

		//Before image visibility
		$this->add_responsive_control(
			'abcbiz_elementor_before_img_visibility',
			[
				'label' => esc_html__( 'Before Image Visibility', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.5,
				],
			]
		);

		//Overlay
		$this->add_control(
			'abcbiz_elementor_before_after_switch',
			[
				'label' => esc_html__( 'Hide Overlay?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'overlay_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'overlay_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'true',
				'default' => 'overlay_off',
			]
		);

		//Before Label Text
		$this->add_control(
			'abcbiz_elementor_before_label_text',
			[
				'label' => esc_html__( 'Before Label Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Before', 'abcbiz-addons' ),
			]
		);

		//After Label Text
		$this->add_control(
			'abcbiz_elementor_after_label_text',
			[
				'label' => esc_html__( 'After Label Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'After', 'abcbiz-addons' ),
			]
		);

		//Move type
		$this->add_control(
            'abcbiz_elementor_before_after_handle_move',
            [
                'label' => __( 'Handle Move Type', 'abcbiz-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'on_swipe',
                'options' => [
                    'on_hover' => __( 'On Hover', 'abcbiz-addons' ),
                    'on_click' => __( 'On Click', 'abcbiz-addons' ),
                    'on_swipe' => __( 'On Swipe', 'abcbiz-addons' ),
                ],
                'description' => __( 'Select handle movement type. Overlay does not work with On Hover.', 'abcbiz-addons' ),
            ]
        );

		$this->end_controls_section();//end label section

		//Style Section
		$this->start_controls_section(
			'abcbiz_elementor_before_after_style',
			[
				'label' => esc_html__( 'Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Handle Height
		$this->add_responsive_control(
			'abcbiz_elementor_after_handle_height',
			[
				'label' => esc_html__( 'Handle Height', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 150,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 38,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Handle Height
		$this->add_responsive_control(
			'abcbiz_elementor_after_handle_width',
			[
				'label' => esc_html__( 'Handle width', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 150,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 38,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Margin top
		$this->add_responsive_control(
			'abcbiz_elementor_after_handle_margin_top',
			[
				'label' => esc_html__( 'Top Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -22,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Margin top
		$this->add_responsive_control(
			'abcbiz_elementor_after_handle_margin_left',
			[
				'label' => esc_html__( 'Left Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -22,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Border Color
		$this->add_control(
			'abcbiz_elementor_after_handle_color',
			[
				'label' => esc_html__( 'Handle Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle:before, {{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle:after' => 'background: {{VALUE}}',
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle:before, {{WRAPPER}} #abcbiz-before-after-container .twentytwenty-handle:after' => 'background: {{VALUE}}',
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
					'{{WRAPPER}} #abcbiz-before-after-container .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();//end style section



    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}