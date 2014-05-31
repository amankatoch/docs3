<?php
/* ------------------------------------- */
/* ELEGANZA CUSTOM CATEGORIES WIDGET */
/* ------------------------------------- */

class eleganzaCategories extends WP_Widget
{
  function eleganzaCategories()
  {
    $widget_ops = array('classname' => 'eleganzaCategories', 'description' => 'Displays a list of Blog Categories' );
    $this->WP_Widget('eleganzaCategories', 'ELEGANZA Categories', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
	echo '<div class="blogcategories"><ul>';
	$cats = get_categories();
	foreach ($cats as $cat) {
		$my_query = new WP_Query('category_name='.$cat->name.'&posts_per_page=1'); 
 		while ($my_query->have_posts()) : $my_query->the_post();
      		 $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id() ); 
        endwhile; 
		echo '<li><span></span><a href="'.get_category_link( $cat->term_id ).'">'.$cat->name.' ('.$cat->count.')</a></li>';
	}
   echo '</ul></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaCategories");') );




/* ------------------------------------- */
/* ELEGANZA CUSTOM ARCHIVES WIDGET */
/* ------------------------------------- */

class eleganzaArchives extends WP_Widget
{
  function eleganzaArchives()
  {
    $widget_ops = array('classname' => 'eleganzaArchives', 'description' => 'Displays the Blog Archives' );
    $this->WP_Widget('eleganzaArchives', 'ELEGANZA Archives', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
    echo $before_title . $title . $after_title;;

	echo '<div class="blogarchives"><ul>';
	wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'html', 'before' => '<span></span>')));
    echo '</ul></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaArchives");') );




/* ------------------------------------- */
/* ELEGANZA MINI GALLERY SIDEBAR WIDGET */
/* ------------------------------------- */

class eleganzaMinigallery extends WP_Widget {

