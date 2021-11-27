<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-shipping-fields">
	

		

		<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

		<h3 class="recipient m-2 p-2">Příjemce</h3>
		<?php
		$fields = $checkout->get_checkout_fields( 'shipping' );?>
		<div class="col-12">
			<div class="given-name-field billing-float-left">
			<?php
				woocommerce_form_field('given-name', array(
					'type'        => 'text',
					'required'    => true,
					'label'       => __( 'Jméno' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'given-name' )); ?>
			</div>
			<div class="family-name-field billing-float-right">
			<?php
				woocommerce_form_field('family-name', array(
					'type'        => 'text',
					'required'    => true,
					'label'       => __( 'Příjmení' )
					
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'family-name' ));?>
			</div>
			<div class="phone-field billing-float-left">
			<?php
				woocommerce_form_field('tel', array(
					'type'        => 'tel',
					'required'    => true,
					'label'       => __( 'Telefon' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'tel' ));				?>
			</div>
			<div class="street-name-field billing-float-right">
			<?php
				
				woocommerce_form_field('shipping_address_1', array(
					'type'        => 'text',
					'required'    => true,
					'label'       => __( 'Ulice a č. domu' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'shipping_address_1' ));
	
				/*foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				*/?> 
			</div>
			<div class="city-name-field billing-float-left">
			<?php
				
				woocommerce_form_field('shipping_city', array(
					'type'        => 'text',
					'required'    => true,
					'label'       => __( 'Město' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'shipping_city' ));
	
				/*foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				*/?> 
			</div>
			<div class="zip-code-field billing-float-right">
			<?php
				
				woocommerce_form_field('shipping_postcode', array(
					'type'        => 'number',
					'required'    => true,
					'label'       => __( 'PSČ' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'shipping_postcode' ));
	
				/*foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				*/?> 
			</div>
		</div>
		

		
		
		
	
</div>

<div class="woocommerce-additional-fields p-2 m-2">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>
