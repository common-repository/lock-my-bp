<?php

/**
 * This file is used for rendering and saving plugin welcome settings.
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
?>

<div class="wbcom-tab-content">
	<div class="wbcom-welcome-main-wrapper">
		<div class="wbcom-welcome-head">
			<p class="wbcom-welcome-description"><?php esc_html_e('We can lock down certain components of BuddyPress so that they won’t be accessed publicly.', 'bp-lock'); ?></p>
		</div><!-- .wbcom-welcome-head -->

		<div class="wbcom-welcome-content">
			<div class="wbcom-welcome-support-info">
				<h3><?php esc_html_e('Help & Support Resources', 'bp-lock'); ?></h3>
				<p><?php esc_html_e('Here are all the resources you may need to get help from us. Documentation is usually the best place to start. Should you require help anytime, our customer care team is available to assist you at the support center.', 'bp-lock'); ?></p>
				<div class="wbcom-support-info-wrap">
					<div class="wbcom-support-info-widgets">
						<div class="wbcom-support-inner">
							<h3><span class="dashicons dashicons-book"></span><?php esc_html_e('Documentation', 'bp-lock'); ?></h3>
							<p><?php esc_html_e('We have prepared an extensive guide on Private Community for BuddyPress to learn all aspects of the plugin. You will find most of your answers here.', 'bp-lock'); ?></p>
							<a href="<?php echo esc_url('https://docs.wbcomdesigns.com/doc_category/buddypress-lock/'); ?>" class="button button-primary button-welcome-support" target="_blank"><?php esc_html_e('Read Documentation', 'bp-lock'); ?></a>
						</div>
					</div>

					<div class="wbcom-support-info-widgets">
						<div class="wbcom-support-inner">
							<h3><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Center', 'bp-lock'); ?></h3>
							<p><?php esc_html_e('We strive to offer the best customer care via our support center. Once your theme is activated, you can ask us for help anytime.', 'bp-lock'); ?></p>
							<a href="<?php echo esc_url('https://wbcomdesigns.com/support/'); ?>" class="button button-primary button-welcome-support" target="_blank"><?php esc_html_e('Get Support', 'bp-lock'); ?></a>
						</div>
					</div>

					<div class="wbcom-support-info-widgets">
						<div class="wbcom-support-inner">
							<h3><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Got Feedback?', 'bp-lock'); ?></h3>
							<p><?php esc_html_e('We want to hear about your experience with the plugin. We would also love to hear any suggestions you may have for future updates.', 'bp-lock'); ?></p>
							<a href="<?php echo esc_url('https://wbcomdesigns.com/contact/'); ?>" class="button button-primary button-welcome-support" target="_blank"><?php esc_html_e('Send Feedback', 'bp-lock'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .wbcom-welcome-content -->
	</div><!-- .wbcom-welcome-main-wrapper -->
</div><!-- .wbcom-tab-content -->