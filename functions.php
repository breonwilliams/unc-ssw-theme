<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
	/**
	 * Setup theme and register support wp features.
	 */
	function bootstrapBasicSetup() 
	{
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * 
		 * copy from underscores theme
		 */
		load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

		// add theme support post and comment automatic feed links
		add_theme_support('automatic-feed-links');

		// enable support for post thumbnail or feature image on posts and pages
		add_theme_support('post-thumbnails');

		// allow the use of html5 markup
		// @link https://codex.wordpress.org/Theme_Markup
		add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

		// add support menu
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'bootstrap-basic'),
		));

		// add post formats support
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// add support custom background
		add_theme_support(
			'custom-background', 
			apply_filters(
				'bootstrap_basic_custom_background_args', 
				array(
					'default-color' => 'ffffff', 
					'default-image' => ''
				)
			)
		);
	}// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');

if ( function_exists( 'add_theme_support' ) ) {
	add_image_size( 'article_thumbnail', 800, 800, true ); // Posts thumnail

}

if (!function_exists('bootstrapBasicWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function bootstrapBasicWidgetsInit() 
	{
		register_sidebar(array(
			'name'          => __('Top Header Left', 'bootstrap-basic'),
			'id'            => 'topheader-left',
			'before_widget' => '<div id="%1$s" class="widget header-top-left %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Top Header Right', 'bootstrap-basic'),
			'id'            => 'topheader-right',
			'before_widget' => '<div id="%1$s" class="widget header-top-right text-right %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Header right', 'bootstrap-basic'),
			'id'            => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar left', 'bootstrap-basic'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title title-medium br-bottom mb30">',
			'after_title'   => '</h2>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'bootstrap-basic'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title title-medium br-bottom mb30">',
			'after_title'   => '</h2>',
		));

		register_sidebar(array(
			'name'          => __('Staff Widget', 'bootstrap-basic'),
			'id'            => 'sidebar-staffwidget',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title title-medium br-bottom mb30">',
			'after_title'   => '</h2>',
		));

		register_sidebar(array(
			'name'          => __('Footer One', 'bootstrap-basic'),
			'id'            => 'sidebar-footerone',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="ft-title"><span>',
			'after_title'   => '</span></h2>',
		));

		register_sidebar(array(
			'name'          => __('Footer Two', 'bootstrap-basic'),
			'id'            => 'sidebar-footertwo',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="ft-title"><span>',
			'after_title'   => '</span></h2>',
		));

		register_sidebar(array(
			'name'          => __('Footer Three', 'bootstrap-basic'),
			'id'            => 'sidebar-footerthree',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="ft-title"><span>',
			'after_title'   => '</span></h2>',
		));

		register_sidebar(array(
			'name'          => __('Footer Four', 'bootstrap-basic'),
			'id'            => 'sidebar-footerfour',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="ft-title"><span>',
			'after_title'   => '</span></h2>',
		));
	}// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');

// List Hierarchical Custom Taxonomy Terms for a Post in an Unordered List

function list_hierarchical_terms() {
	global $post;
	$taxonomy = 'staff_category'; // change this to your taxonomy
	$terms = wp_get_post_terms( $post->ID, $taxonomy, array( "fields" => "ids" ) );
	if( $terms ) {
		echo '<ul class="course-cat">';
		$terms = trim( implode( ',', (array) $terms ), ' ,' );
		wp_list_categories( 'title_li=&taxonomy=' . $taxonomy . '&include=' . $terms );
		echo '</ul>';
	}
}





if (!function_exists('bootstrapBasicEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles
	 */
	function bootstrapBasicEnqueueScripts() 
	{
		wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
		wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
		wp_enqueue_style('select-style', get_template_directory_uri() . '/css/bootstrap-select.min.css');

		wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
		wp_enqueue_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
		wp_enqueue_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), false, true);
		wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), false, true);
		wp_enqueue_script('boot-select', get_template_directory_uri() . '/js/bootstrap-select.js', array(), false, true);
		wp_enqueue_script('select-class', get_template_directory_uri() . '/js/wrapforms.js', array(), false, true);
		wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	}// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * admin page displaying help.
 */
if (is_admin()) {
	require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
	$bbsc_adminhelp = new BootstrapBasicAdminHelp();
	add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
	unset($bbsc_adminhelp);
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Logo
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';

