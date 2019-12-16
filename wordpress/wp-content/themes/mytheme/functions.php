<?php
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
}
if (function_exists('add_image_size')) {
    add_image_size('post-image', 256, 256, true);
}

function register_my_menu()
{
    register_nav_menu('header-menu', __('header Menu'));
    register_nav_menu('footer-menu', __('footer Menu'));
}
add_action('init', 'register_my_menu');

require_once("class-wp-bootstrap-navwalker.php");

register_sidebar(array(
    'name' => __('Sidebar-1', 'twentyseventeen'),
    'id' => 'sidebar-1',
    'description' => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
));
