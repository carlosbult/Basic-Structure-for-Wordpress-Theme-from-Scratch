<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="logo">
            <?php if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } ?>
        </div>

        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'nav',
            'container_id' => 'nav',
            'menu_class' => 'nav__list',
            'menu_id' => 'menu',
            'link_after' => '<i class="link-menu-icon"></i>',
            'items_class' => 'nav-item',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        )); ?>

        <div class="mobile-nav" id="menu-bar">
            <label for="menu" class="mobile-nav__label" id="menu-hamburguer">
                <div class="spn spn1"></div>
                <div class="spn spn2"></div>
                <div class="spn spn3"></div>
            </label>
        </div>
    </header>
    <main>