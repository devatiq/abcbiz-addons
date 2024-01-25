<?php
namespace ABCBiz\Includes\Widgets\ABCCatInfo;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-cat-info';
    protected $title = 'ABC Post Category';
    protected $icon = 'eicon-apps  abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'category', 'post'
    ];

    /**
     * Register the widget controls.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_post_cat_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //type
        $this->add_control(
			'abcbiz_elementor_post_cat_type',
			[
				'label' => esc_html__( 'Display Style', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline',
				'options' => [
					'inline' => esc_html__( 'Inline View', 'abcbiz-addons' ),
					'list'  => esc_html__( 'List View', 'abcbiz-addons' ),
				],
			]
		);

        //Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_post_cat_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-cat' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_post_cat_style_section',
            [
                'label' => esc_html__('Category Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //icon switch
        $this->add_control(
			'abcbiz_elementor_post_cat_icon',
			[
				'label' => esc_html__( 'Display Icon?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'abcbiz-addons' ),
				'label_off' => esc_html__( 'No', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'list'
                ],
			]
		);

        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_post_cat_typography',
                'label' => esc_html__('Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-post-cat',
            ]
        );

        // text color
        $this->add_control(
            'abcbiz_elementor_post_cat_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-cat a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // hover color
        $this->add_control(
            'abcbiz_elementor_post_cat_hover_color',
            [
                'label' => esc_html__('Text Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#c436f7',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-cat a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // sep color
        $this->add_control(
            'abcbiz_elementor_post_cat_sep_color',
            [
                'label' => esc_html__('Separator Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-category-separator' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'inline'
                ],
            ]
        );

        //Separator space
        $this->add_responsive_control(
			'abcbiz_elementor_post_cat_sep_space',
			[
				'label' => esc_html__( 'Separator Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-category-separator' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'inline'
                ],
			]
		);

         // icon color
         $this->add_control(
            'abcbiz_elementor_post_cat_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-cat.cat-list-view i.eicon-chevron-double-right' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'list',
                    'abcbiz_elementor_post_cat_icon' => 'yes'
                ],
            ]
        );

        //Icon Size
        $this->add_responsive_control(
			'abcbiz_elementor_post_cat_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-cat.cat-list-view i.eicon-chevron-double-right' => 'font-size: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'list',
                    'abcbiz_elementor_post_cat_icon' => 'yes'
                ],
			]
		);

        //Item space
        $this->add_responsive_control(
			'abcbiz_elementor_post_cat_item_space',
			[
				'label' => esc_html__( 'Item Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-cat.cat-list-view div.abcbiz-ele-category-item' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'list',
                    'abcbiz_elementor_post_cat_icon' => 'yes'
                ],
			]
		);

        //Icon space
        $this->add_responsive_control(
			'abcbiz_elementor_post_cat_icon_space',
			[
				'label' => esc_html__( 'Icon Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 7,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-cat.cat-list-view i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_post_cat_type' => 'list',
                    'abcbiz_elementor_post_cat_icon' => 'yes'
                ],
			]
		);
       
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
{
    $display_style = $this->get_settings_for_display('abcbiz_elementor_post_cat_type');
    if ($display_style === 'list') {
        include 'list-view.php';
    } else {
        include 'inline-view.php';
    }
}

}