<?php /* Template Name: home */
set_query_var('ENTRY', 'home');
get_header();
$banners = get_field("banners");
$segmentos_title = get_field("segmentos_title");
$segmentos = get_field("segmentos");
$soluciones_title = get_field("soluciones_title");
$soluciones = get_field("soluciones");
$bannerimagen = get_field("bannerimagen");
$bannerlink = get_field("bannerlink");
$products_title = get_field("products_title");
?>
<?php 
    include get_template_directory() . '/inc/preload.php';
?>
<section class="banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="banner__title">
        <div class="x-container">
            <h1>
                <?php the_title(); ?>
            </h1>
            <p><?php the_field("subtitle"); ?></p>
            <a href="<?php the_field("linkbanner"); ?>" class="btn">Ver más</a>
        </div>
    </div>
</section>

<section class="boxes">
    <div class="x-container">
        <div class="boxmultiple">
            <div class="box">
                <img src="<?php the_field("box1"); ?>">
            </div>
            <div class="box">
                <div class="boxContent">
                    <div class="boxContent__content">
                        <?php the_field("boxcontent"); ?>
                        <a href="<?php the_field("boxlink"); ?>" class="btn btnTransparent">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="<?php the_field("box2"); ?>">
            </div>
        </div>
    </div>
</section>

<section class="organizadores" style="background-image: url(<?php the_field("organizadores_background"); ?>);">
    <div class="x-container">
        <div class="organizadorestitle">
            <?php the_field("organizadores"); ?>
            <a href="<?php the_field("organizadores_link"); ?>" class="btn btnTransparent">Ver más</a>
        </div>
    </div>
</section>

<section class="decoratorivos" >
    <div class="x-container">
        <div class="decoratorivos__flex">
            <div class="decoratorivos__left">
                <img src="<?php the_field("decoratorivos_img"); ?>">
            </div>
            <div class="decoratorivos__right">
                <?php the_field("decoratorivos"); ?>
                <a href="<?php the_field("decoratorivos_link"); ?>" class="btn btnTransparent">Comprar</a>
            </div>            
        </div>
    </div>
</section>

<section class="productsvendido productsvendidoClass">
    <div class="x-container">
        <div class="subtitle">
            <div class="content"><?php echo get_field("product_title"); ?></div>
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
        <div class="vendidosswiper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                        $products = get_field("products");
                        if ($products) {
                            foreach ($products as $product) {
                                $myid = $product["id"];
                                $myproduct = wc_get_product($myid);
                                ?>
                    <div class="swiper-slide">
                        <div class="myproduct">
                            <div class="myproduct__img">
                                <a href="<?php echo get_permalink($myid); ?>">
                                    <span class="tags">
                                    <?php 
                                        $category_ids = $myproduct->get_category_ids();
                                        
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
                                    <div class="price"><?php echo $myproduct->get_price_html(); ?></div>
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
                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="organizadores backgroundFundas">
    <div class="backgroundfundasContent" style="background-image: url(<?php the_field("banner2_background"); ?>);"></div>
    <div class="x-container">
        <div class="organizadorestitle">
            <?php the_field("banner2"); ?>
            <a href="<?php the_field("banner2_link"); ?>" class="btn btnTransparent">Ver más</a>
        </div>
    </div>
</section>

<section class="ropabox productsvendidoClass">
    <div class="x-container">
        <div class="subtitle">
            <div class="content"><?php echo get_field("ropa_title"); ?></div>
        </div>
        <div class="ropaestilos">
            <?php 
                $ropa = get_field("ropa");
                if ($ropa) {
                    foreach ($ropa as $rr) {
                        ?>
            <div class="ropa">
                <img src="<?php echo $rr["imagen"]; ?>">
            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section>

<section class="productsvendido2 productsvendidoClass">
    <div class="x-container">
        <div class="subtitle">
            <div class="content"><?php echo get_field("product_title2"); ?></div>
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
        <div class="vendidosswiper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                        $products = get_field("products2");
                        if ($products) {
                            foreach ($products as $product) {
                                $myid = $product["id"];
                                $myproduct = wc_get_product($myid);
                                ?>
                    <div class="swiper-slide">
                        <div class="myproduct">
                            <div class="myproduct__img">
                                <a href="<?php echo get_permalink($myid); ?>">
                                    <span class="tags">
                                    <?php 
                                        $category_ids = $myproduct->get_category_ids();
                                        
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
                                    <div class="price"><?php echo $myproduct->get_price_html(); ?></div>
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
                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>


