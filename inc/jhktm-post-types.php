<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Meta Box */

class jhktm_Custom_Post_Type {

    public function __construct(){
        add_action( 'init', [$this, 'register_jhk_team_management'], 0 );
    }

    /**
     * register the custom post type for the team management
     */
    public function register_jhk_team_management() {

        $labels = array( 
            'name' => __( 'Team Management', 'jhk-team-management' ),
            'singular_name' => __( 'Team Member', 'jhk-team-management' ),
            'add_new' => __( 'Add New Member', 'jhk-team-management' ),
            'add_new_item' => __( 'Add New ', 'jhk-team-management' ),
            'edit_item' => __( 'Edit Team Member ', 'jhk-team-management' ),
            'new_item' => __( 'New Team Member', 'jhk-team-management' ),
            'view_item' => __( 'View Team Member', 'jhk-team-management' ),
            'search_items' => __( 'Search Team Members', 'jhk-team-management' ),
            'not_found' => __( 'Not found any Team Member', 'jhk-team-management' ),
            'not_found_in_trash' => __( 'No Team Member found in Trash', 'jhk-team-management' ),
            'parent_item_colon' => __( 'Parent Team Member:', 'jhk-team-management' ),
            'menu_name' => __( 'Team', 'jhk-team-management' ),
        );
        
        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,        
            'supports' => array( 'title', 'thumbnail','editor','page-attributes'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,       
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'show_in_rest' => false, // To use Gutenberg editor.
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-groups',
            'rewrite' => array( 'slug' => 'jhk-team-details' ),
        );

        register_post_type( 'jhk_team_management', $args );

        unset( $args );
        unset( $labels );

        /**
         * register Group Taxonomy for the team management
         */
        $labels = array(
            'name'                       => __( 'Groups', 'jhk-team-management' ),
            'singular_name'              => __( 'Group', 'jhk-team-management' ),
            'search_items'               => __( 'Search Groups', 'jhk-team-management' ),
            'popular_items'              => __( 'Popular Groups', 'jhk-team-management' ),
            'all_items'                  => __( 'All Groups', 'jhk-team-management' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Group', 'jhk-team-management' ),
            'update_item'                => __( 'Update Group', 'jhk-team-management' ),
            'add_new_item'               => __( 'Add New Group', 'jhk-team-management' ),
            'new_item_name'              => __( 'New Group Name', 'jhk-team-management' ),
            'separate_items_with_commas' => __( 'Separate Groups with commas', 'jhk-team-management' ),
            'add_or_remove_items'        => __( 'Add or remove Groups', 'jhk-team-management' ),
            'choose_from_most_used'      => __( 'Choose from the most used Groups', 'jhk-team-management' ),
            'not_found'                  => __( 'No Groups found.', 'jhk-team-management' ),
            'menu_name'                  => __( 'Groups', 'jhk-team-management' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true, // To use Gutenberg editor.
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'jhk_team_groups' ),
        );

        register_taxonomy( 'jhk_team_groups', 'jhk_team_management', $args );


        unset( $args );
        unset( $labels );

        /**
         * register Designation Taxonomy for the team management
         */
        $labels = array(
            'name'                       => __( 'Designations', 'jhk-team-management' ),
            'singular_name'              => __( 'Designation', 'jhk-team-management' ),
            'search_items'               => __( 'Search Designation', 'jhk-team-management' ),
            'popular_items'              => __( 'Popular Designation', 'jhk-team-management' ),
            'all_items'                  => __( 'All Designations', 'jhk-team-management' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Designation', 'jhk-team-management' ),
            'update_item'                => __( 'Update Designation', 'jhk-team-management' ),
            'add_new_item'               => __( 'Add New Designation', 'jhk-team-management' ),
            'new_item_name'              => __( 'New Designation', 'jhk-team-management' ),
            'separate_items_with_commas' => __( 'Separate Designations with commas', 'jhk-team-management' ),
            'add_or_remove_items'        => __( 'Add or remove Designation', 'jhk-team-management' ),
            'choose_from_most_used'      => __( 'Choose from the most used Designation', 'jhk-team-management' ),
            'not_found'                  => __( 'No Designation found.', 'jhk-team-management' ),
            'menu_name'                  => __( 'Designations', 'jhk-team-management' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true, // To use Gutenberg editor.
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'jhk_team_designation' ),
        );

        register_taxonomy( 'jhk_team_designation', 'jhk_team_management', $args );

        unset( $args );
        unset( $labels );

        /**
         * register Department Taxonomy for the team management
         */
        $labels = array(
            'name'                       => __( 'Departments', 'jhk-team-management' ),
            'singular_name'              => __( 'Department', 'jhk-team-management' ),
            'search_items'               => __( 'Search Department', 'jhk-team-management' ),
            'popular_items'              => __( 'Popular Department', 'jhk-team-management' ),
            'all_items'                  => __( 'All Departments', 'jhk-team-management' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Department', 'jhk-team-management' ),
            'update_item'                => __( 'Update Department', 'jhk-team-management' ),
            'add_new_item'               => __( 'Add New Department', 'jhk-team-management' ),
            'new_item_name'              => __( 'New Department', 'jhk-team-management' ),
            'separate_items_with_commas' => __( 'Separate Departments with commas', 'jhk-team-management' ),
            'add_or_remove_items'        => __( 'Add or remove Department', 'jhk-team-management' ),
            'choose_from_most_used'      => __( 'Choose from the most used Department', 'jhk-team-management' ),
            'not_found'                  => __( 'No Department found.', 'jhk-team-management' ),
            'menu_name'                  => __( 'Departments', 'jhk-team-management' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true, // To use Gutenberg editor.
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'jhk_team_department' ),
        );

        register_taxonomy( 'jhk_team_department', 'jhk_team_management', $args );

    }

}

new jhktm_Custom_Post_Type();