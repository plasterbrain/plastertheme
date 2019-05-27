<?php
/**
* Template Name: Plain Content
*
* @package Magic Hat
* @subpackage Templates
* @since 1.0.1
*/

get_header();
?>

	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<article <?php post_class(); ?>>
			<?php get_template_part( 'template-parts/content' ); ?>
		</article>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>

	<?php } ?>

</main><!-- primary -->

<?php
get_footer();
