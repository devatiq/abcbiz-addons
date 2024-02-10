<?php
/**
 * Render View file for ABC Testimonial Grid.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_unique_id = $this->get_id();

// query testimonial from elementor settings
$abcbiz_repeater_testimonial = $abcbiz_settings['abcbiz_testimonial_repeater'];
?>

<!-- Start Testimonial Wrapper -->
<div class="abcbiz-testimonial-wrapper-area">
    <div class="abcbiz-testimonial-wrapper">

        <!-- Testimonial Slider -->
        <div class="abcbiz-testimonial-slider abcbiz-testimonial-grids">

            <?php
            if (!empty($abcbiz_repeater_testimonial)) :
                foreach ($abcbiz_repeater_testimonial as $abcbiz_testimonial ) :      
                    $testimonial_name = $abcbiz_testimonial['testimonial_name'];
                    $testimonial_designation = $abcbiz_testimonial['testimonial_designation'];
                    $testimonial_feedback = $abcbiz_testimonial['testimonial_feedback'];
                    $testimonial_rating = $abcbiz_testimonial['testimonial_rating'];   
                    $testimonial_img = $abcbiz_testimonial['testimonial_client_image'];   

            ?>
                    <!--Single Testimonial-->
                    <div class="abcbiz-testimonial-single-item">
                        <!--Header Part-->
                        <div class="abcbiz-testimonial-header">
                            <!--Client Image-->
                            <?php if ('yes' == $abcbiz_settings['abcbiz_ele_testimonial_client_image_switch']) : ?>                           
                            <div class="abcbiz-testimonial-client-img" id="abcbiz-testimonial-client-img">                                
                                <?php if (!empty($testimonial_img['url'])) :                                                            
                                    echo '<img src="'.$testimonial_img['url'].'" alt="Client Image">';
                                else :
                                ?>
                                    <img src="<?php echo esc_attr(AbcBizElementor_Assets); ?>/img/member-placeholder.jpg" alt="">
                                <?php endif; ?>
                            </div>
                            <?php endif; ?> <!--/ Client Image-->
                            <div class="abcbiz-testimonial-client-info">
                                <?php if(!empty($testimonial_name)) : ?>
                                    <h3><?php echo esc_html($testimonial_name); ?></h3>
                                <?php endif; ?>

                                <?php if (!empty($testimonial_designation)) : ?>
                                    <p><?php echo esc_html($testimonial_designation); ?></p>
                                <?php endif; ?>
                            </div>
                        </div><!--/ Header Part-->

                        <!--Rating Part-->
                        <div class="abcbiz-testimonial-rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                $star_class = ($i <= $testimonial_rating) ? 'eicon-star' : ' ';
                                echo "<i class='{$star_class}'></i>";
                            }
                            ?>
                        </div><!--/ Rating Part-->
                        
                        <?php if(!empty($testimonial_feedback)) : ?>
                            <!--Content Part-->
                            <div class="abcbiz-testimonial-content">
                                <p><?php echo esc_html($testimonial_feedback); ?></p>
                            </div><!--/ Content Part-->
                        <?php endif; ?>

                        <!--Quote Part-->
                        <div class="abcbiz-testimonial-quote">

                            <?php
                            if (!empty($abcbiz_settings['abcbiz_ele_testimonial_item_quote_icon']['library'])) :
                                \Elementor\Icons_Manager::render_icon($abcbiz_settings['abcbiz_ele_testimonial_item_quote_icon'], ['aria-hidden' => 'true']);
                            else :
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="68" height="50" viewBox="0 0 68 50" fill="none">
                                    <mask id="mask0_147_7210" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="68" height="50">
                                        <path d="M68 0H0V49.8333H68V0Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_147_7210)">
                                        <path d="M18.4355 0.958008C27.4644 0.958008 33.9999 8.62457 33.9999 19.7796C33.9999 36.0712 21.8354 47.6097 4.41985 49.833C4.08581 49.8628 3.75216 49.773 3.47656 49.5792C3.20097 49.3853 3.00094 49.0996 2.91119 48.7717C2.82144 48.4439 2.84762 48.0944 2.9852 47.7841C3.12279 47.4738 3.36294 47.2224 3.66425 47.0731C10.3509 44.0831 13.751 40.2497 14.1666 36.4547C14.4006 35.2745 14.2186 34.0483 13.6524 32.9903C13.0862 31.9324 12.1718 31.1099 11.0688 30.6663C6.11989 29.478 2.83325 23.2297 2.83325 16.7897C2.83325 12.5909 4.47708 8.56403 7.40306 5.59502C10.329 2.62601 14.2975 0.958008 18.4355 0.958008Z" fill="white" />
                                        <path d="M52.4351 0.958008C61.464 0.958008 67.9995 8.62457 67.9995 19.7796C67.9995 36.0712 55.835 47.6097 38.4195 49.833C38.0854 49.8628 37.7518 49.773 37.4762 49.5792C37.2006 49.3853 37.0006 49.0996 36.9108 48.7717C36.8211 48.4439 36.8473 48.0944 36.9848 47.7841C37.1224 47.4738 37.3626 47.2224 37.6639 47.0731C44.3506 44.0831 47.7507 40.2497 48.1662 36.4547C48.4002 35.2745 48.2182 34.0483 47.652 32.9903C47.0858 31.9324 46.1714 31.1099 45.0684 30.6663C40.1195 29.478 36.8329 23.2297 36.8329 16.7897C36.8329 12.5909 38.4767 8.56403 41.4027 5.59502C44.3287 2.62601 48.2972 0.958008 52.4351 0.958008Z" fill="white" />
                                    </g>
                                </svg>
                            <?php endif; ?>
                        </div><!--Quote Part-->
                    </div><!--/ Single Testimonial-->

            <?php
                endforeach;             
            ?>
            
            <?php
            endif;
            ?>
        </div><!--/ Testimonial Slider -->
    </div>
</div><!--/ End Testimonial Wrapper -->