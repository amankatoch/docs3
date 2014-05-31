<?php 
if (is_page_template('page_sidebar_left.php') ) {
    echo '<div class="sidebar left">';
} else {
    echo '<div class="sidebar right">';
}
?>

<?php 
if (is_page_template('page_sidebar_left.php') || is_page_template('page_sidebar_right.php')) {
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('page sidebar') ) : ?><?php endif; 
}else if (is_page_template('contact.php')) {
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact sidebar') ) : ?><?php endif; 
}else{
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?><?php endif; 
}
?>	

<br style="clear: left" />
                           
</div>
                
               