<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Team management List Content
*/
?>	
    
<div class="jhktm-main">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php
            $short_bio = sanitize_text_field(get_post_meta($query->post->ID, 'jhktmb_short_bio', true)); 
            $job_title = sanitize_text_field(get_post_meta($query->post->ID, 'jhktmb_job_title', true));
            $member_email = sanitize_email(get_post_meta($query->post->ID, 'jhktmb_email', true));
            $member_phone = sanitize_text_field(get_post_meta($query->post->ID, 'jhktmb_phone', true));
            $member_experience = sanitize_text_field(get_post_meta($query->post->ID, 'jhktmb_experience', true));
            $member_file = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_vcard', true));
            $member_fb_link = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_fblink', true));
            $member_insta_link = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_instalink', true));
            $member_linkd_lin = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_lkdlink', true));
            $member_twitter_link = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_twitlink', true));
            $member_youtube_link = sanitize_url(get_post_meta($query->post->ID, 'jhktmb_ytblink', true));
            $otherinfo_detail = esc_attr($atts['otherinfo']);
            $socialinfo_detail = esc_attr($atts['socialinfo']);
        ?>

		<div class="jhktm-content-<?php echo esc_attr( $atts['contentlayout'] ); ?> item">
			<div class="jhktm-group">
                <?php 
                    if (has_post_thumbnail()) {
                        echo '<div class="jhktm-thumb">';
                        the_post_thumbnail('full'); // You can specify a different image size if needed
                        echo '</div>'; 
                    }
                ?>
				<div class="jhktm-body">
                    <h4 class="jhktm-title" id="title-<?php echo esc_attr(get_the_ID()); ?>"><?php the_title(); ?></h4>
					<?php 
                        if (!empty($job_title)) {
                            echo "<h5>". esc_html__('Job Title: ', 'jhk-team-management'). esc_html($job_title) . "</h5>";
                        } 
                    ?>
					<ul class="jhktm-list">
                        <?php
                            if (!empty($member_experience)) {
                                echo "<li>" . esc_html($member_experience) . "</li>";
                            } 
                            if (!empty($member_phone)) {
                                echo "<li><i class='fa-solid fa-phone tm-pr-2'></i>" . esc_html($member_phone) . "</li>";
                            }
                            if (!empty($member_email)) {
                                echo "<li><i class='fa-solid fa-envelope tm-pr-2'></i>" .  esc_html($member_email) . "</li>";
                            } 
                            if (!empty($member_file)) {
                                echo "<li><a href='" . esc_url($member_file) . "' class='downloadprofile'>" . esc_html__('Download Profile', 'jhk-team-management') . "</a></li>";
                            } 
						echo "<li class='social'>";
                            if (!empty($member_fb_link)) {
                                echo "<a href='" . esc_url($member_fb_link) . "'><i class='fa-brands fa-square-facebook'></i></a>";
                            } 
                            if (!empty($member_insta_link)) {
                                echo "<a href='" . esc_url($member_insta_link) . "'><i class='fa-brands fa-square-instagram'></i></a>";
                            } 
                            if (!empty($member_linkd_lin)) {
                                echo "<a href='" . esc_url($member_linkd_lin) . "'><i class='fa-brands fa-linkedin'></i></a>";
                            } 
                            if (!empty($member_twitter_link)) {
                                echo "<a href='" . esc_url($member_twitter_link) . "'><i class='fa-brands fa-square-twitter'></i></a>";
                            } 
                            if (!empty($member_youtube_link)) {
                                echo "<a href='" . esc_url($member_youtube_link) . "'><i class='fa-brands fa-youtube'></i></a>";
                            } 
                        echo "</li>";
                        ?>
					</ul>
				</div>
			</div>
            <div id="popup-<?php echo esc_attr(get_the_ID()); ?>" class="jhktm-detail-popup">
                <div class="jhktm-detail-overlay"></div>
                <div class="jhktm-detail-panel">
                    <div class="jhktm-detail-panel-content">
                        <div class="jhktm-detail-panel-close"><i class="fa-solid fa-xmark"></i></div>
                        <div class="jhktm-details">
                            <?php
                                echo '<div class="jhktm-thumb">';
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full'); // You can specify a different image size if needed
                                    }
                                echo '</div>'; 
                            ?>
                            <div class="jhktm-body">
                                <h4 class="jhktm-title" id="title-<?php echo esc_attr(get_the_ID()); ?>"><?php the_title(); ?></h4>
                                <?php
                                    if (!empty($job_title)) {
                                        echo "<h5>" . esc_html($job_title) . "</h5>";
                                    } 
                                ?>
                                <ul class="jhktm-list">
                                    <?php
                                        if (!empty($member_experience)) {
                                            echo "<li>" . esc_html($member_experience) . "</li>";
                                        } 
                                        if (!empty($member_phone)) {
                                            echo "<li><i class='fa-solid fa-phone tm-pr-2'></i>" . esc_html($member_phone) . "</li>";
                                        } 
                                        if (!empty($member_email)) {
                                            echo "<li><i class='fa-solid fa-envelope tm-pr-2'></i>" . esc_html($member_email) . "</li>";
                                        } 
                                        
                                        if (!empty($member_file)) {
                                            echo "<li><a href='" . esc_url($member_file) . "' class='downloadprofile'>" . esc_html__('Download Profile', 'jhk-team-management') . "</a></li>";
                                        } 
                                        echo "<li class='social'>";
                                            if (!empty($member_fb_link)) {
                                                echo "<a href='" . esc_url($member_fb_link) . "'><i class='fa-brands fa-square-facebook'></i></a>";
                                            } 
                                            if (!empty($member_insta_link)) {
                                                echo "<a href='" . esc_url($member_insta_link) . "'><i class='fa-brands fa-square-instagram'></i></a>";
                                            } 
                                            if (!empty($member_linkd_lin)) {
                                                echo "<a href='" . esc_url($member_linkd_lin) . "'><i class='fa-brands fa-linkedin'></i></a>";
                                            } 
                                            if (!empty($member_twitter_link)) {
                                                echo "<a href='" . esc_url($member_twitter_link) . "'><i class='fa-brands fa-square-twitter'></i></a>";
                                            } 
                                            if (!empty($member_youtube_link)) {
                                                echo "<a href='" . esc_url($member_youtube_link) . "'><i class='fa-brands fa-youtube'></i></a>";
                                            } 
                                        echo "</li>";
                                    ?>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="member-content">
                            <?php
                            if (!empty($short_bio)) {
                                echo "<p>" . esc_html($short_bio) . "</p>";
                            } ?>
                            <?php echo wp_kses_post(get_the_content()); ?></div>
                    </div>
                </div>
            </div>
		</div>
    <?php endwhile; ?>
</div>

