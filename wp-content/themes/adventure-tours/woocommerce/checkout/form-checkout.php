<?php
/**
 * Checkout Form
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'adventure-tours' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
	<div class="checkout-box padding-all">
		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
	</div>

	<?php endif; ?>
	<div class="product-box padding-all">
		<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'adventure-tours' ); ?></h3>
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
<div id="terms">
<b>Terms:<b/>
<br/>
1) Your card will be charged 30% of the passenger fee (plus tax) to reserve your seat(s) and there will be NO refund if you do not give a 48-hour cancellation notice.<br/>

2) With a full 48-hour cancellation notice, your card will be credited this 30%.<br/>

3) Once your party shows up at the destination location, the total cost will be charged to your card.<br/>

4) All trips are subject to acceptable weather conditions. Tour destinations will be determined based on passenger safety and comfort.<br/>

5) You MUST call Joe @ 808 634-2317 after 7PM the night before your departure date to confirm take off location and favorable weather conditions. Please make a note of this number now.<br/>

</div>
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>

		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>
</form>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
