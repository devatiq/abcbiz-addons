<?php
/**
 * ABC Social Share Render View
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_show_single_share_icon = isset($abcbiz_settings['abcbiz_elementor_single_share_icon_show']) && $abcbiz_settings['abcbiz_elementor_single_share_icon_show'] === 'yes';
$abcbiz_show_single_share_icon_mob = isset($abcbiz_settings['abcbiz_elementor_single_share_icon_mob_show']) && $abcbiz_settings['abcbiz_elementor_single_share_icon_mob_show'] === 'yes';
?>

<div class="abcbiz-elementor-social-share-area">

    <?php $abcelsocialtitle = str_replace(' ', '%20', the_title_attribute('echo=0')); ?>

    <ul>
        <?php if ($abcbiz_show_single_share_icon) : ?>
            <li class="abcbiz-single-share<?php if ($abcbiz_show_single_share_icon_mob) : ?> hide-on-mobile<?php endif; ?>"><svg id="fi_3832624" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m1 58.556c-.116 0-.233-.02-.346-.062-.418-.154-.684-.565-.652-1.01.025-.353 2.942-35.002 41.093-37.975l-.092-13.058c-.003-.41.246-.781.627-.934.38-.153.817-.059 1.1.241l20.997 22.218c.364.385.364.987.001 1.372l-21.128 22.417c-.282.301-.721.396-1.101.242-.382-.153-.631-.525-.627-.938l.121-12.726c-25.667 1.844-39.054 19.624-39.188 19.805-.193.262-.494.408-.805.408z"></path></svg></li>
        <?php endif; ?>

        <li><a href="http://twitter.com/home/?status=<?php echo esc_attr($abcelsocialtitle); ?>-<?php the_permalink(); ?>" title="<?php esc_html_e('Tweet This Post', 'abcbiz-multi'); ?>" target=_blank><svg id="fi_5968958" enable-background="new 0 0 1226.37 1226.37" viewBox="0 0 1226.37 1226.37" xmlns="http://www.w3.org/2000/svg"><path d="m727.348 519.284 446.727-519.284h-105.86l-387.893 450.887-309.809-450.887h-357.328l468.492 681.821-468.492 544.549h105.866l409.625-476.152 327.181 476.152h357.328l-485.863-707.086zm-144.998 168.544-47.468-67.894-377.686-540.24h162.604l304.797 435.991 47.468 67.894 396.2 566.721h-162.604l-323.311-462.446z"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a></li>

        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo esc_attr($abcelsocialtitle); ?>" title="<?php esc_html_e('Share on Facebook', 'abcbiz-multi'); ?>" target=_blank><svg id="fi_3128208" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x30_1._Facebook"><path id="Icon_11_" d="m40.4 55.2c-.3 0-6.9 0-9.9 0-1.6 0-2.1-.6-2.1-2.1 0-4 0-8.1 0-12.1 0-1.6.6-2.1 2.1-2.1h9.9c0-.3 0-6.1 0-8.8 0-4 .7-7.8 2.7-11.3 2.1-3.6 5.1-6 8.9-7.4 2.5-.9 5-1.3 7.7-1.3h9.8c1.4 0 2 .6 2 2v11.4c0 1.4-.6 2-2 2-2.7 0-5.4 0-8.1.1-2.7 0-4.1 1.3-4.1 4.1-.1 3 0 5.9 0 9h11.6c1.6 0 2.2.6 2.2 2.2v12.1c0 1.6-.5 2.1-2.2 2.1-3.6 0-11.3 0-11.6 0v32.6c0 1.7-.5 2.3-2.3 2.3-4.2 0-8.3 0-12.5 0-1.5 0-2.1-.6-2.1-2.1 0-10.5 0-32.4 0-32.7z"></path></g></svg></a></li>

        <?php
        global $post;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_url = wp_get_attachment_url($thumbnail_id);
        ?>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($thumbnail_url); ?>" title="<?php esc_html_e('Share on Pinterest', 'abcbiz-multi'); ?>" target=_blank><svg clip-rule="evenodd" fill-rule="evenodd" height="512" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003" id="fi_4423405"><g id="Layer_x0020_1"><path d="m220.57 338.64c-13.44 70.48-29.86 138.06-78.5 173.36-15.01-106.54 22.05-186.55 39.25-271.49-29.34-49.4 3.53-148.8 65.42-124.3 76.15 30.12-65.94 183.63 29.45 202.8 99.6 20.01 140.25-172.81 78.5-235.51-89.24-90.55-259.76-2.07-238.79 127.57 5.1 31.69 37.85 41.31 13.09 85.04-57.12-12.66-74.16-57.7-71.97-117.75 3.53-98.3 88.32-167.12 173.37-176.64 107.55-12.04 208.49 39.48 222.43 140.66 15.7 114.19-48.55 237.86-163.55 228.97-31.18-2.42-44.26-17.87-68.7-32.71z" fill-rule="nonzero"></path></g></svg></a></li>

        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo esc_attr($abcelsocialtitle); ?>&amp;url=<?php the_permalink(); ?>" title="<?php esc_html_e('Share on LinkedIn', 'abcbiz-multi'); ?>" target=_blank><svg id="fi_3128219" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x31_0.Linkedin"><path d="m90 90v-29.3c0-14.4-3.1-25.4-19.9-25.4-8.1 0-13.5 4.4-15.7 8.6h-.2v-7.3h-15.9v53.4h16.6v-26.5c0-7 1.3-13.7 9.9-13.7 8.5 0 8.6 7.9 8.6 14.1v26h16.6z"></path><path d="m11.3 36.6h16.6v53.4h-16.6z"></path><path d="m19.6 10c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.7 9.6 9.7 9.6-4.4 9.6-9.7-4.3-9.6-9.6-9.6z"></path></g></svg></a></li>

        <li><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($abcelsocialtitle); ?>" title="<?php esc_html_e('Share on Reddit', 'abcbiz-multi'); ?>" target=_blank><svg id="fi_2111634" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m21.325 9.308c-.758 0-1.425.319-1.916.816-1.805-1.268-4.239-2.084-6.936-2.171l1.401-6.406 4.461 1.016c0 1.108.89 2.013 1.982 2.013 1.113 0 2.008-.929 2.008-2.038s-.889-2.038-2.007-2.038c-.779 0-1.451.477-1.786 1.129l-4.927-1.108c-.248-.067-.491.113-.557.365l-1.538 7.062c-2.676.113-5.084.928-6.895 2.197-.491-.518-1.184-.837-1.942-.837-2.812 0-3.733 3.829-1.158 5.138-.091.405-.132.837-.132 1.268 0 4.301 4.775 7.786 10.638 7.786 5.888 0 10.663-3.485 10.663-7.786 0-.431-.045-.883-.156-1.289 2.523-1.314 1.594-5.115-1.203-5.117zm-15.724 5.41c0-1.129.89-2.038 2.008-2.038 1.092 0 1.983.903 1.983 2.038 0 1.109-.89 2.013-1.983 2.013-1.113.005-2.008-.904-2.008-2.013zm10.839 4.798c-1.841 1.868-7.036 1.868-8.878 0-.203-.18-.203-.498 0-.703.177-.18.491-.18.668 0 1.406 1.463 6.07 1.488 7.537 0 .177-.18.491-.18.668 0 .207.206.207.524.005.703zm-.041-2.781c-1.092 0-1.982-.903-1.982-2.011 0-1.129.89-2.038 1.982-2.038 1.113 0 2.008.903 2.008 2.038-.005 1.103-.895 2.011-2.008 2.011z"></path></svg></a></li>
    </ul>

</div><!-- social share area -->
