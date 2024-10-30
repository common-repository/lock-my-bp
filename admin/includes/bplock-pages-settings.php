<?php

/**
 * BuddyPress Lock Pages Tab Setting Content.
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
global $bplock;
$pages    = get_pages(); //phpcs:ignore
$bp_pages = '';
$wp_pages = array();
if (defined('BPLOCK_IS_BP_ACTIVE') && BPLOCK_IS_BP_ACTIVE) {
	$bp_pages = get_option('bp-pages');
}
foreach ($pages as $page) { //phpcs:ignore
	$wp_pages[$page->ID] = $page->post_title;
}
foreach ($wp_pages as $pgid => $pg_title) {
	if ($bp_pages && in_array($pgid, $bp_pages)) { //phpcs:ignore
		// unset( $wp_pages[$pgid] );
	}
}

$locked_pages = get_option('bplock-pages', true);
?>
<div class="wbcom-tab-content">
	<form action="options.php" method="POST">
		<?php
		settings_fields('bplock-pages');
		do_settings_sections('bplock-pages');
		?>
		<div class="wrap">
			<div class="wbcom-welcome-main-wrapper">
				<div class="wbcom-welcome-head">
					<h2 class="wbcom-welcome-title"><?php esc_html_e('Page Lock Settings', 'bp-lock'); ?></h2>
				</div><!-- .wbcom-welcome-head -->
				<div class='bplock-pages-settings-container'>
					<table class="form-table">
						<tbody>
							<!-- WordPress Pages List -->
							<tr>
								<th scope="row"><label for="bplock-pages-list"><?php esc_html_e('Select WordPress Pages to Lock', 'bp-lock'); ?></label></th>
								<td>
									<p class="wcpq-selection-tags">
										<a href="javascript:void(0);" id="bplock-select-all"><?php esc_html_e('Select All', 'bp-lock'); ?></a> /
										<a href="javascript:void(0);" id="bplock-unselect-all"><?php esc_html_e('Unselect All', 'bp-lock'); ?></a>
									</p>
									<select id="bplock-pages-list" name="bplock-pages[]" multiple>
										<?php if (!empty($wp_pages)) { ?>
											<?php foreach ($wp_pages as $pgid => $wp_page) { ?>
												<?php $selected = (is_array($locked_pages) && in_array($pgid, $locked_pages)) ? 'selected' : ''; ?>
												<option value="<?php echo esc_attr($pgid); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($wp_page); ?></option>
											<?php } ?>
										<?php } ?>
									</select>
									<p class="description"><?php esc_html_e('Select the WordPress pages that you wish to restrict access for logged-out users.', 'bp-lock'); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="bplock-submit">
						<?php submit_button(); ?>
					</div>
				</div>
			</div>
	</form>
</div>