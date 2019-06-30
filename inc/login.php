<?php
/**
 * Customizations for wp-login.php
 *
 * @since 1.1.0
 */

add_action( 'login_head', function() {
    remove_action( 'login_head', 'wp_shake_js', 12 );
} );

if ( ! function_exists( 'magic_hat_login_logo' ) ) :
function magic_hat_login_logo() {
    $style = is_rtl() ? '/assets/css/style-rtl.min.css' : '/assets/css/style.min.css';
    wp_enqueue_style( 'magic-hat-style', get_template_directory_uri() . $style, array(), null );
    wp_dequeue_style( 'login' );

    if ( has_custom_logo() ) {
        $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            body.login {
                background: #080808;
            }

            #login {
                font-size: .8rem;
                margin-left: 8vw;
                width: 300px;
            }

            .login h1 a {
                background-image: url(<?php echo esc_url( $logo[0] ); ?>);
                -webkit-background-size: <?php echo absint( $logo[1] )?>px;
                background-size: <?php echo absint( $logo[1] ) ?>px;
                display: block;
                margin: 0 auto;
                outline: 0;
                overflow: hidden;
                text-indent: -9999px;
                height: <?php echo absint( $logo[2] ) ?>px;
                width: <?php echo absint( $logo[1] ) ?>px;
            }

            #login_error {
                color: #e00d2a;
                font-family: Consolas, 'Courier New', Courier, monospace;
            }

            .forgetmenot label {
                font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
                font-weight: 400;
                text-transform: none;
            }

            #rememberme {
                vertical-align: middle;
                margin: 0;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-bottom: .12em;
                margin-right: .3em;
            }

            .submit .button {
                width: 100%;
            }

            #backtoblog {
                display: none;
            }
        </style>
        <?php
    }
}
endif;
add_action( 'login_enqueue_scripts', 'magic_hat_login_logo' );

add_filter( 'login_headertext', function() {
    return get_bloginfo( 'name' );
} );

add_filter( 'login_headerurl', function() {
    return esc_url( get_bloginfo( 'url' ) );
} );

add_filter( 'login_message', function() {
    return _e( "This might be the door you're looking for.", 'magic-hat' );
} );

add_filter( 'login_errors', function( $error ) {
    global $errors;
    $err_codes = $errors->get_error_codes();

    if ( in_array( 'empty_username', $err_codes ) || in_array( 'empty_email', $err_codes ) || in_array( 'empty_password', $err_codes ) ) {
        $error = __( 'One or more fields was left empty.', 'magic-hat' );
    } else {
        $error = __( 'Incorrect username or password.', 'magic-hat' );
    }

    return $error;
} );
