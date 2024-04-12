<?php
/*
 * Plugin Name: Nags Quoting
 * Plugin URI: 
 * Description: Nags quoting screen using nags API
 * Author: Rajon Kobir
 * Version: 1.0.0
 * Author URI: https://github.com/RajonKobir
 * Text Domain: NagsQuoting
 * License: GPL2+
 * Domain Path: 
*/


//  no direct access 
if( !defined('ABSPATH') ) : exit(); endif;


// if no woocommerce then return
// if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;


// Define plugin constants 
define( 'NAGS_QUOTING_PLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'NAGS_QUOTING_PLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );
define( 'NAGS_QUOTING_PLUGIN_NAME', 'nags_quoting' );


// admin or not
if( is_admin() ) {
    // adding settings link into plugin list page
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nags_quoting_settings_link' );
    function nags_quoting_settings_link( array $links ) {
        $settings_url = get_admin_url() . "admin.php?page=nags_quoting_settings_page";
        $settings_link = '<a href="' . $settings_url . '" aria-label="' . __('View Nags Quoting Settings', 'NagsQuoting') . ' ">' . __('Settings', 'NagsQuoting') . '</a>';
		$action_links = array(
			'settings' => $settings_link,
		);
		return array_merge( $action_links, $links );
    }
    // admin settings page
    require_once NAGS_QUOTING_PLUGIN_PATH . 'includes/settings/settings.php';
}
// admin or not ends here


// register activation hook
register_activation_hook(
	__FILE__,
	'nags_quoting_activation_function'
);
function nags_quoting_activation_function(){
    require_once NAGS_QUOTING_PLUGIN_PATH . 'install.php';
}


// register deactivation hook
register_deactivation_hook(
	__FILE__,
	'nags_quoting_deactivation_function'
);
function nags_quoting_deactivation_function(){
    require_once NAGS_QUOTING_PLUGIN_PATH . 'uninstall.php';
}


// filtering theme's page templates
add_filter( 'theme_page_templates', 'nags_quoting_register_custom_template' );
function nags_quoting_register_custom_template( $templates ) {
    $templates[ 'page-templates/nags-quoting.php' ] = __('Nags Quoting', 'NagsQuoting');
    return $templates;
}
// filtering theme's page templates ends here


