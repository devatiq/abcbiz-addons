<?php
namespace Includes\Widgets\ABCTeamMember;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-team-member';
    protected $title = 'ABC Team Member';
    protected $icon = 'eicon-theme-builder';
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
                'label' => esc_html__('Team Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // select team member style
        $this->add_control(
            'abcbiz_elementor_teammember_style',
            [
                'label' => esc_html__('Member Style', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style-one' => esc_html__('Style One', 'abcbiz-multi'),
                    'style-two' => esc_html__('Style Two', 'abcbiz-multi'),
                ],
            ]
        );

        //Member Image
        $this->add_control(
			'abcbiz_elementor_teammember_image',
			[
				'label' => esc_html__( 'Member Image', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

        //Image dimension
        $this->add_control(
			'abcbiz_elementor_teammember_image_dimension',
			[
				'label' => esc_html__( 'Image Dimension', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'abcbiz-multi' ),
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
				'label' => esc_html__( 'Member Name', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Member Name', 'abcbiz-multi' ),
			]
		);

        //Name Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_name_pos',
			[
				'label' => esc_html__( 'Name Text Position', 'abcbiz-multi' ),
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
				'label' => esc_html__( 'Member Designation', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO of Company', 'abcbiz-multi' ),
			]
		);

        //Designation Position
        $this->add_responsive_control(
			'abcbiz_elementor_teammember_designation_pos',
			[
				'label' => esc_html__( 'Designation Text Position', 'abcbiz-multi' ),
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
				'label' => esc_html__( 'Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
			]
		);


        //social profile on/off switch
        $this->add_control(
            'abcbiz_elementor_teammember_display_social',
            [
                'label' => esc_html__('Display Social Profile', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-multi'),
                'label_off' => esc_html__('No', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         //Social Position
         $this->add_responsive_control(
			'abcbiz_elementor_teammember_social_icon_pos',
			[
				'label' => esc_html__( 'Icon Position', 'abcbiz-multi' ),
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

         //Social Icon Size
         $this->add_responsive_control(
			'abcbiz_elementor_teammember_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
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
				],
                'condition' => [
                    'abcbiz_elementor_teammember_style' => 'style-two',
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ],
			]
		);
         
        //Facebook
        $this->add_control(
			'abcbiz_elementor_teammember_social_fc',
			[
				'label' => esc_html__( 'Facebook Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Twitter/x
        $this->add_control(
			'abcbiz_elementor_teammember_social_tw',
			[
				'label' => esc_html__( 'Twitter/X Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Linkedin
        $this->add_control(
			'abcbiz_elementor_teammember_social_lin',
			[
				'label' => esc_html__( 'Linkedin Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Instagram
        $this->add_control(
			'abcbiz_elementor_teammember_social_ins',
			[
				'label' => esc_html__( 'Instagram Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
			]
		);

        //Youtube
        $this->add_control(
			'abcbiz_elementor_teammember_social_yt',
			[
				'label' => esc_html__( 'Youtube Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'abcbiz-multi' ),
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
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Border color
        $this->add_control(
            'abcbiz_elementor_teammember_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-team-image img' => 'border-color: {{VALUE}} !important;',
                    
                ],
            ]
        );
       
        // team member name typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_name_typography',
                'label' => esc_html__('Name Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} h4.abcbiz-ele-team-name a, h4.abcbiz-ele-team-name, h3.abcbiz-ele-team-name, h3.abcbiz-ele-team-name a',
            ]
        );


        // team member name color
        $this->add_control(
            'abcbiz_elementor_teammember_name_color',
            [
                'label' => esc_html__('Name Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} h4.abcbiz-ele-team-name a, h4.abcbiz-ele-team-name, h3.abcbiz-ele-team-name, h3.abcbiz-ele-team-name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // team member name color
        $this->add_control(
            'abcbiz_elementor_teammember_name_hover_color',
            [
                'label' => esc_html__('Name Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} h4.abcbiz-ele-team-name a:hover, h4.abcbiz-ele-team-name:hover,h3.abcbiz-ele-team-name:hover, h3.abcbiz-ele-team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-team-link svg:hover' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // team member designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_teammember_designation_typography',
                'label' => esc_html__('Designation Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} p.abcbiz-ele-team-designation, {{WRAPPER}} .abcbiz-ele-team-style-two-info p.abcbiz-ele-team-designation',
            ]
        );
        // team member designation color
        $this->add_control(
            'abcbiz_elementor_teammember_designation_color',
            [
                'label' => esc_html__('Designation Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} p.abcbiz-ele-team-designation' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-team-style-two-info p.abcbiz-ele-team-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Arrow Icon color
         $this->add_control(
            'abcbiz_elementor_teammember_arrow_icon_color',
            [
                'label' => esc_html__('Arrow Icon Color', 'abcbiz-multi'),
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

        // end of team member style section
        $this->end_controls_section();

        // start of social style section
        $this->start_controls_section(
            'abcbiz_elementor_teammember_social_style',
            [
                'label' => esc_html__('Social Profile', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_teammember_display_social' => 'yes',
                ]
            ]
        );
        // social circle background color
        $this->add_control(
            'abcbiz_elementor_teammember_social_circle_bg_color',
            [
                'label' => esc_html__('Share Icon Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Social Icons Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Social Icon Hover Color', 'abcbiz-multi'),
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