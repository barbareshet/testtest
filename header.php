<?php
/**
 * Header
 *
 * Displays the header.
 *
 * @package MJK
 */

$home_url = get_home_url();
$header_image      = get_field("header_image", "option");
$GLOBALS['style'] = "";
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-11584577-6', 'auto');
    ga('send', 'pageview');
    </script>
	<meta name="facebook-domain-verification" content="opjkgsmz4p28epgilj2gj5atufywtx" />
    <link rel="preconnect" href="https://use.typekit.net" crossorigin>
    <link rel="preconnect" href="https://maps.googleapis.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php include( 'assets/icons.svg' ); ?>

<header id="masthead" class="site-header" role="banner">
    <nav class="site-header__navbar navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="site-header__brand navbar-brand" href="<?php echo $home_url ?>">
                <img src="<?php echo $header_image['url'] ?>" alt="">
            </a>
            <button class="site-header__navbar-toggle navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<input class="menu-btn" type="checkbox" id="menu-btn" />
				<label class="menu-icon" data-clickNum="0" for="menu-btn">
					<span class="navicon"></span>
				</label>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNav">
                <div class="top-menu">
                    <?php get_template_part( 'templates/menus/top' ); ?>
                    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'mjk-starter' ); ?>">
                        <span class="current-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                </div>
				<?php
				// Loads the templates/menu/primary.php template.
				get_template_part( 'templates/menus/primary' );
                ?>
            </div>
        </div>
    </nav>
</header><!-- .header -->

<?php if(is_user_logged_in() === true) : ?>
<style>
.site-header__navbar {
    top: 46px;
}
@media(min-width: 767px) {
    .site-header__navbar {
        top: 32px;
    }
}
@media (min-width: 1100px) {
    .dropdown:hover>.dropdown-menu.dropdown-menu-center {
        top: 119px;
    }
}
</style>
<?php endif ?>
<main class="site-content">

    <?php if (! is_product() && ! is_blog() && ! is_shop() && has_post_thumbnail()) { ?>
        <div class="site-content-header">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php
    }
    ?>
