<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3>Zákazník</h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

		<?php $fields = $checkout->get_checkout_fields( 'billing' );?>
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
					'required'    => false,
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
			<div class="given-name-field billing-float-right">
			<?php
				
				woocommerce_form_field('email', array(
					'type'        => 'email',
					'required'    => true,
					'label'       => __( 'E-mail' ),
					//'description' => 'Please enter your VAT',
				), $checkout->get_value( 'email' ));
	
				/*foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				*/?> 
			</div>
		

		
		
		</div>
		
	

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
