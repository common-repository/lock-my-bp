<?php

/**
 * BuddyPress Lock General Tab Setting Content.
 *
 * @link       http://www.wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Bp_Lock
 * @subpackage Bp_Lock/admin/includes
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$general_settings = get_option('bplock_general_settings', true);

$lock_bp_components = (isset($general_settings['bplock-bp-components']) && 'on' == $general_settings['bplock-bp-components']) ? 'checked' : '';

$lock_wp_pages = (isset($general_settings['bplock-pages']) && 'on' == $general_settings['bplock-pages']) ? 'checked' : '';

$lock_cpt = (isset($general_settings['bplock-custom-post-types']) && 'on' == $general_settings['bplock-custom-post-types']) ? 'checked' : '';

$locked_content = (isset($general_settings['locked_content'])) ? $general_settings['locked_content'] : '';

$lr_form = (isset($general_settings['lr-form'])) ? $general_settings['lr-form'] : 'plugin_form';

$cfc_style = ('plugin_form' === $lr_form || 'page_redirect' === $lr_form) ? 'display:none;' : '';

$custom_form_content = (isset($general_settings['custom_form_content'])) ? $general_settings['custom_form_content'] : '';

$pages = get_pages(); //phpcs:ignore
foreach ($pages as $page) { //phpcs:ignore
	$wp_pages[$page->ID] = $page->post_title;
}
?>
<div class="wbcom-tab-content">
	<form action="options.php" method="POST">
		<?php
		settings_fields('bplock_general_settings');
		do_settings_sections('bplock_general_settings');
		?>
		<div class="wrap">
			<div class="wbcom-welcome-main-wrapper">
				<div class="wbcom-admin-title-section">
					<h3><?php esc_html_e('General Settings', 'bp-lock'); ?></h3>
				</div>
				<div class="wbcom-admin-option-wrap wbcom-admin-option-wrap-view">
					<div class='bplock-general-settings-container'>
						<div class="form-table">
							<!-- Lock BuddyPress Components, If BP Active -->
							<?php if (defined('BPLOCK_IS_MULTISITE') && BPLOCK_IS_MULTISITE && defined('BPLOCK_IS_BP_NETWORK_ACTIVE') && BPLOCK_IS_BP_NETWORK_ACTIVE) { ?>
								<div class="wbcom-settings-section-wrap">
									<div class="wbcom-settings-section-options-heading">
										<label for="bplock-bp-components"><?php esc_html_e('Restrict BuddyPress Components', 'bp-lock'); ?></label>
										<p class="description"><?php esc_html_e('Enable this option to restrict access to BuddyPress components for logged-out users.', 'bp-lock'); ?></p>
									</div>
									<div class="wbcom-settings-section-options">
										<label class="wb-switch">
											<input type="checkbox" id="bplock-bp-components" name="bplock_general_settings[bplock-bp-components]" <?php echo esc_attr($lock_bp_components); ?>>
											<span class="wb-slider wb-round"></span>
										</label>
									</div>
								</div>
							<?php } elseif (defined('BPLOCK_IS_BP_ACTIVE') && BPLOCK_IS_BP_ACTIVE) { ?>
								<div class="wbcom-settings-section-wrap">
									<div class="wbcom-settings-section-options-heading">
										<label for="bplock-bp-components"><?php esc_html_e('Restrict BuddyPress Components', 'bp-lock'); ?></label>
										<p class="description"><?php esc_html_e('Enable this option to restrict access to BuddyPress components for logged-out users.', 'bp-lock'); ?></p>
									</div>
									<div class="wbcom-settings-section-options">
										<label class="wb-switch">
											<input type="checkbox" id="bplock-bp-components" name="bplock_general_settings[bplock-bp-components]" <?php echo esc_attr($lock_bp_components); ?>>
											<span class="wb-slider wb-round"></span>
										</label>
									</div>
								</div>
							<?php } ?>

							<!-- Lock Pages -->
							<div class="wbcom-settings-section-wrap">
								<div class="wbcom-settings-section-options-heading">
									<label for="bplock-pages"><?php esc_html_e('Restrict WordPress Pages', 'bp-lock'); ?></label>
									<p class="description"><?php esc_html_e('Enable this option to restrict access to WordPress pages for logged-out users.', 'bp-lock'); ?></p>
								</div>
								<div class="wbcom-settings-section-options">
									<label class="wb-switch">
										<input type="checkbox" id="bplock-pages" name="bplock_general_settings[bplock-pages]" <?php echo esc_attr($lock_wp_pages); ?>>
										<span class="wb-slider wb-round"></span>
									</label>
								</div>
							</div>

							<!-- Login/Registration Form -->
							<div class="wbcom-settings-section-wrap">
								<div class="wbcom-settings-section-options-heading">
									<label for="bplock-pages"><?php esc_html_e('Login and Registration Form', 'bp-lock'); ?></label>
								</div>
								<div class="wbcom-settings-section-options wbcom-settings-member-retraction">
									<div class="bplock-general-settings-section-col3">
										<input id="plugin_form" type="radio" class="lr-form" data-id="plugin_form" name="bplock_general_settings[lr-form]" value="plugin_form" <?php echo checked('plugin_form', $lr_form); ?>>
										<label for="plugin_form"><?php esc_html_e("Use Plugin's Template", 'bp-lock'); ?></label>
									</div>
									<div class="bplock-general-settings-section-col3">
										<input id="custom_form" type="radio" class="lr-form" data-id="custom_form" name="bplock_general_settings[lr-form]" value="custom_form" <?php echo checked('custom_form', $lr_form); ?>>
										<label for="custom_form"><?php esc_html_e('3rd Party Plugin Shortcode', 'bp-lock'); ?></label>
									</div>
									<div class="bplock-general-settings-section-col3">
										<input id="page_redirect" type="radio" class="lr-form" data-id="page_redirect" name="bplock_general_settings[lr-form]" value="page_redirect" <?php echo checked('page_redirect', $lr_form); ?>>
										<label for="page_redirect"><?php esc_html_e('Redirect to Page', 'bp-lock'); ?></label>
									</div>
								</div>
							</div>

							<!-- Custom Form Textarea -->
							<div class="wbcom-settings-section-wrap custom_form" style="<?php echo esc_attr($cfc_style); ?>">
								<div class="wbcom-settings-section-options-heading">
									<label for="bplock-txtarea"><?php esc_html_e('Custom Form Content', 'bp-lock'); ?></label>
									<p class="description"><?php echo esc_html__('Please insert a login/registration form shortcode.', 'bp-lock'); ?></p>
								</div>
								<div class="wbcom-settings-member-retraction wbcom-settings-section-options">
									<input type="text" id="custom_form_content" name="bplock_general_settings[custom_form_content]" value="<?php echo esc_attr($custom_form_content); ?>">
								</div>
							</div>
							<?php

							if ('page_redirect' === $lr_form) {
								$style = '';
							} else {
								$style = 'display:none;';
							}
							?>
							<div class="wbcom-settings-section-wrap" id="logout_redirect_page" style="<?php echo esc_attr($style); ?>">
								<div class="wbcom-settings-section-options-heading"><label for="blogname"><?php esc_html_e('Select Page to Redirect', 'bp-lock'); ?></label>
									<p class="description" id="tagline-description"><?php esc_html_e('Select the page to which restricted users will be redirected. These pages will be locked for logged-out users.', 'bp-lock'); ?>
									</p>
								</div>
								<div class="wbcom-settings-section-options wbcom-settings-member-retraction">
									<select id="blpro-page-list" name="bplock_general_settings[logout_redirect_page]">
										<?php if (!empty($wp_pages)) { ?>
											<?php foreach ($wp_pages as $pgid => $wp_page) { ?>
												<?php $selected = (!empty($general_settings['logout_redirect_page']) && $pgid == $general_settings['logout_redirect_page']) ? 'selected' : ''; ?>
												<option value="<?php echo esc_attr($pgid); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($wp_page); ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>

							<!-- Display Content -->

							<?php
							if ('page_redirect' === $lr_form) {
								$style = 'display:none;';
							} else {
								$style = '';
							}
							?>
							<div class="wbcom-settings-section-wrap" id="wp-bplock-locked-content-wrap-view" style="<?php echo esc_attr($style); ?>">
								<div class="wbcom-settings-section-options-heading">
									<label for="bplock-display-content"><?php esc_html_e('Custom Restriction Message', 'bp-lock'); ?></label>
									<p class="description"><?php esc_html_e('The above message will be displayed on the protected pages.', 'bp-lock'); ?></p>
								</div>
								<div class="wbcom-settings-member-retraction">
									<?php
									$options = array(
										'textarea_rows' => 5,
										'textarea_name' => 'bplock_general_settings[locked_content]',
									);
									?>
									<?php
									if (empty($locked_content)) {
										$locked_content = apply_filters('bploc_default_locked_message', esc_html__('Hey Member! Thanks for checking this page out -- however, it’s restricted to logged members only. If you’d like to access it, please login to the website.', 'bp-lock'));
									}
									wp_editor($locked_content, 'bplock-locked-content', $options);
									?>
								</div>
							</div>
						</div>
						<div class="bplock-submit">
							<?php submit_button(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>