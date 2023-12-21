<?php
/**
 * Render View file for ABC Team Member 1.
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
<div class="abc-elementor-team-member-area abc-team-style-one">
 
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
    <div class="abc-elementor-teammember-single-item-area">
        <div class="abc-ele-team-single-item">
            <?php 
                if($settings['abc_elementor_teammember_display_social' ] == 'yes') :
            ?>
            <!--Social Profile-->
            <div class="abc-ele-team-social">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="#448E08"/>
                    <path d="M25.7999 23.7831C25.3547 23.7828 24.9143 23.8733 24.5072 24.0487C24.1 24.2242 23.7351 24.4806 23.436 24.8016L18.1745 21.631C18.4653 20.9059 18.4653 20.1009 18.1745 19.3758L23.436 16.2052C23.9724 16.7795 24.7099 17.1379 25.5038 17.2104C26.2978 17.2828 27.0909 17.0639 27.7276 16.5967C28.3642 16.1294 28.7986 15.4476 28.9454 14.6848C29.0921 13.922 28.9408 13.1334 28.521 12.4736C28.1011 11.8138 27.4432 11.3305 26.6761 11.1185C25.909 10.9064 25.0882 10.9809 24.3747 11.3273C23.6612 11.6738 23.1064 12.2672 22.8191 12.9911C22.5319 13.715 22.533 14.5173 22.8222 15.2405L17.5606 18.4111C17.1269 17.9465 16.5588 17.6204 15.9311 17.4759C15.3034 17.3314 14.6454 17.3751 14.0437 17.6014C13.442 17.8277 12.9248 18.2259 12.56 18.7436C12.1952 19.2613 12 19.8744 12 20.5021C12 21.1299 12.1952 21.7429 12.56 22.2607C12.9248 22.7784 13.442 23.1766 14.0437 23.4029C14.6454 23.6291 15.3034 23.6729 15.9311 23.5283C16.5588 23.3838 17.1269 23.0578 17.5606 22.5932L22.8222 25.7641C22.5748 26.3831 22.5377 27.0629 22.7161 27.7039C22.8945 28.3449 23.2792 28.9135 23.8138 29.3263C24.3483 29.7392 25.0047 29.9746 25.6867 29.9981C26.3687 30.0215 27.0405 29.8319 27.6037 29.4568C28.1669 29.0818 28.5919 28.5411 28.8165 27.9139C29.041 27.2868 29.0533 26.6061 28.8515 25.9717C28.6497 25.3373 28.2445 24.7824 27.6951 24.3884C27.1458 23.9943 26.4812 23.7818 25.7988 23.782L25.7999 23.7831ZM23.77 14.114C23.77 13.7232 23.8891 13.3412 24.1122 13.0163C24.3353 12.6913 24.6524 12.4381 25.0235 12.2885C25.3945 12.139 25.8027 12.0999 26.1965 12.1762C26.5904 12.2524 26.9522 12.4407 27.2361 12.717C27.52 12.9934 27.7133 13.3455 27.7916 13.7288C27.8699 14.1121 27.8297 14.5093 27.6759 14.8704C27.5222 15.2314 27.2619 15.54 26.928 15.757C26.5941 15.9741 26.2015 16.0899 25.7999 16.0898C25.2617 16.0892 24.7457 15.8809 24.3651 15.5104C23.9846 15.14 23.7705 14.6378 23.77 14.114ZM15.1998 22.4793C14.7982 22.4793 14.4057 22.3634 14.0718 22.1463C13.738 21.9292 13.4777 21.6206 13.3241 21.2595C13.1704 20.8985 13.1302 20.5012 13.2085 20.118C13.2869 19.7347 13.4802 19.3826 13.7642 19.1063C14.0481 18.83 14.4099 18.6418 14.8037 18.5656C15.1975 18.4893 15.6058 18.5285 15.9768 18.678C16.3477 18.8276 16.6648 19.0808 16.8879 19.4057C17.111 19.7306 17.2301 20.1126 17.2301 20.5034C17.2295 21.0273 17.0154 21.5295 16.6348 21.8999C16.2541 22.2703 15.7381 22.4787 15.1998 22.4793ZM23.77 26.8925C23.77 26.5017 23.8891 26.1197 24.1122 25.7947C24.3353 25.4698 24.6524 25.2166 25.0235 25.067C25.3945 24.9175 25.8027 24.8784 26.1965 24.9547C26.5904 25.0309 26.9522 25.2191 27.2361 25.4955C27.52 25.7719 27.7133 26.1239 27.7916 26.5072C27.8699 26.8905 27.8297 27.2878 27.6759 27.6489C27.5222 28.0099 27.2619 28.3184 26.928 28.5355C26.5941 28.7526 26.2015 28.8684 25.7999 28.8683C25.2617 28.8677 24.7457 28.6593 24.3651 28.2889C23.9846 27.9185 23.7705 27.4163 23.77 26.8925Z" fill="white"/>
                </svg>
                <!--Social Profile Overlay-->
                <div class="abc-ele-team-social-overlay">
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
            </div><!--/ Social Profile-->
            <?php endif; ?>

            <!--Team Member Image -->
            <div class="abc-ele-team-image">
                <?php 
                        if (has_post_thumbnail()) : 

                         the_post_thumbnail('full'); 

                        else : 
                    ?>
                        <img src="<?php echo ABCELEMENTOR_ASSETS; ?>/img/teammember/image-placeholder.jpg" alt=""> 

                    <?php endif; ?>
            </div><!--/ Team Member Image -->

            <!--Team Member Content -->
            <div class="abc-ele-team-footer">
                <div class="abc-ele-team-content">
                    <h4 class="abc-ele-team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if(!empty($designation)) : ?>
                        <p class="abc-ele-team-designation"><?php echo esc_html($designation); ?></p>
                    <?php endif; ?>
                </div>
                <div class="abc-ele-team-link">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo ABCELEMENTOR_ASSETS; ?>/img/teammember/right-arrow.svg" alt=""></a>
                </div>
            </div><!--/ Team Member Content -->
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