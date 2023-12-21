<?php
/**
 * Render View file for ABC Team Member Widget.
 */
    $settings = $this->get_settings_for_display();

    // checked team member style
    $team_member_style = $settings['abc_ele_teammember_style'];

    if ($team_member_style == 'style-one') {
        require(ABCELEMENTOR_PATH . '/inc/widgets/ABCTeamMember/templates/style-one.php');
    } else {
        require(ABCELEMENTOR_PATH . '/inc/widgets/ABCTeamMember/templates/style-two.php');
    }


?>