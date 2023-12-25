<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

        $abcbiz_widgets = [];

		// Conditionally add widgets to the array based on the settings
          if (get_option('abcbiz_widget_5') == 1) {
          $abcbiz_widgets[] = \includes\widgets\ABCBlockquote\Main::class;
           }

		  // Add other widgets that are always active
           $abcbiz_widgets[] = \includes\widgets\ABCBlog\Main::class;
           $abcbiz_widgets[] = \includes\widgets\ABCBlogAuthor\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCBlogGrid\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCBlogList\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCBreadCrumb\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCCatInfo\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCCF7\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCCircularSkills\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCCommentForm\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPostTitle\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCPageTitle\Main::class;
		   $abcbiz_widgets[] = \includes\widgets\ABCShape\Main::class;
			//\inc\widgets\ABCIconBox\Main::class,
			//\inc\widgets\ABCWorkBox\Main::class,
			//\inc\widgets\ABCTeamMember\Main::class,
			//\inc\widgets\ABCTestimonials\Main::class,
			//\inc\widgets\ABCPricingTable\Main::class,
			//\inc\widgets\ABCSkillBar\Main::class,
			//\inc\widgets\ABCCounter\Main::class,
			//\inc\widgets\ABCPopup\Main::class,
			//\inc\widgets\ABCShape\Main::class,
			//\inc\widgets\ABCSecTitle\Main::class,
		    //\inc\widgets\ABCBreadCrumb\Main::class,
			//\inc\widgets\ABCFeturedImg\Main::class,
			//\inc\widgets\ABCPostInfo\Main::class,
			//\inc\widgets\ABCTagInfo\Main::class,
			//\inc\widgets\ABCRelatedPost\Main::class,

			//\inc\widgets\ABCSocialShare\Main::class,
			//\inc\widgets\ABCSearchForm\Main::class,
			//\inc\widgets\ABCRecentPost\Main::class,

			//WooCommerce Widgets
			//\inc\widgets\WooCommerce\ABCProductTitle\Main::class,
			//\inc\widgets\WooCommerce\ABCProductImg\Main::class,
			//\inc\widgets\WooCommerce\ABCProductSummery\Main::class,

		foreach ($abcbiz_widgets as $widget_class) {
			$abcbiz_widgets_manager->register(new $widget_class());
		}