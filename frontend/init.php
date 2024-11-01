<?php

namespace SIL\frontend;
defined('ABSPATH') or die('No script kiddies please!');


// ================= Includes =================================================================
require_once plugin_dir_path(__FILE__) . 'functions.php';


// ================= Actions =================================================================
add_action('wp_enqueue_scripts', function() {
	//wp_enqueue_style('simple-inline-login-style', \SIL\URL . 'frontend/css/simple-inline-login.css');
	wp_enqueue_style(
		'simple-inline-login-style',
		\SIL\URL . 'frontend/css/simple-inline-login.css',
		array(),
		filemtime( \SIL\PATH . 'frontend/css/simple-inline-login.css' ), // Usar una ruta del sistema para filemtime.
		'all'
	);

});

add_action('wp_login_failed', function($username) {
	$password = isset($_POST['pwd']) ? wp_unslash( $_POST['pwd'] ) : '';
	$referrer = wp_get_referer();
	if ($referrer) {
		$redirect_url = add_query_arg(array(
			'login' => 'failed',
			'username' => urlencode($username),
		), $referrer);
		wp_safe_redirect($redirect_url);
		exit;
	}
});

add_shortcode('simple-inline-login', 'SIL\frontend\login_form_shortcode');

?>