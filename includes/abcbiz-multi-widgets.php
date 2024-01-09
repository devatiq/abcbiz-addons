<?php
/*
Plugin Widgets
*/
if (!defined('ABSPATH')) exit; // Exit if accessed directly

        $abcbiz_widgets = []; 

          if (get_option('abcbiz_blockquote_widget_field') == 1) {
          $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBlockquote\Main::class;
        }
		  if (get_option('abcbiz_blog_fancy_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBlog\Main::class;
		}
		if (get_option('abcbiz_author_bio_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBlogAuthor\Main::class;
		}
		if (get_option('abcbiz_blog_grid_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBlogGrid\Main::class;
		}
		if (get_option('abcbiz_blog_list_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBlogList\Main::class;
		}
		if (get_option('abcbiz_breadcrumb_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCBreadCrumb\Main::class;
		}
		if (get_option('abcbiz_cat_list_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCatInfo\Main::class;
		}
		if (get_option('abcbiz_contact_form7_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCF7\Main::class;
		}
		if (get_option('abcbiz_circular_skill_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCircularSkills\Main::class;
		}
		if (get_option('abcbiz_comment_form_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCommentForm\Main::class;
		}

		if (get_option('abcbiz_counter_up_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCounter\Main::class;
		}

		if (get_option('abcbiz_feat_img_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCFeturedImg\Main::class;
		}

		if (get_option('abcbiz_flip_box_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCFlipBox\Main::class;
		}

		if (get_option('abcbiz_icon_box_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCIconBox\Main::class;
		}

		if (get_option('abcbiz_img_hover_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCImgHover\Main::class;
		}

		if (get_option('abcbiz_page_title_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPageTitle\Main::class;
		}

		if (get_option('abcbiz_abc_popup_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPopup\Main::class;
		}

		if (get_option('abcbiz_portfolio_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPortfolio\Main::class;
		}

		if (get_option('abcbiz_post_meta_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPostInfo\Main::class;
		}

		if (get_option('abcbiz_post_title_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPostTitle\Main::class;
		}

		if (get_option('abcbiz_pricing_table_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCPricingTable\Main::class;
		}

		if (get_option('abcbiz_recent_post_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCRecentPost\Main::class;
		}

		if (get_option('abcbiz_related_post_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCRelatedPost\Main::class;
		}

		if (get_option('abcbiz_search_form_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCSearchForm\Main::class;
		}

		if (get_option('abcbiz_sec_title_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCSecTitle\Main::class;
		}

		if (get_option('abcbiz_shape_anim_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCShape\Main::class;
		}

		if (get_option('abcbiz_skill_bar_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCSkillBar\Main::class;
		}

		if (get_option('abcbiz_social_share_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCSocialShare\Main::class;
		}

		if (get_option('abcbiz_tag_info_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCTagInfo\Main::class;
		}

		if (get_option('abcbiz_team_member_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCTeamMember\Main::class;
		}

		if (get_option('abcbiz_testi_caro_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCTestimonials\Main::class;
		}

		if (get_option('abcbiz_wp_menu_widget_field') == 1) {
			$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCWpMenu\Main::class;
		}

		$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCSearchIcon\Main::class;
		$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCContactInfo\Main::class;
		$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\ABCCTA\Main::class;

		//WooCommerce widgets
		if (function_exists('is_plugin_active') && is_plugin_active('woocommerce/woocommerce.php')) {
		require_once AbcBizElementor_Path . '/includes/widgets/abcbiz-multi-wc-widgets.php';
		}

		foreach ($abcbiz_widgets as $widget_class) {
			$abcbiz_widgets_manager->register(new $widget_class());
		}