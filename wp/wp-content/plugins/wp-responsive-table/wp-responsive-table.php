<?php

use ResponsiveTable\ResponsiveTablePlugin;

/**
 *
 * Plugin Name:       WP Responsive Table
 * Plugin URI:        https://processby.com/responsive-tables-wordpress/
 * Description:       Makes HTML tables horizontally scrollable on a small screen
 * Version:           1.2.6
 * Author:            Processby
 * Author URI:        https://processby.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-responsive-table
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

call_user_func( function () {

	require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

	$main = new ResponsiveTablePlugin( __FILE__ );

	register_activation_hook( __FILE__, [ $main, 'activate' ] );

	register_deactivation_hook( __FILE__, [ $main, 'deactivate' ] );

	register_uninstall_hook( __FILE__, [ ResponsiveTablePlugin::class, 'uninstall' ] );

	$main->run();
} );