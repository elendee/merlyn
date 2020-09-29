<?php
/**
 * merlyn Theme Customizer
 *
 * @package merlyn
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function merlyn_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'merlyn_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'merlyn_customize_partial_blogdescription',
			)
		);
	}

	 // Add Customize Section
    $wp_customize->add_section('site_image', array(
        'title' => 'Site Image',
        'description'   => 'Update site image'
    ));
    
    $wp_customize->add_setting('site_img_settings', array(
        //default value
    ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_img_control', array(
        'label' => 'Edit Image',
        'settings'  => 'site_img_settings',
        'section'   => 'site_image'
    ) ));



    $wp_customize->add_section('footer_copy', array(
        'title' => 'Footer copy',
        'description'   => 'copy for the footer (defaults to site title + copyright)'
    ));
    
    $wp_customize->add_setting('footer_copy_settings', array(
        //default value
    ));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copy_control', array(
        'label' => 'Edit Footer Copy',
        'settings'  => 'footer_copy_settings',
        'section'   => 'footer_copy',
        'type'     => 'text'
    ) ));


 //    $wp_customize->add_section('blorb_section', array(
 //        'title' => 'BLORB',
 //        'description'   => 'BLORB date'
 //    ));


 //    $wp_customize->add_control( 'setting_id', array(
	//   'type' => 'date',
	//   'priority' => 10, // Within the section.
	//   'section' => 'colors', // Required, core or custom.
	//   'label' => __( 'Date' ),
	//   'description' => __( 'This is a date control with a red border.' ),
	//   'input_attrs' => array(
	//     'class' => 'my-custom-class-for-js',
	//     'style' => 'border: 1px solid #900',
	//     'placeholder' => __( 'mm/dd/yyyy' ),
	//   ),
	//   'active_callback' => 'is_front_page',
	// ) );

}
add_action( 'customize_register', 'merlyn_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function merlyn_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function merlyn_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function merlyn_customize_preview_js() {
	wp_enqueue_script( 'merlyn-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'merlyn_customize_preview_js' );



// Abhi investigations LLC

// function my_customize_register_func( $wp_customize ) {
    
//     // Add Customize Section
//     $wp_customize->add_section('home_section', array(
//         'title' => 'Home',
//         'description'   => 'Update home image'
//     ));
    
//     $wp_customize->add_setting('home_img_settings', array(
//         //default value
//         //$my_img = get_theme_mod('home_img_settings')
//     ));
    
//     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_img_control', array(
//         'label' => 'Edit Image',
//         'settings'  => 'home_img_settings',
//         'section'   => 'home_section'
//     ) ));
    
// }