<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.alexanderpersky.com
 * @since             1.0.0
 * @package           Fresh_Start_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Fresh Start Plugin
 * Plugin URI:        https://github.com/bebaps/fresh-start-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Alexander Persky
 * Author URI:        https://www.alexanderpersky.com
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       fresh-start-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('FRESH_START_PLUGIN_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fresh-start-plugin-activator.php
 */
function activate_fresh_start_plugin()
{
  require_once plugin_dir_path(__FILE__) . 'includes/class-fresh-start-plugin-activator.php';
  Fresh_Start_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fresh-start-plugin-deactivator.php
 */
function deactivate_fresh_start_plugin()
{
  require_once plugin_dir_path(__FILE__) . 'includes/class-fresh-start-plugin-deactivator.php';
  Fresh_Start_Plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_fresh_start_plugin');
register_deactivation_hook(__FILE__, 'deactivate_fresh_start_plugin');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-fresh-start-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fresh_start_plugin()
{
  $plugin = new Fresh_Start_Plugin();
  $plugin->run();
}

run_fresh_start_plugin();
