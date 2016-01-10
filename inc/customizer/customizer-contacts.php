<?php


/**
 * Add contacts data for site
 */
function wpbss_customize_contacts( $wp_customize ) {

	$wp_customize->add_section(
    'site_contacts',
    array(
      'title'     => 'Контактные данные',
      'priority'  => 200,
      'description' => 'Настройте контактные данные сайта'
      )
   );

	 //
	 // Телефон
	 //
   $wp_customize->add_setting(
      'phone',
      array(
					'type' => 'option',
          'default'            => '',
          'sanitize_callback'  => 'wpbss_sanitize_text_option',
      )
    );

    $wp_customize->add_control(
			'phone',
			array(
				'section'  => 'site_contacts',
				'label'    => 'Телефон',
				'type'     => 'text'
			)
		);


		//
 	  // Адрес эл почты
 	  //
		$wp_customize->add_setting(
			'email',
			array(
				'type' => 'option',
				'default'            => '',
				'sanitize_callback'  => 'wpbss_sanitize_text_option',
			)
		);
		$wp_customize->add_control(
			'email',
			array(
				'section'  => 'site_contacts',
				'label'    => 'Email',
				'type'     => 'text'
			)
		);


		//
		// Адрес офиса
		//
		$wp_customize->add_setting(
			'address_office',
			array(
				'type' => 'option',
				'default'            => '',
				'sanitize_callback'  => 'wpbss_sanitize_text_option',
			)
		);
		$wp_customize->add_control(
			'address_office',
			array(
				'section'  => 'site_contacts',
				'label'    => 'Адрес офиса',
				'type'     => 'text'
			)
		);

}
add_action( 'customize_register', 'wpbss_customize_contacts' );
