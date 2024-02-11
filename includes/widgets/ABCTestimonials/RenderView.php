<?php
/**
 * Render View file for ABC Testimonials Widget.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$unique_id = $this->get_id();

// get testimonial type
$abcbiz_testimonial_type = $abcbiz_settings['abcbiz_ele_testimonial_types'] ? $abcbiz_settings['abcbiz_ele_testimonial_types'] : 'grid';

//set templates for testimonial
if($abcbiz_testimonial_type == 'grid'){
    include ABCBIZ_Path . '/includes/widgets/ABCTestimonials/templates/grid.php';
}elseif($abcbiz_testimonial_type == 'slider'){
    include ABCBIZ_Path . '/includes/widgets/ABCTestimonials/templates/sliders.php';
}