<?php

/**
 * Header default template.
 *
 * @see Options -> Header.
 *
 * @package WordPress
 * @subpackage UHC
 */

$uri = get_template_directory_uri();
$logo = get_field('logo', 'option');
if(!empty($logo)) $logo = wp_get_original_image_path($logo);
?>

<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta content="" name="description"/>
    <meta content="" name="keywords"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta name="HandheldFriendly" content="true"/>

    <title>
        <?php
        global $page, $paged;

        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');

        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'UHC'), max($paged, $page));
        ?>
    </title>

    <!-- FAVICON -->
    <!-- /FAVICON -->

    <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)</script>
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
<?php wp_body_open() ?>

<div class="wrapper">
    <header class="header">
        <div class="header_top">
            <div class="container">
                <div class="header-lang">
                    <?php echo do_shortcode('[wpml_language_selector_widget]') ?>
                </div>
            </div>
        </div>

        <div class="header_bottom">
            <div class="container">

                <?php
                if (file_exists($logo)):
                    $logo_link_arg = [
                        'title' => file_get_contents($logo),
                        'url' => get_home_url(),
                    ];
                    echo get_theme_link($logo_link_arg, 'header-logo');
                endif;

                wp_nav_menu([
                    'theme_location' => 'header_menu',
                    'container' => 'nav',
                    'container_class' => 'header-menu-wrapper',
                    'menu_class' => 'header-menu',
                    'menu_id' => 'headerMenu',
                ]);

                get_template_part('includes/parts/mobile-menu');
                ?>

                <a href="#" id="headerBurger" class="header-burger">
                    <span></span>
                </a>
            </div>
        </div>
    </header>
