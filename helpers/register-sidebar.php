<?php

/* Register sidebars */
function themeName_sidebars()
{
    register_sidebar(
        array(
            'id'            => 'sidebar',
            'name'          => __('Sidebar'),
            'description'   => __('A short description of the sidebar.'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'second-sidebar',
            'name'          => __('Second Sidebar'),
            'description'   => __('A short description of the sidebar.'),
            'before_widget' => '<div class="div-single-aside">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'themeName_sidebars');
