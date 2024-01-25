<?php
namespace ABCBiz\Includes\Widgets\ABCTeamMember;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-team-member';
    protected $title = 'ABC Team Member';
    protected $icon = 'eicon-theme-builder abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_teammember_setting',
            [
                'label' => esc_html__('Team Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // select team member style
        $this->add_control(
            'abcbiz_elementor_teammember_style',
            [
                'label' => esc_html__('Member Style', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style-one' => esc_html__('Style One', 'abcbiz-addons'),
                    'style-two' => esc_html__('Style Two', 'abcbiz-addons'),
                    'style-three' => esc_html__('Style Three', 'abcbiz-addons'),
                ],
            ]
        );

        //Member Image
        $this->add_control(
			'abcbiz_elementor_teammember_image',
			[
				'label' => esc_html__( 'Member Image', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

        //Image dimension
        $this->add_control(
			'abcbiz_elementor_teammember_image_dimension',
			[
				'label' => esc_html__( 'Image Dimension', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'abcbiz-addons' ),
				'default' => [
					'width' => '800',
					'height' => '800',
				],
			]
		);

         //Member Name
         $this->add_control(
			'abcbiz_elementor_teammember_name',
			[
				'label' => esc_html__( 'Member Name', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Member Name', 'abcbiz-addons' ),
			]
		);

        //Name Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_name_pos',
			[
				'label' => esc_html__( 'Name Text Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-team-single-item-style-two:hover h3.abcbiz-ele-team-name' => 'bottom: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-two',
                ],
			]
		);

         //Member Designation
         $this->add_control(
			'abcbiz_elementor_teammember_designation',
			[
				'label' => esc_html__( 'Member Designation', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO of Company', 'abcbiz-addons' ),
			]
		);

        //Designation Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_designation_pos',
			[
				'label' => esc_html__( 'Designation Text Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 70,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-team-style-two-info .abcbiz-ele-team-designation' => 'bottom: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-two',
                ],
			]
		);

         //Link
         $this->add_control(
			'abcbiz_elementor_teammember_link',
			[
				'label' => esc_html__( 'Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_style!' => 'style-three',
                ],
			]
		);


        //social profile on/off switch
        $this->add_control(
            'abcbiz_elementor_teammember_display_social',
            [
                'label' => esc_html__('Display Social Profile', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         //Social Position
         $this->add_responsive_control(
			'abcbiz_elementor_teammember_social_icon_pos',
			[
				'label' => esc_html__( 'Icon Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-team-style-two-social' => 'bottom: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-two',
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ],
			]
		);
         
        //Phone Number
        $this->add_control(
			'abcbiz_elementor_teammember_phone_number',
			[
				'label' => esc_html__( 'Phone Number', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+123 456 7890', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ]
			]
		);

        //Phone Number
        $this->add_control(
			'abcbiz_elementor_teammember_email_address',
			[
				'label' => esc_html__( 'Email Address', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'name@siteaddress.com', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ]
			]
		);

        //Details Button
        $this->add_control(
			'abcbiz_elementor_teammember_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ]
			]
		);

        //Button Link
        $this->add_control(
			'abcbiz_elementor_teammember_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ]
			]
		);

        //Facebook
        $this->add_control(
			'abcbiz_elementor_teammember_social_fc',
			[
				'label' => esc_html__( 'Facebook Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Twitter/x
        $this->add_control(
			'abcbiz_elementor_teammember_social_tw',
			[
				'label' => esc_html__( 'Twitter/X Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Linkedin
        $this->add_control(
			'abcbiz_elementor_teammember_social_lin',
			[
				'label' => esc_html__( 'Linkedin Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Instagram
        $this->add_control(
			'abcbiz_elementor_teammember_social_ins',
			[
				'label' => esc_html__( 'Instagram Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Youtube
        $this->add_control(
			'abcbiz_elementor_teammember_social_yt',
			[
				'label' => esc_html__( 'Youtube Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-addons' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        // end of team member section
        $this->end_controls_section();

        // start of team member style section
        $this->start_controls_section(
            'abcbiz_elementor_teammember_style_setting',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Border color
        $this->add_control(
            'abcbiz_elementor_teammember_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-team-image img' => 'border-color: {{VALUE}} !important;',
                    
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style!' => 'style-three',
                ],
            ]
        );

          // Style one name typography 
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_name_one_typography',
                'label' => esc_html__('Name Typography', 'abcbiz-addons'),
                'selector' =>  '{{WRAPPER}} h4.abcbiz-ele-team-name a, {{WRAPPER}} h4.abcbiz-ele-team-name',
                    'condition' => [
                        'abcbiz_elementor_teammember_style' => 'style-one',
                    ],
            ]
        );

          // Style Two name typography 
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_name_two_typography',
                'label' => esc_html__('Name Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} h3.abcbiz-ele-team-name, {{WRAPPER}} h3.abcbiz-ele-team-name a',
                    'condition' => [
                        'abcbiz_elementor_teammember_style' => 'style-two',
                    ],
            ]
        );

          // Style Three name typography 
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_name_three_typography',
                'label' => esc_html__('Name Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} h3.abcbiz-style-three-team-name, {{WRAPPER}} h3.abcbiz-style-three-team-name a',
                    'condition' => [
                        'abcbiz_elementor_teammember_style' => 'style-three',
                    ],
            ]
        );
        

        // team member name color
        $this->add_control(
            'abcbiz_elementor_teammember_name_color',
            [
                'label' => esc_html__('Name Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} h4.abcbiz-ele-team-name a, {{WRAPPER}} h4.abcbiz-ele-team-name' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h3.abcbiz-ele-team-name, {{WRAPPER}} h3.abcbiz-ele-team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h3.abcbiz-style-three-team-name, {{WRAPPER}} h3.abcbiz-style-three-team-name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // team member name color
        $this->add_control(
            'abcbiz_elementor_teammember_name_hover_color',
            [
                'label' => esc_html__('Name Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} h4.abcbiz-ele-team-name a:hover, {{WRAPPER}} h4.abcbiz-ele-team-name:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h3.abcbiz-ele-team-name:hover, {{WRAPPER}} h3.abcbiz-ele-team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h3.abcbiz-style-three-team-name:hover, {{WRAPPER}} h3.abcbiz-style-three-team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-team-link svg:hover' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Style One designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_designation_one_typography',
                'label' => esc_html__('Designation Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} p.abcbiz-ele-team-designation',
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-one',
                ],
            ]
        );

        // Style Two designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_designation_two_typography',
                'label' => esc_html__('Designation Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-team-style-two-info p.abcbiz-ele-team-designation',
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-two',
                ],
            ]
        );

        // Style Three designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_designation_three_typography',
                'label' => esc_html__('Designation Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} h4.abcbiz-style-three-team-designation',
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

        // team member designation color
        $this->add_control(
            'abcbiz_elementor_teammember_designation_color',
            [
                'label' => esc_html__('Designation Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} p.abcbiz-ele-team-designation' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-team-style-two-info p.abcbiz-ele-team-designation' => 'color: {{VALUE}};',
                    '{{WRAPPER}} h4.abcbiz-style-three-team-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Arrow Icon color
         $this->add_control(
            'abcbiz_elementor_teammember_arrow_icon_color',
            [
                'label' => esc_html__('Arrow Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#1b75cf',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-team-link svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-one',
                ],
            ]
        );

        // contact info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_contact_typography',
                'label' => esc_html__('Contact Info Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-style-three-team-phone, {{WRAPPER}} .abcbiz-style-three-team-email',
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

         //Contact Icon Size
         $this->add_responsive_control(
			'abcbiz_elementor_teammember_contact_icon_size',
			[
				'label' => esc_html__( 'Contact Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-style-three-team-phone svg, {{WRAPPER}} .abcbiz-style-three-team-email svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
			]
		);

        //Contact Icon Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_contact_icon_pos',
			[
				'label' => esc_html__( 'Icon Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-style-three-team-phone svg, {{WRAPPER}} .abcbiz-style-three-team-email svg' => 'top: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
			]
		);

          // Contact Text Color
          $this->add_control(
            'abcbiz_elementor_teammember_contact_text_color',
            [
                'label' => esc_html__('Contact Text Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#555555',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-style-three-team-phone, {{WRAPPER}} .abcbiz-style-three-team-email' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

          // Contact Icon Color
          $this->add_control(
            'abcbiz_elementor_teammember_contact_icon_color',
            [
                'label' => esc_html__('Contact Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#555555',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-style-three-team-phone svg, {{WRAPPER}} .abcbiz-style-three-team-email svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

        // Learn More typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_btn_typography',
                'label' => esc_html__('Learn More Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-style-three-team-button a',
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

        //Button Color
        $this->add_control(
            'abcbiz_elementor_teammember_more_btn_color',
            [
                'label' => esc_html__('Learn More Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0694bf',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-style-three-team-button a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-style-three-team-button svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

        //Button Hover Color
        $this->add_control(
            'abcbiz_elementor_teammember_more_btn_hover_color',
            [
                'label' => esc_html__('Learn More Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#04de75',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-style-three-team-button a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-style-three-team-button svg:hover' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
            ]
        );

        //More Icon size
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_more_icon_size',
			[
				'label' => esc_html__( 'Learn More Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-style-three-team-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
			]
		);

        //More Icon Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_more_icon_pos',
			[
				'label' => esc_html__( 'Learn More Icon Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-style-three-team-button svg' => 'top: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-three',
                ],
			]
		);

        // end of team member style section
        $this->end_controls_section();

        // start of social style section
        $this->start_controls_section(
            'abcbiz_elementor_teammember_social_style',
            [
                'label' => esc_html__('Social Profile', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
            ]
        );

        //Social Icon Size
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-team-style-two-social ul li a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-style-three-team-icons ul li svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ],
			]
		);

        // social circle background color
        $this->add_control(
            'abcbiz_elementor_teammember_social_circle_bg_color',
            [
                'label' => esc_html__('Share Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-team-social svg circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-one',
                ],
            ]
        );

        //social icons color
        $this->add_control(
            'abcbiz_elementor_teammember_social_icons_color',
            [
                'label' => esc_html__('Social Icons Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} ul.abcbiz-team-member-social-links li svg, .abcbiz-team-style-two-social ul li a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // social icon Hover color
        $this->add_control(
            'abcbiz_elementor_teammember_social_icons_hover_color',
            [
                'label' => esc_html__('Social Icon Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#1b75cf',
                'selectors' => [
                    '{{WRAPPER}} ul.abcbiz-team-member-social-links li:hover svg, .abcbiz-team-style-two-social ul li:hover a svg ' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // end of social style section
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }

}