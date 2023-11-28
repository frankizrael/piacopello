<?php
set_query_var('ENTRY', 'index');
$blog_id = get_option( 'page_for_posts' );
$idpost = get_the_ID();
get_header(); ?>
<section class="backgroundtop">
    <div class="x-container">
        <div class="backgroundtop__flex">
            <div class="backgroundtop__left">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" >                
            </div>
            <div class="backgroundtop__right">
                <span>Artículo</span>
                <h1><?php the_title(); ?></h1>
                <div>
                    Compartir: 
                        <div class="social">
                            <a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" class="facebookSocial">
                                <i>
                                    <svg id="icon_facebook" data-name="icon/facebook" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <rect id="caja" width="30" height="30" fill="none" opacity="0"/>
                                        <path id="icon" d="M85.931,17.5V9.528h2.722l.389-3.111H85.931V4.472c0-.875.292-1.556,1.556-1.556h1.653V.1C88.75.1,87.778,0,86.708,0a3.753,3.753,0,0,0-3.986,4.083V6.417H80V9.528h2.722V17.5Z" transform="translate(-70 6.25)" fill="#2c2c2c" fill-rule="evenodd"/>
                                    </svg>

                                </i>
                            </a>
                            <a id="twitter" href="javascript: void(0);" onclick="window.open('http://twitter.com/home?status=<?php echo get_the_permalink(); ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" class="twitterSocial">
                                <i>
                                    <svg id="icon_twitter" data-name="icon/twitter" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <rect id="caja" width="30" height="30" fill="none"/>
                                        <path id="icon" d="M43.542,16.194A10.118,10.118,0,0,0,53.75,5.986V5.5A7.9,7.9,0,0,0,55.5,3.653a8.071,8.071,0,0,1-2.042.583,3.783,3.783,0,0,0,1.556-1.944,8.918,8.918,0,0,1-2.236.875A3.472,3.472,0,0,0,50.153,2a3.653,3.653,0,0,0-3.6,3.6,1.9,1.9,0,0,0,.1.778,10.052,10.052,0,0,1-7.389-3.792,3.723,3.723,0,0,0-.486,1.847,3.863,3.863,0,0,0,1.556,3.014,3.278,3.278,0,0,1-1.653-.486h0a3.553,3.553,0,0,0,2.917,3.5,3,3,0,0,1-.972.1,1.654,1.654,0,0,1-.681-.1,3.683,3.683,0,0,0,3.4,2.528,7.34,7.34,0,0,1-4.472,1.556,2.692,2.692,0,0,1-.875-.1,9.177,9.177,0,0,0,5.542,1.75" transform="translate(-31.75 5.5)" fill="#2c2c2c" fill-rule="evenodd"/>
                                    </svg>
                                </i>
                            </a>
                            <a id="whatsapp" href="whatsapp://send?text=Gracias%20por%20compartir%20<?php the_title();?>%20para%20ingresar <?php echo get_the_permalink(); ?>" data-action="share/whatsapp/share" class="wspSocial">
                                <i>
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m439.277344 72.722656c-46.898438-46.898437-109.238282-72.722656-175.566406-72.722656-.003907 0-.019532 0-.023438 0-32.804688.00390625-64.773438 6.355469-95.011719 18.882812-30.242187 12.527344-57.335937 30.640626-80.535156 53.839844-46.894531 46.894532-72.71875 109.246094-72.71875 175.566406 0 39.550782 9.542969 78.855469 27.625 113.875l-41.734375 119.226563c-2.941406 8.410156-.859375 17.550781 5.445312 23.851563 4.410157 4.414062 10.214844 6.757812 16.183594 6.757812 2.558594 0 5.144532-.429688 7.667969-1.3125l119.226563-41.730469c35.019531 18.082031 74.324218 27.625 113.875 27.625 66.320312 0 128.667968-25.828125 175.566406-72.722656 46.894531-46.894531 72.722656-109.246094 72.722656-175.566406 0-66.324219-25.824219-128.675781-72.722656-175.570313zm-21.234375 329.902344c-41.222657 41.226562-96.035157 63.925781-154.332031 63.925781-35.664063 0-71.09375-8.820312-102.460938-25.515625-5.6875-3.023437-12.410156-3.542968-18.445312-1.429687l-108.320313 37.910156 37.914063-108.320313c2.113281-6.042968 1.589843-12.765624-1.433594-18.449218-16.691406-31.359375-25.515625-66.789063-25.515625-102.457032 0-58.296874 22.703125-113.109374 63.925781-154.332031 41.21875-41.21875 96.023438-63.921875 154.316406-63.929687h.019532c58.300781 0 113.109374 22.703125 154.332031 63.929687 41.226562 41.222657 63.929687 96.03125 63.929687 154.332031 0 58.300782-22.703125 113.113282-63.929687 154.335938zm0 0"/><path d="m355.984375 270.46875c-11.421875-11.421875-30.007813-11.421875-41.429687 0l-12.492188 12.492188c-31.019531-16.902344-56.121094-42.003907-73.027344-73.023438l12.492188-12.492188c11.425781-11.421874 11.425781-30.007812 0-41.429687l-33.664063-33.664063c-11.421875-11.421874-30.007812-11.421874-41.429687 0l-26.929688 26.929688c-15.425781 15.425781-16.195312 41.945312-2.167968 74.675781 12.179687 28.417969 34.46875 59.652344 62.761718 87.945313 28.292969 28.292968 59.527344 50.582031 87.945313 62.761718 15.550781 6.664063 29.695312 9.988282 41.917969 9.988282 13.503906 0 24.660156-4.058594 32.757812-12.15625l26.929688-26.933594v.003906c5.535156-5.535156 8.582031-12.890625 8.582031-20.714844 0-7.828124-3.046875-15.183593-8.582031-20.714843zm-14.5 80.792969c-4.402344 4.402343-17.941406 5.945312-41.609375-4.195313-24.992188-10.710937-52.886719-30.742187-78.542969-56.398437s-45.683593-53.546875-56.394531-78.539063c-10.144531-23.667968-8.601562-37.210937-4.199219-41.613281l26.414063-26.414063 32.625 32.628907-15.636719 15.640625c-7.070313 7.070312-8.777344 17.792968-4.242187 26.683594 20.558593 40.3125 52.734374 72.488281 93.046874 93.046874 8.894532 4.535157 19.617188 2.832032 26.6875-4.242187l15.636719-15.636719 32.628907 32.628906zm0 0"/>
                                    </svg>
                                </i>
                            </a>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contentBlog">
    <div class="x-container">
        <main>
            <div class="myContent"><?php the_content(); ?></div>
            <?php 
                $builder = get_field("builder");
                if ($builder) {
                    foreach ($builder as $build) {
                        if ($build["type"] == "carousel") {
                            ?>
            <div class="carouselcontent">
                <div class="carouselcontent__flex">
                    <div class="carouselcontent__left">
                        <div><?php echo $build["content_carousel"]; ?></div>                        
                    </div>
                    <div class="carouselcontent__right">
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            <?php 
                                $carousel = $build["carousel"]; 
                                if ($carousel) {
                                    foreach ($carousel as $ca) {
                                        ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $ca["imagen"]; ?>">
                                </div>
                                        <?php
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            <?php
                        }
                        if ($build["type"] == "content") {
                        ?>
            <div class="myContent">
                <?php echo $build["content"]; ?>
            </div>
                        <?php
                        }
                        if ($build["type"] == "flex") {
                        ?>
            <div class="flexcontent">
                <div class="flexcontent__left">
                    <img src="<?php echo $build["fleximagen"]; ?>">
                </div>
                <div class="flexcontent__right">
                    <div>
                        <?php echo $build["flexcontent"]; ?>
                    </div>
                </div>
            </div>
                        <?php
                        }
                        if ($build["type"] == "bibliografia") {
                            ?>
            <div class="myContent guias">
                <?php echo $build["bibliografia"]; ?>
            </div>
                            <?php
                        }
                    }
                }
            ?>
        </main>
    </div>
</section>
<section class="detailblog">
    <div class="x-container">
        <div class="title">
            <h2>Continua <b>leyendo</b></h2>
        </div>
        <div class="detaills">
            <?php 
                $myidb = get_adjacent_post(false, '', false);
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
<?php get_footer(); ?>