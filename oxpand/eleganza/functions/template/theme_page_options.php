<?php
/* ------------------------------------- */
/* PAGE OPTIONS */
/* ------------------------------------- */

add_action('admin_init', 'init_page_options');

function init_page_options() {
	/*if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php') || strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')) {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

		if ($template_file != 'home_image_full.php' && $template_file != 'home_image_service_text.php' && $template_file != 'home_image_service_text_partners.php' && $template_file != 'home_image_text_partners.php' && $template_file != 'home_slider_full.php' && $template_file != 'home_slider_service_text.php' && $template_file != 'home_slider_service_text_partners.php' && $template_file != 'home_slider_text_partners.php'){*/
			add_meta_box("page-options", "Page Options", "page_options", "page", "normal", "high");
			add_meta_box("page-options", "Page Options", "page_options", "post", "normal", "high");
			add_meta_box("page-options", "Page Options", "page_options", "portfolioentry", "normal", "high");
			add_meta_box("page-options", "Page Options", "page_options", "servicesentry", "normal", "high");
			add_meta_box("page-options", "Page Options", "page_options", "newsentry", "normal", "high");
		/*}
	}*/
	add_action('save_post','update_page_data');
}

function update_page_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["headerimage_link"]) ) {
			update_post_meta($post->ID, "headerimage_link", $_POST["headerimage_link"]);
		}
		if( isset($_POST["headercaption_text"]) ) {
			update_post_meta($post->ID, "headercaption_text", $_POST["headercaption_text"]);
		}
		if( isset($_POST["headercaption_right"]) ) {
			update_post_meta($post->ID, "headercaption_right", $_POST["headercaption_right"]);
		}else{
			update_post_meta($post->ID, "headercaption_right", 0);
		}
		if( isset($_POST["sidebar_right"]) ) {
			update_post_meta($post->ID, "sidebar_right", $_POST["sidebar_right"]);
		}else{
			update_post_meta($post->ID, "sidebar_right", 0);
		}
	}
}

function page_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["headerimage_link"][0])){
		$headerimage_link = $custom["headerimage_link"][0];
	}else{
		$headerimage_link = "";
	}
	
	if (isset($custom["headercaption_text"][0])){
		$headercaption_text = $custom["headercaption_text"][0];
	}else{
		$headercaption_text = "";
	}
	
	if (isset($custom["headercaption_right"][0])){
		$headercaption_right = $custom["headercaption_right"][0];
	}else{
		$headercaption_right = 0;
		$custom["headercaption_right"][0] = 0;
	}
	
	if (isset($custom["sidebar_right"][0])){
		$sidebar_right = $custom["sidebar_right"][0];
	}else{
		$sidebar_right = 0;
		$custom["sidebar_right"][0] = 0;
	}

?>

    <div id="page-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><strong>Page Options: </strong><i style="color: #999999;">(Not used for homepage layouts)</i></td>
            </tr>
            <tr>
                <td><label>Header Image URL: <i style="color: #999999;">(960 x 160 px - Leave blank for a short header)</i></label></td><td><input name="headerimage_link" style="width:500px" value="<?php echo $headerimage_link; ?>" /></td>	
            </tr>
            <tr>
                <td><label>Header Caption Text: <i style="color: #999999;">(With short header use text in h5 tags only)</i></label></td><td><input name="headercaption_text" style="width:500px" value="<?php echo $headercaption_text; ?>" /></td>	
            </tr>
            <tr>
                <td><label>Header Caption on Right: <i style="color: #999999;">(Check to move caption from left to right)</i></label></td><td><input type="checkbox" name="headercaption_right" value="1" <?php if( isset($headercaption_right)){ checked( '1', $custom["headercaption_right"][0] ); } ?> /></td>	
            </tr>
            <tr>
                <td><label>Sidebar on Right: <i style="color: #999999;">(Check to move sidebar from left to right)</i></label></td><td><input type="checkbox" name="sidebar_right" value="1" <?php if( isset($sidebar_right)){ checked( '1', $custom["sidebar_right"][0] ); } ?> /></td>	
            </tr>
            <tr>
                <td><strong>Make sure to click Publish/Update after making changes!</strong></td><td></td>	
            </tr>
        </table>
    </div>
      
