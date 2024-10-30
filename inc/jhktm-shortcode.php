<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Team management Shortcode
 */

class jhktm_Shortcode{

    public function __construct() {
        add_shortcode( 'jhk_team_management', [$this, 'jhktm_shortcode_callback'] );
    }

    public function jhktm_shortcode_callback( $atts ) {
       
        $atts = shortcode_atts(
            array(
                'team_group'    => '',
                'designation'   => '',
                'department'    => '',
                'orderby'       => 'menu_order',
                'otherinfo'     => 'yes',
                'socialinfo'    => 'yes',
                'contentlayout' => 'grid',
            ),
            $atts,
            'jhk_team_management'
        );

        // Define your query arguments based on shortcode attributes
        $args = array(
            'post_type'      => 'jhk_team_management', 
            'posts_per_page' => -1,
            'tax_query'      => array(),
            'orderby'        => $atts['orderby'],
        );

        // Add taxonomy queries based on user selections
        if ( ! empty( $atts['team_group'] ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'jhk_team_groups', 
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $atts['group'] ),
            );
        }

        if ( ! empty( $atts['designation'] ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'jhk_team_designation', 
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $atts['designation'] ),
            );
        }

        if ( ! empty( $atts['department'] ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'jhk_team_department', 
                'field'    => 'slug',
                'terms'    => sanitize_text_field( $atts['department'] ),
            );
        }

        $query = new WP_Query( $args );
        $layout = esc_attr( $atts['contentlayout'] );
        if ( $query->have_posts() ) {
            ob_start();
            ?>
                        
        <div class="team-members <?php echo esc_attr( $atts['contentlayout'] ); ?> wrapper">
            <?php
            if($layout == 'list'){
                include( plugin_dir_path( __FILE__ ) . '../templates/template-jhktm-content-list.php' );
            }
            if($layout == 'grid'){
                include (plugin_dir_path(__FILE__) . '../templates/template-jhktm-content-grid.php');
            }
            ?>
        </div>
        

        <?php
        wp_reset_postdata();
        return ob_get_clean();
    } else {
        return esc_html__( 'No team members found.', 'jhk-team-management' );
    }
    }
}

new jhktm_Shortcode();