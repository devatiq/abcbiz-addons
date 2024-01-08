<?php 
namespace ABCBiz\Includes\Widgets\ABCFlipBox;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-flip-box';
		protected $title = 'ABC Flip Box';
		protected $icon = 'eicon-flip-box';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'flip', 'box',
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		//front content
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_front_contents',
			[
				'label' => esc_html__( 'Front Contents', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//front icon
		$this->add_control(
			'abcbiz_elementor_flip_box_front_icon',
			[
				'label' => esc_html__( 'Choose Icon', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		//front heading
		$this->add_control(
			'abcbiz_elementor_flip_box_front_title',
			[
				'label' => esc_html__( 'Front Title', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Box front heading', 'abcbiz-multi' ),
			]
		);

		//Fron paragraph
		$this->add_control(
			'abcbiz_elementor_flip_box_front_desc',
			[
				'label' => esc_html__( 'Front Description', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 6,
				'default' => esc_html__( 'Front paragraph content goes here.', 'abcbiz-multi' ),
			]
		);

		//end of flip front
        $this->end_controls_section();

		//back content
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_back_contents',
			[
				'label' => esc_html__( 'Back Contents', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//front heading
		$this->add_control(
			'abcbiz_elementor_flip_box_back_title',
			[
				'label' => esc_html__( 'Back Title', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Box back heading', 'abcbiz-multi' ),
			]
		);

		//Fron paragraph
		$this->add_control(
			'abcbiz_elementor_flip_box_back_desc',
			[
				'label' => esc_html__( 'Back Description', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 6,
				'default' => esc_html__( 'Back paragraph content goes here.', 'abcbiz-multi' ),
			]
		);

		//back button
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn',
			[
				'label' => esc_html__( 'Back Button Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'abcbiz-multi' ),
			]
		);

		//button link
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

		//end of flip back
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}