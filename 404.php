<?php
/**
 * 404 Template
 *
 * The template for displaying the 404 error page.
 *
 * @package Magic Hat
 * @since 1.0.0
 */

get_header();
?>

	<header class="page__header">
		<h1 class="page__title page__title-error">
			<?php echo esc_html( get_theme_mod( '404-title', 'Error 404!' ) ); ?>
		</h1>
	</header><!-- .page__header -->
	<img src="<?php echo get_template_directory_uri() . '/assets/img/404.gif'; ?>" alt="">
	<nav aria-label="<?php esc_html_e('Try these options instead.'); ?>" class="nav-error">
		<ul class="nav__list nav__list-h">
			<li><a href="<?php echo get_site_url(); ?>"><?php esc_html_e( 'Take me home' ); ?></a></li>
			<li><a href="https://neopets.com/"><?php esc_html_e( "Screw this I'm out" ); ?></a></li>
		</ul>
	</nav>
</main><!-- primary -->

<?php
get_footer();
