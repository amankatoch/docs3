<?php
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'navigation', 'Main Navigation' );
}
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'pagenavigation1', 'Page Navigation 1' );
}
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'pagenavigation2', 'Page Navigation 2' );
}
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'pagenavigation3', 'Page Navigation 3' );
}
if ( function_exists('get_option_tree')) {
  $theme_options = get_option('option_tree');
}

/* ------------------------------------- */
/* CUSTOM EXCERPT WORD LENGTH */
/* ------------------------------------- */

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

	return $excerpt;
}

/* ------------------------------------- */
/* AUTOMATIC FORMATTING DISABLER http://css-tricks.com/snippets/wordpress/disable-automatic-formatting-using-a-shortcode/ */
/* ------------------------------------- */

function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

/* ------------------------------------- */
/* FUNCTION TO RETRIEVE POST AND PAGE OPTIONS http://www.wprecipes.com/wordpress-tip-get-all-custom-fields-from-a-page-or-a-post */
/* ------------------------------------- */

function getOptions($id = 0){
    if ($id == 0) :
        global $wp_query;
        $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
        	$id = $content_array->ID;
		}
    endif;   

    $first_array = get_post_custom_keys($id);

	if(isset($first_array)){
		foreach ($first_array as $key => $value) :
			   $second_array[$value] =  get_post_meta($id, $value, FALSE);
				foreach($second_array as $second_key => $second_value) :
						   $result[$second_key] = $second_value[0];
				endforeach;
		 endforeach;
	 }
	
	if(isset($result)){
    	return $result;
	}
}

$content_width = 960; 
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);
?>