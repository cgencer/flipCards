<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    flipCard
 * @subpackage flipCard/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    flipCard
 * @subpackage flipCard/public
 * @author     Cem Gencer <o.cem.gencer@gmail.com>
 */
class flipCard_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $flipCard    The ID of this plugin.
	 */
	private $flipCard;

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
	 * @param      string    $flipCard       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $flipCard, $version ) {

		$this->flipCard = $flipCard;
		$this->version = $version;
		$this->urlpath =  WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/';
		$this->path = WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in flipCard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The flipCard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/lib/bootstrap/dist/css/bootstrap.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'js/lib/font-awesome/css/font-awesome.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->flipCard, plugin_dir_url( __FILE__ ) . 'css/flipCard-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in flipCard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The flipCard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

//		wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/lib/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->flipCard, plugin_dir_url( __FILE__ ) . 'js/flipCard-public.js', array( 'jquery' ), $this->version, false );

	}

}
