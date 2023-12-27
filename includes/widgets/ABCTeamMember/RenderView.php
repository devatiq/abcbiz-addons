<?php
/**
 * Render View file for ABC Team Member Widget.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_team_member_style = $abcbiz_settings['abcbiz_elementor_teammember_style'];

    if ($abcbiz_team_member_style == 'style-one') {
      require(AbcBizElementor_Path . '/includes/widgets/ABCTeamMember/templates/style-one.php');
    } elseif ($abcbiz_team_member_style == 'style-two') {
      require(AbcBizElementor_Path . '/includes/widgets/ABCTeamMember/templates/style-two.php');
    }
    else {
       require(AbcBizElementor_Path . '/includes/widgets/ABCTeamMember/templates/style-three.php');
    }
?>