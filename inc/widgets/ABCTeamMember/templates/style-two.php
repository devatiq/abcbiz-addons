<?php
/**
 * Render View file for ABC Team Member 2
 */
$settings = $this->get_settings_for_display();

 // query team member post type
 $team_member_args = array(
    'post_type' => 'team',
    'posts_per_page' => $settings['abc_ele_teammember_per_page'],
    'order' => 'ASC',
    'orderby' => 'menu_order',
 );
    $team_member = new \WP_Query($team_member_args);

?>

<!-- Team Member Wrap Start-->
<div class="abc-elementor-team-member-area  abc-team-style-two">
 
    <?php 
        if($team_member->have_posts()) :
            while($team_member->have_posts()) :
                $team_member->the_post();


        // get team member designation
        $designation = get_post_meta(get_the_ID(), '_designation', true);
        // get team member social links
        $facebook = get_post_meta(get_the_ID(), '_tfblink', true);
        $twitter = get_post_meta(get_the_ID(), '_ttwlink', true);
        $instagram = get_post_meta(get_the_ID(), '_tinslink', true);
        $linkedin = get_post_meta(get_the_ID(), '_tlinlink', true);
        $printerest = get_post_meta(get_the_ID(), '_tpinlink', true);

    ?>
    <!-- Team Member Single Item-->
    <div class="abc-elementor-teammember-single-item-area-style-two">
        <div class="abc-elementor-team-img" id="abc-elementor-team-style-two-img">
            <?php 
                    if (has_post_thumbnail()) : 

                    the_post_thumbnail('abc-team-member-thumb'); 

                    else : 
                ?>
                    <img src="<?php echo ABCELEMENTOR_ASSETS; ?>/img/teammember/image-placeholder.jpg" alt=""> 

            <?php endif; ?>

            <div class="abc-ele-team-style-two-info">
                <?php if(!empty($designation)) : ?>
                    <div class="abc-elementor-team-designation">                
                    <p><?php echo esc_html($designation); ?></p>               
                    </div>
                <?php endif; ?>

                <div class="abc-elementor-team-name" id="abc-elementor-team-name">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>

                <?php 
                    if($settings['abc_elementor_teammember_display_social' ] == 'yes') :
                ?>
                <!--Social Profile Overlay-->
                <div class="abc-ele-team-social-overlay abc-team-style-two-social">
                    <ul>

                        <?php if(!empty($facebook)) : ?>
                            <li><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        
                        <?php if(!empty($twitter)) : ?>
                            <li><a href="<?php echo esc_url($twitter); ?>"><svg id="Capa_1" enable-background="new 0 0 1227 1227" viewBox="0 0 1227 1227" xmlns="http://www.w3.org/2000/svg"><path d="m654.53 592.55 276.12 394.95h-113.32l-225.32-322.28v-.02l-33.08-47.31-263.21-376.5h113.32l212.41 303.85z"/><path d="m1094.42 0h-961.84c-73.22 0-132.58 59.36-132.58 132.58v961.84c0 73.22 59.36 132.58 132.58 132.58h961.84c73.22 0 132.58-59.36 132.58-132.58v-961.84c0-73.22-59.36-132.58-132.58-132.58zm-311.8 1040.52-228.01-331.84-285.47 331.84h-73.78l326.49-379.5-326.49-475.17h249.02l215.91 314.23 270.32-314.23h73.78l-311.33 361.9h-.02l338.6 492.77z"/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/></svg></a></li>
                        <?php endif; ?>

                        <?php if(!empty($printerest)) : ?>
                            <li><a href="<?php echo esc_url($printerest); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                        <?php endif; ?>   

                        <?php if(!empty($linkedin)) : ?>
                            <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php endif; ?>

                        
                        <?php if(!empty($instagram)) : ?>
                            <li><a href="<?php echo esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>                        
                    </ul>
                </div><!--Social Profile Overlay-->
                <?php endif; ?>
            </div>

        </div>
    </div><!--/ Team Member Single Item-->   
    <?php 
        endwhile;
        wp_reset_postdata();
        else : 
    ?>        
        <li class="no-post-found"><?php esc_html_e('No Team Found', 'ABCMAFTH'); ?></li>

    <?php  endif; ?>

</div><!-- Team Member Wrap Start-->