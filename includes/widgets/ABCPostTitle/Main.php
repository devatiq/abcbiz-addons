<?php 
namespace inc\widgets\ABCPostTitle;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abc-post-title';
		protected $title = 'ABC Post Title';
		protected $icon = 'eicon-post-title';
		protected $categories = [
			'abc-category'
		];		
		protected $keywords = [
			'abc', 'post', 'title', 'post title',
		];


	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abc-elementor-post_title',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//Heading tag
        $this->add_control(
            'abc_elementor_post_title_tag',
            [
                'label' => esc_html__('Heading Tag', 'ABCMAFTH'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => esc_html__('H1', 'ABCMAFTH'),
                    'h2' => esc_html__('H2', 'ABCMAFTH'),
                    'h3' => esc_html__('H3', 'ABCMAFTH'),
                    'h4' => esc_html__('H4', 'ABCMAFTH'),
                    'h5' => esc_html__('H5', 'ABCMAFTH'),
                    'H6' => esc_html__('H6', 'ABCMAFTH'),
                ],
            
            ]
        );

		//Alignment
		$this->add_responsive_control(
			'abc_elementor_post_title_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-post-title-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //Abc post title style
		
        $this->start_controls_section(
            'abc_elementor_post_title_style',
            [
                'label' => esc_html__('Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abc_elementor_post_title_color',
			[
				'label' => esc_html__( 'Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abc-post-title-tag' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_elementor_post_title_typography',
				'label' => esc_html__( 'Typography', 'ABCMAFTH' ),
				'selector' => '{{WRAPPER}} .abc-post-title-tag',
			]
		);

		//end of divider bg style
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        //load render view to show widget output on frontend/website.
        include 'renderview.php';
    }
}