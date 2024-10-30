<?php

/**
 * BuddyPress Login form template.
 *
 * @link       http://www.wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Bp_Lock
 * @subpackage Bp_Lock/public/templates
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<div class="bplock-login-form-container-inner">
	<div class="isa_success bplock-message" id="bplock-login-success">
		<i class="fa fa-check"></i>
	</div>
	<div class="isa_error bplock-message" id="bplock-login-error">
		<i class="fa fa-times-circle"></i>
	</div>
	<div class="isa_info bplock-message" id="bplock-login-details-empty">
		<i class="fa fa-info-circle"></i><?php esc_html_e('Either of the details is empty!', 'bp-lock'); ?>
	</div>

	<div class="bplock-formgroup">
		<label><?php esc_html_e( 'Username', 'bp-lock' ); ?></label>
		<input type="text" placeholder="<?php esc_html_e( 'Enter username', 'bp-lock' ); ?>" id="bplock-login-username">
	</div>
	<div class="bplock-formgroup">
		<label><?php esc_html_e( 'Password', 'bp-lock' ); ?></label>
		<input type="password" placeholder="<?php esc_html_e( 'Enter password', 'bp-lock' ); ?>" id="bplock-login-password">
	</div>
	<div class="bplock-btn-section">
	<?php do_action( 'bp_lock_after_login_form' ); ?>
		<button id="bplock-login-btn"><?php esc_html_e( 'Login', 'bp-lock' ); ?></button>
		<?php if ( bp_get_signup_allowed() ) : ?>
			<a href="<?php echo esc_url( bp_get_signup_page() ); ?>" id="bplock-register-btn"><?php esc_html_e( 'Register', 'bp-lock' ); ?></a>
		<?php endif; ?>
	</div>
</div>