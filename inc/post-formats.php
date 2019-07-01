<?php
/**
 * Support for post formats.
 *
 * @since 1.0.0
 * @package Magic Hat
 */

/**
 * Registers theme support for post formats.
 *
 * @since 1.0.0
 */
function magic_hat_support_post_formats() {
	/**
	 * Filters the post formats supported by this theme.
	 *
	 * @link https://codex.wordpress.org/Post_Formats
	 *
	 * @param array		The post formats to support.
	 */
	add_theme_support( 'post-formats', apply_filters( 'magic_hat_support_post_formats', array(
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
		'aside',
	) ) );
}
add_action( 'after_setup_theme', 'magic_hat_support_post_formats' );
