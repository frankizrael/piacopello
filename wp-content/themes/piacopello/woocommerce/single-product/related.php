<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products productsvendidoClass">
		<div class="subtitle">
            <div class="content">Recomendado</div>
            <div class="buttonsadd">
                <div class="buttonleft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="178" height="16" viewBox="0 0 178 16" fill="none">
                        <path d="M0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM36 7L1 7V9L36 9V7Z" fill="black"/>
                    </svg>
                </div>
                <div class="minepagination"></div>
                <div class="buttonright">
                    <svg xmlns="http://www.w3.org/2000/svg" width="178" height="16" viewBox="0 0 178 16" fill="none">
                        <path d="M177.707 8.70711C178.098 8.31659 178.098 7.68342 177.707 7.2929L171.343 0.928935C170.953 0.53841 170.319 0.53841 169.929 0.928935C169.538 1.31946 169.538 1.95262 169.929 2.34315L175.586 8L169.929 13.6569C169.538 14.0474 169.538 14.6805 169.929 15.0711C170.319 15.4616 170.953 15.4616 171.343 15.0711L177.707 8.70711ZM142 9L177 9L177 7L142 7L142 9Z" fill="black"/>                                                
                    </svg>
                </div>
            </div>
        </div>
		<div class="swiper-container">
            <div class="swiper-wrapper">
			<?php foreach ( $related_products as $related_product ) : ?>
				<div class="swiper-slide">
					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>
				</div>
			<?php endforeach; ?>
			<div>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();

