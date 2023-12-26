<?php
/**
 * Render View file for ABC Post Tags Info.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

?>

<!-- Post Tags Area-->
<div class="abcbiz-ele-post-tag-area">
    <div class="abcbiz-ele-post-tag">
    
    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
      
    </div>
</div><!--/ Post Tags Area-->
