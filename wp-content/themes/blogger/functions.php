<?php
/**
 * Theme Functions file
 * 
 * 
 * @package blogger
 */

// Enqueue Scripts & Styles
if( !function_exists( 'blogger_theme_scripts_setup' ) ) {
    function blogger_theme_scripts_setup() {
        wp_enqueue_style( 'blogger_theme_bootstrap_style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'blogger_theme_templatemo_style', get_stylesheet_directory_uri() . '/assets/css/templatemo-xtra-blog.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'blogger_theme_fontawesome_style', get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'blogger_theme_google_font', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap', array(), '1.0.0', 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'blogger_theme_scripts_setup' );
} 

// Initial Theme Setup
if( !function_exists( 'blogger_theme_setup' ) ) {
    function blogger_theme_setup() {
        
        // Theme Features 
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support('widgets');


        // Register Navigation Menus
        register_nav_menus( array( 
            'primary' => 'Main Menu',
            'secondary' => 'Footer Menu'
        ) );
        
        //Register Sidebar

     

        
    }
    add_action( 'after_setup_theme', 'blogger_theme_setup' );
}

if (!function_exists('blogger_theme_sidebar_setup')){
    function blogger_theme_sidebar_setup(){
        register_sidebar(array(
            'name'=>'Main Sidebar',
            'id' => 'sidebar-1',
            'class' => 'main-sidebar',
            'description' => 'This is our awesome sidebar',
            'before_wigdet' => '<aside class="sidebar-widget-single">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="sidebar-widget-heading">',
            'after_title' => '</h1>'
        ));
        register_sidebar(array(
            'name'=>'Category Sidebar',
            'id' => 'sidebar-category',
            'class' => 'category-sidebar',
            'description' => 'This is our category sidebar',
            'before_wigdet' => '<aside class="sidebar-widget-single">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="sidebar-widget-heading">',
            'after_title' => '</h1>'
        ));
    }
}

add_action( 'widgets_init', 'blogger_theme_sidebar_setup');

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="tm-nav-link"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');

 
 // $wp_customize
 // customize_register - action

 // 3 layers - section, setting, control


// function blogger_customizer_read_more($wp_customize){
//     $wp_customize ->add_section('blogger_read_more_section', array(
//         'title' => 'Edit Read More'
//     ));
//     $wp_customize->add_setting('blogger_read_more_setting',array(
//         'default' => 'read more...'
//     ));
//     $wp_customize->add_control(new WP_Customize_Control($wp_customize,'blogger_read_more_control',array(
//         'label'=> 'Title Text',
//         'section' => 'blogger_read_more_section',
//         'settings'=> 'blogger_read_more_setting'
//     )));


// }
// add_action('customize_register','blogger_customizer_read_more');

function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');

    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {

            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {

                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {

                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));

                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');

require get_template_directory() . '/customizer.php';
?>


