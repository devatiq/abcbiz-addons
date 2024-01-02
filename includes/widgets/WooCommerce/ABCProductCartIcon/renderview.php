<?php
/**
 * Render View for WooCommerce Product Cart
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="abcbiz-elementor-wc-cart-icon">
    <?php if ( WC()->cart ) : ?>
        <?php $count = WC()->cart->get_cart_contents_count(); ?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e('View your shopping cart', 'abcbiz-multi'); ?>">
            <i class="eicon-cart-solid"></i>
            <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        </a>
    <?php endif; ?>
</div><!-- /end woocommerce cart -->

<script>
    jQuery(function($) {
    $('body').on('added_to_cart', function() {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'abcbiz_get_cart_count'
            },
            success: function(data) {
                $('.cart-contents-count').text(data);
            }
        });
    });
});
</script>
