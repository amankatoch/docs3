<?php 
/* 
Template Name: Portfolio Single Entry
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
	$pagecustoms = getOptions();
	
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
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Portfolio Sidebar") ) : ?>
        <div class="widget">
        <div class="headline">Portfolio Sidebar</div>
        Please configure this Sidebar in the Admin Panel under Appearance -> Widgets -> Portfolio Sidebar
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
        
        	<?php	
				$custom = get_post_custom($post->ID);
				$entrycategory = get_the_term_list( $post->ID, 'portfoliocategory', '', '', '' );
				$entrycategory = strip_tags($entrycategory);
				$entrytitle = get_the_title();
				$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$video_link = $custom["video_link"][0];
				$entry_active = $custom["entry_active"][0];
				$entry_description = $custom["entry_description"][0];
			?>
			
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
        
        	<!-- NEWS POST -->
                    
            <div class="blogpostdetail noimage" id="post-<?php the_ID(); ?>">
                <h5><?php the_title(); ?></h5>
                <div class="postinfo">
                    Posted on <?php the_time('F jS, Y', true); ?> by <?php the_author(); ?> in <?php echo $entrycategory ?>.<br/>This Post has <span class="framed"><?php comments_popup_link('No Comments',
'1 Comment', '% Comments'); ?></span><br/><span class="framed"><?php the_tags('Tags: ',' '); ?></span>
                </div>
                
                <div class="editorarea">
                <?php if ($blogimageurl != "" && $entry_active == 1) { ?>
					<?php if($video_link==""){
                        echo '<a href="'.$blogimageurl.'" rel="prettyPhoto[mainteasers]" title="'.$entry_description.'">';
                    }else{
                        echo '<a href="'.$video_link.'" rel="prettyPhoto[mainteasers]" title="'.$entry_description.'">'; 
                    }
                    echo '<img class="size-full wp-image-60 alignleft bordered" src="'.get_bloginfo('template_url').'/functions/thumb.php?src='.$blogimageurl.'&amp;w=590&amp;zc=1" alt="'.$entrytitle.'"/></a>'; ?>
                <?php } ?>
               	<?php the_content(); ?>
                <br style="clear: left" />
                </div>
                <br style="clear: left" />
            </div>
            
            <!-- NEWS POST END -->
            
            <!-- POST SHARING -->
            
             <div id="postsharing" class="rounded">                            
                <div id="facebooklike"></div>
                <div id="twittertweet"></div>
                <div id="googleplusone"></div> 
            </div>
            
            <!-- POST SHARING END -->
            
            <!-- BLOG POST COMMENTS -->

            <?php comments_template('', true); ?>
			
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