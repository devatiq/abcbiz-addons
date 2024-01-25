<?php
namespace ABCBiz\Includes\widgets\ABCArchiveTitle;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * ABC Archive Title Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

    protected $name = 'abcbiz-archive-title';
    protected $title = 'ABC Archive Title';
    protected $icon = 'eicon-archive-title abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'archive', 'title', 'archive title',
    ];

    protected function register_controls() {
        $this->start_controls_section(
            'abcbiz-elementor-archive-title',
            [
                'label' => esc_html__( 'Archive Title Settings', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'abcbiz_elementor_archive_title_tag',
            [
                'label' => esc_html__('Archive Title Tag', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-addons'),
                    'h2' => esc_html__('H2', 'abcbiz-addons'),
                    'h3' => esc_html__('H3', 'abcbiz-addons'),
                    'h4' => esc_html__('H4', 'abcbiz-addons'),
                    'h5' => esc_html__('H5', 'abcbiz-addons'),
                    'H6' => esc_html__('H6', 'abcbiz-addons'),
                ],
            ]
        );

        $this->add_responsive_control(
            'abcbiz_elementor_archive_title_align',
            [
                'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
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
                    '{{WRAPPER}} .abcbiz-archive-title-tag' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'abcbiz_elementor_archive_title_color',
            [
                'label' => esc_html__( 'Color', 'abcbiz-addons' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-archive-title-tag' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_archive_title_typography',
                'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} .abcbiz-archive-title-tag',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {      
		include 'renderview.php';
    }
}