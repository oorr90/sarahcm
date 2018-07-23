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




/*-----------------------

REGISTER ACFs

-----------------------*/



if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_experiences',
		'title' => 'Experiences',
		'fields' => array (
			array (
				'key' => 'field_5b357249d2ce4',
				'label' => 'Experience',
				'name' => 'experience',
				'type' => 'repeater',
				'instructions' => 'List experience details here',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_5b357264d2ce5',
						'label' => 'Experience Header',
						'name' => 'experience_header',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b35728ad2ce6',
						'label' => 'Experience List Item',
						'name' => 'experience_list_item',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_5b3572a7d2ce7',
								'label' => 'Experience Item',
								'name' => 'experience_item',
								'type' => 'text',
								'instructions' => 'List experience items here',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '27',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_home-features',
		'title' => 'Home Features',
		'fields' => array (
			array (
				'key' => 'field_5b358fb6c9547',
				'label' => 'Home Features',
				'name' => 'home_features',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b358fccc9549',
						'label' => 'Home Feature Image',
						'name' => 'home_feature_image',
						'type' => 'image',
						'required' => 1,
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5b358fc0c9548',
						'label' => 'Home Feature Title',
						'name' => 'home_feature_title',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b358fe5c954a',
						'label' => 'Home Feature Description',
						'name' => 'home_feature_description',
						'type' => 'textarea',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 4,
						'formatting' => 'br',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '5',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_resources',
		'title' => 'Resources',
		'fields' => array (
			array (
				'key' => 'field_5b3642f1374e6',
				'label' => 'Resources',
				'name' => 'resources',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b3642f9374e7',
						'label' => 'Resource Name',
						'name' => 'resource_name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b36430d374e8',
						'label' => 'Resource Image',
						'name' => 'resource_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5b36431c374e9',
						'label' => 'Resource URL',
						'name' => 'resource_url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => 'http://',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '11',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_services',
		'title' => 'Services',
		'fields' => array (
			array (
				'key' => 'field_5b329c8b69244',
				'label' => 'Services List',
				'name' => 'services_list',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b329c9b69245',
						'label' => 'Service Title',
						'name' => 'service_title',
						'type' => 'text',
						'instructions' => 'Enter the service title',
						'required' => 1,
						'column_width' => 0,
						'default_value' => '',
						'placeholder' => 'Please type here...',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b329cd75b454',
						'label' => 'Services description',
						'name' => 'services_description',
						'type' => 'textarea',
						'instructions' => 'Please enter a description of the service',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'Enter the description here...',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '9',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_testimonials',
		'title' => 'Testimonials',
		'fields' => array (
			array (
				'key' => 'field_5b3659feed6ce',
				'label' => 'Testimonials',
				'name' => 'testimonials',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '5',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>
