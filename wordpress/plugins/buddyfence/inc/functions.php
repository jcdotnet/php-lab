<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function buddyfence_template() { 
    do_action('buddyfence_before_template'); ?>
    <div class="buddyfence-message">
        <h3 class="buddyfence-message-header"> <?php _e('Restricted area', 'buddyfence'); ?> </h3>    
        <p class="buddyfence-message-text"> 
            <?php _e('Only logged-in users are allowed to view this page. Please ', 'buddyfence'); ?> 
            <a href="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>"> <?php _e('log in', 'buddyfence'); ?> </a>
        </p>
    </div> <?php
    do_action('buddyfence_after_template');
}

function buddyfence_check_components($options) {
    return bp_is_current_component('members') && in_array('members', $options['components']) ||
            bp_is_current_component('activity') && in_array('activity', $options['components']) ||
            bp_is_current_component('groups') && in_array('groups', $options['components']) ||
            bp_is_user() && in_array( 'user_page', $options['components'] );    
}

function buddyfence_display_template () {
    
    $options = buddyfence_get_components_options(); 

    if ( ! is_user_logged_in() && ! bp_is_blog_page() && !bp_is_activation_page() && ! bp_is_register_page() && !empty($options['use_template']) )  {
           if (buddyfence_check_components($options))            
                add_filter('the_content', 'buddyfence_template');               
    }
}
add_action( 'wp_head', 'buddyfence_display_template');        

function buddyfence_get_component_name($component) {
    
    switch ($component) {
        case "activity":
            _e('Activity', 'buddyfence'); break;
        case "groups":
            _e('Groups', 'buddyfence'); break;
        case "members":
            _e('Members', 'buddyfence'); break;
    }
}

function buddyfence_get_components($options) {
	
    $components = array(
            'components'    => isset($options['components']) ? $options['components'] : array ( ),
            'redirection'   => isset($options['redirection']) ? $options['redirection'] : 'login-back',
            'custom_page'   => isset($options['custom_page']) ? $options['custom_page'] : '',
            'custom_url'    => isset($options['custom_url']) ? $options['custom_url'] : '',
            'use_template'  => isset($options['use_template']) ? $options['use_template'] : '0'
		);        
	return $components;		
}

function buddyfence_get_components_options() {
  
    $options = array(); 	
    
	try {
        $from_db= get_option( 'buddyfence_components_options');        
	    $options = buddyfence_get_components( $from_db);     
    } catch ( Exception $e ) {}	
        
	return $options;	
}

function buddyfence_sanitize_components($input) {
    
    $options = buddyfence_get_components_options();
      
    if ( isset( $input['components'] ) ) $options['components'] = array_map( function( $val ) { return sanitize_text_field( $val );}, $input['components']  );
    else $options['components'] = array();
    
    if ( isset( $input['redirection'] ) ) $options['redirection']   = sanitize_text_field( $input['redirection'] );
    if ( isset( $input['custom_page'] ) ) $options['custom_page']   = sanitize_text_field( $input['custom_page']);
    if ( isset( $input['custom_url'] ) ) $options['custom_url']     = esc_url_raw( $input['custom_url']);
    if ( isset( $input['use_template'] ) ) $options['use_template'] = sanitize_text_field( $input['use_template'] );
    
    return $options;
}

function buddyfence_template_redirect() {
    
    $options = buddyfence_get_components_options(); 

    if( ! is_user_logged_in() && ! bp_is_blog_page() && !bp_is_activation_page() && ! bp_is_register_page() && empty($options['use_template']) ) {    
        if (buddyfence_check_components($options)) {
            if (isset($options['redirection']) && $options['redirection'] === "login-back")
                auth_redirect(); 
            else if (isset($options['redirection']) && $options['redirection'] === "login") {
                wp_redirect( wp_login_url() );
                exit();
            } else if (isset($options['redirection']) && $options['redirection'] === "home") {
                wp_redirect( home_url() );
                exit();
            } else if (isset($options['redirection']) && $options['redirection'] === "custom" && !empty($options['custom_page']) ) {
                if (get_queried_object_id() === (int)($options['custom_page'])) {
                    auth_redirect();
                } else {     
                    wp_redirect(get_permalink( $options['custom_page'] ));
                }
                exit();
            } else if (isset($options['redirection']) && $options['redirection'] === "url" && !empty($options['custom_url']) ) { 
                wp_redirect( esc_url($options['custom_url'] ) );
                exit();
            }
        }
    }
}
add_action( 'template_redirect', 'buddyfence_template_redirect' );