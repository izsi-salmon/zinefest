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
    
    // Featured banner image
    $wp_customize->add_section('featured_event_banner', array(
        'title' => __('Featured Event Banner', 'zinefestTheme')
    ));
    
    // Home images
    $wp_customize->add_section('home_images', array(
        'title' => __('Home Images', 'zinefestTheme')
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
    
    // Featured Event Banner
    $wp_customize->add_setting('event_banner_setting', array(
        'default'   => '',
        'transport' => 'none'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
           $wp_customize,
           'Event Banner',
           array(
               'label'       => __('Event Banner Image', 'zinefestTheme'),
               'description' => 'Upload a banner image. Recommended size x:',
               'section'     => 'featured_event_banner',
               'settings'    => 'event_banner_setting'
           )
       )
   );
    
    // HOME IMAGES
    
    // First image
    $wp_customize->add_setting('first_image_setting', array(
        'default'   => '',
        'transport' => 'none'
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
        'transport' => 'none'
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
        'transport' => 'none'
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
    
    // SANITIZE TEXT
    
    // Homepage text
//	function sanitize_text( $sanitizeVariable ) {
//	    return sanitize_text_field( $sanitizeVariable );
//	}
//    
//    function sanitize_text_area( $sanitizeVariable ) {
//	    return esc_textarea( $sanitizeVariable );
//	}
    
}
add_action('customize_register', 'custom_theme_customizer');