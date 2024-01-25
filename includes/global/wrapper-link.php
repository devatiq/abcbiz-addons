<?php
namespace ABCBiz\Includes\global;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use Elementor\Element_Base;
use Elementor\Controls_Manager;

class ABCbiz_Wrapper_link {

    public function __construct() {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'add_custom_wrapper_controls'], 10, 2);
        add_action('elementor/frontend/widget/before_render', [$this, 'apply_custom_wrapper_link'], 10);
    }

    public function add_custom_wrapper_controls(Element_Base $element, $args) {
        $element->start_controls_section(
            'abcbiz_section_custom_wrapper_link',
            [
                'label' => __('ABC Wrapper Link', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $element->add_control(
            'abcbiz_custom_wrapper_link',
            [
                'label' => __('Wrapper Link', 'abcbiz-addons'),
                'type' => Controls_Manager::URL,
                'options' => [ 'url', 'is_external'],
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('https://your-link.com', 'abcbiz-addons'),
                'description' => __('Add a custom link to wrap this widget.', 'abcbiz-addons'),
            ]
        );

        $element->end_controls_section();
    }

    public function apply_custom_wrapper_link(Element_Base $element) {
        $settings = $element->get_settings_for_display();

        if (!empty($settings['abcbiz_custom_wrapper_link']['url'])) {
            $link_data = [
                'url' => $settings['abcbiz_custom_wrapper_link']['url'],
                'is_external' => $settings['abcbiz_custom_wrapper_link']['is_external'],
                'nofollow' => $settings['abcbiz_custom_wrapper_link']['nofollow']
            ];

            $element->add_render_attribute('_wrapper', [
                'class' => 'abcbiz-custom-elementor-widget-link',
                'data-abcbiz-link-settings' => json_encode($link_data)
            ]);
        }
    }
}