<?php
/* 
Template Name: Content Page Full-Width
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
 
		<div class="editorarea"><?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><br style="clear: left" /></div>
	
    </div>
    
    <!-- PAGE CONTENT END -->
	 
</div>

<!-- MAIN CONTENT END -->

<?php get_footer(); ?>