	function eleganzaMinigallery() {
		$widget_ops = array('classname' => 'eleganzaMinigallery', 'description' => 'A sidebar mini gallery. Please enter the links to the large images. Thumbs are generated automatically.');
    	$this->WP_Widget('eleganzaMinigallery', 'ELEGANZA Mini Gallery', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id( 'images' ); ?>">Image Url's (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"><?php if( isset($instance['images']) ) echo $instance['images']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'descriptions' ); ?>">Image description texts (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'descriptions' ); ?>" name="<?php echo $this->get_field_name( 'descriptions' ); ?>"><?php if( isset($instance['descriptions']) ) echo $instance['descriptions']; ?></textarea></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$imagearr = $instance['images'];
		$descriptionarr = $instance['descriptions'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		$imagelinks = explode("\n", $imagearr);
		$descs = explode("\n", $descriptionarr);
		echo '<ul id="minigal">';
			$ivar = 0;
			foreach($imagelinks as $imagelink):
				if(isset($descs[$ivar])){
					$currentdesc = $descs[$ivar];
				}else{
					$currentdesc = "";
				}
				echo '<li class="rounded"><a href="'.$imagelink.'" rel="prettyPhoto[minigallery]" title="'.$currentdesc.'">';
					echo '<img src="'.get_bloginfo('template_directory').'/functions/thumb.php?src='.$imagelink.'&amp;h=60&amp;w=60&amp;zc=1" />';
				echo '</a></li>';
				$ivar++;
			endforeach;
		echo '</ul><br style="clear: left" />';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['images'] = $new_instance['images'];
		$instance['descriptions'] = $new_instance['descriptions'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaMinigallery");') );




/* ------------------------------------- */
/* ELEGANZA 125x125 SIDEBAR WIDGET */
/* ------------------------------------- */

class eleganza125 extends WP_Widget {

	function eleganza125() {
		$widget_ops = array('classname' => 'eleganza125', 'description' => 'A sidebar 125 x 125 image display');
    	$this->WP_Widget('eleganza125', 'ELEGANZA 125 x 125', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id( 'images' ); ?>">Image Url's (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"><?php if( isset($instance['images']) ) echo $instance['images']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'clicklinks' ); ?>">Image click link Url's (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'clicklinks' ); ?>" name="<?php echo $this->get_field_name( 'clicklinks' ); ?>"><?php if( isset($instance['clicklinks']) ) echo $instance['clicklinks']; ?></textarea></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$imagearr = $instance['images'];
		$linkarr = $instance['clicklinks'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		$imagelinks = explode("\n", $imagearr);
		$links = explode("\n", $linkarr);
		echo '<ul class="sidebar125">';
			$ivar = 0;
			foreach($imagelinks as $imagelink):
				if(isset($links[$ivar])){
					echo '<li><a href="'.$links[$ivar].'" target="_blank" rel="fadeimg">';
					echo '<img src="'.$imagelink.'" />';
					echo '</a></li>';
				}else{
					echo '<li>';
					echo '<img src="'.$imagelink.'" />';
					echo '</li>';
				}
				$ivar++;
			endforeach;
		echo '</ul><br style="clear: left" />';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['images'] = $new_instance['images'];
		$instance['clicklinks'] = $new_instance['clicklinks'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganza125");') );




/* ------------------------------------- */
/* ELEGANZA TABS SIDEBAR WIDGET */
/* ------------------------------------- */

class eleganzaTabs extends WP_Widget {

	function eleganzaTabs() {
		$widget_ops = array('classname' => 'eleganzaTabs', 'description' => 'Sidebar Tabs with html text. Please use anchor tags around the tab titles! See the documentation for detailled setup info.');
    	$this->WP_Widget('eleganzaTabs', 'ELEGANZA Tabs', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id( 'title1' ); ?>">Tab 1 title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php if( isset($instance['title1']) ) echo $instance['title1']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'content1' ); ?>">Tab 1 html content:</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'content1' ); ?>" name="<?php echo $this->get_field_name( 'content1' ); ?>"><?php if( isset($instance['content1']) ) echo $instance['content1']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'title2' ); ?>">Tab 2 title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php if( isset($instance['title2']) ) echo $instance['title2']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'content2' ); ?>">Tab 2 html content:</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'content2' ); ?>" name="<?php echo $this->get_field_name( 'content2' ); ?>"><?php if( isset($instance['content2']) ) echo $instance['content2']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'title3' ); ?>">Tab 3 title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" value="<?php if( isset($instance['title3']) ) echo $instance['title3']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'content3' ); ?>">Tab 3 html content:</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'content3' ); ?>" name="<?php echo $this->get_field_name( 'content3' ); ?>"><?php if( isset($instance['content3']) ) echo $instance['content3']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'title4' ); ?>">Tab 4 title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" value="<?php if( isset($instance['title4']) ) echo $instance['title4']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'content4' ); ?>">Tab 4 html content:</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'content4' ); ?>" name="<?php echo $this->get_field_name( 'content4' ); ?>"><?php if( isset($instance['content4']) ) echo $instance['content4']; ?></textarea></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$tab1_title = $instance['title1'];
		$tab1_content = $instance['content1'];
		$tab2_title = $instance['title2'];
		$tab2_content = $instance['content2'];
		$tab3_title = $instance['title3'];
		$tab3_content = $instance['content3'];
		$tab4_title = $instance['title4'];
		$tab4_content = $instance['content4'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;

		echo '<div class="contenttabs"><ul class="tabs">';

		if(isset($tab1_title) && $tab1_title!=""){
			echo '<li>'.$tab1_title.'</li>';
		}
		if(isset($tab2_title) && $tab2_title!=""){
			echo '<li>'.$tab2_title.'</li>';
		}
		if(isset($tab3_title) && $tab3_title!=""){
			echo '<li>'.$tab3_title.'</li>';
		}
		if(isset($tab4_title) && $tab4_title!=""){
			echo '<li>'.$tab4_title.'</li>';
		}
		
		echo '</ul><div class="panes">';
		
		if(isset($tab1_content) && $tab1_content!=""){
			echo '<div>'.$tab1_content.'</div>';
		}
		if(isset($tab2_content) && $tab2_content!=""){
			echo '<div>'.$tab2_content.'</div>';
		}
		if(isset($tab3_content) && $tab3_content!=""){
			echo '<div>'.$tab3_content.'</div>';
		}
		if(isset($tab4_content) && $tab4_content!=""){
			echo '<div>'.$tab4_content.'</div>';
		}
		
		echo '</div></div><br style="clear: left" />';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['title1'] = $new_instance['title1'];
		$instance['title2'] = $new_instance['title2'];
		$instance['title3'] = $new_instance['title3'];
		$instance['title4'] = $new_instance['title4'];
		$instance['content1'] = $new_instance['content1'];
		$instance['content2'] = $new_instance['content2'];
		$instance['content3'] = $new_instance['content3'];
		$instance['content4'] = $new_instance['content4'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaTabs");') );




/* ------------------------------------- */
/* ELEGANZA QUICK CONTACT SIDEBAR WIDGET */
/* ------------------------------------- */

class eleganzaQuickcontact extends WP_Widget {

	function eleganzaQuickcontact() {
		$widget_ops = array('classname' => 'eleganzaQuickcontact', 'description' => 'A quick contact widget with social links');
    	$this->WP_Widget('eleganzaQuickcontact', 'ELEGANZA Quick Contact', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id( 'line1title' ); ?>">Line 1 Title:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line1title' ); ?>" name="<?php echo $this->get_field_name( 'line1title' ); ?>"><?php if( isset($instance['line1title']) ) echo $instance['line1title']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line1text' ); ?>">Line 1 Text:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line1text' ); ?>" name="<?php echo $this->get_field_name( 'line1text' ); ?>"><?php if( isset($instance['line1text']) ) echo $instance['line1text']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line2title' ); ?>">Line 2 Title:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line2title' ); ?>" name="<?php echo $this->get_field_name( 'line2title' ); ?>"><?php if( isset($instance['line2title']) ) echo $instance['line2title']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line2text' ); ?>">Line 2 Text:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line2text' ); ?>" name="<?php echo $this->get_field_name( 'line2text' ); ?>"><?php if( isset($instance['line2text']) ) echo $instance['line2text']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line3title' ); ?>">Line 3 Title:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line3title' ); ?>" name="<?php echo $this->get_field_name( 'line3title' ); ?>"><?php if( isset($instance['line3title']) ) echo $instance['line3title']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line3text' ); ?>">Line 3 Text:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line3text' ); ?>" name="<?php echo $this->get_field_name( 'line3text' ); ?>"><?php if( isset($instance['line3text']) ) echo $instance['line3text']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line4title' ); ?>">Line 4 Title:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line4title' ); ?>" name="<?php echo $this->get_field_name( 'line4title' ); ?>"><?php if( isset($instance['line4title']) ) echo $instance['line4title']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line4text' ); ?>">Line 4 Text:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line4text' ); ?>" name="<?php echo $this->get_field_name( 'line4text' ); ?>"><?php if( isset($instance['line4text']) ) echo $instance['line4text']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line5title' ); ?>">Line 5 Title:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line5title' ); ?>" name="<?php echo $this->get_field_name( 'line5title' ); ?>"><?php if( isset($instance['line5title']) ) echo $instance['line5title']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'line5text' ); ?>">Line 5 Text:</label><br /><textarea class="widefat" style="height:50px;" id="<?php echo $this->get_field_id( 'line5text' ); ?>" name="<?php echo $this->get_field_name( 'line5text' ); ?>"><?php if( isset($instance['line5text']) ) echo $instance['line5text']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'images' ); ?>">Social icon Url's (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'images' ); ?>" name="<?php echo $this->get_field_name( 'images' ); ?>"><?php if( isset($instance['images']) ) echo $instance['images']; ?></textarea></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'clicklinks' ); ?>">Social icon click link Url's (Separate with line breaks)</label><br /><textarea class="widefat" style="height:150px;" id="<?php echo $this->get_field_id( 'clicklinks' ); ?>" name="<?php echo $this->get_field_name( 'clicklinks' ); ?>"><?php if( isset($instance['clicklinks']) ) echo $instance['clicklinks']; ?></textarea></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$line1_title = $instance['line1title'];
		$line1_text = $instance['line1text'];
		$line2_title = $instance['line2title'];
		$line2_text = $instance['line2text'];
		$line3_title = $instance['line3title'];
		$line3_text = $instance['line3text'];
		$line4_title = $instance['line4title'];
		$line4_text = $instance['line4text'];
		$line5_title = $instance['line5title'];
		$line5_text = $instance['line5text'];
		$imagearr = $instance['images'];
		$linkarr = $instance['clicklinks'];
		
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		
		$imagelinks = explode("\n", $imagearr);
		$links = explode("\n", $linkarr);
		
		echo '<div class="socialcontact">';
		echo '<table>';
		
		if(isset($line1_title) && $line1_title!=""){
			echo '<tr><th>'.$line1_title.'</th>';
		}
		if(isset($line1_text) && $line1_text!=""){
			echo '<td>'.$line1_text.'</td></tr>';
		}
		
		if(isset($line2_title) && $line2_title!=""){
			echo '<tr><th>'.$line2_title.'</th>';
		}
		if(isset($line2_text) && $line2_text!=""){
			echo '<td>'.$line2_text.'</td></tr>';
		}
		
		if(isset($line3_title) && $line3_title!=""){
			echo '<tr><th>'.$line3_title.'</th>';
		}
		if(isset($line3_text) && $line3_text!=""){
			echo '<td>'.$line3_text.'</td></tr>';
		}
		
		if(isset($line4_title) && $line4_title!=""){
			echo '<tr><th>'.$line4_title.'</th>';
		}
		if(isset($line4_text) && $line4_text!=""){
			echo '<td>'.$line4_text.'</td></tr>';
		}
		
		if(isset($line5_title) && $line5_title!=""){
			echo '<tr><th>'.$line5_title.'</th>';
		}
		if(isset($line5_text) && $line5_text!=""){
			echo '<td>'.$line5_text.'</td></tr>';
		}
		
		echo '</table>';
		if(count($imagelinks)!=0){
			echo '<h5>Social Links</h5>';
		}
		echo '<ul class="sociallist">';
			$ivar = 0;
			foreach($imagelinks as $imagelink):
				if($ivar==count($imagelinks)-1){
					if(isset($links[$ivar])){
						echo '<li><a href="'.$links[$ivar].'" target="_blank" rel="fadeimg">';
						echo '<img src="'.$imagelink.'" />';
						echo '</a></li>';
					}else{
						echo '<li>';
						echo '<img src="'.$imagelink.'" />';
						echo '</li>';
					}
				}else{
					if(isset($links[$ivar])){
						echo '<li><a href="'.$links[$ivar].'" target="_blank" rel="fadeimg">';
						echo '<img src="'.$imagelink.'" />';
						echo '</a></li>';
					}else{
						echo '<li>';
						echo '<img src="'.$imagelink.'" />';
						echo '</li>';
					}
				}
				$ivar++;
			endforeach;
		echo '</ul></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['imglink'] = $new_instance['imglink'];
		$instance['line1title'] = $new_instance['line1title'];
		$instance['line1text'] = $new_instance['line1text'];
		$instance['line2title'] = $new_instance['line2title'];
		$instance['line2text'] = $new_instance['line2text'];
		$instance['line3title'] = $new_instance['line3title'];
		$instance['line3text'] = $new_instance['line3text'];
		$instance['line4title'] = $new_instance['line4title'];
		$instance['line4text'] = $new_instance['line4text'];
		$instance['line5title'] = $new_instance['line5title'];
		$instance['line5text'] = $new_instance['line5text'];
		$instance['images'] = $new_instance['images'];
		$instance['clicklinks'] = $new_instance['clicklinks'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaQuickcontact");') );




/* ------------------------------------- */
/* ELEGANZA GOOGLE MAPS SIDEBAR WIDGET */
/* ------------------------------------- */

class eleganzaGooglemaps extends WP_Widget {

	function eleganzaGooglemaps() {
		$widget_ops = array('classname' => 'eleganzaGooglemaps', 'description' => 'Google Maps Widget');
    	$this->WP_Widget('eleganzaGooglemaps', 'ELEGANZA Google Maps', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div id="googlemaps" class="rounded"><div id="googlemap"></div></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaGooglemaps");') );




/* ------------------------------------- */
/* ELEGANZA TWITTER FEED WIDGET */
/* ------------------------------------- */

class eleganzaTwitterfeed extends WP_Widget {

	function eleganzaTwitterfeed() {
		$widget_ops = array('classname' => 'eleganzaTwitterfeed', 'description' => 'Twitter Feed Widget');
    	$this->WP_Widget('eleganzaTwitterfeed', 'ELEGANZA Twitter Feed', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'username' ); ?>">Twitter User Name:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php if( isset($instance['username']) ) echo $instance['username']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'feedcount' ); ?>">Feed Count:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'feedcount' ); ?>" name="<?php echo $this->get_field_name( 'feedcount' ); ?>" value="<?php if( isset($instance['feedcount']) ) echo $instance['feedcount']; ?>" /></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$user = $instance['username'];
		$feeds = $instance['feedcount'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div class="tweets"><ul class="tweetlist">';

		echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery.ajaxSetup({ cache: true });
			jQuery.getJSON("http://twitter.com/status/user_timeline/'.$user.'.json?count='.$feeds.'&callback=?", function(data){
				jQuery.each(data, function(index, item){
						jQuery(".tweetlist").append("<li>" + item.text.linkify() + "<p>" + relative_time(item.created_at) + "</p></li>");
				});
			});
		});
		</script>';
	
		echo '</ul></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['username'] = $new_instance['username'];
		$instance['feedcount'] = $new_instance['feedcount'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaTwitterfeed");') );




/* ------------------------------------- */
/* ELEGANZA NEWSLETTER SIGNUP WIDGET */
/* ------------------------------------- */

class eleganzaNewsletter extends WP_Widget {

	function eleganzaNewsletter() {
		$widget_ops = array('classname' => 'eleganzaNewsletter', 'description' => 'Newsletter Widget. Please configure the target E-Mail under Theme Options!');
    	$this->WP_Widget('eleganzaNewsletter', 'ELEGANZA Newsletter Signup', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'namelabel' ); ?>">Name Field Label:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'namelabel' ); ?>" name="<?php echo $this->get_field_name( 'namelabel' ); ?>" value="<?php if( isset($instance['namelabel']) ) echo $instance['namelabel']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'emaillabel' ); ?>">Email Field Label:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'emaillabel' ); ?>" name="<?php echo $this->get_field_name( 'emaillabel' ); ?>" value="<?php if( isset($instance['emaillabel']) ) echo $instance['emaillabel']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'submit' ); ?>">Submit Button Text:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'submit' ); ?>" name="<?php echo $this->get_field_name( 'submit' ); ?>" value="<?php if( isset($instance['submit']) ) echo $instance['submit']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'error' ); ?>">Error Message:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'error' ); ?>" name="<?php echo $this->get_field_name( 'error' ); ?>" value="<?php if( isset($instance['error']) ) echo $instance['error']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'success' ); ?>">Success Message:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'success' ); ?>" name="<?php echo $this->get_field_name( 'success' ); ?>" value="<?php if( isset($instance['success']) ) echo $instance['success']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'sending' ); ?>">Sending Message:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'sending' ); ?>" name="<?php echo $this->get_field_name( 'sending' ); ?>" value="<?php if( isset($instance['sending']) ) echo $instance['sending']; ?>" /></p>
        

        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$labelname = $instance['namelabel'];
		$labelemail = $instance['emaillabel'];
		$buttonsubmit = $instance['submit'];
		$messageerror = $instance['error'];
		$messagesuccess = $instance['success'];
		$messagesending = $instance['sending'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div id="newsletter">
                <form id="newsletterform" method="post" action="#">
                    <div class="formpart">
                        <label for="newsletter_name">'.$labelname.'</label>

                        <p><input type="text" name="name" id="newsletter_name" value="" class="requiredfield rounded"/></p>
                    </div>		
                    <div class="formpart">
                        <label for="newsletter_email">'.$labelemail.'</label>
                        <p><input type="text" name="email" id="newsletter_email" value="" class="requiredfield rounded"/></p>
                    </div>				
                    <div class="formpart paddingright100">
                        <button type="submit" name="send" class="sendnews rounded">'.$buttonsubmit.'</button>

                    </div>
                    <div class="formpart">
                        <span class="errormessage">'.$messageerror.'</span>
                        <span class="successmessage">'.$messagesuccess.'</span>
                        <span class="sendingmessage">'.$messagesending.'</span>
                    </div>
                </form>  
            </div>
		';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['namelabel'] = $new_instance['namelabel'];
		$instance['emaillabel'] = $new_instance['emaillabel'];
		$instance['submit'] = $new_instance['submit'];
		$instance['error'] = $new_instance['error'];
		$instance['success'] = $new_instance['success'];
		$instance['sending'] = $new_instance['sending'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaNewsletter");') );




/* ------------------------------------- */
/* ELEGANZA SIDEBAR MENU WIDGET */
/* ------------------------------------- */

class eleganzaSidebarmenu extends WP_Widget {

	function eleganzaSidebarmenu() {
		$widget_ops = array('classname' => 'eleganzaSidebarmenu', 'description' => 'Sidebar Menu Widget');
    	$this->WP_Widget('eleganzaSidebarmenu', 'ELEGANZA Sidebar Menu', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'menuid' ); ?>">Menu ID (1-3):</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'menuid' ); ?>" name="<?php echo $this->get_field_name( 'menuid' ); ?>" value="<?php if( isset($instance['menuid']) ) echo $instance['menuid']; ?>" /></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$idmenu = $instance['menuid'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		wp_nav_menu( array( 'menu' => 'pagenavigation'.$idmenu, 'container_class' => 'sidebarmenu', 'container_id' => 'sidebarmenu'.$idmenu, 'theme_location' => 'pagenavigation', 'before' => '<span></span>' ) );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['menuid'] = $new_instance['menuid'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaSidebarmenu");') );




/* ------------------------------------- */
/* ELEGANZA BROCHURE WIDGET */
/* ------------------------------------- */

class eleganzaBrochure extends WP_Widget {

	function eleganzaBrochure() {
		$widget_ops = array('classname' => 'eleganzaBrochure', 'description' => 'Sidebar Brochure Widget');
    	$this->WP_Widget('eleganzaBrochure', 'ELEGANZA Brochure', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'link' ); ?>">Download URL:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php if( isset($instance['link']) ) echo $instance['link']; ?>" /></p> 
        
        <p><label for="<?php echo $this->get_field_id( 'text' ); ?>">Link Text:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" value="<?php if( isset($instance['text']) ) echo $instance['text']; ?>" /></p> 
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$downurl = $instance['link'];
		$linktext = $instance['text'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div id="brochure">   
			<a href="'.$downurl.'" rel="fadeimg"><img src="'.get_bloginfo('template_url').'/images/pdf.png" alt=""/><p>'.$linktext.'</p></a>
		</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['link'] = $new_instance['link'];
		$instance['text'] = $new_instance['text'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("eleganzaBrochure");') );
?>