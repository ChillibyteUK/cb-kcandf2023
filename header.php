<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-hydronix
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v35-latin-300.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v35-latin-500.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/open-sans-v35-latin-600.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
if (get_field('ga_property', 'options')) {
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
}
if (get_field('gtm_property', 'options')) {
    ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?=get_field('gtm_property', 'options')?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <?php
}
if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
}
if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
}

wp_head();
?>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "---",
            "url": "https://www.kcandf.com/",
            "logo": "https://www.kcandf.com/wp-content/theme/cb-kcandf2023/img/kcandf-logo.png",
            "description": "...",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "---",
                "addressLocality": "---",
                "addressRegion": "---",
                "postalCode": "--- ---",
                "addressCountry": "UK"
            },
            "telephone": "+44 (0) ---- ------",
            "email": "hello@kcandf.com"
        }
        }
    </script>

</head>
<?php
$theme = get_field('theme') == 'Dark' ? 'theme-dark' : 'theme-light';
?>

<body <?php body_class($theme); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
do_action('wp_body_open');
if (is_front_page()) {
    ?>
    <div class="preHeader">
        <div class="container-xl">
            <div>
                <span class="has-bg">For our health work please visit our site.</span>
            </div>
            <a href="/health/" class="btn btn-green">KC&F Health</a>
        </div>
    </div>
    <?php
}
if (is_page('health')) {
    ?>
    <div class="preHeader">
        <div class="container-xl">
            <div>
                <span class="has-bg">For our B2C & B2B work please visit our site.</span>
            </div>
            <a href="/" class="btn btn-red">KC&F Agency</a>
        </div>
    </div>
    <?php
}
?>
    <div id="wrapper-navbar" class="sticky-top">
        <nav class="navbar p-0 pt-2">
            <div class="container-xl pb-2">
                <?php
                $home = get_field('theme') == 'Dark' ? '/' : '/health/';
?>
                <a href="<?=$home?>" class="logo"
                    aria-label="Home"></a>
                    <?php
                    /*
                <div class="button-container text-end d-flex align-items-center justify-content-end">
                    <button class="navbar-toggle mt-2 collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                    </button>
                </div>
                    */
                    ?>
            </div>
            <?php
            /*
            <div class="collapse navbar-collapse" id="navbar">
                <?php
$menu = get_field('theme') == 'Dark' ? 'agency_nav' : 'pharma_nav';
wp_nav_menu(
    array(
            'theme_location'  => $menu,
            'container_class' => 'container-xl w-100',
            'menu_class'      => 'navbar-nav justify-content-around',
            'fallback_cb'     => '',
            'menu_id'         => 'navbarr',
            'depth'           => 3,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
);
?>
                <div class="preHeader navExtra py-4">
                    <div class="container-xl">
                        <?php
        if ($theme == 'theme-dark') {
            ?>
                        <div class="text-center">
                            <span class="has-bg">For our health work<br>please visit our site.</span>
                        </div>
                        <div class="text-center">
                            <a href="/health/" class="btn btn-green">KC&F Health</a>
                        </div>
                        <?php
        }
        if ($theme == 'theme-light') {
            ?>
                        <div class="text-center">
                            <span class="has-bg">For our B2B & B2C work<br>please visit our site.</span>
                        </div>
                        <div class="text-center">
                            <a href="/" class="btn btn-red">KC&F Agency</a>
                        </div>
                        <?php
        }
?>
                    </div>
                </div>
            </div>
*/
            ?>
        </nav>
    </div>
    </div>