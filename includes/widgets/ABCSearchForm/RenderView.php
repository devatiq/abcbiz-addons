<?php
/**
 * Render View file for ABC Search Widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_placeholder_text = ! empty($abcbiz_settings['abcbiz_elementor_search_form_placeholder_text']) ? $abcbiz_settings['abcbiz_elementor_search_form_placeholder_text'] : esc_html__('Search...', 'abcbiz-multi');
$abcbiz_submit_button_text = ! empty($abcbiz_settings['abcbiz_elementor_search_form_btn_text']) ? $abcbiz_settings['abcbiz_elementor_search_form_btn_text'] : esc_html__('Search', 'abcbiz-multi');
?>

<!-- Search Form Area-->
<div class="abcbiz-ele-search-form-area">
    <div class="abcbiz-ele-search-form">

    <form method="get" class="abcbiz-ele-search" action="<?php echo esc_url(home_url('/')); ?>/">
            <input type="text" placeholder="<?php echo esc_attr($abcbiz_placeholder_text); ?>" value="<?php the_search_query(); ?>" name="s" class="s" />
            <input type="submit" class="searchsubmit" value="<?php echo esc_attr($abcbiz_submit_button_text); ?>" />
    </form>
      <div class="clearfix"></div>
    </div>
</div><!--/ Search Form Area-->

