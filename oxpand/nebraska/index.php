<?php

/* Main Template File
 *
 * lambda framework v 2.1
 * by www.unitedthemes.com
 * since lambda framework v 2.0
 */
global $lambda_meta_data;

if(is_home()) {
			
	$homeid = get_option('page_for_posts');  
	$meta_sidebar = get_post_meta($homeid, $lambda_meta_data->get_the_id(), TRUE);
					
} else {
		
	$meta_sidebar = $lambda_meta_data->the_meta();
		
}
$meta_sidebar = (isset($meta_sidebar['sidebar'])) ? $meta_sidebar['sidebar'] : get_option_tree('select_sidebar');

//includes the header.php
get_header();

//includes the template-part-slider.php
get_template_part( 'template-part', 'slider' );

//includes the template-part-teaser.php
get_template_part( 'template-part', 'teaser' );

//set column layout depending if user wants to display a sidebar
if($meta_sidebar != UT_THEME_INITIAL.'sidebar_none') {

	lambda_before_content($columns='');
	
} elseif($meta_sidebar == UT_THEME_INITIAL.'sidebar_none') {
	
	lambda_before_content($columns='sixteen');
	
}

//the content loop
get_template_part( 'loop', 'index' );

//content closer - this function can be found in functions/theme-layout-functions.php line 56-61
lambda_after_content();

//include the sidebar.php
if(empty($columns))
get_sidebar();

//includes the footer.php
get_footer();

?>
