<?php
/**
 * Cairo Starter theme functions.
 *
 * @package Cairo_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CAIRO_STARTER_VERSION', '1.0.0' );

/**
 * Theme setup: menus, thumbnails, logo, HTML5 markup, translation.
 */
function cairo_starter_setup() {
	load_theme_textdomain( 'cairo-starter', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'cairo-starter' ),
			'footer'  => __( 'Footer Menu', 'cairo-starter' ),
		)
	);

	add_image_size( 'cairo-starter-portfolio', 640, 400, true );
}
add_action( 'after_setup_theme', 'cairo_starter_setup' );

/**
 * Front-end assets.
 */
function cairo_starter_assets() {
	wp_enqueue_style(
		'cairo-starter-style',
		get_stylesheet_uri(),
		array(),
		CAIRO_STARTER_VERSION
	);

	// Accent color from the Customizer, injected as a CSS variable override.
	$accent = sanitize_hex_color( get_theme_mod( 'cairo_starter_accent', '#e8641c' ) );
	if ( $accent ) {
		wp_add_inline_style( 'cairo-starter-style', ":root { --accent: {$accent}; }" );
	}

	wp_enqueue_script(
		'cairo-starter-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		CAIRO_STARTER_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'cairo_starter_assets' );

/**
 * Widget areas.
 */
function cairo_starter_widgets() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'cairo-starter' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Shown next to blog posts and archives.', 'cairo-starter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer column number. */
				'name'          => sprintf( __( 'Footer Column %d', 'cairo-starter' ), $i ),
				'id'            => "footer-{$i}",
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'cairo_starter_widgets' );

/**
 * Front-page hero defaults, pulled through the Customizer.
 */
function cairo_starter_hero( $key ) {
	$defaults = array(
		'heading'    => __( 'We build websites that win you clients', 'cairo-starter' ),
		'subheading' => __( 'Web development, SEO and digital marketing for growing businesses.', 'cairo-starter' ),
		'button'     => __( 'Get a quote', 'cairo-starter' ),
		'button_url' => '#contact',
	);
	$value = get_theme_mod( "cairo_starter_hero_{$key}", $defaults[ $key ] ?? '' );
	return $value ? $value : ( $defaults[ $key ] ?? '' );
}

require get_template_directory() . '/inc/customizer.php';
