<?php



/*-----------------------

ADD CSS AND JAVASCRIPT

-----------------------*/
function scm_script_enqueue() {
	wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css');
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/stylesheet.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'scm_script_enqueue');



/*-----------------------

GOOGLE FONTS

-----------------------*/
function custom_add_google_fonts() {
    wp_register_style( 'google', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,600i,700', array(), null, 'all' );
    wp_enqueue_style('google');
}

add_action('wp_enqueue_scripts', 'custom_add_google_fonts');



/*-----------------------

ACTIVATE MENUS

-----------------------*/
function scm_theme_setup() {

	add_theme_support( 'menus' );

	register_nav_menu( 'primary', 'Primary Nav' );
	register_nav_menu( 'secondary', 'Secondary Nav' );
	register_nav_menu( 'footer', 'Footer Nav' );

}

add_action( 'init', 'scm_theme_setup');


/*-----------------------

GET RID OF IMPORTANT ABOVE HEADER BECAUSE WHY IS IT THERE??

-----------------------*/
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



/*-----------------------

THEME SUPPORT

-----------------------*/

/**
 *
 * Add a custom header image with default
 *
 */
$headerimg = array(
	'default-image' => get_template_directory_uri() . '/images/header.png',
);
add_theme_support( 'custom-header', $headerimg );


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
/* https://developer.wordpress.org/reference/hooks/wp_title/ */
function wpdocs_filter_wp_title( $title, $sep ) {
    global $paged, $page;
 
    if ( is_feed() )
        return $title;
 
    // Add the site name.
    $title .= get_bloginfo( 'name' );
 
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
 
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );
 
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );



/*-----------------------

THEME SUPPORT

-----------------------*/

function scm_widget_setup() {

	//Register a new sidebar
	//https://codex.wordpress.org/Function_Reference/register_sidebar
	register_sidebar( array(
			'name' => 'Sidebar',
			'id' => 'sidebar-main',
			'class' => 'custom',
			'description' => 'Standard sidebar for SCM',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);

}

add_action( 'widgets_init', 'scm_widget_setup');


/**
 * Enable featured images
 */
add_theme_support( 'post-thumbnails' );






?>
