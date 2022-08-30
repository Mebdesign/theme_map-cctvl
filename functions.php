<?php 

add_action('wp_enqueue_scripts', 'theme_styles');
function theme_styles() { 
	// Load all of the styles that need to appear on all pages
    wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" );
	wp_enqueue_style( 'nucleo-icons', get_template_directory_uri() . '/assets/css/nucleo-icons.css' );
    wp_enqueue_style( 'nucleo-svg', get_template_directory_uri() . '/assets/css/nucleo-svg.css' );
    wp_enqueue_style( 'material-dashboard', get_template_directory_uri() . '/assets/css/material-dashboard.css' );
	wp_enqueue_style( 'material-icons', "https://fonts.googleapis.com/icon?family=Material+Icons+Round" );

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );
function theme_scripts() {
    // Load all of the scripts that need to appear on all pages
    wp_enqueue_script( 'kit-fontawesome', "https://kit.fontawesome.com/42d5adcbca.js" );
    wp_enqueue_script( 'popper', get_template_directory_uri() . "/assets/js/core/popper.min.js", "", false, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/assets/js/core/bootstrap.min.js", "", false, true );
    wp_enqueue_script( 'perfect-scroll-bar', get_template_directory_uri() . "/assets/js/plugins/perfect-scrollbar.min.js", "", false, true );
    wp_enqueue_script( 'smooth-scroll-bar', get_template_directory_uri() . "/assets/js/plugins/smooth-scrollbar.min.js", "", false, true );
    wp_enqueue_script( 'app', get_template_directory_uri() . "/assets/js/app.js", "", false, true );
    wp_enqueue_script( 'github-button', "https://buttons.github.io/buttons.js", "", false, true );
    wp_enqueue_script( 'center-control', get_template_directory_uri() . "/assets/js/material-dashboard.min.js?v=3.0.4", "", false, true );
}

function register_my_menus() {
    // Load menu options
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );