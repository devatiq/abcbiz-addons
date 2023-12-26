<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

        $abcbiz_widgets = [];

		// Conditionally add widgets to the array based on the settings
          if (get_option('abcbiz_blockquote_widget_field') == 1) {
          $abcbiz_widgets[] = \includes\widgets\ABCBlockquote\Main::class;
        }
		  if (get_option('abcbiz_blog_fancy_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCBlog\Main::class;
		}
		if (get_option('abcbiz_author_bio_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCBlogAuthor\Main::class;
		}
		if (get_option('abcbiz_blog_grid_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCBlogGrid\Main::class;
		}
		if (get_option('abcbiz_blog_list_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCBlogList\Main::class;
		}
		if (get_option('abcbiz_breadcrumb_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCBreadCrumb\Main::class;
		}
		if (get_option('abcbiz_cat_list_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCCatInfo\Main::class;
		}
		if (get_option('abcbiz_contact_form7_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCCF7\Main::class;
		}
		if (get_option('abcbiz_circular_skill_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCCircularSkills\Main::class;
		}
		if (get_option('abcbiz_comment_form_widget_field') == 1) {
			$abcbiz_widgets[] = \includes\widgets\ABCCommentForm\Main::class;
		}

		  // Add other widgets that are always active
		   $abcbiz_widgets[] = \includes\widgets\ABCCounter\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCFeturedImg\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCIconBox\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPageTitle\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPopup\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPostInfo\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPostTitle\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPricingTable\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCRecentPost\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCRelatedPost\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCSearchForm\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCShape\Main::class;

			//\inc\widgets\ABCIconBox\Main::class,
			//\inc\widgets\ABCWorkBox\Main::class,
			//\inc\widgets\ABCTeamMember\Main::class,
			//\inc\widgets\ABCTestimonials\Main::class,
			//\inc\widgets\ABCSkillBar\Main::class,
			//\inc\widgets\ABCShape\Main::class,
			//\inc\widgets\ABCSecTitle\Main::class,
			//\inc\widgets\ABCTagInfo\Main::class,
			//\inc\widgets\ABCRelatedPost\Main::class,
			//\inc\widgets\ABCSocialShare\Main::class,
			//\inc\widgets\ABCSearchForm\Main::class,

			//WooCommerce Widgets
			//\inc\widgets\WooCommerce\ABCProductTitle\Main::class,
			//\inc\widgets\WooCommerce\ABCProductImg\Main::class,
			//\inc\widgets\WooCommerce\ABCProductSummery\Main::class,

		foreach ($abcbiz_widgets as $widget_class) {
			$abcbiz_widgets_manager->register(new $widget_class());
		}