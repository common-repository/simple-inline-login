<?php

namespace SIL\includes;
defined('ABSPATH') or die('No script kiddies please!');


// ================= Functions =================================================================
function activate() {
	if (!get_option('simple_inline_login_options')) {
		add_option('simple_inline_login_options', array(
			'redirect' => home_url(),
			'version' => '1.0')
		);
	}
}

function deactivate() {	
	delete_option('simple_inline_login_options');
}

function uninstall() {
	delete_option('simple_inline_login_options');
}

// ================= Entry Point =================================================================
// Register plugin activation, deactivation and unistallation functions
register_activation_hook(__FILE__, 'activate');
register_deactivation_hook(__FILE__, 'deactivate');
register_uninstall_hook(__FILE__, 'uninstall');

?>