<?php
}




/* ------------------------------------- */
/* PORTFOLIO OPTIONS */
/* ------------------------------------- */

add_action("admin_init", "add_portfolio");
add_action('save_post', 'update_portfolio_data');

function add_portfolio(){
	add_meta_box("portfolio_details", "Portfolio Entry Options", "portfolio_options", "portfolioentry", "normal", "high");
}

function update_portfolio_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["website_url"]) ) {
			update_post_meta($post->ID, "website_url", $_POST["website_url"]);
		}
		if( isset($_POST["detail_active"]) ) {
			update_post_meta($post->ID, "detail_active", $_POST["detail_active"]);
		}else{
			update_post_meta($post->ID, "detail_active", 0);
		}
		if( isset($_POST["entry_active"]) ) {
			update_post_meta($post->ID, "entry_active", $_POST["entry_active"]);
		}else{
			update_post_meta($post->ID, "entry_active", 0);
		}
		if( isset($_POST["video_link"]) ) {
			update_post_meta($post->ID, "video_link", $_POST["video_link"]);
		}
		if( isset($_POST["entry_description"]) ) {
			update_post_meta($post->ID, "entry_description", $_POST["entry_description"]);
		}
	}
}

function portfolio_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	if (isset($custom["detail_active"][0])){
		$detail_active = $custom["detail_active"][0];
	}else{
		$detail_active = 0;
		$custom["detail_active"][0] = 0;
	}
	if (isset($custom["entry_active"][0])){
		$entry_active = $custom["entry_active"][0];
	}else{
		$entry_active = 0;
		$custom["entry_active"][0] = 0;
	}
	if (isset($custom["website_url"][0])){
		$website_url = $custom["website_url"][0];
	}else{
		$website_url = "";
	}
	if (isset($custom["video_link"][0])){
		$video_link = $custom["video_link"][0];
	}else{
		$video_link = "";
	}
	if (isset($custom["entry_description"][0])){
		$entry_description = $custom["entry_description"][0];
	}else{
		$entry_description = "";
	}
?>

    <div id="portfolio-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><strong>Portfolio Overview Options:</strong></td>
            </tr>
            <tr>
                <td><label>Link to Detail Page: <i style="color: #999999;">(Do you want a project detail page?)</i></label></td><td><input type="checkbox" name="detail_active" value="1" <?php if( isset($detail_active)){ checked($custom["detail_active"][0], 1); } ?> /></td>	
            </tr>
            <tr>
                <td><label>Featured Entry on Detail Page: <i style="color: #999999;">(Show featured portfolio entry in the post?)</i></label></td><td><input type="checkbox" name="entry_active" value="1" <?php if( isset($entry_active)){ checked($custom["entry_active"][0], 1); } ?> /></td>	
            </tr>
            <tr>
            	<td><label>Project Link: <i style="color: #999999;">(The URL of your project)</i></label></td><td><input name="website_url" style="width:500px" value="<?php echo $website_url; ?>" /></td>
            </tr>
            <tr>
                <td><label>Vimeo/Youtube/Custom Link: <i style="color: #999999;">(If you don't want an image as a detail view)</i></label></td><td><input name="video_link" style="width:500px" value="<?php echo $video_link; ?>" /></td>	
            </tr>
            <tr>
                <td><label>Entry Detail View Description: <i style="color: #999999;">(The HTML text displayed below the detail view)</i></label></td><td><input name="entry_description" style="width:500px" value="<?php echo $entry_description; ?>" /></td>	
            </tr>
        </table>
    </div>
      
<?php
}
?>