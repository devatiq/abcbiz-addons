<?php

/**
 * Render View file for ABC Testimonials Widget.
 */
$settings = $this->get_settings_for_display();
$unique_id = $this->get_id();

// get testimonial type
$testimonial_type = $settings['abc_ele_testimonial_types'] ? $settings['abc_ele_testimonial_types'] : 'grid';

//set templates for testimonial
if($testimonial_type == 'grid'){
    include ABCELEMENTOR_PATH . '/inc/widgets/ABCTestimonials/templates/grid.php';
}elseif($testimonial_type == 'slider'){
    include ABCELEMENTOR_PATH . '/inc/widgets/ABCTestimonials/templates/sliders.php';
}