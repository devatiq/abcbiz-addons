<?php
/**
 * Render View file for ABC Search Icon Widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_placeholder_text = ! empty($abcbiz_settings['abcbiz_elementor_search_icon_placeholder_text']) ? $abcbiz_settings['abcbiz_elementor_search_icon_placeholder_text'] : esc_html__('Search...', 'abcbiz-multi');
$abcbiz_submit_button_text = ! empty($abcbiz_settings['abcbiz_elementor_search_icon_btn_text']) ? $abcbiz_settings['abcbiz_elementor_search_icon_btn_text'] : esc_html__('Search', 'abcbiz-multi');
?>

<!-- Search Icon Area-->
<div class="abcbiz-ele-search-icon-area">
    <div class="abcbiz-ele-search-icon">

    <form method="get" class="abcbiz-ele-search" action="<?php echo esc_url(home_url('/')); ?>/">
    <div class="search-container">
        <input type="text" placeholder="<?php echo esc_attr($abcbiz_placeholder_text); ?>" value="<?php the_search_query(); ?>" name="s" class="s" />
        <span class="search-icon"><svg clip-rule="evenodd" fill-rule="evenodd" height="512" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" id="fi_5636698"><g id="Icon"><g><path d="m10 3.5c-3.587 0-6.5 2.913-6.5 6.5s2.913 6.5 6.5 6.5 6.5-2.913 6.5-6.5-2.913-6.5-6.5-6.5zm0 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5z"></path><path d="m20.354 19.646-5.759-5.758c-.195-.195-.512-.195-.707 0s-.195.512 0 .707l5.758 5.759c.196.195.512.195.708 0 .195-.196.195-.512 0-.708z"></path></g></g></svg></span>
    </div>
    <input type="submit" class="searchsubmit" value="<?php echo esc_attr($abcbiz_submit_button_text); ?>" />
</form>



    </div>
</div><!--/ Search Icon Area-->

<style>
 .abcbiz-ele-search .search-container {
    display: inline-flex;
    align-items: center;
    border: 1px solid #ccc; /* Optional: for visual structure */
    position: relative;
    overflow: hidden;
}

.abcbiz-ele-search .s {
    width: 0;
    padding: 0;
    border: none;
    transition: width 0.5s ease-out;
    opacity: 0;
    cursor: pointer;
    order: -1; /* Positions the search field to the left */
}

.abcbiz-ele-search .search-icon {
    cursor: pointer;
    padding: 5px;
}

.abcbiz-ele-search .s.active {
    width: 200px; /* Adjust as needed */
    opacity: 1;
    padding: 5px 10px;
}

.abcbiz-ele-search .searchsubmit {
    display: none; /* Hide the search button */
}


</style>

<script>
document.querySelector('.abcbiz-ele-search .search-icon').addEventListener('click', function() {
    var searchField = document.querySelector('.abcbiz-ele-search .s');
    searchField.classList.toggle('active');
    if (searchField.classList.contains('active')) {
        searchField.focus();
    }
});


</script>

