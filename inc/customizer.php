<?php
/**
 * Logo Customizer
 */

function m1_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'm1_logo' ); // Add setting for logo uploader

	// Add control for logo uploader (actual uploader)
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
		'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
		'section'  => 'title_tagline',
		'settings' => 'm1_logo',
	) ) );
}
add_action( 'customize_register', 'm1_customize_register' );



function events_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'ftEvent_bg' ); // Add setting for logo uploader

	// Add control for logo uploader (actual uploader)
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ftEvent_bg', array(
		'label'    => __( 'Upload Featured Event Image', 'm2' ),
		'section'  => 'title_tagline',
		'settings' => 'ftEvent_bg',
		'section' => 'events_section_one',
	) ) );

	$wp_customize->add_section(
		'events_section_one',
		array(
			'title' => 'Featured Event',
			'description' => 'This will appear in the header.',
			'priority' => 35,
		)
	);

	$wp_customize->add_control(
		'events_section_one',
		array(
			'label' => 'Featured Event',
			'section' => 'events_section_one',
			'type' => 'text',
		)
	);




	$wp_customize->add_setting(
		'eventTitle_textbox',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'eventTitle_textbox',
		array(
			'label' => 'Featured Event Title',
			'section' => 'events_section_one',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'eventDate_textbox',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'eventDate_textbox',
		array(
			'label' => 'Featured Event Date',
			'section' => 'events_section_one',
			'type' => 'text',
		)
	);


	$wp_customize->add_setting(
		'eventURL_textbox',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'eventURL_textbox',
		array(
			'label' => 'Featured Event URL',
			'section' => 'events_section_one',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'events_customize_register' );








function copyright_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'example_section_one',
		array(
			'title' => 'Copyright',
			'description' => 'This will appear in the footer.',
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'copyright_textbox',
		array(
			'default' => 'Continuing Education',
		)
	);

	$wp_customize->add_control(
		'copyright_textbox',
		array(
			'label' => 'Copyright text',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);

}

add_action( 'customize_register', 'copyright_customizer' );





function m2_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm2_logo' ); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm2_logo', array(
        'label'    => __( 'Upload Menu Logo', 'm2' ),
        'section'  => 'title_tagline',
        'settings' => 'm2_logo',
    ) ) );
}
add_action( 'customize_register', 'm2_customize_register' );