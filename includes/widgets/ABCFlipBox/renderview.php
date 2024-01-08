<?php
/**
 * Render View for ABC Flip Box Widget
 */

 if (!defined('ABSPATH')) exit; // Exit if accessed directly
 $abcbiz_settings = $this->get_settings_for_display();
 $abcbiz_flip_front_title = $abcbiz_settings['abcbiz_elementor_flip_box_front_title'];
 $abcbiz_flip_front_desc = $abcbiz_settings['abcbiz_elementor_flip_box_front_desc'];
?>

<div class="abcbiz-elementor-flip-box-area">
    <div class="flip-box">
        <div class="flip-box-front">
            <div class="flip-box-icon"><?php \Elementor\Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_flip_box_front_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
            <h2><?php echo esc_html__($abcbiz_flip_front_title); ?></h2>
            <p><?php echo esc_html__($abcbiz_flip_front_desc); ?></p>
        </div>
        <div class="flip-box-back">
            <h3>Heading</h3>
            <p>Back paragraph content goes here.</p>
            <button>Click Me</button>
        </div>
    </div>
</div>

<style>
	.abcbiz-elementor-flip-box-area {
    perspective: 1000px;
}

.abcbiz-elementor-flip-box-area .flip-box-icon svg {
	width: 50px;
	height: 50px;
}

.abcbiz-elementor-flip-box-area .flip-box-icon svg, .abcbiz-elementor-flip-box-area .flip-box-icon svg path{
	fill: red;

}

.flip-box {
    background-color: transparent;
    width: 100%;
    height: 200px;
    border: 1px solid #f1f1f1;
    perspective: 1000px;
    position: relative;
}

.flip-box-front, .flip-box-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 10px;
    box-sizing: border-box;
    transition: transform 0.6s linear;
}

.flip-box-front {
    background-color: #bbb;
    color: black;
}

.flip-box-back {
    background-color: #333;
    color: white;
    transform: rotateY(180deg);
}

.flip-box:hover .flip-box-front {
    transform: rotateY(180deg);
}

.flip-box:hover .flip-box-back {
    transform: rotateY(360deg);
}

</style>