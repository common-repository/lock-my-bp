<?php

/**
 * BuddyPress Lock Support Tab Content.
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
	<div class="wbcom-faq-admin-setting">
		<div class="wbcom-admin-title-section">
			<h3><?php esc_html_e('Have some questions?', 'bp-lock'); ?></h3>
		</div>
		<div class="wbcom-faq-support wbcom-faq-admin-settings-block">
			<div id="wbcom-faq-settings-section">
				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion">
							<?php esc_html_e('Does this plugin require another plugin?', 'bp-lock'); ?>
						</button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('This plugin does not require any specific plugin. Although this plugin supports BuddyPress, if active.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('How does this plugin work?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('This plugin allows the site administrator to secure components of BuddyPress (if active) and WordPress pages from non-logged in users.', 'bp-lock'); ?></p>
							<p><?php esc_html_e('You can lock down WordPress Pages and any BuddyPress Component and have some content displayed, like a shortcode or a simple message.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('Why are the BuddyPress Components and Page Settings tabs not displayed in the plugin settings after activation?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('These setting tabs will be displayed after enabling the Lock option in the General tab on the plugin settings page.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('What happens if the BuddyPress "Groups" component is locked?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('If the BuddyPress "Groups" component is locked, the groups page will not display the groups list and will restrict access to the single group page, showing content set by the admin in Locked Content.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('What happens if the BuddyPress "Members" component is locked?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('If the BuddyPress "Members" component is locked, the members page will not display the members list and will restrict access to the single member page, showing content set by the admin in "Locked Content".', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('Will locked page content be displayed on any archive page?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('No, the archive page will not display any content of the locked page.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('Can we override the template files?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('Yes, the path to override is theme or child-theme/bp-lock/template.php', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('Will content related to locked components and pages be displayed in search results?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('No, content related to locked components or pages will not be displayed in search results.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>

				<div class="wbcom-faq-admin-row">
					<div class="wbcom-faq-section-row">
						<button class="wbcom-faq-accordion"><?php esc_html_e('How can I contact support?', 'bp-lock'); ?></button>
						<div class="wbcom-faq-panel">
							<p><?php esc_html_e('Please submit your details at ', 'bp-lock'); ?><a href="http://wbcomdesigns.com/contact" rel="nofollow" target="_blank"><?php esc_html_e('Wbcom Designs', 'bp-lock'); ?></a><?php esc_html_e(' for any queries related to the plugin and BuddyPress.', 'bp-lock'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wbcom-faq-promotion-row">
		<p><?php esc_html_e('To get more functionality, purchase the pro version. You can purchase the pro version from', 'bp-lock'); ?> <a href="https://wbcomdesigns.com/downloads/buddypress-private-community-pro/" target="_blank"><?php esc_html_e('here', 'bp-lock'); ?></a>.</p>
	</div>