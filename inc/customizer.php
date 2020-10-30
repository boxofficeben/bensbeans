<?php
	function bensbeans_customize_register($wp_customize){
		// Showcase Section
  		$wp_customize->add_section('showcase', array(
			'title'          => __('Showcase', 'bensbeans'),
			'description'    => sprintf( __('Options for showcase area', 'bensbeans')
			),
			'priority'       => 130,
		));

		// Image Setting
		  $wp_customize->add_setting('showcase_image', array(
		    'default' => get_bloginfo('template_directory') . '/img/coffee-jumbotron.jpg',
		    'type'    => 'theme_mod'

		 ));

		 // Image Control
		 $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'showcase_image', array(
		     'label'    => __('Background Image', 'bensbeans'),
		     'section'  => 'showcase',
		     'settings' => 'showcase_image',
		     'priority' => 1,
		 )));
		 
		 

		 // Height Setting
		$wp_customize->add_setting( 'showcase_height', array(
			'default'              => _x(700, 'bensbeans'),
			'type'                 => 'theme_mod'
		));

		// Height Control
		$wp_customize->add_control( 'showcase_height', array(
			'label'    => __('Showcase Height', 'bensbeans'),
			'section'  => 'showcase',
			'priority' => 2,
		));

		// Heading Setting
		$wp_customize->add_setting( 'showcase_heading', array(
			'default'              => _x('Bens Beans Theme', 'bensbeans'),
			'type'                 => 'theme_mod'
		));

		// Heading Control
		$wp_customize->add_control( 'showcase_heading', array(
			'label'    => __('Heading', 'bensbeans'),
			'section'  => 'showcase',
			'priority' => 3,
		));

		// Text Setting
		$wp_customize->add_setting( 'showcase_text', array(
			'default'              => _x('Custom Wordpress Theme By You', 'bensbeans'),
			'type'                 => 'theme_mod'
		));

		// Text Control
		$wp_customize->add_control( 'showcase_text', array(
			'label'    => __('Text', 'bensbeans'),
			'section'  => 'showcase',
			'priority' => 4,
        ));
    }
        add_action('customize_register','bensbeans_customize_register');