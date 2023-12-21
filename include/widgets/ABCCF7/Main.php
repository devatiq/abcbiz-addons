<?php
namespace Inc\Widgets\ABCCF7;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'ABC-Elementor-ABCCF7';
    protected $title = 'ABC Contact Form 7 Style';
    protected $icon = 'eicon-form-horizontal';
    protected $categories = [
        'abc-category'
    ];
    protected $keywords = [
        'abc', 'form', 'contact', 'style', '7'
    ];

    /**
     * Get Contact Form 7 Shortcodes
     * Retrieves a list of Contact Form 7 shortcodes.
     *
     * @return array
     */
    private function get_contact_form_shortcodes() {
        $formlist = array();
        $forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $forms = get_posts( $forms_args );
        if( $forms ){
            foreach ( $forms as $form ){
                $formlist[$form->ID] = $form->post_title;
            }
        }else{
            $formlist['0'] = esc_html__('Form not found', 'ABCMAFTH');
        }
        return $formlist;
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_elementor_contact_form_setting',
            [
                'label' => __('Contact Form 7 Setting', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Contact Form 7 Shortcode Dropdown
        $this->add_control(
            'abc_ele_contact_form_shortcode',
            [
                'label' => __('Select Form', 'ABCMAFTH'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_contact_form_shortcodes(),
            ]
        );    

        // end of Contact form section
        $this->end_controls_section();

        // start of Contact Form input style section
        $this->start_controls_section(
            'abc_elementor_cf7_input_style_setting',
            [
                'label' => __('Input', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // contact form 7 input field height
        $this->add_responsive_control(
            'abc_ele_cf7_input_height',
            [
                'label' => __('Height', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ele_cf7_input_border',
                'label' => __('Border', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input',
            ]
        );
        // contact form 7 input field border radius
        $this->add_responsive_control(
            'abc_ele_cf7_input_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field padding
        $this->add_responsive_control(
            'abc_ele_cf7_input_padding',
            [
                'label' => __('Padding', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field margin
        $this->add_responsive_control(
            'abc_ele_cf7_input_margin',
            [
                'label' => __('Margin', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field text color
        $this->add_control(
            'abc_ele_cf7_input_text_color',
            [
                'label' => __('Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'color: {{VALUE}};',
                ],
            ]
        );

        // end of Contact Form input style section
        $this->end_controls_section();

        //Contact Form textarea style section
        $this->start_controls_section(
            'abc_elementor_cf7_textarea_style_setting',
            [
                'label' => __('Textarea', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // contact form 7 textarea field height
        $this->add_responsive_control(
            'abc_ele_cf7_textarea_height',
            [
                'label' => __('Height', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field width
        $this->add_responsive_control(
            'abc_ele_cf7_textarea_width',
            [
                'label' => __('Width', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ele_cf7_textarea_border',
                'label' => __('Border', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea',
            ]
        );
        // contact form 7 textarea field border radius
        $this->add_responsive_control(
            'abc_ele_cf7_textarea_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field padding
        $this->add_responsive_control(
            'abc_ele_cf7_textarea_padding',
            [
                'label' => __('Padding', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field margin
        $this->add_responsive_control(
            'abc_ele_cf7_textarea_margin',
            [
                'label' => __('Margin', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field text color
        $this->add_control(
            'abc_ele_cf7_textarea_text_color',
            [
                'label' => __('Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'color: {{VALUE}};',
                ],
            ]
        );

        // end of Contact Form textarea style section
        $this->end_controls_section();

        //Contact Form submit button style section
        $this->start_controls_section(
            'abc_elementor_cf7_submit_button_style_setting',
            [
                'label' => __('Submit Button', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // contact form 7 submit button field typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_cf7_submit_button_typography',
                'label' => __('Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit',
            ]
        );

        // contact form 7 submit button field padding
        $this->add_responsive_control(
            'abc_ele_cf7_submit_button_padding',
            [
                'label' => __('Padding', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field margin
        $this->add_responsive_control(
            'abc_ele_cf7_submit_button_margin',
            [
                'label' => __('Margin', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field text color
        $this->add_control(
            'abc_ele_cf7_submit_button_text_color',
            [
                'label' => __('Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field background color
        $this->add_control(
            'abc_ele_cf7_submit_button_bg_color',
            [
                'label' => __('Background Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ele_cf7_submit_button_border',
                'label' => __('Border', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit',
            ]
        );  
        // contact form 7 submit button field border radius
        $this->add_responsive_control(
            'abc_ele_cf7_submit_button_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field hover text color
        $this->add_control(
            'abc_ele_cf7_submit_button_hover_text_color',
            [
                'label' => __('Hover Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field hover background color
        $this->add_control(
            'abc_ele_cf7_submit_button_hover_bg_color',
            [
                'label' => __('Hover Background Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field hover border color
        $this->add_control(
            'abc_ele_cf7_submit_button_hover_border_color',
            [
                'label' => __('Hover Border Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abc-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // end of Contact Form submit button style section
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()

    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}