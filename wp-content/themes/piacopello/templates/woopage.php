<?php /* Template Name: woopage */
set_query_var('ENTRY', 'page');
get_header();
$homeid = get_option("page_on_front");
?>
<section class="init banner">
	<div class="x-container titlePrincipal">
		<div class="title title--white">
            <h1><?php the_title(); ?></h1>
		</div>	
	</div>
</section>
<section class="pageDefault">
    <div class=" x-container">
        <div class="content  content--full">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer();