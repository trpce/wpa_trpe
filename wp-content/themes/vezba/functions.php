<?php
/**
 * Default Functions Template
 *
 *
 * @package vezba
 *  */





 if (!function_exists('vezba_setup')){
     function vezba_setup(){
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support('widgets');
     }
     add_action( 'after_setup_theme', 'vezba_setup' );
 }

 if (!function_exists('register_vezba_post')){
     function register_vezba_post(){
        register_post_type('vezba_post', [
            'label' => 'Vezba',
            'description'=> 'This is vezba post type',
            'public'=> true,
            'menu_position'=> null,
            'capability_type' => 'post'
            ]
        );
     }
     add_action('init','register_vezba_post');
 }
?>