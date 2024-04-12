<?php 

//  no direct access 
if( !defined('ABSPATH') ) : exit(); endif;


// Create Settings Menu Page Item 
add_action('admin_menu', 'nags_quoting_plugin_settings_menu');
function nags_quoting_plugin_settings_menu() {

    add_menu_page(
        __( 'Nags Quoting API Settings', NAGS_QUOTING_PLUGIN_NAME ),
        __( 'Nags Quoting API Settings', NAGS_QUOTING_PLUGIN_NAME ),
        'manage_options',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        'nags_quoting_plugin_settings_template_callback',
        'dashicons-rest-api',
        10
    );

    // add_submenu_page(
    //     NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
    //     __( 'Import Picqer Products To WooCommerce', NAGS_QUOTING_PLUGIN_NAME ),
    //     __( 'Import Picqer Products To WooCommerce', NAGS_QUOTING_PLUGIN_NAME ),
    //     'manage_options',
    //     NAGS_QUOTING_PLUGIN_NAME . '_import_page',
    //     'nags_quoting_import_template_callback',
    // );

    // add_submenu_page(
    //     NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
    //     __( 'Nags Quoting API Cron Status', NAGS_QUOTING_PLUGIN_NAME ),
    //     __( 'Nags Quoting API Cron Status', NAGS_QUOTING_PLUGIN_NAME ),
    //     'manage_options',
    //     NAGS_QUOTING_PLUGIN_NAME . '_cron_page',
    //     'nags_quoting_cron_template_callback',
    // );

}


// Settings Template Page 
function nags_quoting_plugin_settings_template_callback() {
    
    // adding bootstrap css
    echo '<link rel="stylesheet" href="' . NAGS_QUOTING_PLUGIN_URL . 'assets/css/bootstrap.min.css">';

    ?>

    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <div class="row">
            <form action="options.php" method="post">

                <?php 
                    // security field
                    settings_fields( NAGS_QUOTING_PLUGIN_NAME . '_settings_page' );

                    // save settings button 
                    submit_button( 'Save Settings' );

                    // output settings section here
                    do_settings_sections(NAGS_QUOTING_PLUGIN_NAME . '_settings_page');

                    ?>
                    <h6 class="text-center">
                        Star (*) marked ones are required
                    </h6>
                    <div class="text-right" style="text-align: right;">
                    <?php 
                        // save settings button
                        submit_button( 'Save Settings', 'primary', '', false );
                        ?>
                    </div>
            </form>
        </div>

    </div>

    <?php 

}
// Settings Template Page ends here


//  Settings Template 
add_action( 'admin_init', 'nags_quoting_settings_init' );
function nags_quoting_settings_init() {

    // Setup settings section 1
    add_settings_section(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section1',
        'Woocommerce API Credentials',
        '',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        array(
            'before_section' => '<div class="row"><div class="col-md-6"><div>',
            'after_section'  => '</div></div>',
        )
    );

    // Setup settings section 2
    add_settings_section(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section2',
        'Nags API Credentials',
        '',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        array(
            'before_section' => '<div class="col-md-6"><div>',
            'after_section'  => '</div></div></div>',
        )
    );

    // Setup settings section 3
    add_settings_section(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section3',
        'Google Maps API',
        '',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        array(
            'before_section' => '<div class="row"><div class="col-md-6"><div>',
            'after_section'  => '</div></div></div>',
        )
    );


// section 1 starts here

    // Register field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_website_url',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_website_url',
        __( 'Website URL*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_website_url_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section1'
    );

    // Register radio field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_key',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_key',
        __( 'Woocommerce API Consumer Key*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_woocommerce_api_consumer_key_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section1'
    );


    // Register text field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_secret',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_secret',
        __( 'Woocommerce API Consumer Secret*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_woocommerce_api_consumer_secret_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section1'
    );


// section 1 ends here


// section 2 starts here 

    // Register text field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_api_key',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_api_key',
        __( 'Nags API Key*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_api_key_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section2'
    );

    // Register text field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_vehicle_url',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_vehicle_url',
        __( 'Nags Vehicle URL*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_vehicle_url_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section2'
    );

    // Register text field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_search_url',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_search_url',
        __( 'Nags Search URL*', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_search_url_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section2'
    );

// section 2 ends here 



// section 3 starts here 

    // Register text field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_google_api_key',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_google_api_key',
        __( 'Google API Key', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_google_api_key_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section3'
    );

    // Register checkbox field
    register_setting(
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_use_google_api_key',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_key',
            'default' => ''
        )
    );

    // Add checkbox fields
    add_settings_field(
        NAGS_QUOTING_PLUGIN_NAME . '_use_google_api_key',
        __( 'Use Google Geocode API', NAGS_QUOTING_PLUGIN_NAME ),
        'nags_quoting_use_google_api_key_callback',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_page',
        NAGS_QUOTING_PLUGIN_NAME . '_settings_section3'
    );

// section 3 ends here 


}
// Settings Template ends here 




// Settings Template input fields starts here 

// section 1 starts here
function nags_quoting_website_url_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_website_url');
    ?>
    <input type="text" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_website_url" class="regular-text" placeholder='Website URL...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : site_url() . '/'; ?>" />
    <?php 
}

function nags_quoting_woocommerce_api_consumer_key_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_key');
    ?>
    <input type="text" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_woocommerce_api_consumer_key" class="regular-text" placeholder='Woocommerce API Consumer Key...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : ''; ?>" />
    <?php 
}


function nags_quoting_woocommerce_api_consumer_secret_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_woocommerce_api_consumer_secret');
    ?>
    <input type="password" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_woocommerce_api_consumer_secret" class="regular-text" placeholder='Woocommerce API Consumer Secret...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : ''; ?>" />
    <?php 
}

// section 1 ends here



// section 2 starts here

function nags_quoting_api_key_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_api_key');
    ?>
    <input type="password" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_api_key" class="regular-text" placeholder='Nags API Key...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : ''; ?>" />
    <?php 
}

function nags_quoting_vehicle_url_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_vehicle_url');
    ?>
    <input type="text" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_vehicle_url" class="regular-text" placeholder='Nags Vehicle URL...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : 'https://app.omegaedi.com/api/2.0/NagsVehicles/'; ?>" />
    <?php 
}

function nags_quoting_search_url_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_search_url');
    ?>
    <input type="text" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_search_url" class="regular-text" placeholder='Nags Search URL...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : 'https://app.omegaedi.com/api/2.0/NagsVehicles/search/'; ?>" />
    <?php 
}

// section 2 ends here



// section 3 starts here

function nags_quoting_google_api_key_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_google_api_key');
    ?>
    <input type="password" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_google_api_key" class="regular-text" placeholder='Google API Key...' value="<?php echo isset($nags_quoting_input_field) && $nags_quoting_input_field != '' ? $nags_quoting_input_field : ''; ?>" />
    <?php 
}

function nags_quoting_use_google_api_key_callback() {
    $nags_quoting_input_field = get_option(NAGS_QUOTING_PLUGIN_NAME . '_use_google_api_key');
    ?>
    <label>
        <input type="checkbox" name="<?php echo NAGS_QUOTING_PLUGIN_NAME; ?>_use_google_api_key" value="yes" <?php checked( 'yes', $nags_quoting_input_field ); ?>/> Please check to force to use Google API Key To Verify ZIP Code!
    </label>
    <?php 
}

// section 3 ends here

// Settings Template input fields ends here 