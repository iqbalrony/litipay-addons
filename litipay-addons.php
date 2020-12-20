<?php
/*
Plugin Name: Litipay Addons
Plugin URI: https://example.com
Description: Litipay Addons plugin is a support plugin for Elementor WordPress plugin.
Author: iqbalrony
Version: 1.0
Author URI: www.iqbalrony.com
Text Domain: litipay-addons
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define('LITIPAY_ADDONS_VERSION', '1.0.0');

if (!defined('LITIPAY_ADDONS_PATH')) {
	define('LITIPAY_ADDONS_PATH', plugin_dir_path(__FILE__));
}
if (!function_exists('litipay_addons_get_plugin_path')) {
	function litipay_addon_get_plugin_path($file) {
		return LITIPAY_ADDONS_PATH . $file;
	}
}
if (!function_exists('litipay_addons_plugin_url')) {
	function litipay_addon_plugin_url($url) {
		return plugins_url($url, __FILE__);
	}
}
if (!defined('HAPPYADDON_ELEMENTOR_ASSETS')) {
	define('HAPPYADDON_ELEMENTOR_ASSETS', plugins_url('/inc/elementor/assets/', __FILE__));
}


/**
 * Main Elementor Test Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class LitipayAddons {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.5.1';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var LitipayAddons The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return LitipayAddons An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'litipay-addons' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Include plugin files
		if ( did_action( 'elementor/loaded' ) ) {
			$this->includes();
		}
		// Register Widget Styles & Scripts
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/frontend/before_enqueue_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'litipay-addons' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'litipay-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'litipay-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'litipay-addons' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'litipay-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'litipay-addons' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Include files
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function includes() {

		// Include Widget files
		include_once __DIR__ . '/inc/functions.php';

	}

	public function widget_styles() {

		wp_enqueue_style(
			'litipay-addons',
			litipay_addon_plugin_url('assets/css/litipay.css'),
			['slick', 'slick-theme'],
			self::VERSION
		);

	}

	public function widget_scripts() {

		wp_enqueue_script(
			'litipay-addons',
			litipay_addon_plugin_url('assets/js/litipay.js'),
			[ 'jquery','jquery-slick' ],
			self::VERSION,
			true
		);

	}

	/**
	 * Register widget
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_widgets() {

		// Include Widget files
		include_once __DIR__ . '/widgets/lp-carousel.php';
		include_once __DIR__ . '/widgets/lp-carousel-2.php';

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \LitipayAddons\Widget\LP_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \LitipayAddons\Widget\LP_Carousel_2() );

	}

}

LitipayAddons::instance();
