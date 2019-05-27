<?php
/**
 * Game Post Content
 *
 * Template part for displaying game posts.
 *
 * @package Magic Hat
 * @since 1.1.0
 */
?>

<?php magic_hat_post_thumbnail(); ?>

<?php magic_hat_entry_header(); ?>

<div class="entry__content">
    <?php
    if ( is_single() ) {
        if ( function_exists( 'gm_price' ) ) gm_price();
        if ( function_exists( 'gm_links' ) ) gm_links();
    }
    ?>
	<?php magic_hat_content_excerpt(); ?>
</div><!-- .entry__content -->

<?php if ( is_singular() ) { ?>
	<footer class="entry__meta entry__meta-footer">
		<?php magic_hat_entry_footer(); ?>
	</footer><!-- .entry__meta-footer -->
<?php } ?>
