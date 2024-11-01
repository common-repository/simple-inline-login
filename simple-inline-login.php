<?php

/**
 * The plugin bootstrap file
 *
 * This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link				http://morillasweb.com
 * @charset				UTF-8'
 *
 * @wordpress-plugin
 * Plugin Name:			Simple Inline Login 
 * Description:			Creates a shortcode to insert a login form on any page and redirect to any desired page.
 * Version:				0.9.1
 * Author:				C&eacute;sar Morillas
 * License:				GPL-2.0+
 * License URI:			http://www.gnu.org/licenses/gpl-2.0.txt
 */


namespace SIL;
defined('ABSPATH') or die('Please don\'t access this file directly.');


// ================= Defines =================================================================
define ('SIL\URL', plugins_url( '', __FILE__ ).'/');								// URL del plugin
define ('SIL\PATH', realpath(plugin_dir_path( __FILE__ )).DIRECTORY_SEPARATOR);		// PATH del plugin

// ================= Includes ================================================================
// Includes for both admin and frontend context
require_once plugin_dir_path(__FILE__) . 'includes/installer.php';

// ================= Text Domain =============================================================
// Text domain. For debug: https://es.wordpress.org/plugins/display-text-domains/	
add_action('plugins_loaded', function() {
	load_plugin_textdomain('simple-inline-login', false, dirname(plugin_basename(__FILE__)) . '/languages/');
});

// ================= Entry Point =============================================================
// Include backend or frontend logic based on the context
if (is_admin()) {
	//require_once plugin_dir_path(__FILE__) . 'admin/init.php';
} else {
	require_once plugin_dir_path(__FILE__) . 'frontend/init.php';
}


?>