<?php
// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Nunito:400,700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/css/theme-styles.css', array(), '0.0.9', 'all');
//  wp_enqueue_style('CustomFieldStyle', get_template_directory_uri() . '/assets/custom-fields-styles.css', array(), '1.0.0', 'all');
//  wp_enqueue_style('commentstyles', get_template_directory_uri() . '/assets/comments-styles.css', array(), '1.0.0', 'all');
  // Scripts
//  wp_enqueue_script('jquery');
  wp_enqueue_script('themescripts', get_template_directory_uri().'/assets/theme-script.js', array(), '0.0.7', true);
  global $wp_query;
}
add_action('wp_enqueue_scripts', 'addCustomThemeStyles');
// ------ THEME SUPPORTS ------
// Post thumbnails
add_theme_support('post-thumbnails');
//add_image_size( 'gallery', 300, 300, true );
// Custom logo
function addCustomLogo() {
	add_theme_support('custom-logo', array(
        'width' => 200,
		'flex-height' => true,
		'flex-width' => false
	));
}
add_action('init', 'addCustomLogo');
// ----- MENUS -----
function addCustomMenus(){
    add_theme_support('menus');
    register_nav_menu('header_nav', 'Navigation Bar');
    register_nav_menu('social_media_links', 'Social Media Links');
}
add_action('init', 'addCustomMenus');
add_filter('nav_menu_css_class' , 'active_nav_class' , 10 , 2);
class child_wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"sub-menu-container\"><ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}
function active_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( in_array('menu-item-has-children', $item->classes) ) { // change 1161 to the ID of your menu item.
        $atts['id'] = 'dropdownButton';
    }
    return $atts;
}, 10, 3 );
// ----- POST TYPES -----
//// EXAMPLE
//
//function add_post_type(){
//    $labels = array(
//        'name' => _x('', 'post type name', 'cmosTheme'),
//        'singular_name' => _x('', 'post type singular name', 'cmosTheme'),
//        'add_new_item' => _x('Add ', 'Adding ', 'cmosTheme')
//    );
//    
//    $args = array(
//        'labels' => $labels,
//        'description' => '',
//        'public' => true,
//        'hierarchical' => true,
//        'show_ui' => true,
//        'show_in_menu' => true,
//        'show_in_nav_menus' => false,
//        'menu_position' => ,
//        'menu_icon' => 'dashicons-',
//        'supports' => array(
//            'title',
//            'editor',
//            'thumbnail'
//        ),
//        'query_var' => true
//    );
//    register_post_type('', $args);
//}
// Don't forget to add action! :)

// ----- ADD POST TYPES ------
//add_action('init','add_post_type');
// ----- REMOVE ACTIONS -----
// Stop wordpress from rendering two meta descriptions
//remove_action('wp_head', 'description');
// ----- FILTRES -----
// Stops Yoast Seo from breaking replytocom (Reply to comment link functionality)
add_filter( 'wpseo_remove_reply_to_com', '__return_false' );
// Changes the_excerpt() more text
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
// ----- REQUIREMENTS -----
require get_parent_theme_file_path('/addons/custom-customizer.php');
//require get_parent_theme_file_path('/addons/custom-fields.php');