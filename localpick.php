function local_pickup_discount( $cart ) {
  $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
  $chosen_shipping_no_ajax = $chosen_methods[0];
  if ( 0 === strpos( $chosen_shipping_no_ajax, 'local_pickup' ) ) {
    $discount = $cart->subtotal * 0.15; // Set your percentage. This here gives 15% discount
    $cart->add_fee( __( 'Discount added', 'yourtext-domain' ) , -$discount ); // Change the text if needed
  }
}
add_action( 'woocommerce_cart_calculate_fees', 'local_pickup_discount');