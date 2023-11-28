<?php 
set_query_var('ENTRY', 'page');
$frontpage_id = get_option( 'page_on_front' );
$blog_id = get_option( 'page_for_posts' );
get_header(); ?>
<!-- section index init -->
<section class="init banner">
	<div class="x-container titlePrincipal">
		<div class="title title--white">
            <h1><?php the_title(); ?></h1>
		</div>	
	</div>
</section>
<section class="pageDefault">
    <div class=" x-container">
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer();