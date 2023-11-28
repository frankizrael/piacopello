<?php /* Template Name: soluciones */
set_query_var('ENTRY', 'home');
get_header();
$homeid = get_option("page_on_front");
$getid = get_the_ID();
?>
<section class="bannersoluciones">
    <div class="x-container">
        <div class="bannersoluciones__title">
            <span>Soluciones</span>
            <div class="bannersoluciones__flex">
                <div class="bannersoluciones__left">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="bannersoluciones__right">
                    <div><?php the_field("resumen"); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="imagenbackground">
    <div class="x-left-container">
        <img src="<?php the_field("imagen"); ?>">
    </div>
</section>
<section class="contenidocomplete">
    <div class="x-container">
        <div class="contentwp">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<section class="beneficios">
    <div class="x-container">
        <div class="beneficios__flex">
            <div class="beneficios__item beneficios__title">
                <h2>Lo que nos <b>distingue</b></h2>
            </div>
            <?php 
                $beneficios = get_field("beneficios");
                if ($beneficios) {
                    foreach ($beneficios as $ben) {
                        ?>
                        <div class="beneficios__item">
                            <div class="beneficios__inside">
                                <i>
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_181_1027)">
                                        <path d="M38.945 39.4316H10.5449V10.3677H38.945V39.4316ZM13.509 36.4746H35.9809V13.3247H13.509V36.4746Z" fill="white"/>
                                        <path d="M49.4899 27.9192H43.4365V21.8804H49.4899V27.9192Z" fill="white"/>
                                        <path d="M44.9185 23.4209H37.4629V26.3779H44.9185V23.4209Z" fill="white"/>
                                        <path d="M6.05337 27.9192H0V21.8804H6.05337V27.9192Z" fill="white"/>
                                        <path d="M12.0269 23.4209H4.57129V26.3779H12.0269V23.4209Z" fill="white"/>
                                        <path d="M27.7711 6.0388H21.7178V0H27.7711V6.0388Z" fill="white"/>
                                        <path d="M7.59829 48.4592H1.54492V42.4204H7.59829V48.4592Z" fill="white"/>
                                        <path d="M47.945 48.4592H41.8916V42.4204H47.945V48.4592Z" fill="white"/>
                                        <path d="M47.945 7.57981H41.8916V1.54102H47.945V7.57981Z" fill="white"/>
                                        <path d="M7.59829 7.57981H1.54492V1.54102H7.59829V7.57981Z" fill="white"/>
                                        <path d="M26.2268 4.56006H23.2627V11.9465H26.2268V4.56006Z" fill="white"/>
                                        <path d="M27.7711 49.9997H21.7178V43.9609H27.7711V49.9997Z" fill="white"/>
                                        <path d="M26.2268 37.9531H23.2627V45.4396H26.2268V37.9531Z" fill="white"/>
                                        <path d="M24.8214 31.1737L22.2201 29.7557L24.1051 26.3128H19.7646L23.7796 18.8364L26.3923 20.2329L24.7154 23.3554H29.1019L24.8214 31.1737Z" fill="white"/>
                                        <path d="M16.8921 11.8463H13.928V6.03902H6.11523V3.08203H16.8921V11.8463Z" fill="white"/>
                                        <path d="M16.8921 46.7179H6.11523V43.7609H13.928V37.9531H16.8921V46.7179Z" fill="white"/>
                                        <path d="M35.5618 11.7464H32.5977V3.08203H43.3745V6.03902H35.5618V11.7464Z" fill="white"/>
                                        <path d="M43.3745 46.7179H32.5977V37.9531H35.5618V43.7609H43.3745V46.7179Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_181_1027">
                                        <rect width="49.4898" height="50" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </i>
                                <h3><?php echo $ben["title"]; ?></h3>
                                <div><?php echo $ben["contenido"]; ?></div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</section>
<section class="productosdel">
    <div class="x-container">
        <div class="title">
            <h2>Productos <b>esenciales</b></h2>
            <a href="<?php echo site_url(); ?>/tienda" class="btn btn-arrow-white btn-blue">
                Ir a tienda
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 22L21 2" stroke="#2C66CC" stroke-width="3"/>
                    <path d="M0.999999 2L21 2L21 22" stroke="#2C66CC" stroke-width="3"/>
                </svg>
            </a>
        </div>
        <div class="productslist">
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php 
                        $productos = get_field("productos");
                        if ($productos) {
                            foreach ($productos as $prod) {
                                $myid = $prod["id"];
                                ?>
                    <div class="swiper-slide">
                        <div class="itemProducto">
                            <a href="<?php echo get_permalink($myid); ?>">
                                <div class="itemProducto__flex">
                                    <div class="itemProducto__left">
                                        <h3><?php echo get_the_title($myid); ?></h3>
                                        <div class="valoration">
                                            <?php stars($myid); ?>
                                        </div>
                                        <p><?php echo get_field("subtitle", $myid); ?></p>
                                        <img src="<?php echo get_the_post_thumbnail_url($myid); ?>" >
                                    </div>
                                    <div class="itemProducto__right">
                                        <div>
                                            <?php 
                                                $post = get_post($myid);
                                                echo $post->post_content;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="swip-left">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg>
            </div>
            <div class="swip-right">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg>
            </div>
        </div>
    </div>
</section>
<?php 
    include get_template_directory() . '/inc/brands.php';
?>
<section class="othersoluciones">
    <div class="x-container">
        <div class="title">
            <h2>Otras <b>soluciones</b></h2>
            <div class="buttonsadd">
                <div class="buttonleft"><svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg></div>
                <div class="buttonright"><svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg></div>
            </div>
        </div>
        <div class="caruselblog">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                        $othersoluciones = get_field("soluciones", $homeid);
                        if ($othersoluciones) {
                            foreach ($othersoluciones as $blog) {
                                $id = $blog["id"];
                                ?>
                    <div class="swiper-slide">
                        <div class="blogitem">
                            <a href="<?php echo get_permalink($id); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>">
                                <div class="content">
                                    <h3><?php echo get_the_title($id); ?> <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 22L21 2" stroke="#2C66CC" stroke-width="3"/><path d="M0.999999 2L21 2L21 22" stroke="#2C66CC" stroke-width="3"/></svg></h3>
                                    <div><?php echo substr(get_field("resumen", $id), 0 , 60); ?></div>
                                </div>
                            </a>
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
    include get_template_directory() . '/inc/metodologia.php';
?>
<section class="detailblog">
    <div class="x-container">
        <div class="title">
            <h2>¿Conocías <b>estos datos?</b></h2>
        </div>
        <div class="detaills">
            <?php 
                $myidb = get_field("dato_blog", $getid);
            ?>
            <div class="blogitem">
                <a href="<?php echo get_permalink($myidb); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url($myidb); ?>">
                    <div class="content">
                        <h3><?php echo get_the_title($myidb); ?> <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 22L21 2" stroke="#2C66CC" stroke-width="3"/><path d="M0.999999 2L21 2L21 22" stroke="#2C66CC" stroke-width="3"/></svg></h3>
                        <div><?php echo get_field("resumen", $myidb); ?></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="testimoniales">
    <div class="x-container">
        <div class="caruseltestimoniales">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                        $testimonials = get_field("testimonials", $homeid);
                        if ($testimonials) {
                            foreach ($testimonials as $testimonial) {
                                ?>
                    <div class="swiper-slide">
                        <div class="testimonialitem">
                            <div class="content"><?php echo $testimonial["contenido"]; ?></div>
                            <div class="autor">
                                <img src="<?php echo $testimonial["logo"]; ?>">
                                <div><?php echo $testimonial["nombre"]; ?><b><?php echo $testimonial["cargo"]; ?></b></div>
                            </div>
                        </div>
                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="carouseleft"><svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg></div><div class="carouseright"><svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.8579 30L2.71578 15.8579L16.8579 1.71573" stroke="white" stroke-width="3"/></svg></div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
