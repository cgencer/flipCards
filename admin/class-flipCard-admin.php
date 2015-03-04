<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    flipCard
 * @subpackage flipCard/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    flipCard
 * @subpackage flipCard/admin
 * @author     Cem Gencer <email@example.com>
 */
class flipCard_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		define('VERSION', $version);

		add_action( 'admin_menu', array( $this, 'flipCard_Admin' ) );
		register_activation_hook( __FILE__, array( $this, 'flipCard_Options' ) );
		add_action( 'admin_init', array( $this, 'flipCard_AdminInit' ) );
	}

	/**
	 * Admin Settings Page
	 */
	public function flipCard_Admin() {

		add_options_page('flipCard Settings Page', 'flipCard', 'manage_options', 'flipcardsettings', array( $this, 'flipCard_Settings' ));
	}

	/**
	 * Admin Settings Page
	 */
	public function flipCard_Settings() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		} ?>
			<div id="">
				<form name="flipCard_options_form_settings_api" method="post" action="options.php">
					<?php settings_fields('flipCard_Settings'); ?>
					<?php do_settings_sections( 'flipCard_settings_section' ); ?>
					<input type="submit" value="Submit" class="button-primary" />
				</form>
			</div>
		<?php
	}

	/**
	 * Admin Settings Page
	 */
	public function flipCard_Options() {
		if( get_option('flipCard_options') === false ) {
			$new_options['content_type'] = 'ad_listing';
			$new_options['width'] = 4;
			$new_options['height'] = 3;
			add_option('flipCard_options', $new_options);
		}
	}

	/**
	 * Admin Settings Page
	 */
	public function flipCard_AdminInit() {
		register_setting( 'flipCard_settings', 'flipCard_options', 'flipCard_validate_options' );
		add_settings_section( 'flipCard_main_section', 'Main Settings', array( $this, 'flipCard_main_section_callback' ), 'flipCard_settings_section' );

		add_settings_field( 'content_type', 'Content Type', array( $this,'flipCard_text_field_contType'), 'flipCard_settings_section', 'flipCard_main_section', array('name' => 'content_type') );
		add_settings_field( 'width', 'Wall Width', array( $this,'flipCard_text_field_width'), 'flipCard_settings_section', 'flipCard_main_section', array('name' => 'width') );
		add_settings_field( 'height', 'Wall Height', array( $this,'flipCard_text_field_height'), 'flipCard_settings_section', 'flipCard_main_section', array('name' => 'height') );
	}

	public function flipCard_validate_options() {
		$input['version'] = VERSION;
		return $input;
	}

	public function flipCard_main_section_callback() {
		echo('<div>Ready... Set... Go....</div>');
	}

	public function flipCard_text_field_contType($data) {
		extract($data);
		$options = get_option('flipCard_options'); ?>
		<input type="text" name="flipCard_options[<?=$name;?>]" value="<?=esc_html( $options[$name] );?>" /><br />
		<?php
	}

	public function flipCard_text_field_width($data) {
		extract($data);
		$options = get_option('flipCard_options'); ?>
		<input type="text" name="flipCard_options[<?=$width;?>]" value="<?=esc_html( $options[$width] );?>" /><br />
		<?php
	}

	public function flipCard_text_field_height($data) {
		extract($data);
		$options = get_option('flipCard_options'); ?>
		<input type="text" name="flipCard_options[<?=$height;?>]" value="<?=esc_html( $options[$height] );?>" /><br />
		<?php
	}
	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/flipCard-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/flipCard-admin.js', array( 'jquery' ), $this->version, false );

	}

}
