<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    flipCard
 * @subpackage flipCard/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    flipCard
 * @subpackage flipCard/includes
 * @author     Cem Gencer <o.cem.gencer@gmail.com>
 */
class flipCard {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'flipCard';
		$this->version = '0.1.0';
		$this->urlpath =  WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/';
		$this->path = WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/';
		define('FLIPCARD_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
	 * - Plugin_Name_i18n. Defines internationalization functionality.
	 * - Plugin_Name_Admin. Defines all hooks for the dashboard.
	 * - Plugin_Name_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flipCard-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flipCard-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-flipCard-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-flipCard-public.php';

		$this->loader = new flipCard_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new flipCard_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new flipCard_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new flipCard_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		add_shortcode('flipCard', array( __CLASS__, 'render_shortcode' ) );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public static function render_shortcode( $atts , $content ) {
		$atts = shortcode_atts( array(
			'col_md' => '4',
			'col_sm' => '6',
			'cover_photo' => FLIPCARD_URLPATH . 'assets/images/rotating_card_thumb.png',
			'profile_photo' => FLIPCARD_URLPATH . 'assets/images/creative_tim.jpg',
			'title' => __('flipCard' , 'flipCard' ),
			'sub_title' => __('Flipping cards' , 'flipCard' ),
			'address' => '--- adres ---',
			'company' => '- company -',
			'show_stars' => true,
			'star_count' => 5,
			'email' => '',
			'phone' => '',
			'website' => '',
			'twitter' => '',
			'facebook' => '',
			'googleplus' => '',
			'motto' => __('spot text' , 'flipCard' )

			), $atts, 'card' );

		if (!$content) {
			$content = __('=- content -=' , 'flipCard');
		}

		$html  ='<div class="col-md-'.$atts['col_md'].' col-sm-'.$atts['col_sm'].'">';
		$html .='		 <div class="flipcard-container">';
		$html .='			<div class="flipcard">';
		$html .='				<div class="front">';
		$html .='					<div class="cover">';
		$html .='						<img src="'.$atts['cover_photo'].'"/>';
		$html .='					</div>';
		$html .='					<div class="user">';
		$html .='						<img class="img-circle" src="'.$atts['profile_photo'].'"/>';
		$html .='					</div>';
		$html .='					<div class="content">';
		$html .='						<div class="main">';
		$html .='							<h3 class="name">'.$atts['title'].'</h3>';
		$html .='							<p class="profession">'.$atts['sub_title'].'</p>';
		if ($atts['location']) {
			$html .='							<h5><i class="fa fa-map-marker fa-link text-muted"></i>'.$atts['location'].'</h5>';
		}
		if ($atts['company']) {
			$html .='							<h5><i class="fa fa-building-o fa-fw text-muted"></i>'.$atts['company'].'</h5>';
		}
		if ($atts['email']) {
			$html .='							<h5><i class="fa fa-envelope-o fa-fw text-muted"></i> '.$atts['email'].'</h5>';
		}
		if ($atts['phone']) {
			$html .='							<h5><i class="fa fa-phone fa-fw text-muted"></i> '.$atts['phone'].'</h5>';
		}
		$html .='						</div>';
		$html .='						<div class="footer">';
		if ($atts['show_stars']) {
			$html .='							<div class="rating">';
			for ($i=0;$i<$atts['star_count'];$i++){
				$html .='								<i class="fa fa-star"></i>';			
			}
			$html .='							</div>';
		}
		$html .='						</div>';
		$html .='					</div>';
		$html .='				</div> <!-- end front panel -->';
		$html .='				<div class="back">';
		$html .='					<div class="header">';
		$html .='						<h5 class="motto">'.$atts['motto'].'</h5>';
		$html .='					</div> ';
		$html .='					<div class="content">';
		$html .='						<div class="main">';
		$html .=' 							'.$content;
		$html .='						</div>';
		$html .='					</div>';
		$html .='					<div class="footer">';
		$html .='						<div class="social-links text-center">';
		if ($atts['facebook']) {
			$html .='							<a href="'.$atts['facebook'].'" class="facebook" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>';
		}
		if ($atts['googleplus']) {
			$html .='							<a href="'.$atts['googleplus'].'" class="google" target="_blank"><i class="fa fa-google-plus fa-fw"></i></a>';
		}
		if ($atts['twitter']) {
			$html .='							<a href="'.$atts['twitter'].'" class="twitter" target="_blank"><i class="fa fa-twitter fa-fw"></i></a>';
		}			
		if ($atts['website']) {
			$html .='							<a href="'.$atts['website'].'" class="website" target="_blank"><i class="fa fa-link fa-fw text-muted"></i></a>';
		}
		$html .='						</div>';
		$html .='					</div>';
		$html .='				</div> <!-- end back panel -->';
		$html .='			</div> <!-- end card -->';
		$html .='		</div> <!-- end card-container -->';
		$html .='	</div> <!-- end col sm 3 -->';

		return $html;
		
	}
}
