<?php
/* ------------------------------------- */
/* SIDEBAR REGISTRATION */
/* ------------------------------------- */

if ( function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Portfolio Sidebar',
        'id' => 'sidebar-2',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Contact Sidebar',
        'id' => 'sidebar-3',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'sidebar-4',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'sidebar-5',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'sidebar-6',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'sidebar-7',
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="headline">',
        'after_title' => '</div>'
    ));
}
?>