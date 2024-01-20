<?php 
namespace ABCBiz\Includes\Widgets\ABCBlockquote;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-block-quote';
		protected $title = 'ABC Blockquote';
		protected $icon = 'eicon-blockquote abcbiz-multi-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'quote', 'blockquote',
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz-elementor-block-quote',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_block_quote_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-block-quote-area' => 'text-align: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'abcbiz_elementor_block_quote_text',
			[
				'label' => esc_html__( 'Quote Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Something is better than nothing!', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type blockquote text here', 'abcbiz-multi' ),
			]
		);
		

		$this->end_controls_section();

        //Abc Blockquote style
		
        $this->start_controls_section(
            'abcbiz_elementor_block_quote_style',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_block_quote_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#cccccc',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-block-quote-area .abcbiz-quote-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_block_quote_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#053d58',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-block-quote-area blockquote' => 'color: {{VALUE}}',
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

		//end of blockquote
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}