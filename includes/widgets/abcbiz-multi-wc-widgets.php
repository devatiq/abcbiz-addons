<?php 
/*
WooCommerce Widgets
*/
if (!defined('ABSPATH')) exit; // Exit if accessed directly

  if (get_option('abcbiz_wc_add_to_cart_icon_field') == 1) {
     $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductAddToCart\Main::class;
 }
  if (get_option('abcbiz_wc_product_cart_icon_field') == 1) {
     $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCartIcon\Main::class;
 }
  if (get_option('abcbiz_wc_cart_page_field') == 1) {
     $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCartPage\Main::class;
 }
  if (get_option('abcbiz_wc_checkout_page_field') == 1) {
     $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductCheckout\Main::class;
 }
  if (get_option('abcbiz_wc_product_img_field') == 1) {
     $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductImg\Main::class;
 }
  if (get_option('abcbiz_wc_product_meta_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductMeta\Main::class;
 }
  if (get_option('abcbiz_wc_product_price_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductPrice\Main::class;
 }
  if (get_option('abcbiz_wc_product_related_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductRelated\Main::class;
 }
  if (get_option('abcbiz_wc_product_short_desc_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductShortDesc\Main::class;
 }
  if (get_option('abcbiz_wc_product_tabs_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductTabs\Main::class;
 }
  if (get_option('abcbiz_wc_product_title_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCProductTitle\Main::class;
 }
  if (get_option('abcbiz_wc_product_bread_crumb_field') == 1) {
    $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCWooBreadCrumb\Main::class;    
 }  
 
 if (get_option('abcbiz_wc_my_account_field') == 1) {
   $abcbiz_widgets[] = \ABCBiz\Includes\Widgets\WooCommerce\ABCWooAccount\Main::class;
 }