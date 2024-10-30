<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Bp_Lock
 * @subpackage Bp_Lock/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bp_Lock
 * @subpackage Bp_Lock/admin
 * @author     Wbcom Designs <admin@wbcomdesigns.com>
 */
class Bp_Lock_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Plugin settings tabs.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $plugin_settings_tabs    Tabs of the plugin.
	 */
	public $plugin_settings_tabs;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name    The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function bplock_enqueue_styles()
	{
		if (isset($_SERVER['REQUEST_URI']) && stripos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), $this->plugin_name)) {
			wp_enqueue_style($this->plugin_name . '-font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css');
			wp_enqueue_style($this->plugin_name . '-selectize-css', plugin_dir_url(__FILE__) . 'css/selectize.css');
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/bp-lock-admin.css');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function bplock_enqueue_scripts()
	{
		if (isset($_SERVER['REQUEST_URI']) && stripos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), $this->plugin_name)) {
			wp_enqueue_script($this->plugin_name . '-selectize', plugin_dir_url(__FILE__) . 'js/selectize.min.js', array('jquery'), $this->version, true);
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/bp-lock-admin.js', array('jquery'), $this->version, true);
			wp_localize_script(
				$this->plugin_name,
				'bplock_admin_js_object',
				array(
					'ajaxurl' => admin_url('admin-ajax.php'),
				)
			);
		}
	}

	/**
	 * Add an admin options page.
	 *
	 * @since    1.0.0
	 */
	public function bplock_add_options_page()
	{
		if (empty($GLOBALS['admin_page_hooks']['wbcomplugins'])) {
			add_menu_page(esc_html__('WB Plugins', 'bp-lock'), esc_html__('WB Plugins', 'bp-lock'), 'manage_options', 'wbcomplugins', array($this, 'bplock_options_page_content'), 'dashicons-lightbulb', 59);
			add_submenu_page('wbcomplugins', esc_html__('General', 'bp-lock'), esc_html__('General', 'bp-lock'), 'manage_options', 'wbcomplugins');
		}
		add_submenu_page('wbcomplugins', esc_html__('BuddyPress Lock Settings', 'bp-lock'), esc_html__('BP Private Community', 'bp-lock'), 'manage_options', 'bp-lock', array($this, 'bplock_options_page_content'));
	}

	/**
	 * Hide all notices from the settings page.
	 *
	 * @since    1.0.0
	 */
	public function wbcom_hide_all_admin_notices_from_setting_page()
	{
		$wbcom_pages_array  = array('wbcomplugins', 'wbcom-plugins-page', 'wbcom-support-page', 'bp-lock');
		$wbcom_setting_page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) : '';

		if (in_array($wbcom_setting_page, $wbcom_pages_array, true)) {
			remove_all_actions('admin_notices');
			remove_all_actions('all_admin_notices');
		}
	}

	/**
	 * Create options page content.
	 *
	 * @since    1.0.0
	 */
	public function bplock_options_page_content()
	{
		$tab = filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING) ? filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING) : 'welcome';
?>
		<div class="wrap">
			<div class="wbcom-bb-plugins-offer-wrapper">
				<div id="wb_admin_logo">
					<a href="https://wbcomdesigns.com/downloads/buddypress-community-bundle/?utm_source=pluginoffernotice&utm_medium=community_banner" target="_blank">
						<img src="<?php echo esc_url(BPLOCK_PLUGIN_URL) . 'admin/wbcom/assets/imgs/wbcom-offer-notice.png'; ?>" alt="<?php esc_attr_e('Wbcom Offer', 'bp-lock'); ?>">
					</a>
				</div>
			</div>
			<div class="wbcom-wrap">
				<div class="blpro-header">
					<div class="wbcom_admin_header-wrapper">
						<div id="wb_admin_plugin_name">
							<?php esc_html_e('BuddyPress Private Community', 'bp-lock'); ?>
							<span>
								<?php
								/* translators: %s: */
								printf(esc_html__('Version %s', 'bp-lock'), esc_attr($this->version));
								?>
							</span>
						</div>
						<?php echo do_shortcode('[wbcom_admin_setting_header]'); ?>
					</div>
				</div>
				<div class="wbcom-admin-settings-page">
					<?php
					$this->bplock_plugin_settings_tabs();
					do_settings_sections($tab);
					?>
				</div>
			</div>
		</div>