// load custom page templates
add_filter( 'template_include', 'nags_quoting_load_custom_template' );
function nags_quoting_load_custom_template( $template ) {
    if ( is_page_template( 'page-templates/nags-quoting.php' ) ) {
        // Define the path to the template file in the plugin.
      
        $new_template = NAGS_QUOTING_PLUGIN_PATH . 'page-templates/nags-quoting.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }    
    return $template;
}
// load custom page templates ends here



// dequeuing styles and scripts
add_action('wp_enqueue_scripts', 'nags_quoting_custom_dequeue_script');
function nags_quoting_custom_dequeue_script() {

    wp_register_style( 'nags-quoting-bootstrap-css', NAGS_QUOTING_PLUGIN_URL . 'assets/css/bootstrap.min.css', '', rand());
    wp_register_style( 'nags-quoting-image-uploader-css', NAGS_QUOTING_PLUGIN_URL . 'assets/css/image-uploader.css', '', rand());
    wp_register_style( 'nags-quoting-image-uploader-css', NAGS_QUOTING_PLUGIN_URL . 'assets/css/image-uploader-custom.css', '', rand());
    wp_register_style( 'nags-quoting-jquery-ui-css', NAGS_QUOTING_PLUGIN_URL . 'assets/css/jquery-ui.css', '', rand());
    wp_register_style( 'nags-quoting-custom-css', NAGS_QUOTING_PLUGIN_URL . 'assets/css/nags-quoting-custom.css', '', rand());

    wp_register_script('nags-quoting-jquery-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/jquery.min.js', array(), '', true);
    wp_register_script('nags-quoting-jquery-ui-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/jquery-ui.js', array(), '', true);
    wp_register_script('nags-quoting-bootstrap-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/bootstrap.bundle.min.js', array(), '', true);
    wp_register_script('nags-quoting-image-uploader-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/image-uploader.js', array(), '', true);
    wp_register_script('nags-quoting-sweetalert2-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/sweetalert2@11.js', array(), '', true);
    wp_register_script('nags-quoting-main-js', NAGS_QUOTING_PLUGIN_URL . 'assets/js/main.js', array(), '', true);

    $nags_post_url =  NAGS_QUOTING_PLUGIN_URL . 'post.php';
    $use_google_api_key = get_option(NAGS_QUOTING_PLUGIN_NAME . '_use_google_api_key');

    wp_localize_script('nags-quoting-main-js', 'nags_quoting_plugin_data', array(
        'nags_post_url' => $nags_post_url,
        'use_google_api_key' => $use_google_api_key,
    ));


    wp_dequeue_style('thegem-style');
    wp_deregister_style('thegem-style');

    wp_dequeue_style('thegem-child-style');
    wp_deregister_style('thegem-child-style');


    if ( is_page_template( 'page-templates/nags-quoting.php' ) ) {

        wp_enqueue_style('nags-quoting-bootstrap-css');
        wp_enqueue_style('nags-quoting-image-uploader-css');
        wp_enqueue_style('nags-quoting-jquery-ui-css');
        wp_enqueue_style('nags-quoting-custom-css');
        
        if( ! wp_script_is( 'nags-quoting-jquery', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-jquery-js');
        }
        
        if( ! wp_script_is( 'nags-quoting-jquery-ui-js', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-jquery-ui-js');
        }
        
        if( ! wp_script_is( 'nags-quoting-bootstrap-js', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-bootstrap-js');
        }
        
        if( ! wp_script_is( 'nags-quoting-image-uploader-js', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-image-uploader-js');
        }
        
        if( ! wp_script_is( 'nags-quoting-sweetalert2-js', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-sweetalert2-js');
        }
        
        if( ! wp_script_is( 'nags-quoting-main-js', 'enqueued' ) ) {
            wp_enqueue_script('nags-quoting-main-js');
        }
        
        // if( wp_script_is( 'thegem-style', 'enqueued' ) ) {
        //     wp_dequeue_style('thegem-style');
        //     wp_deregister_style('thegem-style');
        // }
        
        // if( wp_script_is( 'thegem-child-style', 'enqueued' ) ) {
        //     wp_dequeue_style('thegem-child-style');
        //     wp_deregister_style('thegem-child-style');
        // }

        // wp_dequeue_style('thegem-preloader'); 
        // wp_dequeue_style('thegem-reset'); 
        // wp_dequeue_style('thegem-grid'); 
        // wp_dequeue_style('thegem-header'); 
        // wp_dequeue_style('thegem-style'); 
        // wp_dequeue_style('thegem-child-style'); 
        // wp_dequeue_style('thegem-layout-perspective'); 
        // wp_dequeue_style('thegem-widgets'); 
        // wp_deregister_style('wp-mediaelement');
        // wp_dequeue_script('autoptimize_js_exclude'); 

        $css_file_name = 'thegem-style';
        global $wp_styles;
        $style_array = array();
        // Runs through the queue styles
        foreach($wp_styles->queue as $handle) :
            if( $css_file_name == $handle ) {
                $style_array[] = $handle;
            }
        endforeach;
        wp_dequeue_style($style_array);
        wp_deregister_style($style_array);



    }
}
// dequeuing styles and scripts ends here


// custom image upload
function nags_quoting_custom_image_file_upload( $api_image_url, $api_image_name ) {

	// it allows us to use download_url() and wp_handle_sideload() functions
	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	// download to temp dir
	$temp_file = download_url( $api_image_url );

	if( is_wp_error( $temp_file ) ) {
		return false;
	}

    // $image_full_name = basename( $temp_file );
    $image_full_name = basename( $api_image_url );
    $image_name_array = explode( '.', $image_full_name);
    $image_name = $image_name_array[0];
    $image_extension = $image_name_array[1];

    $updated_image_full_name = $api_image_name . '.' . $image_extension;

	// move the temp file into the uploads directory
	$file = array(
		'name'     => $updated_image_full_name,
		'type'     => mime_content_type( $temp_file ),
		'tmp_name' => $temp_file,
		'size'     => filesize( $temp_file ),
	);
	$sideload = wp_handle_sideload(
		$file,
		array(
            // no needs to check 'action' parameter
			'test_form'   => false 
		)
	);

	if( ! empty( $sideload[ 'error' ] ) ) {
		// you may return error message if you want
		return false;
	}

	// it is time to add our uploaded image into WordPress media library
	$attachment_id = wp_insert_attachment(
		array(
			'guid'           => $sideload[ 'url' ],
			'post_mime_type' => $sideload[ 'type' ],
			'post_title'     => basename( $sideload[ 'file' ] ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$sideload[ 'file' ]
	);

	if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return false;
	}

	// update medatata, regenerate image sizes
	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	wp_update_attachment_metadata(
		$attachment_id,
		wp_generate_attachment_metadata( $attachment_id, $sideload[ 'file' ] )
	);

    @unlink( $temp_file );

	return $attachment_id;

}
// custom image upload ends here