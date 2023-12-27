<?php
/**
 * Render View file for ABC Testimonials Widget.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$unique_id = $this->get_id();

// get testimonial type
$testimonial_type = $settings['abcbiz_ele_testimonial_types'] ? $settings['abcbiz_ele_testimonial_types'] : 'grid';

//set templates for testimonial
if($testimonial_type == 'grid'){
    include AbcBizElementor_Path . '/includes/widgets/ABCTestimonials/templates/grid.php';
}elseif($testimonial_type == 'slider'){
    include AbcBizElementor_Path . '/includes/widgets/ABCTestimonials/templates/sliders.php';
}