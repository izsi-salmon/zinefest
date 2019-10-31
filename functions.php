<?php
// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Nunito:400,700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/css/theme-styles.css', array(), '0.2.1', 'all');
  global $wp_query;
}
add_action('wp_enqueue_scripts', 'addCustomThemeStyles');
// ------ THEME SUPPORTS ------
// Post thumbnails
add_theme_support('post-thumbnails');
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
}
add_action('init', 'addCustomMenus');

function add_events_post_type(){
    $labels = array(
        'name' => _x('Events', 'post type name', 'zinefestTheme'),
        'singular_name' => _x('Event', 'post type singular name', 'zinefestTheme'),
        'add_new_item' => _x('Add event', 'Adding event', 'zinefestTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Post type that creates a new event',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => '',
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'query_var' => true
    );
    register_post_type('events', $args);
}

function add_archives_post_type(){
    $labels = array(
        'name' => _x('Archives', 'post type name', 'zinefestTheme'),
        'singular_name' => _x('Archive', 'post type singular name', 'zinefestTheme'),
        'add_new_item' => _x('Add archive', 'Adding archive', 'zinefestTheme')
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'Post type that adds an event archive',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => '',
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array(
            'title',
            'thumbnail'
        ),
        'query_var' => true
    );
    register_post_type('archives', $args);
}

function conditional_post_type(){
    $getArchivesArgs = array(
    'post_type' => 'archives',
    'posts_per_page' => -1
    );
    $getArchives = new WP_Query($getArchivesArgs);
    if( $getArchives->have_posts() ){
        
        while($getArchives->have_posts()): $getArchives->the_post();
            $title = get_the_title();
            add_gallery_post_type($title);
        endwhile;
            
    }
    
}

function add_gallery_post_type($archiveTitle){
    $labels = array(
        'name' => _x($archiveTitle, 'post type name', 'zinefestTheme'),
        'singular_name' => _x($archiveTitle, 'post type singular name', 'zinefestTheme'),
        'add_new_item' => _x('Add work to '.$archiveTitle, 'Adding work', 'zinefestTheme')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Post type that adds work to a specific archive',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => '',
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'thumbnail'
        ),
        'query_var' => true
    );
    register_post_type($archiveTitle, $args);
}

add_action('init','add_gallery_post_type');

// ----- ADD POST TYPES ------
add_action('init','add_events_post_type');
add_action('init','add_archives_post_type');
add_action('init','conditional_post_type');
add_filter( 'wpseo_remove_reply_to_com', '__return_false' );
// Changes the_excerpt() more text
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
// ----- REQUIREMENTS -----
require get_parent_theme_file_path('/addons/custom-customizer.php');
require get_parent_theme_file_path('/addons/custom-fields.php');