<?php

/**
 * Render View file for ABC Work Box Widget.
 */
$settings = $this->get_settings_for_display();

//empty message
$empty_message = $settings['abc_ele_portfolio_no_found_message'] ? $settings['abc_ele_portfolio_no_found_message'] : esc_html__('No Portfolio Found!', 'ABCMAFTH');

?>
<!-- Portfolio Wrap Start-->
<div class="abc-elementor-portfolio-wrap ">

    <?php
    $terms = get_terms("portfolio-category");
    $count = count($terms);

    //check if filter is enabled
    if ($settings['abc_elementor_portfolio_display_filter'] == 'yes') :
    ?>
        <!-- Portfolio Filter-->
        <ul id="portfolio-filter" class="abc-elementor-portfolio-filter <?php echo $settings['abc_elementor_portfolio_display_filter']; ?>">
            <?php
            echo wp_kses_post(__('<li class="abc-elementor-portfolio-single-filter"><a class="active current" href="#all">All</a></li>', 'ABCMAFTH'));
            if ($count > 0) {

                foreach ($terms as $term) {
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li class="abc-elementor-portfolio-single-filter"><a href="#' . $termname . '" data-rel="' . $termname . '">' . $term->name . '</a></li>';
                }
            }
            ?>
        </ul>
        <!--/ Portfolio Filter-->

    <?php
    endif; // end condition for display filter

    $portfolio = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => esc_attr($settings['abc_elementor_portfolio_number_of_show'])));
    $count = 0;

    ?>

    <div id="portfolio-filter-grid">
        <ul id="portfolio-list" class="abc-elementor-portfolio-content-area">

            <?php if ($portfolio->have_posts()) :

                while ($portfolio->have_posts()) : $portfolio->the_post(); ?>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'portfolio-category');

                    if ($terms && !is_wp_error($terms)) :
                        $links = array();

                        foreach ($terms as $term) {
                            $links[] = $term->name;
                        }
                        $links = str_replace(' ', '-', $links);
                        $tax = join(" ", $links);
                    else :
                        $tax = '';
                    endif;
                    ?>

                    <!--Single Portfolio Item-->
                    <li class="abc-elementor-portfolio-single-area <?php echo strtolower($tax); ?> all">

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <!--Thumbnail-->
                            <div class="abc-elementor-portfolio-single-thumb">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="abc-elementor-port-thumb">
                                        <figure><?php the_post_thumbnail('abcbiz_home_pp_thumb'); ?></figure>
                                    </div>
                                <?php else : ?>
                                    <div class="abc-elementor-port-thumb abc-elementor-port-default-thumb">
                                        <figure>
                                            <img src="<?php echo ABCELEMENTOR_ASSETS; ?>/img/blog/image-placeholder.jpg" alt="">
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <!--Overlay-->
                                <div class="abc-elementor-portfolio-overlay-area">
                                    <div class="abc-elementor-portfolio-left">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo esc_html($terms[0]->name); ?> </p>
                                    </div>
                                    <div class="abc-elementor-portfolio-right">
                                        <a href="<?php the_permalink(); ?>" class="abc-elementor-portfolio-link">
                                                <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="22.5" cy="22.749" r="22.5" fill="#448E08" />
                                                    <path d="M30.5 16.249C30.5 15.9729 30.2761 15.749 30 15.749L25.5 15.749C25.2239 15.749 25 15.9729 25 16.249C25 16.5252 25.2239 16.749 25.5 16.749L29.5 16.749L29.5 20.749C29.5 21.0252 29.7239 21.249 30 21.249C30.2761 21.249 30.5 21.0252 30.5 20.749L30.5 16.249ZM16.3536 30.6026L30.3536 16.6026L29.6464 15.8955L15.6464 29.8955L16.3536 30.6026Z" fill="white" />
                                                </svg>
                                        </a>

                                    </div><!--/ Overlay-->
                                </div><!--/ Thumbnail-->
                        </article>
                    </li><!--/ Single Portfolio Item-->

                <?php endwhile;
            else :
                ?>

                <li class="no-post-found"><?php echo esc_html($empty_message); ?></li>

            <?php endif;
            wp_reset_query(); ?>
        </ul>
        <div class="clear"></div>
    </div> <!-- end #portfolio-->

</div><!--/ Portfolio Wrap End-->