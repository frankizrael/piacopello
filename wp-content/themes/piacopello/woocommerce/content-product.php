<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 */

defined( 'ABSPATH' ) || exit;

global $product;
$myid = $product->get_id();
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li class="myLisProduct">
	<div class="myproduct">
		<div class="myproduct__img">
			<a href="<?php echo get_permalink($myid); ?>">
				<span class="tags">
				<?php 
					$category_ids = $product->get_category_ids();
					
					$tags = get_term($category_ids[0], 'product_cat');
					echo $tags->name;
				?>
				</span>
				<div class="plus">+</div>
				<img src="<?php echo get_the_post_thumbnail_url($myid); ?>">
			</a>
		</div>
		<div class="myproduct__content">
			<div class="myproduct__descr">
				<h3><?php echo get_the_title($myid); ?></h3>
				<p><?php echo get_field("subtitle", $myid); ?></p>
				<div class="price"><?php echo $product->get_price_html(); ?></div>
			</div>
			<div class="myproduct__addcart">
				<div class="addproduct">
					<?php 
						buttonAdd($myid);
					?>
				</div>
			</div>
		</div>
	</div>
</li>
