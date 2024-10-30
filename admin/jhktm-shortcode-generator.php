<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Team management shortcode generator class **/

class jhktm_Shortcode_Generator
{
    public function __construct() {
        add_action('admin_menu', [$this, 'register_jhktm_submenu_page'] );
    }

    public function register_jhktm_submenu_page()
    {
        $jhktmb_pagemenu = add_submenu_page( 
            'edit.php?post_type=jhk_team_management', 
            'Shortcode Generator', 
            'Shortcode Generator', 
            'manage_options', 
            'jhktm-shortcode-generator', 
            [$this, 'jhktm_submenu_page_callback'] 
          ); 
      
    }

    public function jhktm_submenu_page_callback()
    {
    ?>
        <div class="wrap">
            <h2><?php esc_html_e('Shortcode Generator','jhk-team-management'); ?></h2> 
            <div class="container-fluid tm-mt-4">
                <div class="tm-row">
                    <div id="shortcode_options_main" class="col-3 tm-pt-3 tm-pb-3 tm-pr-3 tm-pl-3 tm-bg-light">
                        <form id="shortcode_generator_form">
                            <div class="tm-d-flex tm-align-items-center tm-mb-4 tm-pt-2">
                                <label class="col-md-7 col-form-label" for="group"><?php esc_html_e('Select Team Group:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="group" class="form-select" id="group">      
                                        <option value="0"><?php esc_html_e( "All Group", "jhk-team-management" ); ?></option>
                                        <?php 
                                        $terms = get_terms( "jhk_team_groups" );
                                        if(is_array($terms)){
                                            $count = count( $terms );
                                            if ( $count > 0 ){
                                                foreach ( $terms as $term ) {
                                                    printf( "<option value='%s'>%s</option>", esc_attr( $term->slug ), esc_html( $term->name ) );
                                                }
                                            }
                                        }
                                        ?> 
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="designation"><?php esc_html_e('Select Team Designation:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="designation" class="form-select" id="designation">      
                                        <option value="0"><?php esc_html_e( "All Designation", "jhk-team-management" ); ?></option>
                                        <?php 
                                        $designations = get_terms( "jhk_team_designation" );
                                        if(is_array($designations)){
                                            $count = count( $designations );
                                            if ( $count > 0 ){
                                                foreach ( $designations as $designation ) {
                                                    printf( "<option value='%s'>%s</option>", esc_attr( $designation->slug ), esc_html( $designation->name ) );
                                                }
                                            }
                                        }
                                        ?> 
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="department"><?php esc_html_e('Select Team Department:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="department" class="form-select" id="department">      
                                        <option value="0"><?php esc_html_e( "All Department", "jhk-team-management" ); ?></option>
                                        <?php 
                                        $departments = get_terms( "jhk_team_department" );
                                        if(is_array($departments)){
                                            $count = count( $departments );
                                            if ( $count > 0 ){
                                                foreach ( $departments as $department ) {
                                                    printf( "<option value='%s'>%s</option>", esc_attr( $department->slug ), esc_html( $department->name ) );
                                                }
                                            }
                                        }
                                        ?> 
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="orderby"><?php esc_html_e('Order By:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="orderby" class="form-select" id="orderby">      
                                        <option value="menu_order" selected><?php esc_html_e( "Menu Order", "jhk-team-management" ); ?></option>
                                        <option value="date"><?php esc_html_e( "Date", "jhk-team-management" ); ?></option>
                                        <option value="title"><?php esc_html_e( "Title", "jhk-team-management" ); ?></option>
                                        <option value="id"><?php esc_html_e( "Id", "jhk-team-management" ); ?></option>
                                        <option value="modified"><?php esc_html_e( "Modified", "jhk-team-management" ); ?></option>
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="otherinfo"><?php esc_html_e('Show other information:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="otherinfo" class="form-select" id="otherinfo">      
                                        <option value="yes" selected><?php esc_html_e( "Yes", "jhk-team-management" ); ?></option>
                                        <option value="no"><?php esc_html_e( "No", "jhk-team-management" ); ?></option>
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="socialinfo"><?php esc_html_e('Show social information:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="socialinfo" class="form-select" id="socialinfo">      
                                        <option value="yes" selected><?php esc_html_e( "Yes", "jhk-team-management" ); ?></option>
                                        <option value="no"><?php esc_html_e( "No", "jhk-team-management" ); ?></option>
                                    </select>
                                </div>              
                            </div>
                            <div class="tm-d-flex tm-align-items-center tm-mb-4">
                                <label class="col-md-7 col-form-label" for="contentlayout"><?php esc_html_e('Choose Content layout:','jhk-team-management'); ?></label>
                                <div class="col-md-4">
                                    <select name="contentlayout" class="form-select" id="contentlayout">      
                                        <option value="grid" selected><?php esc_html_e( "Grid", "jhk-team-management" ); ?></option>
                                        <option value="list"><?php esc_html_e( "List", "jhk-team-management" ); ?></option>
                                    </select>
                                </div>              
                            </div>
                        </form>
                    </div>
                    <div id="shortcode_preview" class="col-3 tm-pb-3 tm-pr-3 tm-pl-4">
                        <div class="tm-mb-3">
                            <p class="tm-fs-5 tm-mt-0"><?php esc_html_e('Short Code','jhk-team-management'); ?></p>
                            <div id="jhk_tm_shortcode_outputbox" class="tm-bg-dark alert tm-pb-3 tm-pt-3 tm-pr-3 tm-pl-3 sc-box"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

new jhktm_Shortcode_Generator();