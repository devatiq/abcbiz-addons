<?php
/**
 * Render View file for ABC Team Member 3.
 */

 if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_style_three_id = $this->get_id();
// Extract individual settings
$abcbiz_member_image = $abcbiz_settings['abcbiz_elementor_teammember_image'];
$abcbiz_member_name = $abcbiz_settings['abcbiz_elementor_teammember_name'];
$abcbiz_team_designation = $abcbiz_settings['abcbiz_elementor_teammember_designation'];
$abcbiz_team_phone_number = $abcbiz_settings['abcbiz_elementor_teammember_phone_number'];
$abcbiz_team_email_address = $abcbiz_settings['abcbiz_elementor_teammember_email_address'];
$abcbiz_team_btn_text = $abcbiz_settings['abcbiz_elementor_teammember_btn_text'];
$abcbiz_team_btn_link = $abcbiz_settings['abcbiz_elementor_teammember_btn_link'];
$abcbiz_member_image_dimension = $abcbiz_settings['abcbiz_elementor_teammember_image_dimension'];
?>

<!-- Team Member Style 3 Start -->
<div class="abcbiz-team-member-style-three-area" id="abcbiz-team-member-<?php echo esc_attr($abcbiz_style_three_id); ?>">
    <div class="abcbiz-team-member-style-three-wrap">

        <!-- Team Member Image -->
        <div class="abcbiz-style-three-team-image">
            <?php
            // Process the image and set default if not available
            $abcbiz_member_image_url = '';
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
            <?php if (!empty($abcbiz_team_btn_link)) : ?>
                        <a href="<?php echo esc_url($abcbiz_team_btn_link); ?>">
                    <?php endif; ?>
            <img src="<?php echo esc_url($abcbiz_member_image_url); ?>" alt="<?php echo esc_html($abcbiz_member_name); ?>">
            <?php if (!empty($abcbiz_team_btn_link)) : ?>
                        </a>
                    <?php endif; ?>
        </div><!-- /Team Member Image -->

        <div class="abcbiz-style-three-team-contents">

            <!-- Team Member Designation -->
            <?php if (!empty($abcbiz_team_designation)) : ?>
                <h4 class="abcbiz-style-three-team-designation"><?php echo esc_html($abcbiz_team_designation); ?></h4>
            <?php endif; ?>

            <!-- Team Member Name -->
            <?php if (!empty($abcbiz_member_name)) : ?>
                <h3 class="abcbiz-style-three-team-name">
                    <?php if (!empty($abcbiz_team_btn_link)) : ?>
                        <a href="<?php echo esc_url($abcbiz_team_btn_link); ?>">
                    <?php endif; ?>
                    <?php echo esc_html($abcbiz_member_name); ?>
                    <?php if (!empty($abcbiz_team_btn_link)) : ?>
                        </a>
                    <?php endif; ?>
                </h3>
            <?php endif; ?>

            <!-- Team Member Contact Info -->
            <div class="abcbiz-style-three-team-ontact-info">
                <?php if (!empty($abcbiz_team_phone_number)) : ?>
                    <div class="abcbiz-style-three-team-phone"><svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg" id="fi_2354127"><g id="_x32_7-Phone"><path d="m52.1478348 42.6777344-6.4785156-4.5263672c-.847168-.5908203-1.8374023-.9023438-2.8642578-.9023438-1.6328125 0-3.1655273.8007813-4.0991211 2.140625l-1.5039063 2.1552734c-2.5205078-1.6904297-5.3330097-4.0507813-8.0141621-6.7314453-2.6806641-2.6806641-5.0405273-5.4931641-6.7304688-8.0136719l2.1542969-1.5039063c1.0981445-.7646484 1.831543-1.9101563 2.0644531-3.2246094.2324219-1.3134766-.0605469-2.640625-.8261719-3.7392578l-4.5253906-6.4785156c-.946289-1.3535155-2.4731444-2.1621092-4.0849609-2.1621092-.5585938 0-1.1064453.0986328-1.6279297.2910156-.5922852.21875-1.144043.4873047-1.6850586.8271484l-.8945313.6298828c-.2236328.1738281-.4316406.3642578-.6308594.5634766-1.0913086 1.0908203-1.8657227 2.4716797-2.3027344 4.1044922-1.8647461 6.9902344 2.7548828 17.5605469 11.4951172 26.3007813 7.3398438 7.3398438 16.1577168 11.8994141 23.0117207 11.9003906h.0004883c1.1738281 0 2.2802734-.1367188 3.2890625-.40625 1.6328125-.4365234 3.0136719-1.2109375 4.1054688-2.3027344.1982422-.1982422.3876953-.40625.5908203-.6689453l.6303711-.8994141c.3081055-.4921875.5761719-1.0439453.7978516-1.640625.762207-2.0605469-.0073242-4.4101562-1.871582-5.7128906z"></path></g></svg> <?php echo esc_html($abcbiz_team_phone_number); ?></div>
                <?php endif; ?>
                <?php if (!empty($abcbiz_team_email_address)) : ?>
                    <div class="abcbiz-style-three-team-email"><svg id="fi_2549872" height="512" viewBox="0 0 125 125" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m105.182 97.82h-85.364a10.477 10.477 0 0 1 -10.465-10.466v-52.72a10.477 10.477 0 0 1 10.465-10.466h85.364a10.477 10.477 0 0 1 10.465 10.466v52.72a10.477 10.477 0 0 1 -10.465 10.466zm-85.364-69.652a6.472 6.472 0 0 0 -6.465 6.466v52.72a6.472 6.472 0 0 0 6.465 6.466h85.364a6.472 6.472 0 0 0 6.465-6.466v-52.72a6.472 6.472 0 0 0 -6.465-6.466z"></path><path d="m62.5 72.764a2 2 0 0 1 -1.324-.5l-48.2-42.548 2.647-3 46.877 41.384 46.879-41.379 2.647 3-48.2 42.548a1.994 1.994 0 0 1 -1.326.495z"></path><path d="m5.012 72.393h49.061v4h-49.061z" transform="matrix(.66 -.752 .752 .66 -45.859 47.529)"></path><path d="m93.454 49.862h4v49.062h-4z" transform="matrix(.752 -.66 .66 .752 -25.361 81.43)"></path></svg> <?php echo esc_html($abcbiz_team_email_address); ?></div>
                <?php endif; ?>
            </div><!-- /Contact Info -->

            <!-- Social Icons -->
            <?php if ($abcbiz_settings['abcbiz_elementor_teammember_display_social'] == 'yes') : ?>
                <div class="abcbiz-style-three-team-icons">
                    <?php include __DIR__ . '/partials/social-links.php'; ?>
                </div><!-- /Social Icons -->
            <?php endif; ?>

            <!-- Team Member Button -->
            <?php if (!empty($abcbiz_team_btn_text)) : ?>
                <div class="abcbiz-style-three-team-button">
                    <a href="<?php echo esc_url($abcbiz_team_btn_link); ?>">
                        <?php echo esc_html($abcbiz_team_btn_text); ?> <svg id="fi_9220013" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m75 52h-41.61c-1.1 0-2-.9-2-2s.9-2 2-2h41.61c1.1 0 2 .9 2 2s-.9 2-2 2z"></path><circle clip-rule="evenodd" cx="15.23" cy="50" fill-rule="evenodd" r="2"></circle><circle clip-rule="evenodd" cx="24.31" cy="50" fill-rule="evenodd" r="2"></circle><path d="m61.72 67.62c-.46 0-.92-.16-1.29-.48-.84-.72-.94-1.98-.23-2.82l12.18-14.32-12.18-14.33c-.72-.84-.61-2.1.23-2.82.84-.71 2.1-.61 2.82.23l13.27 15.62c.64.75.64 1.84 0 2.59l-13.28 15.63c-.39.47-.96.7-1.52.7z"></path><path d="m74.22 67.62c-.46 0-.92-.16-1.29-.48-.84-.72-.94-1.98-.23-2.82l12.18-14.32-12.18-14.33c-.72-.84-.61-2.1.23-2.82.84-.71 2.1-.61 2.82.23l13.27 15.62c.64.75.64 1.84 0 2.59l-13.28 15.63c-.39.47-.96.7-1.52.7z"></path></svg>
                    </a>
                </div>
            <?php endif; ?>

        </div><!-- /Team Contents -->

    </div><!-- /Team Member Wrap -->
</div><!-- /Team Member Area End -->