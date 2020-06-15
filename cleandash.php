<?php
/**
 * CleanDash
 *
 * @package           PluginPackage
 * @author            WPHarvest
 * @copyright         2020 WPHarvest
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       CleanDash
 * Plugin URI:        https://wpharvest.com/cleandash
 * Description:       A cleaner, simpler and modern WordPress dashboard.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      5.6
 * Author:            WPHarvest
 * Author URI:        https://wpharvest.com/
 * Text Domain:       cleandash
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * CleanDash is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * CleanDash is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with CleanDash. If not, see http://www.gnu.org/licenses/gpl-2.0.txt.
 */

// Remove dashboard widgets
function wph_cleandash_remove_dashboard_meta() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	}
}
add_action( 'admin_init', 'wph_cleandash_remove_dashboard_meta' );

// Custom Admin footer
function wph_cleandash__remove_footer_admin() {
	echo '<span id="footer-thankyou">Built with <a href="https://wordpress.org/" target="_blank">WordPress</a>. Styled with love by <a href="https://www.wpharvest.com/cleandash/" target="_blank">CleanDash</a>.</span>';
}
add_filter( 'admin_footer_text', 'wph_cleandash__remove_footer_admin' );

// Enqueue stylesheet
function wph_cleandash_enqueue_stylesheet() {
    wp_enqueue_style( 'cleandash', plugins_url( '/assets/cleandash.css', __FILE__ ) );
}
add_action('admin_print_styles', 'wph_cleandash_enqueue_stylesheet');