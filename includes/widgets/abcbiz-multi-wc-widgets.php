<?php 
/*
WooCommerce Widgets
*/
if (!defined('ABSPATH')) exit; // Exit if accessed directly

//$abcbiz_widgets[] = \includes\widgets\WooCommerce\ABCProductAddToCart\Main::class;
if (get_option('abcbiz_wc_product_cart_icon_field') == 1) {
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCartIcon\Main::class;
}

$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCartPage\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCheckout\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductImg\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductMeta\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductPrice\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductRelated\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductShortDesc\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductTabs\Main::class;
$abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductTitle\Main::class;