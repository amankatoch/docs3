<?php
/* ------------------------------------- */
/* LOADING GOOGLE FONTS */
/* ------------------------------------- */

add_action('wp_head', 'load_fonts');

function load_fonts() {
if ( function_exists( 'get_option_tree') ) {
	$googlefonturl = get_option_tree( 'fonts_url' );
}
?>
<link href='<?php echo $googlefonturl ?>' rel='stylesheet' type='text/css'>
<?php
}
?>