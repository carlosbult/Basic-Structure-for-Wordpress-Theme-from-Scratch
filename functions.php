<?php

if (!function_exists('themeName_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features
     *
     *  It is important to set up these functions before the init hook so that none of these
     *  features are lost.
     *
     *  @since themeName 1.0
     */

    function themeName_setup()
    {
        add_theme_support('automatic-feed-links');  /* Add theme support for automatic feed links */
        add_theme_support('post-thumbnails');
        add_theme_support('widgets');   /* Add theme support for sidebar */
        add_theme_support('menus'); /* Add theme support menus */


        /* Add theme support custom logo*/
        $defaults_logo = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array('site-title', 'site-description'),
            'unlink-homepage-logo' => true,
        );

        add_theme_support('custom-logo', $defaults_logo);

        /* Add theme support for formats */
        add_theme_support('post-formats', array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat'
        ));

        /* Add support for custom menus */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'themeName'),
        ));
    }
endif;

add_action('after_setup_theme', 'themeName_setup');

/* Includes */
include_once('helpers/register-sidebar.php');

/* Register and enqueue style-sheets */
function themeName_styles()
{
    /* Register styles */
    wp_register_style('themeName-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0', 'all');
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '1.0', 'all');

    /* Enqueue styles */
    wp_enqueue_style('themeName-style');
    wp_enqueue_style('fontawesome');


    /* ADD integrity, crossorigin and referrerpolicy attributes to FONTAWESOME 6.0.0 via style_loader_tag */
    apply_filters('style_loader_tag', $html = null, $handle = null, $href = null, $media = null);

    function add_font_awesome_cdn_attributes($html, $handle)
    {
        if ('fontawesome' === $handle) {
            /* In this return the integrity part will can be replaced for the ID obtain from fontawesome CDN, for example: 
                'sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==',
             verify your CDN fontawesome link and change the id */
            return str_replace("media='all'", "media='all' integrity='sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==' crossorigin='anonymous' referrerpolicy='no-referrer'", $html);
        }
        return $html;
    }
    add_filter('style_loader_tag', 'add_font_awesome_cdn_attributes', 10, 2);
}
add_action('wp_enqueue_scripts', 'themeName_styles');

/* Register and enqueue scripts */
function themeName_scripts()
{
    /* Register scripts */
    wp_register_script('themeName-script', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), '1.0', true);

    /* Enqueue scripts */
    wp_enqueue_script('themeName-script');
}
add_action('wp_enqueue_scripts', 'themeName_scripts');
