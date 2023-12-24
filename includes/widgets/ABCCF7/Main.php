<?php
namespace Includes\Widgets\ABCCF7;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-cfs7';
    protected $title = 'ABC Contact Form 7 Style';
    protected $icon = 'eicon-form-horizontal';
    protected $categories = [
        'abcbiz-category'
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
    private function abcbiz_contact_form_shortcodes() {
        $formlist = array();
        $forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $forms = get_posts( $forms_args );
        if( $forms ){
            foreach ( $forms as $form ){
                $formlist[$form->ID] = $form->post_title;
            }
        }else{
            $formlist['0'] = esc_html__('Form not found', 'abcbiz-multi');
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
            'abcbiz_elementor_contact_form_setting',
            [
                'label' => esc_html__('Contact Form 7 Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Contact Form 7 Shortcode Dropdown
        $this->add_control(
            'abcbiz_ele_contact_form_shortcode',
            [
                'label' => esc_html__('Select Form', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->abcbiz_contact_form_shortcodes(),
            ]
        );    

        // end of Contact form section
        $this->end_controls_section();

         // start of Contact Form input style section
         $this->start_controls_section(
            'abcbiz_elementor_cf7_label_style_setting',
            [
                'label' => esc_html__('Label Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //label typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_cf7_label_typography',
                'label' => esc_html__('Label Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-contact-form-7-area label',
            ]
        );

        //label color
        $this->add_control(
            'abcbiz_elementor_cf7_label_typography',
            [
                'label' => esc_html__('Label Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-contact-form-7-area label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();  // end of label section

        // start of Contact Form input style section
        $this->start_controls_section(
            'abcbiz_elementor_cf7_input_style_setting',
            [
                'label' => esc_html__('Input Fields', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // contact form 7 input field height
        $this->add_responsive_control(
            'abcbiz_ele_cf7_input_height',
            [
                'label' => esc_html__('Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap select' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_ele_cf7_input_border',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input',
            ]
        );
        // contact form 7 input field border radius
        $this->add_responsive_control(
            'abcbiz_ele_cf7_input_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field padding
        $this->add_responsive_control(
            'abcbiz_ele_cf7_input_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 input field margin
        $this->add_responsive_control(
            'abcbiz_ele_cf7_input_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

         // contact form 7 input field text color
         $this->add_control(
            'abcbiz_ele_cf7_input_text_bg_color',
            [
                'label' => esc_html__('Field Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f1f1f1',
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap select' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // contact form 7 input field text color
        $this->add_control(
            'abcbiz_ele_cf7_input_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap select' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'color: {{VALUE}};',
                ],
            ]
        );

        // contact form 7 input field text color
        $this->add_control(
            'abcbiz_ele_cf7_input_text_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input::placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea::placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );

         //placeholder typography
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_cf7_input_text_placeholder_typography',
                'label' => esc_html__('Placeholder Typography', 'abcbiz-multi'),
                'selector' =>'{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap input::placeholder, {{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea::placeholder',
            ]
        );

        // end of Contact Form input style section
        $this->end_controls_section();

        //Contact Form textarea style section
        $this->start_controls_section(
            'abcbiz_elementor_cf7_textarea_style_setting',
            [
                'label' => esc_html__('Textarea', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // contact form 7 textarea field height
        $this->add_responsive_control(
            'abcbiz_ele_cf7_textarea_height',
            [
                'label' => esc_html__('Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                    ],

                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
      
        // contact form 7 textarea field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_ele_cf7_textarea_border',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea',
            ]
        );
        // contact form 7 textarea field border radius
        $this->add_responsive_control(
            'abcbiz_ele_cf7_textarea_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field padding
        $this->add_responsive_control(
            'abcbiz_ele_cf7_textarea_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 textarea field margin
        $this->add_responsive_control(
            'abcbiz_ele_cf7_textarea_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper .wpcf7-form-control-wrap textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // end of Contact Form textarea style section
        $this->end_controls_section();

        //Contact Form submit button style section
        $this->start_controls_section(
            'abcbiz_elementor_cf7_submit_button_style_setting',
            [
                'label' => esc_html__('Submit Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // contact form 7 submit button field typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_cf7_submit_button_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit',
            ]
        );

        // contact form 7 submit button field padding
        $this->add_responsive_control(
            'abcbiz_ele_cf7_submit_button_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field margin
        $this->add_responsive_control(
            'abcbiz_ele_cf7_submit_button_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field text color
        $this->add_control(
            'abcbiz_ele_cf7_submit_button_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field background color
        $this->add_control(
            'abcbiz_ele_cf7_submit_button_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_ele_cf7_submit_button_border',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit',
            ]
        );  
        // contact form 7 submit button field border radius
        $this->add_responsive_control(
            'abcbiz_ele_cf7_submit_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // contact form 7 submit button field hover text color
        $this->add_control(
            'abcbiz_ele_cf7_submit_button_hover_text_color',
            [
                'label' => esc_html__('Hover Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field hover background color
        $this->add_control(
            'abcbiz_ele_cf7_submit_button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // contact form 7 submit button field hover border color
        $this->add_control(
            'abcbiz_ele_cf7_submit_button_hover_border_color',
            [
                'label' => esc_html__('Hover Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-ele-contact-form-wrapper input[type="submit"].wpcf7-form-control.wpcf7-submit:hover' => 'border-color: {{VALUE}};',
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