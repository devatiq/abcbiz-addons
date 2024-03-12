<?php 
namespace ABCBiz\Includes\Widgets\ABCSingleImgScroll;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-single-image-scroll';
		protected $title = 'ABC Single Image Scroll';
		protected $icon = 'eicon-slider-album abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'image', 'scroll', 'single'
		];

		public function get_style_depends()
    {
        return [''];
    }

		public function get_script_depends()
    {
        return ['']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_img_text_scroll_settings',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Animation Duration
		$this->add_control(
			'abcbiz_elementor_img_text_scroll_duration',
			[
				'label' => esc_html__( 'Animation Duration (seconds)', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 20,
			]
		);

		//Animation direction
		$this->add_responsive_control(
            'abcbiz_elementor_img_text_scroll_direction',
            [
                'label' => esc_html__( 'Direction', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'abcbizrtlscroll',
                'options' => [
                    'abcbizltrscroll'    => [
                        'title' => esc_html__( 'Left to Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'abcbizrtlscroll' => [
                        'title' => esc_html__( 'Right to Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-archive-title-tag' => 'text-align: {{VALUE}}',
                ],
            ]
        );

		$this->end_controls_section();//end settings

		//Contents
		$this->start_controls_section(
			'abcbiz_elementor_img_text_scroll_contents',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Scroll item
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'abcbiz_elementor_img_text_scroll_title',
			[
				'label' => esc_html__( 'Title', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Scroll Title' , 'abcbiz-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'abcbiz_elementor_img_text_scroll_image',
			[
				'label' => esc_html__( 'Choose Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_img_text_scroll_list',
			[
				'label' => esc_html__( 'Scroll Items', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 1', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 2', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 3', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 4', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 5', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 6', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 7', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 8', 'abcbiz-addons' ),
					],
					[
						'abcbiz_elementor_img_text_scroll_title' => esc_html__( 'Title 9', 'abcbiz-addons' ),
					],
				],
				'title_field' => '{{{ abcbiz_elementor_img_text_scroll_title }}}',
			]
		);

	   $this->end_controls_section(); //end contents

	   //Box Style
		$this->start_controls_section(
			'abcbiz_elementor_img_text_scroll_box_style',
			[
				'label' => esc_html__( 'Box Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Box Padding
		$this->add_control(
			'abcbiz_elementor_img_text_scroll_box_space',
			[
				'label' => esc_html__( 'Box Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_img_text_scroll_box_border',
				'selector' => '{{WRAPPER}} .abcbiz-img-scroll-item',
			]
		);

		//Box Radius
		$this->add_control(
			'abcbiz_elementor_img_text_scroll_box_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 6,
					'right' => 6,
					'bottom' => 6,
					'left' => 6,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); //end box style

	   //Item Style
		$this->start_controls_section(
			'abcbiz_elementor_img_text_scroll_style',
			[
				'label' => esc_html__( 'Item Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Item Width
		$this->add_responsive_control(
			'abcbiz_elementor_img_text_scroll_width',
			[
				'label' => esc_html__( 'Item Width', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 600,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-item' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}; flex-basis: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Item height
		$this->add_responsive_control(
			'abcbiz_elementor_img_text_scroll_height',
			[
				'label' => esc_html__( 'Item Height', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 600,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Item gap
		$this->add_responsive_control(
			'abcbiz_elementor_img_text_scroll_gap',
			[
				'label' => esc_html__( 'Item Gap', 'abcbiz-addons' ),
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
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-scroll-contents' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Background Color
		$this->add_control(
			'abcbiz_elementor_img_text_scroll_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-item' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_img_text_scroll_text_color',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-img-scroll-title' => 'color: {{VALUE}}',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_img_text_scroll_text_typography',
				'label' => esc_html__( 'Title Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-img-scroll-title',
			]
		);


		$this->end_controls_section(); //end item style

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}