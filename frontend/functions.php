<?php

/**
 * The file that defines the core plugin for the shortcode
 *
 * @author   cmorillas1@gmail.com
 * @category Core
 * @package  Shortcode
 */

namespace SIL\frontend;

defined('ABSPATH') or die('No script kiddies please!');


// ================= Shortcode =================================================================
function login_form_shortcode() {    
	if (is_user_logged_in()) {
		return '<p>' . __('You are already logged in.', 'simple-inline-login') . '</p>';
	}
	else {		
		$error_message = '';
		$username = '';
		if (isset($_GET['username']) && !empty($_GET['username'])) {
			$username = sanitize_text_field( urldecode( wp_unslash( $_GET['username'] ) ) ); 
		}
		if (isset($_GET['login']) && $_GET['login'] === 'failed') {
			/* translators: %s is the user name */
			$error_message = '<p class="login-error">' . sprintf(__('Invalid username or password for "%s". Please try again.', 'simple-inline-login'), esc_html($username)) . '</p>';
		}

		$lost_password_url = esc_url(wp_lostpassword_url());
		$current_url = esc_url(add_query_arg(null, null));
		$login_form = wp_login_form(array(
			'echo'			 => false,
			'redirect'		 => $current_url,			
			//'form_id'		 => 'login-form',
			'label_username' => __( 'User name', 'simple-inline-login' ),
			'label_password' => __( 'Password', 'simple-inline-login' ),
			'label_remember' => __( 'Remember me', 'simple-inline-login' ),
			'label_log_in'   => __( 'Log in', 'simple-inline-login' ),
			//'remember'	 => true
		));

		$output = '
			<div id="sil-container">
				' . $error_message . '
				' . $login_form . '
				<p class="login-register-link">
					<a href="' . esc_url($lost_password_url) . '">' . __('Lost your password?', 'simple-inline-login') . '</a>
				</p>
			</div>
		';

		return $output;
	}
}

?>