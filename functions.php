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
    wp_enqueue_script( 'app', get_template_directory_uri() . "/assets/js/app.js", array( 'jquery' ), false, true );
    wp_enqueue_script( 'github-button', "https://buttons.github.io/buttons.js", "", false, true );
    wp_enqueue_script( 'center-control', get_template_directory_uri() . "/assets/js/material-dashboard.min.js?v=3.0.4", "", false, true );
    wp_localize_script( 'app', 'params',
    array(
        'ajaxurl'           => admin_url( 'admin-ajax.php' ),
    )
);
}
// BLOCK BACKEND ACCESS FOR NON-ADMINS
/*
add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    // If accessing the admin panel and not an admin
    if ( is_admin() && !current_user_can('level_10') ) {
        // Redirect to the homepage
        wp_redirect( home_url() );
        exit;
    }
}*/

/*
 * Change WP Login file URL using "login_url" filter hook
 * https://developer.wordpress.org/reference/hooks/login_url/
 */
add_filter( 'login_url', 'custom_login_url', PHP_INT_MAX );
function custom_login_url( $login_url ) {
	$login_url = site_url( 'custom-login.php', 'login' );
    return $login_url;
}

// Redirect users who arent logged in...
add_action( 'wp', 'members_only' );
function members_only() {
    global $pagenow;
    // Check to see if user in not logged in and not on the login page
    if( !is_user_logged_in() && $pagenow != 'custom-login.php' )
          auth_redirect();
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
        /* necessary when using wp-login.php
        body{
            background-image: url('https://www.ccterresduvaldeloire.fr/medias/2019/05/default1-e1565095518289.jpg') !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
        }

        .login #nav a,
        .login #nav a:hover,
        .login #backtoblog a {
            color: #ffffff !important;
            font-size: 20px !important;
            text-shadow: 5px 5px 5px #000000 !important;
        }

        .dashicons-translation:before {
            color: #ffffff !important;
        }
        */

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

// changing the logo link from wordpress.org to your site
function mb_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mb_login_url' );

// changing the title text on the logo to show your site name
function mb_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mb_login_title' );

// Redirect default URL link to a custom page
/*
add_action('init','custom_login');
function custom_login(){
    global $pagenow;
    if( 'wp-login.php' == $pagenow  && $_GET['action']!="logout" && $_GET['action']!= "lostpassword" ) {
        wp_redirect(get_site_url() . '/custom-login');
        exit();
    }
    if( 'wp-login.php' == $pagenow  && $_GET['action']== "lostpassword" ) {
        wp_redirect(get_site_url() . '/custom-login?action=lostpassword');
        exit();
    }
}
*/

// Modify ACF Form Label for Post Title Field
function wd_post_title_acf_name( $field ) {
    if( is_page( 'Créer un nouvel utilisateur ADEFI' ) ) { // if on the vendor page
        $field['label'] = 'Titre de la demande (Prénom et Nom)';
    } else {
         $field['label'] = 'Vérifier la traduction dans le thème';
    }
    return $field;
}
add_filter('acf/load_field/name=_post_title', 'wd_post_title_acf_name');

function ajaxAllfilter(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['all'];
        get_template_part('partials/dash_mobile/all');
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterAll', 'ajaxAllfilter');

function ajaxEngagedfilter(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['args'];
        get_template_part('partials/dash_mobile/engaged');
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterEngaged', 'ajaxEngagedfilter');

function ajaxNoEngagedfilter(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['args'];
        get_template_part('partials/dash_mobile/no_engaged', null, array('args' => $args));
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterNoEngaged', 'ajaxNoEngagedfilter');

function ajaxAllfilterFixes(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['args'];
        get_template_part('partials/dash_fixes/all');
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterAllFixes', 'ajaxAllfilterFixes');

function ajaxEngagedfilterFixes(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['args'];
        get_template_part('partials/dash_fixes/engaged');
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterEngagedFixes', 'ajaxEngagedfilterFixes');

function ajaxNoEngagedfilterFixes(){
    if (isset ($_REQUEST)){
        $args = $_REQUEST['args'];
        get_template_part('partials/dash_fixes/no_engaged', null, array('args' => $args));
        wp_die();
    } else {
        echo('There is a problem in your requestAjax function');
    }
}
add_action( 'wp_ajax_filterNoEngagedFixes', 'ajaxNoEngagedfilterFixes');