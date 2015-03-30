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
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );
include PLUGIN_DIR . "admin_init.php";

class flipCard_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		define('VERSION', $version);

		add_action( 'admin_menu', array( $this, 'flipCard_Admin' ) );
		register_activation_hook( __FILE__, array( $this, 'flipCard_Options' ) );
		add_action( 'admin_init', array( $this, 'flipCard_AdminInit' ) );
	}

	public function flipCard_Admin() {

		add_options_page('flipCard Settings Page', 'flipCard', 
						'manage_options', 
						'flipcardsettings', 
						array( $this, 'flipCard_Settings' ));
	}

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

	public function flipCard_Options() {
		if( get_option('flipCard_options') === false ) {
			$new_options['content_type'] = 'ad_listing';
			$new_options['width'] = 4;
			$new_options['height'] = 3;
			add_option('flipCard_options', $new_options);
		}
	}

	public function flipCard_AdminInit() {
		register_setting( 'flipCard_settings', 'flipCard_options', 'flipCard_validate_options' );

		add_settings_field( 'template_name', 'Template', 
							array( $this,'flipCard_pulldown_contType'), 
							'flipCard_settings_section', 
							'flipCard_main_section', 
							array('name' => 'content_type') );

		add_settings_section( 'flipCard_main_section', 'Main Settings', 
							array( $this, 'flipCard_main_section_callback' ), 
							'flipCard_settings_section' );

		add_settings_field( 'content_type', 'Content Type', 
							array( $this,'flipCard_text_field_contType'), 
							'flipCard_settings_section', 
							'flipCard_main_section', 
							array('name' => 'content_type') );

		add_settings_field( 'width', 'Wall Width', 
							array( $this,'flipCard_text_field_width'), 
							'flipCard_settings_section', 
							'flipCard_main_section', 
							array('name' => 'width') );

		add_settings_field( 'height', 'Wall Height', 
							array( $this,'flipCard_text_field_height'), 
							'flipCard_settings_section', 
							'flipCard_main_section', 
							array('name' => 'height') );
	}

	public function flipCard_validate_options() {
		$input['version'] = VERSION;
		return $input;
	}

	public function flipCard_main_section_callback() {
		echo('<div>Settings</div>');
	}

	public function flipCard_text_field_contType($data) {
		extract($data);
		$options = get_option('flipCard_options'); ?>
		<input type="text" name="flipCard_options[<?=$name;?>]" value="<?=esc_html( $options[$name] );?>" /><br />
		<?php
	}

	public function flipCard_pulldown_contType($data) {
		extract($data);
		$options = get_option('flipCard_options'); ?>

    	<select id="time_options" name="sandbox_theme_input_examples[time_options]">
			<option value="-default-">Select a template...</option><?php
			$dir = dirname(plugin_dir_path( __FILE__ )) . '/templates';
			$dh  = opendir($dir);
			while (false !== ($filename = readdir($dh))) {
			if(!($filename == "." || $filename == "..")) {
				$fnx = substr($filename, 0 , (strrpos($filename, ".")));
				?><option value="<?=$filename?>"><?=$fnx?></option><?php
				}
			}
			?><option value="-new-">Create new template</option>
		</select>
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

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/flipCard-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codemirror.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/flipCard-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codemirror.js', array(), $this->version, false );
	}

}
