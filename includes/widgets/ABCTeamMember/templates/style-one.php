<?php
/**
 * Render View file for ABC Team Member 1.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_style_one_id = $this->get_id();

$abcbiz_member_image = $abcbiz_settings['abcbiz_elementor_teammember_image'];
$abcbiz_member_name = $abcbiz_settings['abcbiz_elementor_teammember_name'];
$abcbiz_team_designation = $abcbiz_settings['abcbiz_elementor_teammember_designation'];
$abcbiz_member_link = $abcbiz_settings['abcbiz_elementor_teammember_link'];
$abcbiz_member_image_dimension = $abcbiz_settings['abcbiz_elementor_teammember_image_dimension'];
?>

<!-- Team Member Wrap Start -->
<div class="abcbiz-elementor-team-member-area abcbiz-team-style-one" id="abcbiz-team-member-<?php echo esc_attr($abcbiz_style_one_id); ?>">

    <!-- Team Member Single Item -->
    <div class="abcbiz-elementor-teammember-single-item-area">
        <div class="abcbiz-ele-team-single-item">

            <?php if ($abcbiz_settings['abcbiz_elementor_teammember_display_social'] == 'yes') : ?>
                <!-- Social Profile -->
                <div class="abcbiz-ele-team-social">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="#448E08"/>
                    <path d="M25.7999 23.7831C25.3547 23.7828 24.9143 23.8733 24.5072 24.0487C24.1 24.2242 23.7351 24.4806 23.436 24.8016L18.1745 21.631C18.4653 20.9059 18.4653 20.1009 18.1745 19.3758L23.436 16.2052C23.9724 16.7795 24.7099 17.1379 25.5038 17.2104C26.2978 17.2828 27.0909 17.0639 27.7276 16.5967C28.3642 16.1294 28.7986 15.4476 28.9454 14.6848C29.0921 13.922 28.9408 13.1334 28.521 12.4736C28.1011 11.8138 27.4432 11.3305 26.6761 11.1185C25.909 10.9064 25.0882 10.9809 24.3747 11.3273C23.6612 11.6738 23.1064 12.2672 22.8191 12.9911C22.5319 13.715 22.533 14.5173 22.8222 15.2405L17.5606 18.4111C17.1269 17.9465 16.5588 17.6204 15.9311 17.4759C15.3034 17.3314 14.6454 17.3751 14.0437 17.6014C13.442 17.8277 12.9248 18.2259 12.56 18.7436C12.1952 19.2613 12 19.8744 12 20.5021C12 21.1299 12.1952 21.7429 12.56 22.2607C12.9248 22.7784 13.442 23.1766 14.0437 23.4029C14.6454 23.6291 15.3034 23.6729 15.9311 23.5283C16.5588 23.3838 17.1269 23.0578 17.5606 22.5932L22.8222 25.7641C22.5748 26.3831 22.5377 27.0629 22.7161 27.7039C22.8945 28.3449 23.2792 28.9135 23.8138 29.3263C24.3483 29.7392 25.0047 29.9746 25.6867 29.9981C26.3687 30.0215 27.0405 29.8319 27.6037 29.4568C28.1669 29.0818 28.5919 28.5411 28.8165 27.9139C29.041 27.2868 29.0533 26.6061 28.8515 25.9717C28.6497 25.3373 28.2445 24.7824 27.6951 24.3884C27.1458 23.9943 26.4812 23.7818 25.7988 23.782L25.7999 23.7831ZM23.77 14.114C23.77 13.7232 23.8891 13.3412 24.1122 13.0163C24.3353 12.6913 24.6524 12.4381 25.0235 12.2885C25.3945 12.139 25.8027 12.0999 26.1965 12.1762C26.5904 12.2524 26.9522 12.4407 27.2361 12.717C27.52 12.9934 27.7133 13.3455 27.7916 13.7288C27.8699 14.1121 27.8297 14.5093 27.6759 14.8704C27.5222 15.2314 27.2619 15.54 26.928 15.757C26.5941 15.9741 26.2015 16.0899 25.7999 16.0898C25.2617 16.0892 24.7457 15.8809 24.3651 15.5104C23.9846 15.14 23.7705 14.6378 23.77 14.114ZM15.1998 22.4793C14.7982 22.4793 14.4057 22.3634 14.0718 22.1463C13.738 21.9292 13.4777 21.6206 13.3241 21.2595C13.1704 20.8985 13.1302 20.5012 13.2085 20.118C13.2869 19.7347 13.4802 19.3826 13.7642 19.1063C14.0481 18.83 14.4099 18.6418 14.8037 18.5656C15.1975 18.4893 15.6058 18.5285 15.9768 18.678C16.3477 18.8276 16.6648 19.0808 16.8879 19.4057C17.111 19.7306 17.2301 20.1126 17.2301 20.5034C17.2295 21.0273 17.0154 21.5295 16.6348 21.8999C16.2541 22.2703 15.7381 22.4787 15.1998 22.4793ZM23.77 26.8925C23.77 26.5017 23.8891 26.1197 24.1122 25.7947C24.3353 25.4698 24.6524 25.2166 25.0235 25.067C25.3945 24.9175 25.8027 24.8784 26.1965 24.9547C26.5904 25.0309 26.9522 25.2191 27.2361 25.4955C27.52 25.7719 27.7133 26.1239 27.7916 26.5072C27.8699 26.8905 27.8297 27.2878 27.6759 27.6489C27.5222 28.0099 27.2619 28.3184 26.928 28.5355C26.5941 28.7526 26.2015 28.8684 25.7999 28.8683C25.2617 28.8677 24.7457 28.6593 24.3651 28.2889C23.9846 27.9185 23.7705 27.4163 23.77 26.8925Z" fill="white"/>
                </svg>
                    <!-- Social Profile Overlay -->
                    <div class="abcbiz-ele-team-social-overlay">
                            <?php include __DIR__ . '/partials/social-links.php'; ?><!-- social icons -->
                    </div><!-- /Social Profile Overlay -->
                </div><!-- /Social Profile -->
            <?php endif; ?>

            <!-- Team Member Image -->
            <div class="abcbiz-ele-team-image">
            <?php
             if (!empty($abcbiz_member_image['id'])) {
             $abcbiz_image_id = $abcbiz_member_image['id'];
             $abcbiz_image_dimension = $abcbiz_member_image_dimension;

             $abcbiz_image_size = !empty($abcbiz_image_dimension) ? [$abcbiz_image_dimension['width'], $abcbiz_image_dimension['height']] : 'abcbiz_square_img';

             $abcbiz_image_array = wp_get_attachment_image_src($abcbiz_image_id, $abcbiz_image_size);
             $abcbiz_member_image_url = $abcbiz_image_array ? $abcbiz_image_array[0] : '';
           }

            if (empty($abcbiz_member_image_url)) {
            $abcbiz_member_image_url = plugins_url(trim(str_replace(WP_PLUGIN_DIR, '', ABCBIZ_Path), '/') . '/assets/img/member-placeholder.jpg');
           }
          ?>
           <img src="<?php echo esc_url($abcbiz_member_image_url); ?>" alt="<?php echo esc_html($abcbiz_member_name); ?>">
            </div><!-- /Team Member Image -->

            <!-- Team Member Content -->
            <div class="abcbiz-ele-team-footer">
                <div class="abcbiz-ele-team-content">
                    <?php if (!empty($abcbiz_member_name)) : ?>
                        <h4 class="abcbiz-ele-team-name">
                        <?php if (!empty($abcbiz_member_link)) : ?>
                        <a href="<?php echo esc_url($abcbiz_member_link); ?>">
                        <?php endif; ?>
                         <?php echo esc_html($abcbiz_member_name); ?></h4>
                         <?php if (!empty($abcbiz_member_link)) : ?>
                         </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($abcbiz_team_designation)) : ?>
                        <p class="abcbiz-ele-team-designation"><?php echo esc_html($abcbiz_team_designation); ?></p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($abcbiz_member_link)) : ?>
                    <div class="abcbiz-ele-team-link">
                        <a href="<?php echo esc_url($abcbiz_member_link); ?>"><svg id="fi_9220013" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m75 52h-41.61c-1.1 0-2-.9-2-2s.9-2 2-2h41.61c1.1 0 2 .9 2 2s-.9 2-2 2z"></path><circle clip-rule="evenodd" cx="15.23" cy="50" fill-rule="evenodd" r="2"></circle><circle clip-rule="evenodd" cx="24.31" cy="50" fill-rule="evenodd" r="2"></circle><path d="m61.72 67.62c-.46 0-.92-.16-1.29-.48-.84-.72-.94-1.98-.23-2.82l12.18-14.32-12.18-14.33c-.72-.84-.61-2.1.23-2.82.84-.71 2.1-.61 2.82.23l13.27 15.62c.64.75.64 1.84 0 2.59l-13.28 15.63c-.39.47-.96.7-1.52.7z"></path><path d="m74.22 67.62c-.46 0-.92-.16-1.29-.48-.84-.72-.94-1.98-.23-2.82l12.18-14.32-12.18-14.33c-.72-.84-.61-2.1.23-2.82.84-.71 2.1-.61 2.82.23l13.27 15.62c.64.75.64 1.84 0 2.59l-13.28 15.63c-.39.47-.96.7-1.52.7z"></path></svg></a>
                    </div>
                <?php endif; ?>
            </div><!-- /Team Member Content -->

        </div>
    </div><!-- /Team Member Single Item -->   

</div><!-- /Team Member Wrap End -->
