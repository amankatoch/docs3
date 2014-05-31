<?php
/**
 * @package WordPress
 * @subpackage Eleganza_Theme
 */
?>

<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'eleganza' ); ?></p>		
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
    <div id="comments">
		<h5><?php printf( _n( 'One Comment for this Post', '%1$s Comments for this Post', get_comments_number(), 'eleganza' ), number_format_i18n( get_comments_number() )); ?></h5>
        <ul><?php wp_list_comments( array( 'callback' => 'eleganza_comment' ) ); ?></ul>
        <br style="clear:left;" />
    </div>
<?php endif;  ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<div>
		<div class="left marginbottom10"><?php previous_comments_link( __( 'Older Comments ', 'eleganza' ) ); ?></div>
		<div class="right marginbottom10"><?php next_comments_link( __( 'Newer Comments', 'eleganza' ) ); ?> </div>
	</div> 
<?php endif;  ?>

<?php if ( comments_open() ) : ?>
    <!-- LEAVE REPLY -->
    <div id="respond">
        <h5><?php comment_form_title('Leave a Reply', 'Reply to %s'); ?></h5>
        <form id="commentform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
            <?php if ($user_ID) : ?>
            <div class="formpart">You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. Click here to <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a>.</div>
            <?php else : ?>
            <div class="formpart">
                <label for="author">Name <span>(required)</span></label><br/>
                <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="requiredfield rounded"/></p>
            </div>	
            <div class="formpart">
                <label for="email">Email <span>(required)</span></label><br/>
                <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="requiredfield rounded"/></p>
            </div>	
            <div class="formpart end">
                <label for="url">Website</label><br/>
                <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="rounded"/></p>
            </div>
            <?php endif; ?>
            <div class="formpart">
                <label for="comment">Comment <span>(required)</span></label>
                <p><textarea name="comment" id="comment" class="requiredfield rounded"></textarea></p>
            </div>			
            <div class="formpart">
                <button type="submit" name="send" class="addreply rounded">Add Reply</button><?php comment_id_fields(); ?>
                <p><?php do_action('comment_form', $post->ID); ?></p>
            </div>
        </form>
    </div>
    <!-- LEAVE REPLY END -->
<?php endif; ?>

<?php if ( ! comments_open() ) : ?>
	<div id="respond"><h5>Comments are closed.</h5></div>
<?php endif; ?>
    

