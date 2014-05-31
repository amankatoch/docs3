<?php
/* ------------------------------------- */
/* OPTION TREE INSTALL NOTICE */
/* ------------------------------------- */

function optiontree_check(){

	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	require_once($path_to_wp . 'wp-admin/includes/plugin.php');

	if (!is_plugin_active('option-tree/index.php')) {
		add_thickbox();
		add_action('admin_notices', 'optiontree_check_notice');
	}
}

function optiontree_check_notice(){
?>
  <div class='updated fade'>
    <p>The OptionTree plugin is required for this theme to function properly. <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=option-tree&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick">Install now</a>.</p>
  </div>
<?php
}

optiontree_check();
?>