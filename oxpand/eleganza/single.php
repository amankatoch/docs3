<?php
/**
* @package WordPress
* @subpackage Eleganza_Theme
*/
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
	$pagecustoms = getOptions();
	$commentsvar = false;
	
	if (isset($pagecustoms["headerimage_link"])){$hlink = $pagecustoms['headerimage_link'];}else{$hlink = "";}
	if (isset($pagecustoms["headercaption_text"])){$htext = $pagecustoms['headercaption_text'];}else{$htext = "";}
	if (isset($pagecustoms["headercaption_right"])){$hcap = $pagecustoms['headercaption_right'];}else{$hcap = "";}
	if (isset($pagecustoms["sidebar_right"])){$sideb = $pagecustoms['sidebar_right'];}else{$sideb = 0;}
?>
        
<!-- MAIN CONTENT START-->
        
    <div id="contentcontainer"> 
    
        <!-- SUBHEADER BACKGROUND -->
    
    	<?php if ($hlink!=""){ ?>
        <div class="subheaderbanner headerhalf">
        <?php }else{ ?>
        <div class="subheaderbanner headersmall">
        <?php } ?>
            <div id="shadowtiletop"></div>
            <div id="shadowtilebottom"></div>
            <div id="gradientleft"></div>
            <div id="gradientright"></div>
        </div>
        
        <!-- SUBHEADER BACKGROUND END -->
       
        <!-- SUBHEADER BANNER START -->
        
        <?php if ($hlink!=""){ ?>
        <div class="bannersmall"> 
        <img src="<?php echo $hlink ?>" alt="" />
        <?php }else{ ?>
        <div class="nobanner">
        <?php } ?>
        
        <?php if ($htext!=""){ ?>
        
			<?php if ($hlink!=""){ ?>
				<?php if ($hcap!=1){ ?>
                <div class="subheadercaption left">
                <?php }else{ ?>
                <div class="subheadercaption right">
                <?php } ?>
            <?php }else{ ?>
            	<?php if ($hcap!=1){ ?>
                <div class="subheadercaption left smallcap">
                <?php }else{ ?>
                <div class="subheadercaption right smallcap">
                <?php } ?>
            <?php } ?>
                <?php echo $htext ?>
            </div>
            
        <?php } ?>
         
        </div> 
        
        <?php if ($hlink!=""){ ?>
        <div class="shadow"></div>
		<?php } ?>
        
        <!-- SUBHEADER BANNER END -->
        
        <div id="pagination">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php get_search_form(); ?> 
        </div>
        
        <?php if ($hlink!=""){ ?>
        <div id="paginationbg"></div>
        <?php }else{ ?>
        <div id="paginationbgsmall"></div>
        <?php } ?>
        
        <!-- PAGE CONTENT -->
        
        <div class="content">
    
        <!-- SIDEBAR -->
    
    	<?php if ($sideb!=1){ ?>
        <div class="sidebar left">
        <?php }else{ ?>
        <div class="sidebar right">
        <?php } ?>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
        <div class="widget">
        <div class="headline">Blog Sidebar</div>
        Please configure this Sidebar in the Admin Panel under Appearance -> Widgets -> Blog Sidebar
        </div>
        <?php endif; ?>
        </div>
        
        <!-- SIDEBAR END -->
        
        <!-- CONTENT COLUMN -->
        
        <?php if ($sideb!=1){ ?>
        <div class="twothird_content right"> 
        <?php }else{ ?>
        <div class="twothird_content left">
        <?php } ?>
			
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
        
        	<!-- BLOGPOST -->
                    
            <div class="blogpostdetail noimage" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h5><?php the_title(); ?></h5>
                <div class="postinfo">
                    Posted on <?php the_time('F jS, Y', true); ?> by <?php the_author(); ?> in <span class="framed"><?php the_category(' ',' '); ?></span><br/>This Post has <span class="framed"><?php comments_popup_link('No Comments',
'1 Comment', '% Comments'); ?></span><br/><span class="framed"><?php the_tags('Tags: ',' '); ?></span>
                </div>
                <div class="editorarea"><?php the_content(); ?><br style="clear: left" /></div>
                <br style="clear: left" />
                <?php wp_link_pages(); ?>
            </div>
            
            <!-- BLOGPOST END -->
            
            <!-- POST SHARING -->
            
             <div id="postsharing" class="rounded">                            
                <div id="facebooklike"></div>
                <div id="twittertweet"></div>
                <div id="googleplusone"></div> 
            </div>
            
            <!-- POST SHARING END -->
            
            <!-- BLOG POST COMMENTS -->

            <?php comments_template('', true); ?>
            <?php if($commentsvar) comment_form(); ?>
			
            <!-- BLOG POST COMMENTS END -->
                      
			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

		</div>
		
		<!-- CONTENT COLUMN END -->
	
	</div>
	
	<!-- PAGE CONTENT END -->
	 
</div>

<!-- MAIN CONTENT END -->

<?php get_footer(); ?>