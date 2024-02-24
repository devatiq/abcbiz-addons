<?php
/**
 * Render View for ABC Count Down
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly
$abcbiz_settings = $this->get_settings_for_display();
?>

<div class="abcbiz-elementor-count-down-area">
<div id="abcbizcountdisplay">
  <p>Time Remaining:</p>
  <div id="abcbizcounttime"></div>
</div>
</div><!-- end count down area -->

<style>
body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: Arial, sans-serif;
}

#abcbizcountdisplay {
  margin: 20px;
  text-align: center;
}

#abcbizcountdisplay #abcbizcounttime {
  font-size: 24px;
  margin-top: 10px;
}
</style>

<script>
jQuery(document).ready(function($) {
  // Get the countdown target date and time from PHP using a more unique variable name
  var abcbizcountdownDate = new Date("<?php echo esc_js($abcbiz_settings['abcbiz_elementor_count_down_timer']); ?>").getTime();

  // Update the countdown every 1 second
  var abcbizcountInterval = setInterval(function() {
    var abcbiznow = new Date().getTime();
    var abcbizdistance = abcbizcountdownDate - abcbiznow;

    // Time calculations for days, hours, minutes, and seconds with specific naming
    var abcbizcountdays = Math.floor(abcbizdistance / (1000 * 60 * 60 * 24));
    var abcbizcounthours = Math.floor((abcbizdistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var abcbizcountmin = Math.floor((abcbizdistance % (1000 * 60 * 60)) / (1000 * 60));
    var abcbizcountsec = Math.floor((abcbizdistance % (1000 * 60)) / 1000);

    // Display the result in the element with id="abcbizcounttime"
    $("#abcbizcounttime").text(abcbizcountdays + "d " + abcbizcounthours + "h " + abcbizcountmin + "m " + abcbizcountsec + "s ");

    // If the countdown is over, write some text
    if (abcbizdistance < 0) {
      clearInterval(abcbizcountInterval);
      $("#abcbizcounttime").text("EXPIRED");
    }
  }, 1000);
});
</script>