<?php
	}

	/**
	 * Create tabs on the options page.
	 *
	 * @since    1.0.0
	 */
	public function bplock_plugin_settings_tabs()
	{
		$current_tab = filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING) ? filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING) : 'welcome';

		echo '<div class="wbcom-tabs-section"><div class="nav-tab-wrapper"><div class="wb-responsive-menu"><span>' . esc_html__('Menu', 'bp-lock') . '</span><input class="wb-toggle-btn" type="checkbox" id="wb-toggle-btn"><label class="wb-toggle-icon" for="wb-toggle-btn"><span class="wb-icon-bars"></span></label></div><ul>';
		foreach ($this->plugin_settings_tabs as $tab_key => $tab_caption) {
			$active = $current_tab === $tab_key ? 'nav-tab-active' : '';
			echo '<li class=' . esc_attr($tab_key) . '><a class="nav-tab ' . esc_attr($active) . '" href="?page=' . esc_attr($this->plugin_name) . '&tab=' . esc_attr($tab_key) . '">' . esc_html($tab_caption) . '</a></li>';
		}
		echo '</ul></div></div>';
	}

	/**
	 * Register General Settings.
	 *
	 * @since    1.0.0
	 */
	public function bplock_general_settings()
	{
		$this->plugin_settings_tabs['welcome'] = esc_html__('Welcome', 'bp-lock');
		add_settings_section('bplock_welcome_settings', ' ', array($this, 'bplock_welcome_page_content'), 'welcome');
		$this->plugin_settings_tabs[$this->plugin_name] = esc_html__('General', 'bp-lock');
		add_settings_section('bplock_general_settings', ' ', array($this, 'bplock_general_settings_content'), $this->plugin_name);
	}

	/**
	 * Welcome Tab Content.
	 *
	 * @since    1.0.0
	 */
	public function bplock_welcome_page_content()
	{
		if (file_exists(BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-welcome-page.php')) {
			require_once BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-welcome-page.php';
		}
	}

	/**
	 * General Tab Content.
	 *
	 * @since    1.0.0
	 */
	public function bplock_general_settings_content()
	{
		if (file_exists(BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-general-settings.php')) {
			require_once BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-general-settings.php';
		}
	}

	/**
	 * Register WP Pages Settings.
	 *
	 * @since    1.0.0
	 */
	public function bplock_wp_pages_settings()
	{
		$general_settings = get_option('bplock_general_settings', true);
		if (isset($general_settings['bplock-pages'])) {
			$this->plugin_settings_tabs['pages'] = esc_html__('Pages', 'bp-lock');
			register_setting('bplock-pages', 'bplock-pages');
			add_settings_section('bplock-pages', ' ', array($this, 'bplock_wp_pages_settings_content'), 'pages');
		}
	}

	/**
	 * WP Pages Tab Content.
	 *
	 * @since    1.0.0
	 */
	public function bplock_wp_pages_settings_content()
	{
		if (file_exists(BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-pages-settings.php')) {
			require_once BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-pages-settings.php';
		}
	}

	/**
	 * Register Support Tab.
	 *
	 * @since    1.0.0
	 */
	public function bplock_support()
	{
		$this->plugin_settings_tabs['bp-lock-support'] = esc_html__('Support', 'bp-lock');
		register_setting('bp-lock-support', 'bp-lock-support');
		add_settings_section('bp-lock-support-section', ' ', array($this, 'bplock_support_content'), 'bp-lock-support');
	}

	/**
	 * Support Tab Content.
	 *
	 * @since    1.0.0
	 */
	public function bplock_support_content()
	{
		if (file_exists(BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-support.php')) {
			require_once BPLOCK_PLUGIN_PATH . 'admin/includes/bplock-support.php';
		}
	}

	/**
	 * Register General tab settings.
	 *
	 * @since    1.0.0
	 */
	public function bplock_register_settings_function()
	{
		register_setting('bplock_general_settings', 'bplock_general_settings');
	}
}
