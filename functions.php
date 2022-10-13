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


/* Add custom classes to list item "li" */
function _namespace_menu_item_class( $classes, $item ) {       
    $classes[] = "nav-item"; // you can add multiple classes here
    return $classes;
} 
add_filter( 'nav_menu_css_class' , '_namespace_menu_item_class' , 10, 2 );

/* Add custom class to link in menu */
function _namespace_modify_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link text-white "', $ulclass);
}
add_filter('wp_nav_menu', '_namespace_modify_menuclass');

/* Disabled admin bar for subscribers */
function disable_admin_bar_for_subscribers(){
    if ( is_user_logged_in() ):
        global $current_user;
        if( !empty( $current_user->caps['subscriber'] ) ):
            add_filter('show_admin_bar', '__return_false');
        endif;
    endif;
}
add_action('init', 'disable_admin_bar_for_subscribers', 9);

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logos/Logo-CCTVL-84.png) !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' ); 

function disable_check_icon_login_page() { ?>
    <style type="text/css">
        input[type=checkbox]:checked::before,
        input#rememberme.form-check-input::before {
            content: none !important;
    }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'disable_check_icon_login_page' ); 

// Redirect default URL link to a custom page
add_action('init','custom_login');
function custom_login(){
 global $pagenow;
 if( 'wp-login.php' == $pagenow  && $_GET['action']!="logout" && $_GET['action']!= "lostpassword" ) {
  wp_redirect(get_site_url() . '/custom-login');
  exit();
 }
}

