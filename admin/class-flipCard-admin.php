<?php
if (file_exists(dirname(__FILE__).'/partials/flipCard-admin-settings.php')) {
  require_once( dirname(__FILE__).'/partials/flipCard-admin-settings.php' );
}
if (file_exists(dirname(__FILE__).'/mustache.php/mustache.php')) {
  require_once( dirname(__FILE__).'/mustache.php/mustache.php' );
}
if (file_exists(dirname(__FILE__).'/mustache-wordpress-cache/src/Mustache_Cache_WordPressCache.php')) {
  require_once( dirname(__FILE__).'/mustache-wordpress-cache/src/Mustache_Cache_WordPressCache.php' );
}

$mustache = new Mustache_Engine(array(
    'template_class_prefix' 		=> '__MyTemplates_',
//    'cache' 						=> \Khromov\Mustache_Cache\Mustache_Cache_WordPressCache(),				// dirname(__FILE__).'/tmp/cache/mustache',
    'cache' 						=> dirname(__FILE__).'/tmp/cache/mustache',
    'cache_file_mode' 				=> 0666, // Please, configure your umask instead of doing this :)
    'cache_lambda_templates' 		=> true,
    'helpers' 						=> array('i18n' => function($text) {
        // do something translatey here...
    }),
    'escape' 						=> function($value) {
        return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
    },
    'charset' 						=> 'UTF-8',
    'logger' 						=> new Mustache_Logger_StreamLogger('php://stderr'),
    'strict_callables' 				=> true,
    'pragmas' 						=> [Mustache_Engine::PRAGMA_FILTERS],
));

$loader = new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/views', array('extension' => 'tpl') );
$tpl = $loader->load('test'); // equivalent to `file_get_contents(dirname(__FILE__).'/views/foo.mustache');
echo $mustache->render($tpl);
//echo $m->render('Hello, {{planet}}!', array('planet' => 'World')); // "Hello, World!"

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

		add_options_page( 'flipCard Settings Page', 'flipCard', 'manage_options', 'flipcardsettings', array( $this, 'flipCard_Settings' ) );
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

	public function flipcard_admin_menu() {
		add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', 'flipcard_plugin_page' );
	}

	public function flipCard_AdminInit() {


/*
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
*/
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
