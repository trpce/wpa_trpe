<?php 

/**
 * @package portfolio
 */
/*
Plugin Name: Portfolio
Plugin URI: https://google.com/
Description: Manage your portfolios
Version: 1.0.0
Author: Trpe
Author URI: https://google.com
*/

if( !function_exists('portfolio_activate') ) {
    function portfolio_activate() {
        flush_rewrite_rules();
    }
}
if (!function_exists('projects_post_type')){
    function projects_post_type(){
        $labels =array(
            'name'                     => _x( 'Projects', 'Projectstype general name' ),
            'singular_name'            => _x( 'Project', 'Event type singular name' ),
            'add_new'                  => _x( 'Add New Project', 'post' ),
            'add_new_item'             => __( 'Add New Project' ),
            'edit_item'                => __( 'Edit Project' ),
            'new_item'                 => __( 'New Project' ),
            'view_item'                => __( 'View Project' ),
            'view_items'               => __( 'View Project' ),
            'search_items'             => __( 'Search Project' ),
            'not_found'                => __( 'No Project found.' ),
            'not_found_in_trash'       => __( 'No Project found in Trash.' ), 
            'all_items'                => __( 'All Project' ),
            'archives'                 => __( 'Project Archives' ),
            'attributes'               => __( 'Project Attributes' ), 
            'insert_into_item'         => __( 'Insert into Project' ), 
            'uploaded_to_this_item'    => __( 'Uploaded to this Project' ),
            'featured_image'           => _x( 'Featured image', 'Project' ), 
            'set_featured_image'       => _x( 'Set featured image', 'Project' ), 
            'remove_featured_image'    => _x( 'Remove featured image', 'Project' ), 
            'use_featured_image'       => _x( 'Use as featured image', 'Project' ),
            'filter_items_list'        => __( 'Filter Project list' ),
            'filter_by_date'           => __( 'Filter by date' ),
            'items_list_navigation'    => __( 'Project list navigation' ), 
            'items_list'               => __( 'Project list' ),
            'item_published'           => __( 'Project published.' ), 
            'item_published_privately' => __( 'Project published privately.' ), 
            'item_reverted_to_draft'   => __( 'Project reverted to draft.' ),
            'item_scheduled'           => __( 'Project scheduled.' ), 
            'item_updated'             => __( 'Project updated.' ),
        );
        register_post_type('projects', [
            'labels'=>$labels,
            'description'=> 'This is projects post type',
            'public'=> true,
            'menu_position'=> null,
            'menu_icon' => 'dashicons-admin-site-alt',
            'capability_type' => 'post',
            'capabilities' => array(
                'edit_post' => 'edit_project',
                'edit_posts' => 'edit_projects',
                'edit_others_posts' => 'edit_other_projects',
                'publish_posts' => 'publish_projects',
                'read_post' => 'read_projects',
                'read_private_posts' => 'read_private_projects',
                'delete_post' => 'delete_projects'
            ),
            'map_meta_cap' => true,
            'has_archive'   => false
            ]
        );
        
    }
}
add_action('init','projects_post_type');

function add_projects_caps() {
    $role = get_role( 'administrator' );
    $role->add_cap( 'edit_project' ); 
    $role->add_cap( 'edit_projects' ); 
    $role->add_cap( 'edit_others_projects' ); 
    $role->add_cap( 'publish_projects' ); 
    $role->add_cap( 'read_project' ); 
    $role->add_cap( 'read_private_project' ); 
    $role->add_cap( 'delete_project' ); 
    $role->add_cap( 'edit_published_projects' );   //added
    $role->add_cap( 'delete_published_projects' ); //added
  }
  add_action( 'admin_init', 'add_projects_caps');

  if (!function_exists('procjets_register_taxonomies')){
    function procjets_register_taxonomies(){
        // Taxonomy name: Event Type
        // Related to: Events

        $taxonomy_name = 'types';
        $labels = array(
            'name' => _x ('Projects Types', 'Type of Projects'),
            'singular_name' => _x('Project Type', 'Type of Project'),
            'search_items' => __('Search Project Types'),
            'parent_item' => __('Parent Type'),
            'all_items' => __('All Types'),
            'edit_item' =>__('Edit Type'),
            'update_item' =>__('Update Type'),
            'delete_item' => __('Delete Type'),
            'add_new_item'=> __('Add New Project Type'),
            'new_item_name' => __('New Type Name'),
            'menu_name'=>__('Project Types')
        );
        register_taxonomy($taxonomy_name,array('projects'),array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'types')
        ));
    }}

add_action('init', 'procjets_register_taxonomies' );
if( !function_exists( 'portfolio_deactivate' ) ) {
    function portfolio_deactivate() {
        flush_rewrite_rules();
        $terms = get_terms( array(
            'taxonomy'      => 'types',
            'fields'        => 'ids',
            'hide_empty'    => false
        ) );
        // Error log the term IDs for verification we get results.
        error_log( print_r( $terms, 1 ) );
        
        if( ! empty( $terms ) ) {
            foreach( $terms as $term_id ) {
                wp_delete_term( $term_id, 'types' );
            }
        }
        unregister_post_type('projects');
        unregister_taxonomy('types');
    }
}

if( !function_exists( 'portfolio_uninstall' ) ) {
    function portfolio_uninstall() {
    }
}


register_activation_hook( __FILE__, 'portfolio_activate' );
register_deactivation_hook( __FILE__ , 'portfolio_deactivate' );
register_uninstall_hook(__FILE__, 'portfolio_uninstall');