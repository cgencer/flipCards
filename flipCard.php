<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             0.1
 * @package           flipCard
 *
 * @wordpress-plugin
 * Plugin Name:       flipCard
 * Plugin URI:        
 * Description:       FlipCard wall, based on a jquery plugin
 * Version:           0.1.0
 * Author:            Cem Gencer
 * Author URI:        http://example.com/
 * License:           Public Domain
 * License URI:       http://www.gnu.org/philosophy/categories.html#PublicDomainSoftware
 * Text Domain:       flipCard
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_flipCard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flipCard-activator.php';
	flipCard_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_flipCard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flipCard-deactivator.php';
	flipCard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flipCard' );
register_deactivation_hook( __FILE__, 'deactivate_flipCard' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-flipCard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_flipCard() {

	$plugin = new flipCard();
	$plugin->run();

}
run_flipCard();
