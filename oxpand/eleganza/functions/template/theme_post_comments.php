<?php
/* ------------------------------------- */
/* BLOG POST COMMENTS */
/* ------------------------------------- */

function eleganza_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
    <!-- COMMENT START -->
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    
    	<div class="commentwrap rounded">
		
            <span class="boxheadline_dark left"><?php comment_author_link(); ?></span><br/>
            <span class="timestamp left"><?php printf( __( '%1$s at %2$s', 'eleganza' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'eleganza' ), ' ' ); ?></span><br/><br/>
                
            <div class="posterpic rounded">
                <?php echo get_avatar( $comment, 80 ); ?>
            </div>
            
            <div class="postertext">
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'eleganza' ); ?></em>
                    <br/><br/>
                <?php endif; ?>
                <div class="editorarea"><?php comment_text(); ?></div>
            </div>
            
            <div class="replylink"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
            
            <br style="clear:left;" />
        
        </div>
        
	</li>
	<!-- COMMENT END -->
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'eleganza' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'eleganza'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
?>