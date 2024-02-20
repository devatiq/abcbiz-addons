<?php
namespace ABCBiz\Includes\Widgets\ABCPopup;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-popup';
    protected $title = 'ABC Popup';
    protected $icon = 'eicon-lightbox-expand abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    public function get_script_depends()
    {
        return ['abcbiz-popup'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_popup_section',
            [
                'label' => esc_html__('Popup', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //content type
        $this->add_control(
            'abcbiz_elementor_popup_content_type',
            [
                'label' => esc_html__('Content Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text' => esc_html__('Text', 'abcbiz-addons'),
                    'icon' => esc_html__('Icon', 'abcbiz-addons'),
                    'image' => esc_html__('Image', 'abcbiz-addons'),
                ],
            ]
        );
        // popup text
        $this->add_control(
            'abcbiz_elementor_popup_text',
            [
                'label' => esc_html__('Popup Text', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Popup Text',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon
        $this->add_control(
            'abcbiz_elementor_popup_icon',
            [
                'label' => esc_html__('Popup Icon', 'abcbiz-addons'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image
        $this->add_control(
            'abcbiz_elementor_popup_image',
            [
                'label' => esc_html__('Popup Image', 'abcbiz-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image al
        $this->add_control(
            'abcbiz_elementor_popup_img_alt_text',
            [
                'label' => esc_html__('Image Alt Text', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ABC Popup',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );


        // popup type
        $this->add_control(
            'abcbiz_elementor_popup_type',
            [
                'label' => esc_html__('Popup Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yt-video',
                'options' => [
                    'yt-video' => esc_html__('Youtube Video', 'abcbiz-addons'),
                    'vm-video' => esc_html__('Vimeo Video', 'abcbiz-addons'),
                    'gmap' => esc_html__('Google Map', 'abcbiz-addons'),
                ],
            ]
        );
        // popup video
        $this->add_control(
            'abcbiz_elementor_popup_video',
            [
                'label' => esc_html__('Youtube Video', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'qtNnAJOGCcw',
                'description' => esc_html__('Enter Youtube video ID', 'abcbiz-addons'),
                'condition' => [
                    'abcbiz_elementor_popup_type' => 'yt-video',
                ],
            ]
        );
        // popup vimeo
        $this->add_control(
            'abcbiz_elementor_popup_vimeo_video',
            [
                'label' => esc_html__('Vimeo Video', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description' => esc_html__('Enter Vimeo video ID', 'abcbiz-addons'),
                'condition' => [
                    'abcbiz_elementor_popup_type' => 'vm-video',
                ],
            ]
        );
        // popup gmap
        $this->add_control(
            'abcbiz_elementor_popup_gmap',
            [
                'label' => esc_html__('Google Map', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618057.6387792374!2d-86.44980745076629!3d27.678376067544153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4daec28b478b666b%3A0x40d7d670f849f542!2sSupreoX%20Limited%20USA!5e0!3m2!1sen!2sbd!4v1699363617377!5m2!1sen!2sbd',
                'condition' => [
                    'abcbiz_elementor_popup_type' => 'gmap',
                ],
            ]
        );

        // end of popup
        $this->end_controls_section();

        // popup style
        $this->start_controls_section(
            'abcbiz_elementor_popup_style_section',
            [
                'label' => esc_html__('Popup Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // popup alignment
        $this->add_control(
            'abcbiz_elementor_popup_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // popup text style
        $this->add_control(
            'abcbiz_elementor_popup_text_style',
            [
                'label' => esc_html__('Text Style', 'abcbiz-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        $this->add_control(
            'abcbiz_elementor_popup_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );

        // popup text background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz-elementor-popup-text-background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-text',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_popup_text_typography',
                'label' => esc_html__('Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-text',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text padding
        $this->add_responsive_control(
            'abcbiz_elementor_popup_text_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text border radius
        $this->add_responsive_control(
            'abcbiz_elementor_popup_text_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon style
        $this->add_control(
            'abcbiz_elementor_popup_icon_style',
            [
                'label' => esc_html__('Icon Style', 'abcbiz-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        //icon color
        $this->add_control(
            'abcbiz_elementor_popup_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon background    
        $this->add_control(
            'abcbiz-elementor-popup-icon-background',
            [
                'label' => esc_html__('Icon Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg' => 'fill: {{VALUE}};background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        //icon hover color
        $this->add_control(
            'abcbiz_elementor_popup_icon_hov_color',
            [
                'label' => esc_html__('Icon Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg:hover' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg:hover path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon hover background    
        $this->add_control(
            'abcbiz-elementor-popup-icon-hov-background',
            [
                'label' => esc_html__('Icon Hover Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#b437f5',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg:hover' => 'fill: {{VALUE}};background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg:hover circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_popup_icon_border',
                'label' => esc_html__('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon border radius
        $this->add_responsive_control(
            'abcbiz_elementor_popup_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 50,
                    'right' => 50,
                    'bottom' => 50,
                    'left' => 50,
                    'unit' => '%',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon size
        $this->add_responsive_control(
            'abcbiz_elementor_popup_icon_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon padding
        $this->add_responsive_control(
            'abcbiz_elementor_popup_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image style
        $this->add_control(
            'abcbiz_elementor_popup_image_style',
            [
                'label' => esc_html__('Image Style', 'abcbiz-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image width
        $this->add_responsive_control(
            'abcbiz_elementor_popup_image_width',
            [
                'label' => esc_html__('Image Width', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 150,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 500,
                        'step' => 5,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-image img' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_popup_image_border',
                'label' => esc_html__('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-image img',
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );
        // popup image border radius
        $this->add_responsive_control(
            'abcbiz_elementor_popup_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup-content-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup style end
        $this->end_controls_section();

        // popup content style section
        $this->start_controls_section(
            'abcbiz_elementor_popup_content_style_section',
            [
                'label' => esc_html__('Popup Contents', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //Notice
        $this->add_control(
			'custom_panel_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'Notice',
				'dismissible' => false,
				'heading' => esc_html__( 'Notice', 'abcbiz-addons' ),
				'content' => esc_html__( 'For a better frame view try to set width and height based on a 16:9 ratio. ', 'abcbiz-addons' ),
			]
		);

        //ifreame width
        $this->add_responsive_control(
            'abcbiz_elementor_popup_iframe_width',
            [
                'label' => esc_html__('Width', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 150,
                        'max' => 1500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-overlay iframe' => 'width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .abcbiz-popup' => 'width: calc({{SIZE}}{{UNIT}} + 2px);',
                ],
            ]
        );

        //iframe height
        $this->add_responsive_control(
            'abcbiz_elementor_popup_iframe_height',
            [
                'label' => esc_html__('Height', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 150,
                        'max' => 1500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-overlay iframe' => 'height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .abcbiz-popup' => 'height: calc({{SIZE}}{{UNIT}} + 2px);',
                ],
            ]
        );        
        
        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_popup_border',
                'label' => esc_html__('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup',
            ]
        );

        // Border radius
        $this->add_responsive_control(
            'abcbiz_elementor_popup_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-area .abcbiz-popup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //close icon background size
        $this->add_responsive_control(
            'abcbiz_elementor_popup_close_icon_background_size',
            [
                'label' => esc_html__('Close Icon Background Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-close i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // Close icon size
        $this->add_responsive_control(
            'abcbiz_elementor_popup_close_icon_size',
            [
                'label' => esc_html__('Close Icon Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-close i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon color
        $this->add_control(
            'abcbiz_elementor_popup_close_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popup-close i' => 'color: {{VALUE}};',
                ],
            ]
        );

       //close icon background color
       $this->add_control(
           'abcbiz_elementor_popup_close_icon_bg_color',
           [
               'label' => esc_html__('Close Icon Background Color', 'abcbiz-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-popup-close i' => 'background-color: {{VALUE}};',
               ],
           ]
       ); 
       
       // Close icon position - horizontal
       $this->add_responsive_control(
           'abcbiz_elementor_popup_close_icon_right_position',
           [
               'label' => esc_html__('Close Icon Right indent', 'abcbiz-addons'),
               'type' => Controls_Manager::SLIDER,
               'label_block' => true,
               'size_units' => ['%', 'px'],
               'range' => [
                   '%' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                   'px' => [
                       'min' => -1000,
                       'max' => 1000,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-popup-close' => 'right: {{SIZE}}{{UNIT}};',
               ],
           ]
       );

       // Close icon position - vertical
       $this->add_responsive_control(
           'abcbiz_elementor_popup_close_icon_top_position',
           [
               'label' => esc_html__('Close Icon Top indent', 'abcbiz-addons'),
               'type' => Controls_Manager::SLIDER,
               'size_units' => ['%', 'px'],
               'range' => [
                   '%' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                   'px' => [
                       'min' => -1000,
                       'max' => 1000,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-popup-close' => 'top: {{SIZE}}{{UNIT}};',
               ],
           ]
       );

       // Close icon border radius
       $this->add_responsive_control(
           'abcbiz_elementor_popup_close_icon_border_radius',
           [
               'label' => esc_html__('Close Icon Border Radius', 'abcbiz-addons'),
               'type' => Controls_Manager::DIMENSIONS,
               'label_block' => true,
               'size_units' => ['px', '%'],
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-popup-close i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        include 'RenderView.php';
    }
}
