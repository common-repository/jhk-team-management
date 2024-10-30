<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class jhktm_Metaboxes {

    /** Define the metabox and field configurations. **/
    public function __construct(){
        add_action( 'cmb2_init', [$this, 'create_jhktm_metaboxes'] );
    }

    function create_jhktm_metaboxes() {
        $jhktmb_general = new_cmb2_box(
            array(
                'id'            => 'jhktm_cmb_metabox_general',
                'title'         =>  esc_html__( 'General Information', 'jhk-team-management' ),
                'object_types'  => ['jhk_team_management'], // post type 
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true
            )
        );

        /** Short Bio **/
        $jhktmb_general->add_field( array(
            'name'       => esc_html__( 'Short Bio', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Short Bio of this team member', 'jhk-team-management' ),
            'id'         => 'jhktmb_short_bio',
            'type'       => 'textarea',
        ) );

        /** Job Title **/
        $jhktmb_general->add_field( array(
            'name'       => esc_html__( 'Job Title', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Job title of this team member', 'jhk-team-management' ),
            'id'         => 'jhktmb_job_title',
            'type'       => 'text',
        ) );

        /** Email Address **/
        $jhktmb_general->add_field( array(
            'name'       => esc_html__( 'Email Address', 'jhk-team-management' ),
            // 'desc'       => esc_html__( 'Job title of this team member', 'jhk-team-management' ),
            'id'         => 'jhktmb_email',
            'type'       => 'text_email',
        ) );

        /** Phone Number **/
        $jhktmb_general->add_field( array(
            'name'       => esc_html__( 'Phone Number', 'jhk-team-management' ),
            // 'desc'       => esc_html__( 'Job title of this team member', 'jhk-team-management' ),
            'id'         => 'jhktmb_phone',
            'type'       => 'text',
        ) );

        /** Experience **/
        $jhktmb_general->add_field( array(
            'name'       => esc_html__( 'Years of Experience', 'jhk-team-management' ),
            // 'desc'       => esc_html__( 'Job title of this team member', 'jhk-team-management' ),
            'id'         => 'jhktmb_experience',
            'type'       => 'text',
        ) );

        /** Image **/
        $jhktmb_general->add_field( array(
            'name'    => 'Add File',
            'desc'    => 'Upload a Profile details',
            'id'      => 'jhktmb_vcard',
            'type'    => 'file',
            // Optional:
            'options' => array(
                //'url' => false, // Hide the text input for the url
                'url' => true, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
            ),
            // query_args are passed to wp.media's library query.
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );

        $jhktmb_social = new_cmb2_box(
            array(
                'id'            => 'jhktm_cmb_metabox_social',
                'title'         =>  esc_html__( 'Social Information', 'jhk-team-management' ),
                'object_types'  => ['jhk_team_management'], // post type 
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true
            )
        );

        /** Facebook **/
        $jhktmb_social->add_field( array(
            'name'       => esc_html__( 'Facebook', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Facebook Profile link', 'jhk-team-management' ),
            'id'         => 'jhktmb_fblink',
            'type'       => 'text',
        ) );

        /** Instagram **/
        $jhktmb_social->add_field( array(
            'name'       => esc_html__( 'Instagram', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Instagram Profile link', 'jhk-team-management' ),
            'id'         => 'jhktmb_instalink',
            'type'       => 'text',
        ) );

        /** Linkedin **/
        $jhktmb_social->add_field( array(
            'name'       => esc_html__( 'Linkedin', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Linkedin Profile link', 'jhk-team-management' ),
            'id'         => 'jhktmb_lkdlink',
            'type'       => 'text',
        ) );

        /** Twitter **/
        $jhktmb_social->add_field( array(
            'name'       => esc_html__( 'Twitter', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Twitter Profile link', 'jhk-team-management' ),
            'id'         => 'jhktmb_twitlink',
            'type'       => 'text',
        ) );

        /** Youtube **/
         $jhktmb_social->add_field( array(
            'name'       => esc_html__( 'Youtube', 'jhk-team-management' ),
            'desc'       => esc_html__( 'Youtube Profile link', 'jhk-team-management' ),
            'id'         => 'jhktmb_ytblink',
            'type'       => 'text',
        ) );

        
    }
    
}

new jhktm_Metaboxes();

