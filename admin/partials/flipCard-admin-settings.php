<?php
if (file_exists(dirname(dirname(__FILE__)).'/class.settings-api.php')) {
    require_once( dirname(dirname(__FILE__)).'/class.settings-api.php' );
}

/**
 * Provide a settings view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      0.1.0
 *
 * @package    flipCard
 * @subpackage flipCard/admin/partials
 */
if ( !function_exists( 'flipcard_admin_settings' ) ):
	function flipcard_admin_settings() {
		$sections = array(
			array(
				'id' => 'flipcard_basics',
				'title' => __( 'Basic Settings', 'flipcard' )
			),
			array(
				'id' => 'flipcard_advanced',
				'title' => __( 'Advanced Settings', 'flipcard' )
			),
			array(
				'id' => 'flipcard_others',
				'title' => __( 'Other Settings', 'wpuf' )
			)
		);

		$fields = array(
			'flipcard_basics' => array(
				array(
					'name' => 'text',
					'label' => __( 'Text Input', 'flipcard' ),
					'desc' => __( 'Text input description', 'flipcard' ),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __( 'Textarea Input', 'flipcard' ),
					'desc' => __( 'Textarea description', 'flipcard' ),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __( 'Checkbox', 'flipcard' ),
					'desc' => __( 'Checkbox Label', 'flipcard' ),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __( 'Radio Button', 'flipcard' ),
					'desc' => __( 'A radio button', 'flipcard' ),
					'type' => 'radio',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __( 'Multile checkbox', 'flipcard' ),
					'desc' => __( 'Multi checkbox description', 'flipcard' ),
					'type' => 'multicheck',
					'options' => array(
						'one' => 'One',
						'two' => 'Two',
						'three' => 'Three',
						'four' => 'Four'
					)
				),
				array(
					'name' => 'selectbox',
					'label' => __( 'A Dropdown', 'flipcard' ),
					'desc' => __( 'Dropdown description', 'flipcard' ),
					'type' => 'select',
					'default' => 'no',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'password',
					'label' => __( 'Password', 'flipcard' ),
					'desc' => __( 'Password description', 'flipcard' ),
					'type' => 'password',
					'default' => ''
				),
				array(
					'name' => 'file',
					'label' => __( 'File', 'flipcard' ),
					'desc' => __( 'File description', 'flipcard' ),
					'type' => 'file',
					'default' => ''
				),
				array(
					'name' => 'color',
					'label' => __( 'Color', 'flipcard' ),
					'desc' => __( 'Color description', 'flipcard' ),
					'type' => 'color',
					'default' => ''
				)
			),
		'flipcard_advanced' => array(
			array(
				'name' => 'text',
				'label' => __( 'Text Input', 'flipcard' ),
				'desc' => __( 'Text input description', 'flipcard' ),
				'type' => 'text',
				'default' => 'Title'
			),
			array(
				'name' => 'textarea',
				'label' => __( 'Textarea Input', 'flipcard' ),
				'desc' => __( 'Textarea description', 'flipcard' ),
				'type' => 'textarea'
			),
			array(
				'name' => 'checkbox',
				'label' => __( 'Checkbox', 'flipcard' ),
				'desc' => __( 'Checkbox Label', 'flipcard' ),
				'type' => 'checkbox'
			),
			array(
				'name' => 'radio',
				'label' => __( 'Radio Button', 'flipcard' ),
				'desc' => __( 'A radio button', 'flipcard' ),
				'type' => 'radio',
				'default' => 'no',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
			array(
				'name' => 'multicheck',
				'label' => __( 'Multile checkbox', 'flipcard' ),
				'desc' => __( 'Multi checkbox description', 'flipcard' ),
				'type' => 'multicheck',
				'default' => array( 'one' => 'one', 'four' => 'four' ),
				'options' => array(
					'one' => 'One',
					'two' => 'Two',
					'three' => 'Three',
					'four' => 'Four'
				)
			),
			array(
				'name' => 'selectbox',
				'label' => __( 'A Dropdown', 'flipcard' ),
				'desc' => __( 'Dropdown description', 'flipcard' ),
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
			array(
				'name' => 'password',
				'label' => __( 'Password', 'flipcard' ),
				'desc' => __( 'Password description', 'flipcard' ),
				'type' => 'password',
				'default' => ''
			),
			array(
				'name' => 'file',
				'label' => __( 'File', 'flipcard' ),
				'desc' => __( 'File description', 'flipcard' ),
				'type' => 'file',
				'default' => ''
			),
			array(
				'name' => 'color',
				'label' => __( 'Color', 'flipcard' ),
				'desc' => __( 'Color description', 'flipcard' ),
				'type' => 'color',
				'default' => ''
			)
		),
		'flipcard_others' => array(
			array(
				'name' => 'text',
				'label' => __( 'Text Input', 'flipcard' ),
				'desc' => __( 'Text input description', 'flipcard' ),
				'type' => 'text',
				'default' => 'Title'
			),
			array(
				'name' => 'textarea',
				'label' => __( 'Textarea Input', 'flipcard' ),
				'desc' => __( 'Textarea description', 'flipcard' ),
				'type' => 'textarea'
			),
			array(
				'name' => 'checkbox',
				'label' => __( 'Checkbox', 'flipcard' ),
				'desc' => __( 'Checkbox Label', 'flipcard' ),
				'type' => 'checkbox'
			),
			array(
				'name' => 'radio',
				'label' => __( 'Radio Button', 'flipcard' ),
				'desc' => __( 'A radio button', 'flipcard' ),
				'type' => 'radio',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
					)
			),
			array(
				'name' => 'multicheck',
				'label' => __( 'Multile checkbox', 'flipcard' ),
				'desc' => __( 'Multi checkbox description', 'flipcard' ),
				'type' => 'multicheck',
				'options' => array(
					'one' => 'One',
					'two' => 'Two',
					'three' => 'Three',
					'four' => 'Four'
				)
			),
			array(
				'name' => 'selectbox',
				'label' => __( 'A Dropdown', 'flipcard' ),
				'desc' => __( 'Dropdown description', 'flipcard' ),
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
			array(
				'name' => 'password',
				'label' => __( 'Password', 'flipcard' ),
				'desc' => __( 'Password description', 'flipcard' ),
				'type' => 'password',
				'default' => ''
			),
			array(
				'name' => 'file',
				'label' => __( 'File', 'flipcard' ),
				'desc' => __( 'File description', 'flipcard' ),
				'type' => 'file',
				'default' => ''
			),
			array(
				'name' => 'color',
				'label' => __( 'Color', 'flipcard' ),
				'desc' => __( 'Color description', 'flipcard' ),
				'type' => 'color',
				'default' => ''
			)
		)
	);
	$settings_api = wedevs_Settings_API::getInstance();
	//set sections and fields
	$settings_api->set_sections( $sections );
	$settings_api->set_fields( $fields );
	//initialize them
	$settings_api->admin_init();
}
endif;
//add_action( 'admin_init', 'flipcard_admin_settings' );



if ( !function_exists( 'flipcard_admin_menu' ) ):
	function flipcard_admin_menu() {
		add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', 'flipcard_plugin_page' );
	}
endif;
add_action( 'admin_menu', 'flipcard_admin_menu' );



/**
 * Display the plugin settings options page
 */
if ( !function_exists( 'flipcard_plugin_page' ) ):
	function flipcard_plugin_page() {
		$settings_api = new wedevs_Settings_API;
		echo '<div class="wrap">';
		settings_errors();
		$settings_api->show_navigation();
		$settings_api->show_forms();
		echo '</div>';
	}
endif;