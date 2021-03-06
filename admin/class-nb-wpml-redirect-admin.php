<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.strong.no
 * @since      1.0.0
 *
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/admin
 * @author     AMBIO Strong AS <support@strong.no>
 */
class Nb_Wpml_Redirect_Admin {

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

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nb_Wpml_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nb_Wpml_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nb-wpml-redirect-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nb_Wpml_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nb_Wpml_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nb-wpml-redirect-admin.js', array( 'jquery' ), $this->version, false );

	}
    
    
    // ==========================================
    /*
        login according to users language settings
        
        if users language is nb then use //DOMAIN/?lang=nb
        if users language is en then use //DOMAIN/?lang=en

        what about the default language? if en then there is no ?lang=en
        if users language is en then use //DOMAIN/
        
    */
    
    function login_redirect( $redirect_to, $requested_redirect_to = null, $user = null ){

        global $user;
        global $sitepress;
              
        $current_language = $sitepress->get_current_language();
        _log("> login_redirect()");
        _log($current_language);
        
//      _log( get_class($user) ); // WP_Error or WP_User    
        if ( !is_wp_error($user) ) {
            _log($user->user_login);  
            _log($user->user_email);  
            _log($user->user_status);  
            _log($user->display_name);  
            _log($user->roles);  
            
        } else {
            _log("no user object");
        }
        

        _log($sitepress->get_default_language() );
        _log($redirect_to);
        return site_url( 'wp-admin/' );
        
    }

}
