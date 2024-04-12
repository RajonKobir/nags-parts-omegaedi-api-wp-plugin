<?php


// initializing
$error_message = '';


// creating wp page function
if( !function_exists("nags_quoting_create_page") ){
    function nags_quoting_create_page( $post_title, $post_content = NULL, $page_template = NULL ) {

        $post_name = str_replace( ' ', '-', strtolower( trim( $post_title ) ) );

        $args = array(
            'post_name'      => $post_name,
            'post_type'      => 'page',
            'post_status'    => array( 'any', 'trash' ),
            'posts_per_page' => -1,
        );

        try {
            $query = get_posts($args);
        } catch(Exception $e) {
            $error_message .= $e->getMessage() . PHP_EOL;
        }
    
        // if got items
        if( isset($query[0]->ID) ){
            foreach( $query as $query_key => $query_value){
                if( $query_value->post_name == $post_name ){
                    $page_id = $query_value->ID;
                    if( $query_value->post_status != 'publish' ){
                        $args["ID"] = $page_id;
                        $args["post_status"] = 'publish';
                        wp_update_post($args);
                    }
                    update_post_meta( $page_id, '_wp_page_template', 'page-templates/nags-quoting.php' );
                    return $page_id;
                }
            }
        }

        $args["comment_status"] = 'closed';
        $args["ping_status"] = 'closed';
        $args["post_author"] = 1;
        $args["post_title"] = ucwords($post_title);
        $args["post_status"] = 'publish';
        $args["post_content"] = $post_content;
        $args["page_template"] = $page_template;
        
        $page_id = wp_insert_post( $args );
        update_post_meta( $page_id, '_wp_page_template', 'page-templates/nags-quoting.php' );
        
        return $page_id;
    }   
}  
// creating wp page function ends here


// creating wp page
try {
    $nags_quoting_page_id = nags_quoting_create_page( 'Vehicle', '', 'page-templates/nags-quoting.php' );
} catch(Exception $e) {
    $error_message .= $e->getMessage() . PHP_EOL;
}


// if( function_exists("nags_quoting_create_database_table") ){
//     nags_quoting_create_database_table();
// }
// function nags_quoting_create_database_table() {
//     global $wpdb;

//     $table_name = $wpdb->prefix . 'nags_quoting_customer_data';

//     $charset_collate = $wpdb->get_charset_collate();

//     $sql = "CREATE TABLE IF NOT EXISTS $table_name (
//         id mediumint(11) NOT NULL AUTO_INCREMENT,
//         ip_address tinytext NOT NULL,
//         ip_limit mediumint(3) NULL,
//         zip tinytext NULL,
//         year tinytext NULL,
//         make tinytext NULL,
//         model tinytext NULL,
//         style tinytext NULL,
//         contact tinytext NULL,
//         email tinytext NULL,
//         deductible tinytext NULL,
//         glasses tinytext NULL,
//         images longtext NULL,
//         time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
//         PRIMARY KEY  (id)
//     ) $charset_collate;";

//     require_once ABSPATH . 'wp-admin/includes/upgrade.php';
//     dbDelta( $sql );
// }


// showing error messages 
if($error_message != ''){
    add_action( 'admin_notices', 'nags_quoting_admin_warning');
    function nags_quoting_admin_warning(){
        echo $error_message;
    }
}