<?php

/**
 * BuddyPress Lock CPT Settings.
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

$args = array(
	'public'              => true,
	'_builtin'            => false,
	'exclude_from_search' => false,
);
$cpts        = get_post_types($args, 'objects');
$locked_cpts = get_option('custom-post-types', true);
?>
<div class="wbcom-tab-content">
	<form action="options.php" method="POST">
		<?php
		settings_fields('custom-post-types');
		do_settings_sections('custom-post-types');
		?>
		<div class="wrap">
			<h3><?php esc_html_e('Custom Post Types Lock Settings', 'bp-lock'); ?></h3>
			<div class='bplock-cpt-settings-container'>
				<table class="form-table">
					<tbody>
						<!-- Custom Post Types List -->
						<tr>
							<th scope="row"><label for="bplock-cpt-list"><?php esc_html_e('Select Custom Post Types to Lock', 'bp-lock'); ?></label></th>
							<td>
								<select id="bplock-cpt-list" name="custom-post-types[]" multiple>
									<?php if (!empty($cpts)) { ?>
										<?php foreach ($cpts as $slug => $cpt) { ?>
											<?php $selected = (is_array($locked_cpts) && in_array($slug, $locked_cpts)) ? 'selected' : ''; ?>
											<option value="<?php echo esc_attr($slug); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($cpt->label); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
								<p class="description"><?php esc_html_e('Select the custom post types that you wish to restrict access for logged-out users.', 'bp-lock'); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
				<?php submit_button(); ?>
			</div>
		</div>
	</form>
</div>