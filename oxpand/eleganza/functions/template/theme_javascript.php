<?php
/* ------------------------------------- */
/* LOAD JAVASCRIPTS */
/* ------------------------------------- */

function loadJS() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ELEGANZA_JAVASCRIPT .'/jquery-1.4.4.min.js', false, '1.4.4');
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'jquery-tools', ELEGANZA_JAVASCRIPT .'/jquery.tools.min.js', false);
		wp_enqueue_script( 'ddsmoothmenu', ELEGANZA_JAVASCRIPT .'/ddsmoothmenu.php', false);
		wp_enqueue_script( 'tinycarousel', ELEGANZA_JAVASCRIPT .'/jquery.tinycarousel.min.js', false);
		wp_enqueue_script( 'quicksand', ELEGANZA_JAVASCRIPT .'/jquery.quicksand.js', false);
		wp_enqueue_script( 'nivoslider', ELEGANZA_JAVASCRIPT .'/jquery.nivo.slider.js', false);
		wp_enqueue_script( 'prettyphoto', ELEGANZA_JAVASCRIPT .'/jquery.prettyPhoto.js', false);
		wp_enqueue_script( 'templatejs', ELEGANZA_JAVASCRIPT .'/templatejs.php', false);
	}
}
add_action('init', 'loadJS');
?>