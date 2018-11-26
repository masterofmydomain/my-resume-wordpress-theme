<?php
/**
 * This file includes the theme functions.
 *
 * @package MY Resume
 * @since MY Resume 1.0
 */


/*
-------------------------------------------------------------------------------------------------------
  Theme Setup
-------------------------------------------------------------------------------------------------------
*/
if ( ! function_exists('myr_setup') ) :
  function myr_setup() {
    add_theme_support( 'title-tag' );
    register_nav_menu( 'primary', __( 'Primary Menu', 'myr_primary_menu' ) );
  }
endif; 
add_action( 'after_setup_theme', 'myr_setup' );


function myr_register_theme_customizer($wp_customize) {
  $wp_customize->add_section( 'objective_section' , array(
    'title'    => __('Objective','myr'),
    'priority' => 80
  ) );
  $wp_customize->add_setting( 'objective_textarea', array(
     'default'           => __( 'Example Objective', 'myr' ),
     'sanitize_callback' => 'sanitize_text'
  ) );
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'objective_section',
      array(
        'label'    => __( 'Objective:', 'myr' ),
        'section'  => 'objective_section',
        'settings' => 'objective_textarea',
        'type'     => 'textarea'
      )
    )
  );
  function sanitize_text( $text ) {
    return sanitize_text_field( $text );
  }
}
add_action( 'customize_register', 'myr_register_theme_customizer' );



/*
-------------------------------------------------------------------------------------------------------
  Use jQuery 3.3.1
-------------------------------------------------------------------------------------------------------
*/
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );


/*
-------------------------------------------------------------------------------------------------------
  Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists('myr_enqueue_scripts') ) {
  /** Function myr_enqueue_scripts */
  function myr_enqueue_scripts() {
    // Enqueue Styles.
    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,800');
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css');
    wp_enqueue_style( 'my-resume-style', get_stylesheet_uri() );
    wp_enqueue_style( 'my-resume-style-modals', get_template_directory_uri() . '/css/modal.css', array(), '1.0.0' );
    wp_enqueue_style( 'my-resume-style-timeline', get_template_directory_uri() . '/css/timeline.css', array(), '1.0.0' );

    // Register Scripts.
    // wp_register_script( 'jquery-colourbrightness', get_template_directory_uri() . '/js/jquery.colourbrightness.js', array( 'jquery' ), '1.0' );

    // Enqueue Scripts.
    // wp_enqueue_script( 'jquery-slim', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ) );
    // wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap4-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'wpcf7-js', get_template_directory_uri() . '/js/timeline.js' , array( 'jquery' ) );
    wp_enqueue_script( 'mobile-js', get_template_directory_uri() . '/js/mobile.js' , array( 'jquery' ) );
    wp_enqueue_script( 'wpcf7-js', get_template_directory_uri() . '/js/wpcf7.js' , array( 'jquery' ) );
  }
}
add_action( 'wp_enqueue_scripts', 'myr_enqueue_scripts' );


if ( ! function_exists( 'myr_enqueue_admin_scripts' ) ) {
  /** Function myr_enqueue_admin_scripts */
  function myr_enqueue_admin_scripts($hook) {
    if ( 'themes.php' !== $hook ) {
      return;
    }
    wp_enqueue_script( 'my-resume-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
  }
}
add_action( 'admin_enqueue_scripts', 'myr_enqueue_admin_scripts' );


/*
-------------------------------------------------------------------------------------------------------
  Include Scripts
-------------------------------------------------------------------------------------------------------
*/
