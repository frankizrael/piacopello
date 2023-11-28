<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
set_query_var('ENTRY', 'page');
defined( 'ABSPATH' ) || exit;
$shopid = idshoppage();

get_header( 'shop' );
?>
<!--
<section class="mainwoocommerce">
	<div class="x-container">
		<div class="mainwoocommerce__flex">
			<div class="mainwoocommerce__left">
				<?php
					if (is_active_sidebar('my-sidebar')) {
						dynamic_sidebar('my-sidebar');
					}
				?>
			</div>
			<div class="mainwoocommerce__right">
				<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				do_action( 'woocommerce_before_main_content' );
				?>
				<div class="searchInfo">
					<form role="search" method="get" action="<?php echo site_url(); ?>" class="se-block-search">
						<input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="Buscar ..." value="" type="search" name="s" required="">
						<input type="hidden" name="post_type" value="product">
						<button aria-label="Buscar" class="wp-block-search__button wp-element-button" type="submit">Buscar</button>
					</form>
				</div>
				<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}

				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );

				?>

			</div>
		</div>
	</div>
</section> -->
<div id="app"></div>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script type="text/javascript">
	var MISITIO = "<?php echo site_url();?>";	
	var titulocantidad = "Tenemos más de 150 productos para ti";
</script>
<script src="<?php echo site_url() ?>/wp-content/themes/piacopello/myreact.js?v4"></script>
<?php
get_footer( 'shop' );
