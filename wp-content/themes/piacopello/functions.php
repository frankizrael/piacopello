<?php
/* Theme Support */
add_theme_support('html-5');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('title-tag');
add_theme_support( 'woocommerce' );
add_filter('show_admin_bar', '__return_false');


/* Register custom post types and custom taxonomies */
/*require_once 'inc/register-taxonomy-game.php';*/

/* Bootstrap Nav Walker */
/*require_once 'inc/bootstrap-nav-walker.php';*/

/* Register Widgets */
/*require_once 'inc/register-button-widget.php';*/

/* Register menus */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
		)
	);
}
add_action('init', 'register_my_menus');
add_filter( 'big_image_size_threshold', '__return_false' );
/* Hide posts from menu */
function hide_post_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'hide_post_menu');

/* Load assets */
function load_assets($entries) {
	$assets = file_get_contents(get_stylesheet_directory() . '/assets.json');
	$assets = json_decode($assets);
	foreach ( $assets as $chunk => $files ) {
		foreach ($entries as $entry) {
			if ( $chunk == $entry ) {
				foreach ($files as $type => $asset) {
					switch ($type) {
						case 'js':
							wp_enqueue_script($chunk, get_stylesheet_directory_uri() . '/dist/' . $asset, array(), false, true);
							break;
						case 'css':
							wp_enqueue_style($chunk, get_stylesheet_directory_uri() . '/dist/' . $asset);
					}
				}
			}
		}
	}
}

add_filter( 'woocommerce_rest_check_permissions', 'my_woocommerce_rest_check_permissions', 90, 4 );

function my_woocommerce_rest_check_permissions( $permission, $context, $object_id, $post_type  ){
  return true;
}

add_action('wp_ajax_nopriv_get_sendfilters', 'get_sendfilters');
add_action('wp_ajax_get_sendfilters', 'get_sendfilters');
function get_sendfilters() {
	$taxonomy     = 'product_cat';
    $orderby      = 'name';
    $show_count   = 0;
    $pad_counts   = 0;
    $hierarchical = 1;
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );

    $all_categories = get_terms($args);
    $category_array = array();
    foreach ($all_categories as $cat) {

        // Obtener los hijos de la categoría actual
        $children_args = array(
            'taxonomy'     => $taxonomy,
            'parent'       => $cat->term_id,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );

        $children_categories = get_terms($children_args);

        $childrenarray = array();
        // Agregar los hijos al array
        foreach ($children_categories as $child) {
            array_push($childrenarray, array(
                'name' => $child->name,
                'id'   => $child->term_id
            ));
        }
         
        array_push($category_array ,array(
            'name'  => $cat->name,
            'id'    => $cat->term_id,
            'children' => $childrenarray
        ));
    }

    wp_send_json( $category_array ); 
}

/* Register sidebar */
register_sidebar(array(
	'name' => 'sidebar',
	'id' => 'my-sidebar',
	'before_widget' => '<div id="%1$s" class="col-12 col-md mb-3 mb-md-0 widget %2$s">',
	'after_widget'  => '</div>',
));

/* Remove prefix */
function remove_archive_prefix($title) {
    return preg_replace('/^\w+: /', '', $title);
}
add_filter('get_the_archive_title', 'remove_archive_prefix');

/* Excerpt size */
function tn_custom_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

/* Reduce terms to names */
function reduce_to_names($term) {
    return $term->name;
}

/* Change posts per page */
function change_posts_per_page( $query ) {
	if (is_post_type_archive('comments-matches')) {
		$query->set('posts_per_page', '5');
	}
}
add_action('pre_get_posts', 'change_posts_per_page');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function personalizar_separador_migas_de_pan($defaults) {
    $defaults['delimiter'] = ' <i></i> '; // Cambia el separador a ' > '
    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'personalizar_separador_migas_de_pan');


/*pagination*/
function powernature_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo '<div class="navigation">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32.635 32.635" xml:space="preserve"><g><path d="M32.135,16.817H0.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h31.635c0.276,0,0.5,0.224,0.5,0.5 S32.411,16.817,32.135,16.817z"/><path d="M19.598,29.353c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l12.184-12.184L19.244,4.136 c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0l12.537,12.533c0.094,0.094,0.146,0.221,0.146,0.354 s-0.053,0.26-0.146,0.354L19.951,29.206C19.854,29.304,19.726,29.353,19.598,29.353z"/></g></svg>','decorlux'),
        'next_text' => __('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32.635 32.635" xml:space="preserve"><g><path d="M32.135,16.817H0.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h31.635c0.276,0,0.5,0.224,0.5,0.5 S32.411,16.817,32.135,16.817z"/><path d="M19.598,29.353c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l12.184-12.184L19.244,4.136 c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0l12.537,12.533c0.094,0.094,0.146,0.221,0.146,0.354 s-0.053,0.26-0.146,0.354L19.951,29.206C19.854,29.304,19.726,29.353,19.598,29.353z"/></g></svg>','decorlux'),
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 1
    ));
    echo '</div>';
}

function stars($product_id) {
    $average_rating = get_post_meta($product_id, '_wc_average_rating', true);
    $rating_count = get_post_meta($product_id, '_wc_review_count', true);
    if ($average_rating && $rating_count) {
        echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average_rating) . '"><span style="width:' . ( $average_rating / 5 ) * 100 . '%"><strong itemprop="ratingValue" class="rating">' . esc_html($average_rating) . '</strong></span></div>';        
    } else {
        echo '<div class="star-rating" title="' . __('No rating yet', 'woocommerce') . '"><span style="width:0%"><strong itemprop="ratingValue" class="rating">0</strong></span></div>';        
    }
}

function buttonAdd($product_id) {
    echo '<div class="priceInto"><div class="spinner"><div class="plus">+</div><input type="text" value="1"><div class="minus">-</div></div>';
    echo '<div class="addToCart"><a class="add-to-cart-reload-button btn btnBlack" data-product-id="' . esc_attr($product_id) . '">Agregar al carrito</a></div></div>';
}

function my_add_to_cart() {
    $product_id = isset( $_POST['product_id'] ) ? $_POST['product_id'] : false;

    // Cantidad del producto que deseas agregar al carrito.
    $quantity = 1;
    
    // Obtén el carrito actual de WooCommerce.
    $cart = WC()->cart;
    
    // Añade el producto al carrito.
    $cart_id = $cart->generate_cart_id($product_id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);
    
    /*if (!$cart_item_id) {
        $cart->add_to_cart($product_id, $quantity);
    }*/
    $cart->add_to_cart($product_id, $quantity);
    
    echo json_encode($cart->get_cart_contents_count());
    exit;
}

add_action('wp_ajax_nopriv_my_add_to_cart', 'my_add_to_cart');
add_action('wp_ajax_my_add_to_cart', 'my_add_to_cart');

function idshoppage() {
    $shop_page = get_option('woocommerce_shop_page_id');
    return $shop_page;
}

add_action('wp_footer', 'addAjaxButton');
function addAjaxButton() {
    ?>
    <script>
        jQuery(function($) {
            $(document).on('click', '.add-to-cart-reload-button', function(e) {
                e.preventDefault();
                const $this = $(this);
                const product_id = $(this).data('product-id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        action: 'my_add_to_cart',
                        product_id: product_id
                    },
                    success: function(response) {
                        $(".mycart mark").remove();
                        const tt = '<mark>'+response+'</mark>';
                        $(".mycart").append(tt);
                    }
                });
            });
        });
    </script>
    <?php
}