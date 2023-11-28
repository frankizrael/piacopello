<?php /* Template Name: contacto */
set_query_var('ENTRY', 'home');
get_header();
$homeid = get_option("page_on_front");
?>
<main id="contacto">
    <section class="metodologia">
        <div class="x-container">
            <h2>Estamos a un <b>mensaje de distancia</b></h2>
            <div class="metodologia__content">
                <?php 
                    $metodologia = get_field("detalle");
                    if ($metodologia) {
                        $aux = 1;
                        foreach ($metodologia as $met) {
                            ?>
                <div class="metodologia__item">
                    <div class="imagen">
                        <img src="<?php echo $met["imagen"]; ?>" />
                        <div><?php echo $met["name"]; ?></div>
                    </div>                    
                    <div class="adove">
                        <div><?php echo $met["content"]; ?></div>
                    </div>
                </div>
                            <?php
                        $aux++;
                        }
                    }
                ?>
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
</main>
<?php
get_footer();
?>
<script>
    jQuery("#contactoSelf").append(jQuery("#contacto"));
</script>