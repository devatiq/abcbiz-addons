<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Register your widgets dynamically based on the class names.
		$widgets = [

			\includes\widgets\ABCBlockquote\Main::class,
			\includes\widgets\ABCBlog\Main::class,
			\includes\widgets\ABCBlogAuthor\Main::class,
			\includes\widgets\ABCBlogGrid\Main::class,
			\includes\widgets\ABCBlogList\Main::class,
			\includes\widgets\ABCBreadCrumb\Main::class,
			\includes\widgets\ABCCatInfo\Main::class,
			\includes\widgets\ABCCF7\Main::class,
			\includes\widgets\ABCCircularSkills\Main::class,
			\includes\widgets\ABCCommentForm\Main::class,
			\includes\widgets\ABCPostTitle\Main::class,
			\includes\widgets\ABCPageTitle\Main::class,
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

		];

		foreach ($widgets as $widget_class) {
			$widgets_manager->register(new $widget_class());
		}