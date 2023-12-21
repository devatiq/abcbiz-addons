<?php

/**
 * Render View file for ABC Post Tags Info.
 */
$settings = $this->get_settings_for_display();

?>

<!-- Post Tags Area-->
<div class="abc-ele-post-tag-area">
    <div class="abc-ele-post-tag">
    
    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
      
    </div>
</div><!--/ Post Tags Area-->
