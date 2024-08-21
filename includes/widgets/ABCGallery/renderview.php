<?php
/**
 * Render View for ABC Animated Text
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
		foreach ( $settings['gallery'] as $image ) {
			echo '<img src="' . esc_attr( $image['url'] ) . '">';
		}