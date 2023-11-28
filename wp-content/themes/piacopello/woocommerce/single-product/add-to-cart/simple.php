<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.
$attributes = $product->get_attributes();
if (!empty($attributes)) {
	?>
	<div class="atributes">
		<?php
		foreach ($attributes as $attribute) {
			echo "<div class='atribute'><p class='mystitle'>".wc_attribute_label($attribute->get_name())."</p>";
			$options = $attribute->get_options();
			$attribute_terms = $attribute->get_terms();
			echo "<ul>";
			foreach ($attribute_terms as $term) {
				$term_name = $term->name;
				$image_id = get_term_meta($term->term_id, 'imagen', true);
				$image_url = wp_get_attachment_image_src($image_id, 'full')[0];
				echo "<li data-id=".$term->term_id."><img src='".$image_url."'><p>".$term_name."</p></li>";
			}
			echo "</ul></div>";
		}
		?>
	</div>
	<?php
}
if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart cartFlex" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="spinner">
			<div class="plus">+</div>
		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
			<div class="minus">-</div>
		</div>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btnBlack single_add_to_cart_button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">Agregar al carrito</button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
