<?php 
set_query_var('ENTRY', 'index');
$frontpage_id = get_option( 'page_on_front' );
$blog_id = get_option( 'page_for_posts' );
get_header(); ?>
<section class="indulbanner" style="background-image:url(<?php echo get_the_post_thumbnail_url($blog_id); ?>)">
    <div class="x-container">
        <div class="titleinside">
            <h1>Aprende y enciende la <b>innovación en tu empresa</b></h1>
            <p>Explora nuestro blog para obtener ideas y consejos energéticos que transformarán tu negocio.</p>
        </div>
    </div>
</section>
<!-- section index init -->
<main id="blog-page" class="x-container">
    <div class="bloggin">
        <div class="noticias__right__content__swiper">
            <?php
                if ( have_posts() ) : ?>
                <?php
                    $aux = 0;
                    // Start the loop.
                    while ( have_posts() ) :
                        the_post();
                        $id = get_the_ID();
                        if ($aux == 0) {
                        ?>
                            <div class="blogmedia">
                                <div class="blogmedia__flex">
                                    <div class="blogmedia__left">
                                        <a href="<?php echo get_permalink($id); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($id); ?>">
                                        </a>
                                    </div>
                                    <div class="blogmedia__right">
                                        <div class="content">
                                            <div class="cdate">
                                                <?php 
                                                    $post_date = get_the_date('F j, Y', $id);
                                                    echo $post_date;
                                                ?>
                                            </div>
                                            <h3><?php echo get_the_title($id); ?></h3>
                                            <div><?php echo get_field("resumen", $id); ?></div>
                                            <a href="<?php echo get_permalink($id); ?>" class="btn btn-arrow-white btn-blue btn-block-blue">
                                                Leer artículo
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 22L21 2" stroke="#2C66CC" stroke-width="3"/><path d="M0.999999 2L21 2L21 22" stroke="#2C66CC" stroke-width="3"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="searchInfo">
                                <form role="search" method="get" action="<?php echo site_url(); ?>" class="se-block-search">
                                    <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="Buscar ..." value="" type="search" name="s" required="">
                                    <input type="hidden" name="post_type" value="product">
                                    <button aria-label="Buscar" class="wp-block-search__button wp-element-button" type="submit">Buscar</button>
                                </form>
                            </div>
                        <?php
                        } else {
                            ?>
                            <div class="blogitem">
                                <a href="<?php echo get_permalink($id); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($id); ?>)">
                                    <div class="content">
                                        <h3><?php echo get_the_title($id); ?> <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 22L21 2" stroke="#2C66CC" stroke-width="3"/><path d="M0.999999 2L21 2L21 22" stroke="#2C66CC" stroke-width="3"/></svg></h3>
                                        <div><?php echo get_field("resumen", $id); ?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        $aux ++;
                    endwhile;
                endif;
            ?>
        </div>
        <div class="pag-link">
            <?php powernature_pagination(); ?>
        </div>
    </div>
</main>
<!-- section index end -->
<?php get_footer(); ?>

