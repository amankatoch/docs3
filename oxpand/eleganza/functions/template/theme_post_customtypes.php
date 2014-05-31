<?php
/* ------------------------------------- */
/* PORTFOLIO POST TYPE */
/* ------------------------------------- */

function create_portfolio() {
	$portfolio_args = array(
		'label' => __('Portfolio'),
		'singular_label' => __('Portfolio'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'portfolioentry', 'with_front' => true),
		'supports' => array('title', 'editor', 'thumbnail', 'author', 'comments', 'excerpt')
	);
	register_post_type('portfolioentry',$portfolio_args);
}
add_action('init', 'create_portfolio');
register_taxonomy("portfoliocategory", array("portfolioentry"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));



/* ------------------------------------- */
/* SERVICE POST TYPE */
/* ------------------------------------- */

function create_services() {
	$services_args = array(
		'label' => __('Services'),
		'singular_label' => __('Services'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'servicesentry', 'with_front' => true),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	);
	register_post_type('servicesentry',$services_args);
}
add_action('init', 'create_services');




/* ------------------------------------- */
/* NEWS POST TYPE */
/* ------------------------------------- */

function create_news() {
	$news_args = array(
		'label' => __('News'),
		'singular_label' => __('News'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'newsentry', 'with_front' => true),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
	);
	register_post_type('newsentry',$news_args);
}
add_action('init', 'create_news');


?>