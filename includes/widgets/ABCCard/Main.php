<?php
namespace ABCBiz\Includes\Widgets\ABCCard;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-card';
    protected $title = 'ABC Card';
    protected $icon = 'eicon-info-box  abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'card', 'box'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_card_info_setting',
            [
                'label' => esc_html__('Card Type', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //style
        $this->add_control(
			'abcbiz_elementor_card_info_select_style',
			[
				'label' => esc_html__( 'Select Style', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one' => esc_html__( 'Style 1', 'abcbiz-addons' ),
					'style-two'  => esc_html__( 'Style 2', 'abcbiz-addons' ),
				],
			]
		);

        //type
        $this->add_control(
			'abcbiz_elementor_card_info_type',
			[
				'label' => esc_html__( 'Select Type', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => esc_html__( 'Image', 'abcbiz-addons' ),
					'icon'  => esc_html__( 'Icon', 'abcbiz-addons' ),
				],
                'condition' => [
                    'abcbiz_elementor_card_info_select_style' => 'style-one',
                ],
			]
		);

        //image
        $this->add_control(
			'abcbiz_elementor_card_info_image',
			[
				'label' => esc_html__( 'Choose Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'abcbiz_elementor_card_info_type' => 'image',
                    'abcbiz_elementor_card_info_select_style' => 'style-one',
                ],
			]
		);

        //image style 2
        $this->add_control(
			'abcbiz_elementor_card_info_image_two',
			[
				'label' => esc_html__( 'Choose Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'abcbiz_elementor_card_info_select_style' => 'style-two',
                ],
			]
		);

         //Image position
         $this->add_responsive_control(
            'abcbiz_elementor_card_box_img_position',
            [
                'label' => esc_html__( 'Image Position', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'row',
                'options' => [
                    'row'    => [
                        'title' => esc_html__( 'Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__( 'Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-card-style-two-area .abcbiz-card-info-wrap' => 'flex-direction: {{VALUE}}',
                ],

                'condition' => [
                    'abcbiz_elementor_card_info_select_style' => 'style-two',
                ],
            ]
        );

        //icon
        $this->add_control(
			'abcbiz_elementor_card_info_icon',
			[
				'label' => esc_html__( 'Choose Icon', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'abcbiz_elementor_card_info_type' => 'icon',
                    'abcbiz_elementor_card_info_select_style' => 'style-one',
                ],
			]
		);
        $this->end_controls_section();//end card type

        //Card Content
        $this->start_controls_section(
            'abcbiz_elementor_card_info_content',
            [
                'label' => esc_html__('Card Content', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Badge
        $this->add_control(
			'abcbiz_elementor_card_info_badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$120', 'abcbiz-addons' ),
			]
		);

         //Heading
         $this->add_control(
			'abcbiz_elementor_card_info_heading_text',
			[
				'label' => esc_html__( 'Heading Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ABCBiz Elementor Addons', 'abcbiz-addons' ),
			]
		);

        //Description
        $this->add_control(
			'abcbiz_elementor_card_info_desc',
			[
				'label' => esc_html__( 'Description', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consect adipiscing elit sed do dolro sit amet consect adipiscing elit sed', 'abcbiz-addons' ),
			]
		);

         //Button Text
         $this->add_control(
			'abcbiz_elementor_card_info_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'abcbiz-addons' ),
			]
		);

        //Button URL
        $this->add_control(
			'abcbiz_elementor_card_info_btn_url',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

        //button icon switch
        $this->add_control(
			'abcbiz_elementor_card_info_btn_icon_switch',
			[
				'label' => esc_html__( 'Button Icon?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'btn_on' => esc_html__( 'Yes', 'abcbiz-addons' ),
				'btn_off' => esc_html__( 'No', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'btn_off',
			]
		);

        //button icon
        $this->add_control(
			'abcbiz_elementor_card_info_btn_icon',
			[
				'label' => esc_html__( 'Button Icon', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'abcbiz_elementor_card_info_btn_icon_switch' => 'yes',
                ],
			]
		);

        $this->end_controls_section();//end card content

        //Card Box Style
        $this->start_controls_section(
            'abcbiz_elementor_card_box_style',
            [
                'label' => esc_html__('Box Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //box background
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_card_box_style',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .abcbiz-card-info-wrap',
			]
		);

        //box border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_card_box_border',
				'selector' => '{{WRAPPER}} .abcbiz-card-info-wrap',
			]
		);

        //box border radius
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 6,
					'right' => 6,
					'bottom' => 6,
					'left' => 6,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-info-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //box shadow
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'abcbiz_elementor_card_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-card-info-wrap',
			]
		);

        $this->end_controls_section();//end box style

        //Card Image Style
        $this->start_controls_section(
            'abcbiz_elementor_card_box_img_style',
            [
                'label' => esc_html__('Image Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_card_info_type' => 'image',
                ],
            ]
        );

        //Image align
        $this->add_responsive_control(
            'abcbiz_elementor_card_box_img_align',
            [
                'label' => esc_html__( 'Image Align', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
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
                    '{{WRAPPER}} .abcbiz-card-image' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        //image space
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_img_spacing',
			[
				'label' => esc_html__( 'Image Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //image width
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_img_width',
			[
				'label' => esc_html__( 'Image Width', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-style-two-area .abcbiz-card-image' => 'flex: 0 0 {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_card_info_select_style' => 'style-two',
                ],
			]
		);

        //image height
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_img_height',
			[
				'label' => esc_html__( 'Image Height', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 220,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //image border
         $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_card_box_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-card-image img',
			]
		);

        //image border radius
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 6,
					'right' => 6,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

          //bottom margin
          $this->add_responsive_control(
			'abcbiz_elementor_card_img_bottom_margin',
			[
				'label' => esc_html__( 'Image Bottom Margin', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} figure.abcbiz-card-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end image style

          //Card Icon Style
          $this->start_controls_section(
            'abcbiz_elementor_card_icon_style',
            [
                'label' => esc_html__('Icon Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_card_info_type' => 'icon',
                ],
            ]
        );

        //icon size
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-card-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

        //icon color
        $this->add_control(
			'abcbiz_elementor_card_box_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-icon svg' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-card-icon i' => 'color: {{VALUE}}',
				],
			]
		);

        //Icom align
        $this->add_responsive_control(
            'abcbiz_elementor_card_box_icon_align',
            [
                'label' => esc_html__( 'Icon Align', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
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
                    '{{WRAPPER}} .abcbiz-card-icon' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        //image space
        $this->add_responsive_control(
			'abcbiz_elementor_card_box_icon_spacing',
			[
				'label' => esc_html__( 'icon Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 20,
					'right' => 0,
					'bottom' => 20,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end icon style


         //Card Badge Style
         $this->start_controls_section(
            'abcbiz_elementor_card_badge_style',
            [
                'label' => esc_html__('Badge Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //color
        $this->add_control(
			'abcbiz_elementor_card_badge_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'color: {{VALUE}}',
				],
			]
		);

        //Typography
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_card_badge_text_typography',
                'label' => esc_html__( 'Badge Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-badge',
			]
		);


        //BG color
        $this->add_control(
			'abcbiz_elementor_card_badge_text_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2f44eb',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'background-color: {{VALUE}}',
				],
			]
		);

         //padding
         $this->add_responsive_control(
			'abcbiz_elementor_card_badge_padding',
			[
				'label' => esc_html__( 'Badge Padding', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 4,
					'right' => 15,
					'bottom' => 4,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_card_badg_border',
				'selector' => '{{WRAPPER}} .abcbiz-badge',
			]
		);

         //border radius
         $this->add_responsive_control(
			'abcbiz_elementor_card_badg_border_radius',
			[
				'label' => esc_html__( 'Badge Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

         //Hor Position
         $this->add_responsive_control(
			'abcbiz_elementor_card_badge_hor_position',
			[
				'label' => esc_html__( 'Badge Horizontal Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Ver Position
         $this->add_responsive_control(
			'abcbiz_elementor_card_badge_ver_position',
			[
				'label' => esc_html__( 'Badge Vertical Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-badge' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end badge style

        //Card Heading Style
        $this->start_controls_section(
            'abcbiz_elementor_card_heading_style',
            [
                'label' => esc_html__('Heading Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //alignment
        $this->add_responsive_control(
            'abcbiz_elementor_card_heading_align',
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
                    '{{WRAPPER}} h3.abcbiz-card-title' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        //color
        $this->add_control(
			'abcbiz_elementor_card_heading_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} h3.abcbiz-card-title' => 'color: {{VALUE}}',
				],
			]
		);

        //typography
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_card_heading_typography',
                'label' => esc_html__( 'Heading Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} h3.abcbiz-card-title',
			]
		);

        //Bottom space
        $this->add_responsive_control(
			'abcbiz_elementor_card_heading_bottom_space',
			[
				'label' => esc_html__( 'Bottom Margin', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 7,
				],
				'selectors' => [
					'{{WRAPPER}} h3.abcbiz-card-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end heading style

        //Card Description Style
        $this->start_controls_section(
            'abcbiz_elementor_card_desc_style',
            [
                'label' => esc_html__('Description Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //alignment
        $this->add_responsive_control(
            'abcbiz_elementor_card_desc_align',
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
                    '{{WRAPPER}} .abcbiz-card-text' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        //color
        $this->add_control(
			'abcbiz_elementor_card_desc_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#555555',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-text' => 'color: {{VALUE}}',
				],
			]
		);

        //typography
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_card_desc_typography',
                'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-card-text',
			]
		);

        //Bottom space
        $this->add_responsive_control(
			'abcbiz_elementor_card_desc_bottom_space',
			[
				'label' => esc_html__( 'Bottom Margin', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end desc style

        //Card Button Style
        $this->start_controls_section(
            'abcbiz_elementor_card_btn_style',
            [
                'label' => esc_html__('Button Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_card_btn_style_tabs'
		);

        $this->start_controls_tab(
			'abcbiz_elementor_card_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-addons' ),
			]
		);

        //color
        $this->add_control(
			'abcbiz_elementor_card_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2f44eb',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a, {{WRAPPER}} .abcbiz-card-button i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-card-button svg' => 'fill: {{VALUE}}',
				],
			]
		);

        //background color
        $this->add_control(
			'abcbiz_elementor_card_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a' => 'background-color: {{VALUE}}',
				],
			]
		);

         //button border
         $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_card_btn_border',
				'selector' => '{{WRAPPER}} .abcbiz-card-button a',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
			'abcbiz_elementor_card_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-addons' ),
			]
		);

         //color
         $this->add_control(
			'abcbiz_elementor_card_hov_btn_color',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a:hover, {{WRAPPER}} .abcbiz-card-button a:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-card-button a:hover svg' => 'fill: {{VALUE}}',
				],
			]
		);

        //background color
        $this->add_control(
			'abcbiz_elementor_card_btn_hov_bg_color',
			[
				'label' => esc_html__( 'Hover Background', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2f44eb',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

         //button border
         $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_card_btn_hov_border',
				'selector' => '{{WRAPPER}} .abcbiz-card-button a:hover',
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();//end normal/hover area

        //alignment
        $this->add_responsive_control(
            'abcbiz_elementor_card_btn_align',
            [
                'label' => esc_html__( 'Button Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'start',
                'options' => [
                    'start'    => [
                        'title' => esc_html__( 'Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-card-button' => 'justify-content: {{VALUE}}',
                ],
            ]
        );

        //padding
         $this->add_responsive_control(
			'abcbiz_elementor_card_btn_padding',
			[
				'label' => esc_html__( 'Button Padding', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 10,
					'right' => 20,
					'bottom' => 10,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //border radius
         $this->add_responsive_control(
			'abcbiz_elementor_card_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 4,
					'right' => 4,
					'bottom' => 4,
					'left' => 4,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //typography
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_card_btn_typography',
                'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-card-button a',
			]
		);

         //Icon Size
         $this->add_responsive_control(
			'abcbiz_elementor_card_btn_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-card-button i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_card_info_btn_icon_switch' => 'yes',
                ],
			]
		);

         //Hor Space
         $this->add_responsive_control(
			'abcbiz_elementor_card_btn_icon_hor_space',
			[
				'label' => esc_html__( 'Icon Horizontal Space', 'abcbiz-addons' ),
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
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} span.abcbiz-btn-icon' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_card_info_btn_icon_switch' => 'yes',
                ],
			]
		);

         //Vertical Space
         $this->add_responsive_control(
			'abcbiz_elementor_card_btn_icon_ver_space',
			[
				'label' => esc_html__( 'Icon Vertical Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} span.abcbiz-btn-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_card_info_btn_icon_switch' => 'yes',
                ],
			]
		);

        //bottom Space
        $this->add_responsive_control(
			'abcbiz_elementor_card_btn_bottom_space',
			[
				'label' => esc_html__( 'Button Bottom Margin', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-card-button' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_section();//end button style


    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
{
    $abcbiz_settings = $this->get_settings_for_display();
    $selected_style = $abcbiz_settings['abcbiz_elementor_card_info_select_style'];
    switch ($selected_style) {
        case 'style-one':
            include 'card-style1.php';
            break;
        case 'style-two':
            include 'card-style2.php';
            break;
        default:
            include 'card-style1.php';
            break;
    }
}

}