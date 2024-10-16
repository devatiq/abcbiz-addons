<?php
/**
 * Render View for ABC Fetch Posts Widget
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


$settings = $this->get_settings_for_display();
$website_url = !empty($settings['website_url']) ? esc_url($settings['website_url']) : '';
$posts_count = !empty($settings['fetch_posts_count']) ? intval($settings['fetch_posts_count']) : 5;
$fallback_image = ABCBIZ_Assets . '/img/blog/image-placeholder.jpg';
if (empty($website_url)) {
    echo '<p>' . __('Please enter a valid external website URL.', 'abcbiz-addons') . '</p>';
    return;
}
// Get the current page from the query parameters or default to 1
$current_page = !empty($_GET['primekit_page']) ? intval($_GET['primekit_page']) : 1;

// Build the API endpoint based on the user's input URL
$api_url = trailingslashit($website_url) . 'wp-json/wp/v2/posts?per_page=' . $posts_count . '&page=' . $current_page . '&_embed';

// Fetch posts from the external WordPress site using the REST API
$response = wp_remote_get($api_url);

if (is_wp_error($response)) {
    echo '<p>' . __('Failed to fetch posts from the external website.', 'abcbiz-addons') . '</p>';
    return;
}
$total_pages = wp_remote_retrieve_header($response, 'x-wp-totalpages');
$posts = json_decode(wp_remote_retrieve_body($response));

if (!empty($posts) && is_array($posts)) {
    ?>
    <div
        class="abcbiz-fetch-posts-list <?php if ('grid' === $settings['layout_type']) {
            echo esc_attr('abcbiz-fetch-posts-grid');
        } ?>">
        <?php
        foreach ($posts as $post) {
            // Get the post date and format it
            $post_date = date('M j, Y', strtotime($post->date));
            $category_names = $this->get_category_names($post->categories, $post->_embedded);
            // Get the featured image URL if available
            $thumbnail_url = isset($post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url)
                ? $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url
                : '';
            ?>
            <!--Single Post-->
            <div class="abcbiz-fetch-single-post">
                <!--Thumbnail-->
                <div class="abcbiz-fetch-single-post-thumb">
                    <?php if (!empty($thumbnail_url)): ?>
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post->title->rendered); ?>">
                    <?php else: ?>
                        <img src="<?php echo esc_attr($fallback_image); ?>" alt="<?php echo esc_url($post->link); ?>">
                    <?php endif; ?>
                </div><!--/ Thumbnail-->
                <div class="abcbiz-fetch-single-post-contents">
                    <div class="abcbiz-fetch-single-post-cat">
                        <p>
                            <?php
                            if (!empty($category_names)) {
                                echo esc_html(implode(', ', $category_names));
                            } else {
                                echo esc_html__('No categories', 'custom-elementor-widgets');
                            }
                            ?>
                        </p>
                        <div class="abcbiz-fetch-single-post-info">
                            <span>
                                <svg id="fi_3239948" enable-background="new 0 0 323.358 323.358" height="512"
                                    viewBox="0 0 323.358 323.358" width="512" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <g>
                                            <path
                                                d="m48.863 323.358h225.632c23.653 0 42.875-19.222 42.875-42.875v-213.656c0-23.653-19.222-42.875-42.875-42.875h-17.006v-11.976c0-6.587-5.39-11.976-11.977-11.976s-11.976 5.389-11.976 11.976v11.976h-143.714v-11.976c0-6.587-5.39-11.976-11.977-11.976s-11.976 5.389-11.976 11.976v11.976h-17.006c-23.653 0-42.875 19.222-42.875 42.875v213.656c0 23.653 19.222 42.875 42.875 42.875zm-18.922-256.531c0-10.419 8.503-18.922 18.922-18.922h17.006v11.976c0 6.587 5.389 11.976 11.976 11.976s11.976-5.389 11.976-11.976v-11.976h143.715v11.976c0 6.587 5.389 11.976 11.976 11.976s11.976-5.389 11.976-11.976v-11.976h17.006c10.419 0 18.922 8.503 18.922 18.922v34.971h-263.475zm0 58.923h263.477v154.733c0 10.419-8.503 18.922-18.922 18.922h-225.633c-10.419 0-18.922-8.503-18.922-18.922z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <p><?php echo esc_html($post_date); ?></p>
                        </div>
                    </div>
                    <div class="abcbiz-fetch-single-post-title">
                        <h2>
                            <a href="<?php echo esc_url($post->link); ?>"
                                target="_blank"><?php echo esc_html($post->title->rendered); ?></a>
                        </h2>
                    </div>
                    <div class="abcbiz-fetch-single-post-content">
                        <?php echo wp_kses_post($post->excerpt->rendered); ?>
                    </div>
                    <div class="abcbiz-fetch-single-post-btn">
                        <a href="<?php echo esc_url($post->link); ?>"
                            target="_blank"><?php echo esc_html__('Read More', 'abcbiz-addons'); ?></a>
                    </div>
                </div>
            </div><!--/ Single Post-->
            <?php
        }
        echo '</div><!--/ Post Wrapper-->';

        // display pagination
        if('yes' == $settings['pagination_switch']) {
            $this->abcbiz_get_blog_pagination($total_pages, $current_page);
        }             
       
} else {
    echo '<p>' . __('No posts available from the external website.', 'abcbiz-addons') . '</p>';
}