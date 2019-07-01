<?php
/**
 * Header Template
 *
 * Template that shows the site markup up until the opening .site__content tag
 * and the breadcrumb trail that comes after it.
 *
 * If you want to remove the main menu, you should also edit navigation.js to
 * remove the related script (i.e., for submenu keyboard accessibility and
 * toggling the menu on mobile). Don't dequeue the file completely, as it
 * contains script to handle tab focus for "skip content" links.
 *
 * @package Magic Hat
 * @since 1.0.0
 */

$magic_hat_body_class = array(
	get_theme_mod( 'use-boxed', false ) ? 'boxed' : '',
	get_theme_mod( 'use-underline', 0 ) === 0 ? '' : 'accessible-links',
);
$magic_hat_header_style = has_header_image() ? 'style="background-image:url(\'' . get_header_image() . '\');"' : '';
$magic_hat_title_class = display_header_text() ? '' : 'screen-reader-text';
$magic_hat_description = get_bloginfo( 'description', 'display' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta description="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class( $magic_hat_body_class ); ?> <?php if ( function_exists( 'magic_hat_custom_bg' ) ) magic_hat_custom_bg(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'magic-hat' ); ?></a>

	<?php if ( ! is_404() ) { ?>
		<header id="masthead" class="site__header">
			<div class="header-bg" <?php echo $magic_hat_header_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php if ( has_nav_menu( 'menu-top' ) ) { ?>
					<nav aria-label="<?php esc_html_e( 'Topbar navigation', 'magic-hat' ); ?>" id="nav-top" class="nav-top">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-top',
							'container' => 'ul',
							'depth' => 1,
							'menu_class' => 'nav__list nav__list-h'
						) ); ?>
					</nav><!-- #nav-top -->
				<?php } ?>

				<div class="header__banner">
					<div class="banner__branding">
						<?php the_custom_logo(); ?>

						<div class="branding__title <?php echo $magic_hat_title_class; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
							<?php if ( is_front_page() && is_home() ) { ?>
								<h1 class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php } else { ?>
								<p class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php } ?>

							<?php if ( $magic_hat_description || is_customize_preview() ) { ?>
								<p class="site__desc"><?php echo $magic_hat_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php } ?>
						</div>
					</div><!-- .banner-branding -->

					<div class="banner__widget">
						<?php dynamic_sidebar( 'header' ); ?>
					</div><!-- .banner-widget -->
				</div><!-- header__banner -->
			</div><!-- header-bg -->

			<?php if ( has_nav_menu( 'menu-main' ) ) { ?>
				<nav id="nav-main" class="nav-main">
					<button id="nav-main__toggle" class="nav-main__toggle" aria-controls="nav-main" aria-expanded="false">
						<?php
						/**
						 * Filters the svg icon used for the hamburger menu on
						 * mobile. Make sure your replacement icon has alt text
						 * or an aria label to make it accessible.
						 *
						 * @since 1.0.0
						 *
						 * @param string 	The content to show for the button,
						 * 					default a hamburger icon.
						 * @return string	The filtred button content text.
						 */
						echo apply_filters(
							'magic_hat_svg_menu_toggle', '<svg width="36" height="36" viewbox="0 0 24 24" aria-label="' . esc_html__( 'Toggle main menu', 'magic-hat' ) . '" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M1.005 10.755c.039-5.636 5.304-8.755 11.098-8.755 5.572 0 10.925 3.019 10.892 8.755.592.527.96 1.277 1.001 2.088.041.802-.24 1.567-.761 2.151.45.504.726 1.154.761 1.849.048.931-.338 1.812-1.031 2.418.276 2.333-.924 3.656-2.871 3.725-.6.009-14.933.021-16.188.009-2.168-.068-3.111-1.549-2.88-3.743-.69-.606-1.07-1.485-1.022-2.409.035-.695.311-1.346.762-1.849-.524-.585-.804-1.351-.762-2.151.041-.811.409-1.561 1.001-2.088zm1.989 9.241h-.002c.031.791.267.979.954.999 1.241.013 15.514 0 16.098-.009.679-.022.92-.269.96-.943 0 0-11.384.036-18.01-.047zm9.452-3.996c-.522.003-.988.277-1.296.459-.89.522-1.587 1.049-2.652 1.038-1.184-.012-1.822-.551-2.57-1.023-.289-.182-.63-.477-1.143-.474h-1.861c-.54.046-.899.472-.923.943-.026.523.354 1.033 1.005 1.053h18.008c.645-.034 1.01-.539.985-1.053-.026-.476-.39-.899-.925-.944-.024.001-7.017-.01-8.628.001zm-.661-3.996l-8.779-.008c-.585.008-.98.453-1.005.947-.026.523.354 1.033 1.005 1.053 0 0 1.028-.002 1.994.004 1.443.009 2.422 1.672 3.508 1.666.968-.005 2.284-1.663 3.715-1.666 1.471-.003 8.791-.004 8.791-.004.645-.034 1.01-.539.985-1.053-.027-.49-.412-.946-.973-.947l-1.58.008c-.522.003-.988.277-1.296.459-.89.522-1.587 1.049-2.652 1.038-1.184-.012-1.822-.551-2.57-1.023-.289-.182-.63-.477-1.143-.474zm-2.285-5.007c.276 0 .5.224.5.5 0 .275-.224.5-.5.5s-.5-.225-.5-.5c0-.276.224-.5.5-.5zm5 0c.276 0 .5.224.5.5 0 .275-.224.5-.5.5-.277 0-.5-.225-.5-.5 0-.276.223-.5.5-.5zm4 0c.276 0 .5.224.5.5 0 .275-.224.5-.5.5-.277 0-.5-.225-.5-.5 0-.276.223-.5.5-.5zm-12 0c.276 0 .5.224.5.5 0 .275-.224.5-.5.5s-.5-.225-.5-.5c0-.276.224-.5.5-.5zm5-1c.276 0 .5.224.5.5 0 .275-.224.5-.5.5s-.5-.225-.5-.5c0-.276.224-.5.5-.5zm5 0c.276 0 .5.224.5.5 0 .275-.224.5-.5.5-.277 0-.5-.225-.5-.5 0-.276.223-.5.5-.5zm-8-1c.276 0 .5.224.5.5 0 .275-.224.5-.5.5s-.5-.225-.5-.5c0-.276.224-.5.5-.5zm5 0c.276 0 .5.224.5.5 0 .275-.224.5-.5.5-.277 0-.5-.225-.5-.5 0-.276.223-.5.5-.5zm7.5 5c-.872-4.683-5.35-6.013-9-5.997-3.926.017-8.258 1.748-9 6 0 0 8.701.002 9 .004 1.443.009 2.422 1.672 3.508 1.666.968-.005 2.284-1.664 3.715-1.666l1.777-.007z"/></svg>'
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</button>
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-main',
						'container' => 'ul',
						'depth' => 3,
						'menu_id' => 'main-menu',
						'menu_class' => 'nav__list nav__list-desktop-h'
					) ); ?>
				</nav><!-- #nav-main -->
			<?php } ?>
		</header><!-- #masthead -->
	<?php } ?>

	<div class="site__container">
		<div id="content" class="site__content">
			<main id="primary" class="content-primary">
				<?php if ( function_exists( 'breadcrumb_trail' ) && get_theme_mod( 'show-breadcrumbs', true ) && ! is_404() ) {
					breadcrumb_trail();
				}
