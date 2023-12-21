<?php

/**
 * Render View file for ABC Comment Form.
 */
$settings = $this->get_settings_for_display();

?>

<!-- Comment Form Area-->
<div class="abc-ele-comment-form-area">
    <div class="abc-ele-comment-form">
    
    <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
      
    </div>
</div><!--/ Comment Form Area-->