<?php
/**
 * Render View file for ABC Search Widget
 */

$settings = $this->get_settings_for_display();

$abc_placeholder_text = ! empty($settings['abc_elementor_search_form_placeholder_text']) ? $settings['abc_elementor_search_form_placeholder_text'] : esc_html__('Search...', 'abcbiz-multi');
$abc_submit_button_text = ! empty($settings['abc_elementor_search_form_btn_text']) ? $settings['abc_elementor_search_form_btn_text'] : esc_html__('Search', 'abcbiz-multi');
?>

<!-- Search Form Area-->
<div class="abc-ele-search-form-area">
    <div class="abc-ele-search-form">

    <form method="get" class="abc-ele-search" action="<?php echo esc_url(home_url('/')); ?>/">
            <input type="text" placeholder="<?php echo esc_attr($abc_placeholder_text); ?>" value="<?php the_search_query(); ?>" name="s" class="s" />
            <input type="submit" class="searchsubmit" value="<?php echo esc_attr($abc_submit_button_text); ?>" />
    </form>
      <div class="clearfix"></div>
    </div>
</div><!--/ Search Form Area-->

