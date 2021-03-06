<?php
/**
 * Simone Theme Customizer
 *
 * @package Simone
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simone_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'simone_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simone_customize_preview_js() {
    if  (file_exists(get_template_directory_uri() . '/js/core/customizer.js')) {
        wp_enqueue_script( 'simone_customizer', get_template_directory_uri() . '/js/core/customizer.js', array( 'customize-preview' ), '20130508', true );
    } else {
        wp_enqueue_script( 'simone_customizer', get_template_directory_uri() . '/js/core.min.js', array('customize-preview' ), '20130508', true );
    }
}
add_action( 'customize_preview_init', 'simone_customize_preview_js' );
