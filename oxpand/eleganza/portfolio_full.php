<?php 
/* 
Template Name: Portfolio Full-Width Overview
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$projectvisitbutton = get_option_tree( 'button_portfolio_visit');
		$categoriestitle = get_option_tree( 'title_portfolio_categories');
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
        
        <div class="contentportfolio">
        
        <?php 
		$type = 'portfolioentry';
		$args=array(
			'post_type' => $type,
			'posts_per_page' => 99
		);
        $temp = $wp_query; 
		$wp_query = null;
		$wp_query = new WP_Query();
  		$wp_query->query($args);
		$terms = get_terms("portfoliocategory");
		$count = count($terms);
		$currentindex = 1;
		?>
    
        <!-- PORTFOLIO FILTER -->

        <ul class="portfoliofilter">
            <?php
			 echo '<li class="all"><a class="portfoliobutton rounded" href="#"><span></span>All</a></li>';
			 foreach ( $terms as $term ) {
			   echo '<li class="'.strtolower($term->name).'"><a class="portfoliobutton_noselect rounded" href="#"><span></span>'.$term->name.'</a></li>';
			 }
			?>
        </ul> 
        
        <!-- PORTFOLIO FILTER END -->
        
        <?php if ($wp_query->have_posts()) : ?>
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        
        	<?php	
				$custom = get_post_custom($post->ID);
				$entrycategory = get_the_term_list( $post->ID, 'portfoliocategory', '', '_', '' );
				$entrycategory = strip_tags($entrycategory);
				$entrycategorybuffer = str_replace('_', ', ', $entrycategory);
				$entrycategory = strtolower($entrycategory);
				$entrycategory = str_replace(' ', '-', $entrycategory);
				$entrycategory = str_replace('_', ' ', $entrycategory);
				$entrytitle = get_the_title();
				$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$detail_active = $custom["detail_active"][0];
				$website_url = $custom["website_url"][0];
				$video_link = $custom["video_link"][0];
				$entry_description = $custom["entry_description"][0];
				$timevar = get_post_time('F jS,Y', true); 
			?>
            
            <?php if ($currentindex==1){ ?>
            <!-- PORTFOLIO -->
            <ul id="portfoliolist3column">
            <?php } ?>
        
        	<!-- PORTFOLIO ENTRY -->
                    
            <?php if ($blogimageurl != "") { ?>
            <li class="portfolio" data-type="<?php echo $entrycategory ?>" data-id="id-<?php echo $currentindex ?>">
            <?php }else{ ?>
            <li class="portfolio noimage" data-type="<?php echo $entrycategory ?>" data-id="id-<?php echo $currentindex ?>">
            <?php } ?>
            	<?php if ($blogimageurl != "") { ?>
                <div class="blogimage rounded">
                	<?php 
					if($video_link==""){
						echo '<a href="'.$blogimageurl.'" rel="prettyPhoto[mainteasers]" title="'.$entry_description.'">';
					}else{
						echo '<a href="'.$video_link.'" rel="prettyPhoto[mainteasers]" title="'.$entry_description.'">'; 
					}
					echo '<img src="'.get_bloginfo('template_url').'/functions/thumb.php?src='.$blogimageurl.'&amp;h=180&amp;w=280&amp;zc=1" alt="'.$entrytitle.'"/></a>';
					?>
                </div>
                <?php } ?>
                <h5><a href="<?php the_permalink(); ?>"><?php echo $entrytitle ?></a></h5>
                <div class="postinfo">
				Posted on <?php the_time('F jS, Y', true); ?> by <?php the_author(); ?> in <?php echo $entrycategorybuffer ?>.<br/>This Post has <span class="framed"><?php comments_popup_link('No Comments',
'1 Comment', '% Comments'); ?></span><br/><span class="framed"><?php the_tags('Tags: ',' '); ?></span>
       			</div>
                <div class="editorarea">
                <p><?php echo excerpt(30); ?></p>
                <?php if($detail_active!=1){ ?>
                    <a href="<?php echo $website_url ?>" target="_blank" class="buttonlight rounded"><?php echo $projectvisitbutton ?></a>
                <?php }else{ ?>
                    <a href="<?php the_permalink(); ?>" class="buttonlight rounded"><?php echo $projectvisitbutton ?></a>
                <?php } ?>
                <br style="clear: left" />
                </div>
                <br style="clear: left" />
            </li>
            
            <!-- PORTFOLIO ENTRY END -->
            
            <?php $currentindex++ ?>
			<?php endwhile; ?>
            <?php else : ?>
            <li>Sorry, nothing was found!</li>
            <?php endif; ?>
            
            <?php 
			$wp_query = null; 
			$wp_query = $temp;
			wp_reset_query();
			?>

            <br style="clear: left" />
            
        </ul>
        
        <!-- CONTENT COLUMN END -->
    
    </div>
    
    <!-- PAGE CONTENT END -->
     
</div>

<!-- MAIN CONTENT END -->
        
<?php get_footer(); ?>