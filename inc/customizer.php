<?php
/**
 * Customizer options: accent color + front-page hero copy.
 *
 * @package Cairo_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function cairo_starter_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'cairo_starter_hero_section',
		array(
			'title'    => __( 'Front Page Hero', 'cairo-starter' ),
			'priority' => 30,
		)
	);

	// Accent color.
	$wp_customize->add_setting(
		'cairo_starter_accent',
		array(
			'default'           => '#e8641c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cairo_starter_accent',
			array(
				'label'   => __( 'Accent color', 'cairo-starter' ),
				'section' => 'colors',
			)
		)
	);

	// Hero fields.
	$hero_fields = array(
		'heading'    => array( __( 'Hero heading', 'cairo-starter' ), 'sanitize_text_field' ),
		'subheading' => array( __( 'Hero subheading', 'cairo-starter' ), 'sanitize_textarea_field' ),
		'button'     => array( __( 'Button label', 'cairo-starter' ), 'sanitize_text_field' ),
		'button_url' => array( __( 'Button link', 'cairo-starter' ), 'esc_url_raw' ),
	);
	foreach ( $hero_fields as $key => $field ) {
		$wp_customize->add_setting(
			"cairo_starter_hero_{$key}",
			array(
				'default'           => '',
				'sanitize_callback' => $field[1],
			)
		);
		$wp_customize->add_control(
			"cairo_starter_hero_{$key}",
			array(
				'label'   => $field[0],
				'section' => 'cairo_starter_hero_section',
				'type'    => 'subheading' === $key ? 'textarea' : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'cairo_starter_customize_register' );
