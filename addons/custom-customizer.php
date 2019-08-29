<?php
function custom_theme_customizer( $wp_customize ){
    
    // PANELS
    
//    $wp_customize->add_panel( 'panel_name', array(
//      'title'       => __( 'Title'),
//      'description' => $description,
//      'priority'    => 150
//    ) );
    
    // SECTIONS
    
//    $wp_customize->add_section('section_name', array(
//        'title' => __('Title', 'textdomain'),
//        'panel' => 'panel_name'
//    ));
    
    // Homepage banner image
    $wp_customize->add_section('homepage_banner', array(
        'title' => __('Homepage Banner', 'zinefestTheme')
    ));
    
    // Home images
    $wp_customize->add_section('home_images', array(
        'title' => __('Home Images', 'zinefestTheme')
    ));
    
    $wp_customize->add_section('contact', array(
        'title' => __('Contact', 'textdomain')
    ));
    
    // SETTINGS & CONTROLS
    
    // Example
//    $wp_customize->add_setting('element_setting', array(
//        'default'   => '',
//        'transport' => 'none'
//    ));
    
//    $wp_customize->add_control(
//        new WP_Customize_Control(
//            $wp_customize,
//            'element_control',
//            array(
//                'label'       => __('Label', 'textdomain'),
//                'description' => 'Description',
//                'section'     => 'section_name',
//                'settings'    => 'element_setting',
//                'type'        => 'type'
//            )
//        )
//    );
    
    // Homepage Banner
    $wp_customize->add_setting('homepage_banner_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'homepage_banner_control',
           array(
               'label'       => __('Homepage Banner Image', 'zinefestTheme'),
               'description' => 'Upload a banner image. The banner dimensions are 2x1 (eg. an image of 1000px x 500px fits perfectly in the frame).',
               'section'     => 'homepage_banner',
               'settings'    => 'homepage_banner_setting'
           )
       )
   );
    
    // HOME IMAGES
    
    // First image
    $wp_customize->add_setting('first_image_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'First Image',
           array(
               'label'       => __('First Image', 'zinefestTheme'),
               'description' => 'Upload an image to the home page.',
               'section'     => 'home_images',
               'settings'    => 'first_image_setting'
           )
       )
   );
    
    // Second image
    $wp_customize->add_setting('second_image_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'Second Image',
           array(
               'label'       => __('Second Image', 'zinefestTheme'),
               'description' => 'Upload an image to the home page.',
               'section'     => 'home_images',
               'settings'    => 'second_image_setting'
           )
       )
   );
    
    // Third Image
    $wp_customize->add_setting('third_image_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'Third Image',
           array(
               'label'       => __('Third Image', 'zinefestTheme'),
               'description' => 'Upload an image to the home page.',
               'section'     => 'home_images',
               'settings'    => 'third_image_setting'
           )
       )
   );
    
    // CONTACT
    
    // Email
    
    $wp_customize->add_setting('email_setting', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_email_address'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'email_control',
            array(
                'label' => __('Email Address', 'zinefestTheme'),
                'section' => 'contact',
                'settings' => 'email_setting',
                'type' => 'text'
            )
        )
    );
    
    
    $wp_customize->add_setting('email_icon_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'email_icon_control',
           array(
               'label'       => __('Email Icon', 'zinefestTheme'),
               'description' => 'Add an email icon.',
               'section'     => 'contact',
               'settings'    => 'email_icon_setting'
           )
       )
   );
    
    // Facebook
    $wp_customize->add_setting('facebook_link_setting', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_facebook'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'facebook_link_control',
            array(
                'label' => __('Facebook link', 'zinefestTheme'),
                'section' => 'contact',
                'settings' => 'facebook_link_setting',
                'type' => 'text'
            )
        )
    );
    
    
    $wp_customize->add_setting('facebook_icon_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'facebook_icon_control',
           array(
               'label'       => __('Facebook Icon', 'zinefestTheme'),
               'description' => 'Add a Facebook icon.',
               'section'     => 'contact',
               'settings'    => 'facebook_icon_setting'
           )
       )
   );
    
    // Instagram
    $wp_customize->add_setting('instagram_link_setting', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_instagram'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'instagram_link_control',
            array(
                'label' => __('Instagram link', 'zinefestTheme'),
                'section' => 'contact',
                'settings' => 'instagram_link_setting',
                'type' => 'text'
            )
        )
    );
    
    
    $wp_customize->add_setting('instagram_icon_setting', array(
        'default'   => '',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'instagram_icon_control',
           array(
               'label'       => __('Instagram Icon', 'zinefestTheme'),
               'description' => 'Add a Instagram icon.',
               'section'     => 'contact',
               'settings'    => 'instagram_icon_setting'
           )
       )
   );
    
    // SANITIZE TEXT
    
    function sanitize_email_address( $sanEmail ) {
	    return sanitize_text_field( $sanEmail );
	}
    
    function sanitize_facebook( $sanFacebook ) {
	    return sanitize_text_field( $sanFacebook );
	}
    
    function sanitize_instagram( $sanInstagram ) {
	    return sanitize_text_field( $sanInstagram );
	}
    
//	function sanitize_callback( $sanitizeVariable ) {
//	    return sanitize_text_field( $sanitizeVariable );
//	}
//    
//    function sanitize_callback( $sanitizeVariable ) {
//	    return esc_textarea( $sanitizeVariable );
//	}
    
}
add_action('customize_register', 'custom_theme_customizer');