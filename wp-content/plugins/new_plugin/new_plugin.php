<?php 

/**
 * @package NewPlugin
 */
/*
Plugin Name: New Plugin 2
Plugin URI: https://google.com/
Description: Manage your local events
Version: 1.0.0
Author: Stefan
Author URI: https://google.com
*/


$ids = [];

if( !function_exists('new_plugin_activate') ) {
    function new_plugin_activate() {
       
        flush_rewrite_rules();
        
        // global $ids;
        // $username_one = 'pero_user';
        // $password_one = 'Pero123';
        // $email_one = 'pero@gmail.com';

        // Define User Credentials
        // $logins = array(
        //     'first_user' => array (
        //         'username' => 'pero_user',
        //         'password' => 'Pero123',
        //         'email' => 'pero@gmail.com'
        //     ), 
        //     'second_user' => array(
        //         'username' => 'stevo_user',
        //         'password' => 'Stevo123',
        //         'email' => 'stevo@gmail.com'
        //     )
        // );

        // Iterate through credentials and insert
        // them into the database
        // foreach( $logins as $user ) {
        //     $ids = wp_create_user( $user['username'], $user['password'], $user['email'] );
        // }   

        // $userdata = array(
        //     'ID'                    => 0,    //(int) User ID. If supplied, the user will be updated.
        //     'user_pass'             => '',   //(string) The plain-text user password.
        //     'user_login'            => '',   //(string) The user's login username.
        //     'user_nicename'         => '',   //(string) The URL-friendly user name.
        //     'user_url'              => '',   //(string) The user URL.
        //     'user_email'            => '',   //(string) The user email address.
        //     'display_name'          => '',   //(string) The user's display name. Default is the user's username.
        //     'nickname'              => '',   //(string) The user's nickname. Default is the user's username.
        //     'first_name'            => '',   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
        //     'last_name'             => '',   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
        //     'description'           => '',   //(string) The user's biographical description.
        //     'rich_editing'          => '',   //(string|bool) Whether to enable the rich-editor for the user. False if not empty.
        //     'syntax_highlighting'   => '',   //(string|bool) Whether to enable the rich code editor for the user. False if not empty.
        //     'comment_shortcuts'     => '',   //(string|bool) Whether to enable comment moderation keyboard shortcuts for the user. Default false.
        //     'admin_color'           => '',   //(string) Admin color scheme for the user. Default 'fresh'.
        //     'use_ssl'               => '',   //(bool) Whether the user should always access the admin over https. Default false.
        //     'user_registered'       => '',   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
        //     'show_admin_bar_front'  => '',   //(string|bool) Whether to display the Admin Bar for the user on the site's front end. Default true.
        //     'role'                  => '',   //(string) User's role.
        //     'locale'                => '',   //(string) User's locale. Default empty.
        // );


        // $userdata = array(
        //     'user_pass' => 'Pero123',
        //     'user_login' => 'pero_user',
        //     'user_nicename' => 'Pero Lepotan',
        //     'user_email' => 'pero@gmail.com',
        //     'display_name' => 'Pero Lepotant',
        //     'nickname' => 'Perica',
        //     'first_name' => 'Pero',
        //     'last_name' => 'Perovski',
        //     'role' => 'administrator'
        // );

        // wp_insert_user( $userdata );
       
       

    }    
}
// if (!function_exists('new_plugin_register_post_type')){
//     function new_plugin_register_post_type(){
//         register_post_type('awsome_events', ['label'=>'Events','public'=>true]);
        
//     }
// }
// add_action('init','new_plugin_register_post_type');

// if (!function_exists('custom_post')){
//     function custom_post(){
//         register_post_type('awsome_events', [
//             'label'=>'Custom Post',
//             'description'=> 'This is custom post type',
//             'public'=> true,
//             'menu_position'=> 2131,
//             'menu_icon' => 'dashicons-share-alt'
//             ]
//         );
        
//     }
// }
// add_action('init','custom_post');
if (!function_exists('new_plugin_register_taxonomies')){
    function new_plugin_register_taxonomies(){
        // Taxonomy name: Event Type
        // Related to: Events

        // $taxonomy_name = 'types';
        // $labels = array(
        //     'name' => _x ('Event Types', 'Type of Events'),
        //     'singular_name' => _x('Event Type', 'Type of Event'),
        //     'search_items' => __('Search Event Types'),
        //     'parent_item' => __('Parent Type'),
        //     'all_items' => __('All Types'),
        //     'edit_item' =>__('Edit Type'),
        //     'update_item' =>__('Update Type'),
        //     'delete_item' => __('Delete Type'),
        //     'add_new_item'=> __('Add New Event Type'),
        //     'new_item_name' => __('New Type Name'),
        //     'menu_name'=>__('Event Types')
        // );
        // register_taxonomy($taxonomy_name,array('new_awesome_events'),array(
        //     'hierarchical' => true,
        //     'labels' => $labels,
        //     'show_ui' => true,
        //     'query_var' => true,
        //     'rewrite' => array( 'slug' => 'types')
        // ));


        $taxonomy_mood = 'mood';
        $labels_mood = array(
            'name' => _x ('Mood', 'Moods'),
            'singular_name' => _x('Mood','New mood taxonomy'),
            'search_items' => __('Search Moods'),
            'all_items' => __('All Moods'),
            'edit_item' =>__('Edit Mood'),
            'update_item' =>__('Update Mood'),
            'delete_item' => __('Delete Mood'),
            'add_new_item'=> __('Add New Mood '),
            'new_item_name' => __('New Mood Name'),
            'menu_name'=>__('Mood')
        );
        register_taxonomy($taxonomy_mood,array('new_awesome_events'),array(
            'hierarchical' => false,
            'labels' => $labels_mood,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'moods')
        ));
        
    }
}
add_action('init', 'new_plugin_register_taxonomies' );


