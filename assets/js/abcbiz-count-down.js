jQuery(window).on('elementor/frontend/init', function() {
  'use strict';
  elementorFrontend.hooks.addAction('frontend/element_ready/global', function(scope) {
    jQuery('.abcbiz-elementor-count-down-area', scope).each(function() {
      var $countDownArea = jQuery(this);
      var countdownData = $countDownArea.data('countdown');
      var abcbizcountdownDate;

      if (countdownData) {
        abcbizcountdownDate = new Date(countdownData).getTime();
      } else {
        // Set default countdown date to 2 days from now
        var defaultCountdownPeriod = 48 * 60 * 60 * 1000; // 2 days in milliseconds
        abcbizcountdownDate = new Date().getTime() + defaultCountdownPeriod;
      }

      var $abcbizcounttime = $countDownArea.find('#abcbizcounttime');
      var $abcbizcountexpired = $countDownArea.find('#abcbizcountexpired');

      var updateCountdown = function() {
        var abcbiznow = new Date().getTime();
        var abcbizdistance = abcbizcountdownDate - abcbiznow;

        if (abcbizdistance < 0) {
          clearInterval(abcbizcountInterval);
          $abcbizcounttime.hide();
          $abcbizcountexpired.show();
          return;
        }

        $abcbizcounttime.find(".abcbiz-count-num-days").text(Math.floor(abcbizdistance / (1000 * 60 * 60 * 24)));
        $abcbizcounttime.find(".abcbiz-count-num-hours").text(Math.floor((abcbizdistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
        $abcbizcounttime.find(".abcbiz-count-num-minutes").text(Math.floor((abcbizdistance % (1000 * 60 * 60)) / (1000 * 60)));
        $abcbizcounttime.find(".abcbiz-count-num-seconds").text(Math.floor((abcbizdistance % (1000 * 60)) / 1000));
      };

      updateCountdown();
      var abcbizcountInterval = setInterval(updateCountdown, 1000);
    });
  });
});