if (!function_exists('events_post')){
    function events_post(){
        $labels =array(
            'name'                     => _x( 'Events', 'Events type general name' ),
            'singular_name'            => _x( 'Event', 'Event type singular name' ),
            'add_new'                  => _x( 'Add New Event', 'post' ),
            'add_new_item'             => __( 'Add New Event' ),
            'edit_item'                => __( 'Edit Event' ),
            'new_item'                 => __( 'New Event' ),
            'view_item'                => __( 'View Event' ),
            'view_items'               => __( 'View Events' ),
            'search_items'             => __( 'Search Events' ),
            'not_found'                => __( 'No Events found.' ),
            'not_found_in_trash'       => __( 'No Events found in Trash.' ), 
            'all_items'                => __( 'All Event' ),
            'archives'                 => __( 'Event Archives' ),
            'attributes'               => __( 'Event Attributes' ), 
            'insert_into_item'         => __( 'Insert into Event' ), 
            'uploaded_to_this_item'    => __( 'Uploaded to this Event' ),
            'featured_image'           => _x( 'Featured image', 'Event' ), 
            'set_featured_image'       => _x( 'Set featured image', 'Event' ), 
            'remove_featured_image'    => _x( 'Remove featured image', 'Event' ), 
            'use_featured_image'       => _x( 'Use as featured image', 'Event' ),
            'filter_items_list'        => __( 'Filter Event list' ),
            'filter_by_date'           => __( 'Filter by date' ),
            'items_list_navigation'    => __( 'Event list navigation' ), 
            'items_list'               => __( 'Event list' ),
            'item_published'           => __( 'Event published.' ), 
            'item_published_privately' => __( 'Event published privately.' ), 
            'item_reverted_to_draft'   => __( 'Event reverted to draft.' ),
            'item_scheduled'           => __( 'Event scheduled.' ), 
            'item_updated'             => __( 'Event updated.' ),
        );
        register_post_type('new_awesome_events', [
            'labels'=>$labels,
            'description'=> 'This is events post type',
            'public'=> true,
            'menu_position'=> null,
            'menu_icon' => 'dashicons-admin-site-alt',
            'capability_type' => 'post',
            'capabilities' => array(
                'edit_post' => 'edit_event',
                'edit_posts' => 'edit_events',
                'edit_others_posts' => 'edit_other_events',
                'publish_posts' => 'publish_events',
                'read_post' => 'read_events',
                'read_private_posts' => 'read_private_events',
                'delete_post' => 'delete_event'
            ),
            'map_meta_cap' => true,
            'has_archive'   => 'new_awesome_events'
            ]
        );
        
    }
}
add_action('init','events_post');

function add_event_caps() {
    $role = get_role( 'administrator' );
    $role->add_cap( 'edit_event' ); 
    $role->add_cap( 'edit_events' ); 
    $role->add_cap( 'edit_others_events' ); 
    $role->add_cap( 'publish_events' ); 
    $role->add_cap( 'read_event' ); 
    $role->add_cap( 'read_private_events' ); 
    $role->add_cap( 'delete_event' ); 
    $role->add_cap( 'edit_published_events' );   //added
    $role->add_cap( 'delete_published_events' ); //added
  }
  add_action( 'admin_init', 'add_event_caps');


// if (!function_exists('post_parties')){
//     function post_parties(){
//         register_post_type('parties', [
//             'label'=>'Parties Post',
//             'description'=> 'This is parties post type',
//             'public'=> true,
//             'menu_position'=> null,
//             'menu_icon' => 'dashicons-admin-site-alt',
//             'capability_type' => 'post',
//             'capabilities' => array(
//                 'edit_post' => 'edit_party',
//                 'edit_posts' => 'edit_parties',
//                 'edit_others_posts' => 'edit_other_parties',
//                 'publish_posts' => 'publish_parties',
//                 'read_post' => 'read_parties',
//                 'read_private_posts' => 'read_private_parties',
//                 'delete_post' => 'delete_party'
//             ),
//             'map_meta_cap' => true,
//             'has_archive' => false
//             ]
//         );
        
//     }
// }
// add_action('init','post_parties');

// function add_event_caps_2() {
//     $role = get_role( 'editor' );
//     $role->add_cap( 'edit_party' ); 
//     $role->add_cap( 'edit_parties' ); 
//     $role->add_cap( 'edit_other_parties' ); 
//     $role->add_cap( 'publish_parties' ); 
//     $role->add_cap( 'read_parties' ); 
//     $role->add_cap( 'read_private_parties' ); 
//     $role->add_cap( 'delete_party' ); 
//     $role->add_cap( 'edit_published_parties' );   //added
//     $role->add_cap( 'delete_published_parties' ); //added
//   }
//   add_action( 'admin_init', 'add_event_caps_2');

if( !function_exists( 'new_plugin_deactivate' ) ) {
    function new_plugin_deactivate() {
        unregister_post_type('post_parties');
        flush_rewrite_rules();
    }
}

if( !function_exists( 'new_plugin_uninstall' ) ) {
    function new_plugin_uninstall() {
    }
}


register_activation_hook( __FILE__, 'new_plugin_activate' );
register_deactivation_hook( __FILE__ , 'new_plugin_deactivate' );
register_uninstall_hook(__FILE__, 'new_plugin_uninstall');

?>